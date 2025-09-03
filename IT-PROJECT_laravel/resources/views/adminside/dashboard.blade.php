<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>NTC Dashboard</title>
    @vite(['resources/css/adminside/dashboard.css', 'resources/js/adminside/dashboard.js'])
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <img src="{{ asset('images/NTClogo.png') }}" class="logo" alt="NTC Logo" />
        <nav class="menu">
            <a href="{{ route('adminside.dashboard') }}" class="menu-item active">
                <img src="{{ asset('images/whitedash-icon.png') }}" alt=""> Dashboard
            </a>
            <a href="{{ route('adminaide.certRequest') }}" class="menu-item">
                <img src="{{ asset('images/cert-icon.png') }}" alt=""> Certification Request
            </a>
            <a href="{{ route('adminside.reqManagement') }}" class="menu-item">
                <img src="{{ asset('images/req-icon.png') }}" alt=""> Request Management
            </a>
            <a href="{{ route('adminside.billPay') }}" class="menu-item">
                <img src="{{ asset('images/billicon.png') }}" alt=""> Billings & Payment
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
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main">
        <!-- Pie Charts -->
        <section class="pie">
            <div class="pie-card">
                <div class="pie-circle pie done"></div>
                <div><strong>50%</strong><br>Done</div>
            </div>
            <div class="pie-card">
                <div class="pie-circle pie progress"></div>
                <div><strong>30%</strong><br>In Progress</div>
            </div>
            <div class="pie-card">
                <div class="pie-circle pie pending"></div>
                <div><strong>20%</strong><br>Pending</div>
            </div>
        </section>

        <!-- Notifications -->
        <section class="notifications">
            <h3>Notifications</h3>
            <p><strong>#0123456789 Request Certification</strong><br>Request for certification (#0123456789) is pending ...</p>
            <p><strong>#003246463 Request Certification</strong><br>Request for certification (#003246463) is in progress ...</p>
            <p><strong>#028476285 Request Certification</strong><br>Request for certification (#028476285) is in progress ...</p>
        </section>

        <!-- Certification Log -->
        <section class="cert-log">
            <h1>Certification Log</h1>
            <div class="log-item">
                <div>
                    <h3>#0123456789</h3><br><h5>08/14/24</h5>
                </div>
                <div class="status pending">
                    <img src="{{ asset('images/Pending.png') }}" alt="">
                    <span>Pending</span>
                </div>
            </div>
            <div class="log-item">
                <div>
                    <h3>#0123324556</h3><br><h5>08/14/24</h5>
                </div>
                <div class="status done">
                    <img src="{{ asset('images/Done.png') }}" alt="">
                    <span>Done</span>
                </div>
            </div>
            <div class="log-item">
                <div>
                    <h3>#003246463</h3><br><h5>08/10/24</h5>
                </div>
                <div class="status progress">
                    <img src="{{ asset('images/In-prog.png') }}" alt="">
                    <span>In Progress</span>
                </div>
            </div>
            <div class="log-item">
                <div>
                    <h3>#028476285</h3><br><h5>08/10/24</h5>
                </div>
                <div class="status progress">
                    <img src="{{ asset('images/In-prog.png') }}" alt="">
                    <span>In Progress</span>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
