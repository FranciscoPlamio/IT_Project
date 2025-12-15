<x-admin-layout :title="'Request Management'">

    <x-slot:head>
        @vite(['resources/css/adminside/req-management.css', 'resources/js/adminside/req-management.js'])
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <style>
            .action-placeholder {
                font-size: 0.9rem;
                color: #65686d;
            }

            .action-cell {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            .status-badge {
                display: inline-flex;
                align-items: center;
                gap: 6px;
                padding: 6px 12px;
                border-radius: 20px;
                font-size: 11px;
                font-weight: 600;
                text-transform: uppercase;
                letter-spacing: 0.5px;
                white-space: nowrap;
            }

            .status-badge.done {
                background: #f0fdf4;
                color: #22c55e;
                border: 1px solid #bbf7d0;
            }

            .status-badge.progress {
                background: #fffbeb;
                color: #f59e0b;
                border: 1px solid #fed7aa;
            }

            .status-badge img {
                width: 14px;
                height: 14px;
            }

            .status-badge a {
                color: inherit;
                text-decoration: underline;
            }

            .confirm-modal {
                position: fixed;
                inset: 0;
                background: rgba(0, 0, 0, 0.5);
                display: flex;
                justify-content: center;
                align-items: center;
                z-index: 999;
            }

            .confirm-modal h3 {
                margin-bottom: 15px;
            }

            .confirm-modal p {
                margin-bottom: 15px;
            }

            .confirm-modal__content {
                background: white;
                padding: 20px 25px;
                border-radius: 10px;
                width: 420px;
                text-align: center;
            }

            .btn-secondary,
            .btn-primary {
                border: none;
                border-radius: 10px;
                padding: 10px 18px;
                font-weight: 600;
                cursor: pointer;
                transition: transform 0.2s ease, box-shadow 0.2s ease;
            }

            .btn-secondary {
                background: #e5e7eb;
                color: #374151;
            }

            .btn-primary {
                background: #213c78;
                color: #fff;
            }

            .btn-secondary:hover,
            .btn-primary:hover {
                transform: translateY(-1px);
                box-shadow: 0 8px 20px -15px rgba(15, 23, 42, 0.8);
            }
        </style>
    </x-slot:head>


    <!-- Main Content -->
    <div class="main">
        <div id="flash-message"
            style="
    position: fixed;
    top: 20px;
    right: 20px;
    padding: 12px 20px;
    background-color: #4CAF50;
    color: white;
    border-radius: 5px;
    opacity: 0;
    transition: opacity 0.5s;
    pointer-events: none;
">
        </div>


        <h1>Request Management</h1>

        <div class="card full-page">
            <!-- Latest Request Section -->
            <section class="half-section">
                <div class="card-header">
                    <h2>Latest Request</h2>
                    <div class="actions">
                        <div class="search-bar">
                            <input type="text" id="latestSearch" placeholder="Search">
                            <img src="{{ asset('images/search-icon.png') }}" alt="Search">
                        </div>
                        <div class="filter-bar">
                            <img src="{{ asset('images/filter-icon.png') }}" alt="Filter" id="latestFilterIcon">
                            <div class="filter-dropdown" id="latestFilterDropdown">
                                <h4>Filter by:</h4>

                                <label for="latestDateFilter">Date Range</label>
                                <select id="latestDateFilter">
                                    <option value="all">All Dates</option>
                                    <option value="week">This Week</option>
                                    <option value="month">This Month</option>
                                    <option value="3months">Last 3 Months</option>
                                    <option value="6months">Last 6 Months</option>
                                    <option value="year">This Year</option>
                                </select>

                                <label for="latestFormFilter">Form Type</label>
                                <div class="form-list">
                                    <select id="latestFormFilter" size="5">
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

                                <button id="applyLatestFilter">Apply Filter</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-container">
                    <table class="styled-table">
                        <thead>
                            <tr>
                                <th>Reference Number</th>
                                <th>Request Type</th>
                                <th>Request Date</th>
                                <th>Attachment</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Remarks</th>
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

                                    <td class="see-more">
                                        <a
                                            href="{{ route('admin.req.attachments', ['formToken' => $req->form_token]) }}">
                                            See
                                            more <img src="{{ asset('images/see-icon.png') }}" alt="See"></a>

                                    </td>

                                    <td>
                                        @if ($req->form->applicant)
                                            {{ $req->form->applicant }}
                                        @else
                                            {{ $req->form->last_name }} {{ $req->form->first_name }}
                                        @endif

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
                                            default:
                                                $statusClass = 'pending';
                                                $statusLabel = ucwords($rawStatus);
                                                break;
                                        }
                                    @endphp
                                    @php
                                        $managedStatuses = ['pending', 'processing', 'declined'];
                                        $isManagedStatus = in_array($status, $managedStatuses);
                                    @endphp
                                    <td class="status-cell {{ $statusClass }}">
                                        @if ($isManagedStatus)
                                            <select class="status-select"
                                                    data-request-id="{{ $req->_id }}"
                                                    data-current-status="{{ $status }}"
                                                    onchange="handleStatusChange(this)">
                                                <option value="pending" @selected($status === 'pending')>Pending</option>
                                                <option value="processing" @selected($status === 'processing')>Processing</option>
                                                <option value="declined" @selected($status === 'declined')>Decline</option>
                                            </select>

                                            <!-- Flash message for status updates -->
                                            <p class="status-flash" id="flash-{{ $req->_id }}" style="color:green; font-size:0.85rem; display:none;"></p>

                                            @if ($req->payment_status == 'paid')
                                                <div class="status-badge done">
                                                    <img src="{{ asset('images/Done.png') }}">
                                                    <span>
                                                        <a href="{{ route('admin.req.attachments', ['formToken' => $req->form_token]) }}">
                                                            Proof of Payment Received!
                                                        </a>
                                                    </span>
                                                </div>
                                            @else
                                                @if ($req->status != 'pending')
                                                    <div class="status-badge progress">
                                                        <img src="{{ asset('images/In-prog.png') }}">
                                                        <span>Waiting for Payment</span>
                                                    </div>
                                                @endif
                                            @endif

                                            <x-admin.req-management-status :req="$req" />
                                        @else
                                            <span class="status-label">{{ $statusLabel }}</span>
                                        @endif
                                    </td>
                                    
                                    <td style="position: relative; vertical-align: top;">

                                        <form action="{{ route('admin.remarks.save', ['formId' => $req->_id]) }}"
                                            method="POST" class="remarks-form" style="position: relative;">
                                            @csrf
                                            <input type="hidden" name="user_id" value="1">
                                            <!-- ID of the row/user -->
                                            <div
                                                style="display: flex; gap: 8px; align-items: center; margin-bottom: 6px;">
                                                <input type="text" name="remarks" id="remarks-{{ $req->_id }}"
                                                    placeholder="Enter remarks"
                                                    value="{{ old('remarks', $req->remarks) }}"
                                                    style="flex: 1; min-width: 200px; padding: 6px; border: 1px solid #ccc; border-radius: 4px; font-size: 13px;">
                                                <button type="submit"
                                                    style="padding: 6px 12px; background: #2563eb; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 13px;">Send</button>
                                            </div>
                                            @if (!empty($responses))
                                                <div style="margin-top: 4px; position: relative;"
                                                    data-dropdown-parent="{{ $req->_id }}">
                                                    <button type="button" class="dropdown-toggle"
                                                        onclick="event.preventDefault(); toggleResponses('{{ $req->_id }}');"
                                                        id="toggle-{{ $req->_id }}"
                                                        style="color: #6b7280; background: none; border: none; font-size: 11px; cursor: pointer; padding: 0; display: inline-flex; align-items: center; gap: 4px;"
                                                        onmouseover="this.style.color='#2563eb';"
                                                        onmouseout="this.style.color='#6b7280';">
                                                        <span id="toggle-text-{{ $req->_id }}">Common
                                                            responses</span>
                                                        <span id="toggle-icon-{{ $req->_id }}">▼</span>
                                                    </button>
                                                    <div id="responses-{{ $req->_id }}" class="dropdown-menu"
                                                        style="display: none; position: absolute; top: 100%; left: 0; background: white; border: 1px solid #e5e7eb; border-radius: 4px; padding: 4px; margin-top: 4px; box-shadow: 0 4px 12px rgba(0,0,0,0.15); z-index: 10000; min-width: 300px; max-width: 500px; max-height: 250px; overflow-y: auto;">
                                                        @foreach ($responses as $response)
                                                            <a href="#" class="dropdown-item"
                                                                onclick="event.preventDefault(); fillRemarksInput('{{ $response }}', '{{ $req->_id }}'); closeDropdown('{{ $req->_id }}');"
                                                                style="color: #2563eb; text-decoration: none; font-size: 12px; padding: 6px 8px; border-radius: 3px; transition: background-color 0.2s; display: block;"
                                                                onmouseover="this.style.backgroundColor='#e0e7ff';"
                                                                onmouseout="this.style.backgroundColor='transparent';">
                                                                {{ $response }}
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif
                                        </form>
                                        <span class="action-placeholder">{{ $req->remarks }}</span>
                                    </td>
                                    <td class="action-cell">
                                        @if ($req->form_type === 'form1-01')
                                            @if ($req->form->admission_slip && $req->form->or)
                                                <button class="badge-btn progress"
                                                    onclick="openConfirmApproveModal('{{ $req->_id }}')"
                                                    title="Approve Request">
                                                    Approve
                                                </button>
                                            @else
                                                <span class="muted-text">—</span>
                                            @endif
                                        @elseif($req->form_type === 'form1-02' || $req->form_type === 'form1-03')
                                            @php
                                                $certificateExists = false;

                                                try {
                                                    // Check if a certificate record exists for this form token
                                                    $certificateExists = \App\Models\Certificate::where(
                                                        'form_token',
                                                        $req->form_token,
                                                    )->exists();
                                                } catch (\Exception $e) {
                                                    $certificateExists = false;
                                                }

                                            @endphp
                                            @if ($req->form->or && $certificateExists)
                                                <button class="badge-btn progress"
                                                    onclick="openConfirmApproveModal('{{ $req->_id }}')"
                                                    title="Approve Request">
                                                    Approve
                                                </button>
                                            @else
                                                <span class="muted-text">—</span>
                                            @endif
                                        @elseif($req->form_type === 'form1-09')
                                            @php
                                                // Check if certificate has been generated (exists in attachments folder)
                                                $certificateExists = false;
                                                try {
                                                    $files = Storage::disk('local')->files("forms/{$req->form_token}");
                                                    foreach ($files as $file) {
                                                        if (Str::startsWith(basename($file), 'permit')) {
                                                            $certificateExists = true;
                                                            break;
                                                        }
                                                    }
                                                } catch (\Exception $e) {
                                                    $certificateExists = false;
                                                }
                                            @endphp
                                            @if ($req->form->or && $certificateExists)
                                                <button class="badge-btn progress"
                                                    onclick="openConfirmApproveModal('{{ $req->_id }}')"
                                                    title="Approve Request">
                                                    Approve
                                                </button>
                                            @else
                                                <span class="muted-text">—</span>
                                            @endif
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
    <div class="confirm-modal" id="confirmApproveModal" style="display:none;">
        <div class="confirm-modal__content">
            <h3>Approve Request</h3>
            <p>Type <strong>"Confirm"</strong> to appove request</p>

            <input type="text" id="confirmInput" placeholder="Type Confirm"
                style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc; justify-content: center;">

            <p id="confirmWarning" style="color: red; font-size: 0.9rem; display:none; margin-top:8px;">
                Incorrect input. Please type "Confirm".
            </p>

            <div class="confirm-actions" style="margin-top: 15px;">
                <button id="confirmApproveCancel" class="btn-secondary">Cancel</button>

                <button id="confirmApproveYes" class="btn-primary" disabled>Approve</button>
            </div>
        </div>
    </div>

    <!-- PROCESSING MODAL -->
    <div class="confirm-modal" id="confirmProcessingModal" style="display:none;">
        <div class="confirm-modal__content">
            <h3>Change Status to Processing</h3>
            <p>Type <strong>"Processing"</strong> to confirm</p>
            <input type="text" id="processingInput" placeholder="Type Processing"
                style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc;">
            <p id="processingWarning" style="color: red; font-size: 0.9rem; display:none; margin-top:8px;">
                Incorrect input. Please type "Processing".
            </p>
            <div class="confirm-actions" style="margin-top: 15px;">
                <button id="processingCancel" class="btn-secondary">Cancel</button>
                <button id="processingConfirm" class="btn-primary" disabled>Confirm</button>
            </div>
        </div>
    </div>


    <!-- DECLINE MODAL -->
    <div class="confirm-modal" id="confirmDeclineModal" style="display:none;">
        <div class="confirm-modal__content">
            <h3>Change Status to Declined</h3>
            <p>Type <strong>"Decline"</strong> to confirm</p>
            <input type="text" id="declineInput" placeholder="Type Decline"
                style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc;">
            <p id="declineWarning" style="color: red; font-size: 0.9rem; display:none; margin-top:8px;">
                Incorrect input. Please type "Decline".
            </p>
            <p id="declineFlash" style="color: green; font-size: 0.9rem; display:none; margin-top:8px;">
                Form declined and email sent
            </p>
            <div class="confirm-actions" style="margin-top: 15px;">
                <button id="declineCancel" class="btn-secondary">Cancel</button>
                <button id="declineConfirm" class="btn-primary" disabled>Confirm</button>
            </div>
        </div>
    </div>

