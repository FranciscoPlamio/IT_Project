document.addEventListener("DOMContentLoaded", () => {
  const logoutLink = document.querySelector(".bottom-links .menu-item");
  const modal = document.getElementById("logout-modal");
  const confirmBtn = document.getElementById("confirm-logout");
  const cancelBtn = document.getElementById("cancel-logout");
  const logoutForm = document.getElementById("logout-form");
  const refreshBtn = document.getElementById("refresh-btn");

  // Show modal when logout is clicked
  logoutLink.addEventListener("click", (e) => {
    e.preventDefault();
    modal.style.display = "flex";
  });

  // Confirm logout -> submit hidden form
  confirmBtn.addEventListener("click", (e) => {
    e.preventDefault();
    logoutForm.submit(); // Laravel handles redirect/session clear
  });

  // Cancel logout -> close modal
  cancelBtn.addEventListener("click", () => {
    modal.style.display = "none";
  });

  // Close modal when clicking outside
  modal.addEventListener("click", (e) => {
    if (e.target === modal) {
      modal.style.display = "none";
    }
  });

  // Add smooth hover effects to pie cards
  const pieCards = document.querySelectorAll(".pie-card");
  pieCards.forEach(card => {
    card.addEventListener("mouseenter", () => {
      card.style.transform = "translateY(-3px)";
    });
    
    card.addEventListener("mouseleave", () => {
      card.style.transform = "translateY(0)";
    });
  });

  // Table row interactions
  const tableRows = document.querySelectorAll(".table-row");
  tableRows.forEach(row => {
    row.addEventListener("mouseenter", () => {
      row.style.transform = "translateY(-1px)";
      row.style.boxShadow = "0 2px 8px rgba(0,0,0,0.05)";
    });
    
    row.addEventListener("mouseleave", () => {
      row.style.transform = "translateY(0)";
      row.style.boxShadow = "none";
    });

    // Add click handler for entire row
    row.addEventListener("click", (e) => {
      // Don't trigger if clicking on action button
      if (!e.target.closest('.action-btn')) {
        const actionBtn = row.querySelector('.action-btn');
        if (actionBtn) {
          actionBtn.click();
        }
      }
    });
  });

  // Refresh button functionality
  if (refreshBtn) {
    refreshBtn.addEventListener("click", async (e) => {
      e.preventDefault();
      
      const originalContent = refreshBtn.innerHTML;
      refreshBtn.innerHTML = `
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="animate-spin">
          <path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"></path>
          <path d="M21 3v5h-5"></path>
          <path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"></path>
          <path d="M3 21v-5h5"></path>
        </svg>
        Refreshing...
      `;
      refreshBtn.disabled = true;

      try {
        // Simulate refresh delay
        await new Promise(resolve => setTimeout(resolve, 1000));
        
        // Reload the page to get fresh data
        window.location.reload();
      } catch (error) {
        console.error('Refresh failed:', error);
        refreshBtn.innerHTML = originalContent;
        refreshBtn.disabled = false;
      }
    });
  }

  // Add loading animation CSS
  const style = document.createElement('style');
  style.textContent = `
    .animate-spin {
      animation: spin 1s linear infinite;
    }
    
    @keyframes spin {
      from { transform: rotate(0deg); }
      to { transform: rotate(360deg); }
    }
  `;
  document.head.appendChild(style);

  // Add keyboard navigation for table
  tableRows.forEach((row, index) => {
    row.addEventListener('keydown', (e) => {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        const actionBtn = row.querySelector('.action-btn');
        if (actionBtn) {
          actionBtn.click();
        }
      }
    });
    
    // Make rows focusable
    row.setAttribute('tabindex', '0');
  });

  // Add smooth scrolling for better UX
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        target.scrollIntoView({
          behavior: 'smooth',
          block: 'start'
        });
      }
    });
  });
});
