const body = document.querySelector("body");
const modeToggle = body.querySelector(".mode-toggle");
const sidebar = document.querySelector("nav");
const sidebarToggle = body.querySelector(".sidebar-toggle");

// Toggle dark mode based on the value stored in localStorage
let getMode = localStorage.getItem("mode");
if (getMode && getMode === "dark") {
  body.classList.add("dark");
}

// Toggle sidebar status based on the value stored in localStorage
let getStatus = localStorage.getItem("status");
if (getStatus && getStatus === "close") {
  sidebar.classList.add("close");
}

// Event listener for dark mode toggle
modeToggle.addEventListener("click", () => {
  body.classList.toggle("dark");
  if (body.classList.contains("dark")) {
    localStorage.setItem("mode", "dark");
  } else {
    localStorage.setItem("mode", "light");
  }
});

// Event listener for sidebar toggle
sidebarToggle.addEventListener("click", () => {
  sidebar.classList.toggle("close");
  if (sidebar.classList.contains("close")) {
    localStorage.setItem("status", "close");
  } else {
    localStorage.setItem("status", "open");
  }
});
