@props(['title' => 'NTC Dashboard']);

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title }}</title>


    <!-- For vite files -->
    {{ $head }}
    <style>
        .flash-message {
            background-color: #d1fae5;
            /* light green */
            border-bottom: 2px solid #10b981;
            /* green accent */
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 9999;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .flash-content {
            max-width: 600px;
            margin: 0 auto;
            padding: 30px 35px;
            font-weight: bold;
            color: #065f46;
            position: relative;
            text-align: center;
        }

        .flash-close {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
            color: #065f46;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <img src="{{ asset('images/ntc-logo.png') }}" class="logo" alt="NTC Logo" />
        <nav class="menu">
            <a href="{{ route('admin.dashboard') }}"
                class="menu-item {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                <img src="{{ Route::is('admin.dashboard') ? asset('images/whitedash-icon.png') : asset('images/dash-icon.png') }} "
                    alt="">
                Dashboard
            </a>
            <a href="{{ route('admin.req-management') }}"
                class="menu-item {{ Route::is('admin.req-management') ? 'active' : '' }}">
                <img src="{{ Route::is('admin.req-management') ? asset('images/whitereq-icon.png') : asset('images/req-icon.png') }} "
                    alt=""> Request Management
            </a>
            <a href="{{ route('admin.req-history') }}"
                class="menu-item {{ Route::is('admin.req-history') ? 'active' : '' }}">
                <img src="{{ Route::is('admin.req-history') ? asset('images/whitereq-icon.png') : asset('images/req-icon.png') }} "
                    alt=""> Request History
            </a>
            <a href="{{ route('admin.admission-slip') }}"
                class="menu-item {{ Route::is('admin.admission-slip') ? 'active' : '' }}">
                <img src="{{ Route::is('admin.admission-slip') ? asset('images/white-bill-icon.png') : asset('images/billicon.png') }} "
                    alt=""> Admission Slip
            </a>
            {{-- <a href="{{ route('admin.bill-pay') }}"
                class="menu-item {{ Route::is('admin.bill-pay') ? 'active' : '' }}">
                <img src="{{ Route::is('admin.bill-pay') ? asset('images/white-bill-icon.png') : asset('images/billicon.png') }} "
                    alt="">Billings and Payment
            </a> --}}
            <a href="{{ route('admin.declaration') }}"
                class="menu-item {{ Route::is('admin.declaration') ? 'active' : '' }}">
                <img src="{{ Route::is('admin.declaration') ? asset('images/whitecert-icon.png') : asset('images/cert-icon.png') }} "
                    alt=""> Declaration
            </a>
            <a href="{{ route('admin.form-fees') }}"
                class="menu-item {{ Route::is('admin.form-fees') ? 'active' : '' }}">
                <img src="{{ Route::is('admin.form-fees') ? asset('images/white-bill-icon.png') : asset('images/billicon.png') }} "
                    alt=""> Form Fees & Breakdown
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

    <!-- Content of page -->
    <x-admin-flash-message />
    {{ $slot }}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const flash = document.querySelector('.flash-message');
            if (flash) {
                setTimeout(() => {
                    flash.style.display = 'none';
                }, 5000); // hide after 5 seconds
            }
        });
    </script>
</body>

</html>
