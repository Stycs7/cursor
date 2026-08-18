(function () {
  const header = document.querySelector(".site-header");
  const toggle = document.querySelector(".menu-toggle");
  const body = document.body;

  if (header) {
    const onScroll = () => header.classList.toggle("is-scrolled", window.scrollY > 12);
    onScroll();
    window.addEventListener("scroll", onScroll, { passive: true });
  }

  if (toggle) {
    toggle.addEventListener("click", () => {
      const open = body.classList.toggle("nav-open");
      toggle.setAttribute("aria-expanded", open ? "true" : "false");
    });
  }

  document.querySelectorAll(".filter-btn").forEach((btn) => {
    btn.addEventListener("click", () => {
      document.querySelectorAll(".filter-btn").forEach((b) => b.classList.remove("is-active"));
      btn.classList.add("is-active");
      const group = btn.dataset.filter || "all";
      document.querySelectorAll("[data-group]").forEach((card) => {
        card.style.display = group === "all" || card.dataset.group === group ? "" : "none";
      });
    });
  });

  const form = document.querySelector(".js-enquiry");
  if (form) {
    form.addEventListener("submit", (event) => {
      if (form.dataset.ajax === "static") {
        event.preventDefault();
        form.classList.add("is-sent");
      }
    });
  }
})();
