const mainWrapper = document.getElementById("main-wrapper");
const headerToggle = document.getElementById("headerCollapse");
const sidebarClose = document.getElementById("sidebarCollapse");

function closeMobileSidebar() {
  mainWrapper.classList.remove("show-sidebar");
  headerToggle.setAttribute("aria-expanded", "false");
}

function setSidebarForViewport() {
  if (window.innerWidth < 1200) {
    mainWrapper.dataset.sidebartype = "mini-sidebar";
    mainWrapper.classList.add("mini-sidebar");
    closeMobileSidebar();
    return;
  }

  mainWrapper.dataset.sidebartype = "full";
  mainWrapper.classList.remove("mini-sidebar", "show-sidebar");
  headerToggle.setAttribute("aria-expanded", "false");
}

setSidebarForViewport();
window.addEventListener("resize", setSidebarForViewport);

headerToggle.addEventListener("click", function () {
  const isOpen = mainWrapper.classList.toggle("show-sidebar");
  headerToggle.setAttribute("aria-expanded", String(isOpen));
});

sidebarClose.addEventListener("click", closeMobileSidebar);
