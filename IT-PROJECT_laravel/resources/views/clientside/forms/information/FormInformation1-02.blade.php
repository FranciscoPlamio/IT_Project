<x-layout>
    <main class="max-w-4xl mx-auto bg-white shadow-md rounded-xl p-6 mt-2">
        <a href="{{ route('display.forms') }}" class="inline-flex items-center hover:underline mb-4">
            &#8592; Back
        </a>
        <header class="mb-2 p-1">
            <h1 class="text-2xl font-semibold">Issuance of Radio Operator Certificate (ROC) excluding
                Amateur ROC</h1>
        </header>

        <section class="space-y-4">
            <div>
                <div class="bg-gray-50  rounded-lg p-4 text-gray-700">
                    <div class="space-y-2">
                        <div class="font-semibold">
                            A. Admission Slip for Radio Operator Examination
                        </div>
                        <div class="mt-3 font-semibold">
                            B. Restricted Radiotelephone Operator’s Certificate –
                            Aircraft (RROC-Aircraft) (New/Renewal)
                        </div>
                        <div class="mt-3 font-semibold">
                            C. Temporary ROC for Foreign Pilot

                        </div>
                        <div class="mt-3 font-semibold">
                            D. Special Radio Operator's Permit (SROP)
                            (New/Renewal)
                        </div>
                        <div class="mt-3 font-semibold">
                            E. Government Radio Operator Certificate (GROC)
                            (New/Renewal)
                        </div>
                        <div class="mt-3 font-semibold">
                            F. Restricted Radiotelephone Operator’s Certificate for
                            Land Mobile Station (RROC-RLM) (New/Renewal)
                        </div>
                        <div class="mt-3 font-semibold">
                            G. Modification of any of the above certificates
                        </div>
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div>
                <div class="text-xl font-medium">Description :</div>
                <div class=" bg-gray-50  rounded-lg p-4 text-gray-700">
                    <p>
                        A <span class="font-semibold">Radio Operator Certificate</span> is a written authority issued by
                        the Commission authorizing
                        the holder thereof to operate a particular class of radio station under a specific radio
                        service
                    </p>
                    <p class="">
                        The <span class="font-semibold">renewal</span> of a <span class="font-semibold">Radio Operator
                            Certificate</span> is required for the continuous operation of
                        a particular class of radio station under a specific radio service.
                    </p>
                    <p class="">
                        The <span class="font-semibold">modification</span> of a <span class="font-semibold">Radio
                            Operator Certificate</span> is required
                        for changes in the
                        particulars indicated in the Certificate.
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
                        <ul class="list-disc pl-5 mt-1">
                            <li>Individuals who have passed the Commercial Radio
                                Operator’s Examination conducted by NTC
                            </li>
                            <li>Commercial pilots and student pilots
                            </li>
                            <li>Government radio operators who have completed the
                                Government Radio Operator’s Seminar conducted by NTC
                            </li>
                            <li>Individuals working in the maritime service who have
                                completed the Special Radio Operator’s Seminar
                                conducted by NTC
                            </li>
                            <li>Individuals who have completed the Restricted Land Mobile
                                Radiotelephone Operator’s Seminar conducted by NTC
                            </li>
                            <li>Licensed pilots of foreign countries
                            </li>
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
                    <div class="space-y-2">
                        <!-- Requirements A. Commercial ROC (1RTG, 2RTG, 3RTG, 1PHN, 2PHN, 3PHN)-->
                        <div>
                            <div class="text-xl font-medium">A. Commercial ROC (1RTG, 2RTG, 3RTG, 1PHN,
                                2PHN, 3PHN)
                            </div>
                            <div class=" bg-gray-50  rounded-lg p-4 text-gray-700 space-y-2">

                                <div class="font-semibold">A.1 Commercial ROC (NEW)
                                </div>
                                <ol class="list-decimal pl-8 space-y-2">
                                    <li>
                                        Duly accomplished APPLICATION FOR RADIO OPERATOR
                                        CERTIFICATE
                                        <span class="italic">
                                            <a href="{{ route('forms.show', ['formType' => '1-02']) }}" target="_blank"
                                                class="text-blue-600 underline hover:text-blue-800">
                                                (Form No. NTC 1-02)
                                            </a>
                                        </span>
                                        <div class="text-sm text-gray-600 ">Where to secure: <a
                                                href="{{ route('forms.show', ['formType' => '1-02']) }}" target="_blank"
                                                class="text-blue-600 underline hover:text-blue-800">
                                                (Form No. NTC 1-02)
                                            </a></div>
                                    </li>

                                    <li>
                                        Photocopy of valid Report of Rating
                                    </li>
                                    <li>
                                        Three (3) ID pictures (1” x 1”) taken within the last six
                                        (6) months
                                    </li>
                                    <li>
                                        For upgrade to higher class, Photocopy of valid ROC
                                    </li>
                                </ol>
                                <div class="font-semibold">A.1 Commercial ROC (RENWEAL)
                                </div>
                                <ol class="list-decimal pl-8 space-y-2">
                                    <li>
                                        Duly accomplished APPLICATION FOR RADIO OPERATOR
                                        CERTIFICATE
                                        <span class="italic">
                                            <a href="{{ route('forms.show', ['formType' => '1-02']) }}" target="_blank"
                                                class="text-blue-600 underline hover:text-blue-800">
                                                (Form No. NTC 1-02)
                                            </a>
                                        </span>
                                        <div class="text-sm text-gray-600 ">Where to secure: <a
                                                href="{{ route('forms.show', ['formType' => '1-02']) }}" target="_blank"
                                                class="text-blue-600 underline hover:text-blue-800">
                                                (Form No. NTC 1-02)
                                            </a></div>
                                    </li>

                                    <li>
                                        Photocopy of Radio Operator Certificate
                                    </li>
                                    <li>
                                        Three (3) ID pictures (1” x 1”) taken within the last six
                                        (6) months
                                    </li>

                                </ol>
                            </div>
                            <!-- Requirements B. Restricted Radiotelephone Operator’s Certificate – Aircraft (RROC-Aircraft)-->
                            <div class="text-xl font-medium">B. Restricted Radiotelephone Operator’s Certificate –
                                Aircraft (RROC-Aircraft)
                            </div>
                            <div class=" bg-gray-50  rounded-lg p-4 text-gray-700 space-y-2">

                                <div class="font-semibold">B.1 RROC-Aircraft (NEW)
                                </div>
                                <ol class="list-decimal pl-8 space-y-2">
                                    <li>
                                        Duly accomplished APPLICATION FOR RADIO OPERATOR
                                        CERTIFICATE
                                        <span class="italic">
                                            <a href="{{ route('forms.show', ['formType' => '1-02']) }}" target="_blank"
                                                class="text-blue-600 underline hover:text-blue-800">
                                                (Form No. NTC 1-02)
                                            </a>
                                        </span>
                                        <div class="text-sm text-gray-600 ">Where to secure: <a
                                                href="{{ route('forms.show', ['formType' => '1-02']) }}" target="_blank"
                                                class="text-blue-600 underline hover:text-blue-800">
                                                (Form No. NTC 1-02)
                                            </a></div>
                                    </li>

                                    <li>
                                        Photocopy of valid Report of Rating
                                    </li>
                                    <li>
                                        Three (3) ID pictures (1” x 1”) taken within the last six
                                        (6) months
                                    </li>
                                </ol>
                                <div class="font-semibold">B.2 RROC-Aircraft (RENEWAL)
                                </div>
                                <ol class="list-decimal pl-8 space-y-2">
                                    <li>
                                        Duly accomplished APPLICATION FOR RADIO OPERATOR
                                        CERTIFICATE
                                        <span class="italic">
                                            <a href="{{ route('forms.show', ['formType' => '1-02']) }}" target="_blank"
                                                class="text-blue-600 underline hover:text-blue-800">
                                                (Form No. NTC 1-02)
                                            </a>
                                        </span>
                                        <div class="text-sm text-gray-600 ">Where to secure: <a
                                                href="{{ route('forms.show', ['formType' => '1-02']) }}" target="_blank"
                                                class="text-blue-600 underline hover:text-blue-800">
                                                (Form No. NTC 1-02)
                                            </a></div>
                                    </li>

                                    <li>
                                        Photocopy of Radio Operator Certificate
                                    </li>
                                    <li>
                                        Three (3) ID pictures (1” x 1”) taken within the last six
                                        (6) months
                                    </li>

                                </ol>
                            </div>


                            <!-- Requirements C. Temporary ROC for Foreign Pilot
