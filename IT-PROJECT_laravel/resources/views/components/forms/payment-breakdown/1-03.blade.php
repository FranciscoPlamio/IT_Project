@if (in_array($form->application_type, ['new', 'renewal', 'modification']))

    @php
        // --- NEW / RENEWAL FEES ---
        $feeTableNewRenewal = [
            'AT-ROC' => ['ff' => 0, 'cpf' => 0, 'lf' => 60, 'roc' => 30, 'dst' => 30],
            'AT-LIFETIME-NEW' => ['ff' => 60, 'cpf' => 0, 'lf' => 50, 'roc' => 0, 'dst' => 30],
            'AT-CLUB-RSL-NEW' => ['ff' => 180, 'cpf' => 600, 'lf' => 700, 'roc' => 0, 'dst' => 30],
            'AT-CLUB-RSL-RENEW-MOD' => ['ff' => 180, 'cpf' => 600, 'lf' => 700, 'roc' => 0, 'dst' => 30],
            'TEMP-A' => ['ff' => 60, 'cpf' => 0, 'lf' => 120, 'roc' => 60, 'dst' => 30],
            'TEMP-B' => ['ff' => 60, 'cpf' => 0, 'lf' => 132, 'roc' => 60, 'dst' => 30],
            'TEMP-C' => ['ff' => 60, 'cpf' => 0, 'lf' => 144, 'roc' => 60, 'dst' => 30],
            'SPECIAL-EVENT-CALL' => ['sp' => 120, 'dst' => 30],
            'VANITY-CALL' => ['sp' => 1000, 'dst' => 30],
        ];

        // --- MODIFICATION FEES ---
        $feeTableModification = [
            'ATROC-RENEW-MOD' => ['mod_ff' => 50, 'mod_fee' => 0, 'pos_fee' => 0, 'dst' => 30],
            'ATRSL-RENEW-MOD' => ['mod_ff' => 60, 'mod_fee' => 50, 'pos_fee' => 50, 'dst' => 30],
            'AT-LIFETIME-MODIFICATION' => ['mod_ff' => 60, 'mod_fee' => 50, 'pos_fee' => 50, 'dst' => 30],
            'AT-CLUB-RSL-RENEW-MOD' => ['mod_ff' => 180, 'mod_fee' => 50, 'pos_fee' => 50, 'dst' => 30],
        ];

        $certificate = strtoupper($form->certificate_type ?? '');
        $years = (int) ($form->years ?? 1);
        $rawClass = strtolower($form->station_class ?? 'class_a');
        $stationClass = strtoupper(substr($rawClass, strpos($rawClass, '_') + 1));

        $fees = null;

        // --- SELECT FEES ---
        if ($form->application_type === 'modification') {
            $fees = $feeTableModification[$certificate] ?? null;
        } else {
            if ($certificate === 'AT-LIFETIME') {
                $fees = $feeTableNewRenewal['AT-LIFETIME-NEW'];
            } elseif (Str::contains($certificate, 'ATRSL')) {
                $key = 'ATRSL-CLASS_' . $stationClass;
                $fees = $feeTableNewRenewal[$key] ?? [
                    'ff' => 60,
                    'cpf' => 0,
                    'lf' => 120,
                    'roc' => 60,
                    'dst' => 30,
                ];
            } elseif ($certificate === 'TEMPORARY-FOREIGN') {
                $key = 'TEMP-' . $stationClass;
                $fees = $feeTableNewRenewal[$key] ?? $feeTableNewRenewal['TEMP-A'];
            } else {
                $fees = $feeTableNewRenewal[$certificate] ?? null;
            }
        }

        // --- CALCULATE TOTAL ---
        $ff = $cpf = $lf_total = $roc_total = $sp = $mod_fee = $pos_fee = $dst = $total = 0;

        if ($fees) {
            if ($certificate === 'AT-LIFETIME') {
                // AT-LIFETIME one-time payment
                if ($form->application_type === 'new') {
                    $ff = $fees['ff'];
                    $lf_total = $fees['lf'];
                    $dst = $fees['dst'];
                    $total = $ff + $lf_total + $dst; // 60 + 50 + 30 = 140
                } elseif ($form->application_type === 'renewal') {
                    $dst = $fees['dst'];
                    $total = $dst; // 30
                } elseif ($form->application_type === 'modification') {
                    $ff = $fees['mod_ff'];
                    $mod_fee = $fees['mod_fee'];
                    $pos_fee = $fees['pos_fee'];
                    $dst = $fees['dst'];
                    $total = $ff + $mod_fee + $pos_fee + $dst; // 60 + 50 + 50 + 30 = 190
                }
            } elseif ($form->application_type === 'new') {
                $ff = $fees['ff'] ?? 0;
                $cpf = $fees['cpf'] ?? 0;
                $lf_total = ($fees['lf'] ?? 0) * $years;
                $roc_total = ($fees['roc'] ?? 0) * $years;
                $dst = $fees['dst'] ?? 0;
                $sp = $fees['sp'] ?? 0;
                $total = $ff + $cpf + $lf_total + $roc_total + $dst + $sp;
            } elseif ($form->application_type === 'renewal') {
                $lf_total = ($fees['lf'] ?? 0) * $years;
                $roc_total = ($fees['roc'] ?? 0) * $years;
                $dst = $fees['dst'] ?? 0;
                $sp = $fees['sp'] ?? 0;
                $total = $lf_total + $roc_total + $dst + $sp;
            } elseif ($form->application_type === 'modification') {
                $ff = $fees['mod_ff'] ?? 0;
                $mod_fee = $fees['mod_fee'] ?? 0;
                $pos_fee = $fees['pos_fee'] ?? 0;
                $dst = $fees['dst'] ?? 0;
                $total = $ff + $mod_fee + $pos_fee + $dst;
            }
        }
    @endphp

    <div class="max-w-md mx-auto bg-white shadow rounded-lg p-4 space-y-4 mb-2">
        <h2 class="text-lg font-semibold text-gray-800">Fee Breakdown ({{ strtoupper($form->application_type) }})</h2>

        @if (!$fees)
            <p class="text-red-600 text-sm">Invalid certificate type: {{ $certificate }}</p>
        @else
            <div class="space-y-2 bg-gray-50 p-4 rounded-lg border border-gray-200">

                {{-- User Inputs --}}
                <div class="max-w-md mx-auto bg-blue-50 text-blue-900 p-3 rounded-lg mb-4">
                    <p><strong>Certificate Type:</strong> {{ $certificate }}</p>
                    @if ($form->application_type !== 'modification' && $certificate !== 'AT-LIFETIME')
                        <p><strong>Years:</strong> {{ $years }}</p>
                        @if (Str::contains($certificate, 'ATRSL') || $certificate === 'TEMPORARY-FOREIGN')
                            <p class="font-semibold text-indigo-700"><strong>Station Class:</strong> {{ $stationClass }}
                            </p>
                        @endif
                    @endif
                </div>

                {{-- Fees Display --}}
                @if ($form->application_type === 'modification')
                    <div class="flex justify-between text-gray-700">
                        <span>Filing Fee (FF)</span>
                        <span>₱{{ number_format($ff, 2) }}</span>
                    </div>
                    <div class="flex justify-between text-gray-700">
                        <span>Modification Fee</span>
                        <span>₱{{ number_format($mod_fee, 2) }}</span>
                    </div>
                    <div class="flex justify-between text-gray-700">
                        <span>Possess Permit Fee (POS)</span>
                        <span>₱{{ number_format($pos_fee, 2) }}</span>
                    </div>
                    <div class="flex justify-between text-gray-700">
                        <span>Documentary Stamp Tax (DST)</span>
                        <span>₱{{ number_format($dst, 2) }}</span>
                    </div>
                @elseif ($certificate === 'SPECIAL-EVENT-CALL' || $certificate === 'VANITY-CALL')
                    <div class="flex justify-between text-gray-700">
                        <span>Special Permit Fee (SP)</span>
                        <span>₱{{ number_format($sp, 2) }}</span>
                    </div>
                    <div class="flex justify-between text-gray-700">
                        <span>Documentary Stamp Tax (DST)</span>
                        <span>₱{{ number_format($dst, 2) }}</span>
                    </div>
                @else
                    @if ($ff > 0)
                        <div class="flex justify-between text-gray-700">
                            <span>Filing Fee (FF)</span>
                            <span>₱{{ number_format($ff, 2) }}</span>
                        </div>
                    @endif
                    @if ($cpf > 0)
                        <div class="flex justify-between text-gray-700">
                            <span>Construction Permit Fee (CPF)</span>
                            <span>₱{{ number_format($cpf, 2) }}</span>
                        </div>
                    @endif
                    @if ($lf_total > 0)
                        <div class="flex justify-between text-gray-700">
                            <span>License Fee (LF)</span>
                            <span>₱{{ number_format($lf_total, 2) }}</span>
                        </div>
                    @endif
                    @if (($roc_total ?? 0) > 0)
                        <div class="flex justify-between text-gray-700">
                            <span>Certificate Fee (ROC)</span>
                            <span>₱{{ number_format($roc_total, 2) }}</span>
                        </div>
                    @endif
                    @if ($dst > 0)
                        <div class="flex justify-between text-gray-700">
                            <span>Documentary Stamp Tax (DST)</span>
                            <span>₱{{ number_format($dst, 2) }}</span>
                        </div>
                    @endif
                @endif

                <hr class="border-gray-300">
                <div class="flex justify-between text-gray-900 font-semibold text-lg">
                    <span>Total</span>
                    <span>₱{{ number_format($total, 2) }}</span>
                </div>
            </div>
        @endif

        <p class="text-sm text-gray-500">Based on NTC official fee structure for Amateur Radio Certificates and
            Licenses.</p>
    </div>

@endif
