@if (in_array($form->application_type, ['new', 'renewal', 'modification']))

    ```
    @php

        // --- OFFICIAL FEE TABLE FOR FORM 1-03 ---
        $feeTable = [
            'ATROC' => ['ff' => 0, 'cpf' => 0, 'lf' => 60, 'roc' => 30, 'dst' => 30, 'mod_ff' => 60],
            'ATRSL-CLASS_A' => ['ff' => 60, 'cpf' => 0, 'lf' => 120, 'roc' => 60, 'dst' => 30, 'mod_ff' => 60],
            'ATRSL-CLASS_B' => ['ff' => 60, 'cpf' => 0, 'lf' => 132, 'roc' => 60, 'dst' => 30, 'mod_ff' => 60],
            'ATRSL-CLASS_C' => ['ff' => 60, 'cpf' => 0, 'lf' => 144, 'roc' => 60, 'dst' => 30, 'mod_ff' => 60],
            'ATRSL-CLASS_D' => ['ff' => 60, 'cpf' => 0, 'lf' => 144, 'roc' => 60, 'dst' => 30, 'mod_ff' => 60],
            'AT-LIFETIME-NEW' => ['ff' => 60, 'cpf' => 0, 'lf' => 50, 'roc' => 0, 'dst' => 30, 'mod_ff' => 60],
            'AT-CLUB-RSL-NEW' => ['ff' => 180, 'cpf' => 600, 'lf' => 700, 'roc' => 0, 'dst' => 30, 'mod_ff' => 180],
            'TEMP-A' => ['ff' => 60, 'cpf' => 0, 'lf' => 120, 'roc' => 60, 'dst' => 30, 'mod_ff' => 60],
            'TEMP-B' => ['ff' => 60, 'cpf' => 0, 'lf' => 132, 'roc' => 60, 'dst' => 30, 'mod_ff' => 60],
            'TEMP-C' => ['ff' => 60, 'cpf' => 0, 'lf' => 144, 'roc' => 60, 'dst' => 30, 'mod_ff' => 60],
        ];

        $certificate = strtoupper($form->permit_type ?? '');
        $years = (int) ($form->years ?? 1);
        $fees = null;

        // --- Match AT-RSL only ---
        foreach ($feeTable as $key => $row) {
            if (Str::contains($key, 'ATRSL') && Str::contains($certificate, 'ATRSL')) {
                // Match by station class if available
                $stationClass = strtoupper($form->station_class ?? 'A');
                if (Str::endsWith($key, $stationClass)) {
                    $fees = $row;
                    break;
                }
            } elseif (!Str::contains($certificate, 'ATRSL') && strtoupper($key) === $certificate) {
                $fees = $row;
                break;
            }
        }
        if ($fees) {
            // --- NEW ---
            if ($form->application_type === 'new') {
                $ff = $fees['ff'];
                $cpf = $fees['cpf'];
                $lf_total = $fees['lf'] * $years;
                $roc_total = $fees['roc'] * $years;
                $dst = $fees['dst'];
                $total = $ff + $cpf + $lf_total + $roc_total + $dst;
            }

            // --- RENEWAL ---
            if ($form->application_type === 'renewal') {
                $ff = 0;
                $cpf = 0;
                $lf_total = $fees['lf'] * $years;
                $roc_total = $fees['roc'] * $years;
                $dst = $fees['dst'];
                $total = $lf_total + $roc_total + $dst;
            }

            // --- MODIFICATION ---
            if ($form->application_type === 'modification') {
                $ff = $fees['mod_ff'] ?? 0;
                $cpf = 0;
                $lf_total = 0;
                $roc_total = 0;
                $dst = $fees['dst'];
                $total = $ff + $dst;
            }
        }
    @endphp

    <div class="max-w-md mx-auto bg-white shadow rounded-lg p-4 space-y-4 mb-2">
        <h2 class="text-lg font-semibold text-gray-800"> Fee Breakdown ({{ strtoupper($form->application_type) }}) </h2>
        @if (!$fees)
            <p class="text-red-600 text-sm">Invalid certificate type: {{ $certificate }}</p>
        @else
            <div class="space-y-2 bg-gray-50 p-4 rounded-lg border border-gray-200"> {{-- User Inputs --}} <div
                    class="max-w-md mx-auto bg-blue-50 text-blue-900 p-3 rounded-lg mb-4">
                    <p><strong>Certificate Type:</strong> {{ $certificate }}</p>
                    <p><strong>Years:</strong> {{ $years }}</p>
                    @if (Str::contains($certificate, 'ATRSL'))
                        <p class="font-semibold text-indigo-700"><strong>Station Class:</strong>
                            {{ $stationClass }}</p>
                    @endif
                </div> {{-- Fees --}} @if ($ff > 0)
                    <div class="flex justify-between text-gray-700"> <span>Filing Fee (FF)</span>
                        <span>₱{{ number_format($ff, 2) }}</span>
                    </div>
                    @endif @if ($cpf > 0)
                        <div class="flex justify-between text-gray-700"> <span>Construction Permit Fee (CPF)</span>
                            <span>₱{{ number_format($cpf, 2) }}</span>
                        </div>
                    @endif
                    <div class="flex justify-between text-gray-700"> <span>License Fee (LF × Years)</span>
                        <span>₱{{ number_format($lf_total, 2) }}</span>
                    </div>
                    @if ($fees['roc'] > 0)
                        <div class="flex justify-between text-gray-700"> <span>Certificate Fee (ROC × Years)</span>
                            <span>₱{{ number_format($roc_total, 2) }}</span>
                        </div>
                    @endif
                    <div class="flex justify-between text-gray-700"> <span>Documentary Stamp Tax (DST)</span>
                        <span>₱{{ number_format($dst, 2) }}</span>
                    </div>
                    <hr class="border-gray-300">
                    <div class="flex justify-between text-gray-900 font-semibold text-lg"> <span>Total</span>
                        <span>₱{{ number_format($total, 2) }}</span>
                    </div>
            </div>
        @endif
        <p class="text-sm text-gray-500"> Based on NTC official fee structure for Amateur Radio Certificates and
            Licenses. </p>
    </div>
    ```

@endif
