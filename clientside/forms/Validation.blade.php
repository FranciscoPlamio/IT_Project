<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Validation - Application for Radio Operator Examination (Form 1-01)</title>
  <link rel="stylesheet" href="../../styles.css"/>
  <link rel="stylesheet" href="form-style.css"/>
  <style>
    .validation-section-title {
      font-size: 1.22rem;
      font-weight: bold;
      margin-top: 24px;
      margin-bottom: 12px;
    }
    .validation-list {
      background: #f8f8f8;
      border-radius: 8px;
      padding: 24px 20px;
      margin-bottom: 32px;
      box-shadow: 0 0 4px rgba(0,0,0,0.04);
    }
    .validation-list dt {
      font-weight: bold;
      margin-top: 10px;
      font-size: 1.08rem;
    }
    .validation-list dd {
      margin-left: 0;
      margin-bottom: 8px;
      font-size: 1.09rem;
    }
    .validation-btns {
      display: flex;
      justify-content: center;
      gap: 24px;
      margin-top: 32px;
    }
  </style>
</head>
<body>
  <header>
    <div class="top-bar">
      <img src="../../images/logo.png" alt="NTC Logo" class="logo">
      <div class="title">
        <p>Republic of the Philippines</p>
        <h1>National Telecommunication Commission<br><span>BIR Road, East Triangle, Diliman, Quezon City</span></h1>
      </div>
    </div>
  </header>
  <main>
    <div class="form1-01-container">
      <div class="form1-01-header">Validation Phase: Review Your Application</div>
      <div class="validation-section-title">Please review your details before final submission:</div>
      <dl class="validation-list" id="validationList"></dl>
      <div class="validation-btns">
        <button class="form1-01-btn" onclick="window.history.back()">Back to Edit</button>
        <button class="form1-01-btn" onclick="alert('Submitted! (Demo only)')">Confirm & Submit</button>
      </div>
    </div>
    <script>
      function formatKey(key) {
        return key.replace(/_/g, ' ').replace(/\b\w/g, c => c.toUpperCase());
      }
      const data = JSON.parse(localStorage.getItem('form1-01-data') || '{}');
      const list = document.getElementById('validationList');
      for (const key in data) {
        let value = Array.isArray(data[key]) ? data[key].join(', ') : data[key];
        // If the field is a file input, show the file name
        if (key === 'id_picture' || key === 'admit_id_picture') {
          value = value && typeof value === 'string' && value.length > 0 ? value.split('\\').pop().split('/').pop() : 'No file selected';
        }
        const dt = document.createElement('dt');
        dt.textContent = formatKey(key);
        const dd = document.createElement('dd');
        dd.textContent = value;
        list.appendChild(dt);
        list.appendChild(dd);
      }
    </script>
  </main>
</body>
</html> 