@props([
    'form' => [
        'rt_units' => '',
        'fx_units' => '',
        'fb_units' => '',
        'ml_units' => '',
        'p_units' => '',
        'bc_units' => '',
        'fc_units' => '',
        'fa_units' => '',
        'ma_units' => '',
        'tc_units' => '',
        'others_station_specify' => '',
        'others_station_units' => '',
    ],
])

<legend>Class of Station (indicate units)</legend>
<div class="form-grid-2">
    <div class="form-field">
        <label class="form-label">RT (Radio Telephone)</label>
        <input class="form1-01-input" type="text" name="rt_units" placeholder="Units"
            value="{{ old('rt_units', $form['rt_units'] ?? '') }}">
        @error('rt_units')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-field">
        <label class="form-label">FX (Fixed)</label>
        <input class="form1-01-input" type="text" name="fx_units" placeholder="Units"
            value="{{ old('fx_units', $form['fx_units'] ?? '') }}">
        @error('fx_units')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="form-grid-2">
    <div class="form-field">
        <label class="form-label">FB (Fixed Base)</label>
        <input class="form1-01-input" type="text" name="fb_units" placeholder="Units"
            value="{{ old('fb_units', $form['fb_units'] ?? '') }}">
        @error('fb_units')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-field">
        <label class="form-label">ML (Mobile Land)</label>
        <input class="form1-01-input" type="text" name="ml_units" placeholder="Units"
            value="{{ old('ml_units', $form['ml_units'] ?? '') }}">
        @error('ml_units')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="form-grid-2">
    <div class="form-field">
        <label class="form-label">P (Portable)</label>
        <input class="form1-01-input" type="text" name="p_units" placeholder="Units"
            value="{{ old('p_units', $form['p_units'] ?? '') }}">
        @error('p_units')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-field">
        <label class="form-label">BC (Broadcast)</label>
        <input class="form1-01-input" type="text" name="bc_units" placeholder="Units"
            value="{{ old('bc_units', $form['bc_units'] ?? '') }}">
        @error('bc_units')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="form-grid-2">
    <div class="form-field">
        <label class="form-label">FC (Fixed Commercial)</label>
        <input class="form1-01-input" type="text" name="fc_units" placeholder="Units"
            value="{{ old('fc_units', $form['fc_units'] ?? '') }}">
        @error('fc_units')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-field">
        <label class="form-label">FA (Fixed Aeronautical)</label>
        <input class="form1-01-input" type="text" name="fa_units" placeholder="Units"
            value="{{ old('fa_units', $form['fa_units'] ?? '') }}">
        @error('fa_units')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="form-grid-2">
    <div class="form-field">
        <label class="form-label">MA (Mobile Aeronautical)</label>
        <input class="form1-01-input" type="text" name="ma_units" placeholder="Units"
            value="{{ old('ma_units', $form['ma_units'] ?? '') }}">
        @error('ma_units')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-field">
        <label class="form-label">TC (Temporary Commercial)</label>
        <input class="form1-01-input" type="text" name="tc_units" placeholder="Units"
            value="{{ old('tc_units', $form['tc_units'] ?? '') }}">
        @error('tc_units')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="form-field">
    <label class="form-label">Others</label>
    <input class="form1-01-input" type="text" name="others_station_specify" placeholder="Specify type"
        value="{{ old('others_station_specify', $form['others_station_specify'] ?? '') }}">
    @error('others_station_specify')
        <p class="text-red text-sm mt-1">{{ $message }}</p>
    @enderror
    <input class="form1-01-input" type="text" name="others_station_units" placeholder="Units"
        value="{{ old('others_station_units', $form['others_station_units'] ?? '') }}">
    @error('others_station_units')
        <p class="text-red text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
