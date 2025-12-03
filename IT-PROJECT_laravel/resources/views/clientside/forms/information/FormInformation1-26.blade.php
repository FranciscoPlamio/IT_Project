<x-layout :title="'Issuance of Certificate of Registration as a VAS Provider (Renewal)'">
    <main class="max-w-5xl mx-auto bg-white shadow-md rounded-xl p-6 mt-2">
        <a href="{{ url()->previous() }}" class="inline-flex items-center hover:underline mb-4">
            &#8592; Back
        </a>

        <!-- Header -->
        <header class="mb-4 p-1">
            <h1 class="text-2xl font-semibold">
                Issuance of Certificate of Registration as a Value‑Added Service (VAS) Provider (Renewal)
            </h1>
        </header>

        <!-- Description / Service Name -->
        <section class="space-y-4">
            <div>
                <div class="bg-gray-50 rounded-lg p-4 text-gray-700 space-y-2">
                    <div class="font-semibold">Service Name</div>
                    <p>
                        Issuance of Certificate of Registration as a Value‑Added Service (VAS) Provider (Renewal)
                    </p>
                    <p class="text-sm text-gray-700">
                        Note 1: All applications within NCR will be submitted to the Regulation Branch.
                    </p>
                    <p class="text-sm text-gray-700">
                        Note 2: Renewal of VAS Certificate of Registration is allowed in the NTC Regional Offices if the
                        VAS Provider is operating within the Regional Offices’ area of jurisdiction. Otherwise, the
                        application shall be endorsed to the NTC Central Office for appropriate action.
                    </p>
                </div>
            </div>

            <!-- Description -->
            <div>
                <div class="bg-gray-50 rounded-lg p-4 text-gray-700">
                    <p>
                        The <span class="font-semibold">Certificate of Registration as a VAS Provider</span> is a
                        written authority issued by the Commission to an individual, private and government entities
                        authorizing the holder thereof to offer value added services.
                    </p>
                    <p>
                        The <span class="font-semibold">renewal of a Certificate of Registration</span> is required for
                        the continuous operation as a VAS Provider.
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
                    <p>Complex</p>

                    <div class="font-semibold mt-2">Type of Transaction</div>
                    <p>G2B – Government to Business</p>
                </div>

                <div class="bg-gray-50 rounded-lg p-4 text-gray-700 space-y-2">
                    <div class="font-semibold">Who may avail</div>
                    <p>Private Entities</p>
                </div>
            </div>
        </section>

        <!-- Checklist of Requirements -->
        <header class="mb-2 mt-8 p-1">
            <h2 class="text-2xl font-semibold">Checklist of Requirements</h2>
        </header>

        <section class="space-y-6">
            <div class="bg-gray-50 rounded-lg p-4 text-gray-700 space-y-2">
                <div class="font-semibold text-lg">Certificate of Registration as VAS Provider (RENEWAL)</div>
                <ol class="list-decimal pl-6 space-y-1">
                    <li>
                        Duly accomplished APPLICATION FOR CERTIFICATE OF REGISTRATION (VAS/PCSP/OSP/VNP)
                        <span class="italic">(Form No. NTC 1-20)</span>
                        <span class="block text-sm text-gray-600">
                            Where to secure: Licensing Unit / Website:
                            <a href="https://ntc.gov.ph" target="_blank"
                                class="text-blue-600 underline hover:text-blue-800">ntc.gov.ph</a>
                        </span>
                    </li>
                    <li>
                        Photocopy of Certificate of Registration
                        <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                    </li>
                    <li>
                        Photocopy of valid facilities / network lease agreement with duly authorized
                        facilities / network providers
                        <span class="block text-sm text-gray-600">
                            Where to secure: Applicant / Duly authorized facilities / network providers
                        </span>
                    </li>
                    <li>
                        For Cable TV Operator, Photocopy of valid Provisional Authority (PA) or Certificate of Authority
                        (CA). If expired PA/CA, Photocopy of Motion for Renewal
                        <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                    </li>
                </ol>
            </div>

            <!-- Supporting Documents for Representative(s) -->
            <div class="bg-gray-50 rounded-lg p-4 text-gray-700 space-y-2">
                <div class="font-semibold text-lg">Supporting Documents for Representative(s)</div>
                <ol class="list-decimal pl-6 space-y-1">
                    <li>
                        Authorization letter duly signed by the applicant and valid ID of the authorized
                        representative.
                        <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                    </li>
                </ol>
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
