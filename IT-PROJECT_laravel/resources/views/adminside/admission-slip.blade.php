<x-admin-layout title="Admission Slip">
    <x-slot:head>
        @vite(['resources/css/adminside/admission-slip.css', 'resources/js/adminside/admission-slip.js'])
    </x-slot:head>

    <main class="main admission-slip-page">
        <section class="page-header">
            <p class="eyebrow">Document Templates</p>
            <h1>Examination Admission Slip</h1>
            <p class="description">
                Provide the examinee with the official admission slip. Review the information below,
                then print or export the document for distribution.
            </p>
            <div class="header-actions">
                <button class="secondary-btn">Preview</button>
                <button class="primary-btn">Print Slip</button>
            </div>
        </section>

        <section class="slip-wrapper">
            <div class="slip-card">
                <div class="slip-title">EXAMINATION ADMISSION SLIP</div>
                <div class="slip-body">
                    <div class="slip-content">
                        <div class="slip-to">
                            <span class="label">TO:</span>
                            <div>
                                <strong>The Chairperson,</strong><br>
                                Radio Operators Examination Committee
                            </div>
                        </div>

                        <div class="slip-grid">
                            <div class="slip-text">
                                Please admit Mr. / Ms.
                                <span class="field-box">{{ $slipData['admit_name'] }}</span>
                            </div>

                            <div class="slip-text">
                                with mailing address at
                                <span class="field-box">{{ $slipData['mailing_address'] }}</span>
                            </div>

                            <div class="slip-text">
                                in the examination for
                                <span class="field-box">{{ $slipData['exam_for'] }}</span>
                            </div>

                            <div class="slip-details">
                                <div class="detail">
                                    <span class="detail-label">Place of Exam:</span>
                                    <span class="field-box">{{ $slipData['place'] }}</span>
                                </div>
                                <div class="detail">
                                    <span class="detail-label">Date of Exam (mm/dd/yy):</span>dasd</span>
                                    <span class="field-box">{{ $slipData['date'] }}</span>
                                </div>
                                <div class="detail">
                                    <span class="detail-label">Time of Exam:</span>
                                    <span class="field-box">{{ $slipData['time'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="id-box">
                        <span>1"x1" ID Picture</span>
                    </div>
                </div>

                <div class="signature">
                    <div class="signature-line"></div>
                    <span class="signature-name">{{ $slipData['authorized_officer'] }}</span>
                    <span class="signature-label">Authorized Officer</span>
                </div>
            </div>
        </section>
    </main>
</x-admin-layout>
