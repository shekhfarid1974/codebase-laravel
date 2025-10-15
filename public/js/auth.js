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

// Form Toggle
const loginForm = document.getElementById("loginForm");
const registerForm = document.getElementById("registerForm");
const showRegister = document.getElementById("showRegister");
const showLogin = document.getElementById("showLogin");

showRegister.addEventListener("click", (e) => {
    e.preventDefault();
    loginForm.classList.add("hidden");
    registerForm.classList.remove("hidden");
});

showLogin.addEventListener("click", (e) => {
    e.preventDefault();
    registerForm.classList.add("hidden");
    loginForm.classList.remove("hidden");
});

// Form Submission
document.getElementById("login").addEventListener("submit", (e) => {
    e.preventDefault();
    // In a real app, you would handle authentication here
    alert("Login functionality would be implemented here");
    // Redirect to dashboard
    // window.location.href = 'dashboard.html';
});

document.getElementById("register").addEventListener("submit", (e) => {
    e.preventDefault();
    // In a real app, you would handle registration here
    const password = document.getElementById("registerPassword").value;
    const confirmPassword = document.getElementById(
        "registerConfirmPassword"
    ).value;

    if (password !== confirmPassword) {
        alert("Passwords do not match!");
        return;
    }

    alert("Registration successful! You can now login.");
    // Switch to login form
    registerForm.classList.add("hidden");
    loginForm.classList.remove("hidden");
});
