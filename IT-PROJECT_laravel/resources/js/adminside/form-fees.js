const formImages = {};
let currentFormId = null;
let currentVariantId = null;

// MODULAR FORM DATA STRUCTURE
const FORMS_DATA = [
    {
        id: 1,
        code: 'NTC 1-01',
        title: 'APPLICATION FOR RADIO OPERATOR EXAMINATION',
        hasPayment: true,
        variants: [{
            id: 'v1',
            name: 'Radio Operator Examination',
            desc: 'Application for examination',
            breakdown: {
                'Examination Fee (EXF)': 50,
                'Report of Rating Fee': 0
            }
        }]
    },
    {
        id: 2,
        code: 'NTC 1-02',
        title: 'APPLICATION FOR RADIO OPERATOR CERTIFICATE',
        hasPayment: true,
        variants: [
            { id: 'comm_1rtg_new', name: 'Commercial ROC - 1RTG (NEW)', desc: 'First Radio Telephone General Certificate', calc: () => calcForm2('comm_1rtg_new') },
            { id: 'comm_2rtg_new', name: 'Commercial ROC - 2RTG (NEW)', desc: 'Second Radio Telephone General Certificate', calc: () => calcForm2('comm_2rtg_new') },
            { id: 'comm_3rtg_new', name: 'Commercial ROC - 3RTG (NEW)', desc: 'Third Radio Telephone General Certificate', calc: () => calcForm2('comm_3rtg_new') },
            { id: 'comm_1phn_new', name: 'Commercial ROC - 1PHN (NEW)', desc: 'First Radiotelephone Certificate', calc: () => calcForm2('comm_1phn_new') },
            { id: 'comm_2phn_new', name: 'Commercial ROC - 2PHN (NEW)', desc: 'Second Radiotelephone Certificate', calc: () => calcForm2('comm_2phn_new') },
            { id: 'comm_3phn_new', name: 'Commercial ROC - 3PHN (NEW)', desc: 'Third Radiotelephone Certificate', calc: () => calcForm2('comm_3phn_new') },
            { id: 'comm_1rtg_renew', name: 'Commercial ROC - 1RTG (RENEWAL)', desc: 'Renewal with possible surcharge', calc: () => calcForm2('comm_1rtg_renew') },
            { id: 'comm_2rtg_renew', name: 'Commercial ROC - 2RTG (RENEWAL)', desc: 'Renewal with possible surcharge', calc: () => calcForm2('comm_2rtg_renew') },
            { id: 'comm_3rtg_renew', name: 'Commercial ROC - 3RTG (RENEWAL)', desc: 'Renewal with possible surcharge', calc: () => calcForm2('comm_3rtg_renew') },
            { id: 'rroc_aircraft_new', name: 'RROC - Aircraft (NEW)', desc: 'Restricted Radio Operator Certificate for Aircraft', calc: () => calcForm2('rroc_aircraft_new') },
            { id: 'rroc_aircraft_renew', name: 'RROC - Aircraft (RENEWAL)', desc: 'Renewal with possible surcharge', calc: () => calcForm2('rroc_aircraft_renew') },
            { id: 'temp_foreign', name: 'Temporary ROC for Foreign Pilot', desc: 'Temporary certificate', calc: () => calcForm2('temp_foreign') },
            { id: 'srop_new', name: 'SROP (NEW)', desc: 'Ship Radio Operator Permit', calc: () => calcForm2('srop_new') },
            { id: 'srop_renew', name: 'SROP (RENEWAL)', desc: 'Renewal with possible surcharge', calc: () => calcForm2('srop_renew') },
            { id: 'groc_new', name: 'GROC (NEW)', desc: 'General Radio Operator Certificate', calc: () => calcForm2('groc_new') },
            { id: 'groc_renew', name: 'GROC (RENEWAL)', desc: 'Renewal with possible surcharge', calc: () => calcForm2('groc_renew') },
            { id: 'rroc_rlm_new', name: 'RROC - RLM (NEW)', desc: 'Restricted Radio Operator Certificate - Radio Line Maintenance', calc: () => calcForm2('rroc_rlm_new') },
            { id: 'rroc_rlm_renew', name: 'RROC - RLM (RENEWAL)', desc: 'Renewal with possible surcharge', calc: () => calcForm2('rroc_rlm_renew') },
            { id: 'modification', name: 'Modification', desc: 'Modification of any certificate', calc: () => calcForm2('modification') }
        ]
    },
    {
        id: 3,
        code: 'NTC 1-03',
        title: 'APPLICATION FOR AMATEUR RADIO OPERATOR CERTIFICATE/AMATEURRADIO STATION LICENSE',
        hasPayment: true,
        variants: [
            { id: 'at_roc_new', name: 'AT-ROC (NEW)', desc: 'Amateur Radio Operator Certificate - New', calc: () => calcForm3('at_roc_new') },
            { id: 'at_roc_renew', name: 'AT-ROC (RENEWAL)', desc: 'Amateur Radio Operator Certificate - Renewal', calc: () => calcForm3('at_roc_renew') },
            { id: 'at_roc_mod', name: 'AT-ROC (MODIFICATION)', desc: 'Amateur Radio Operator Certificate - Modification', calc: () => calcForm3('at_roc_mod') },
            { id: 'at_rsl_purchase', name: 'AT-RSL Permit to Purchase/Possess', desc: 'Permit before acquiring equipment', calc: () => calcForm3('at_rsl_purchase') },
            { id: 'at_rsl_new_a', name: 'AT-RSL Class A (NEW)', desc: 'Amateur Radio Station License - Class A', calc: () => calcForm3('at_rsl_new_a') },
            { id: 'at_rsl_new_b', name: 'AT-RSL Class B (NEW)', desc: 'Amateur Radio Station License - Class B', calc: () => calcForm3('at_rsl_new_b') },
            { id: 'at_rsl_new_c', name: 'AT-RSL Class C (NEW)', desc: 'Amateur Radio Station License - Class C', calc: () => calcForm3('at_rsl_new_c') },
            { id: 'at_rsl_new_d', name: 'AT-RSL Class D (NEW)', desc: 'Amateur Radio Station License - Class D', calc: () => calcForm3('at_rsl_new_d') },
            { id: 'at_rsl_renew_a', name: 'AT-RSL Class A (RENEWAL)', desc: 'Renewal with possible surcharge', calc: () => calcForm3('at_rsl_renew_a') },
            { id: 'at_rsl_renew_b', name: 'AT-RSL Class B (RENEWAL)', desc: 'Renewal with possible surcharge', calc: () => calcForm3('at_rsl_renew_b') },
            { id: 'at_rsl_mod', name: 'AT-RSL (MODIFICATION)', desc: 'Station License Modification', calc: () => calcForm3('at_rsl_mod') },
            { id: 'at_rsl_sell', name: 'Permit to Sell/Transfer', desc: 'Transfer of equipment ownership', calc: () => calcForm3('at_rsl_sell') },
            { id: 'at_lifetime_new', name: 'AT-LIFETIME (NEW)', desc: 'Lifetime Amateur Radio Station License for Class A', calc: () => calcForm3('at_lifetime_new') },
            { id: 'at_lifetime_mod', name: 'AT-LIFETIME (MODIFICATION)', desc: 'Modification of Lifetime Certificate', calc: () => calcForm3('at_lifetime_mod') },
            { id: 'at_club_purchase', name: 'AT-CLUB Permit to Purchase/Possess', desc: 'Club station equipment permit', calc: () => calcForm3('at_club_purchase') },
            { id: 'at_club_new_simplex', name: 'AT-CLUB RSL Simplex (NEW)', desc: 'Club Radio Station License - Simplex', calc: () => calcForm3('at_club_new_simplex') },
            { id: 'at_club_new_repeater', name: 'AT-CLUB RSL Repeater (NEW)', desc: 'Club Radio Station License - Repeater', calc: () => calcForm3('at_club_new_repeater') },
            { id: 'at_club_renew', name: 'AT-CLUB RSL (RENEWAL)', desc: 'Club station renewal', calc: () => calcForm3('at_club_renew') },
            { id: 'at_club_mod', name: 'AT-CLUB RSL (MODIFICATION)', desc: 'Club station modification', calc: () => calcForm3('at_club_mod') },
            { id: 'temp_foreign_visitor', name: 'Temporary Permit - Foreign Visitor', desc: 'Temporary operating permit', calc: () => calcForm3('temp_foreign_visitor') },
            { id: 'vanity_new', name: 'Vanity Call Sign (NEW)', desc: 'Special personalized call sign', calc: () => calcForm3('vanity_new') },
            { id: 'vanity_renew', name: 'Vanity Call Sign (RENEWAL)', desc: 'Renewal of vanity call sign', calc: () => calcForm3('vanity_renew') },
            { id: 'special_event', name: 'Special Event Call Sign', desc: 'Temporary call sign for events', calc: () => calcForm3('special_event') },
            { id: 'storage', name: 'Permit to Possess for Storage', desc: 'Storage permit for equipment', calc: () => calcForm3('storage') }
        ]
    },
    {
        id: 4,
        code: 'NTC 1-09',
        title: 'APPLICATION FOR PERMIT TO PURCHASE/POSSESS/SELL/TRANSFER',
        hasPayment: false,
        variants: []
    },
    {
        id: 5,
        code: 'NTC 1-11',
        title: 'APPLICATION FOR CONSTRUCTION PERMIT/RADIO STATION LICENSE',
        hasPayment: false,
        variants: []
    },
    {
        id: 6,
        code: 'NTC 1-13',
        title: 'FORM D (FOR MODIFICATION)',
        hasPayment: false,
        variants: []
    },
    {
        id: 7,
        code: 'NTC 1-14',
        title: 'APPLICATION FOR TEMPORARY PERMIT TO PROPAGATE/DEMONSTRATE',
        hasPayment: false,
        variants: []
    },
    {
        id: 8,
        code: 'NTC 1-16',
        title: 'APPLICATION FOR PERMIT TO TRANSPORT RADIO TRANSMITTER/TRANSCEIVER',
        hasPayment: false,
        variants: []
    },
    {
        id: 9,
        code: 'NTC 1-18',
        title: 'APPLICATION FOR DEALER/MANUFACTURER/SERVICE/CENTER/RETAILER/RESELLER/PERMIT/CPE SUPPLIER ACCREDITATION',
        hasPayment: false,
        variants: []
    },
    {
        id: 10,
        code: 'NTC 1-19',
        title: 'APPLICATION FOR CERTIFICATE OF REGISTRATION (WDN/SRD/RFID/SRRS/PUBLIC TRUNK RADIO)',
        hasPayment: false,
        variants: []
    },
    {
        id: 11,
        code: 'NTC 1-20',
        title: 'APPLICATION FOR CERTIFICATE OF REGISTRATION - VALUE ADDED SERVICES',
        hasPayment: false,
        variants: []
    },
    {
        id: 12,
        code: 'NTC 1-21',
        title: 'APPLICATION FOR DUPLICATE OF PERMIT/LICENSE/CERTIFICATE',
        hasPayment: false,
        variants: []
    },
    {
        id: 13,
        code: 'NTC 1-22',
        title: 'APPLICATION FOR TVRO REGISTRATION CERTIFICATE/TVRO/STATION LICENSE/CATV STATION LICENSE',
        hasPayment: false,
        variants: []
    },
    {
        id: 14,
        code: 'NTC 1-24',
        title: 'AFFIDAVIT OF OWNERSHIP AND LOSS WITH UNDERTAKING',
        hasPayment: false,
        variants: []
    },
    {
        id: 15,
        code: 'NTC 1-25',
        title: 'COMPLAINT FORM',
        hasPayment: false,
        variants: []
    },
    {
        id: 16,
        code: 'NTC 1-26',
        title: 'COMPLAINT ON TEXT MESSAGE',
        hasPayment: false,
        variants: []
    }
];

