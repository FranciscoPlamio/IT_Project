<x-layout :title="'Issuance of Certificates, Permits and Licenses in the Amateur Service'">
    <main class="max-w-5xl mx-auto bg-white shadow-md rounded-xl p-6 mt-2">
        <a href="{{ url()->previous() }}" class="inline-flex items-center hover:underline mb-4">
            &#8592; Back
        </a>

        <!-- Header -->
        <header class="mb-4 p-1">
            <h1 class="text-2xl font-semibold">
                Issuance of Certificates, Permits and Licenses in the Amateur Service
            </h1>
        </header>

        <!-- Description / Service Name -->
        <section class="space-y-4">
            <div>
                <div class="bg-gray-50 rounded-lg p-4 text-gray-700 space-y-2">
                    <div class="font-semibold">Service Name</div>
                    <p>
                        Issuance of Certificates, Permits and Licenses in the Amateur Service covering:
                    </p>
                    <ul class="list-disc pl-6 space-y-1">
                        <li>Amateur Radio Operator Certificate (AT-ROC) — New, Renewal, Modification</li>
                        <li>Amateur Radio Station License (AT-RSL) — New, Renewal, Modification</li>
                        <li>Lifetime Amateur Radio Station License for Class A (AT-LIFETIME) — New, Modification</li>
                        <li>Amateur Club Radio Station License (AT-CLUB RSL) — New, Renewal, Modification</li>
                        <li>Temporary Permit to Operate an Amateur Radio Station – Foreign Visitor (New)</li>
                        <li>Special Permit for the Use of Vanity Call Sign (New / Renewal)</li>
                        <li>Special Permit for the Use of Special Event Call Sign (New)</li>
                        <li>Permit to Possess (for Storage) of Amateur Radio Stations</li>
                    </ul>
                </div>
            </div>
            <!-- Description -->
            <div>
                <div class="text-xl font-medium">Description :</div>
                <div class=" bg-gray-50  rounded-lg p-4 text-gray-700 space-y-4">
                    <p>
                        The Amateur Radio Operator Certificate and/or Amateur Radio Station License
                        including Permits are written authorities issued by the Commission to a person or a club
                        authorizing the holder thereof to operate a class of radio station in the Amateur Service.
                    </p>
                    <p class="">
                        The renewal of Amateur Radio Operator Certificate, Amateur Radio Station License
                        and/or Special Permit for the Use of Vanity Call Sign are required for the continuous
                        operation of any class of radio stations in the Amateur Service.
                    </p>
                    <p class="">
                        The modification of Amateur Radio Operator Certificate and/or Amateur Radio
                        Station License is required for changes in the particulars indicated in the
                        Certificate/License.

                    </p>
                    <p>A Permit to Possess (for Storage) is a written authority issued by the Commission
                        authorizing the holder thereof to possess radio communications equipment.</p>
                </div>
            </div>
            <!-- Office / Division -->
            <div>
                <div class="text-xl font-medium">Office or Division :</div>
                <div class="mt-2 bg-gray-50 rounded-lg p-4 text-gray-700">
                    Regional Office - Enforcement and Operations Division (EOD),
                    Office of the Regional Director (ORD)
                </div>
            </div>

            <!-- Classification / Type of Transaction / Who may avail -->
            <div class="grid gap-4 md:grid-cols-2">
                <div class="bg-gray-50 rounded-lg p-4 text-gray-700 space-y-2">
                    <div class="font-semibold">Classification</div>
                    <p>Simple</p>

                    <div class="font-semibold mt-2">Type of Transaction</div>
                    <p>G2C – Government to Citizen</p>
                </div>

                <div class="bg-gray-50 rounded-lg p-4 text-gray-700 space-y-2">
                    <div class="font-semibold">Who may avail</div>
                    <ul class="list-disc pl-6 space-y-1">
                        <li>Individuals who have passed the Amateur Radio Operator Examination conducted by NTC</li>
                        <li>Duly accredited amateur radio clubs</li>
                        <li>Foreign amateurs qualified under the reciprocity agreement</li>
                        <li>Licensed amateur radio operators</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Requirements -->
        <header class="mb-2 mt-8 p-1">
            <h2 class="text-2xl font-semibold">Checklist of Requirements</h2>
        </header>
        <div class="bg-gray-50 rounded-lg p-4 text-gray-700">
            <div class="space-y-2">

                <!-- A -->
                <div x-data="{ open: false }" class="bg-gray-50 rounded-lg p-4 text-gray-700">
                    <button @click="open = !open"
                        class="w-full text-left flex justify-between items-center font-semibold text-lg">
                        A. Amateur Radio Operator Certificate (AT-ROC)
                        <span class="ml-2" x-text="open ? '-' : '+'"></span>
                    </button>
                    <div x-show="open" x-transition class="mt-2 text-gray-600">
                        <!-- A.1 AT-ROC (New) -->
                        <div class="space-y-2">
                            <div class="font-semibold">A.1 AT-ROC (NEW)</div>
                            <ol class="list-decimal pl-6 space-y-1">
                                <li>
                                    Duly accomplished APPLICATION FOR AMATEUR RADIO OPERATOR CERTIFICATE /
                                    AMATEUR RADIO STATION LICENSE
                                    <span class="italic">(Form No. NTC 1-03)</span>
                                    <span class="block text-sm text-gray-600">
                                        Where to secure: Licensing Unit / Website:
                                        <a href="https://ntc.gov.ph" target="_blank"
                                            class="text-blue-600 underline hover:text-blue-800">ntc.gov.ph</a>
                                    </span>
                                </li>
                                <li>Photocopy of valid Report of Rating
                                    <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                                </li>
                                <li>Three (3) ID pictures (1” x 1”) taken within the last six (6) months
                                    <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                                </li>
                            </ol>
                        </div>

                        <!-- A.2 AT-ROC (Renewal) -->
                        <div class="space-y-2">
                            <div class="font-semibold">A.2 AT-ROC (RENEWAL)</div>
                            <ol class="list-decimal pl-6 space-y-1">
                                <li>
                                    Duly accomplished APPLICATION FOR AMATEUR RADIO OPERATOR CERTIFICATE /
                                    AMATEUR RADIO STATION LICENSE
                                    <span class="italic">(Form No. NTC 1-03)</span>
                                    <span class="block text-sm text-gray-600">
                                        Where to secure: Licensing Unit / Website:
                                        <a href="https://ntc.gov.ph" target="_blank"
                                            class="text-blue-600 underline hover:text-blue-800">ntc.gov.ph</a>
                                    </span>
                                </li>
                                <li>Photocopy of AT-ROC
                                    <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                                </li>
                                <li>Proof of Amateur Activity(ies)
                                    <span class="block text-sm text-gray-600">
                                        Where to secure: PARA / Amateur Club / Amateur
                                    </span>
                                </li>
                                <li>Three (3) ID pictures (1” x 1”) taken within the last six (6) months
                                    <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                                </li>
                            </ol>
                        </div>

                        <!-- A.3 AT-ROC (Modification) -->
                        <div class="space-y-2">
                            <div class="font-semibold">A.3 AT-ROC (MODIFICATION)</div>
                            <ol class="list-decimal pl-6 space-y-1">
                                <li>
                                    Duly accomplished APPLICATION FOR AMATEUR RADIO OPERATOR CERTIFICATE /
                                    AMATEUR RADIO STATION LICENSE
                                    <span class="italic">(Form No. NTC 1-03)</span>
                                    <span class="block text-sm text-gray-600">
                                        Where to secure: Licensing Unit / Website:
                                        <a href="https://ntc.gov.ph" target="_blank"
                                            class="text-blue-600 underline hover:text-blue-800">ntc.gov.ph</a>
                                    </span>
                                </li>
                                <li>Photocopy of AT-ROC
                                    <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                                </li>
                                <li>Three (3) ID pictures (1” x 1”) taken within the last six (6) months
                                    <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                                </li>
                                <li>
                                    For upgrade to higher class, Photocopy of valid Report of Rating
                                    <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                                </li>
                            </ol>
                        </div>
                        <div class="mt-2 space-y-4 text-center">
                            <!-- Apply for AT-ROC Certificate -->
                            <div class="space-y-1">
                                <a href="{{ route('forms.show', ['formType' => '1-03', 'category' => 'atroc']) }}"
                                    class="block w-full bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition text-center">
                                    Apply for AT-ROC Certificate
                                    <span class="text-sm text-gray-200 font-normal">(New, Renewal, and
                                        Modification)</span>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- B -->
                <div x-data="{ open: false }" class="bg-gray-50 rounded-lg p-4 text-gray-700">
                    <button @click="open = !open"
                        class="w-full text-left flex justify-between items-center font-semibold text-lg">
                        B. Amateur Radio Station License (AT-RSL)
                        <span class="ml-2" x-text="open ? '-' : '+'"></span>
                    </button>
                    <div x-show="open" x-transition class="mt-2 text-gray-600">
                        <!-- B.1 Permit to Purchase/Possess -->
                        <div class="space-y-2">
                            <div class="font-semibold">B.1 Permit to Purchase/Possess</div>
                            <ol class="list-decimal pl-6 space-y-1">
                                <li>
                                    Duly accomplished APPLICATION FOR PERMIT TO PURCHASE/POSSESS/SELL/TRANSFER
                                    <span class="italic">(Form No. NTC 1-09)</span>
                                    <span class="block text-sm text-gray-600">
                                        Where to secure: Licensing Unit / Website:
                                        <a href="https://ntc.gov.ph" target="_blank"
                                            class="text-blue-600 underline hover:text-blue-800">ntc.gov.ph</a>
                                    </span>
                                </li>
                                <li>
                                    For new AT-RSL:
                                    <ol class="list-decimal pl-6 space-y-1">
                                        <li>
                                            Photocopy of valid Report of Rating, <span class="font-semibold">OR</span>
                                        </li>
                                        <li>
                                            Photocopy of valid AT-ROC
                                        </li>
                                    </ol>
                                    <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                                </li>
                                <li>
                                    For Change of Equipment and/or Additional Equipment, Photocopy of valid AT-RSL
                                    <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                                </li>
                            </ol>
                        </div>

                        <!-- B.2 AT-RSL (New) -->
                        <div class="space-y-2">
                            <div class="font-semibold">B.2 AT-RSL (NEW)</div>
                            <ol class="list-decimal pl-6 space-y-1">
                                <li>
                                    Duly accomplished APPLICATION FOR AMATEUR RADIO OPERATOR CERTIFICATE /
                                    AMATEUR RADIO STATION LICENSE
                                    <span class="italic">(Form No. NTC 1-03)</span>
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
                                    For AT-ROC holders, Copy of AT-ROC
                                    <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                                </li>
                                <li>
                                    Photocopy of document indicating source of equipment:
                                    <ul class="list-disc pl-6 space-y-1 mt-1">
                                        <li>
                                            For locally-sourced equipment, Official Receipt or Sales Invoice from
                                            authorized
                                            Radio Dealer,
                                            <span class="font-semibold">OR</span>
                                            <span class="block text-sm text-gray-600">Where to secure: Authorized Radio
                                                Dealer</span>
                                        </li>
                                        <li>
                                            For imported equipment, Photocopy of Invoice from the supplier
                                            <span class="font-semibold">AND</span> Photocopy of Permit to Import,
                                            <span class="font-semibold">OR</span>
                                            <span class="block text-sm text-gray-600">Where to secure: Supplier /
                                                Applicant</span>
                                        </li>
                                        <li>
                                            For equipment from licensed Amateur, Duly accomplished
                                            APPLICATION FOR PERMIT TO PURCHASE/POSSESS/SELL/TRANSFER
                                            <span class="italic">(Form No. NTC 1-09)</span>
                                            <span class="font-semibold">AND</span> Photocopy AT-RSL of the Seller
                                            <span class="block text-sm text-gray-600">
                                                Where to secure: Licensing Unit / Website:
                                                <a href="https://ntc.gov.ph" target="_blank"
                                                    class="text-blue-600 underline hover:text-blue-800">ntc.gov.ph</a>
                                                /
                                                Applicant / Licensed Amateur
                                            </span>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    Three (3) ID pictures (1” x 1”) taken within the last six (6) months
                                    <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                                </li>
                            </ol>
                        </div>

                        <!-- B.3 AT-RSL (Renewal) -->
                        <div class="space-y-2">
                            <div class="font-semibold">B.3 AT-RSL (RENEWAL)</div>
                            <ol class="list-decimal pl-6 space-y-1">
                                <li>
                                    Duly accomplished Application for Radio Station License
                                    <span class="italic">(Form No. NTC 1-03)</span>
                                    <span class="block text-sm text-gray-600">
                                        Where to secure: Licensing Unit / Website:
                                        <a href="https://ntc.gov.ph" target="_blank"
                                            class="text-blue-600 underline hover:text-blue-800">ntc.gov.ph</a>
                                    </span>
                                </li>
                                <li>Photocopy of AT-RSL
                                    <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                                </li>
                                <li>
                                    Proof of Amateur Activity(ies)
                                    <span class="block text-sm text-gray-600">
                                        Where to secure: PARA / Amateur Club / Amateur
                                    </span>
                                </li>
                                <li>
                                    Three (3) ID pictures (1” x 1”) taken within the last six (6) months
                                    <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                                </li>
                            </ol>
                        </div>
                        <!-- B.4 AT-RSL (Modification) -->
                        <div class="space-y-2">
                            <div class="font-semibold">B.4 AT-RSL (MODIFICATION)</div>
                            <ol class="list-decimal pl-6 space-y-1">
                                <li>
                                    Duly accomplished APPLICATION FOR AMATEUR RADIO OPERATOR CERTIFICATE /
                                    AMATEUR RADIO STATION LICENSE
                                    <span class="italic">(Form No. NTC 1-03)</span>
                                    <span class="block text-sm text-gray-600">
                                        Where to secure: Licensing Unit / Website:
                                        <a href="https://ntc.gov.ph" target="_blank"
                                            class="text-blue-600 underline hover:text-blue-800">ntc.gov.ph</a>
                                    </span>
                                </li>

                                <li>
                                    Photocopy of AT-RSL
                                    <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                                </li>

                                <li>
                                    Three (3) ID pictures (1” x 1”) taken within the last six (6) months
                                    <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                                </li>

                                <li>
                                    If modification is due to:
                                    <ol class="list-decimal pl-6 space-y-1 mt-1">

                                        <!-- 4.1 Change of Equipment -->
                                        <li>
                                            Change of Equipment and/or Additional Equipment:
                                            <ol class="list-decimal pl-6 space-y-1 mt-1">
                                                <li>
                                                    Photocopy of valid Permit to Purchase/Possess
                                                    <span class="block text-sm text-gray-600">Where to secure:
                                                        Applicant</span>
                                                </li>
                                                <li>
                                                    Photocopy of document indicating source of equipment:
                                                    <ul class="list-disc pl-6 space-y-1 mt-1">
                                                        <li>
                                                            For locally-sourced equipment, Official Receipt or Sales
                                                            Invoice from authorized Radio Dealer
                                                            <span class="font-semibold">OR</span>
                                                            <span class="block text-sm text-gray-600">Where to secure:
                                                                Authorized Radio Dealer</span>
                                                        </li>
                                                        <li>
                                                            For imported equipment, Photocopy of Invoice from the
                                                            supplier
                                                            <span class="font-semibold">AND</span> Photocopy of Permit
                                                            to Import,
                                                            <span class="font-semibold">OR</span>
                                                            <span class="block text-sm text-gray-600">Where to secure:
                                                                Supplier / Applicant</span>
                                                        </li>
                                                        <li>
                                                            For equipment from licensed Amateur, Duly accomplished
                                                            APPLICATION FOR PERMIT TO
                                                            PURCHASE/POSSESS/SELL/TRANSFER
                                                            <span class="italic">(Form No. NTC 1-09)</span>
                                                            <span class="font-semibold">AND</span> Photocopy of AT-RSL
                                                            of the Seller
                                                            <span class="block text-sm text-gray-600">
                                                                Where to secure: Licensing Unit / Website:
                                                                <a href="https://ntc.gov.ph" target="_blank"
                                                                    class="text-blue-600 underline hover:text-blue-800">ntc.gov.ph</a>
                                                                / Applicant / Licensed Amateur
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ol>
                                        </li>

                                        <!-- 4.2 Upgrading -->
                                        <li>
                                            Upgrading, Photocopy of valid Report of Rating
                                            <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                                        </li>

                                        <!-- 4.3 Deletion of Equipment -->
                                        <li>
                                            Deletion of Equipment due to:
                                            <ol class="list-decimal pl-6 space-y-1 mt-1">
                                                <li>
                                                    Lost — Original Affidavit of Loss of Equipment
                                                    <span class="block text-sm text-gray-600">Where to secure:
                                                        Applicant</span>
                                                </li>
                                                <li>
                                                    Storage — Duly accomplished APPLICATION FOR PERMIT TO
                                                    PURCHASE/POSSESS/SELL/TRANSFER
                                                    <span class="italic">(Form No. NTC 1-09)</span>
                                                    <span class="block text-sm text-gray-600">
                                                        Where to secure: Licensing Unit / Website:
                                                        <a href="https://ntc.gov.ph" target="_blank"
                                                            class="text-blue-600 underline hover:text-blue-800">ntc.gov.ph</a>
                                                    </span>
                                                </li>
                                                <li>
                                                    Sell/Transfer — Duly accomplished APPLICATION FOR PERMIT TO
                                                    PURCHASE/POSSESS/SELL/TRANSFER
                                                    <span class="italic">(Form No. NTC 1-09)</span>
                                                    <span class="block text-sm text-gray-600">
                                                        Where to secure: Licensing Unit / Website:
                                                        <a href="https://ntc.gov.ph" target="_blank"
                                                            class="text-blue-600 underline hover:text-blue-800">ntc.gov.ph</a>
                                                    </span>
                                                </li>
                                            </ol>
                                        </li>

                                        <!-- 4.4 Transfer of Location -->
                                        <li>
                                            Transfer of Location / Change of District:
                                            <ol class="list-decimal pl-6 space-y-1 mt-1">
                                                <li>
                                                    APPLICATION FOR AMATEUR RADIO OPERATOR CERTIFICATE / AMATEUR RADIO
                                                    STATION LICENSE
                                                    <span class="italic">(Form No. NTC 1-03)</span>
                                                    <span class="block text-sm text-gray-600">
                                                        Where to secure: Licensing Unit / Website:
                                                        <a href="https://ntc.gov.ph" target="_blank"
                                                            class="text-blue-600 underline hover:text-blue-800">ntc.gov.ph</a>
                                                    </span>
                                                </li>
                                                <li>
                                                    Photocopy of AT-RSL
                                                    <span class="block text-sm text-gray-600">Where to secure:
                                                        Applicant</span>
                                                </li>
                                            </ol>
                                        </li>

                                    </ol>
                                </li>
                            </ol>
                        </div>
                        <!-- B.5 Permit to Sell/Transfer -->
                        <div class="space-y-2">
                            <div class="font-semibold">B.5 Permit to Sell/Transfer</div>
                            <ol class="list-decimal pl-6 space-y-1">
                                <li>
                                    Duly accomplished APPLICATION FOR PERMIT TO PURCHASE/POSSESS/SELL/TRANSFER
                                    <span class="italic">(Form No. NTC 1-09)</span>
                                    <span class="block text-sm text-gray-600">
                                        Where to secure: Licensing Unit / Website:
                                        <a href="https://ntc.gov.ph" target="_blank"
                                            class="text-blue-600 underline hover:text-blue-800">ntc.gov.ph</a>
                                    </span>
                                </li>

                                <li>
                                    Photocopy of AT-RSL of the Seller
                                    <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                                </li>
                            </ol>
                        </div>
                        <div class="mt-2 space-y-4 text-center">
                            <!-- Apply for Permit AT-ROC -->
                            <div class="space-y-1">
                                <a href="{{ route('forms.show', ['formType' => '1-02', 'category' => 'rroc']) }}"
                                    class="block w-full bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition text-center">
                                    Apply for Permit AT-RSL <span class="text-sm text-gray-200 font-normal">(Purchase,
                                        Possess, Sell/Transfer)</span>
                                </a>
                            </div>

                            <!-- Apply for AT-ROC Certificate -->
                            <div class="space-y-1">
                                <a href="{{ route('forms.show', ['formType' => '1-03', 'category' => 'atroc']) }}"
                                    class="block w-full bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition text-center">
                                    Apply for AT-RSL Certificate
                                    <span class="text-sm text-gray-200 font-normal">(New, Renewal, and
                                        Modification)</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- C -->
                <div x-data="{ open: false }" class="bg-gray-50 rounded-lg p-4 text-gray-700">
                    <button @click="open = !open"
                        class="w-full text-left flex justify-between items-center font-semibold text-lg">
                        C. Lifetime Amateur Radio Station License for Class A (AT-LIFETIME)
                        <span class="ml-2" x-text="open ? '-' : '+'"></span>
                    </button>
                    <div x-show="open" x-transition class="mt-2 text-gray-600">
                        <!-- C.1 Permit to Purchase/Possess due to additional equipment -->
                        <div class="space-y-2 mt-4">
                            <div class="font-semibold">C.1 Permit to Purchase/Possess due to additional equipment</div>
                            <ol class="list-decimal pl-6 space-y-1">
                                <li>
                                    Duly accomplished APPLICATION FOR PERMIT TO PURCHASE/POSSESS/SELL/TRANSFER
                                    <span class="italic">(Form No. NTC 1-09)</span>
                                    <span class="block text-sm text-gray-600">
                                        Where to secure: Licensing Unit / Website:
                                        <a href="https://ntc.gov.ph" target="_blank"
                                            class="text-blue-600 underline hover:text-blue-800">ntc.gov.ph</a>
                                    </span>
                                </li>
                                <li>
                                    Photocopy of Supplementary Certificate
                                    <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                                </li>
                            </ol>
                        </div>

                        <!-- C.2 AT-LIFETIME (New) -->
                        <div class="space-y-2 mt-4">
                            <div class="font-semibold">C.2 AT-LIFETIME (New)</div>
                            <ol class="list-decimal pl-6 space-y-1">
                                <li>
                                    Duly accomplished APPLICATION FOR AMATEUR RADIO OPERATOR CERTIFICATE /
                                    AMATEUR RADIO STATION LICENSE
                                    <span class="italic">(Form No. NTC 1-03)</span>
                                    <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                                </li>
                                <li>
                                    Certificate of Good Standing as a Member from a registered amateur club or
                                    association with the NTC
                                    <span class="block text-sm text-gray-600">Where to secure: PARA / Amateur
                                        Club</span>
                                </li>
                                <li>
                                    Photocopy of ANY of the following:
                                    <ul class="list-disc pl-6 space-y-1 mt-1">
                                        <li>Birth Certificate</li>
                                        <li>Passport</li>
                                        <li>PRC License</li>
                                        <li>Driver’s License</li>
                                    </ul>
                                    <span class="block text-sm text-gray-600">Where to secure: PSA / DFA / PRC /
                                        LTO</span>
                                    <span class="block text-xs text-gray-500 mt-1">Note: Applicant must be at least 60
                                        years old and show the original document.</span>
                                </li>
                                <li>
                                    Photocopy of Amateur Class “A” RSL
                                    <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                                </li>
                                <li>
                                    Proof of amateur service of at least fifteen (15) consecutive years
                                    <span class="block text-sm text-gray-600">Where to secure: PARA / Amateur
                                        Club</span>
                                </li>
                                <li>
                                    Three (3) ID pictures (1” x 1”) taken within the last six (6) months
                                    <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                                </li>
                            </ol>
                        </div>

                        <!-- C.3 Modification of AT-Lifetime Supplementary Certificate -->
                        <div class="space-y-2 mt-4">
                            <div class="font-semibold">C.3 Modification of AT-Lifetime Supplementary Certificate</div>
                            <ol class="list-decimal pl-6 space-y-1">
                                <li>
                                    Duly accomplished APPLICATION FOR AMATEUR RADIO OPERATOR CERTIFICATE /
                                    AMATEUR RADIO STATION LICENSE
                                    <span class="italic">(Form No. NTC 1-03)</span>
                                    <span class="block text-sm text-gray-600">
                                        Where to secure: Licensing Unit / Website:
                                        <a href="https://ntc.gov.ph" target="_blank"
                                            class="text-blue-600 underline hover:text-blue-800">ntc.gov.ph</a>
                                    </span>
                                </li>
                                <li>
                                    Photocopy of Supplementary Certificate
                                    <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                                </li>

                                <!-- If modification is due to… -->
                                <li>
                                    If modification is due to:
                                    <ol class="list-decimal pl-6 space-y-1 mt-1">

                                        <!-- Additional Equipment -->
                                        <li>
                                            Additional Equipment:
                                            <ol class="list-decimal pl-6 space-y-1 mt-1">
                                                <li>
                                                    Photocopy of valid Permit to Purchase/Possess
                                                    <span class="block text-sm text-gray-600">Where to secure:
                                                        Applicant</span>
                                                </li>
                                                <li>
                                                    Photocopy of document indicating source of equipment:
                                                    <ul class="list-disc pl-6 space-y-1 mt-1">
                                                        <li>
                                                            For locally-sourced equipment, Official Receipt or Sales
                                                            Invoice from authorized Radio Dealer,
                                                            <span class="font-semibold">OR</span>
                                                            <span class="block text-sm text-gray-600">Where to secure:
                                                                Authorized Radio Dealer</span>
                                                        </li>
                                                        <li>
                                                            For imported equipment, Photocopy of Invoice from supplier
                                                            <span class="font-semibold">AND</span> Photocopy of Permit
                                                            to Import,
                                                            <span class="font-semibold">OR</span>
                                                            <span class="block text-sm text-gray-600">Where to secure:
                                                                Supplier / Applicant</span>
                                                        </li>
                                                        <li>
                                                            For equipment from licensed Amateur, Duly accomplished
                                                            APPLICATION FOR PERMIT TO PURCHASE/POSSESS/SELL/TRANSFER
                                                            <span class="italic">(Form No. NTC 1-09)</span>
                                                            <span class="font-semibold">AND</span> Photocopy AT-RSL of
                                                            the Seller
                                                            <span class="block text-sm text-gray-600">
                                                                Where to secure: Licensing Unit / Website:
                                                                <a href="https://ntc.gov.ph" target="_blank"
                                                                    class="text-blue-600 underline hover:text-blue-800">ntc.gov.ph</a>
                                                                / Applicant / Licensed Amateur
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ol>
                                        </li>

                                        <!-- Deletion of Equipment -->
                                        <li>
                                            Deletion of Equipment due to:
                                            <ol class="list-decimal pl-6 space-y-1 mt-1">
                                                <li>
                                                    Lost, Original Affidavit of Loss of Equipment
                                                    <span class="block text-sm text-gray-600">Where to secure:
                                                        Applicant</span>
                                                </li>
                                                <li>
                                                    Storage, Duly accomplished APPLICATION FOR PERMIT TO
                                                    PURCHASE/POSSESS/SELL/TRANSFER
                                                    <span class="italic">(Form No. NTC 1-09)</span>
                                                    <span class="block text-sm text-gray-600">
                                                        Where to secure: Licensing Unit / Website:
                                                        <a href="https://ntc.gov.ph" target="_blank"
                                                            class="text-blue-600 underline hover:text-blue-800">ntc.gov.ph</a>
                                                    </span>
                                                </li>
                                                <li>
                                                    Sell/Transfer, Duly accomplished APPLICATION FOR PERMIT TO
                                                    PURCHASE/POSSESS/SELL/TRANSFER
                                                    <span class="italic">(Form No. NTC 1-09)</span>
                                                    <span class="block text-sm text-gray-600">
                                                        Where to secure: Licensing Unit / Website:
                                                        <a href="https://ntc.gov.ph" target="_blank"
                                                            class="text-blue-600 underline hover:text-blue-800">ntc.gov.ph</a>
                                                    </span>
                                                </li>
                                            </ol>
                                        </li>

                                    </ol>
                                </li>
                            </ol>
                        </div>
                        <div class="mt-4 space-y-4 text-center">
                            <!-- Apply for Permit (AT-LIFETIME) -->
                            <div class="space-y-1">
                                <a href="{{ route('forms.show', ['formType' => '1-02', 'category' => 'at-lifetime-permit']) }}"
                                    class="block w-full bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition text-center">
                                    Apply for Permit (AT-LIFETIME)
                                </a>
                            </div>

                            <!-- Apply for AT-LIFETIME Certificate -->
                            <div class="space-y-1">
                                <a href="{{ route('forms.show', ['formType' => '1-03', 'category' => 'at-lifetime-certificate']) }}"
                                    class="block w-full bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition text-center">
                                    Apply for AT-LIFETIME Certificate
                                    <span class="text-sm text-gray-200 font-normal">(New/Modification)</span>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- D -->
                <div x-data="{ open: false }" class="bg-gray-50 rounded-lg p-4 text-gray-700">
                    <button @click="open = !open"
                        class="w-full text-left flex justify-between items-center font-semibold text-lg">
                        D. Amateur Club Radio Station License (AT-CLUB RSL)
                        <span class="ml-2" x-text="open ? '-' : '+'"></span>
                    </button>
                    <div x-show="open" x-transition class="mt-2 text-gray-600">
                        <!-- D.1 Permit to Purchase/Possess -->
                        <div class="space-y-2 mt-4">
                            <div class="font-semibold">D.1 Permit to Purchase/Possess</div>
                            <ol class="list-decimal pl-6 space-y-1">
                                <li>
                                    Duly accomplished APPLICATION FOR PERMIT TO PURCHASE/POSSESS/SELL/TRANSFER
                                    <span class="italic">(Form No. NTC 1-09)</span>
                                    <span class="block text-sm text-gray-600">
                                        Where to secure: Licensing Unit / Website:
                                        <a href="https://ntc.gov.ph" target="_blank"
                                            class="text-blue-600 underline hover:text-blue-800">ntc.gov.ph</a>
                                    </span>
                                </li>

                                <li>
                                    Photocopy of SEC Registration / Articles of Incorporation / By-laws
                                    <span class="block text-sm text-gray-600">Where to secure: SEC</span>
                                </li>

                                <li>
                                    Photocopy of Memorandum of Agreement with NTC indicating accreditation conditions
                                    <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                                </li>

                                <li>
                                    List of licensed Amateur Club Trustee, Officers, and Members
                                    <ul class="list-disc pl-6 mt-1 text-sm text-gray-700 space-y-1">
                                        <li>Minimum 25 licensed amateur radio operators</li>
                                        <li>Licenses of members will be validated</li>
                                        <li>Trustee must be a Class A license holder for at least 5 years</li>
                                        <li>Amateur Fixed Station is issued only to the Club Trustee</li>
                                    </ul>
                                    <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                                </li>

                                <li>
                                    Map showing the station location with geographical coordinates
                                    <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                                </li>
                            </ol>
                        </div>

                        <!-- D.2 AT-CLUB RSL (NEW) -->
                        <div class="space-y-2 mt-4">
                            <div class="font-semibold">D.2 AT-CLUB RSL (NEW)</div>
                            <ol class="list-decimal pl-6 space-y-1">
                                <li>
                                    Duly accomplished APPLICATION FOR AMATEUR RADIO OPERATOR CERTIFICATE /
                                    AMATEUR RADIO STATION LICENSE
                                    <span class="italic">(Form No. NTC 1-03)</span>
                                    <span class="block text-sm text-gray-600">
                                        Where to secure: Licensing Unit / Website:
                                        <a href="https://ntc.gov.ph" target="_blank"
                                            class="text-blue-600 underline hover:text-blue-800">ntc.gov.ph</a>
                                    </span>
                                </li>

                                <li>
                                    Photocopy of Permit to Purchase/Possess
                                    <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                                </li>

                                <li>
                                    Photocopy of document indicating source of equipment:
                                    <ul class="list-disc pl-6 mt-1 space-y-1">
                                        <li>
                                            Locally-sourced: Official Receipt or Sales Invoice
                                            <span class="block text-sm text-gray-600">Where to secure: Authorized Radio
                                                Dealer</span>
                                        </li>
                                        <li>
                                            Imported: Invoice from supplier AND Permit to Import
                                            <span class="block text-sm text-gray-600">Where to secure: Supplier /
                                                Applicant</span>
                                        </li>
                                        <li>
                                            From licensed Amateur: Application Form NTC 1-09
                                            <span class="block text-sm text-gray-600">
                                                Where to secure: Licensing Unit / Website / Applicant
                                            </span>
                                        </li>
                                    </ul>
                                </li>
                            </ol>
                        </div>

                        <!-- D.3 AT-CLUB RSL (RENEWAL) -->
                        <div class="space-y-2 mt-4">
                            <div class="font-semibold">D.3 AT-CLUB RSL (RENEWAL)</div>
                            <ol class="list-decimal pl-6 space-y-1">
                                <li>
                                    Duly accomplished APPLICATION FOR AMATEUR RADIO OPERATOR CERTIFICATE /
                                    AMATEUR RADIO STATION LICENSE
                                    <span class="italic">(Form No. NTC 1-03)</span>
                                    <span class="block text-sm text-gray-600">
                                        Where to secure: Licensing Unit / Website:
                                        <a href="https://ntc.gov.ph" target="_blank"
                                            class="text-blue-600 underline hover:text-blue-800">ntc.gov.ph</a>
                                    </span>
                                </li>

                                <li>
                                    Photocopy of Amateur Club RSL
                                    <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                                </li>

                                <li>
                                    List of licensed Amateur Club Trustee, Officers, and Members
                                    <ul class="list-disc pl-6 mt-1 text-sm text-gray-700 space-y-1">
                                        <li>Minimum 25 licensed amateur radio operators</li>
                                        <li>Licenses of members will be validated</li>
                                        <li>Trustee must be Class A for at least 5 years</li>
                                        <li>Amateur Fixed Station issued only to Club Trustee</li>
                                    </ul>
                                    <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                                </li>
                            </ol>
                        </div>

                        <!-- D.4 AT-CLUB RSL (MODIFICATION) -->
                        <div class="space-y-2 mt-4">
                            <div class="font-semibold">D.4 AT-CLUB RSL (MODIFICATION)</div>
                            <ol class="list-decimal pl-6 space-y-1">
                                <li>
                                    Duly accomplished APPLICATION FOR AMATEUR RADIO OPERATOR CERTIFICATE /
                                    AMATEUR RADIO STATION LICENSE
                                    <span class="italic">(Form No. NTC 1-03)</span>
                                    <span class="block text-sm text-gray-600">
                                        Where to secure: Licensing Unit / Website:
                                        <a href="https://ntc.gov.ph" target="_blank"
                                            class="text-blue-600 underline hover:text-blue-800">ntc.gov.ph</a>
                                    </span>
                                </li>

                                <li>
                                    Photocopy of Amateur Club RSL
                                    <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                                </li>

                                <li>
                                    If modification is due to:
                                    <ol class="list-decimal pl-6 space-y-1 mt-1">

                                        <!-- Change/Add equipment -->
                                        <li>
                                            Change of Equipment and/or Additional Equipment:
                                            <ol class="list-decimal pl-6 space-y-1 mt-1">
                                                <li>
                                                    Photocopy of Permit to Purchase/Possess
                                                </li>
                                                <li>
                                                    Photocopy of document indicating source:
                                                    <ul class="list-disc pl-6 mt-1 space-y-1">
                                                        <li>
                                                            Locally-sourced: OR / Sales Invoice
                                                            <span class="block text-sm text-gray-600">Where to secure:
                                                                Authorized Radio Dealer</span>
                                                        </li>
                                                        <li>
                                                            Imported: Invoice + Permit to Import
                                                            <span class="block text-sm text-gray-600">Where to secure:
                                                                Supplier / Applicant</span>
                                                        </li>
                                                        <li>
                                                            From licensed Amateur: NTC 1-09 + Seller’s AT-RSL
                                                            <span class="block text-sm text-gray-600">
                                                                Where to secure: Licensing Unit / Website / Applicant /
                                                                Licensed Amateur
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ol>
                                        </li>

                                        <!-- Deletion of equipment -->
                                        <li>
                                            Deletion of Equipment due to:
                                            <ol class="list-decimal pl-6 mt-1 space-y-1">
                                                <li>
                                                    Lost: Original Affidavit of Loss
                                                    <span class="block text-sm text-gray-600">Where to secure:
                                                        Applicant</span>
                                                </li>
                                                <li>
                                                    Storage: Application Form NTC 1-09
                                                    <span class="block text-sm text-gray-600">
                                                        Where to secure: Licensing Unit / Website
                                                    </span>
                                                </li>
                                                <li>
                                                    Sell/Transfer: Application Form NTC 1-09
                                                    <span class="block text-sm text-gray-600">
                                                        Where to secure: Licensing Unit / Website
                                                    </span>
                                                </li>
                                            </ol>
                                        </li>

                                        <!-- Trustee change -->
                                        <li>
                                            Change of Club Trustee: Photocopy of valid AT-RSL
                                            <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                                        </li>

                                        <!-- Location change -->
                                        <li>
                                            Change of Station Location: Map with geographical coordinates
                                            <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                                        </li>

                                    </ol>
                                </li>
                            </ol>
                        </div>
                        <div class="mt-4 space-y-4 text-center">
                            <!-- Apply for Permit (AT-CLUB RSL) -->
                            <div class="space-y-1">
                                <a href="{{ route('forms.show', ['formType' => '1-02', 'category' => 'at-club-rsl-permit']) }}"
                                    class="block w-full bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition text-center">
                                    Apply for Permit (AT-CLUB RSL) <span
                                        class="text-sm text-gray-200 font-normal">(Purchase/Possess)</span>
                                </a>
                            </div>

                            <!-- Apply for AT-CLUB RSL Certificate -->
                            <div class="space-y-1">
                                <a href="{{ route('forms.show', ['formType' => '1-03', 'category' => 'at-club-rsl-certificate']) }}"
                                    class="block w-full bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition text-center">
                                    Apply for AT-CLUB RSL Certificate
                                    <span class="text-sm text-gray-200 font-normal">(New/Renewal/Modification)</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- E -->
                <div x-data="{ open: false }" class="bg-gray-50 rounded-lg p-4 text-gray-700">
                    <button @click="open = !open"
                        class="w-full text-left flex justify-between items-center font-semibold text-lg">
                        E. Temporary Permit to Operate an Amateur Radio Station – Foreign Visitor
                        <span class="ml-2" x-text="open ? '-' : '+'"></span>
                    </button>
                    <div x-show="open" x-transition class="mt-2 text-gray-600">
                        <!-- E.1 -->
                        <div class="pl-4">
                            <p class="font-semibold text-base">E.1 Requirements</p>
                            <ul class="list-disc pl-6 space-y-1">
                                <li>Letter of Intent <span class="italic text-gray-500">(Applicant)</span></li>
                                <li>
                                    Duly accomplished APPLICATION FOR AMATEUR RADIO OPERATOR CERTIFICATE /
                                    AMATEUR RADIO STATION LICENSE
                                    <span class="italic text-gray-500">(Form No. NTC 1-03, Licensing Unit / Website:
                                        ntc.gov.ph)</span>
                                </li>
                                <li>
                                    Duly accomplished APPLICATION FOR PERMIT TO PURCHASE / POSSESS / SELL / TRANSFER
                                    <span class="italic text-gray-500">(Form No. NTC 1-09, as applicable)</span>
                                </li>
                                <li>
                                    Photocopy of valid Amateur Radio Operator Certificate issued by country of
                                    citizenship
                                    <span class="italic text-gray-500">(Applicant)</span>
                                </li>
                                <li>
                                    Any proof that the applicant’s country gives reciprocal privileges to Filipino
                                    amateurs
                                    <span class="italic text-gray-500">(Applicant)</span>
                                </li>
                                <li>
                                    Endorsement from a recognized national organization
                                    <span class="italic text-gray-500">(e.g., PARA)</span>
                                </li>
                                <li>
                                    Three (3) ID photos (1” x 1”) taken within the last 6 months
                                    <span class="italic text-gray-500">(Applicant)</span>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-4 space-y-4 text-center">
                            <!-- Temporary Permit to Operate – Foreign Visitor -->
                            <div class="space-y-1">
                                <a href="{{ route('forms.show', ['formType' => '1-03', 'category' => 'temporary-foreign']) }}"
                                    class="block w-full bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition text-center">
                                    Apply for Temporary Permit to Operate
                                    <span class="text-sm text-gray-200 font-normal">(Certificate)</span>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- F -->
                <div x-data="{ open: false }" class="bg-gray-50 rounded-lg p-4 text-gray-700">
                    <button @click="open = !open"
                        class="w-full text-left flex justify-between items-center font-semibold text-lg">
                        F. Special Permit for the Use of Vanity Call Sign
                        <span class="ml-2" x-text="open ? '-' : '+'"></span>
                    </button>
                    <div x-show="open" x-transition class="mt-2 text-gray-600">
                        <!-- Emphasized Note -->
                        <p class="text-base font-semibold text-red-600">
                            ⚠️ Note: For Service 3.F, applications shall be submitted to NTC-NCR only.
                        </p>
                        <!-- F.1 NEW -->
                        <div class="space-y-2 mt-4">
                            <div class="font-semibold">F.1 Special Permit for the Use of Vanity Call Sign [NEW]</div>
                            <ol class="list-decimal pl-6 space-y-1">
                                <li>
                                    Duly accomplished APPLICATION FOR AMATEUR RADIO OPERATOR CERTIFICATE /
                                    AMATEUR RADIO STATION LICENSE
                                    <span class="italic">(Form No. NTC 1-03, Licensing Unit / Website:
                                        ntc.gov.ph)</span>
                                </li>
                                <li>
                                    Photocopy of valid AT-RSL or AT-ROC
                                    <span class="italic">(Applicant)</span>
                                </li>
                                <li>
                                    Endorsement from the Philippine Amateur Radio Association (PARA), Inc.; OR proof of
                                    any of the following radio amateur activities:
                                    <ul class="list-disc pl-6 mt-1 space-y-1 text-sm text-gray-700">
                                        <li>DXCentury Club (DXCC) 5B awards <span class="italic">(PARA / Amateur
                                                Club)</span></li>
                                        <li>Continental Champion for 3 consecutive years of a major amateur radio
                                            contest <span class="italic">(PARA / Amateur Club)</span></li>
                                        <li>DXpedition in any of the top 20 Most Wanted DXCC entities <span
                                                class="italic">(/Amateur)</span></li>
                                    </ul>
                                </li>
                            </ol>
                        </div>

                        <!-- F.2 RENEWAL -->
                        <div class="space-y-2 mt-4">
                            <div class="font-semibold">F.2 Special Permit for the Use of Vanity Call Sign [RENEWAL]
                            </div>
                            <ol class="list-decimal pl-6 space-y-1">
                                <li>
                                    Duly accomplished APPLICATION FOR AMATEUR RADIO OPERATOR CERTIFICATE /
                                    AMATEUR RADIO STATION LICENSE
                                    <span class="italic">(Form No. NTC 1-03, Licensing Unit / Website:
                                        ntc.gov.ph)</span>
                                </li>
                                <li>
                                    Photocopy of valid AT-RSL or AT-ROC
                                    <span class="italic">(Applicant)</span>
                                </li>
                                <li>
                                    Photocopy of Special Permit
                                    <span class="italic">(Applicant)</span>
                                </li>
                            </ol>
                        </div>

                    </div>
                </div>

                <!-- G -->
                <div x-data="{ open: false }" class="bg-gray-50 rounded-lg p-4 text-gray-700">
                    <button @click="open = !open"
                        class="w-full text-left flex justify-between items-center font-semibold text-lg">
                        G. Special Permit for the Use of Special Event Call Sign
                        <span class="ml-2" x-text="open ? '-' : '+'"></span>
                    </button>
                    <div x-show="open" x-transition class="mt-2 text-gray-600">
                        <div class="space-y-2 mt-4">
                            <ol class="list-decimal pl-6 space-y-1">
                                <li>
                                    Duly accomplished APPLICATION FOR AMATEUR RADIO OPERATOR CERTIFICATE /
                                    AMATEUR RADIO STATION LICENSE
                                    <span class="italic">(Form No. NTC 1-03, Licensing Unit / Website:
                                        ntc.gov.ph)</span>
                                </li>
                                <li>
                                    Letter Request stating the nature of the event, duration, etc.
                                    <span class="italic">(Applicant)</span>
                                </li>
                                <li>
                                    Photocopy of valid AT-RSL or AT-ROC
                                    <span class="italic">(Applicant)</span>
                                </li>
                            </ol>
                        </div>
                        <div class="mt-4 space-y-4 text-center">
                            <!-- Special Event Call Sign Certificate -->
                            <div class="space-y-1">
                                <a href="{{ route('forms.show', ['formType' => '1-03', 'category' => 'special-event-call']) }}"
                                    class="block w-full bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition text-center">
                                    Apply for Special Event Call Sign
                                    <span class="text-sm text-gray-200 font-normal">(Certificate)</span>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- H -->
                <div x-data="{ open: false }" class="bg-gray-50 rounded-lg p-4 text-gray-700">
                    <button @click="open = !open"
                        class="w-full text-left flex justify-between items-center font-semibold text-lg">
                        H. Permit to Possess (for Storage) of Amateur Radio Stations
                        <span class="ml-2" x-text="open ? '-' : '+'"></span>
                    </button>
                    <div x-show="open" x-transition class="mt-2 text-gray-600">
                        <div class="space-y-2 mt-4">
                            <ol class="list-decimal pl-6 space-y-1">
                                <li>
                                    Duly accomplished APPLICATION FOR PERMIT TO PURCHASE/POSSESS/SELL/TRANSFER
                                    <span class="italic">(Form No. NTC 1-09, Licensing Unit / Website:
                                        ntc.gov.ph)</span>
                                </li>
                                <li>
                                    Photocopy of valid AT-RSL
                                    <span class="italic">(Applicant)</span>
                                </li>
                                <li>
                                    For AT-LIFETIME, Copy of Supplementary Certificate
                                    <span class="italic">(Applicant)</span>
                                </li>
                            </ol>
                        </div>
                        <div class="mt-4 space-y-4 text-center">

                            <!-- Permit to Possess (Storage) -->
                            <div class="space-y-1">
                                <a href="{{ route('forms.show', ['formType' => '1-02', 'category' => 'storage-permit']) }}"
                                    class="block w-full bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition text-center">
                                    Apply for Permit to Possess
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
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
