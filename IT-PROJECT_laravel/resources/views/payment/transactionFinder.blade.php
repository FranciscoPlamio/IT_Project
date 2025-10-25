<x-layout>
    <div class="form1-01-container">
        <div class="form1-01-header">
            Search Transaction
        </div>
        <hr>
        <div class="container flex items-center justify-center mt-5">
            <div class="w-sm ">
                <form action="{{ route('transactions.finder') }}" method="GET">
                    <label class="form-label">Reference Number</label>
                    <input class="form1-01-input" type="text" name="payment_reference" required
                        value="{{ old('applicant', $form['applicant'] ?? '') }}">
                    @error('applicant')
                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <button class="form1-01-btn" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
