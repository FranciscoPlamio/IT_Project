<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Form Application Fees & Breakdown</title>
    @vite(['resources/css/adminside/form-fees.css', 'resources/js/adminside/form-fees.js'])
</head>

<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <img src="{{ asset('images/ntc-logo.png') }}" class="logo" alt="NTC Logo" />
        <nav class="menu">
            <a href="{{ route('adminside.dashboard') }}" class="menu-item">
                <img src="{{ asset('images/dash-icon.png') }}" alt=""> Dashboard
            </a>
            <a href="{{ route('adminside.cert-request') }}" class="menu-item">
                <img src="{{ asset('images/cert-icon.png') }}" alt=""> Certification Request
            </a>
            <a href="{{ route('adminside.req-management') }}" class="menu-item">
                <img src="{{ asset('images/req-icon.png') }}" alt=""> Request Management
            </a>
            <a href="{{ route('adminside.req-history') }}" class="menu-item">
                <img src="{{ asset('images/req-icon.png') }}" alt=""> Request History
            </a>
            <a href="{{ route('adminside.bill-pay') }}" class="menu-item">
                <img src="{{ asset('images/billicon.png') }}" alt="">Billings and Payment
            </a>
            <a href="{{ route('adminside.form-fees') }}" class="menu-item active">
                <img src="{{ asset('images/billicon.png') }}" alt=""> Form Fees & Breakdown
            </a>
        </nav>
        <div class="bottom-links">
            <a href="#" class="menu-item" id="logout-link">
                <img src="{{ asset('images/out-icon.png') }}" alt=""> Log out
            </a>
        </div>

        <!-- Log Out Confirmation Modal -->
        <div id="logout-modal" class="modal">
            <div class="modal-content">
                <h3>Are you sure you want to log out?</h3>
                <div class="modal-buttons">
                    <button id="confirm-logout" class="confirm-btn">Yes</button>
                    <button id="cancel-logout" class="cancel-btn">No</button>
                </div>
            </div>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </aside>

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
</body>

</html>