-->
                            <div>
                                <div class="text-xl font-medium">C. Temporary ROC for Foreign Pilot</div>
                                <div class="bg-gray-50  rounded-lg p-4 text-gray-700 space-y-2">
                                    <ol class="list-decimal pl-8 space-y-2">
                                        <li>
                                            Duly accomplished APPLICATION FOR RADIO OPERATOR
                                            CERTIFICATE [Form No. NTC 1-02]
                                        </li>
                                        <li>
                                            Photocopy of pilot license issued from country of origin
                                            <p class="ml-6 mb-2">Note 1: The applicant has to show the Original.</p>
                                        </li>
                                        <li>
                                            Three (3) ID pictures (1” x 1”) taken within the last six
                                            (6) months
                                        </li>
                                    </ol>
                                </div>
                            </div>

                            <!-- Requirements D. Special Radio Operator's Permit (SROP)-->
                            <div class="text-xl font-medium">D. Special Radio Operator's Permit (SROP)
                            </div>
                            <div class=" bg-gray-50  rounded-lg p-4 text-gray-700 space-y-2">

                                <div class="font-semibold">D.1 Special Radio Operator's Permit (NEW)
                                </div>
                                <ol class="list-decimal pl-8 space-y-2">
                                    <li>
                                        Duly accomplished APPLICATION FOR RADIO OPERATOR
                                        CERTIFICATE
                                        <span class="italic">
                                            <a href="{{ route('forms.show', ['formType' => '1-02']) }}" target="_blank"
                                                class="text-blue-600 underline hover:text-blue-800">
                                                (Form No. NTC 1-02)
                                            </a>
                                        </span>
                                        <div class="text-sm text-gray-600 ">Where to secure: <a
                                                href="{{ route('forms.show', ['formType' => '1-02']) }}"
                                                target="_blank" class="text-blue-600 underline hover:text-blue-800">
                                                (Form No. NTC 1-02)
                                            </a></div>
                                    </li>

                                    <li>
                                        Photocopy of Certificate of Completion of seminar
                                    </li>
                                    <li>
                                        Three (3) ID pictures (1” x 1”) taken within the last six
                                        (6) months
                                    </li>
                                </ol>
                                <div class="font-semibold">D.1 Special Radio Operator's Permit (RENEWAL)
                                </div>
                                <ol class="list-decimal pl-8 space-y-2">
                                    <li>
                                        Duly accomplished APPLICATION FOR RADIO OPERATOR
                                        CERTIFICATE
                                        <span class="italic">
                                            <a href="{{ route('forms.show', ['formType' => '1-02']) }}" target="_blank"
                                                class="text-blue-600 underline hover:text-blue-800">
                                                (Form No. NTC 1-02)
                                            </a>
                                        </span>
                                        <div class="text-sm text-gray-600 ">Where to secure: <a
                                                href="{{ route('forms.show', ['formType' => '1-02']) }}"
                                                target="_blank" class="text-blue-600 underline hover:text-blue-800">
                                                (Form No. NTC 1-02)
                                            </a></div>
                                    </li>

                                    <li>
                                        Photocopy of Radio Operator Certificate
                                    </li>
                                    <li>
                                        Three (3) ID pictures (1” x 1”) taken within the last six
                                        (6) months
                                    </li>

                                </ol>
                            </div>

                            <!-- Requirements E. Government Radio Operator Certificate (GROC)-->
                            <div class="text-xl font-medium">E. Government Radio Operator Certificate (GROC)
                            </div>
                            <div class=" bg-gray-50  rounded-lg p-4 text-gray-700 space-y-2">

                                <div class="font-semibold">E.1 Government Radio Operator Certificate (NEW)
                                </div>
                                <ol class="list-decimal pl-8 space-y-2">
                                    <li>
                                        Duly accomplished APPLICATION FOR RADIO OPERATOR
                                        CERTIFICATE
                                        <span class="italic">
                                            <a href="{{ route('forms.show', ['formType' => '1-02']) }}"
                                                target="_blank" class="text-blue-600 underline hover:text-blue-800">
                                                (Form No. NTC 1-02)
                                            </a>
                                        </span>
                                        <div class="text-sm text-gray-600 ">Where to secure: <a
                                                href="{{ route('forms.show', ['formType' => '1-02']) }}"
                                                target="_blank" class="text-blue-600 underline hover:text-blue-800">
                                                (Form No. NTC 1-02)
                                            </a></div>
                                    </li>

                                    <li>
                                        Photocopy of ALL of the following:
                                        <ul class="ml-6">
                                            <li>2.1 Service Record
                                            </li>
                                            <li>2.2 Certificate of Good Moral Character</li>
                                            <li>2.3 Certification that the applicant is in the government
                                                service as a radio operator </li>
                                        </ul>
                                        <div class="text-sm text-gray-600 ">Where to secure: Applicant’s employer
                                        </div>
                                    </li>
                                    <li>
                                        Three (3) ID pictures (1” x 1”) taken within the last six
                                        (6) months
                                    </li>
                                </ol>
                                <div class="font-semibold">E.2 Government Radio Operator Certificate (RENEWAL)
                                </div>
                                <ol class="list-decimal pl-8 space-y-2">
                                    <li>
                                        Duly accomplished APPLICATION FOR RADIO OPERATOR
                                        CERTIFICATE
                                        <span class="italic">
                                            <a href="{{ route('forms.show', ['formType' => '1-02']) }}"
                                                target="_blank" class="text-blue-600 underline hover:text-blue-800">
                                                (Form No. NTC 1-02)
                                            </a>
                                        </span>
                                        <div class="text-sm text-gray-600 ">Where to secure: <a
                                                href="{{ route('forms.show', ['formType' => '1-02']) }}"
                                                target="_blank" class="text-blue-600 underline hover:text-blue-800">
                                                (Form No. NTC 1-02)
                                            </a></div>
                                    </li>

                                    <li>
                                        Photocopy of Radio Operator Certificate
                                    </li>
                                    <li>
                                        Three (3) ID pictures (1” x 1”) taken within the last six
                                        (6) months
                                    </li>
                                    <li>
                                        Certificate of Employment
                                        <div class="text-sm text-gray-600 ">Where to secure: Applicant’s employer
                                        </div>
                                    </li>

                                </ol>
                            </div>

                            <!-- Requirements F. Restricted Radiotelephone Operator’s Certificate
