<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Login & Register')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Your existing CSS remains the same */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            width: 100%;
            max-width: 800px;
            display: flex;
            min-height: 500px;
        }

        .form-container {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            transition: all 0.6s ease-in-out;
        }

        .image-container {
            flex: 1;
            background: url('https://images.unsplash.com/photo-1557804506-669a67965ba0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80') center/cover no-repeat;
            position: relative;
        }

        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.8) 0%, rgba(118, 75, 162, 0.8) 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            padding: 30px;
            text-align: center;
        }

        .image-overlay h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .image-overlay p {
            font-size: 1.2rem;
            max-width: 300px;
            line-height: 1.6;
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 30px;
            color: #333;
            text-align: center;
        }

        .input-group {
            position: relative;
            margin-bottom: 25px;
        }

        .input-group input {
            width: 100%;
            padding: 15px 15px 15px 45px;
            border: 2px solid #e0e0e0;
            border-radius: 50px;
            font-size: 1rem;
            background: #f9f9f9;
            transition: all 0.3s;
        }

        .input-group input:focus {
            outline: none;
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2);
        }

        .input-group i {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            font-size: 1.1rem;
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }

        .remember-forgot label {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .remember-forgot input {
            margin-right: 8px;
        }

        .remember-forgot a {
            color: #667eea;
            text-decoration: none;
            transition: color 0.3s;
        }

        .remember-forgot a:hover {
            color: #764ba2;
            text-decoration: underline;
        }

        .btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 50px;
            padding: 15px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            margin-bottom: 20px;
            width: 100%;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }

        .btn:active {
            transform: translateY(1px);
        }

        .toggle-container {
            text-align: center;
            margin-top: 20px;
        }

        .toggle-container a {
            color: #667eea;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s;
        }

        .toggle-container a:hover {
            color: #764ba2;
            text-decoration: underline;
        }

        .hidden {
            display: none;
        }

        .text-danger {
            color: #e74c3c;
            font-size: 0.875rem;
            margin-top: 5px;
            margin-left: 15px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                max-width: 450px;
            }

            .image-container {
                min-height: 200px;
            }

            .image-overlay h2 {
                font-size: 1.8rem;
            }

            .image-overlay p {
                font-size: 1rem;
            }
        }

        /* Loading state */
        .btn.loading {
            opacity: 0.7;
            pointer-events: none;
        }
    </style>
</head>

<body>
    @yield('content')

    <script>
        // Get form elements
        const loginForm = document.getElementById('login-form');
        const registerForm = document.getElementById('register-form');
        const showRegisterLink = document.getElementById('show-register');
        const showLoginLink = document.getElementById('show-login');
        const imageOverlay = document.querySelector('.image-overlay');

        // Function to show login form
        function showLoginForm() {
            if (loginForm && registerForm) {
                loginForm.classList.remove('hidden');
                registerForm.classList.add('hidden');
            }
            if (imageOverlay) {
                imageOverlay.innerHTML = `
                <h2>Hello, Friend!</h2>
                <p>Enter your personal details and start your journey with us today</p>
            `;
            }
            document.title = 'Login - ACCL';
            // Update URL without reload
            window.history.pushState({}, '', '{{ route('login') }}');
        }

        // Function to show register form
        function showRegisterForm() {
            if (loginForm && registerForm) {
                loginForm.classList.add('hidden');
                registerForm.classList.remove('hidden');
            }
            if (imageOverlay) {
                imageOverlay.innerHTML = `
                <h2>Welcome Back!</h2>
                <p>To keep connected with us please login with your personal info</p>
            `;
            }
            document.title = 'Register - ACCL';
            // Update URL without reload
            window.history.pushState({}, '', '{{ route('register') }}');
        }

        // Toggle to register form
        if (showRegisterLink) {
            showRegisterLink.addEventListener('click', (e) => {
                e.preventDefault();
                showRegisterForm();
            });
        }

        // Toggle to login form
        if (showLoginLink) {
            showLoginLink.addEventListener('click', (e) => {
                e.preventDefault();
                showLoginForm();
            });
        }

        // Form submission handlers
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', (e) => {
                // Add loading state
                const submitBtn = form.querySelector('.btn');
                if (submitBtn) {
                    const originalText = submitBtn.textContent;
                    submitBtn.textContent = 'Please wait...';
                    submitBtn.classList.add('loading');

                    // Re-enable button after 5 seconds in case submission fails
                    setTimeout(() => {
                        submitBtn.textContent = originalText;
                        submitBtn.classList.remove('loading');
                    }, 5000);
                }
            });
        });

        // Check initial state based on current URL
        document.addEventListener('DOMContentLoaded', function() {
            const currentPath = window.location.pathname;
            const isRegisterPage = currentPath === '/register' || currentPath === '{{ route('register') }}'.replace(
                /^https?:\/\/[^\/]+/, '');

            console.log('Current path:', currentPath);
            console.log('Is register page:', isRegisterPage);

            if (isRegisterPage) {
                // Show register form if we're on the register URL
                showRegisterForm();
            } else {
                // Default to login form
                showLoginForm();
            }
        });

        // Handle browser back/forward buttons
        window.addEventListener('popstate', function() {
            const currentPath = window.location.pathname;
            const isRegisterPage = currentPath === '/register' || currentPath === '{{ route('register') }}'.replace(
                /^https?:\/\/[^\/]+/, '');

            if (isRegisterPage) {
                showRegisterForm();
            } else {
                showLoginForm();
            }
        });
    </script>
</body>

</html>
