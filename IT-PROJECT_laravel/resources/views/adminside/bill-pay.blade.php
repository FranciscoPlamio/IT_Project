<x-admin-layout :title="'Payment Monitoring'">
    <x-slot:head>
        @vite(['resources/css/adminside/bill-pay.css', 'resources/js/adminside/bill-pay.js'])
    </x-slot:head>

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
</x-admin-layout>
