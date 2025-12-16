<x-layout :title="'Showcase Forms'">
    <main>
        <div class="forms-gallery-container forms-gallery--md forms-gallery--comfy">

            <div class="forms-gallery-header">LIST OF HARMONIZED FORMS</div>
            <p class="forms-gallery-note">Please note that a PDF reader application or equivalent browser plug‑in is
                required to view these forms.</p>

            <!-- SEARCH -->
            <div class="max-w-5xl mx-auto mt-6">

                <!-- Search Bar -->
                <div class="mb-6">
                    <input type="text" id="searchInput" placeholder="Search form number or title..."
                        class="w-full px-4 py-2 border bg-white border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Forms Grid -->
                <div id="formsGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                    @foreach ($forms as $form)
                        <div class="form-card bg-white shadow-lg rounded-lg hidden border border-gray-200 p-4 transition hover:shadow-xl"
                            style="display:none" data-title="{{ strtolower($form['title']) }}"
                            data-number="{{ strtolower($form['formType']) }}">
                            <h3 class="mt-3 font-semibold text-lg text-gray-800">
                                Form No. NTC {{ $form['formType'] }}
                            </h3>

                            <p class="text-gray-600 text-sm">
                                {{ $form['title'] }}
                            </p>

                            <div class="mt-4 flex flex-wrap justify-center gap-2">
                                <a href="{{ asset('forms/Form-No.-NTC-' . $form['formType'] . '.pdf') }}"
                                    target="_blank"
                                    class="px-3 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm">
                                    View PDF
                                </a>

                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

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
    <script>
        const searchInput = document.getElementById('searchInput');
        const formsGrid = document.getElementById('formsGrid')
        const cards = formsGrid.querySelectorAll('.form-card');

        searchInput.addEventListener('keyup', function() {
            const search = this.value.toLowerCase();

            cards.forEach(card => {
                const title = card.getAttribute('data-title');
                const number = card.getAttribute('data-number');
                if (search === "") {
                    card.style.display = "none";
                    return;
                }
                if (title.includes(search) || number.includes(search)) {
                    card.style.display = "block";
                } else {
                    card.style.display = "none";
                }
            });
        });
        document.querySelectorAll('.form-card').forEach(card => {
            card.addEventListener('click', function(e) {

                if (e.target.closest('a')) return;

                const link = card.querySelector('a[href]');
                if (link) {
                    window.open(link.href, '_blank');

                }
            });

            // 見た目をクリック可能に
            card.style.cursor = 'pointer';
        });
    </script>

</x-layout>
