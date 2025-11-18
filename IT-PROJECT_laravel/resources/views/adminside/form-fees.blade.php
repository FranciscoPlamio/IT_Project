<x-admin-layout :title="'Form Application Fees & Breakdown'">
    <x-slot:head>
        @vite(['resources/css/adminside/form-fees.css', 'resources/js/adminside/form-fees.js'])
    </x-slot:head>


    <!-- Main Content -->
    <main class="main">
        <h1>Form Application Fees & Breakdown</h1>

        <div class="forms-list">
            <div class="list-header">
                <h2>Available Forms</h2>
                <span class="total-count" id="totalCount">Total: 0 Forms</span>
            </div>

            <div id="formsList"></div>
        </div>
    </main>

    <!-- Main Modal for Form Details -->
    <div id="formModal" class="modal-overlay">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h3 id="formModalTitle">Form Details</h3>
                    <p class="modal-subtitle" id="formModalSubtitle"></p>
                </div>
                <button class="close-btn" onclick="closeFormModal()">×</button>
            </div>
            <div class="modal-body" id="formModalBody"></div>
        </div>
    </div>

    <!-- Image Modal -->
    <div id="imageModal" class="image-modal-overlay">
        <div class="image-modal-content">
            <div class="image-modal-header">
                <div>
                    <h3 id="imageModalTitle">Form Image</h3>
                    <p class="image-modal-subtitle" id="imageModalSubtitle"></p>
                </div>
                <button class="close-btn" onclick="closeImageModal()">×</button>
            </div>
            <div class="image-preview" id="imagePreview">
                <span class="placeholder-text">No image uploaded yet</span>
            </div>
            <div class="upload-section" id="uploadSection" style="display: none;">
                <div class="file-input-wrapper">
                    <input type="file" id="fileInput" accept="image/*" onchange="handleFileSelect(event)">
                    <label for="fileInput" class="file-input-label">
                        <span>📁</span>
                        <span>Choose File</span>
                    </label>
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>
