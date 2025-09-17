<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>List of Harmonized Forms</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
  <header>
    <div class="top-bar">
      <img src="{{ asset('images/logo.png') }}" alt="NTC Logo" class="logo">
      <div class="title">
        <p>Republic of the Philippines</p>
        <h1>National Telecommunication Commission<br><span>Cordillera Administrative Region, Baguio City Philippines</span></h1>
      </div>
    </div>
    <nav>
      <button class="menu-toggle" id="menuToggle">☰</button>
      <ul id="navList">
        <li class="active"><a href="{{ url('/') }}">Home</a></li>
        <li><a href="https://car.ntc.gov.ph/category/announcements/news-and-updates/" target="_blank" rel="noopener">News</a></li>
        <li><a href="{{ route('forms.display') }}">Forms</a></li>
        <li><a href="https://car.ntc.gov.ph/i-announcements-and-news/mandate-mission-vision/" target="_blank" rel="noopener">About us</a></li>
        <li><a href="https://car.ntc.gov.ph/list-of-officials-position-designation-and-contact-information/" target="_blank" rel="noopener">Contact us</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <div class="forms-list-container">
      @if(session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 12px; border-radius: 4px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
          <strong>Success!</strong> {{ session('success') }}
        </div>
      @endif
      
      @if(session('error'))
        <div style="background-color: #f8d7da; color: #721c24; padding: 12px; border-radius: 4px; margin-bottom: 20px; border: 1px solid #f5c6cb;">
          <strong>Error!</strong> {{ session('error') }}
        </div>
      @endif
      
      <div style="display:flex;justify-content:space-between;align-items:center;">
        <div>
          <div class="forms-list-header">LIST OF HARMONIZED FORMS</div>
          <a class="forms-list-sub" href="#">Select Forms</a>
        </div>
        <div style="display:flex;align-items:center;gap:15px;">
          @if(session('email_verified'))
            <div style="font-size:14px;color:#666;">
              Verified as: <strong>{{ session('email_verified') }}</strong>
            </div>
            <form method="POST" action="{{ route('email-auth.clear') }}" style="display:inline;">
              @csrf
              <button type="submit" style="background:#dc3545;color:white;border:none;padding:6px 12px;border-radius:4px;cursor:pointer;font-size:12px;">
                Sign Out
              </button>
            </form>
          @endif
          <form class="forms-search-bar" onsubmit="return false;">
            <input class="forms-search-input" type="text" placeholder="Search" />
            <span class="forms-search-icon">&#128269;</span>
          </form>
        </div>
      </div>
      <div class="forms-list-wrapper">
        <table class="forms-list-table">
          <thead>
            <tr>
              <th>Form No.</th>
              <th>Form Title</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Form No. NTC 1-01</td>
              <td>Application for Radio Operator Examination</td>
              <td><a class="forms-signup-btn" href="{{ route('forms.1-01') }}">Sign up</a></td>
            </tr>
            <tr>
              <td>Form No. NTC 1-02</td>
              <td>Application for Radio Operator Certificate</td>
              <td><a class="forms-signup-btn" href="{{ route('forms.1-02') }}">Sign up</a></td>
            </tr>
            <tr>
              <td>Form No. NTC 1-03</td>
              <td>Application for Amateur Radio Operator Certificate/AmateurRadio Station License</td>
              <td><a class="forms-signup-btn" href="{{ route('forms.1-03') }}">Sign up</a></td>
            </tr>
            <tr>
              <td>Form No. NTC 1-09</td>
              <td>Aplication for Permit to Purchase/Possess/Sell/Transfer</td>
              <td><a class="forms-signup-btn" href="{{ route('forms.1-09') }}">Sign up</a></td>
            </tr>
            <tr>
              <td>Form No. NTC 1-11</td>
              <td>Application for Construction Permit/Radio Station License</td>
              <td><a class="forms-signup-btn" href="{{ route('forms.1-11') }}">Sign up</a></td>
            </tr>
            <tr> 
              <td>Form No. NTC 1-13</td>
              <td>Form D (For Modification)</td>
              <td><a class="forms-signup-btn" href="{{ route('forms.1-13') }}">Sign up</a></td>
            </tr>
            <tr>
              <td>Form No. NTC 1-14</td>
              <td>Application for Temporary Permit to Propagate/Demonstrate</td>
              <td><a class="forms-signup-btn" href="{{ route('forms.1-14') }}">Sign up</a></td>
            </tr>
            <tr>
              <td>Form No. NTC 1-16</td>
              <td>Application for Permit to Transport Radio Transmitter/Transceiver</td>
              <td><a class="forms-signup-btn" href="{{ route('forms.1-16') }}">Sign up</a></td>
            </tr>
            <tr>
              <td>Form No. NTC 1-18</td>
              <td>Application for Dealer/Manufacturer/Service/Center/Retailer/Reseller/Permit/CPE Supplier Accreditation</td>
              <td><a class="forms-signup-btn" href="{{ route('forms.1-18') }}">Sign up</a></td>
            </tr>
            <tr>
              <td>Form No. NTC 1-19</td>
              <td>Application for Certificate of Registration (WDN/SRD/RFID/SRRS/Public Trunk Radio)</td>
              <td><a class="forms-signup-btn" href="{{ route('forms.1-19') }}">Sign up</a></td>
            </tr>
            <tr>
              <td>Form No. NTC 1-20</td>
              <td>Application for Certificate of Registration - Value Added Services</td>
              <td><a class="forms-signup-btn" href="{{ route('forms.1-20') }}">Sign up</a></td>
            </tr>
            <tr>
              <td>Form No. NTC 1-21</td>
              <td>Application for Duplicate of Permit/License/Certificate</td>
              <td><a class="forms-signup-btn" href="{{ route('forms.1-21') }}">Sign up</a></td>
            </tr>
            <tr>
              <td>Form No. NTC 1-22</td>
              <td>Application for TVRO Registration Certificate/TVRO/Station License/CATV Station License</td>
              <td><a class="forms-signup-btn" href="{{ route('forms.1-22') }}">Sign up</a></td>
            </tr>
            <tr>
              <td>Form No. NTC 1-24</td>
              <td>Affidavit of Ownership and Loss with Undertaking</td>
              <td><a class="forms-signup-btn" href="{{ route('forms.1-24') }}">Sign up</a></td>
            </tr>
            <tr>
              <td>Form No. NTC 1-25</td>
              <td>Complaint Form</td>
              <td><a class="forms-signup-btn" href="{{ route('forms.1-25') }}">Sign up</a></td>
            </tr>
            <tr>
              <td>Form No. NTC 1-25</td>
              <td>Complaint on Text Message</td>
              <td><a class="forms-signup-btn" href="{{ route('forms.1-25-text-message') }}">Sign up</a></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </main>
  <script>
    const toggle = document.getElementById("menuToggle");
    const navList = document.getElementById("navList");
    toggle.addEventListener("click", () => {
      navList.classList.toggle("open");
    });
  </script>
</body>
</html> 