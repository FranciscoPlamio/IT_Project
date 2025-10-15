<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Certification Request</title>

  @vite(['resources/css/adminside/req-management.css', 'resources/js/adminside/req-management.js', ])
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
            <a href="{{ route('adminside.req-management') }}" class="menu-item  active">
                <img src="{{ asset('images/whitereq-icon.png') }}" alt=""> Request Management
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

  <div class="card full-page">
    <!-- Latest Request -->
    <section class="half-section">
      <div class="card-header">
        <h2>Latest Request</h2>
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

      <div class="table-container">
        <table class="styled-table">
          <thead>
            <tr>
              <th>Request #</th>
              <th>Request Type</th>
              <th>Request Date</th>
              <th>Attachment</th>
              <th>Certificate</th>
              <th>Decision</th>
            </tr>
          </thead>
          <tbody>
          @foreach($latestRequests as $req)
          <tr>
              <td>{{ $req->_id }}</td>
              <td>{{ ucfirst($req->form_type ?? 'N/A') }}</td>
              <td>{{ $req->created_at ? $req->created_at->format('d M Y') : 'N/A' }}</td>
              <td class="see-more">
                  See more <img src="{{ asset('images/see-icon.png') }}" alt="See">
              </td>
              <td>
                  <button class="upload-btn" onclick="handleUpload()">
                      <img src="{{ asset('images/upload-icon.png') }}" alt="Upload">
                      Upload file
                  </button>
              </td>
              <td>
                  <button class="badge-btn complete" onclick="updateStatus('{{ $req->_id }}', 'done')">
                      Complete
                  </button>
                  <button class="badge-btn progress"  onclick="updateStatus('{{ $req->_id }}', 'cancel')">
                      Cancel
                  </button>
              </td>
          </tr>
          @endforeach
        </tbody>
        </table>
      </div>
    </section>

    <!-- History -->
    <section class="half-section">
      <div class="card-header">
        <h2>History</h2>
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

      <div class="table-container1">
        <table class="styled-table">
          <thead>
            <tr>
              <th>Request #</th>
              <th>Request Type</th>
              <th>Request Date</th>
              <th>Release Date</th>
              <th>Attachment</th>
              <th>Status</th>
            </tr>
          </thead>
         <tbody>
          @foreach($historyRequests as $req)
            <tr>
              <td>#{{ $req->form_id }}</td>
              <td>{{ ucfirst($req->form_type ?? 'N/A') }}</td>
              <td>{{ $req->formatted_date }}</td>
              <td>{{ optional($req->updated_at)->format('d M Y') ?? 'N/A' }}</td>
              <td class="see-more1">See more <img src="{{ asset('images/see-icon.png') }}" alt="See"></td>
              <td><span class="badge done">Done</span></td>
            </tr>
          @endforeach
        </tbody>
        </table>
      </div>
    </section>
  </div>
</div>
  </main>
</body>
</html>
