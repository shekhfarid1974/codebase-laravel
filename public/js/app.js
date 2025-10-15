// Toggle Sidebar
const toggleSidebar = document.getElementById("toggleSidebar");
const collapseSidebar = document.getElementById("collapseSidebar");
const dashboardContainer = document.querySelector(".dashboard-container");
const navTexts = document.querySelectorAll(".nav-text");

toggleSidebar.addEventListener("click", () => {
    dashboardContainer.classList.toggle("sidebar-expanded");
});

collapseSidebar.addEventListener("click", () => {
    dashboardContainer.classList.toggle("sidebar-expanded");
});

// Theme Toggle
const themeToggle = document.getElementById("themeToggle");
const themeIcon = themeToggle.querySelector("i");

themeToggle.addEventListener("click", () => {
    const currentTheme = document.body.getAttribute("data-theme");
    const newTheme = currentTheme === "light" ? "dark" : "light";

    document.body.setAttribute("data-theme", newTheme);
    themeIcon.className = newTheme === "light" ? "ri-sun-line" : "ri-moon-line";

    // Save theme preference
    localStorage.setItem("theme", newTheme);
});

// Check for saved theme preference
const savedTheme = localStorage.getItem("theme");
if (savedTheme) {
    document.body.setAttribute("data-theme", savedTheme);
    themeIcon.className =
        savedTheme === "light" ? "ri-sun-line" : "ri-moon-line";
}

// Active navigation item
const navItems = document.querySelectorAll(".nav-item");

navItems.forEach((item) => {
    item.addEventListener("click", () => {
        // Toggle dropdown if item has dropdown
        if (item.classList.contains("has-dropdown")) {
            const dropdown = item.nextElementSibling;
            dropdown.classList.toggle("open");
            return;
        }

        // Set active state for regular items
        if (!item.closest(".nav-dropdown")) {
            navItems.forEach((nav) => nav.classList.remove("active"));
        }
        item.classList.add("active");
    });
});

// Profile dropdown
const profileDropdown = document.getElementById("profileDropdown");
const profileMenu = document.getElementById("profileMenu");

profileDropdown.addEventListener("click", (e) => {
    e.stopPropagation();
    profileMenu.classList.toggle("show");
});

// Close dropdown when clicking outside
document.addEventListener("click", () => {
    profileMenu.classList.remove("show");
});

// KPI Card click events
const kpiCards = document.querySelectorAll(".kpi-card");

kpiCards.forEach((card) => {
    card.addEventListener("click", () => {
        const chartType = card.getAttribute("data-chart");
        alert(`Opening detailed analytics for ${chartType}`);
        // In a real app, this would navigate to the detailed analytics page
    });
});

// Initialize Charts
const performanceCtx = document
    .getElementById("performanceChart")
    .getContext("2d");
const performanceChart = new Chart(performanceCtx, {
    type: "line",
    data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
        datasets: [
            {
                label: "Revenue",
                data: [12000, 19000, 15000, 25000, 22000, 30000, 28000],
                borderColor: "#3B82F6",
                backgroundColor: "rgba(59, 130, 246, 0.1)",
                borderWidth: 2,
                tension: 0.4,
                fill: true,
            },
            {
                label: "Users",
                data: [500, 1200, 800, 1800, 1500, 2000, 2400],
                borderColor: "#8B5CF6",
                backgroundColor: "rgba(139, 92, 246, 0.1)",
                borderWidth: 2,
                tension: 0.4,
                fill: true,
            },
        ],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: "top",
            },
        },
        scales: {
            y: {
                beginAtZero: true,
            },
        },
    },
});

const conversionCtx = document
    .getElementById("conversionChart")
    .getContext("2d");
const conversionChart = new Chart(conversionCtx, {
    type: "doughnut",
    data: {
        labels: ["Direct", "Social", "Referral", "Organic"],
        datasets: [
            {
                data: [35, 25, 20, 20],
                backgroundColor: ["#3B82F6", "#8B5CF6", "#0D9488", "#06B6D4"],
                borderWidth: 0,
            },
        ],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: "bottom",
            },
        },
    },
});