<script>
let approveId = null;
let statusActionId = null;
let statusActionType = null;

/* =======================
   APPROVE MODAL LOGIC
======================= */
document.addEventListener('DOMContentLoaded', () => {

    const confirmInput = document.getElementById("confirmInput");
    const confirmButton = document.getElementById("confirmApproveYes");
    const warning = document.getElementById("confirmWarning");

    // Live validation for Approve
    confirmInput.addEventListener("input", () => {
        if (confirmInput.value.trim() === "Confirm") {
            confirmButton.disabled = false;
            warning.style.display = "none";
        } else {
            confirmButton.disabled = true;
            warning.style.display = confirmInput.value.trim() !== "" ? "block" : "none";
        }
    });

    // Cancel Approve Modal
    document.getElementById("confirmApproveCancel").addEventListener("click", () => {
        document.getElementById("confirmApproveModal").style.display = "none";
        approveId = null;
    });

    // Confirm Approve
    confirmButton.addEventListener("click", () => {
        document.getElementById("confirmApproveModal").style.display = "none";
        updateStatus(approveId, 'approved');
    });

/* =======================
       PROCESSING MODAL LOGIC
    ======================= */
    const processingModal = document.getElementById('confirmProcessingModal');
const processingInput = document.getElementById('processingInput');
const processingConfirm = document.getElementById('processingConfirm');
const processingWarning = document.getElementById('processingWarning');
const processingCancel = document.getElementById('processingCancel');

processingInput.addEventListener('input', () => {
    processingConfirm.disabled = (processingInput.value.trim() !== 'Processing');
    processingWarning.style.display = (processingInput.value.trim() && processingInput.value.trim() !== 'Processing') ? 'block' : 'none';
});

processingCancel.onclick = () => {
    processingModal.style.display = 'none';
    statusActionId = null;
};

processingConfirm.onclick = () => {
    updateStatus(statusActionId, 'processing'); // Update DB and table flash
    processingModal.style.display = 'none';
    statusActionId = null;
};

    /* =======================
       DECLINE MODAL LOGIC
    ======================= */
    const declineModal = document.getElementById('confirmDeclineModal');
    const declineInput = document.getElementById('declineInput');
    const declineConfirm = document.getElementById('declineConfirm');
    const declineWarning = document.getElementById('declineWarning');
    const declineCancel = document.getElementById('declineCancel');
    const declineFlash = document.getElementById('declineFlash');

    // Live validation for Decline
    declineInput.addEventListener('input', () => {
        declineConfirm.disabled = (declineInput.value.trim() !== 'Decline');
        declineWarning.style.display = (declineInput.value.trim() && declineInput.value.trim() !== 'Decline') ? 'block' : 'none';
    });

    declineCancel.onclick = () => {
        declineModal.style.display = 'none';
        statusActionId = null;
    };

    declineConfirm.onclick = () => {
        declineModal.style.display = 'none';
        updateStatus(statusActionId, 'declined');
    };
});

