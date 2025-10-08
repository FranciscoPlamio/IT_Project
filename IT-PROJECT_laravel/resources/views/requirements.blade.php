<x-layout :title="'Requirements and Fees - Citizen\'s Charter'">

    <main>
        <div class="requirements-container">
            <div class="requirements-header">
                <h1>CITIZEN'S CHARTER 1ST EDITION - 2025</h1>
                <p>Requirements and Fees for Various Applications, Permits, and Licenses</p>
            </div>

            <!-- Category Navigation -->
            <div class="requirements-nav">
                <button class="nav-btn active" data-category="permits">Permits & Licenses</button>
                <button class="nav-btn" data-category="amateur">Amateur Service</button>
                <button class="nav-btn" data-category="accreditation">Accreditation</button>
                <button class="nav-btn" data-category="documents">Documents</button>
                <button class="nav-btn" data-category="assistance">Customer Assistance</button>
            </div>

            <!-- Permits & Licenses Section (Yellow) -->
            <div class="requirements-section active" id="permits">
                <div class="image-container">
                    <div class="zoom-controls">
                        <button class="zoom-btn zoom-in" onclick="zoomImage('permits', 'in')">+</button>
                        <button class="zoom-btn zoom-out" onclick="zoomImage('permits', 'out')">-</button>
                        <button class="zoom-btn zoom-reset" onclick="zoomImage('permits', 'reset')">Reset</button>
                    </div>
                    <img src="{{ asset('images/citizens-charter/permits-section.png') }}" alt="Permits & Licenses Section" class="charter-image" id="permits-image" onclick="toggleFullscreen('permits')">
                </div>
            </div>

            <!-- Amateur Service Section (Blue) -->
            <div class="requirements-section" id="amateur">
                <div class="image-container">
                    <div class="zoom-controls">
                        <button class="zoom-btn zoom-in" onclick="zoomImage('amateur', 'in')">+</button>
                        <button class="zoom-btn zoom-out" onclick="zoomImage('amateur', 'out')">-</button>
                        <button class="zoom-btn zoom-reset" onclick="zoomImage('amateur', 'reset')">Reset</button>
                    </div>
                    <img src="{{ asset('images/citizens-charter/amateur-section.png') }}" alt="Amateur Service Section" class="charter-image" id="amateur-image" onclick="toggleFullscreen('amateur')">
                </div>
            </div>

            <!-- Accreditation Section (Pink/Red) -->
            <div class="requirements-section" id="accreditation">
                <div class="image-container">
                    <div class="zoom-controls">
                        <button class="zoom-btn zoom-in" onclick="zoomImage('accreditation', 'in')">+</button>
                        <button class="zoom-btn zoom-out" onclick="zoomImage('accreditation', 'out')">-</button>
                        <button class="zoom-btn zoom-reset" onclick="zoomImage('accreditation', 'reset')">Reset</button>
                    </div>
                    <img src="{{ asset('images/citizens-charter/accreditation-section.png') }}" alt="Accreditation Section" class="charter-image" id="accreditation-image" onclick="toggleFullscreen('accreditation')">
                </div>
            </div>

            <!-- Documents Section (Purple) -->
            <div class="requirements-section" id="documents">
                <div class="image-container">
                    <div class="zoom-controls">
                        <button class="zoom-btn zoom-in" onclick="zoomImage('documents', 'in')">+</button>
                        <button class="zoom-btn zoom-out" onclick="zoomImage('documents', 'out')">-</button>
                        <button class="zoom-btn zoom-reset" onclick="zoomImage('documents', 'reset')">Reset</button>
                    </div>
                    <img src="{{ asset('images/citizens-charter/documents-section.png') }}" alt="Documents Section" class="charter-image" id="documents-image" onclick="toggleFullscreen('documents')">
                </div>
            </div>

            <!-- Customer Assistance Section (Green) -->
            <div class="requirements-section" id="assistance">
                <div class="image-container">
                    <div class="zoom-controls">
                        <button class="zoom-btn zoom-in" onclick="zoomImage('assistance', 'in')">+</button>
                        <button class="zoom-btn zoom-out" onclick="zoomImage('assistance', 'out')">-</button>
                        <button class="zoom-btn zoom-reset" onclick="zoomImage('assistance', 'reset')">Reset</button>
                    </div>
                    <img src="{{ asset('images/citizens-charter/assistance-section.png') }}" alt="Customer Assistance Section" class="charter-image" id="assistance-image" onclick="toggleFullscreen('assistance')">
                </div>
            </div>
        </div>
    </main>

    <!-- Fullscreen Modal -->
    <div id="fullscreenModal" class="fullscreen-modal" onclick="closeFullscreen()">
        <div class="fullscreen-content" onclick="event.stopPropagation()">
            <button class="close-btn" onclick="closeFullscreen()">&times;</button>
            <div class="fullscreen-zoom-controls">
                <button class="zoom-btn zoom-in" onclick="zoomFullscreen('in')">+</button>
                <button class="zoom-btn zoom-out" onclick="zoomFullscreen('out')">-</button>
                <button class="zoom-btn zoom-reset" onclick="zoomFullscreen('reset')">Reset</button>
            </div>
            <img id="fullscreenImage" src="" alt="Fullscreen Image" class="fullscreen-image">
        </div>
    </div>

    <script>
        // Category navigation functionality
        document.addEventListener('DOMContentLoaded', function() {
            const navButtons = document.querySelectorAll('.nav-btn');
            const sections = document.querySelectorAll('.requirements-section');

            navButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const category = this.getAttribute('data-category');
                    
                    // Remove active class from all buttons and sections
                    navButtons.forEach(btn => btn.classList.remove('active'));
                    sections.forEach(section => section.classList.remove('active'));
                    
                    // Add active class to clicked button and corresponding section
                    this.classList.add('active');
                    document.getElementById(category).classList.add('active');
                });
            });
        });

        // Zoom functionality for images
        function zoomImage(category, action) {
            const image = document.getElementById(category + '-image');
            let currentZoom = parseFloat(image.style.transform.replace('scale(', '').replace(')', '')) || 1;
            
            switch(action) {
                case 'in':
                    currentZoom = Math.min(currentZoom * 1.2, 5);
                    break;
                case 'out':
                    currentZoom = Math.max(currentZoom / 1.2, 0.5);
                    break;
                case 'reset':
                    currentZoom = 1;
                    break;
            }
            
            image.style.transform = `scale(${currentZoom})`;
            image.style.transformOrigin = 'center center';
        }

        // Fullscreen functionality
        function toggleFullscreen(category) {
            const image = document.getElementById(category + '-image');
            const fullscreenImage = document.getElementById('fullscreenImage');
            const modal = document.getElementById('fullscreenModal');
            
            fullscreenImage.src = image.src;
            fullscreenImage.style.transform = 'scale(1)';
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        function closeFullscreen() {
            const modal = document.getElementById('fullscreenModal');
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        // Fullscreen zoom functionality
        function zoomFullscreen(action) {
            const image = document.getElementById('fullscreenImage');
            let currentZoom = parseFloat(image.style.transform.replace('scale(', '').replace(')', '')) || 1;
            
            switch(action) {
                case 'in':
                    currentZoom = Math.min(currentZoom * 1.2, 5);
                    break;
                case 'out':
                    currentZoom = Math.max(currentZoom / 1.2, 0.5);
                    break;
                case 'reset':
                    currentZoom = 1;
                    break;
            }
            
            image.style.transform = `scale(${currentZoom})`;
            image.style.transformOrigin = 'center center';
        }

        // Close modal with Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeFullscreen();
            }
        });

        // Mouse wheel zoom in fullscreen
        document.addEventListener('wheel', function(event) {
            const modal = document.getElementById('fullscreenModal');
            if (modal.style.display === 'flex') {
                event.preventDefault();
                const image = document.getElementById('fullscreenImage');
                let currentZoom = parseFloat(image.style.transform.replace('scale(', '').replace(')', '')) || 1;
                
                if (event.deltaY < 0) {
                    currentZoom = Math.min(currentZoom * 1.1, 5);
                } else {
                    currentZoom = Math.max(currentZoom / 1.1, 0.5);
                }
                
                image.style.transform = `scale(${currentZoom})`;
                image.style.transformOrigin = 'center center';
            }
        });
    </script>
</x-layout>
