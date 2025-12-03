<x-layout :title="'Issuance of Permit to Import / Certificate of Exemption for CPE'">
    <main class="max-w-5xl mx-auto bg-white shadow-md rounded-xl p-6 mt-2">
        <a href="{{ url()->previous() }}" class="inline-flex items-center hover:underline mb-4">
            &#8592; Back
        </a>

        <!-- Header -->
        <header class="mb-4 p-1">
            <h1 class="text-2xl font-semibold">
                Issuance of Permit to Import for Customer Premises Equipment (CPE) and
                Certificate of Exemption for Non‑CPE thru the Philippine National Single Window
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
                        <li>Permit to Import for customer premises equipment (CPE)</li>
                        <li>
                            Certificate of Exemption for non‑CPE thru the Philippine National Single Window
                            (<span class="italic">https://nsw.gov.ph</span>)
                        </li>
                    </ul>
                    <p class="text-sm text-gray-700 mt-1">
                        Note: This service is available only at NTC‑NCR and R3.
                    </p>
                </div>
            </div>

            <!-- Description -->
            <div>
                <div class="bg-gray-50 rounded-lg p-4 text-gray-700 space-y-2">
                    <p>
                        A <span class="font-semibold">Permit to Import</span> is a written authority issued by the
                        Commission to an individual, accredited CPE supplier, and private and government entities for
                        the importation of type‑approved / type‑accepted customer premises equipment (CPE).
                    </p>
                    <p>
                        A <span class="font-semibold">Certificate of Exemption</span> is a written authority issued by
                        the Commission to an individual, accredited CPE supplier, and private and government entities
                        for the importation of non‑customer premises equipment (CPE).
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
                    <p>Individuals, accredited CPE Suppliers, Private and Government Entities</p>
                </div>
            </div>
        </section>

        <!-- Checklist of Requirements -->
        <header class="mb-2 mt-8 p-1">
            <h2 class="text-2xl font-semibold">Checklist of Requirements</h2>
        </header>

        <section class="space-y-6">
            <!-- Permit to Import / Certificate of Exemption -->
            <div class="bg-gray-50 rounded-lg p-4 text-gray-700 space-y-2">
                <div class="font-semibold text-lg">Permit to Import / Certificate of Exemption</div>
                <ol class="list-decimal pl-6 space-y-1">
                    <li>
                        Photocopy of Proforma / Commercial Invoice
                        <span class="block text-sm text-gray-600">Where to secure: Supplier</span>
                    </li>
                    <li>
                        For CPE Supplier <span class="font-semibold">OR</span> Personal / Company Use:
                        <ol class="list-decimal pl-6 mt-1 text-sm space-y-1">
                            <li>
                                Photocopy of Type Approval Certificate,
                                <span class="font-semibold">OR</span>
                            </li>
                            <li>
                                Photocopy of Type Acceptance Certificate,
                                <span class="font-semibold">OR</span>
                            </li>
                            <li>
                                Photocopy of Grant of Equipment Conformity
                            </li>
                        </ol>
                        <span class="block text-sm text-gray-600">
                            Where to secure: Applicant
                        </span>
                        <p class="mt-1 text-xs text-gray-600">
                            Note: CPE includes Indoor WDN equipment and Short Range Devices (SRD).
                        </p>
                    </li>
                    <li>
                        For Demonstration and / or Testing, Photocopy of Datasheet of proposed equipment
                        <span class="block text-sm text-gray-600">Where to secure: Supplier</span>
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
