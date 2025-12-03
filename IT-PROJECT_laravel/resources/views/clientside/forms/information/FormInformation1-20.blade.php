<x-layout :title="'Issuance of Temporary Permit to Demonstrate and Propagate – Fixed and Land Mobile Service'">
    <main class="max-w-5xl mx-auto bg-white shadow-md rounded-xl p-6 mt-2">
        <a href="{{ url()->previous() }}" class="inline-flex items-center hover:underline mb-4">
            &#8592; Back
        </a>

        <!-- Header -->
        <header class="mb-4 p-1">
            <h1 class="text-2xl font-semibold">
                Issuance of Temporary Permit to Demonstrate and Propagate for Government and Private Radio Stations
                in the Fixed and Land Mobile Service
            </h1>
        </header>

        <!-- Description / Service Name -->
        <section class="space-y-4">
            <div>
                <div class="bg-gray-50 rounded-lg p-4 text-gray-700 space-y-2">
                    <div class="font-semibold">Service Name</div>
                    <p>
                        Issuance of Temporary Permit to Demonstrate and Propagate for Government and Private Radio
                        Stations in the Fixed and Land Mobile Service
                    </p>
                </div>
            </div>

            <!-- Description -->
            <div>
                <div class="bg-gray-50 rounded-lg p-4 text-gray-700">
                    <p>
                        The temporary <span class="font-semibold">Permit to Demonstrate and Propagate</span> is a
                        written authority issued by the Commission to an individual, private and government entities
                        authorizing the holder thereof to select the most appropriate radio equipment and for the
                        purpose of determining the technical capability or performance of radio systems or equipment,
                        feasibility of certain path links and radio networks.
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
                    <p>Highly Technical</p>

                    <div class="font-semibold mt-2">Type of Transaction</div>
                    <ul class="list-disc pl-6 space-y-1">
                        <li>G2C – Government to Citizen</li>
                        <li>G2B – Government to Business</li>
                        <li>G2G – Government to Government</li>
                    </ul>
                </div>

                <div class="bg-gray-50 rounded-lg p-4 text-gray-700 space-y-2">
                    <div class="font-semibold">Who may avail</div>
                    <p>Individuals and Private and Government Entities</p>
                </div>
            </div>
        </section>

        <!-- Checklist of Requirements -->
        <header class="mb-2 mt-8 p-1">
            <h2 class="text-2xl font-semibold">Checklist of Requirements</h2>
        </header>

        <section class="space-y-6">
            <!-- Temporary Permit to Demonstrate and Propagate -->
            <div class="bg-gray-50 rounded-lg p-4 text-gray-700 space-y-2">
                <div class="font-semibold text-lg">Temporary Permit to Demonstrate and Propagate</div>
                <ol class="list-decimal pl-6 space-y-1">
                    <li>
                        Duly accomplished APPLICATION FOR TEMPORARY PERMIT TO PROPAGATE / DEMONSTRATE
                        <span class="italic">(Form No. NTC 1-14)</span>
                        <span class="block text-sm text-gray-600">
                            Where to secure: Licensing Unit / Website:
                            <a href="https://ntc.gov.ph" target="_blank"
                                class="text-blue-600 underline hover:text-blue-800">ntc.gov.ph</a>
                        </span>
                    </li>
                    <li>
                        Engineering Plans signed and sealed by a duly licensed Professional Electronics Engineer
                        (PECE), to wit:
                        <ol class="list-decimal pl-6 space-y-1 mt-1 text-sm">
                            <li>
                                Network Diagram indicating locations of all stations and the proposed frequency band
                            </li>
                            <li>
                                Map showing exact location (Region, Province, City / Municipality, Barangay) of all
                                stations with geographical coordinates (Longitude / Latitude in Degrees / Minutes /
                                Seconds)
                            </li>
                        </ol>
                        <span class="block text-sm text-gray-600">
                            Where to secure: PECE / Applicant
                        </span>
                    </li>
                    <li>
                        Datasheet of proposed radio equipment
                        <span class="block text-sm text-gray-600">
                            Where to secure: Radio Dealer / Applicant
                        </span>
                    </li>
                    <li>
                        If VSAT Outdoor Unit will be utilized in the Demo, Transponder Lease Agreement (TLA) with any
                        satellite operator
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
