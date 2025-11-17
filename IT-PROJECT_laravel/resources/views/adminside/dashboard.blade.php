<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NTC Dashboard</title>
    @vite(['resources/css/adminside/dashboard.css', 'resources/js/adminside/dashboard.js'])
</head>

<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <img src="{{ asset('images/ntc-logo.png') }}" class="logo" alt="NTC Logo" />
        <nav class="menu">
            <a href="{{ route('adminside.dashboard') }}" class="menu-item   active">
                <img src="{{ asset('images/whitedash-icon.png') }}" alt=""> Dashboard
            </a>
            <a href="{{ route('adminside.req-management') }}" class="menu-item">
                <img src="{{ asset('images/req-icon.png') }}" alt=""> Request Management
            </a>
            <a href="{{ route('adminside.req-history') }}" class="menu-item">
                <img src="{{ asset('images/req-icon.png') }}" alt=""> Request History
            </a>
            <a href="{{ route('adminside.bill-pay') }}" class="menu-item">
                <img src="{{ asset('images/billicon.png') }}" alt="">Billings and Payment
            </a>
            <a href="{{ route('adminside.form-fees') }}" class="menu-item">
                <img src="{{ asset('images/billicon.png') }}" alt=""> Form Fees & Breakdown
            </a>
        </nav>
        <div class="bottom-links">
            <a href="#" class="menu-item" id="logout-link">
                <img src="{{ asset('images/out-icon.png') }}" alt=""> Log out
            </a>
        </div>

        <!-- Log Out Confirmation Modal -->
        <div id="logout-modal" class="modal">
            <div class="modal-content">
                <h3>Are you sure you want to log out?</h3>
                <div class="modal-buttons">
                    <button id="confirm-logout" class="confirm-btn">Yes</button>
                    <button id="cancel-logout" class="cancel-btn">No</button>
                </div>
            </div>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main">
        <!-- Pie Charts -->
        <section class="pie">
            <div class="pie-card done">
                <div class="pie-circle done" style="--percent: {{ $percentages['done'] }}%;"></div>
                <div><strong>{{ $percentages['done'] }}%</strong></div>
                <div class="label">Done ({{ $done }})</div>
            </div>

            <div class="pie-card progress">
                <div class="pie-circle progress" style="--percent: {{ $percentages['progress'] }}%;"></div>
                <div><strong>{{ $percentages['progress'] }}%</strong></div>
                <div class="label">In Progress ({{ $progress }})</div>
            </div>

            <div class="pie-card cancel">
                <div class="pie-circle cancel" style="--percent: {{ $percentages['cancel'] }}%;"></div>
                <div><strong>{{ $percentages['cancel'] }}%</strong></div>
                <div class="label">Cancelled ({{ $cancel }})</div>
            </div>
        </section>

        <!-- Certification Log -->
        <section class="cert-log">
            <div class="table-header">
                <h1>Certification Log</h1>
                <div class="table-actions">
                    <button class="refresh-btn" id="refresh-btn" title="Refresh data">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"></path>
                            <path d="M21 3v5h-5"></path>
                            <path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"></path>
                            <path d="M3 21v-5h5"></path>
                        </svg>
                        Refresh
                    </button>
                </div>
            </div>

            @if ($recentApps->isEmpty())
                <div class="empty-state">
                    <div class="empty-icon">📋</div>
                    <h3>No Applications Found</h3>
                    <p>There are no recent applications to display at the moment.</p>
                </div>
            @else
                <div class="table-container">
                    <table class="applications-table">
                        <thead>
                            <tr>
                                <th>Reference Number</th>
                                <th>Form Type</th>
                                <th>Date Submitted</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recentApps as $app)
                                @php
                                    $status = strtolower(trim($app->status ?? 'in progress'));
                                    $isInProgress = $status === 'in progress';
                                    $targetRoute = $isInProgress
                                        ? route('adminside.cert-request', ['highlight' => $app->payment_reference])
                                        : route('adminside.req-management', [
                                            'highlight' => $app->payment_reference,
                                            'section' => 'history',
                                        ]);
                                @endphp
                                <tr class="table-row" data-status="{{ $status }}">
                                    <td class="app-id">
                                        <span class="id-badge">{{ $app->payment_reference }}</span>
                                    </td>
                                    <td class="form-type">
                                        <span class="type-label">{{ ucfirst($app->form_type) }}</span>
                                    </td>
                                    <td class="date-submitted">
                                        <span
                                            class="date-text">{{ optional($app->created_at)->format('d M Y') }}</span>
                                        <span
                                            class="time-text">{{ optional($app->created_at)->format('h:i A') }}</span>
                                    </td>
                                    <td class="status-cell">
                                        <div class="status-badge {{ $app->status_class }}">
                                            <img src="{{ asset('images/' . $app->status_icon) }}"
                                                alt="{{ ucfirst($status) }}">
                                            <span>{{ ucfirst($status) }}</span>
                                        </div>
                                    </td>
                                    <td class="actions">
                                        <a href="{{ $targetRoute }}" class="action-btn view-btn" title="View Details">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                <circle cx="12" cy="12" r="3"></circle>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </section>
    </main>
</body>

</html>