// CALCULATION FUNCTIONS - MODULAR AND REUSABLE
function calcForm2(variantId) {
    const DST = 30;
    const configs = {
        'comm_1rtg_new': { base: 180, label: '1RTG Certificate' },
        'comm_2rtg_new': { base: 120, label: '2RTG Certificate' },
        'comm_3rtg_new': { base: 60, label: '3RTG Certificate' },
        'comm_1phn_new': { base: 120, label: '1PHN Certificate' },
        'comm_2phn_new': { base: 100, label: '2PHN Certificate' },
        'comm_3phn_new': { base: 60, label: '3PHN Certificate' },
        'comm_1rtg_renew': { base: 180, label: '1RTG Renewal' },
        'comm_2rtg_renew': { base: 120, label: '2RTG Renewal' },
        'comm_3rtg_renew': { base: 60, label: '3RTG Renewal' },
        'rroc_aircraft_new': { base: 100, label: 'RROC Aircraft' },
        'rroc_aircraft_renew': { base: 100, label: 'RROC Aircraft Renewal' },
        'temp_foreign': { base: 100, label: 'Temporary ROC' },
        'srop_new': { base: 60, label: 'SROP', af: 20, sem: 20 },
        'srop_renew': { base: 60, label: 'SROP Renewal' },
        'groc_new': { base: 60, label: 'GROC', ff: 10, af: 20 },
        'groc_renew': { base: 60, label: 'GROC Renewal' },
        'rroc_rlm_new': { base: 60, label: 'RROC-RLM', ff: 10, af: 20 },
        'rroc_rlm_renew': { base: 60, label: 'RROC-RLM Renewal' },
        'modification': { base: 120, label: 'Modification Fee' }
    };

    const config = configs[variantId];
    if (!config) return { 'Total': 0 };

    const breakdown = {};
    if (config.ff) breakdown['Filing Fee'] = config.ff;
    if (config.af) breakdown['Application Fee'] = config.af;
    if (config.sem) breakdown['Seminar Fee'] = config.sem;
    breakdown[`${config.label} (1 year)`] = config.base;
    breakdown['Documentary Stamp Tax'] = DST;
    return breakdown;
}

