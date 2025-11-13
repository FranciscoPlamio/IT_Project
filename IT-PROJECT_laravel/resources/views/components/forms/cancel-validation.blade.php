@props(['formType' => null])

<!-- Cancel Button -->
<button id="cancelBtn" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
    Cancel Application
</button>

<!-- Modal Background -->
<div id="confirmModal"
    class="hidden fixed inset-0 z-50 flex items-center justify-center 
           bg-black/40 backdrop-blur-sm">
    <!-- ← added backdrop-blur and semi-transparent bg -->

    <!-- Modal Box -->
    <div class="bg-white rounded-2xl shadow-lg p-6 max-w-sm w-full">
        <h2 class="text-lg font-semibold text-gray-800 mb-2">
            Cancel Application?
        </h2>
        <p class="text-gray-600 mb-6">
            Are you sure you want to cancel your application? All progress will be lost.
        </p>

        <div class="flex justify-end space-x-3">
            <button id="closeModal" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition">
                No, go back
            </button>

            <form action="{{ route('forms.cancel') }}" method="POST">
                @csrf
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
                    Yes, cancel
                </button>
            </form>
        </div>
    </div>
</div>

<!-- JS for Modal -->
<script>
    const cancelBtn = document.getElementById('cancelBtn');
    const confirmModal = document.getElementById('confirmModal');
    const closeModal = document.getElementById('closeModal');

    cancelBtn.addEventListener('click', () => {
        confirmModal.classList.remove('hidden');
    });

    closeModal.addEventListener('click', () => {
        confirmModal.classList.add('hidden');
    });

    // Optional: close if clicked outside the modal box
    confirmModal.addEventListener('click', (e) => {
        if (e.target === confirmModal) {
            confirmModal.classList.add('hidden');
        }
    });
</script>
