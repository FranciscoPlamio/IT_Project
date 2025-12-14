<x-layout :title="'Handling of Blocking/Unblocking Requests and Consumer Complaints'">
    <main class="max-w-5xl mx-auto bg-white shadow-md rounded-xl p-6 mt-2">
        <a href="{{ url()->previous() }}" class="inline-flex items-center hover:underline mb-4">
            &#8592; Back
        </a>

        <!-- Header -->
        <header class="mb-4 p-1">
            <h1 class="text-2xl font-semibold">
                Handling of Blocking/Unblocking of IMEI and SIM of Lost/Stolen Mobile Phones and Consumer Complaints
            </h1>
        </header>

        <!-- Description / Service Name -->
        <section class="space-y-4">
            <div>
                <div class="bg-gray-50 rounded-lg p-4 text-gray-700 space-y-2">
                    <div class="font-semibold">Service Name</div>
                    <p>
                        Handling of:
                    </p>
                    <ul class="list-disc pl-6 space-y-1">
                        <li>Request for Blocking/Unblocking of IMEI and SIM of lost/stolen mobile phone</li>
                        <li>
                            Complaints on Text Spam, Text Scam, or Illegal/Obscene/Threat/Other Similar Text Messages
                        </li>
                        <li>
                            Complaints on Services offered by Telecommunications or Broadcast Service Providers of
                            Consumers/Subscribers received through walk‑in, courier, facsimile or electronic mail
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Description -->
            <div>
                <div class="bg-gray-50 rounded-lg p-4 text-gray-700 space-y-2">
                    <p>The Commission acts on:</p>
                    <ul class="list-disc pl-6 space-y-1">
                        <li>
                            Requests for blocking/unblocking of mobile phone's International Mobile Equipment Identity
                            (IMEI) and Subscriber Identity Module (SIM) due to lost/stolen cellphone units;
                        </li>
                        <li>
                            Complaints of consumers/subscribers of telecommunications companies such as text scams,
                            unwanted calls/texts and illegal/obscene/threat/other similar text messages;
                        </li>
                        <li>
                            Complaints of consumers/subscribers of telecommunications or broadcast service providers
                            (e.g. Cable TV, DTH, etc.) such as billing complaint, poor customer service, poor technical
                            service and fair usage issues.
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Office / Division / Classification / Type / Who may avail -->
            <div class="grid gap-4 md:grid-cols-2">
                <div class="bg-gray-50 rounded-lg p-4 text-gray-700 space-y-2">
                    <div class="font-semibold">Office or Division</div>
                    <p>
                        Regional Office - Consumer Welfare and Protection Unit,
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


            <!-- B. Complaints on Text Spam/Scam etc. -->
            <div x-data="{ open: false }" class="bg-gray-50 rounded-lg p-4 text-gray-700">
                <button @click="open = !open"
                    class="w-full text-left flex justify-between items-center font-semibold text-lg">
                    A. Handling of Complaints on Text Spam, Text Scam, or Illegal/Obscene/Threat/Other Similar Text
                    Messages
                    <span class="ml-2" x-text="open ? '-' : '+'"></span>
                </button>
                <div x-show="open" x-transition class="mt-2 text-gray-700 space-y-2">
                    <ol class="list-decimal pl-6 space-y-1">
                        <li>
                            Duly accomplished COMPLAINT FORM
                            <span class="italic">(Form No. NTC 1-25)</span>
                            <span class="block text-sm text-gray-600">
                                Where to secure: Consumer Welfare and Protection Unit / Website:
                                <a href="https://ntc.gov.ph" target="_blank"
                                    class="text-blue-600 underline hover:text-blue-800">ntc.gov.ph</a>
                            </span>
                        </li>
                        <li>
                            Photocopy of valid Identification:
                            <ol class="list-decimal pl-6 mt-1 text-sm space-y-1">
                                <li>Any government‑issued ID or Passport</li>
                                <li>For students, School ID</li>
                                <li>
                                    For cases when ID is not available, Birth Certificate
                                    <span class="font-semibold">OR</span> NBI Clearance
                                </li>
                            </ol>
                            <span class="block text-sm text-gray-600">
                                Where to secure: BIR / Post Office / DFA / SSS / GSIS / PAG‑IBIG / PSA / School / NBI /
                                LTO
                            </span>
                        </li>
                    </ol>
                    <div class="mt-3 flex flex-wrap gap-3 justify-center">
                        <a href="{{ route('forms.show', ['formType' => '1-25', 'category' => 'text-spam-scam-complaints']) }}"
                            class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                            Apply using Form 1-25 (Complaint Form)
                        </a>
                    </div>
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
