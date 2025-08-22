<?php
// Template variables (can be replaced with dynamic values later)
$page_title = "Request Management";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $page_title; ?></title>
  <link rel="stylesheet" href="style/req-management.css">
</head>
<body>

  <!-- Sidebar -->
  <aside class="sidebar">
    <img src="images/NTClogo.png" class="logo" alt="NTC Logo">
    <nav class="menu">
      <a href="dashboard.php" class="menu-item"><img src="images/dash-icon.png" alt="">Dashboard</a>
      <a href="cert-request.php" class="menu-item"><img src="images/cert-icon.png" alt="">Certification Request</a>
      <a href="req-management.php" class="menu-item active"><img src="images/whitecert-icon.png" alt="">Request Management</a>
      <a href="bill-pay.php" class="menu-item"><img src="images/billicon.png" alt="">Billings and Payment</a>
    </nav>
    <div class="bottom-links">
      <a class="menu-item"><img src="images/help-icon.png" alt="">Help & Support</a>
      <a class="menu-item"><img src="images/out-icon.png" alt="">Log out</a>
    </div>
  </aside>

  <!-- Main Content -->
  <main class="main">
    <h1><?php echo $page_title; ?></h1>

    <!-- Latest Requests Card -->
    <section class="card">
      <div class="card-header">
        <h2>Latest Requests</h2>
        <div class="actions">
          <div class="search-bar">
            <input type="text" placeholder="Search">
            <img src="images/search-icon.png" alt="Search">
          </div>
          <div class="filter-bar">
            <img src="images/filter-icon.png" alt="Filter">
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
            <?php 
            // Example static data (replace with dynamic later)
            $latest_requests = [
              ["#128336470", "Maintenance", "14 Oct 2024"],
              ["#128336483", "Maintenance", "14 Oct 2024"],
              ["#128336443", "Maintenance", "14 Oct 2024"],
            ];

            foreach ($latest_requests as $req) { ?>
              <tr>
                <td><?php echo $req[0]; ?></td>
                <td><?php echo $req[1]; ?></td>
                <td><?php echo $req[2]; ?></td>
                <td class="see-more">See more <img src="images/see-icon.png" alt="See"></td>
                <td>
                  <button class="upload-btn" onclick="handleUpload()">
                    <img src="images/upload-icon.png" alt="Upload"> Upload file
                  </button>
                </td>
                <td>
                  <button class="badge-btn complete" onclick="handleComplete()">Complete</button>
                  <button class="badge-btn progress" onclick="handleProgress()">In Progress</button>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </section>

    <!-- History Card -->
    <section class="card">
      <div class="card-header">
        <h2>History</h2>
        <div class="actions">
          <div class="search-bar">
            <input type="text" placeholder="Search">
            <img src="images/search-icon.png" alt="Search">
          </div>
          <div class="filter-bar">
            <img src="images/filter-icon.png" alt="Filter">
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
              <th>Release Date</th>
              <th>Attachment</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>#12211321</td>
              <td>Maintenance</td>
              <td>05 Oct 2024</td>
              <td>14 Oct 2024</td>
              <td class="see-more">See more <img src="images/see-icon.png" alt="See"></td>
              <td><span class="badge done">Done</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>

  </main>

  <script src="javascript/req-management.js"></script>
</body>
</html>
