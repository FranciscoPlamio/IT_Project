<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Certification Request</title>

  @vite(['resources/css/adminside/cert-request.css', 'resources/js/adminside/cert-request.js', ])
</head>
<body>

  <!-- Sidebar -->
    <aside class="sidebar">
        <img src="{{ asset('images/ntc-logo.png') }}" class="logo" alt="NTC Logo" />
        <nav class="menu">
            <a href="{{ route('adminside.dashboard') }}" class="menu-item">
                <img src="{{ asset('images/dash-icon.png') }}" alt=""> Dashboard
            </a>
            <a href="{{ route('adminside.cert-request') }}" class="menu-item  active">
                <img src="{{ asset('images/whitecert-icon.png') }}" alt=""> Certification Request
            </a>
            <a href="{{ route('adminside.req-management') }}" class="menu-item">
                <img src="{{ asset('images/req-icon.png') }}" alt=""> Request Management
            </a>
            <a href="{{ route('adminside.bill-pay') }}" class="menu-item">
                <img src="{{ asset('images/billicon.png') }}" alt="">Billings and Payment
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
  <div class="main">
    <h1>Certification Request</h1>

    <div class="card">
  <div class="card-header">
    <h2>Latest Request</h2>
    <div class="actions">
      <div class="search-bar">
        <input type="text" placeholder="Search">
        <img src="{{ asset ('images/search-icon.png') }}" alt="Search">
      </div>
      <div class="filter-bar">
        <img src="{{ asset ('images/filter-icon.png') }}" alt="Filter">
      </div>
    </div>
  </div>

      <!-- Scrollable container for table -->
      <div class="table-container">
        <table id="requestsTable">
          <thead>
            <tr>
              <th>Request #</th>
              <th>Request Type</th>
              <th>Submission Date</th>
              <th>Attachment</th>
            </tr>
          </thead>
          <tbody>
          @forelse($requests as $req)
              <tr class="request-row {{ isset($highlight) && $highlight == $req->form_id ? 'highlighted' : '' }}">
                  <td>#{{ $req->form_id }}</td>
                  <td>{{ ucfirst($req->form_type ?? 'N/A') }}</td>
                  <td>{{ $req->formatted_date ?? 'N/A' }}</td>
                  <td>
                      <span class="see-more">
                          See more 
                          <img src="{{ asset('images/see-icon.png') }}" alt="">
                      </span>
                  </td>
              </tr>
          @empty
              <tr><td colspan="4" style="text-align:center;">No certification requests found.</td></tr>
          @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>
