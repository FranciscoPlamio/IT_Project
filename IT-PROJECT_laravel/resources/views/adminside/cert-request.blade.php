<x-admin-layout :title="'Request History'">
    <x-slot:head>
        @vite(['resources/css/adminside/req-management.css', 'resources/js/adminside/req-management.js'])
    </x-slot:head>

    <!-- Main Content -->
    <div class="main">
        <h1>Certification Request</h1>

        <div class="card full-page">
            <section class="half-section">
                <div class="card-header">
                    <div class="actions">
                        <div class="search-bar">
                            <input type="text" id="searchLatest" placeholder="Search">
                            <img src="{{ asset('images/search-icon.png') }}" alt="Search">
                        </div>
                        <div class="filter-bar">
                            <img src="{{ asset('images/filter-icon.png') }}" alt="Filter">
                            <div class="filter-dropdown" id="filterDropdownLatest">
                                <h4>Filter by:</h4>

                                <label for="historyDateType">Filter Date Type</label>
                                <select id="historyDateType">
                                    <option value="request">Request Date</option>
                                    <option value="release">Release Date</option>
                                </select>

                                <label for="dateFilterLatest">Date Range</label>
                                <select id="dateFilterLatest">
                                    <option value="all">All Dates</option>
                                    <option value="week">This Week</option>
                                    <option value="month">This Month</option>
                                    <option value="3months">Last 3 Months</option>
                                    <option value="6months">Last 6 Months</option>
                                    <option value="year">This Year</option>
                                </select>

                                <label for="formFilterLatest">Form Type</label>
                                <div class="form-list">
                                    <select id="formFilterLatest" size="5">
                                        <option value="all">All Forms</option>
                                        <option value="Form1-01">Form1-01</option>
                                        <option value="Form1-02">Form1-02</option>
                                        <option value="Form1-03">Form1-03</option>
                                        <option value="Form1-09">Form1-09</option>
                                        <option value="Form1-11">Form1-11</option>
                                        <option value="Form1-13">Form1-13</option>
                                        <option value="Form1-14">Form1-14</option>
                                        <option value="Form1-16">Form1-16</option>
                                        <option value="Form1-18">Form1-18</option>
                                        <option value="Form1-19">Form1-19</option>
                                        <option value="Form1-20">Form1-20</option>
                                        <option value="Form1-21">Form1-21</option>
                                        <option value="Form1-22">Form1-22</option>
                                        <option value="Form1-24">Form1-24</option>
                                        <option value="Form1-25">Form1-25</option>
                                        <option value="Form1-26">Form1-26</option>
                                    </select>
                                </div>

                                <button id="applyFilterLatest">Apply Filter</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-container1">
                    <table class="styled-table">
                        <thead>
                            <tr>
                                <th>Reference Number</th>
                                <th>Request Type</th>
                                <th>Request Date</th>
                                <th>Release Date</th>
                                <th>Attachment</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($latestRequests as $req)
                                <tr
                                    class="request-row {{ isset($highlight) && $highlight == $req->payment_reference ? 'highlighted' : '' }}">
                                    <td>{{ $req->payment_reference }}</td>
                                    <td>{{ ucfirst($req->form_type ?? 'N/A') }}</td>
                                    <td>{{ $req->created_at ? $req->created_at->format('d M Y') : 'N/A' }}</td>
                                    <td>{{ $req->updated_at ? $req->updated_at->format('d M Y') : 'N/A' }}</td>
                                    <td class="see-more">
                                        <a
                                            href="{{ route('admin.req.attachments', ['formToken' => $req->form_token]) }}">
                                            See
                                            more <img src="{{ asset('images/see-icon.png') }}" alt="See"></a>

                                    </td>
                                    <td> {{ $req->form->last_name }} {{ $req->form->first_name }}</td>

                                    </td>
                                    @php
                                        $rawStatus = $req->status ?? 'Pending';
                                        $status = strtolower(trim($rawStatus));
                                        switch ($status) {
                                            case 'done':
                                                $statusClass = 'paid';
                                                $statusLabel = 'Done';
                                                break;
                                            case 'cancel':
                                            case 'cancelled':
                                                $statusClass = 'failed';
                                                $statusLabel = 'Cancelled';
                                                break;
                                            case 'declined':
                                                $statusClass = 'failed';
                                                $statusLabel = 'Declined';
                                                break;
                                            default:
                                                $statusClass = 'pending';
                                                $statusLabel = ucwords($rawStatus);
                                                break;
                                        }
                                    @endphp
                                    <td class="{{ $statusClass }}"></td>
                                    <td>
                                        @if (strtolower($req->form_type) === 'form1-02')
                                            <a href="{{ route('admin.generate-certificate', ['token' => $req->form_token]) }}"
                                                class="btn btn-primary btn-sm" target="_blank"
                                                style="background:#28a745;color:#fff;text-decoration:none;padding:6px 12px;border-radius:4px;display:inline-block;font-size:12px;">
                                                Generate Certificate
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
</x-admin-layout>