function calcForm3(variantId) {
    const DST = 30;
    const configs = {
        'at_roc_new': { base: 60, label: 'AT-ROC (1 year)' },
        'at_roc_renew': { base: 60, label: 'AT-ROC Renewal (1 year)' },
        'at_roc_mod': { mod: 50, label: 'Modification Fee' },
        'at_rsl_purchase': { pur: 50, pos: 50, label: 'Purchase/Possess' },
        'at_rsl_new_a': { ff: 60, base: 120, label: 'Class A License (1 year)' },
        'at_rsl_new_b': { ff: 60, base: 132, label: 'Class B License (1 year)' },
        'at_rsl_new_c': { ff: 60, base: 144, label: 'Class C License (1 year)' },
        'at_rsl_new_d': { ff: 60, base: 144, label: 'Class D License (1 year)' },
        'at_rsl_renew_a': { base: 120, label: 'Class A Renewal (1 year)' },
        'at_rsl_renew_b': { base: 132, label: 'Class B Renewal (1 year)' },
        'at_rsl_mod': { ff: 60, mod: 50, label: 'RSL Modification' },
        'at_rsl_sell': { stf: 50, label: 'Sell/Transfer' },
        'at_lifetime_new': { lf: 50, label: 'Lifetime License' },
        'at_lifetime_mod': { ff: 60, mod: 50, label: 'Lifetime Modification' },
        'at_club_purchase': { pur: 50, pos: 50, label: 'Club Purchase/Possess' },
        'at_club_new_simplex': { ff: 180, cpf: 600, base: 700, label: 'Simplex License (1 year)' },
        'at_club_new_repeater': { ff: 180, cpf: 600, base: 700, label: 'Repeater License (1 year)' },
        'at_club_renew': { base: 700, label: 'Club Renewal (1 year)' },
        'at_club_mod': { ff: 180, cpf: 600, mod: 50, label: 'Club Modification' },
        'temp_foreign_visitor': { ff: 60, pur: 50, pos: 50, roc: 60, lf: 120, label: 'Temporary Permit' },
        'vanity_new': { base: 1000, label: 'Vanity Call Sign (1 year)' },
        'vanity_renew': { base: 1000, label: 'Vanity Renewal (1 year)' },
        'special_event': { sp: 120, label: 'Special Event' },
        'storage': { pos: 50, label: 'Storage Permit' }
    };

    const config = configs[variantId];
    if (!config) return { 'Total': 0 };

    const breakdown = {};
    if (config.ff) breakdown['Filing Fee'] = config.ff;
    if (config.cpf) breakdown['Certificate Processing Fee'] = config.cpf;
    if (config.pur) breakdown['Permit to Purchase'] = config.pur;
    if (config.pos) breakdown['Permit to Possess'] = config.pos;
    if (config.stf) breakdown['Sell/Transfer Fee'] = config.stf;
    if (config.mod) breakdown['Modification Fee'] = config.mod;
    if (config.sp) breakdown['Special Permit'] = config.sp;
    if (config.lf) breakdown['License Fee'] = config.lf;
    if (config.roc) breakdown['ROC Fee'] = config.roc;
    if (config.base) breakdown[config.label] = config.base;
    breakdown['Documentary Stamp Tax'] = DST;
    return breakdown;
}

