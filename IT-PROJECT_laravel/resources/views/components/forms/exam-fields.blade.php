@props([
    'form' => [
        'exam_place' => '',
        'exam_date' => '',
        'rating' => '',
    ],
])

<input class="form1-01-input" type="text" name="exam_place" value="{{ old('exam_place', $form['exam_place'] ?? '') }}">
@error('exam_place')
    <p class="text-red text-sm mt-1">{{ $message }}</p>
@enderror
</div>
<div class="form-field">
    <label class="form-label">Date</label>
    <input class="form1-01-input" type="date" name="exam_date" max="{{ date('Y-m-d') }}"
        value="{{ old('exam_date', $form['exam_date'] ?? '') }}">
    @error('exam_date')
        <p class="text-red text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
<div class="form-field">
    <label class="form-label">Rating</label>
    <input class="form1-01-input" type="text" name="rating" value="{{ old('rating', $form['rating'] ?? '') }}">
    @error('rating')
        <p class="text-red text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
</div>
