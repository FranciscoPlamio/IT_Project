<x-layout :title="'Issuance / Release — Admission Slip & Report of Rating'">
    <main class="bg-gray-100 min-h-screen p-6">
        <div class="max-w-4xl mx-auto bg-white shadow-md rounded-xl p-6 mt-4">

            <header class="mb-4 p-1">
                <h1 class="text-2xl font-semibold">Service Menu</h1>
                <p class="text-gray-600">Select a service to proceed</p>
            </header>

            <div class="space-y-4 mt-6 max-h-[60vh] overflow-y-auto pr-2">
                <!-- Menu Item 1 -->
                <a href="{{ route('showFormInformation', ['formType' => '1-01']) }}"
                    class="block bg-gray-50 hover:bg-gray-100 transition rounded-lg p-4 shadow-sm">
                    <div class="font-semibold text-lg">Radio Operator Examination Application</div>
                    <p class="text-gray-600 text-sm">
                        Apply for Radio Operator Examination.
                    </p>
                </a>

                <!-- Menu Item 2 -->
                <a href="{{ route('showFormInformation', ['formType' => '1-02']) }}"
                    class="block bg-gray-50 hover:bg-gray-100 transition rounded-lg p-4 shadow-sm">
                    <div class="font-semibold text-lg">Radio Operator Certificate Application</div>
                    <p class="text-gray-600 text-sm">
                        Apply for your official Radio Operator Certificate after passing the examination.
                    </p>
                </a>

                <!-- Menu Item 3 -->
                <a href="{{ route('showFormInformation', ['formType' => '1-03']) }}"
                    class="block bg-gray-50 hover:bg-gray-100 transition rounded-lg p-4 shadow-sm">
                    <div class="font-semibold text-lg">
                        Amateur Service Certificates & Permits
                    </div>
                    <p class="text-gray-600 text-sm">
                        Apply for Amateur Radio certificates, permits, and licenses.
                    </p>
                </a>
                <a href="{{ route('showFormInformation', ['formType' => '1-29']) }}"
                    class="block bg-gray-50 hover:bg-gray-100 transition rounded-lg p-4 shadow-sm">
                    <div class="font-semibold text-lg">
                        Consumer Complaints
                    </div>
                    <p class="text-gray-600 text-sm">
                        File a complaint about text scams, spam messages, telecom services, or related issues.
                    </p>
                </a>

                {{-- <!-- Menu Item 4 -->
                <a href="{{ route('showFormInformation', ['formType' => '1-11']) }}"
                    class="block bg-gray-50 hover:bg-gray-100 transition rounded-lg p-4 shadow-sm">
                    <div class="font-semibold text-lg">
                        Issuance of Permits and Licenses in the Aeronautical Service
                    </div>
                    <p class="text-gray-600 text-sm">
                        View requirements for Aeronautical permits and licenses such as Fixed and Aircraft Station
                        Licenses.
                    </p>
                </a>

                <!-- Menu Item 5 -->
                <a href="{{ route('showFormInformation', ['formType' => '1-12']) }}"
                    class="block bg-gray-50 hover:bg-gray-100 transition rounded-lg p-4 shadow-sm">
                    <div class="font-semibold text-lg">
                        Issuance of Permits and Licenses in the Maritime Service
                    </div>
                    <p class="text-gray-600 text-sm">
                        View requirements for Ship and Ship Earth Station Licenses, Private Coastal Station Licenses,
                        and related permits.
                    </p>
                </a>

                <!-- Menu Item 6 -->
                <a href="{{ route('showFormInformation', ['formType' => '1-13']) }}"
                    class="block bg-gray-50 hover:bg-gray-100 transition rounded-lg p-4 shadow-sm">
                    <div class="font-semibold text-lg">
                        Issuance of Permit and Public Coastal Station License in the Maritime Service
                    </div>
                    <p class="text-gray-600 text-sm">
                        View requirements for Public Coastal Station Licenses, permits to purchase/possess, and
                        permits to sell/transfer.
                    </p>
                </a>

                <!-- Menu Item 7 -->
                <a href="{{ route('showFormInformation', ['formType' => '1-14']) }}"
                    class="block bg-gray-50 hover:bg-gray-100 transition rounded-lg p-4 shadow-sm">
                    <div class="font-semibold text-lg">
                        Issuance of Public Coastal Station License (Renewal)
                    </div>
                    <p class="text-gray-600 text-sm">
                        View requirements for the renewal of Public Coastal Station Licenses in the Maritime Service.
                    </p>
                </a>

                <!-- Menu Item 8 -->
                <a href="{{ route('showFormInformation', ['formType' => '1-15']) }}"
                    class="block bg-gray-50 hover:bg-gray-100 transition rounded-lg p-4 shadow-sm">
                    <div class="font-semibold text-lg">
                        Issuance of Radio Station License (Microwave, VSAT, Public Trunked, BWA, WDN, WLL, BTS)
                    </div>
                    <p class="text-gray-600 text-sm">
                        View requirements for renewal and modification of BTS radio station licenses and permits to
                        possess BTS radio equipment.
                    </p>
                </a>

                <!-- Menu Item 9 -->
                <a href="{{ route('showFormInformation', ['formType' => '1-16']) }}"
                    class="block bg-gray-50 hover:bg-gray-100 transition rounded-lg p-4 shadow-sm">
                    <div class="font-semibold text-lg">
                        Issuance of Permit to Purchase/Possess for Fixed and Land Mobile Service
                    </div>
                    <p class="text-gray-600 text-sm">
                        View requirements for permits to purchase/possess for government and private radio stations in
                        the Fixed and Land Mobile Service.
                    </p>
                </a>

                <!-- Menu Item 10 -->
                <a href="{{ route('showFormInformation', ['formType' => '1-17']) }}"
                    class="block bg-gray-50 hover:bg-gray-100 transition rounded-lg p-4 shadow-sm">
                    <div class="font-semibold text-lg">
                        Issuance of Construction Permit and Radio Station License (Fixed and Land Mobile Service)
                    </div>
                    <p class="text-gray-600 text-sm">
                        View requirements for construction permits and radio station licenses (new and modification) for
                        government and private radio stations in the Fixed and Land Mobile Service.
                    </p>
                </a>

                <!-- Menu Item 11 -->
                <a href="{{ route('showFormInformation', ['formType' => '1-18']) }}"
                    class="block bg-gray-50 hover:bg-gray-100 transition rounded-lg p-4 shadow-sm">
                    <div class="font-semibold text-lg">
                        Issuance of Radio Station License (Renewal) – Fixed and Land Mobile Service
                    </div>
                    <p class="text-gray-600 text-sm">
                        View requirements for renewal of radio station licenses for government and private radio
                        stations in the Fixed and Land Mobile Service.
                    </p>
                </a>

                <!-- Menu Item 12 -->
                <a href="{{ route('showFormInformation', ['formType' => '1-19']) }}"
                    class="block bg-gray-50 hover:bg-gray-100 transition rounded-lg p-4 shadow-sm">
                    <div class="font-semibold text-lg">
                        Issuance of Permit to Possess for Storage – Fixed and Land Mobile Service
                    </div>
                    <p class="text-gray-600 text-sm">
                        View requirements for permits to possess radio communications equipment for storage for
                        government and private radio stations in the Fixed and Land Mobile Service.
                    </p>
                </a>

                <!-- Menu Item 13 -->
                <a href="{{ route('showFormInformation', ['formType' => '1-20']) }}"
                    class="block bg-gray-50 hover:bg-gray-100 transition rounded-lg p-4 shadow-sm">
                    <div class="font-semibold text-lg">
                        Issuance of Temporary Permit to Demonstrate and Propagate – Fixed and Land Mobile Service
                    </div>
                    <p class="text-gray-600 text-sm">
                        View requirements for temporary permits to demonstrate and propagate radio equipment for
                        government and private radio stations in the Fixed and Land Mobile Service.
                    </p>
                </a>

                <!-- Menu Item 14 -->
                <a href="{{ route('showFormInformation', ['formType' => '1-21']) }}"
                    class="block bg-gray-50 hover:bg-gray-100 transition rounded-lg p-4 shadow-sm">
                    <div class="font-semibold text-lg">
                        Issuance of Permit to Transport / Permit to Sell/Transfer Radio Communications Equipment
                    </div>
                    <p class="text-gray-600 text-sm">
                        View requirements for permits to transport and to sell/transfer radio communications equipment
                        for individuals, private, and government entities.
                    </p>
                </a>

                <!-- Menu Item 15 -->
                <a href="{{ route('showFormInformation', ['formType' => '1-22']) }}"
                    class="block bg-gray-50 hover:bg-gray-100 transition rounded-lg p-4 shadow-sm">
                    <div class="font-semibold text-lg">
                        Issuance of Dealer / Manufacturer / Service Center and CPE / Mobile Phone Permits
                    </div>
                    <p class="text-gray-600 text-sm">
                        View requirements for accreditation and permits for Radio Communications Equipment dealers,
                        manufacturers, service centers, CPE suppliers, and mobile phone dealers/retailers/service
                        centers.
                    </p>
                </a>

                <!-- Menu Item 16 -->
                <a href="{{ route('showFormInformation', ['formType' => '1-23']) }}"
                    class="block bg-gray-50 hover:bg-gray-100 transition rounded-lg p-4 shadow-sm">
                    <div class="font-semibold text-lg">
                        Issuance of Certificate of Registration for RFID, SRD, WDN Devices – Indoor
                    </div>
                    <p class="text-gray-600 text-sm">
                        View requirements for certificates of registration for Radio Frequency Identification (RFID),
                        Short Range Devices (SRD), and Wireless Data Network (WDN) indoor devices for dealers and
                        non‑dealers.
                    </p>
                </a>

                <!-- Menu Item 17 -->
                <a href="{{ route('showFormInformation', ['formType' => '1-24']) }}"
                    class="block bg-gray-50 hover:bg-gray-100 transition rounded-lg p-4 shadow-sm">
                    <div class="font-semibold text-lg">
                        Issuance of TVRO Registration Certificate and TVRO Station License for CATV System
                    </div>
                    <p class="text-gray-600 text-sm">
                        View requirements for commercial TVRO registration certificates and TVRO station licenses for
                        CATV systems.
                    </p>
                </a>

                <!-- Menu Item 18 -->
                <a href="{{ route('showFormInformation', ['formType' => '1-25']) }}"
                    class="block bg-gray-50 hover:bg-gray-100 transition rounded-lg p-4 shadow-sm">
                    <div class="font-semibold text-lg">
                        Issuance of TVRO Registration Certificate (Non‑Commercial) and TVRO / CATV Station License
                    </div>
                    <p class="text-gray-600 text-sm">
                        View requirements for non‑commercial TVRO registration certificates and TVRO/CATV station
                        licenses (new, renewal, and modification).
                    </p>
                </a>

                <!-- Menu Item 19 -->
                <a href="{{ route('showFormInformation', ['formType' => '1-26']) }}"
                    class="block bg-gray-50 hover:bg-gray-100 transition rounded-lg p-4 shadow-sm">
                    <div class="font-semibold text-lg">
                        Issuance of Certificate of Registration as a Value‑Added Service (VAS) Provider (Renewal)
                    </div>
                    <p class="text-gray-600 text-sm">
                        View requirements for renewal of Certificates of Registration for Value‑Added Service (VAS)
                        providers.
                    </p>
                </a>

                <!-- Menu Item 20 -->
                <a href="{{ route('showFormInformation', ['formType' => '1-27']) }}"
                    class="block bg-gray-50 hover:bg-gray-100 transition rounded-lg p-4 shadow-sm">
                    <div class="font-semibold text-lg">
                        Issuance of Permit to Import / Certificate of Exemption for Customer Premises Equipment (CPE)
                    </div>
                    <p class="text-gray-600 text-sm">
                        View requirements for permits to import and certificates of exemption for customer premises
                        equipment (CPE).
                    </p>
                </a>

                <!-- Menu Item 21 -->
                <a href="{{ route('showFormInformation', ['formType' => '1-28']) }}"
                    class="block bg-gray-50 hover:bg-gray-100 transition rounded-lg p-4 shadow-sm">
                    <div class="font-semibold text-lg">
                        Issuance of Authenticated / Duplicate Copies and Certification of NTC Documents
                    </div>
                    <p class="text-gray-600 text-sm">
                        View requirements for authenticated copies, duplicate copies of certificates, permits and
                        licenses, and certifications issued by the Commission.
                    </p>
                </a>

                <!-- Menu Item 22 -->
                <a href="{{ route('showFormInformation', ['formType' => '1-29']) }}"
                    class="block bg-gray-50 hover:bg-gray-100 transition rounded-lg p-4 shadow-sm">
                    <div class="font-semibold text-lg">
                        Handling of Blocking/Unblocking Requests and Consumer Complaints
                    </div>
                    <p class="text-gray-600 text-sm">
                        View requirements for requests to block/unblock IMEI and SIM of lost/stolen mobile phones and
                        for filing complaints on text spam/scam and services offered by telecom or broadcast providers.
                    </p>
                </a> --}}
            </div>
        </div>
    </main>


</x-layout>
