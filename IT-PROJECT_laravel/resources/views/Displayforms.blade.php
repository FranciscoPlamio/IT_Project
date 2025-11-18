<x-layout :title="'Showcase Forms'">
    <main>
        <div class="forms-gallery-container forms-gallery--md forms-gallery--comfy">

            <div class="forms-gallery-header">LIST OF HARMONIZED FORMS</div>
            <p class="forms-gallery-note">Please note that a PDF reader application or equivalent browser plug‑in is
                required to view these forms.</p>

            <h3 class="forms-gallery-section">Operator Certification & Exams</h3>
            <div class="forms-gallery-grid">
                <div class="form-card">
                    <img src="{{ asset('images/Form1-01_image.png') }}"
                        alt="Form No. NTC 1-01 - Application for Radio Operator Examination"
                        style="display:block;width:100%;height:auto;">

                    <div class="form-card-caption">
                        <span class="form-card-title" style="pointer-events:none">Form No. NTC 1-01 - Application for
                            Radio Operator Examination</span>

                        <div style="margin-top:10px; display:flex; gap:10px; flex-wrap:wrap; justify-content:center;">

                            <a href="{{ asset('forms/Form-No.-NTC-1-01.pdf') }}" target="_blank" rel="noopener"
                                style="background:#0d6efd;color:#fff;text-decoration:none;padding:8px 12px;border-radius:4px;display:inline-block;">
                                View PDF
                            </a>

                            <a href="{{ route('showFormInformation', ['formType' => '1-01']) }}"
                                style="background:#09e84c;color:#fff;text-decoration:none;padding:8px 12px;border-radius:4px;display:inline-block;">
                                Sign up
                            </a>
                            <a href="{{ route('requirements') }}"
                                style="background:#6c757d;color:#fff;text-decoration:none;padding:8px 12px;border-radius:4px;display:inline-block;">
                                Requirements
                            </a>
                        </div>
                    </div>
                </div>
                <div class="form-card">
                    <img src="{{ asset('images/Form1-02_image.png') }}"
                        alt="Form No. NTC 1-02 - Application for Radio Operator Certificate"
                        style="display:block;width:100%;height:auto;">

                    <div class="form-card-caption">
                        <span class="form-card-title" style="pointer-events:none">Form No. NTC 1-02 - Application for
                            Radio Operator Certificate</span>

                        <div style="margin-top:10px; display:flex; gap:10px; flex-wrap:wrap; justify-content:center;">

                            <a href="{{ asset('forms/Form-No.-NTC-1-02.pdf') }}" target="_blank" rel="noopener"
                                style="background:#0d6efd;color:#fff;text-decoration:none;padding:8px 12px;border-radius:4px;display:inline-block;">
                                View PDF
                            </a>

                            <a href="{{ route('showFormInformation', ['formType' => '1-02']) }}"
                                style="background:#09e84c;color:#fff;text-decoration:none;padding:8px 12px;border-radius:4px;display:inline-block;">
                                Sign up
                            </a>
                            <a href="{{ route('requirements') }}"
                                style="background:#6c757d;color:#fff;text-decoration:none;padding:8px 12px;border-radius:4px;display:inline-block;">
                                Requirements
                            </a>
                        </div>
                    </div>
                </div>
                @foreach ([3] as $index)
                    @if (isset($forms[$index]))
                        @php $form = $forms[$index]; @endphp
                        <x-form-card title="{{ $form['title'] }}" formType="{{ $form['formType'] }}"
                            image="{{ $form['image'] }}" pdf="{{ $form['pdf'] }}" />
                    @endif
                @endforeach
            </div>

            <h3 class="forms-gallery-section" style="margin-top:28px;">Station Licensing & Modifications</h3>
            <div class="forms-gallery-grid">
                @foreach ([4, 5, 12] as $index)
                    @if (isset($forms[$index]))
                        @php $form = $forms[$index]; @endphp
                        <x-form-card title="{{ $form['title'] }}" formType="{{ $form['formType'] }}"
                            image="{{ $form['image'] }}" pdf="{{ $form['pdf'] }}" />
                    @endif
                @endforeach
            </div>

            <h3 class="forms-gallery-section" style="margin-top:28px;">Permits (Purchase/Transport/Temporary)</h3>
            <div class="forms-gallery-grid">
                @foreach ([3, 6, 7] as $index)
                    @if (isset($forms[$index]))
                        @php $form = $forms[$index]; @endphp
                        <x-form-card title="{{ $form['title'] }}" formType="{{ $form['formType'] }}"
                            image="{{ $form['image'] }}" pdf="{{ $form['pdf'] }}" />
                    @endif
                @endforeach
            </div>

            <h3 class="forms-gallery-section" style="margin-top:28px;">Dealership & Accreditation</h3>
            <div class="forms-gallery-grid">
                @foreach ([8] as $index)
                    @if (isset($forms[$index]))
                        @php $form = $forms[$index]; @endphp
                        <x-form-card title="{{ $form['title'] }}" formType="{{ $form['formType'] }}"
                            image="{{ $form['image'] }}" pdf="{{ $form['pdf'] }}" />
                    @endif
                @endforeach
            </div>

            <h3 class="forms-gallery-section" style="margin-top:28px;">Service/Equipment Registration</h3>
            <div class="forms-gallery-grid">
                @foreach ([9, 10] as $index)
                    @if (isset($forms[$index]))
                        @php $form = $forms[$index]; @endphp
                        <x-form-card title="{{ $form['title'] }}" formType="{{ $form['formType'] }}"
                            image="{{ $form['image'] }}" pdf="{{ $form['pdf'] }}" />
                    @endif
                @endforeach

            </div>

            <h3 class="forms-gallery-section" style="margin-top:28px;">Duplicates / Reissues</h3>
            <div class="forms-gallery-grid">
                @foreach ([11] as $index)
                    @if (isset($forms[$index]))
                        @php $form = $forms[$index]; @endphp
                        <x-form-card title="{{ $form['title'] }}" formType="{{ $form['formType'] }}"
                            image="{{ $form['image'] }}" pdf="{{ $form['pdf'] }}" />
                    @endif
                @endforeach
            </div>

            <h3 class="forms-gallery-section" style="margin-top:28px;">Affidavits & Undertakings</h3>
            <div class="forms-gallery-grid">
                <a class="form-card" href="{{ asset('forms/Form-No.-NTC-1-24.pdf') }}" target="_blank"
                    rel="noopener"><img src="{{ asset('images/Form1-24_image.png') }}"
                        alt="Form No. NTC 1-24 — Affidavit of Ownership and Loss with Undertaking">
                    <div class="form-card-caption"><span class="form-card-title">Form No. NTC 1-24 — Affidavit of
                            Ownership and Loss with Undertaking</span></div>
                </a>
            </div>

            <h3 class="forms-gallery-section" style="margin-top:28px;">Complaints</h3>
            <div class="forms-gallery-grid">
                @foreach ([14, 15] as $index)
                    @if (isset($forms[$index]))
                        @php $form = $forms[$index]; @endphp
                        <x-form-card title="{{ $form['title'] }}" formType="{{ $form['formType'] }}"
                            image="{{ $form['image'] }}" pdf="{{ $form['pdf'] }}" />
                    @endif
                @endforeach
            </div>
        </div>
    </main>
</x-layout>
