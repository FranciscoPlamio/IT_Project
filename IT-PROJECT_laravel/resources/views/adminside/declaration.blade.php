<x-admin-layout :title="'Declaration & Compliance'">
    <x-slot:head>
        @vite(['resources/css/adminside/dashboard.css', 'resources/css/adminside/declaration.css', 'resources/js/adminside/declaration.js'])
    </x-slot:head>

    <main class="main declaration-main">
        <h1>Declaration</h1>

        <section class="declaration-table-card">
            <div class="card-header">
                <div>
                    <h2>Declaration Tracking</h2>
                    <p>Monitor recent submissions that need official receipt validation.</p>
                </div>
                <div class="table-meta">
                    <span>Total Items: {{ count($declarationEntries) }}</span>
                </div>
            </div>

            <div class="table-container">
                <table class="styled-table declaration-table">
                    <thead>
                        <tr>
                            <th>Reference Number</th>
                            <th>Applicant</th>
                            <th>Form Type</th>
                            <th>Date Submitted</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($declarationEntries as $entry)
                            <tr>
                                <td>{{ $entry['reference'] }}</td>
                                <td>{{ $entry['applicant'] }}</td>
                                <td>{{ $entry['form'] }}</td>
                                <td>{{ $entry['submitted'] }}</td>
                                <td>
                                    <span class="status-chip">{{ $entry['status'] }}</span>
                                </td>
                                <td class="action-cell">
                                    <span class="action-placeholder">Awaiting OR update</span>
                                    <button class="receipt-btn open-receipt-btn"
                                        data-reference="{{ $entry['reference'] }}"
                                        data-applicant="{{ $entry['applicant'] }}" data-form="{{ $entry['form'] }}">
                                        Official Receipt
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <div class="receipt-modal" id="receiptModal">
        <div class="receipt-modal__content">
            <button class="receipt-modal__close" id="receiptModalClose" aria-label="Close modal">&times;</button>
            <div class="receipt-modal__header">
                <h3>Official Receipt</h3>
                <p id="receiptModalSubtitle">Select a request to populate the details.</p>
            </div>
            <form id="receiptForm" class="receipt-form">
                <div class="form-grid">
                    <label>
                        <span>Date Accomplished</span>
                        <input type="date" name="date_accomplished">
                    </label>
                    <label>
                        <span>OR No.</span>
                        <input type="text" name="or_no" placeholder="Enter official receipt number">
                    </label>
                    <label>
                        <span>OR Date</span>
                        <input type="date" name="or_date">
                    </label>
                    <label>
                        <span>OR Amount</span>
                        <input type="text" name="or_amount" placeholder="₱0.00">
                    </label>
                    <label>
                        <span>Collecting Officer</span>
                        <input type="text" name="collecting_officer" placeholder="Enter name">
                    </label>
                </div>
                <div class="receipt-form__actions">
                    <button type="button" class="btn-secondary" id="receiptCancelBtn">Cancel</button>
                    <button type="submit" class="btn-primary">Save Details</button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
