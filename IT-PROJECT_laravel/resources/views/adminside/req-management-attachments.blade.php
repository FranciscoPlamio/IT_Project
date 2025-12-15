<x-admin-layout :title="'Request Management'">

    <x-slot:head>
        @vite(['resources/css/adminside/req-management.css', 'resources/js/adminside/req-management.js'])
    </x-slot:head>


    <!-- Main Content -->
    <div class="main">
        <div class="page-heading">
            <p class="page-eyebrow">Admin · Request Management</p>
            <h1>Form Review & Attachments</h1>
        </div>

        <div class="card-stack">
            @php
                $licenseDescriptions = [
                    'class_a_e8910_code5' => 'Class A - Elements 8, 9, 10 & Code (5 wpm)',
                    'class_a_code5_only' => 'Class A - Code (5 wpm) Only',
                    'class_b_e567' => 'Class B - Elements 5, 6 & 7',
                    'class_b_e2' => 'Class B - Element 2',
                    'class_c_e234' => 'Class C - Elements 2, 3 & 4',
                    'class_d_e2' => 'Class D - Element 2',
                    '1rtg_e1256_code25' => '1RTG - Elements 1, 2, 5, 6 & Code (25/20 wpm)',
                    '1rtg_code25' => '1RTG - Code (25/20 wpm)',
                    '2rtg_e1256_code16' => '2RTG - Elements 1, 2, 5, 6 & Code (16 wpm)',
                    '2rtg_code16' => '2RTG - Code (16 wpm)',
                    '3rtg_e125_code16' => '3RTG - Elements 1, 2, 5 & Code (16 wpm)',
                    '3rtg_code16' => '3RTG - Code (16 wpm)',
                    '1phn_e1234' => '1PHN - Elements 1, 2, 3 & 4',
                    '2phn_e123' => '2PHN - Elements 1, 2 & 3',
                    '3phn_e12' => '3PHN - Elements 1 & 2',
                    'rroc_aircraft_e1' => 'RROC - Aircraft - Element 1',
                ];

                function getDisplayValue($key, $rawValue, $descriptions)
                {
                    if (isset($descriptions[$rawValue])) {
                        return $descriptions[$rawValue];
                    }
                    return $rawValue;
                }
                function formatKey($key)
                {
                    if ($key === 'dob') {
                        $key = 'Date of Birth';
                    }
                    return ucwords(str_replace('_', ' ', $key));
                }

                function formatDateAndTime($value) {}

                // Logic for Generated Files
                $generatedFiles = collect([]);
                $certificate = \App\Models\Certificate::where('form_token', $form->form_token)->first();

                // 1. Certificates
                if ($certificate) {
                    $certificatePath = "certificates/{$certificate->certificate_no}.pdf";
                    if (Illuminate\Support\Facades\Storage::disk('local')->exists($certificatePath)) {
                        $generatedFiles->push($certificatePath);
                    }
                }

                // 2. Permits & Receipts (scanned from files list)
                // Filter out files that look like generated permits or official receipts
                $detectedGeneratedFiles = $files->filter(function ($path) {
                    $filename = basename($path);
                    return (\Illuminate\Support\Str::startsWith($filename, 'permit_') ||
                        \Illuminate\Support\Str::startsWith($filename, 'official_receipt_')) &&
                        \Illuminate\Support\Str::endsWith(strtolower($filename), '.pdf');
                });

                $generatedFiles = $generatedFiles->merge($detectedGeneratedFiles);
            @endphp

            <section id="section-applicant-details" class="info-card" data-collapsible>
                <header class="section-heading">
                    <div>
                        <p class="section-eyebrow">Applicant Details</p>
                        <h2>Submitted Form Snapshot</h2>
                        <p class="section-description">
                            Reference:
                            <strong>{{ $form->payment_reference ?? '—' }}</strong> ·
                            Submitted {{ optional($form->form->created_at)->format('F d, Y h:i A') ?? '—' }}
                        </p>
                    </div>
                    <button type="button" class="section-toggle" data-collapsible-trigger aria-expanded="true">
                        <span data-toggle-label>Hide details</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                            class="chevron-icon" data-toggle-icon>
                            <path stroke-linecap="round" stroke-linejoin="round" d="m6 9 6 6 6-6" />
                        </svg>
                    </button>
                </header>

                <div class="section-body" data-collapsible-content>
                    <div class="info-grid">
                        @foreach ($form->form->getAttributes() as $key => $value)
                            @continue (in_array($key, ['form_token', 'user_id', 'created_at', 'updated_at', 'id', 'or',
                            'admission_slip']))
                            @php
                                if ($key === 'needs') {
                                    $value = $value ? 'Yes' : 'None';
                                } elseif ($key === 'dob') {
                                    $value = \Carbon\Carbon::parse($value)->format('F d, Y');
                                }
                            @endphp
                            <article class="info-item">
                                <p class="info-label">{{ formatKey($key) }}</p>
                                @if ($form->form_type === 'form1-01')
                                    <p class="info-value">
                                        {{ getDisplayValue($key, $value, $licenseDescriptions) ?: '—' }}
                                    </p>
                                @elseif ($form->form_type === 'form1-03' || $form->form_type === 'form1-09')
                                    <p class="info-value">
                                        {{ $value ?: '—' }}
                                    </p>
                                @else
                                    <p class="info-value">
                                        {{ getDisplayValue($key, $value, $licenseDescriptions) ?: '—' }}
                                    </p>
                                @endif
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>

            @if ($form->form->or)
                <section id="section-official-receipt" class="info-card" data-collapsible>
                    <header class="section-heading">
                        <div>
                            <p class="section-eyebrow">Official Receipt</p>
                            <h2>Payment Acknowledgment</h2>
                            <p class="section-description">Double-check OR fields before final approval.</p>
                        </div>
                        <button type="button" class="section-toggle" data-collapsible-trigger aria-expanded="false">
                            <span data-toggle-label>Show details</span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                                class="chevron-icon" data-toggle-icon>
                                <path stroke-linecap="round" stroke-linejoin="round" d="m6 9 6 6 6-6" />
                            </svg>
                        </button>
                    </header>

                    <div class="section-body" data-collapsible-content>
                        <div class="info-grid">
                            @foreach ($form->form->or as $key => $value)
                                <article class="info-item">
                                    <p class="info-label">{{ formatKey($key) }}</p>
                                    @if ($key == 'or_date')
                                        <p class="info-value">{{ $form->form->formatted_or_date }}</p>
                                    @else
                                        <p class="info-value">{{ $value ?: '—' }}</p>
                                    @endif
                                </article>
                            @endforeach
                        </div>
                    </div>
                </section>
            @endif

            @if ($form->form->admission_slip)
                <section id="section-admission-slip" class="info-card" data-collapsible>
                    <header class="section-heading">
                        <div>
                            <p class="section-eyebrow">Admission Slip</p>
                            <h2>Exam Schedule Overview</h2>
                            <p class="section-description">Keep these specifics handy when coordinating with the
                                applicant.</p>
                        </div>
                        <button type="button" class="section-toggle" data-collapsible-trigger aria-expanded="false">
                            <span data-toggle-label>Show details</span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                                class="chevron-icon" data-toggle-icon>
                                <path stroke-linecap="round" stroke-linejoin="round" d="m6 9 6 6 6-6" />
                            </svg>
                        </button>
                    </header>

                    <div class="section-body" data-collapsible-content>
                        <div class="info-grid">
                            @foreach ($form->form->admission_slip as $key => $value)
                                <article class="info-item">
                                    <p class="info-label">{{ formatKey($key) }}</p>
                                    @if ($key == 'date_of_exam')
                                        <p class="info-value">{{ $form->form->formatted_date_exam }}</p>
                                    @elseif ($key == 'time_of_exam')
                                        <p class="info-value">{{ $form->form->formatted_time_exam }}</p>
                                    @else
                                        <p class="info-value">{{ $value ?: '—' }}</p>
                                    @endif
                                </article>
                            @endforeach
                        </div>
                    </div>
                </section>
            @endif

            @if ($generatedFiles->isNotEmpty())
                <section id="section-issued-documents" class="info-card" data-collapsible>
                    <header class="section-heading">
                        <div>
                            <p class="section-eyebrow">System Generated</p>
                            <h2>Issued Documents</h2>
                            <p class="section-description">
                                Official certificates and permits generated for this request.
                            </p>
                        </div>
                        <button type="button" class="section-toggle" data-collapsible-trigger aria-expanded="true">
                            <span data-toggle-label>Hide details</span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                                class="chevron-icon" data-toggle-icon>
                                <path stroke-linecap="round" stroke-linejoin="round" d="m6 9 6 6 6-6" />
                            </svg>
                        </button>
                    </header>

                    <div class="section-body" data-collapsible-content>
                        <div class="attachment-grid">
                            @foreach ($generatedFiles as $file)
                                @php
                                    $url = route('admin.viewFile', ['path' => $file]);
                                    $fileName = basename($file);

                                    // Default display name
                                    $displayName = $fileName;

                                    if ($certificate && $file === "certificates/{$certificate->certificate_no}.pdf") {
                                        $displayName = 'Certificate - ' . $certificate->certificate_no;
                                    } elseif (\Illuminate\Support\Str::startsWith($fileName, 'permit_')) {
                                        $displayName = 'OfficialPermit';
                                    } elseif (\Illuminate\Support\Str::startsWith($fileName, 'official_receipt_')) {
                                        $displayName = 'Official Receipt';
                                    }
                                @endphp
                                <article class="attachment-card">
                                    <header class="attachment-card-header">
                                        <h3>{{ $displayName }}</h3>
                                        <span class="attachment-badge">PDF</span>
                                    </header>

                                    <div class="attachment-preview">
                                        <iframe src="{{ $url }}"
                                            title="{{ $displayName }} preview"></iframe>
                                    </div>

                                    <div class="attachment-actions">
                                        <a href="{{ $url }}" target="_blank" class="btn btn-primary">Open</a>
                                        @if ($certificate && $file === "certificates/{$certificate->certificate_no}.pdf")
                                            <a href="{{ route('admin.certificates.verify') }}?certificate_no={{ urlencode($certificate->certificate_no) }}"
                                                class="btn btn-success">
                                                Verify
                                            </a>
                                        @endif
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                </section>
            @endif

            <section id="section-attachments" class="info-card" data-collapsible>
                <header class="section-heading">
                    <div>
                        <p class="section-eyebrow">Attachments</p>
                        <h2>Uploaded Requirements</h2>
                        <p class="section-description">
                            Cross-check every attachment before marking the request as done.
                            @if ($form->form_type === 'form1-01')
                                <a href="{{ route('showFormInformation', ['formType' => '1-01']) }}" target="_blank"
                                    class="inline-link">View requirement list</a>
                            @elseif ($form->form_type === 'form1-03')
                                <a href="{{ route('showFormInformation', ['formType' => '1-03']) }}" target="_blank"
                                    class="inline-link">View requirement list</a>
                            @endif
                        </p>
                    </div>
                    <button type="button" class="section-toggle" data-collapsible-trigger aria-expanded="true">
                        <span data-toggle-label>Hide details</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                            class="chevron-icon" data-toggle-icon>
                            <path stroke-linecap="round" stroke-linejoin="round" d="m6 9 6 6 6-6" />
                        </svg>
                    </button>
                </header>

                <div class="section-body" data-collapsible-content>
                    <div class="attachment-grid">
                        @php
                            // Show only user-uploaded files here (exclude generated files)
                            $allFiles = $files->diff($generatedFiles);
                        @endphp

                        @forelse ($allFiles as $file)
                            @php
                                $url = route('admin.viewFile', ['path' => $file]);
                                $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                                $fileName = basename($file);

                                // Clean display name
                                $displayName = preg_replace('/_\d+\..+$/', '', $fileName);
                                $displayName = ucwords(str_replace(['_', '-'], ' ', $displayName));

                                // Check if filename or display name contains "certificate_photocopy" (case-insensitive)
                                $isCertificate =
                                    Str::contains(strtolower($fileName), 'certificate_photocopy') ||
                                    Str::contains(strtolower($displayName), 'certificate') ||
                                    Str::contains(strtolower($displayName), 'coa');
                            @endphp

                            <article class="attachment-card">
                                <header class="attachment-card-header">
                                    <h3>{{ $displayName === 'Coa' ? 'Certificate of Attendance' : $displayName }}</h3>
                                    <span class="attachment-badge">{{ strtoupper($ext) }}</span>
                                </header>

                                <div class="attachment-preview">
                                    @if ($ext === 'pdf')
                                        <iframe src="{{ $url }}"
                                            title="{{ $displayName }} preview"></iframe>
                                    @elseif (in_array($ext, ['jpg', 'jpeg', 'png']))
                                        <img src="{{ $url }}" alt="{{ $displayName }} preview">
                                    @else
                                        <p class="info-value">Preview not available. Use the button below to open the
                                            file.</p>
                                    @endif
                                </div>

                                <div class="attachment-actions">
                                    <a href="{{ $url }}" target="_blank" class="btn btn-primary">Open in
                                        new tab</a>

                                    {{-- Show Verify button only for certificate photocopies or generated certificates --}}
                                    @if ($isCertificate)
                                        <a href="{{ route('admin.certificates.verify', ['certificate_no' => '']) }}"
                                            onclick="event.preventDefault(); 
                let certNo = prompt('Enter certificate number to verify:'); 
                if(certNo) { window.location='{{ route('admin.certificates.verify') }}?certificate_no=' + encodeURIComponent(certNo); }"
                                            class="btn btn-success ">
                                            Verify
                                        </a>
                                    @endif
                                </div>
                            </article>
                        @empty
                            <p class="empty-state">No attachments were uploaded for this form.</p>
                        @endforelse
                    </div>
                </div>

            </section>
        </div>
    </div>

    <!-- Verify Certificate Modal -->
    <div id="verifyModal" class="modal" style="display:none;">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3>Verify Certificate</h3>
            <form id="verifyForm" method="POST" action="{{ route('admin.certificates.verify.submit') }}">
                @csrf
                <input type="hidden" name="file" id="modalFile">
                <label for="certificate_no">Certificate Number:</label>
                <input type="text" name="certificate_no" id="certificateNo" required>
                <button type="submit" class="btn btn-success">Verify</button>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('verifyModal');
            const modalFileInput = document.getElementById('modalFile');
            const closeModal = modal.querySelector('.close');

            document.querySelectorAll('.verify-btn').forEach(button => {
                button.addEventListener('click', function() {
                    modalFileInput.value = this.dataset.file; // pass the file path
                    modal.style.display = 'block';
                });
            });

            closeModal.addEventListener('click', function() {
                modal.style.display = 'none';
            });

            window.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.style.display = 'none';
                }
            });
        });
    </script>
</x-admin-layout>