/* =======================
   HANDLE SELECT CHANGE
======================= */
function handleStatusChange(select) {
    const newStatus = select.value;
    const requestId = select.dataset.requestId;

    // Reset select to previous value until confirmed
    select.value = select.dataset.currentStatus;

    statusActionId = requestId;

    if (newStatus === 'processing') {
        document.getElementById('confirmProcessingModal').style.display = 'flex';
        resetProcessingModal();
    } else if (newStatus === 'declined') {
        document.getElementById('confirmDeclineModal').style.display = 'flex';
        resetDeclineModal();
    }
}

/* =======================
   RESET MODALS
======================= */
function resetProcessingModal() {
    processingInput.value = '';
    processingWarning.style.display = 'none';
    processingConfirm.disabled = true;
}

function resetDeclineModal() {
    document.getElementById('declineInput').value = '';
    document.getElementById('declineWarning').style.display = 'none';
    document.getElementById('declineConfirm').disabled = true;
}

/* =======================
   UPDATE DATABASE & FLASH
======================= */
function updateStatus(id, status) {
    fetch(`/admin/requests/${id}/status`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ status })
    })
    .then(response => response.json())
    .then(data => {
        // Update select
        const select = document.querySelector(`.status-select[data-request-id='${id}']`);
        if(select) {
            select.value = status;
            select.dataset.currentStatus = status;
        }

        // Update table cell class
        const statusCell = select.closest('.status-cell');
        if(statusCell) {
            statusCell.className = 'status-cell ' + status;
        }

        // Show flash message in table row
        const flash = document.getElementById('flash-' + id);
        if(flash) {
            if(status === 'processing') flash.textContent = 'Form status updated to Processing';
            if(status === 'declined') flash.textContent = 'Form declined and email sent';
            flash.style.display = 'block';
            setTimeout(() => flash.style.display = 'none', 3000);
        }
    })
    .catch(err => console.error(err));
}

