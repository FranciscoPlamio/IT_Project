<x-layout :title="'Issuance / Release — Admission Slip & Report of Rating'">
    <main class="bg-gray-100 min-h-screen p-6">
        <div class="max-w-4xl mx-auto bg-white shadow-md rounded-xl p-6 mt-4">

            <header class="mb-4 p-1">
                <h1 class="text-2xl font-semibold">Service Menu</h1>
                <p class="text-gray-600">Select a service to proceed</p>
            </header>

            <div class="space-y-4 mt-6">
                <!-- Menu Item 1 -->
                <a
                    href="{{ route('showFormInformation', ['formType' => '1-01']) }}"class="block bg-gray-50 hover:bg-gray-100 transition rounded-lg p-4 shadow-sm">
                    <div class="font-semibold text-lg">Radio Operator Examination Application</div>
                    <p class="text-gray-600 text-sm">Apply for Radio Operator Examination
                    </p>
                </a>

                <!-- Menu Item 2 -->
                <a href="{{ route('showFormInformation', ['formType' => '1-02']) }}"
                    class="block bg-gray-50 hover:bg-gray-100 transition rounded-lg p-4 shadow-sm mt-4">
                    <div class="font-semibold text-lg">Radio Operator Certificate Application</div>
                    <p class="text-gray-600 text-sm">Apply for your official Radio Operator Certificate after passing
                        the examination.</p>
                </a>


            </div>
        </div>
    </main>


</x-layout>
