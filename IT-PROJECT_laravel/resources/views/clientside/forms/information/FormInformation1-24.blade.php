<x-layout :title="'Issuance of TVRO Registration Certificate and TVRO Station License for CATV System'">
    <main class="max-w-5xl mx-auto bg-white shadow-md rounded-xl p-6 mt-2">
        <a href="{{ url()->previous() }}" class="inline-flex items-center hover:underline mb-4">
            &#8592; Back
        </a>

        <!-- Header -->
        <header class="mb-4 p-1">
            <h1 class="text-2xl font-semibold">
                Issuance of TVRO Registration Certificate (Commercial) and TVRO Station License for CATV System
            </h1>
        </header>

        <!-- Description / Service Name -->
        <section class="space-y-4">
            <div>
                <div class="bg-gray-50 rounded-lg p-4 text-gray-700 space-y-2">
                    <div class="font-semibold">Service Name</div>
                    <p>
                        Issuance of TVRO Registration Certificate (Commercial) and TVRO Station License for CATV
                        System
                    </p>
                </div>
            </div>

            <!-- Description -->
            <div>
                <div class="bg-gray-50 rounded-lg p-4 text-gray-700 space-y-2">
                    <p>
                        A <span class="font-semibold">TVRO Registration Certificate</span> is a certificate or written
                        authority issued by the Commission to a person, firm, company, association, or corporation
                        authorizing the holder thereof to possess television receive-only equipment.
                    </p>
                    <p>
                        A <span class="font-semibold">TVRO Station License</span> is a written authority issued by the
                        Commission to a person, firm, company, association, or corporation authorizing the holder
                        thereof to operate a television receive-only equipment for cable antenna television system.
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
                    <p>Cable TV Operators and Private Entities</p>
                </div>
            </div>
        </section>

        <!-- Checklist of Requirements -->
        <header class="mb-2 mt-8 p-1">
            <h2 class="text-2xl font-semibold">
                Checklist of Requirements
            </h2>
        </header>

        <section class="space-y-6">
            <div class="bg-gray-50 rounded-lg p-4 text-gray-700 space-y-2">
                <div class="font-semibold text-lg">
                    TVRO Registration Certificate (Commercial) and TVRO Station License for CATV System
                </div>
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
                        Photocopy of valid Provisional Authority (PA)
                        <span class="font-semibold">OR</span> Photocopy of duly received Motion for Renewal of PA
                        <span class="block text-sm text-gray-600">Where to secure: Applicant</span>
                    </li>
                    <li>
                        Engineering Plans and Diagrams signed and sealed by a duly licensed Professional Electronics
                        Engineer (PECE), to wit:
                        <ol class="list-decimal pl-6 mt-1 text-sm space-y-1">
                            <li>
                                Map showing the exact location of the TVRO station and the proposed frequency band
                            </li>
                            <li>
                                Block Diagram of the proposed TVRO system (properly labeled)
                            </li>
                            <li>
                                Antenna System with Technical Specifications
                            </li>
                        </ol>
                        <span class="block text-sm text-gray-600">
                            Where to secure: PECE / Applicant
                        </span>
                    </li>
                    <li>
                        List of Combiner, Satellite Receivers, Modulators, LNAs / LNB and other Head‑End Equipment
                        prepared and signed by a duly licensed PECE or Electronics Engineer (ECE)
                        <span class="block text-sm text-gray-600">
                            Where to secure: PECE / Applicant
                        </span>
                    </li>
                    <li>
                        Written authorization from the program originator/s or network/s authorizing the relay program
                        via satellite (for Commercial TVRO)
                        <span class="block text-sm text-gray-600">Where to secure: Program Provider</span>
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
