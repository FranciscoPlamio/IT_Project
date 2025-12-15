// Payment QR management scripts - Reusing carousel functionality
document.addEventListener('DOMContentLoaded', function() {
    console.log('Payment QR management loaded');

    // Collapsible sections functionality
    const collapsibleSections = document.querySelectorAll('[data-collapsible]');
    collapsibleSections.forEach(section => {
        const trigger = section.querySelector('[data-collapsible-trigger]');
        const content = section.querySelector('[data-collapsible-content]');
        const label = trigger?.querySelector('[data-toggle-label]');
        const icon = trigger?.querySelector('[data-toggle-icon]');
        const isDefaultCollapsed = section.hasAttribute('data-default-collapsed');
        
        if (!trigger || !content) return;

        // Set initial state
        if (isDefaultCollapsed) {
            section.classList.add('is-collapsed');
            content.style.display = 'none';
            trigger.setAttribute('aria-expanded', 'false');
            if (label) label.textContent = 'Show details';
        } else {
            section.classList.remove('is-collapsed');
            content.style.display = '';
            trigger.setAttribute('aria-expanded', 'true');
            if (label) label.textContent = 'Hide details';
        }

        // Toggle functionality
        trigger.addEventListener('click', () => {
            const isCollapsed = section.classList.contains('is-collapsed');
            
            if (isCollapsed) {
                section.classList.remove('is-collapsed');
                content.style.display = '';
                trigger.setAttribute('aria-expanded', 'true');
                if (label) label.textContent = 'Hide details';
            } else {
                section.classList.add('is-collapsed');
                content.style.display = 'none';
                trigger.setAttribute('aria-expanded', 'false');
                if (label) label.textContent = 'Show details';
            }
        });
    });

    // Handle file input validation (both upload and replace)
    const fileInputs = document.querySelectorAll('.file-input, .replace-input');
    fileInputs.forEach(input => {
        input.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                // Validate file size (2MB max)
                const maxSize = 2 * 1024 * 1024; // 2MB in bytes
                if (file.size > maxSize) {
                    alert('File size exceeds 2MB. Please choose a smaller file.');
                    e.target.value = '';
                    return;
                }

                // Validate file type
                const validTypes = ['image/jpeg', 'image/jpg', 'image/png'];
                if (!validTypes.includes(file.type)) {
                    alert('Invalid file type. Please select a JPEG or PNG image.');
                    e.target.value = '';
                    return;
                }
            }
        });
    });

    // Handle upload form submission with loading state
    const uploadForm = document.querySelector('.upload-form');
    if (uploadForm) {
        uploadForm.addEventListener('submit', function(e) {
            const submitButton = uploadForm.querySelector('.btn-primary');
            if (submitButton) {
                submitButton.disabled = true;
                submitButton.textContent = 'Uploading...';
            }
        });
    }
});

