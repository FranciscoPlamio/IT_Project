<x-admin-layout>
    <x-slot:head>
        @vite(['resources/css/adminside/dashboard.css', 'resources/js/adminside/dashboard.js'])
        <style>
            .summary-card {
                background: #fff;
                padding: 16px;
                border-radius: 12px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
                margin-bottom: 16px;
            }

            .summary-card .amount {
                font-size: 1.8rem;
                font-weight: bold;
                color: #16a34a;
            }

            /* Pagination */
            .pagination-container {
                margin-top: 16px;
                display: flex;
                justify-content: center;
            }

            .pagination {
                display: flex;
                gap: 6px;
                list-style: none;
                padding-left: 0;
            }

            .pagination li a {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                padding: 6px 12px;
                background: #f3f3f3;
                border-radius: 6px;
                color: #333;
                text-decoration: none;
                font-weight: 500;
                font-size: 0.875rem;
            }

            .pagination li.active a {
                background: #2563eb;
                color: #fff;
            }

            .pagination li.disabled span {
                opacity: 0.5;
                cursor: not-allowed;
            }

            .filter-form {
                margin-bottom: 16px;
                display: flex;
                flex-wrap: wrap;
                align-items: center;
                gap: 8px;
            }

            .filter-form input[type="date"],
            .filter-form select {
                padding: 6px 10px;
                border-radius: 6px;
                border: 1px solid #ccc;
            }

            .filter-form button {
                padding: 6px 12px;
                border-radius: 6px;
                background-color: #2563eb;
                color: #fff;
                border: none;
                cursor: pointer;
            }

            .filter-form button:hover {
                background-color: #1d4ed8;
            }
        </style>
    </x-slot:head>

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
                <div class="label">Declined ({{ $cancel }})</div>
            </div>
        </section>

        <!-- Summary / Total Paid -->
        <section class="summary mb-6">
            <div class="summary-card total-paid">
                <h3>Total Paid
                    @if (request('single_date'))
                        on {{ \Carbon\Carbon::parse(request('single_date'))->format('M d, Y') }}
                    @elseif(request('start_date') && request('end_date'))
                        from {{ \Carbon\Carbon::parse(request('start_date'))->format('M d, Y') }} to
                        {{ \Carbon\Carbon::parse(request('end_date'))->format('M d, Y') }}
                    @elseif(request('date'))
                        on {{ \Carbon\Carbon::parse(request('date'))->format('M d, Y') }}
                    @elseif(request('range') == 'yesterday')
                        Yesterday
                    @elseif(request('range') == 'last7')
                        Last 7 Days
                    @elseif(request('range') == 'last30')
                        Last 30 Days
                    @else
                        Today
                    @endif
                </h3>
                <p class="amount">₱ {{ number_format($filteredTotalPaid, 2) }}</p>
            </div>
        </section>

        <!-- Filter Form -->
        <form method="GET" class="filter-form">
            <label for="filter_type">Filter By:</label>
            <select name="filter_type" id="filter_type">
                <option value="single_date" {{ request('filter_type') == 'single_date' ? 'selected' : '' }}>Single Day
                </option>
                <option value="range" {{ request('filter_type') == 'range' ? 'selected' : '' }}>Date Range</option>
                <option value="quick" {{ request('filter_type') == 'quick' ? 'selected' : '' }}>Quick Range</option>
            </select>

            <!-- Single Day -->
            <div class="filter-single-date" style="display:none;">
                <label for="single_date">Date:</label>
                <input type="date" name="single_date" id="single_date" max="{{ date('Y-m-d') }}">
            </div>

            <!-- Date Range -->
            <div class="filter-range" style="display:none;">
                <label for="start_date">From:</label>
                <input type="date" name="start_date" id="start_date" max="{{ date('Y-m-d') }}">

                <label for="end_date">To:</label>
                <input type="date" name="end_date" id="end_date" max="{{ date('Y-m-d') }}">
            </div>

            <!-- Quick Range -->
            <div class="filter-quick" style="display:none;">
                <label for="range">Quick Range:</label>
                <select name="range" id="range">
                    <option value="">-- Select --</option>
                    <option value="yesterday">Yesterday
                    </option>
                    <option value="last7">Last 7 Days</option>
                    <option value="last30">Last 30 Days</option>
                </select>
            </div>

            <button type="submit">Filter</button>
            <a href="{{ route('admin.dashboard') }}"
                class="ml-2 px-3 py-1 rounded bg-gray-500 text-white hover:bg-gray-600">Reset</a>
        </form>


        <!-- Certification Log -->
        <section class="cert-log">
            <div class="table-header">
                <h1>Certification Log</h1>
            </div>

            @if ($recentApps->isEmpty())
                <div class="empty-state">
                    <div class="empty-icon">📋</div>
                    <h3>No Applications Found</h3>
                </div>
            @else
                <div class="table-container overflow-x-auto">
                    <table class="applications-table">
                        <thead>
                            <tr>
                                <th>Reference Number</th>
                                <th>Form Type</th>
                                <th>Date Submitted</th>
                                <th>Status</th>
                                <th>Payment Amount</th> <!-- New column -->
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recentApps as $app)
                                @php
                                    $status = strtolower(trim($app->status ?? 'pending'));
                                    $isInProgress = in_array($status, ['pending', 'processing']);
                                    $targetRoute = $isInProgress
                                        ? route('admin.req-management', [
                                            'highlight' => $app->payment_reference,
                                            'section' => 'history',
                                        ])
                                        : route('admin.req-history', ['highlight' => $app->payment_reference]);
                                @endphp
                                <tr class="table-row" data-status="{{ $status }}">
                                    <td>{{ $app->payment_reference }}</td>
                                    <td>{{ ucfirst($app->form_type) }}</td>
                                    <td>
                                        {{ optional($app->created_at)->format('d M Y') }}
                                        <br>
                                        {{ optional($app->created_at)->format('h:i A') }}
                                    </td>
                                    <td>
                                        <div class="status-badge {{ $app->status_class }}">
                                            <img src="{{ asset('images/' . $app->status_icon) }}"
                                                alt="{{ ucfirst($status) }}">
                                            {{ ucfirst($status) }}
                                        </div>
                                    </td>
                                    <td>₱ {{ number_format($app->payment_amount, 2) }}</td>
                                    <td>
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

                    <!-- Pagination -->
                    <div class="pagination-container">
                        <ul class="pagination">
                            @foreach ($recentApps->getUrlRange(1, $recentApps->lastPage()) as $page => $url)
                                <li class="{{ $page == $recentApps->currentPage() ? 'active' : '' }}">
                                    <a href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </section>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const filterTypeSelect = document.getElementById('filter_type');
            const singleDateDiv = document.querySelector('.filter-single-date');
            const rangeDiv = document.querySelector('.filter-range');
            const quickDiv = document.querySelector('.filter-quick');

            function updateFilterVisibility() {
                const value = filterTypeSelect.value;

                singleDateDiv.style.display = value === 'single_date' ? 'block' : 'none';
                rangeDiv.style.display = value === 'range' ? 'block' : 'none';
                quickDiv.style.display = value === 'quick' ? 'block' : 'none';
            }

            // Initialize on page load
            updateFilterVisibility();

            // Update on change
            filterTypeSelect.addEventListener('change', updateFilterVisibility);
        });
    </script>
</x-admin-layout>