/* =======================
   REMARKS DROPDOWN LOGIC
======================= */
function fillRemarksInput(responseText, formId) {
    const remarksInput = document.getElementById('remarks-' + formId);
    if (remarksInput && responseText) {
        remarksInput.value = responseText;
        remarksInput.focus();
    }
}

function closeDropdown(formId) {
    const responsesDiv = document.getElementById('responses-' + formId);
    const toggleIcon = document.getElementById('toggle-icon-' + formId);
    const toggleButton = document.getElementById('toggle-' + formId);

    if (responsesDiv) {
        const originalParent = responsesDiv.getAttribute('data-original-parent');
        if (originalParent && responsesDiv.parentElement === document.body) {
            const parentElement = document.querySelector('[data-dropdown-parent="' + formId + '"]');
            if (parentElement) {
                parentElement.appendChild(responsesDiv);
            }
        }
        responsesDiv.style.display = 'none';
        responsesDiv.style.position = 'absolute';
        responsesDiv.style.top = '';
        responsesDiv.style.left = '';
        responsesDiv.style.right = '';
    }
    if (toggleIcon) {
        toggleIcon.textContent = '▼';
    }
}

function toggleResponses(formId) {
    const responsesDiv = document.getElementById('responses-' + formId);
    const toggleIcon = document.getElementById('toggle-icon-' + formId);
    const toggleButton = document.getElementById('toggle-' + formId);

    document.querySelectorAll('.dropdown-menu').forEach(menu => {
        if (menu.id !== 'responses-' + formId) {
            const otherFormId = menu.id.replace('responses-', '');
            closeDropdown(otherFormId);
        }
    });

    if (responsesDiv && toggleIcon && toggleButton) {
        if (responsesDiv.style.display === 'none' || !responsesDiv.style.display) {
            const buttonRect = toggleButton.getBoundingClientRect();
            const viewportHeight = window.innerHeight;
            const viewportWidth = window.innerWidth;

            if (!responsesDiv.getAttribute('data-original-parent')) {
                responsesDiv.setAttribute('data-original-parent', formId);
            }

            if (responsesDiv.parentElement !== document.body) {
                document.body.appendChild(responsesDiv);
            }

            responsesDiv.style.position = 'fixed';
            responsesDiv.style.visibility = 'hidden';
            responsesDiv.style.display = 'block';
            const dropdownHeight = responsesDiv.offsetHeight;
            const dropdownWidth = responsesDiv.offsetWidth;
            responsesDiv.style.visibility = 'visible';

            const spaceBelow = viewportHeight - buttonRect.bottom;
            const spaceAbove = buttonRect.top;

            let topPosition = (spaceBelow >= dropdownHeight + 4 || spaceBelow >= spaceAbove) ? buttonRect.bottom + 4 : buttonRect.top - dropdownHeight - 4;
            let leftPosition = buttonRect.left;
            if (leftPosition + dropdownWidth > viewportWidth) {
                leftPosition = Math.max(10, viewportWidth - dropdownWidth - 10);
            }

            responsesDiv.style.top = topPosition + 'px';
            responsesDiv.style.left = leftPosition + 'px';
            responsesDiv.style.right = 'auto';
            responsesDiv.setAttribute('data-position', spaceBelow >= dropdownHeight + 4 ? 'below' : 'above');
            responsesDiv.style.display = 'block';
            toggleIcon.textContent = '▲';
        } else {
            closeDropdown(formId);
        }
    }
}

