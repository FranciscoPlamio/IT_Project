<x-layout :title="'Issuance of TVRO Registration Certificate (Non‑Commercial) and TVRO/CATV Station License'">
    <main class="max-w-5xl mx-auto bg-white shadow-md rounded-xl p-6 mt-2">
        <a href="{{ url()->previous() }}" class="inline-flex items-center hover:underline mb-4">
            &#8592; Back
        </a>

        <!-- Header -->
        <header class="mb-4 p-1">
            <h1 class="text-2xl font-semibold">
                Issuance of TVRO Registration Certificate (Non‑Commercial), TVRO Station License (Renewal/Modification),
                and CATV Station License (New/Renewal/Modification)
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
                        <li>TVRO Registration Certificate (Non‑Commercial)</li>
                        <li>TVRO Station License (Renewal / Modification)</li>
                        <li>CATV Station License (New / Renewal / Modification)</li>
                    </ul>
                </div>
            </div>

            <!-- Description -->
            <div>
                <div class="bg-gray-50 rounded-lg p-4 text-gray-700 space-y-2">
                    <p>
                        A <span class="font-semibold">TVRO Registration Certificate</span> is a written authority issued
                        by the Commission to cable TV operators, private and government entities authorizing the holder
                        thereof to possess television receive‑only equipment.
                    </p>
                    <p>
                        A <span class="font-semibold">TVRO Station License</span> or
                        <span class="font-semibold">CATV Station License</span> is a written authority issued by the
                        Commission to cable TV operators, private and government entities authorizing the holder to
                        operate a TVRO station for commercial purposes or operate a CATV system.
                    </p>
                    <p>
                        The <span class="font-semibold">renewal</span> of a TVRO Station License or CATV Station License
                        is required for the continuous operation of the subject station.
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
                        <li>G2B – Government to Business</li>
                        <li>G2G – Government to Government</li>
                    </ul>
                </div>

                <div class="bg-gray-50 rounded-lg p-4 text-gray-700 space-y-2">
                    <div class="font-semibold">Who may avail</div>
                    <p>Cable TV Operators and Private and Government Entities</p>
                </div>
            </div>
        </section>

        <!-- Checklist of Requirements -->
        <header class="mb-2 mt-8 p-1">
            <h2 class="text-2xl font-semibold">Checklist of Requirements</h2>
        </header>

        <section class="space-y-6">
            <!-- A. TVRO Registration Certificate (Non‑Commercial) -->
            <div x-data="{ open: false }" class="bg-gray-50 rounded-lg p-4 text-gray-700">
                <button @click="open = !open"
                    class="w-full text-left flex justify-between items-center font-semibold text-lg">
                    A. TVRO Registration Certificate (Non‑Commercial)
                    <span class="ml-2" x-text="open ? '-' : '+'"></span>
                </button>
                <div x-show="open" x-transition class="mt-2 text-gray-700 space-y-2">
                    <ol class="list-decimal pl-6 space-y-1">
                        <li>
                            Duly accomplished APPLICATION FOR TVRO REGISTRATION CERTIFICATE / TVRO STATION LICENSE /
                            CATV STATION LICENSE
                            <span class="italic">(Form No. NTC 1-22)</span>
                            <span class="block text-sm text-gray-600">
                                Where to secure: Licensing Unit / Website:
                                <a href="https://ntc.gov.ph" target="_blank"
                                    class="text-blue-600 underline hover:text-blue-800">ntc.gov.ph</a>
                            </span>
                        </li>
                        <li>
                            List of Combiner, Satellite Receivers, Modulators, LNA/LNB and other Head‑End Equipment
                            prepared and signed by a duly licensed Professional Electronics Engineer (PECE) /
                            Electronics Engineer (ECE)
                            <span class="block text-sm text-gray-600">
                                Where to secure: PECE / Applicant
                            </span>
                        </li>
                    </ol>
                    <div class="mt-3 flex flex-wrap gap-3 justify-center">
                        <a href="{{ route('forms.show', ['formType' => '1-22', 'category' => 'tvro-registration-certificate-non-commercial']) }}"
                            class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                            Apply using Form 1-22 (TVRO Registration Certificate/TVRO Station License/CATV Station
                            License)
                        </a>
                    </div>
                </div>
            </div>

            <!-- B. TVRO Station License -->
            <div x-data="{ open: false }" class="bg-gray-50 rounded-lg p-4 text-gray-700">
                <button @click="open = !open"
                    class="w-full text-left flex justify-between items-center font-semibold text-lg">
                    B. TVRO Station License
                    <span class="ml-2" x-text="open ? '-' : '+'"></span>
                </button>
                <div x-show="open" x-transition class="mt-2 text-gray-700 space-y-4">

                    <!-- B.1 Renewal -->
                    <div class="space-y-2">
                        <div class="font-semibold">B.1 TVRO Station License (RENEWAL)</div>
                        <ol class="list-decimal pl-6 space-y-1">
                            <li>
                                Duly accomplished APPLICATION FOR TVRO REGISTRATION CERTIFICATE / TVRO STATION LICENSE /
                                CATV STATION LICENSE
                                <span class="italic">(Form No. NTC 1-22)</span>
                                <span class="block text-sm text-gray-600">
                                    Where to secure: Licensing Unit / Website:
                                    <a href="https://ntc.gov.ph" target="_blank"
                                        class="text-blue-600 underline hover:text-blue-800">ntc.gov.ph</a>
                                </span>
                            </li>
                            <li>
                                Photocopy of TVRO Station License
                                <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                            </li>
                            <li>
                                Photocopy of valid Provisional Authority (PA)
                                <span class="font-semibold">OR</span> Photocopy of duly received Motion for Renewal of
                                PA
                                <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                            </li>
                            <li>
                                List of Combiner, Satellite Receivers, Modulators, LNA/LNB and other Head‑End Equipment
                                prepared and signed by a duly licensed PECE / ECE
                                <span class="block text-sm text-gray-600">
                                    Where to secure: PECE / Applicant
                                </span>
                            </li>
                        </ol>
                    </div>

                    <!-- B.2 Modification -->
                    <div class="space-y-2">
                        <div class="font-semibold">B.2 TVRO Station License (MODIFICATION)</div>
                        <ol class="list-decimal pl-6 space-y-1">
                            <li>
                                Duly accomplished APPLICATION FOR TVRO REGISTRATION CERTIFICATE / TVRO STATION LICENSE /
                                CATV STATION LICENSE
                                <span class="italic">(Form No. NTC 1-22)</span>
                                <span class="block text-sm text-gray-600">
                                    Where to secure: Licensing Unit / Website:
                                    <a href="https://ntc.gov.ph" target="_blank"
                                        class="text-blue-600 underline hover:text-blue-800">ntc.gov.ph</a>
                                </span>
                            </li>
                            <li>
                                Photocopy of TVRO Station License
                                <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                            </li>
                            <li>
                                For modification due to <span class="font-semibold">Change of Ownership</span>,
                                Photocopy of Order / Decision approving the change of ownership
                                <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                            </li>
                        </ol>
                    </div>
                    <div class="mt-3 flex flex-wrap gap-3 justify-center">
                        <a href="{{ route('forms.show', ['formType' => '1-22', 'category' => 'tvro-station-license']) }}"
                            class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                            Apply using Form 1-22 (TVRO Registration Certificate/TVRO Station License/CATV Station
                            License)
                        </a>
                    </div>
                </div>
            </div>

            <!-- C. CATV Station License -->
            <div x-data="{ open: false }" class="bg-gray-50 rounded-lg p-4 text-gray-700">
                <button @click="open = !open"
                    class="w-full text-left flex justify-between items-center font-semibold text-lg">
                    C. CATV Station License
                    <span class="ml-2" x-text="open ? '-' : '+'"></span>
                </button>
                <div x-show="open" x-transition class="mt-2 text-gray-700 space-y-4">

                    <!-- C.1 New -->
                    <div class="space-y-2">
                        <div class="font-semibold">C.1 CATV Station License (NEW)</div>
                        <ol class="list-decimal pl-6 space-y-1">
                            <li>
                                Duly accomplished APPLICATION FOR TVRO REGISTRATION CERTIFICATE / TVRO STATION LICENSE /
                                CATV STATION LICENSE
                                <span class="italic">(Form No. NTC 1-22)</span>
                                <span class="block text-sm text-gray-600">
                                    Where to secure: Licensing Unit / Website:
                                    <a href="https://ntc.gov.ph" target="_blank"
                                        class="text-blue-600 underline hover:text-blue-800">ntc.gov.ph</a>
                                </span>
                            </li>
                            <li>
                                Photocopy of valid Certificate of Authority (CA)
                                <span class="font-semibold">OR</span> Photocopy of duly received Motion for Renewal of
                                CA
                                <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                            </li>
                            <li>
                                List of Combiner, Satellite Receivers, Modulators, LNA/LNB and other Head‑End Equipment
                                prepared and signed by a duly licensed PECE / ECE
                                <span class="block text-sm text-gray-600">
                                    Where to secure: PECE / Applicant
                                </span>
                            </li>
                            <li>
                                List of Programs Offered – Channel, Program and Signal Source
                                <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                            </li>
                        </ol>
                    </div>

                    <!-- C.2 Renewal -->
                    <div class="space-y-2">
                        <div class="font-semibold">C.2 CATV Station License (RENEWAL)</div>
                        <ol class="list-decimal pl-6 space-y-1">
                            <li>
                                Duly accomplished APPLICATION FOR TVRO REGISTRATION CERTIFICATE / TVRO STATION LICENSE /
                                CATV STATION LICENSE
                                <span class="italic">(Form No. NTC 1-22)</span>
                                <span class="block text-sm text-gray-600">
                                    Where to secure: Licensing Unit / Website:
                                    <a href="https://ntc.gov.ph" target="_blank"
                                        class="text-blue-600 underline hover:text-blue-800">ntc.gov.ph</a>
                                </span>
                            </li>
                            <li>
                                Photocopy of CATV Station License
                                <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                            </li>
                            <li>
                                Photocopy of valid Certificate of Authority (CA)
                                <span class="font-semibold">OR</span> Photocopy of duly received Motion for Renewal of
                                CA
                                <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                            </li>
                            <li>
                                List of Combiner, Satellite Receivers, Modulators, LNA/LNB and other Head‑End Equipment
                                prepared and signed by a duly licensed PECE / ECE
                                <span class="block text-sm text-gray-600">
                                    Where to secure: PECE / Applicant
                                </span>
                            </li>
                            <li>
                                List of Programs Offered – Channel, Program and Signal Source
                                <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                            </li>
                        </ol>
                    </div>

                    <!-- C.3 Modification -->
                    <div class="space-y-2">
                        <div class="font-semibold">C.3 CATV Station License (MODIFICATION)</div>
                        <ol class="list-decimal pl-6 space-y-1">
                            <li>
                                Duly accomplished APPLICATION FOR TVRO REGISTRATION CERTIFICATE / TVRO STATION LICENSE /
                                CATV STATION LICENSE
                                <span class="italic">(Form No. NTC 1-22)</span>
                                <span class="block text-sm text-gray-600">
                                    Where to secure: Licensing Unit / Website:
                                    <a href="https://ntc.gov.ph" target="_blank"
                                        class="text-blue-600 underline hover:text-blue-800">ntc.gov.ph</a>
                                </span>
                            </li>
                            <li>
                                Photocopy of CATV Station License
                                <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                            </li>
                            <li>
                                For modification due to <span class="font-semibold">Change of Ownership</span>,
                                Photocopy of Order / Decision approving the change of ownership
                                <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                            </li>
                        </ol>
                    </div>
                    <div class="mt-3 flex flex-wrap gap-3 justify-center">
                        <a href="{{ route('forms.show', ['formType' => '1-22', 'category' => 'catv-station-license']) }}"
                            class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                            Apply using Form 1-22 (TVRO Registration Certificate/TVRO Station License/CATV Station
                            License)
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

            <p class="text-xs text-gray-600">
                *The visual operation of Broadcast and CATV Stations shall be carried on by a licensed Radio Operator
                and supervised by a licensed Professional Electronics Engineer (PECE) or Electronics Engineer (ECE).
            </p>
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
