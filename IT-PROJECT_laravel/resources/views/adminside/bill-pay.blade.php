<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Monitoring</title>
@vite(['resources/css/adminside/bill-pay.css', 'resources/js/adminside/bill-pay.js'])
</head>
<body>

  <!-- Sidebar -->
  <aside class="sidebar">
    <img src="{{ asset('images/ntc-logo.png') }}" class="logo" alt="NTC Logo" />
    <nav class="menu">
      <a href="{{ route('adminside.dashboard') }}" class="menu-item"><img src="{{ asset('images/dash-icon.png') }}" alt="">Dashboard</a>
      <a href="{{ route('adminside.cert-request') }}" class="menu-item"><img src="{{ asset('images/cert-icon.png') }}" alt="">Certification Request</a>
      <a href="{{ route('adminside.req-management') }}" class="menu-item"><img src="{{ asset('images/req-icon.png') }}" alt="">Request Management</a>
      <a href="{{ route('adminside.bill-pay') }}" class="menu-item active"><img src="{{ asset('images/white-bill-icon.png') }}" alt="">Billings and Payment</a>
    </nav>
    <div class="bottom-links">
      <a href="#" class="menu-item"><img src="{{ asset('images/out-icon.png') }}" alt="">Log out</a>
    </div>

    <!-- Log Out Confirmation Modal -->
    <div id="logout-modal" class="modal">
      <div class="modal-content">
        <h3>Are you sure you want to log out?</h3>
        <div class="modal-buttons">
          <form id="logout-form" method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" id="confirm-logout" class="confirm-btn">Yes</button>
            <button type="button" id="cancel-logout" class="cancel-btn">No</button>
          </form>
        </div>
      </div>
    </div>
  </aside>

  <!-- Main Content -->
  <div class="main">
    <h1>Payment Monitoring</h1>

    <div class="card">
      <div class="card-header">
        <h2>Latest Payment</h2>
        <div class="actions">
          <div class="search-bar">
            <input type="text" placeholder="Search">
            <img src="{{ asset('images/search-icon.png') }}" alt="Search">
          </div>
          <div class="filter-bar">
            <img src="{{ asset('images/filter-icon.png') }}" alt="Filter">
          </div>
        </div>
      </div>

      <!-- Scrollable Table -->
      <div class="table-container">
        <table>
          <thead>
            <tr>
              <th>Request #</th>
              <th>Request Type</th>
              <th>Payment Date</th>
              <th>Attachment</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr><td>#0123456789</td><td>Certification</td><td>05 Oct 2024</td><td><span class="see-more">See more <img src="{{ asset('images/see-icon.png') }}" alt=""></span></td><td class="done">Done</td></tr>
            <tr><td>#0123456779</td><td>Certification</td><td>05 Oct 2024</td><td><span class="see-more">See more <img src="{{ asset('images/see-icon.png') }}" alt=""></span></td><td class="done">Done</td></tr>
            <tr><td>#0123456889</td><td>Certification</td><td>05 Oct 2024</td><td><span class="see-more">See more <img src="{{ asset('images/see-icon.png') }}" alt=""></span></td><td class="done">Done</td></tr>
            <tr><td>#0123456289</td><td>Certification</td><td>05 Oct 2024</td><td><span class="see-more">See more <img src="{{ asset('images/see-icon.png') }}" alt=""></span></td><td class="done">Done</td></tr>
            <tr><td>#0123451789</td><td>Certification</td><td>05 Oct 2024</td><td><span class="see-more">See more <img src="{{ asset('images/see-icon.png') }}" alt=""></span></td><td class="done">Done</td></tr>
            <tr><td>#0123454789</td><td>Certification</td><td>05 Oct 2024</td><td><span class="see-more">See more <img src="{{ asset('images/see-icon.png') }}" alt=""></span></td><td class="pending">Pending</td></tr>
            <tr><td>#0123436789</td><td>Certification</td><td>05 Oct 2024</td><td><span class="see-more">See more <img src="{{ asset('images/see-icon.png') }}" alt=""></span></td><td class="pending">Pending</td></tr>
            <tr><td>#0123756789</td><td>Certification</td><td>05 Oct 2024</td><td><span class="see-more">See more <img src="{{ asset('images/see-icon.png') }}" alt=""></span></td><td class="pending">Pending</td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>