// GENERATE FORM CARDS
function generateForms() {
    const formsList = document.getElementById('formsList');
    const totalCount = document.getElementById('totalCount');
    formsList.innerHTML = '';
    totalCount.textContent = `Total: ${FORMS_DATA.length} Forms`;

    FORMS_DATA.forEach(form => {
        const card = document.createElement('div');
        card.className = 'form-card';
        card.onclick = () => openFormModal(form.id);

        const variantCount = form.variants.length;
        const hasVariants = variantCount > 0;

        // Extract form number from code (e.g., "NTC 1-01" -> "1-01")
        const formNumber = form.code.replace('NTC ', '');

        card.innerHTML = `
            <div class="form-card-content">
                <div class="form-info">
                    <div class="form-number">${formNumber}</div>
                    <div class="form-details">
                        <div class="form-code">${form.code}</div>
                        <div class="form-title">${form.title}</div>
                        <div class="form-meta">
                            ${hasVariants ? `<span class="badge badge-variants">${variantCount} Variant${variantCount > 1 ? 's' : ''}</span>` : ''}
                            ${form.hasPayment ? '<span class="badge badge-payment">Payment Required</span>' : '<span class="badge badge-no-payment">No Payment</span>'}
                        </div>
                    </div>
                </div>
                <div class="arrow-icon">→</div>
            </div>
        `;

        formsList.appendChild(card);
    });
}

