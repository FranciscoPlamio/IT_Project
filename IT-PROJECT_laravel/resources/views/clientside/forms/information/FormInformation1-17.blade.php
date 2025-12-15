<x-layout :title="'Issuance of Construction Permit and Radio Station License'">
    <main class="max-w-5xl mx-auto bg-white shadow-md rounded-xl p-6 mt-2">
        <a href="{{ url()->previous() }}" class="inline-flex items-center hover:underline mb-4">
            &#8592; Back
        </a>

        <!-- Header -->
        <header class="mb-4 p-1">
            <h1 class="text-2xl font-semibold">
                Issuance of Construction Permit and Radio Station License (New / Modification)
                for Government and Private Radio Stations in the Fixed and Land Mobile Service
            </h1>
        </header>

        <!-- Description / Service Name -->
        <section class="space-y-4">
            <div>
                <div class="bg-gray-50 rounded-lg p-4 text-gray-700 space-y-2">
                    <div class="font-semibold">Service Name</div>
                    <p>
                        Issuance of Construction Permit and Radio Station License (New / Modification) for
                        Government and Private Radio Stations in the Fixed and Land Mobile Service
                    </p>
                </div>
            </div>

            <!-- Description -->
            <div>
                <div class="bg-gray-50 rounded-lg p-4 text-gray-700 space-y-2">
                    <p>
                        A <span class="font-semibold">Construction Permit</span> is a written authority issued by the
                        Commission to a person, firm, company, association, or corporation authorizing the holder
                        thereof to construct or install radio transceivers or radio station(s).
                    </p>
                    <p>
                        A <span class="font-semibold">Radio Station License</span> is a written authority issued by the
                        Commission to a person, firm, company, association, or corporation authorizing the holder
                        thereof to operate a radio station during the period specified in said instrument or
                        authorization.
                    </p>
                    <p>
                        The <span class="font-semibold">modification of a Radio Station License</span> is required from
                        the Commission to an individual, private and government entities for changes in the particulars
                        indicated in the License.
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
                    <ul class="list-disc pl-6 space-y-1">
                        <li>G2B – Government to Business</li>
                        <li>G2G – Government to Government</li>
                    </ul>
                </div>

                <div class="bg-gray-50 rounded-lg p-4 text-gray-700 space-y-2">
                    <div class="font-semibold">Who may avail</div>
                    <p>Private and Government Entities</p>
                </div>
            </div>
        </section>

        <!-- Checklist of Requirements -->
        <header class="mb-2 mt-8 p-1">
            <h2 class="text-2xl font-semibold">Checklist of Requirements</h2>
        </header>

        <section class="space-y-6">
            <!-- A. Construction / Radio Station License (NEW) -->
            <div x-data="{ open: false }" class="bg-gray-50 rounded-lg p-4 text-gray-700">
                <button @click="open = !open"
                    class="w-full text-left flex justify-between items-center font-semibold text-lg">
                    A. Construction / Radio Station License (Repeater (RT), Fixed (FX), Land Base (FB),
                    Land Mobile (ML), Portable (PI))
                    <span class="ml-2" x-text="open ? '-' : '+'"></span>
                </button>
                <div x-show="open" x-transition class="mt-2 text-gray-700 space-y-2">
                    <div class="font-semibold mt-2">A.1 Construction Permit / Radio Station License (NEW)</div>
                    <ol class="list-decimal pl-6 space-y-1">
                        <li>
                            Duly accomplished APPLICATION FOR CONSTRUCTION PERMIT / RADIO STATION LICENSE
                            <span class="italic">(Form No. NTC 1-11)</span>
                            <span class="block text-sm text-gray-600">
                                Where to secure: Licensing Unit / Website:
                                <a href="https://ntc.gov.ph" target="_blank"
                                    class="text-blue-600 underline hover:text-blue-800">ntc.gov.ph</a>
                            </span>
                        </li>
                        <li>
                            Photocopy of valid Permit to Purchase/Possess
                            <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                        </li>
                        <li>
                            Photocopy of document indicating source of equipment:
                            <ul class="list-disc pl-6 mt-1 space-y-1">
                                <li>
                                    For locally-sourced equipment, Official Receipt or Sales Invoice from Authorized
                                    Radio
                                    Dealer, <span class="font-semibold">OR</span>
                                    <span class="block text-sm text-gray-600">
                                        Where to secure: Authorized Radio Dealer
                                    </span>
                                </li>
                                <li>
                                    For imported equipment, Photocopy of Invoice from the supplier
                                    <span class="font-semibold">AND</span> Photocopy of Permit to Import,
                                    <span class="block text-sm text-gray-600">
                                        Where to secure: Supplier / Applicant
                                    </span>
                                </li>
                                <li>
                                    For registered equipment, Photocopy of Permit to Possess
                                    <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                                </li>
                            </ul>
                        </li>
                        <li>
                            For Land mobile station, Photocopy of vehicle’s valid OR/CR
                            <span class="block text-sm text-gray-600">Where to secure: LTO</span>
                        </li>
                    </ol>
                    <p class="mt-2 text-sm text-gray-600">
                        Note: The actual operation of any transmitting or receiving apparatus in any radio station shall
                        be
                        carried on by persons holding operator licenses required by regulations.
                    </p>
                    <div class="mt-3 flex flex-wrap gap-3 justify-center">
                        <a href="{{ route('forms.show', ['formType' => '1-11', 'category' => 'construction-rsl-new']) }}"
                            class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                            Apply using Form 1-11 (Construction Permit / Radio Station License)
                        </a>
                    </div>

                    <div class="font-semibold mt-4">A.2 Construction Permit / Radio Station License (MODIFICATION)</div>
                    <ol class="list-decimal pl-6 space-y-1">
                        <li>
                            Duly accomplished APPLICATION FOR CONSTRUCTION PERMIT / RADIO STATION LICENSE
                            <span class="italic">(Form No. NTC 1-11)</span> and FORM B – MODIFICATION
                            <span class="italic">(Form No. NTC 1-06)</span>
                            <span class="block text-sm text-gray-600">
                                Where to secure: Licensing Unit / Website:
                                <a href="https://ntc.gov.ph" target="_blank"
                                    class="text-blue-600 underline hover:text-blue-800">ntc.gov.ph</a>
                            </span>
                        </li>
                        <li>
                            Photocopy of RSL
                            <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                        </li>
                        <li>
                            For the following modifications that require issuance of a Construction Permit, Engineering
                            Plans signed and sealed by a duly licensed Professional Electronics Engineer (PECE) shall be
                            submitted:
                            <ul class="list-disc pl-6 mt-1 space-y-1 text-sm">
                                <li>Change of Location beyond 500 meters from the original location</li>
                                <li>Change of Mode of Transmission, Change or Addition of Frequency</li>
                                <li>Change of Point(s) of Communications and Service Area</li>
                            </ul>
                            <span class="block text-sm text-gray-600">
                                Where to secure: PECE / Applicant
                            </span>
                        </li>
                        <li>
                            For modification due to change of vehicle, Photocopy of valid OR/CR
                            <span class="block text-sm text-gray-600">Where to secure: LTO</span>
                        </li>
                        <li>
                            For modification due to Change of Equipment and/or additional equipment:
                            <ol class="list-decimal pl-6 mt-1 space-y-1 text-sm">
                                <li>Photocopy of valid Permit to Purchase/Possess</li>
                                <li>
                                    Photocopy of document indicating source of equipment:
                                    <ul class="list-disc pl-6 mt-1 space-y-1">
                                        <li>
                                            For locally-sourced equipment, Official Receipt or Sales Invoice from
                                            Authorized Radio Dealer, <span class="font-semibold">OR</span>
                                            <span class="block text-gray-600">
                                                Where to secure: Authorized Radio Dealer
                                            </span>
                                        </li>
                                        <li>
                                            For imported equipment, Photocopy of Invoice from the supplier
                                            <span class="font-semibold">AND</span> Photocopy of Permit to Import,
                                            <span class="block text-gray-600">
                                                Where to secure: Supplier / Applicant
                                            </span>
                                        </li>
                                        <li>
                                            For registered equipment, Photocopy of Permit to Possess
                                            <span class="block text-gray-600">Where to secure: Applicant</span>
                                        </li>
                                    </ul>
                                </li>
                            </ol>
                        </li>
                    </ol>
                    <div class="mt-3 flex flex-wrap gap-3 justify-center">
                        <a href="{{ route('forms.show', ['formType' => '1-11', 'category' => 'construction-rsl-modification']) }}"
                            class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                            Apply using Form 1-11 (Construction Permit / Radio Station License)
                        </a>
                    </div>
                    <div class="mmt-3 text-sm text-gray-600 italic text-center">
                        Note: Online application for <span class="font-semibold">Form No. NTC 1-04 – Ship Earth Station
                            License</span> is not yet available in this system. Please refer to the List of Harmonized
                        Forms for the PDF version.
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
