<?php
// This is your main HTML + PHP page
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Certification Request</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <!-- Sidebar -->
  <aside class="sidebar">
    <img src="images/NTClogo.png" class="logo" alt="NTC Logo" />
    <nav class="menu">
      <a class="menu-item active"><img src="images/whitedash-icon.png" alt="">Dashboard</a>
      <a class="menu-item"><img src="images/cert-icon.png" alt="">Certification Request</a>
      <a class="menu-item"><img src="images/req-icon.png" alt="">Request Management</a>
      <a class="menu-item"><img src="images/billicon.png" alt="">Billings & Payment</a>
    </nav>
    <div class="bottom-links">
      <a class="menu-item"><img src="images/out-icon.png" alt="">Log out</a>
    </div>
  </aside>

  <!-- Main Content -->
  <div class="main">
    <h1>Certification Request</h1>

    <div class="card">
      <div class="card-header">
        <h2>Latest Requests</h2>
        <div class="search-bar">
          <input type="text" id="searchInput" placeholder="Search">
          <img src="images/search-icon.png" alt="Search">
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
            <!-- Rows will be loaded via JS -->
          </tbody>
        </table>
      </div>
    </div>
  </div>

<script src="javascript/cert-request.js"></script>
</body>
</html>