// OPEN FORM MODAL
function openFormModal(formId) {
    const form = FORMS_DATA.find(f => f.id === formId);
    if (!form) return;

    const modal = document.getElementById('formModal');
    const title = document.getElementById('formModalTitle');
    const subtitle = document.getElementById('formModalSubtitle');
    const body = document.getElementById('formModalBody');

    title.textContent = form.code;
    subtitle.textContent = form.title;

    let bodyHTML = '';

    if (form.variants.length > 0) {
        bodyHTML = `
            <div class="variants-section">
                <div class="variants-header">
                    <h4>Form Variants</h4>
                    <span class="variant-count">${form.variants.length} Options</span>
                </div>
                ${form.variants.map(variant => {
                    let breakdown = {};
                    
                    if (variant.breakdown) {
                        breakdown = variant.breakdown;
                    } else if (variant.calc) {
                        breakdown = variant.calc();
                    }
                    
                    const total = Object.values(breakdown).reduce((a, b) => a + b, 0);
                    const hasBreakdown = Object.keys(breakdown).length > 0 && total > 0;

                    return `
                        <div class="variant-item">
                            <div class="variant-header-info">
                                <div>
                                    <div class="variant-name">${variant.name}</div>
                                    <div class="variant-description">${variant.desc}</div>
                                </div>
                                <div class="variant-actions">
                                    <button class="btn btn-view" onclick="openImageModal(${form.id}, '${variant.id}', 'view', event)">
                                        <span>📄</span>
                                        <span>View</span>
                                    </button>
                                    <button class="btn btn-replace" onclick="openImageModal(${form.id}, '${variant.id}', 'replace', event)">
                                        <span>📝</span>
                                        <span>Replace</span>
                                    </button>
                                </div>
                            </div>
                            ${hasBreakdown ? `
                                <div class="breakdown-section">
                                    ${Object.entries(breakdown).map(([key, value]) => `
                                        <div class="breakdown-row">
                                            <span>${key}:</span>
                                            <span>₱${value.toFixed(2)}</span>
                                        </div>
                                    `).join('')}
                                    <div class="breakdown-total">
                                        <span>Total Amount:</span>
                                        <span>₱${total.toFixed(2)}</span>
                                    </div>
                                </div>
                            ` : ''}
                        </div>
                    `;
                }).join('')}
            </div>
        `;
    } else {
        bodyHTML = `
            <div class="variants-section">
                <div class="variant-item">
                    <div class="variant-header-info">
                        <div>
                            <div class="variant-name">${form.title}</div>
                            <div class="variant-description">${form.hasPayment ? 'Payment details pending' : 'No payment required for this form'}</div>
                        </div>
                        <div class="variant-actions">
                            <button class="btn btn-view" onclick="openImageModal(${form.id}, 'default', 'view', event)">
                                <span>📄</span>
                                <span>View Image</span>
                            </button>
                            <button class="btn btn-replace" onclick="openImageModal(${form.id}, 'default', 'replace', event)">
                                <span>📝</span>
                                <span>Replace Image</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }

    body.innerHTML = bodyHTML;
    modal.classList.add('active');
}

function closeFormModal() {
    const modal = document.getElementById('formModal');
    modal.classList.remove('active');
}

// IMAGE MODAL FUNCTIONS
function openImageModal(formId, variantId, mode, event) {
    event.stopPropagation();
    currentFormId = formId;
    currentVariantId = variantId;

    const modal = document.getElementById('imageModal');
    const title = document.getElementById('imageModalTitle');
    const subtitle = document.getElementById('imageModalSubtitle');
    const preview = document.getElementById('imagePreview');
    const uploadSection = document.getElementById('uploadSection');

    const form = FORMS_DATA.find(f => f.id === formId);
    const variant = form?.variants.find(v => v.id === variantId);

    title.textContent = mode === 'view' ? 'View Form Image' : 'Replace Form Image';
    subtitle.textContent = variant ? `${form.code} - ${variant.name}` : `${form.code}`;

    uploadSection.style.display = mode === 'replace' ? 'block' : 'none';

    const imageKey = `${formId}-${variantId}`;
    if (formImages[imageKey]) {
        preview.innerHTML = `<img src="${formImages[imageKey]}" alt="Form Image">`;
    } else {
        preview.innerHTML = '<span class="placeholder-text">No image uploaded yet</span>';
    }

    modal.classList.add('active');
}

function closeImageModal() {
    const modal = document.getElementById('imageModal');
    modal.classList.remove('active');
    currentFormId = null;
    currentVariantId = null;
}

function handleFileSelect(event) {
    const file = event.target.files[0];
    if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const imageKey = `${currentFormId}-${currentVariantId}`;
            formImages[imageKey] = e.target.result;
            const preview = document.getElementById('imagePreview');
            preview.innerHTML = `<img src="${e.target.result}" alt="Form Image">`;
        };
        reader.readAsDataURL(file);
    }
}

// Expose functions to the global scope for inline handlers
window.openFormModal = openFormModal;
window.closeFormModal = closeFormModal;
window.openImageModal = openImageModal;
window.closeImageModal = closeImageModal;
window.handleFileSelect = handleFileSelect;

// CLOSE MODALS ON OUTSIDE CLICK
window.onclick = function(event) {
    const formModal = document.getElementById('formModal');
    const imageModal = document.getElementById('imageModal');
    
    if (event.target === formModal) {
        closeFormModal();
    }
    if (event.target === imageModal) {
        closeImageModal();
    }
}

// Logout functionality
document.addEventListener('DOMContentLoaded', function() {
    const logoutLink = document.getElementById('logout-link');
    const logoutModal = document.getElementById('logout-modal');
    const confirmLogout = document.getElementById('confirm-logout');
    const cancelLogout = document.getElementById('cancel-logout');
    const logoutForm = document.getElementById('logout-form');

    if (logoutLink) {
        logoutLink.addEventListener('click', function(e) {
            e.preventDefault();
            if (logoutModal) {
                logoutModal.style.display = 'flex';
            }
        });
    }

    if (cancelLogout) {
        cancelLogout.addEventListener('click', function() {
            if (logoutModal) {
                logoutModal.style.display = 'none';
            }
        });
    }

    if (confirmLogout) {
        confirmLogout.addEventListener('click', function() {
            if (logoutForm) {
                logoutForm.submit();
            }
        });
    }

    // Close modal when clicking outside
    if (logoutModal) {
        logoutModal.addEventListener('click', function(e) {
            if (e.target === logoutModal) {
                logoutModal.style.display = 'none';
            }
        });
    }

    // Initialize forms
    generateForms();
});

