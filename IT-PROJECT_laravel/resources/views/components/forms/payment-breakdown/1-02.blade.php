@if ($form->application_type === 'modification')
    <div class="max-w-md mx-auto bg-white shadow rounded-lg p-4 space-y-4 mb-2">

        <!-- Header -->
        <h2 class="text-lg font-semibold text-gray-800">
            Fee Breakdown (Modification)
        </h2>

        <!-- Breakdown Box -->
        <div class="space-y-2 bg-gray-50 p-4 rounded-lg border border-gray-200">

            <div class="flex justify-between text-gray-700">
                <span>Modification Fee (MOD)</span>
                <span class="font-medium">₱120.00</span>
            </div>

            <div class="flex justify-between text-gray-700">
                <span>Documentary Stamp Tax (DST)</span>
                <span class="font-medium">₱30.00</span>
            </div>

            <hr class="border-gray-300">

            <div class="flex justify-between text-gray-900 font-semibold text-lg">
                <span>Total</span>
                <span>₱150.00</span>
            </div>
        </div>

        <!-- Payment Notice -->
        <p class="text-sm text-gray-500">
            Applicable for modification of any ROC, RROC, SROP, GROC, and related
            certificates.
        </p>
    </div>
@elseif ($form->application_type === 'new' || $form->application_type === 'renewal')
    <div class="max-w-md mx-auto bg-white shadow rounded-lg p-4 space-y-4 mb-2">

        <!-- Header -->
        <h2 class="text-lg font-semibold text-gray-800">
            @if ($form->application_type === 'new')
                Fee Breakdown (New Application)
            @elseif($form->application_type === 'renewal')
                Fee Breakdown (Renewal)
            @endif
        </h2>

        <!-- Breakdown Box -->
        <div class="space-y-2 bg-gray-50 p-4 rounded-lg border border-gray-200">

            @php
                $feeTable = [
                    '1RTG' => [
                        'ff' => 0,
                        'af' => 0,
                        'sem' => 0,
                        'roc' => 180,
                        'dst' => 30,
                    ],
                    '2RTG' => [
                        'ff' => 0,
                        'af' => 0,
                        'sem' => 0,
                        'roc' => 120,
                        'dst' => 30,
                    ],
                    '3RTG' => [
                        'ff' => 0,
                        'af' => 0,
                        'sem' => 0,
                        'roc' => 60,
                        'dst' => 30,
                    ],
                    '1PHN' => [
                        'ff' => 0,
                        'af' => 0,
                        'sem' => 0,
                        'roc' => 120,
                        'dst' => 30,
                    ],
                    '2PHN' => [
                        'ff' => 0,
                        'af' => 0,
                        'sem' => 0,
                        'roc' => 100,
                        'dst' => 30,
                    ],
                    '3PHN' => [
                        'ff' => 0,
                        'af' => 0,
                        'sem' => 0,
                        'roc' => 60,
                        'dst' => 30,
                    ],
                    'RROC-Aircraft' => [
                        'ff' => 0,
                        'af' => 0,
                        'sem' => 0,
                        'roc' => 100,
                        'dst' => 30,
                    ],
                    'SROP' => [
                        'ff' => 0,
                        'af' => 20,
                        'sem' => 60,
                        'roc' => 60,
                        'dst' => 30,
                    ],
                    'GROC' => [
                        'ff' => 10,
                        'af' => 20,
                        'sem' => 60,
                        'roc' => 60,
                        'dst' => 30,
                    ],
                    'RROC-RLM' => [
                        'ff' => 10,
                        'af' => 20,
                        'sem' => 60,
                        'roc' => 60,
                        'dst' => 30,
                    ],
                ];

                $certificate = $form['certificate_type'];
                $fees = $feeTable[$certificate] ?? [
                    'ff' => 0,
                    'af' => 0,
                    'sem' => 0,
                    'roc' => 0,
                    'dst' => 0,
                ];
                $years = $form['years'] ?? 1;

                $roc = $fees['roc'];
                $ff = $fees['ff'];
                $af = $fees['af'];
                $sem = $fees['sem'];
                $dst = $fees['dst'];

                $total = $roc * $years + $ff + $af + $sem + $dst;
            @endphp


            {{-- User Selection Info --}}
            <div class="max-w-md mx-auto bg-blue-50 text-blue-900 p-3 rounded-lg mb-4">
                <p><strong>Certificate Type:</strong> {{ $certificate }}</p>
                <p><strong>Number of Years:</strong> {{ $years }}</p>
            </div>

            {{-- Informative: per-year value --}}
            <div class="flex justify-between text-gray-500 italic mb-2">
                <span>Certificate Fee (ROC) per Year ({{ $certificate }})</span>
                <span>₱{{ number_format($roc, 2) }}</span>
            </div>

            {{-- ROC × Years --}}
            <div class="flex justify-between text-gray-700">
                <span>Certificate Fee (ROC × Years)</span>
                <span>₱{{ number_format($roc * $years, 2) }}</span>
            </div>

            {{-- Optional Fees --}}
            @if ($ff > 0)
                <div class="flex justify-between text-gray-700">
                    <span>Filing Fee (FF)</span>
                    <span>₱{{ number_format($ff, 2) }}</span>
                </div>
            @endif

            @if ($af > 0)
                <div class="flex justify-between text-gray-700">
                    <span>Application Fee (AF)</span>
                    <span>₱{{ number_format($af, 2) }}</span>
                </div>
            @endif

            @if ($sem > 0)
                <div class="flex justify-between text-gray-700">
                    <span>Seminar Fee (SEM)</span>
                    <span>₱{{ number_format($sem, 2) }}</span>
                </div>
            @endif

            {{-- DST --}}
            <div class="flex justify-between text-gray-700">
                <span>Documentary Stamp Tax (DST)</span>
                <span>₱{{ number_format($dst, 2) }}</span>
            </div>
            <hr class="border-gray-300">

            {{-- Total --}}
            <div class="flex justify-between text-gray-900 font-semibold text-lg border-t border-gray-300 pt-2">
                <span>Total</span>
                <span>₱{{ number_format($total, 2) }}</span>
            </div>
        </div>

        <!-- Payment Notice -->
        <p class="text-sm text-gray-500">
            Applicable for new applications of ROC, RROC, SROP, GROC, RROC-RLM, and
            related
            certificates.
        </p>
    </div>
@endif
