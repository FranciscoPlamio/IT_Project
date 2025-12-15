<x-layout :title="'Issuance / Release — Admission Slip & Report of Rating'">
    <main class="max-w-4xl mx-auto bg-white shadow-md rounded-xl p-6 mt-2">
        <a href="{{ url()->previous() }}"class="inline-flex items-center hover:underline mb-4">
            &#8592; Back
        </a>
        <header class="mb-2 p-1">
            <h1 class="text-2xl font-semibold">Issuance / Release — Admission Slip</h1>
        </header>

        <section class="space-y-4">
            <div>
                <div class="bg-gray-50  rounded-lg p-4 text-gray-700">
                    <div class="space-y-2">
                        <div class="font-semibold">A. Admission Slip for Radio Operator Examination</div>
                        <ul class="list-disc pl-18">
                            <li>RROC-Aircraft (RROC)</li>
                            <li>Radiotelephone / Radiotelegraph (RTG)</li>
                            <li>Amateur</li>
                        </ul>

                    </div>
                </div>
            </div>

            <!-- Description -->
            <div>
                <div class="text-xl font-medium">Description :</div>
                <div class=" bg-gray-50  rounded-lg p-4 text-gray-700">
                    <p>
                        The <span class="font-semibold">Admission Slip</span> is a document issued by the Commission to
                        a qualified applicant authorizing
                        the holder
                        to take the commercial or non-commercial radio operator examination.
                    </p>

                </div>
            </div>

            <!-- Office / Division -->
            <div>
                <div class="text-xl font-medium">Office or Division :</div>
                <div class="mt-2 bg-gray-50  rounded-lg p-4 text-gray-700">
                    Regional Office - Enforcement and Operations Division (EOD), Office of the Regional Director (ORD)
                </div>
            </div>

            <!-- Who may avail -->
            <div>
                <div class="text-xl font-medium">Who may avail :</div>
                <div class="mt-2 bg-gray-50  rounded-lg p-4 text-gray-700 space-y-3">
                    <div>
                        <div class="font-semibold">A.1. Restricted Radio Operator Certificate (RROC) – Aircraft</div>
                        <ul class="list-disc pl-5 mt-1">
                            <li>Commercial pilots</li>
                            <li>Student pilots</li>
                        </ul>
                    </div>

                    <div>
                        <div class="font-semibold">A.2. Radiotelephone / Radiotelegraph (RTG)</div>
                        <ul class="list-disc pl-5 mt-1">
                            <li>Graduates of General Radio Communication Operator (GRCO)</li>
                            <li>Graduates of Industrial Electronics Technician Course (IETC)</li>
                            <li>Graduates of Communications Technician Course (CTC)</li>
                            <li>Graduates of BS Avionics Technology (BS AVTECH)</li>
                            <li>Graduates of BS Electronics and Communications Engineering / BS Electronics Engineering
                                (BS ECE)</li>
                        </ul>
                    </div>

                    <div>
                        <div class="font-semibold">A.3. Amateur</div>
                        <ul class="list-disc pl-5 mt-1">
                            <li>Radio enthusiasts</li>
                            <li>Registered Electronics and Communications Engineer (ECE) and commercial operators (see
                                notes
                                <a href="https://ntc5.ntc.gov.ph/wp-content/uploads/2019/09/MC-03-08-2012-Revised-Amateur-Regulation.pdf#page=10"
                                    target="_blank" class="text-blue-600 underline hover:text-blue-800">Sec. IV - Item 5
                                    of NTC Memorandum Circular 3-8-2012</a>)
                            </li>
                            <li>Licensed amateurs (for upgrading)</li>
                        </ul>
                    </div>

                </div>
            </div>
        </section>

        <!--Requirements -->
        <header class="mb-2 mt-8 p-1">
            <h1 class="text-2xl font-semibold">Requirements</h1>
        </header>

        <section class="space-y-4">
            <div>
                <div class="bg-gray-50 rounded-lg p-4 text-gray-700">
                    <div class="space-y-4">
                        <!-- Requirements A.1. RROC – Aircraft -->
                        <div>
                            <div class="font-semibold">A.1. RROC – Aircraft</div>
                            <ol class="list-decimal pl-8 space-y-3">
                                <li>
                                    Duly accomplished APPLICATION FOR RADIO OPERATOR EXAMINATION
                                    <span class="italic">
                                        <a href="{{ route('forms.show', ['formType' => '1-01']) }}" target="_blank"
                                            class="text-blue-600 underline hover:text-blue-800">
                                            (Form No. NTC 1-01)
                                        </a>
                                    </span>
                                    <div class="text-sm text-gray-600 mt-1">Where to secure: <a
                                            href="{{ route('forms.show', ['formType' => '1-01']) }}" target="_blank"
                                            class="text-blue-600 underline hover:text-blue-800">
                                            (Form No. NTC 1-01)
                                        </a></div>
                                </li>

                                <li>
                                    Aircraft pilot’s license OR student pilot’s license issued by the
                                    Civil Aviation Authority of the Philippines (CAAP) /
                                    Certified True Copy of the Pilot license issued by the aviation
                                    authority of the Administration OR endorsed by the Embassy of
                                    foreign applicants OR Photocopy of Report of Rating for Retakers
                                    <div class="text-sm text-gray-600 mt-1">Where to secure: Civil Aviation Authority of
                                        the Philippines (CAAP)</div>
                                </li>

                                <li>
                                    Two (2) ID pictures (1” x 1”) taken within the last six (6) months
                                </li>
                            </ol>
                        </div>

                        <!-- A.2 Radiotelephone/ Radiotelegraph
