<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Payment Monitoring</title>
    @vite(['resources/css/adminside/bill-pay.css', 'resources/js/adminside/bill-pay.js'])
</head>

<body>

    <!-- Sidebar -->
    <aside class="sidebar">
        <img src="{{ asset('images/ntc-logo.png') }}" class="logo" alt="NTC Logo" />
        <nav class="menu">
            <a href="{{ route('adminside.dashboard') }}" class="menu-item"><img
                    src="{{ asset('images/dash-icon.png') }}" alt="">Dashboard</a>
            <a href="{{ route('adminside.cert-request') }}" class="menu-item"><img
                    src="{{ asset('images/cert-icon.png') }}" alt="">Certification Request</a>
            <a href="{{ route('adminside.req-management') }}" class="menu-item"><img
                    src="{{ asset('images/req-icon.png') }}" alt="">Request Management</a>
            <a href="{{ route('adminside.bill-pay') }}" class="menu-item active"><img
                    src="{{ asset('images/white-bill-icon.png') }}" alt="">Billings and Payment</a>
            <a href="{{ route('adminside.form-fees') }}" class="menu-item">
                <img src="{{ asset('images/billicon.png') }}" alt=""> Form Fees & Breakdown
            </a>
        </nav>
        <div class="bottom-links">
            <a href="#" class="menu-item"><img src="{{ asset('images/out-icon.png') }}" alt="">Log
                out</a>
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
    <div class="main">
        <h1>Payment Monitoring</h1>

        <div class="card">
            <div class="card-header">
                <h2>Latest Payment</h2>
                <div class="actions">
                    <div class="search-bar">
                        <input type="text" placeholder="Search">
                        <img src="{{ asset('images/search-icon.png') }}" alt="Search">
                    </div>
                    <div class="filter-bar">
                        <img src="{{ asset('images/filter-icon.png') }}" alt="Filter">
                    </div>
                </div>
            </div>

            <!-- Scrollable Table -->
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Reference Number</th>
                            <th>Request Type</th>
                            <th>Payment Date</th>
                            <th>Attachment</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($payments as $p)
                            <tr data-id="{{ $p->_id }}">
                                <td>{{ $p->payment_reference }}</td>
                                <td>{{ ucfirst($p->form_type ?? 'N/A') }}</td>
                                <td class="payment-date">{{ $p->formatted_date }}</td>
                                <td>
                                    <span class="see-more">
                                        See more <img src="{{ asset('images/see-icon.png') }}" alt="">
                                    </span>
                                </td>

                                <td class="payment-status {{ strtolower($p->payment_status ?? 'pending') }}">
                                    {{ ucfirst($p->payment_status ?? 'Pending') }}
                                </td>

                                <td class="action-cell">
                                    @if (strtolower($p->payment_status ?? 'pending') !== 'paid')
                                        <button class="badge-btn set-amount-btn"
                                            onclick="setAmount('{{ (string) $p->_id }}', this, {{ $p->payment_amount ?? 0 }})">Set
                                            Amount</button>
                                    @endif
                                    @if (strtolower($p->payment_status ?? 'pending') === 'pending')
                                        <button class="badge-btn paid"
                                            onclick="setPaid('{{ (string) $p->_id }}', this)">Paid</button>
                                    @else
                                        <span style="color:gray"></span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">No payment records found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
