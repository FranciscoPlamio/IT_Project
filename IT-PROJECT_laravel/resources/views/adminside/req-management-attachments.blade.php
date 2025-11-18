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
                        function formatKey($key)
                        {
                            return ucwords(str_replace('_', ' ', $key));
                        }
                    @endphp
                    @foreach ($form->form->getAttributes() as $key => $value)
                        @if ($key !== 'form_token' && $key !== 'user_id' && $key !== 'created_at' && $key !== 'updated_at' && $key !== 'id')
                            @if ($key === 'needs')
                                <p><strong>{{ formatKey($key) }}:</strong> {{ $value ? 'Yes' : 'None' }}</p>
                                @continue
                            @endif

                            @if ($key === 'dob')
                                <p><strong>Date of Birth:</strong> {{ $value }}</p>
                                @continue
                            @endif
                            <p><strong>{{ formatKey($key) }}:</strong> {{ $value }}</p>
                        @endif
                    @endforeach
                </div>
            </section>
        </div>
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

                            <h3>{{ $newFileName }}</h3>
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