for Land Mobile Station (RROC-RLM)-->
                            <div class="text-xl font-medium">F. Restricted Radiotelephone Operator’s Certificate
                                for Land Mobile Station (RROC-RLM)

                            </div>
                            <div class=" bg-gray-50  rounded-lg p-4 text-gray-700 space-y-2">

                                <div class="font-semibold">F.1 Restricted Radiotelephone Operator’s Certificate
                                    for Land Mobile Station (RROC-RLM)
                                    (NEW)
                                </div>
                                <ol class="list-decimal pl-8 space-y-2">
                                    <li>
                                        Duly accomplished APPLICATION FOR RADIO OPERATOR
                                        CERTIFICATE
                                        <span class="italic">
                                            <a href="{{ route('forms.show', ['formType' => '1-02']) }}"
                                                target="_blank" class="text-blue-600 underline hover:text-blue-800">
                                                (Form No. NTC 1-02)
                                            </a>
                                        </span>
                                        <div class="text-sm text-gray-600 ">Where to secure: <a
                                                href="{{ route('forms.show', ['formType' => '1-02']) }}"
                                                target="_blank" class="text-blue-600 underline hover:text-blue-800">
                                                (Form No. NTC 1-02)
                                            </a></div>
                                    </li>

                                    <li>
                                        Photocopy of Certificate of Completion of seminar
                                    </li>
                                    <li>
                                        Three (3) ID pictures (1” x 1”) taken within the last six
                                        (6) months
                                    </li>
                                </ol>
                                <div class="font-semibold">F.2 Restricted Radiotelephone Operator’s Certificate
                                    for Land Mobile Station (RROC-RLM) (RENEWAL)
                                </div>
                                <ol class="list-decimal pl-8 space-y-2">
                                    <li>
                                        Duly accomplished APPLICATION FOR RADIO OPERATOR
                                        CERTIFICATE
                                        <span class="italic">
                                            <a href="{{ route('forms.show', ['formType' => '1-02']) }}"
                                                target="_blank" class="text-blue-600 underline hover:text-blue-800">
                                                (Form No. NTC 1-02)
                                            </a>
                                        </span>
                                        <div class="text-sm text-gray-600 ">Where to secure: <a
                                                href="{{ route('forms.show', ['formType' => '1-02']) }}"
                                                target="_blank" class="text-blue-600 underline hover:text-blue-800">
                                                (Form No. NTC 1-02)
                                            </a></div>
                                    </li>

                                    <li>
                                        Photocopy of Radio Operator Certificate
                                    </li>
                                    <li>
                                        Three (3) ID pictures (1” x 1”) taken within the last six
                                        (6) months
                                    </li>
                                    <li>
                                        Certificate of Employment
                                        <div class="text-sm text-gray-600 ">Where to secure: Applicant’s employer
                                        </div>
                                    </li>

                                </ol>
                            </div>

                            <!-- Requirements G. Modification of any of the above certificates-->
                            <div>
                                <div class="text-xl font-medium">G. Modification of any of the above certificates
                                </div>
                                <div class="bg-gray-50  rounded-lg p-4 text-gray-700 space-y-2">
                                    <ol class="list-decimal pl-8 space-y-2">
                                        <li>
                                            Duly accomplished APPLICATION FOR RADIO OPERATOR
                                            CERTIFICATE
                                            <span class="italic">
                                                <a href="{{ route('forms.show', ['formType' => '1-02']) }}"
                                                    target="_blank"
                                                    class="text-blue-600 underline hover:text-blue-800">
                                                    (Form No. NTC 1-02)
                                                </a>
                                            </span>
                                            <div class="text-sm text-gray-600 ">Where to secure: <a
                                                    href="{{ route('forms.show', ['formType' => '1-02']) }}"
                                                    target="_blank"
                                                    class="text-blue-600 underline hover:text-blue-800">
                                                    (Form No. NTC 1-02)
                                                </a></div>
                                        </li>

                                        <li>
                                            Photocopy of Radio Operator Certificate
                                        </li>
                                        <li>
                                            Three (3) ID pictures (1” x 1”) taken within the last six
                                            (6) months
                                        </li>
                                        <li>
                                            For correction of name, Photocopy of any valid
                                            government ID, OR Photocopy of Birth Certificate, OR
                                            Photocopy of Marriage Certificate

                                            <div class="text-sm text-gray-600 ">Where to secure:BIR/Post
                                                Office/DFA/SSS/
                                                GSIS/PAG-IBIG/PSA
                                            </div>
                                        </li>

                                    </ol>
                                </div>
                            </div>

                            <!-- Supporting Documents for Representative(s)-->
                            <div>
                                <div class="text-xl font-medium">Supporting Documents for Representative(s)</div>
                                <div class="bg-gray-50  rounded-lg p-4 text-gray-700 space-y-2">
                                    <ol class="list-decimal pl-8 space-y-2">
                                        <li>
                                            Authorization letter duly signed by the applicant and
                                            valid ID of the authorized representative.
                                        </li>
                                    </ol>
                                </div>
                            </div>


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

            <a href="{{ route('forms.show', ['formType' => '1-02']) }}"
                class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                Sign Up
            </a>
        </div>
    </main>



</x-layout>
