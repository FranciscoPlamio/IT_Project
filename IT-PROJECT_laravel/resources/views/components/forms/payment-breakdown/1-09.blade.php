<div class="max-w-md mx-auto bg-white shadow rounded-lg p-4 space-y-4 mb-2">

    <!-- Header -->
    <h2 class="text-lg font-semibold text-gray-800">
        Fee Breakdown (Permit)
    </h2>

    @php
        $units = [
            'RT (Radio Telephone)' => $form['rt_units'] ?? 0,
            'FX (Fixed)' => $form['fx_units'] ?? 0,
            'FB (Land Base)' => $form['fb_units'] ?? 0,
            'ML (Mobile Land)' => $form['ml_units'] ?? 0,
            'P (Portable/Handheld)' => $form['p_units'] ?? 0,
        ];
        $unitCount = array_sum($units);

        $intendedUse = $form['intended_use'] ?? 'new_radio_station';
        $permitType = strtoupper($form['permit_type'] ?? 'N/A');

        $feeTable = [
            'purchase' => 50,
            'possess' => 50,
            'sell_transfer' => 50,
            'dst' => 30,
        ];

        // Determine per-unit fee
        if (in_array($intendedUse, ['new_radio_station', 'change_equipment', 'additional_equipment'])) {
            $perUnit = $feeTable['purchase'];
            $label = 'Purchase Permit Fee (PUR)';
        } elseif ($intendedUse === 'storage') {
            $perUnit = $feeTable['possess'];
            $label = 'Possess Permit Fee (POS)';
        } elseif ($intendedUse === 'sell_transfer') {
            $perUnit = $feeTable['sell_transfer'];
            $label = 'Sell/Transfer Permit Fee (STF)';
        } else {
            $perUnit = 0;
            $label = 'Permit Fee';
        }

        $totalPermitFee = $perUnit * $unitCount;
        $dst = $feeTable['dst'];
        $total = $totalPermitFee + $dst;
    @endphp

    <!-- Selected Intended Use & Permit Type -->
    <div class="max-w-md mx-auto bg-blue-50 text-blue-900 p-3 rounded-lg mb-4">
        <p><strong>Intended Use:</strong>
            @if ($intendedUse === 'new_radio_station')
                New Radio Station
            @elseif($intendedUse === 'change_equipment')
                Change of Equipment
            @elseif($intendedUse === 'additional_equipment')
                Additional Equipment
            @elseif($intendedUse === 'storage')
                Storage
            @elseif($intendedUse === 'sell_transfer')
                Sell/Transfer
            @endif
        </p>
        <p><strong>Permit Type:</strong> {{ $permitType }}</p>
    </div>

    <!-- Units Breakdown -->
    <div class="space-y-2 bg-gray-50 p-4 rounded-lg border border-gray-200">
        <h3 class="text-gray-700 font-semibold mb-2">Units Breakdown</h3>
        @foreach ($units as $unitName => $count)
            @if ($count > 0)
                <div class="flex justify-between text-gray-700">
                    <span>{{ $unitName }}</span>
                    <span>{{ $count }}</span>
                </div>
            @endif
        @endforeach
        <div class="flex justify-between text-gray-700">
            <h3 class="text-gray-700 font-semibold mb-2">Total</h3>
            <h3 class="text-gray-700 font-semibold mb-2">{{ $unitCount }} </h3>
        </div>
    </div>

    <!-- Fee Breakdown Box -->
    <div class="space-y-2 bg-gray-50 p-4 rounded-lg border border-gray-200">
        <div class="flex justify-between text-gray-700">
            <span>{{ $label }} ({{ $unitCount }} units × ₱{{ number_format($perUnit, 2) }})</span>
            <span class="font-medium">₱{{ number_format($totalPermitFee, 2) }}</span>
        </div>

        <div class="flex justify-between text-gray-700">
            <span>Documentary Stamp Tax (DST)</span>
            <span class="font-medium">₱{{ number_format($dst, 2) }}</span>
        </div>

        <hr class="border-gray-300">

        <div class="flex justify-between text-gray-900 font-semibold text-lg border-t border-gray-300 pt-2">
            <span>Total</span>
            <span>₱{{ number_format($total, 2) }}</span>
        </div>
    </div>

    <!-- Payment Notice -->
    <p class="text-sm text-gray-500">
        Applicable for all amateur radio station permits (Purchase, Possess/Storage, Sell/Transfer) per unit.
    </p>
</div>
