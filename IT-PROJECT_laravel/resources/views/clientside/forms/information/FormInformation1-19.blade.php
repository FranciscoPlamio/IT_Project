<x-layout :title="'Issuance of Permit to Possess for Storage – Fixed and Land Mobile Service'">
    <main class="max-w-5xl mx-auto bg-white shadow-md rounded-xl p-6 mt-2">
        <a href="{{ url()->previous() }}" class="inline-flex items-center hover:underline mb-4">
            &#8592; Back
        </a>

        <!-- Header -->
        <header class="mb-4 p-1">
            <h1 class="text-2xl font-semibold">
                Issuance of Permit to Possess for Storage for Government and Private Radio Stations
                in the Fixed and Land Mobile Service
            </h1>
        </header>

        <!-- Description / Service Name -->
        <section class="space-y-4">
            <div>
                <div class="bg-gray-50 rounded-lg p-4 text-gray-700 space-y-2">
                    <div class="font-semibold">Service Name</div>
                    <p>
                        Issuance of Permit to Possess for Storage for Government and Private Radio Stations
                        in the Fixed and Land Mobile Service
                    </p>
                </div>
            </div>

            <!-- Description -->
            <div>
                <div class="bg-gray-50 rounded-lg p-4 text-gray-700">
                    <p>
                        A <span class="font-semibold">Permit to Possess (for Storage)</span> is a written authority
                        issued by the Commission to Individuals, Private and Government Entities authorizing the holder
                        thereof to possess radio communications equipment.
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
                    <p>Individuals, Private and Government Entities</p>
                </div>
            </div>
        </section>

        <!-- Checklist of Requirements -->
        <header class="mb-2 mt-8 p-1">
            <h2 class="text-2xl font-semibold">Checklist of Requirements</h2>
        </header>

        <section class="space-y-6">
            <!-- Permit to Possess for Storage -->
            <div class="bg-gray-50 rounded-lg p-4 text-gray-700 space-y-2">
                <div class="font-semibold text-lg">Permit to Possess for Storage</div>
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
                        Photocopy of valid RSL
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
