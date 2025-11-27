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
            @endphp

            <section class="info-card" data-collapsible>
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
                                <p class="info-value">{{ getDisplayValue($key, $value, $licenseDescriptions) ?: '—' }}
                                </p>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>

            @if ($form->form->or)
                <section class="info-card" data-collapsible data-default-collapsed="true">
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
                <section class="info-card" data-collapsible data-default-collapsed="true">
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

            <section class="info-card" data-collapsible>
                <header class="section-heading">
                    <div>
                        <p class="section-eyebrow">Attachments</p>
                        <h2>Uploaded Requirements</h2>
                        <p class="section-description">
                            Cross-check every attachment before marking the request as done.
                            <a href="{{ route('showFormInformation', ['formType' => '1-01']) }}" target="_blank"
                                class="inline-link">View requirement list</a>
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
                        @forelse ($files as $file)
                            @php
                                $url = route('admin.viewFile', ['path' => $file]);
                                $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                                $newFileName = basename($file);
                                $newFileName = preg_replace('/_\d+\..+$/', '', $newFileName);
                                $newFileName = ucwords(str_replace('_', ' ', $newFileName));
                            @endphp
                            <article class="attachment-card">
                                <header class="attachment-card-header">
                                    <h3>{{ $newFileName === 'Coa' ? 'Certificate of Attendance' : $newFileName }}</h3>
                                    <span class="attachment-badge">{{ strtoupper($ext) }}</span>
                                </header>
                                <div class="attachment-preview">
                                    @if ($ext === 'pdf')
                                        <iframe src="{{ $url }}"
                                            title="{{ $newFileName }} preview"></iframe>
                                    @elseif (in_array($ext, ['jpg', 'jpeg', 'png']))
                                        <img src="{{ $url }}" alt="{{ $newFileName }} preview">
                                    @else
                                        <p class="info-value">Preview not available. Use the button below to open the
                                            file.</p>
                                    @endif
                                </div>
                                <div class="attachment-actions">
                                    <a href="{{ $url }}" target="_blank" class="btn btn-primary">Open in new
                                        tab</a>
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
</x-admin-layout>