Requirements -->
                        <div>
                            <div class="font-semibold">A.2 Radiotelephone/ Radiotelegraph
                            </div>
                            <ol class="list-decimal pl-8 space-y-3">
                                <li>
                                    Duly accomplished APPLICATION FOR RADIO OPERATOR EXAMINATION
                                    <span class="italic">
                                        <a href="{{ route('forms.show', ['formType' => '1-01']) }}" target="_blank"
                                            class="text-blue-600 underline hover:text-blue-800">
                                            (Form No. NTC 1-01)
                                        </a>
                                    </span>
                                    <div class="text-sm text-gray-600 mt-1">Where to secure: <a
                                            href="{{ route('forms.show', ['formType' => '1-01']) }}" target="_blank"
                                            class="text-blue-600 underline hover:text-blue-800">
                                            (Form No. NTC 1-01)
                                        </a></div>
                                </li>

                                <li>
                                    Photocopy of ANY of the following:
                                    <ul class="ml-6 list-disc">
                                        <li>National ID</li>
                                        <li>Birth Certificate</li>
                                        <li>Baptismal Certificate</li>
                                        <li>Passport</li>
                                        <li>Driver’s License OR any document which can serve as the basis for age
                                            requirement</li>
                                    </ul>
                                    <p class="ml-6 mt-2">Note 1: The applicant has to show the Original.</p>
                                    <p class="ml-6">Note 2: This requirement is not applicable for Retakers.</p>
                                    <div class="text-sm text-gray-600 mt-1">Where to secure: PSA/ Church/ DFA/ PRC/ LTO/
                                        BIR/ Post Office/ SSS/ GSIS/
                                        PAG-IBIG/NBI
                                    </div>
                                </li>


                                <li>
                                    Photocopy of Transcript of Records with Special Order
                                    (SO)
                                    <p class="ml-6 mt-2">Note 1: The applicant has to show the Original.</p>
                                    <p class="ml-6">Note 2: SO is not required for State Universities/
                                        Colleges.
                                    </p>
                                    <p class="ml-6">Note 3: This requirement is not applicable for Retakers.
                                    </p>
                                </li>
                                <li>
                                    Two (2) ID pictures (1” x 1”) taken within the last six (6) months
                                </li>
                                <li>
                                    For upgrade to higher class, Copy of valid ROC
                                </li>
                                <li>
                                    For Retakers, Copy of Report of Rating
                                </li>
                            </ol>
                        </div>

                        <!-- A.3. Amateur (Class A, Class B, Class C, Class D)
Requirements -->
                        <div>
                            <div class="font-semibold">A.3. Amateur (Class A, Class B, Class C, Class D)

                            </div>
                            <ol class="list-decimal pl-8 space-y-3">
                                <li>
                                    Duly accomplished APPLICATION FOR RADIO OPERATOR EXAMINATION
                                    <span class="italic">
                                        <a href="{{ route('forms.show', ['formType' => '1-01']) }}" target="_blank"
                                            class="text-blue-600 underline hover:text-blue-800">
                                            (Form No. NTC 1-01)
                                        </a>
                                    </span>
                                    <div class="text-sm text-gray-600 mt-1">Where to secure: <a
                                            href="{{ route('forms.show', ['formType' => '1-01']) }}" target="_blank"
                                            class="text-blue-600 underline hover:text-blue-800">
                                            (Form No. NTC 1-01)
                                        </a></div>
                                </li>

                                <li>
                                    Photocopy of ANY of the following:
                                    <ul class="ml-6 list-disc">
                                        <li>National ID</li>
                                        <li>Birth Certificate</li>
                                        <li>Baptismal Certificate</li>
                                        <li>Passport</li>
                                        <li>Driver’s License OR any document which can serve as the basis for age
                                            requirement</li>
                                    </ul>
                                    <p class="ml-6 mt-2">Note 1: The applicant has to show the Original.</p>
                                    <p class="ml-6">Note 2: This requirement is not applicable for Retakers.</p>
                                    <div class="text-sm text-gray-600 mt-1">Where to secure: PSA/ Church/ DFA/ PRC/ LTO/
                                        BIR/ Post Office/ SSS/ GSIS/
                                        PAG-IBIG/NBI
                                    </div>
                                </li>


                                <li>
                                    Certificate of attendance of seminar issued by NTC
                                    accredited Amateur Radio Club

                                    <p class="ml-6 mt-2">Note 1: This requirement is not applicable for Retakers</p>
                                    <div class="text-sm text-gray-600 mt-1">Where to secure: NTC accredited Amateur
                                        Radio Club
                                    </div>
                                </li>
                                <li>
                                    Two (2) ID pictures (1” x 1”) taken within the last six (6) months
                                </li>
                                <li>
                                    For upgrade to higher class, Copy of valid AT-ROC
                                </li>
                                <li>
                                    For Special Candidates taking Class B (Element 2
                                    only), valid PRC License OR 1PHN OR 1RTG/2RTG
                                </li>
                                <li>
                                    For Retakers, Copy of Report of Rating
                                </li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>


        </section>
        <div class="flex justify-between mt-6">
            <a href="{{ route('display.forms') }}"
                class="bg-gray-300 text-gray-800 px-6 py-2 rounded-lg hover:bg-gray-400 transition">
                Back
            </a>

            <a href="{{ route('forms.show', ['formType' => '1-01']) }}"
                class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                Sign Up
            </a>
        </div>
    </main>



</x-layout>
