<x-layout :title="'Issuance of Certificate of Registration for RFID, SRD, WDN Devices – Indoor'">
    <main class="max-w-5xl mx-auto bg-white shadow-md rounded-xl p-6 mt-2">
        <a href="{{ url()->previous() }}" class="inline-flex items-center hover:underline mb-4">
            &#8592; Back
        </a>

        <!-- Header -->
        <header class="mb-4 p-1">
            <h1 class="text-2xl font-semibold">
                Issuance of Certificate of Registration for Radio Frequency Identification (RFID) Devices,
                Short Range Devices (SRD), and Wireless Data Network (WDN) Devices – Indoor
            </h1>
        </header>

        <!-- Description / Service Name -->
        <section class="space-y-4">
            <div>
                <div class="bg-gray-50 rounded-lg p-4 text-gray-700 space-y-2">
                    <div class="font-semibold">Service Name</div>
                    <p>
                        Issuance of Certificate of Registration for:
                    </p>
                    <ul class="list-disc pl-6 space-y-1">
                        <li>Radio Frequency Identification (RFID) Devices</li>
                        <li>Short Range Devices (SRD)</li>
                        <li>Wireless Data Network (WDN) Devices – Indoor</li>
                    </ul>
                </div>
            </div>

            <!-- Description -->
            <div>
                <div class="bg-gray-50 rounded-lg p-4 text-gray-700">
                    <p>
                        A <span class="font-semibold">Certificate of Registration</span> is a written authority issued
                        by the Commission to an individual, accredited radio dealer/manufacturer, private and government
                        entities for the registration of Radio Frequency Identification (RFID) Devices, Short Range
                        Devices (SRD), or Wireless Data Network (WDN) Devices – Indoor.
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
                    <p>Individuals, Accredited Radio Dealers/Manufacturers, and Private and Government Entities</p>
                </div>
            </div>
        </section>

        <!-- Checklist of Requirements -->
        <header class="mb-2 mt-8 p-1">
            <h2 class="text-2xl font-semibold">Checklist of Requirements</h2>
        </header>

        <section class="space-y-6">
            <!-- A. Certificate of Registration for RFID, SRD, WDN Devices – Indoor -->
            <div x-data="{ open: false }" class="bg-gray-50 rounded-lg p-4 text-gray-700">
                <button @click="open = !open"
                    class="w-full text-left flex justify-between items-center font-semibold text-lg">
                    A. Certificate of Registration for RFID, SRD, WDN Devices – Indoor
                    <span class="ml-2" x-text="open ? '-' : '+'"></span>
                </button>
                <div x-show="open" x-transition class="mt-2 text-gray-700 space-y-4">

                    <!-- A.1 Dealers -->
                    <div class="space-y-2">
                        <div class="font-semibold">A.1 Certificate of Registration (For Dealers)</div>
                        <ol class="list-decimal pl-6 space-y-1">
                            <li>
                                Duly accomplished APPLICATION FOR CERTIFICATE OF REGISTRATION (WDN/SRD/RFID/SRRS/PUBLIC
                                TRUNK RADIO)
                                <span class="italic">(Form No. NTC 1-19)</span>
                                <span class="block text-sm text-gray-600">
                                    Where to secure: Licensing Unit / Website:
                                    <a href="https://ntc.gov.ph" target="_blank"
                                        class="text-blue-600 underline hover:text-blue-800">ntc.gov.ph</a>
                                </span>
                            </li>
                            <li>
                                Photocopy of Dealer Permit
                                <span class="font-semibold">OR</span> Manufacturer Permit
                                <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                            </li>
                            <li>
                                For imported equipment:
                                <ol class="list-decimal pl-6 mt-1 text-sm space-y-1">
                                    <li>Photocopy of Permit to Import</li>
                                    <li>Photocopy of Invoice</li>
                                    <li>
                                        Photocopy of Bureau of Customs (BOC) Release Clearance and Import Entry
                                        Declaration
                                    </li>
                                </ol>
                                <span class="block text-sm text-gray-600">
                                    Where to secure: Applicant / Supplier / BOC
                                </span>
                            </li>
                            <li>
                                For locally-manufactured equipment, Sales and Stocks Report
                                <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                            </li>
                        </ol>
                    </div>

                    <!-- A.2 Non-Dealers -->
                    <div class="space-y-2">
                        <div class="font-semibold">A.2 Certificate of Registration (For Non‑Dealers)</div>
                        <ol class="list-decimal pl-6 space-y-1">
                            <li>
                                Duly accomplished APPLICATION FOR CERTIFICATE OF REGISTRATION (WDN/SRD/RFID/SRRS/PUBLIC
                                TRUNK RADIO)
                                <span class="italic">(Form No. NTC 1-19)</span>
                                <span class="block text-sm text-gray-600">
                                    Where to secure: Licensing Unit / Website:
                                    <a href="https://ntc.gov.ph" target="_blank"
                                        class="text-blue-600 underline hover:text-blue-800">ntc.gov.ph</a>
                                </span>
                            </li>
                            <li>
                                Photocopy of Invoice of equipment to be registered
                                <span class="block text-sm text-gray-600">
                                    Where to secure: Applicant / Supplier
                                </span>
                            </li>
                            <li>
                                Photocopy of Bureau of Customs (BOC) Release Clearance and Import Entry Declaration
                                <span class="block text-sm text-gray-600">Where to secure: BOC</span>
                            </li>
                        </ol>
                    </div>
                    <div class="mt-3 flex flex-wrap gap-3 justify-center">
                        <a href="{{ route('forms.show', ['formType' => '1-19', 'category' => 'rfid-srd-wdn-indoor']) }}"
                            class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                            Apply using Form 1-19 (Certificate of Registration - WDN/SRD/RFID/SRRS/Public Trunk Radio)
                        </a>
                    </div>
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
