<x-admin-layout :title="'Request Management'">

    <x-slot:head>
        @vite(['resources/css/adminside/req-management.css', 'resources/js/adminside/req-management.js'])
    </x-slot:head>


    <!-- Main Content -->
    <div class="main">
        <div class="card full-page">
            <!-- Latest Request Section -->
            <section class="half-section">
                <div class="card-header">
                    <h2>Form</h2>
                </div>

                <div class="table-container">
                    @php
                        // 1. Define the descriptive map
                        $licenseDescriptions = [
                            'class_a_e8910_code5' => 'Class A - Elements 8, 9, 10 & Code (5 wpm)',
                            'class_a_code5_only' => 'Class A - Code (5 wpm) Only',
                            'class_b_e567' => 'Class B - Elements 5, 6 & 7',
                            'class_b_e2' => 'Class B - Element 2',
                            'class_c_e234' => 'Class C - Elements 2, 3 & 4',
                            'class_d_e2' => 'Class D - Element 2',
                            '1rtg_e1256_code25' => '1RTG - Elements 1, 2, 5, 6 & Code (25/20 wpm)',
                            '1rtg_code25' => '1RTG - Code (25/20 wpm)',
                            '2rtg_e1256_code16' => '2RTG - Elements 1, 2, 5, 6 & Code (16 wpm)',
                            '2rtg_code16' => '2RTG - Code (16 wpm)',
                            '3rtg_e125_code16' => '3RTG - Elements 1, 2, 5 & Code (16 wpm)',
                            '3rtg_code16' => '3RTG - Code (16 wpm)',
                            '1phn_e1234' => '1PHN - Elements 1, 2, 3 & 4',
                            '2phn_e123' => '2PHN - Elements 1, 2 & 3',
                            '3phn_e12' => '3PHN - Elements 1 & 2',
                            'rroc_aircraft_e1' => 'RROC - Aircraft - Element 1',
                        ];

                        // 2. Function to look up the descriptive name or format the key if not found
                        function getDisplayValue($key, $rawValue, $descriptions)
                        {
                            // Check if the key exists in our map
                            if (isset($descriptions[$rawValue])) {
                                // Return the descriptive name from the map
                                return $descriptions[$rawValue];
                            }

                            // If not a specific license key, return the original attribute value
                            return $rawValue;
                        }
                        function formatKey($key)
                        {
                            return ucwords(str_replace('_', ' ', $key));
                        }
                    @endphp
                    @foreach ($form->form->getAttributes() as $key => $value)
                        @if (
                            $key !== 'form_token' &&
                                $key !== 'user_id' &&
                                $key !== 'created_at' &&
                                $key !== 'updated_at' &&
                                $key !== 'id' &&
                                $key !== 'or' &&
                                $key !== 'admission_slip')
                            @if ($key === 'needs')
                                <p><strong>{{ formatKey($key) }}:</strong> {{ $value ? 'Yes' : 'None' }}</p>
                                @continue
                            @endif

                            @if ($key === 'dob')
                                <p><strong>Date of Birth:</strong> {{ $value }}</p>
                                @continue
                            @endif
                            <p><strong>{{ formatKey($key) }}:</strong>
                                {{ getDisplayValue($key, $value, $licenseDescriptions) }}</p>
                        @endif
                    @endforeach
                </div>
            </section>
            <!-- OR -->



        </div>
        @if ($form->form->or)
            <div class="card full-page">
                <section class="half-section">
                    <div class="card-header">
                        <h2>Official Receipt</h2>
                    </div>

                    <div class="table-container">

                        @foreach ($form->form->or as $key => $value)
                            <p><strong>{{ formatKey($key) }}:
                                </strong>{{ $value }}</p>
                        @endforeach
                    </div>
                </section>
            </div>
        @endif

        @if ($form->form->admission_slip)
            <div class="card full-page">
                <section class="half-section">
                    <div class="card-header">
                        <h2>Admission Slip</h2>
                    </div>

                    <div class="table-container">

                        @foreach ($form->form->admission_slip as $key => $value)
                            <p><strong>{{ formatKey($key) }}:
                                </strong>{{ $value }}</p>
                        @endforeach
                    </div>
                </section>
            </div>
        @endif

        <div class="card full-page">
            <!-- Latest Request Section -->
            <section class="half-section">
                <div class="card-header">
                    <h2>Attachment <small><a
                                href="{{ route('showFormInformation', ['formType' => '1-01']) }}"class="text-sm text-gray-500"
                                target="_blank">Requirements
                                of
                                Form</a></small>
                    </h2>
                </div>

                <div class="table-container">
                    <ul>

                        @foreach ($files as $file)
                            @php
                                $url = route('admin.viewFile', ['path' => $file]);
                                $ext = pathinfo($file, PATHINFO_EXTENSION);

                                //Renaming file name to requirement name
                                $newFileName = basename($file); // id_picture_1763101141.png
                                $newFileName = preg_replace('/_\d+\..+$/', '', $newFileName);
                                $newFileName = ucwords(str_replace('_', ' ', $newFileName)); // Id Picture
                            @endphp
                            @if ($newFileName === 'Coa')
                                <h3>Certicicate of Attendance</h3>
                            @else
                                <h3>{{ $newFileName }}</h3>
                            @endif

                            <div class="mb-6">

                                {{-- PDF --}}
                                @if (in_array($ext, ['pdf']))
                                    <iframe src="{{ $url }}" width="100%" height="500px"
                                        class="border rounded"></iframe>
                                @endif

                                {{-- IMAGES --}}
                                @if (in_array($ext, ['jpg', 'jpeg', 'png']))
                                    <img src="{{ $url }}" class="border rounded mb-2 max-w-full">
                                @endif

                            </div>
                        @endforeach

                    </ul>
                </div>
            </section>
        </div>

    </div>
</x-admin-layout>
