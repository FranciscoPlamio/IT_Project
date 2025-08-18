import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('emailAuthForm');
  if (!form) return;
  form.addEventListener('submit', (e) => {
    e.preventDefault();
    const url = form.getAttribute('data-redirect-url') || '/';
    window.location.href = url;
  });
});