// Close dropdown when clicking outside
document.addEventListener('click', function(event) {
    const clickedDropdown = event.target.closest('.dropdown-menu');
    const clickedToggle = event.target.closest('.dropdown-toggle');

    if (!clickedDropdown && !clickedToggle) {
        document.querySelectorAll('.dropdown-menu').forEach(menu => {
            const formId = menu.id.replace('responses-', '');
            closeDropdown(formId);
        });
    }
});

// Update dropdown position on scroll
window.addEventListener('scroll', function() {
    document.querySelectorAll('.dropdown-menu').forEach(menu => {
        if (menu.style.display === 'block' && menu.style.position === 'fixed') {
            const formId = menu.id.replace('responses-', '');
            const toggleButton = document.getElementById('toggle-' + formId);
            if (toggleButton) {
                const buttonRect = toggleButton.getBoundingClientRect();
                const viewportHeight = window.innerHeight;
                const viewportWidth = window.innerWidth;
                const dropdownHeight = menu.offsetHeight;
                const dropdownWidth = menu.offsetWidth;

                const spaceBelow = viewportHeight - buttonRect.bottom;
                const spaceAbove = buttonRect.top;

                let topPosition = (spaceBelow >= dropdownHeight + 4 || spaceBelow >= spaceAbove) ? buttonRect.bottom + 4 : buttonRect.top - dropdownHeight - 4;
                let leftPosition = buttonRect.left;
                if (leftPosition + dropdownWidth > viewportWidth) {
                    leftPosition = Math.max(10, viewportWidth - dropdownWidth - 10);
                }

                menu.style.top = topPosition + 'px';
                menu.style.left = leftPosition + 'px';
            }
        }
    });
}, true);

// Close dropdowns on window resize
window.addEventListener('resize', function() {
    document.querySelectorAll('.dropdown-menu').forEach(menu => {
        const formId = menu.id.replace('responses-', '');
        closeDropdown(formId);
    });
});
</script>
</x-admin-layout>
