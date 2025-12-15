<x-layout :title="'Issuance of Authenticated/Duplicate Copies and Certification'">
    <main class="max-w-5xl mx-auto bg-white shadow-md rounded-xl p-6 mt-2">
        <a href="{{ url()->previous() }}" class="inline-flex items-center hover:underline mb-4">
            &#8592; Back
        </a>

        <!-- Header -->
        <header class="mb-4 p-1">
            <h1 class="text-2xl font-semibold">
                Issuance of Authenticated Copy of Certificates, Permits and Licenses, Duplicate Copy of Certificates,
                Permits and Licenses, and Certification
            </h1>
        </header>

        <!-- Description / Service Name -->
        <section class="space-y-4">
            <div>
                <div class="bg-gray-50 rounded-lg p-4 text-gray-700 space-y-2">
                    <div class="font-semibold">Service Name</div>
                    <p>
                        Issuance of:
                    </p>
                    <ul class="list-disc pl-6 space-y-1">
                        <li>Authenticated Copy of Certificates, Permits and Licenses</li>
                        <li>Duplicate Copy of Certificates, Permits and Licenses</li>
                        <li>Certification</li>
                    </ul>
                </div>
            </div>

            <!-- Description -->
            <div>
                <div class="bg-gray-50 rounded-lg p-4 text-gray-700 space-y-2">
                    <p>
                        An <span class="font-semibold">Authenticated Copy</span> of a certificate/permit/license is
                        issued by the Commission upon request of the holder showing faithful reproduction of the same.
                    </p>
                    <p>
                        A <span class="font-semibold">Duplicate Copy</span> of a certificate/permit/license is issued
                        by the Commission upon request of the holder for the re‑issuance of the same.
                    </p>
                    <p>
                        A <span class="font-semibold">Certification</span> is a document issued by the Commission upon
                        request of the holder affirming the existence/status of an official document.
                    </p>
                </div>
            </div>

            <!-- Office / Division / Classification / Type / Who may avail -->
            <div class="grid gap-4 md:grid-cols-2">
                <div class="bg-gray-50 rounded-lg p-4 text-gray-700 space-y-2">
                    <div class="font-semibold">Office or Division</div>
                    <p>
                        Regional Office - Enforcement and Operations Division (EOD),
                        Office of the Regional Director (ORD)
                    </p>

                    <div class="font-semibold mt-2">Classification</div>
                    <p>Simple</p>

                    <div class="font-semibold mt-2">Type of Transaction</div>
                    <ul class="list-disc pl-6 space-y-1">
                        <li>G2C – Government to Citizen</li>
                        <li>G2B – Government to Business</li>
                        <li>G2G – Government to Government</li>
                    </ul>
                </div>

                <div class="bg-gray-50 rounded-lg p-4 text-gray-700 space-y-2">
                    <div class="font-semibold">Who may avail</div>
                    <p>Individuals and Private and Government Entities</p>
                </div>
            </div>
        </section>

        <!-- Checklist of Requirements -->
        <header class="mb-2 mt-8 p-1">
            <h2 class="text-2xl font-semibold">Checklist of Requirements</h2>
        </header>

        <section class="space-y-6">
            <!-- A. Authenticated Copy -->
            <div x-data="{ open: false }" class="bg-gray-50 rounded-lg p-4 text-gray-700">
                <button @click="open = !open"
                    class="w-full text-left flex justify-between items-center font-semibold text-lg">
                    A. Authenticated Copy of Certificates, Permits and Licenses
                    <span class="ml-2" x-text="open ? '-' : '+'"></span>
                </button>
                <div x-show="open" x-transition class="mt-2 text-gray-700 space-y-2">
                    <ol class="list-decimal pl-6 space-y-1">
                        <li>
                            Photocopy of document to be authenticated
                            <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                        </li>
                    </ol>
                </div>
            </div>

            <!-- B. Duplicate Copy -->
            <div x-data="{ open: false }" class="bg-gray-50 rounded-lg p-4 text-gray-700">
                <button @click="open = !open"
                    class="w-full text-left flex justify-between items-center font-semibold text-lg">
                    B. Duplicate Copy of Certificates, Permits and Licenses
                    <span class="ml-2" x-text="open ? '-' : '+'"></span>
                </button>
                <div x-show="open" x-transition class="mt-2 text-gray-700 space-y-2">
                    <ol class="list-decimal pl-6 space-y-1">
                        <li>
                            Duly accomplished APPLICATION FOR DUPLICATE OF PERMIT / LICENSE / CERTIFICATE
                            <span class="italic">(Form No. NTC 1-21)</span>
                            <span class="block text-sm text-gray-600">
                                Where to secure: Licensing Unit / Website:
                                <a href="https://ntc.gov.ph" target="_blank"
                                    class="text-blue-600 underline hover:text-blue-800">ntc.gov.ph</a>
                            </span>
                        </li>
                        <li>
                            For Radio Operator Certificate, Three (3) ID pictures (1” x 1”) taken within the last six
                            (6)
                            months
                            <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                        </li>
                    </ol>
                    <div class="mt-3 flex flex-wrap gap-3 justify-center">
                        <a href="{{ route('forms.show', ['formType' => '1-21', 'category' => 'duplicate-copy']) }}"
                            class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                            Apply using Form 1-21 (Application for Duplicate of Permit/License/Certificate)
                        </a>
                    </div>
                </div>
            </div>

            <!-- C. Certification -->
            <div x-data="{ open: false }" class="bg-gray-50 rounded-lg p-4 text-gray-700">
                <button @click="open = !open"
                    class="w-full text-left flex justify-between items-center font-semibold text-lg">
                    C. Certification of Documents Issued by the Commission
                    <span class="ml-2" x-text="open ? '-' : '+'"></span>
                </button>
                <div x-show="open" x-transition class="mt-2 text-gray-700 space-y-2">
                    <ol class="list-decimal pl-6 space-y-1">
                        <li>
                            Letter Request
                            <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                        </li>
                    </ol>
                </div>
            </div>

            <!-- Supporting Documents for Representative(s) -->
            <div x-data="{ open: false }" class="bg-gray-50 rounded-lg p-4 text-gray-700">
                <button @click="open = !open"
                    class="w-full text-left flex justify-between items-center font-semibold text-lg">
                    Supporting Documents for Representative(s)
                    <span class="ml-2" x-text="open ? '-' : '+'"></span>
                </button>
                <div x-show="open" x-transition class="mt-2 text-gray-700 space-y-2">
                    <ol class="list-decimal pl-6 space-y-1">
                        <li>
                            Authorization letter duly signed by the applicant and valid ID of the authorized
                            representative.
                            <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                        </li>
                    </ol>
                </div>
            </div>
        </section>

        <!-- Footer actions -->
        <div class="flex justify-between mt-6">
            <a href="{{ route('services') }}"
                class="bg-gray-300 text-gray-800 px-6 py-2 rounded-lg hover:bg-gray-400 transition">
                Back to Services
            </a>

            <a href="{{ route('display.forms') }}"
                class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                View Forms
            </a>
        </div>
    </main>
</x-layout>
