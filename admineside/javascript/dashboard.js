document.addEventListener("DOMContentLoaded", () => {
  const scrollables = document.querySelectorAll(".notifications, .cert-log");

  scrollables.forEach(el => {
    el.style.overflowY = "scroll"; // force visible
    el.style.scrollbarGutter = "stable"; // keeps track space fixed

    const observer = new MutationObserver(() => {
      el.style.overflowY = "scroll"; // re-apply
    });

    observer.observe(el, { childList: true, subtree: true });
  });
});