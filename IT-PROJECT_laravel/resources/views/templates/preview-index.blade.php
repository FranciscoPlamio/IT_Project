<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Template Previews</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 40px 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            margin-bottom: 10px;
        }
        p {
            color: #666;
            margin-bottom: 30px;
        }
        .template-list {
            list-style: none;
        }
        .template-list li {
            margin-bottom: 15px;
        }
        .template-list a {
            display: block;
            padding: 15px 20px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            transition: background 0.3s;
        }
        .template-list a:hover {
            background: #1d4ed8;
        }
        .instructions {
            background: #f0f9ff;
            border-left: 4px solid #2563eb;
            padding: 20px;
            margin-top: 30px;
            border-radius: 4px;
        }
        .instructions h3 {
            color: #1e40af;
            margin-bottom: 10px;
        }
        .instructions ol {
            margin-left: 20px;
            color: #1e40af;
        }
        .instructions li {
            margin-bottom: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>PDF Template Previews</h1>
        <p>Click on any template to preview it in your browser. Use Chrome's Print to PDF feature (Ctrl+P or Cmd+P) to save as PDF.</p>
        
        <ul class="template-list">
            <li>
                <a href="{{ route('preview.certificate') }}" target="_blank">
                    Certificate Template
                </a>
            </li>
            <li>
                <a href="{{ route('preview.ntc-permit') }}" target="_blank">
                    NTC Permit Template
                </a>
            </li>
            <li>
                <a href="{{ route('preview.exam-receipt') }}" target="_blank">
                    Exam Receipt Template
                </a>
            </li>
            <li>
                <a href="{{ route('preview.or-certificate-receipt') }}" target="_blank">
                    OR Certificate Receipt Template
                </a>
            </li>
            <li>
                <a href="{{ route('preview.permit-receipt') }}" target="_blank">
                    Permit Receipt Template
                </a>
            </li>
        </ul>

        <div class="instructions">
            <h3>How to Preview PDFs:</h3>
            <ol>
                <li>Click on any template link above</li>
                <li>The PDF will open directly in your browser (Chrome's built-in PDF viewer)</li>
                <li>You can download it using the download button in the PDF viewer</li>
                <li>These previews use the actual PDF generation functions, so they match production output exactly</li>
            </ol>
        </div>
    </div>
</body>
</html>

