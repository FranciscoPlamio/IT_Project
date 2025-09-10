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
        <a class="form1-01-btn" id="backToEditBtn" href="#">Back to Edit</a>
        <a class="form1-01-btn" href="{{ route('payment.gcash') }}">Proceed to Payment</a>
      </div>
    </div>
    <script>
      function formatKey(key) {
        return key.replace(/_/g, ' ').replace(/\b\w/g, c => c.toUpperCase());
      }

      // Map of checkbox values -> human-readable labels from Form1-01
      const checkboxLabelMaps = {
        rtg: {
          '1rtg_e1256_code25': '1RTG - Elements 1, 2, 5, 6 & Code (25/20 wpm)',
          '1rtg_code25': '1RTG - Code (25/20 wpm)',
          '2rtg_e1256_code16': '2RTG - Elements 1, 2, 5, 6 & Code (16 wpm)',
          '2rtg_code16': '2RTG - Code (16 wpm)',
          '3rtg_e125_code16': '3RTG - Elements 1, 2, 5 & Code (16 wpm)',
          '3rtg_code16': '3RTG - Code (16 wpm)'
        },
        amateur: {
          'class_a_e8910_code5': 'Class A - Elements 8, 9, 10 & Code (5 wpm)',
          'class_a_code5_only': 'Class A - Code (5 wpm) Only',
          'class_b_e567': 'Class B - Elements 5, 6 & 7',
          'class_b_e2': 'Class B - Element 2',
          'class_c_e234': 'Class C - Elements 2, 3 & 4',
          'class_d_e2': 'Class D - Element 2'
        },
        rphn: {
          '1phn_e1234': '1PHN - Elements 1, 2, 3 & 4',
          '2phn_e123': '2PHN - Elements 1, 2 & 3',
          '3phn_e12': '3PHN - Elements 1 & 2'
        },
        rroc: {
          'rroc_aircraft_e1': 'RROC - Aircraft - Element 1'
        }
      };

      function formatValue(key, rawValue) {
        // If the field is a file input, show just the file name
        if (key === 'id_picture' || key === 'admit_id_picture') {
          if (!rawValue) return 'No file selected';
          if (Array.isArray(rawValue)) {
            return rawValue.map(v => (v && typeof v === 'string' ? v.split('\\').pop().split('/').pop() : ''))
              .filter(Boolean)
              .join(', ');
          }
          return typeof rawValue === 'string' && rawValue.length > 0
            ? rawValue.split('\\').pop().split('/').pop()
            : 'No file selected';
        }

        // Map checkbox values to their labels when applicable
        const map = checkboxLabelMaps[key];
        if (map) {
          if (Array.isArray(rawValue)) {
            return rawValue.map(v => map[v] || v).join(', ');
          }
          return map[rawValue] || rawValue || '';
        }

        // Default formatting
        if (Array.isArray(rawValue)) return rawValue.join(', ');
        return rawValue ?? '';
      }

      const server101 = JSON.parse('{!! json_encode(isset($form101) ? $form101 : null) !!}');
      const data = {}; // always prefer server; keep empty to avoid localStorage conflicts
      const list = document.getElementById('validationList');
      const data102 = JSON.parse(localStorage.getItem('form1-02-data') || '{}');
      const data103 = JSON.parse(localStorage.getItem('form1-03-data') || '{}');
      const data111 = JSON.parse(localStorage.getItem('form1-11-data') || '{}');
      const data113 = JSON.parse(localStorage.getItem('form1-13-data') || '{}');
      const data114 = JSON.parse(localStorage.getItem('form1-14-data') || '{}');
      const data116 = JSON.parse(localStorage.getItem('form1-16-data') || '{}');
      const data118 = JSON.parse(localStorage.getItem('form1-18-data') || '{}');
      const data119 = JSON.parse(localStorage.getItem('form1-19-data') || '{}');
      const data120 = JSON.parse(localStorage.getItem('form1-20-data') || '{}');
      const data121 = JSON.parse(localStorage.getItem('form1-21-data') || '{}');
      const data122 = JSON.parse(localStorage.getItem('form1-22-data') || '{}');
      const data124 = JSON.parse(localStorage.getItem('form1-24-data') || '{}');
      const data125 = JSON.parse(localStorage.getItem('form1-25-data') || '{}');
      const data126 = JSON.parse(localStorage.getItem('form1-26-data') || '{}');
      const has101 = Object.keys(data).length > 0;
      const has102 = Object.keys(data102).length > 0;
      const has103 = Object.keys(data103).length > 0;
      const has111 = Object.keys(data111).length > 0;
      const has113 = Object.keys(data113).length > 0;
      const has114 = Object.keys(data114).length > 0;
      const has116 = Object.keys(data116).length > 0;
      const has118 = Object.keys(data118).length > 0;
      const has119 = Object.keys(data119).length > 0;
      const has120 = Object.keys(data120).length > 0;
      const has121 = Object.keys(data121).length > 0;
      const has122 = Object.keys(data122).length > 0;
      const has124 = Object.keys(data124).length > 0;
      const has125 = Object.keys(data125).length > 0;
      const has126 = Object.keys(data126).length > 0;
      const activeForm = localStorage.getItem('active-form');

      const labelMaps102 = {
        application_type: {
          'new': 'NEW',
          'renewal': 'RENEWAL',
          'modification': 'MODIFICATION'
        },
        certificate_type: {
          '1RTG': '1RTG',
          '2RTG': '2RTG',
          '3RTG': '3RTG',
          '1PHN': '1PHN',
          '2PHN': '2PHN',
          '3PHN': '3PHN',
          'SROP': 'SROP',
          'RROC-Land Mobile': 'RROC-Land Mobile (RLM)',
          'RROC-Aircraft': 'RROC-Aircraft',
          'GROC': 'GROC (Government)',
          'TP RROC-Aircraft': 'TP RROC-Aircraft (Foreign Pilot)',
          'others': 'OTHERS, specify'
        },
        sex: { male: 'Male', female: 'Female' },
        employment_status: { employed: 'Employed', unemployed: 'Unemployed' },
        employment_type: { local: 'Local', foreign: 'Foreign' }
      };

      function formatValue102(key, rawValue) {
        const map = labelMaps102[key];
        if (map) {
          if (Array.isArray(rawValue)) return rawValue.map(v => map[v] || v).join(', ');
          return map[rawValue] || rawValue || '';
        }
        if (Array.isArray(rawValue)) return rawValue.join(', ');
        return rawValue ?? '';
      }

      function render101() {
        const payload = server101 && typeof server101 === 'object' ? server101 : data;
        for (const key in payload) {
          if (key === 'form_token') continue;
          const value = formatValue(key, payload[key]);
          const dt = document.createElement('dt');
          dt.textContent = formatKey(key);
          const dd = document.createElement('dd');
          dd.textContent = value;
          list.appendChild(dt);
          list.appendChild(dd);
        }
      }

      function render102() {
        const titleEl = document.querySelector('.validation-section-title');
        if (titleEl) titleEl.textContent = 'Form 1-02 Details:';
        // Reuse the existing list so the bar/title alignment stays consistent
        list.innerHTML = '';
        for (const key in data102) {
          const value = formatValue102(key, data102[key]);
          const dt = document.createElement('dt');
          dt.textContent = formatKey(key);
          const dd = document.createElement('dd');
          dd.textContent = value;
          list.appendChild(dt);
          list.appendChild(dd);
        }
      }

      // ===== Form 1-03 mapping and renderer =====
      const labelMaps103 = {
        application_type: { new: 'NEW', renewal: 'RENEWAL', modification: 'MODIFICATION' },
        permit_type: {
          amateur_operator: 'Amateur Radio Operator Certificate',
          amateur_station: 'Amateur Radio Station License',
          club_station: 'Club Radio Station License',
          temporary_foreign: 'Temporary Permit for Foreign Visitor',
          special_vanity: 'Special Permit for Vanity/Special Call Sign'
        },
        station_class: {
          class_a: 'Class A',
          class_b: 'Class B',
          class_c: 'Class C',
          class_d: 'Class D'
        },
        sex: { male: 'Male', female: 'Female' }
      };

      function formatValue103(key, rawValue) {
        const map = labelMaps103[key];
        if (map) {
          if (Array.isArray(rawValue)) return rawValue.map(v => map[v] || v).join(', ');
          return map[rawValue] || rawValue || '';
        }
        if (Array.isArray(rawValue)) return rawValue.join(', ');
        return rawValue ?? '';
      }

      function render103() {
        const titleEl = document.querySelector('.validation-section-title');
        if (titleEl) titleEl.textContent = 'Form 1-03 Details:';
        list.innerHTML = '';
        for (const key in data103) {
          const value = formatValue103(key, data103[key]);
          const dt = document.createElement('dt');
          dt.textContent = formatKey(key);
          const dd = document.createElement('dd');
          dd.textContent = value;
          list.appendChild(dt);
          list.appendChild(dd);
        }
      }

      // ===== Form 1-11 mapping and renderer =====
      const labelMaps111 = {
        application_type: { new: 'NEW', renewal: 'RENEWAL', modification: 'MODIFICATION' },
        permit_type: {
          construction_permit: 'CONSTRUCTION PERMIT',
          radio_station_license: 'RADIO STATION LICENSE'
        },
        radio_service: {
          fixed_land_mobile: 'FIXED AND LAND MOBILE',
          aeronautical: 'AERONAUTICAL',
          maritime: 'MARITIME (Public/Private Coastal)',
          broadcast: 'BROADCAST',
          others: 'OTHERS'
        },
        station_class: {
          rt: 'RT', fx: 'FX', fb: 'FB', ml: 'ML', p: 'P', bc: 'BC', fc: 'FC', fa: 'FA', ma: 'MA', tc: 'TC',
          others_station: 'OTHERS'
        }
      };

      function formatValue111(key, rawValue) {
        const map = labelMaps111[key];
        if (map) {
          if (Array.isArray(rawValue)) return rawValue.map(v => map[v] || v).join(', ');
          return map[rawValue] || rawValue || '';
        }
        if (Array.isArray(rawValue)) return rawValue.join(', ');
        return rawValue ?? '';
      }

      function render111() {
        const titleEl = document.querySelector('.validation-section-title');
        if (titleEl) titleEl.textContent = 'Form 1-11 Details:';
        list.innerHTML = '';
        for (const key in data111) {
          const value = formatValue111(key, data111[key]);
          const dt = document.createElement('dt');
          dt.textContent = formatKey(key);
          const dd = document.createElement('dd');
          dd.textContent = value;
          list.appendChild(dt);
          list.appendChild(dd);
        }
      }

      // ===== Form 1-13 mapping and renderer =====
      const labelMaps113 = {
        // Currently Form 1-13 uses text inputs only; keep for future mappings
      };

      function formatValue113(key, rawValue) {
        const map = labelMaps113[key];
        if (map) {
          if (Array.isArray(rawValue)) return rawValue.map(v => map[v] || v).join(', ');
          return map[rawValue] || rawValue || '';
        }
        if (Array.isArray(rawValue)) return rawValue.join(', ');
        return rawValue ?? '';
      }

      function render113() {
        const titleEl = document.querySelector('.validation-section-title');
        if (titleEl) titleEl.textContent = 'Form 1-13 Details:';
        list.innerHTML = '';
        for (const key in data113) {
          const value = formatValue113(key, data113[key]);
          const dt = document.createElement('dt');
          dt.textContent = formatKey(key);
          const dd = document.createElement('dd');
          dd.textContent = value;
          list.appendChild(dt);
          list.appendChild(dd);
        }
      } 
      // ===== Form 1-14 mapping and renderer =====
      const labelMaps114 = {
        // Currently Form 1-14 uses text inputs only; keep for future mappings
      };
      
      
      function formatValue114(key, rawValue) {
        const map = labelMaps114[key];
        if (map) {
          if (Array.isArray(rawValue)) return rawValue.map(v => map[v] || v).join(', ');
          return map[rawValue] || rawValue || '';
        }
        if (Array.isArray(rawValue)) return rawValue.join(', ');
        return rawValue ?? '';
      }
      function render114() {
        const titleEl = document.querySelector('.validation-section-title');
        if (titleEl) titleEl.textContent = 'Form 1-14 Details:';
        list.innerHTML = '';
        for (const key in data114) {
          const value = formatValue114(key, data114[key]);
          const dt = document.createElement('dt');
          dt.textContent = formatKey(key);
          const dd = document.createElement('dd');
          dd.textContent = value;
          list.appendChild(dt);
          list.appendChild(dd);
        }
      }

      // ===== Form 1-16 mapping and renderer =====
      const labelMaps116 = {
        // Currently Form 1-16 uses text inputs only; keep for future mappings
      };

      function formatValue116(key, rawValue) {
        const map = labelMaps116[key];
        if (map) {
          if (Array.isArray(rawValue)) return rawValue.map(v => map[v] || v).join(', ');
          return map[rawValue] || rawValue || '';
        }
        if (Array.isArray(rawValue)) return rawValue.join(', ');
        return rawValue ?? '';
      }

      function render116() {
        const titleEl = document.querySelector('.validation-section-title');
        if (titleEl) titleEl.textContent = 'Form 1-16 Details:';
        list.innerHTML = '';
        for (const key in data116) {
          const value = formatValue116(key, data116[key]);
          const dt = document.createElement('dt');
          dt.textContent = formatKey(key);
          const dd = document.createElement('dd');
          dd.textContent = value;
          list.appendChild(dt);
          list.appendChild(dd);
        }
      }

      // ===== Form 1-18 mapping and renderer =====
      const labelMaps118 = {
        // Currently Form 1-18 uses text inputs only; keep for future mappings
      };
      
      
      function formatValue118(key, rawValue) {
        const map = labelMaps118[key];
        if (map) {
          if (Array.isArray(rawValue)) return rawValue.map(v => map[v] || v).join(', ');
          return map[rawValue] || rawValue || '';
        }
        if (Array.isArray(rawValue)) return rawValue.join(', ');
        return rawValue ?? '';
      }
      function render118() {
        const titleEl = document.querySelector('.validation-section-title');
        if (titleEl) titleEl.textContent = 'Form 1-18 Details:';
        list.innerHTML = '';
        for (const key in data118) {
          const value = formatValue118(key, data118[key]);
          const dt = document.createElement('dt');
          dt.textContent = formatKey(key);
          const dd = document.createElement('dd');
          dd.textContent = value;
          list.appendChild(dt);
          list.appendChild(dd);
        }
      }

      // ===== Form 1-19 mapping and renderer =====
      const labelMaps119 = {
        // Currently Form 1-19 uses text inputs only; keep for future mappings
      };
      
      
      function formatValue119(key, rawValue) {
        const map = labelMaps119[key];
        if (map) {
          if (Array.isArray(rawValue)) return rawValue.map(v => map[v] || v).join(', ');
          return map[rawValue] || rawValue || '';
        }
        if (Array.isArray(rawValue)) return rawValue.join(', ');
        return rawValue ?? '';
      }
      function render119() {
        const titleEl = document.querySelector('.validation-section-title');
        if (titleEl) titleEl.textContent = 'Form 1-19 Details:';
        list.innerHTML = '';
        for (const key in data119) {
          const value = formatValue119(key, data119[key]);
          const dt = document.createElement('dt');
          dt.textContent = formatKey(key);
          const dd = document.createElement('dd');
          dd.textContent = value;
          list.appendChild(dt);
          list.appendChild(dd);
        }
      }

      // ===== Form 1-20 mapping and renderer =====
      const labelMaps120 = {
        // Currently Form 1-20 uses text inputs only; keep for future mappings
      };
      
      
      function formatValue120(key, rawValue) {
        const map = labelMaps120[key];
        if (map) {
          if (Array.isArray(rawValue)) return rawValue.map(v => map[v] || v).join(', ');
          return map[rawValue] || rawValue || '';
        }
        if (Array.isArray(rawValue)) return rawValue.join(', ');
        return rawValue ?? '';
      }
      function render120() {
        const titleEl = document.querySelector('.validation-section-title');
        if (titleEl) titleEl.textContent = 'Form 1-20 Details:';
        list.innerHTML = '';
        for (const key in data120) {
          const value = formatValue120(key, data120[key]);
          const dt = document.createElement('dt');
          dt.textContent = formatKey(key);
          const dd = document.createElement('dd');
          dd.textContent = value;
          list.appendChild(dt);
          list.appendChild(dd);
        }
      }

      // ===== Form 1-21 mapping and renderer =====
      const labelMaps121 = {
        // Currently Form 1-21 uses text inputs only; keep for future mappings
      };
      
      
      function formatValue121(key, rawValue) {
        const map = labelMaps121[key];
        if (map) {
          if (Array.isArray(rawValue)) return rawValue.map(v => map[v] || v).join(', ');
          return map[rawValue] || rawValue || '';
        }
        if (Array.isArray(rawValue)) return rawValue.join(', ');
        return rawValue ?? '';
      }
      function render121() {
        const titleEl = document.querySelector('.validation-section-title');
        if (titleEl) titleEl.textContent = 'Form 1-21 Details:';
        list.innerHTML = '';
        for (const key in data121) {
          const value = formatValue121(key, data121[key]);
          const dt = document.createElement('dt');
          dt.textContent = formatKey(key);
          const dd = document.createElement('dd');
          dd.textContent = value;
          list.appendChild(dt);
          list.appendChild(dd);
        }
      }

      // ===== Form 1-22 mapping and renderer =====
      const labelMaps122 = {
        // Currently Form 1-22 uses text inputs only; keep for future mappings
      };
      
      
      function formatValue122(key, rawValue) {
        const map = labelMaps122[key];
        if (map) {
          if (Array.isArray(rawValue)) return rawValue.map(v => map[v] || v).join(', ');
          return map[rawValue] || rawValue || '';
        }
        if (Array.isArray(rawValue)) return rawValue.join(', ');
        return rawValue ?? '';
      }
      function render122() {
        const titleEl = document.querySelector('.validation-section-title');
        if (titleEl) titleEl.textContent = 'Form 1-22 Details:';
        list.innerHTML = '';
        for (const key in data122) {
          const value = formatValue122(key, data122[key]);
          const dt = document.createElement('dt');
          dt.textContent = formatKey(key);
          const dd = document.createElement('dd');
          dd.textContent = value;
          list.appendChild(dt);
          list.appendChild(dd);
        }
      }

      // ===== Form 1-24 mapping and renderer =====
      const labelMaps124 = {
        // Currently Form 1-24 uses text inputs only; keep for future mappings
      };
      
      
      function formatValue124(key, rawValue) {
        const map = labelMaps124[key];
        if (map) {
          if (Array.isArray(rawValue)) return rawValue.map(v => map[v] || v).join(', ');
          return map[rawValue] || rawValue || '';
        }
        if (Array.isArray(rawValue)) return rawValue.join(', ');
        return rawValue ?? '';
      }
      function render124() {
        const titleEl = document.querySelector('.validation-section-title');
        if (titleEl) titleEl.textContent = 'Form 1-24 Details:';
        list.innerHTML = '';
        for (const key in data124) {
          const value = formatValue124(key, data124[key]);
          const dt = document.createElement('dt');
          dt.textContent = formatKey(key);
          const dd = document.createElement('dd');
          dd.textContent = value;
          list.appendChild(dt);
          list.appendChild(dd);
        }
      }

      // ===== Form 1-25 mapping and renderer =====
      const labelMaps125 = {
        // Currently Form 1-25 uses text inputs only; keep for future mappings
      };
      
      
      function formatValue125(key, rawValue) {    
        const map = labelMaps125[key];
        if (map) {
          if (Array.isArray(rawValue)) return rawValue.map(v => map[v] || v).join(', ');
          return map[rawValue] || rawValue || '';
        }
        if (Array.isArray(rawValue)) return rawValue.join(', ');
        return rawValue ?? '';
      }
      function render125() {
        const titleEl = document.querySelector('.validation-section-title');
        if (titleEl) titleEl.textContent = 'Form 1-25 Details:';
        list.innerHTML = '';
        for (const key in data125) {
          const value = formatValue125(key, data125[key]);
          const dt = document.createElement('dt');
          dt.textContent = formatKey(key);
          const dd = document.createElement('dd');
          dd.textContent = value;
          list.appendChild(dt);
          list.appendChild(dd);
        }
      }

      // ===== Form 1-26 mapping and renderer =====
      const labelMaps126 = {
        // Currently Form 1-26 uses text inputs only; keep for future mappings
      };
      
      
      function formatValue126(key, rawValue) {
        const map = labelMaps126[key];
        if (map) {
          if (Array.isArray(rawValue)) return rawValue.map(v => map[v] || v).join(', ');
          return map[rawValue] || rawValue || '';
        }
        if (Array.isArray(rawValue)) return rawValue.join(', ');
        return rawValue ?? '';
      }
      function render126() {
        const titleEl = document.querySelector('.validation-section-title');
        if (titleEl) titleEl.textContent = 'Form 1-26 Details:';
        list.innerHTML = '';
        for (const key in data126) {
          const value = formatValue126(key, data126[key]);
          const dt = document.createElement('dt');
          dt.textContent = formatKey(key);
          const dd = document.createElement('dd');
          dd.textContent = value;
          list.appendChild(dt);
          list.appendChild(dd);
        }
      }
      // Wire Back to Edit with token
      (function wireBackToEdit(){
        try {
          const btn = document.getElementById('backToEditBtn');
          if (!btn) return;
          const tokenFromServer = server101 && server101.form_token ? server101.form_token : '';
          const tokenFromQuery = new URLSearchParams(window.location.search).get('token');
          const storedToken = localStorage.getItem('form_token') || '';
          const token = tokenFromServer || tokenFromQuery || storedToken;
          const url = new URL("{{ route('forms.1-01.edit') }}", window.location.origin);
          if (token) url.searchParams.set('token', token);
          btn.href = url.toString();
        } catch (e) { /* noop */ }
      })();

      // Show only the active form (fallback to whichever has data)
      if (activeForm === '1-01' && server101) {
        render101();
      } else if (activeForm === '1-02' && has102) {
        render102();
      } else if (activeForm === '1-03' && has103) {
        render103();
      } else if (activeForm === '1-11' && has111) {
        render111();
      } else if (activeForm === '1-13' && has113) {
        render113();
      } else if (activeForm === '1-14' && has114) {
        render114();
      } else if (activeForm === '1-16' && has116) {
        render116();
      } else if (activeForm === '1-18' && has118) {
        render118();
      } else if (activeForm === '1-19' && has119) {
        render119();
      } else if (activeForm === '1-20' && has120) {
        render120();
      } else if (activeForm === '1-21' && has121) {
        render121();
      } else if (activeForm === '1-22' && has122) {
        render122();
      } else if (activeForm === '1-24' && has124) {
        render124();
      } else if (activeForm === '1-25' && has125) {
        render125();
      } else if (activeForm === '1-26' && has126) {
        render126();
      } else if (has101) {
        render101();
      } else if (has102) {
        render102();
      } else if (has103) {
        render103();
      } else if (has111) {
        render111();
      } else if (has113) {
        render113();
      } else if (has114) {
        render114();
      } else if (has116) {
        render116();
      } else if (has118) {
        render118();
      } else if (has119) {
        render119();
      } else if (has120) {
        render120();
      } else if (has121) {
        render121();
      } else if (has122) {
        render122();
      } else if (has124) {
        render124();
      } else if (has125) {
        render125();
      } else if (has126) {
        render126();
      }
    </script>
  </main>
</body>
</html> 