<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Validation - Application for Radio Operator Examination (Form 1-01)</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  <header>
    <div class="top-bar">
      <img src="{{ asset('images/logo.png') }}" alt="NTC Logo" class="logo">
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