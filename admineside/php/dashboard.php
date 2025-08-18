<?php
// Example DB connection (MySQLi)
$conn = new mysqli("localhost", "root", "", "ntc_dashboard");

// Notifications query
$notifications = $conn->query("SELECT * FROM notifications ORDER BY created_at DESC LIMIT 10");

// Certification log query
$cert_logs = $conn->query("SELECT * FROM cert_log ORDER BY date DESC LIMIT 20");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>NTC Dashboard</title>
  <link rel="stylesheet" href="style/dashboard.css">
</head>
<body>
  <!-- Sidebar code here -->

  <main class="main">
    <!-- Notifications -->
    <section class="notifications">
      <h3>Notifications</h3>
      <?php while($row = $notifications->fetch_assoc()): ?>
        <p>
          <strong>#<?= $row['ref_no'] ?> Request Certification</strong><br>
          <?= htmlspecialchars($row['message']) ?>
        </p>
      <?php endwhile; ?>
    </section>

    <!-- Certification Log -->
    <section class="cert-log">
      <h3>Certification Log</h3>
      <?php while($log = $cert_logs->fetch_assoc()): ?>
        <div class="log-item">
          <div>
            #<?= $log['ref_no'] ?><br>
            <small><?= date("m/d/y", strtotime($log['date'])) ?></small>
          </div>
          <div class="status <?= strtolower($log['status']) ?>">
            <img src="images/<?= ucfirst($log['status']) ?>.png" alt="">
            <span><?= ucfirst($log['status']) ?></span>
          </div>
        </div>
      <?php endwhile; ?>
    </section>
  </main>

  <script src="javascript/dashboard.js"></script>
</body>
</html>
