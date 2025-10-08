<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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
            <a href="{{ route('adminside.cert-request') }}" class="menu-item">
                <img src="{{ asset('images/cert-icon.png') }}" alt=""> Certification Request
            </a>
            <a href="{{ route('adminside.req-management') }}" class="menu-item">
                <img src="{{ asset('images/req-icon.png') }}" alt=""> Request Management
            </a>
            <a href="{{ route('adminside.bill-pay') }}" class="menu-item">
                <img src="{{ asset('images/billicon.png') }}" alt="">Billings and Payment
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
            <div class="pie-card">
                <div class="pie-circle done" style="--percent: {{ $percentages['done'] }}%;"></div>
                <div><strong>{{ $percentages['done'] }}%</strong><br>Done ({{ $done }})</div>
            </div>

            <div class="pie-card">
                <div class="pie-circle progress" style="--percent: {{ $percentages['progress'] }}%;"></div>
                <div><strong>{{ $percentages['progress'] }}%</strong><br>In Progress ({{ $progress }})</div>
            </div>

            <div class="pie-card">
                <div class="pie-circle pending" style="--percent: {{ $percentages['pending'] }}%;"></div>
                <div><strong>{{ $percentages['pending'] }}%</strong><br>Pending ({{ $pending }})</div>
            </div>
        </section>

        <!-- Certification Log -->
        <section class="cert-log">
    <h1>Certification Log</h1>

    @foreach($recentApps as $app)
    @php
        // Normalize the status (handle case sensitivity and missing values)
        $status = strtolower($app->status ?? 'pending');

        // Assign class and icon based on status
        $cls = $status === 'in progress' ? 'progress' : str_replace(' ', '-', $status);
        $icon = match($status) {
            'done' => 'Done.png',
            'in progress' => 'In-prog.png',
            'denied' => 'Denied.png', // optional: if you add denied later
            default => 'Pending.png'
        };
    @endphp

    <div class="log-item">
        <div>
            <h3>#{{ $app->display_number }} | {{ strtoupper($app->form_type) }}</h3><br>
            <h5>{{ optional($app->created_at)->format('m/d/Y') }}</h5>
        </div>
        <div class="status {{ $cls }}">
            <img src="{{ asset('images/' . $icon) }}" alt="">
            <span>{{ ucfirst($status) }}</span>
        </div>
    </div>
    @endforeach
</section>
    </main>
</body>
</html>
