<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ACCL</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(45deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            display: flex;
            width: 900px;
            height: 550px;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }

        .form-container {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: white;
        }

        .form-container h1 {
            color: #333;
            margin-bottom: 30px;
            font-size: 28px;
            text-align: center;
        }

        .input-group {
            position: relative;
            margin-bottom: 20px;
        }

        .input-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
        }

        .input-group input {
            width: 100%;
            padding: 12px 12px 12px 45px;
            border: 2px solid #e1e1e1;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        .input-group input:focus {
            outline: none;
            border-color: #667eea;
        }

        .remember-forgot {
            margin: 15px 0;
            font-size: 14px;
        }

        .remember-forgot input {
            margin-right: 8px;
        }

        .btn {
            width: 100%;
            padding: 12px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .toggle-container {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
        }

        .toggle-container a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
        }

        .toggle-container a:hover {
            text-decoration: underline;
        }

        .image-container {
            flex: 1;
            background: linear-gradient(45deg, #667eea, #764ba2);
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .image-overlay {
            text-align: center;
            color: white;
            padding: 40px;
        }

        .image-overlay h2 {
            font-size: 24px;
            margin-bottom: 15px;
        }

        .image-overlay p {
            font-size: 16px;
            opacity: 0.9;
        }

        .text-danger {
            color: #dc3545;
            font-size: 14px;
            margin-top: 5px;
        }

        .hidden {
            display: none;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                height: auto;
                width: 90%;
            }
            
            .image-container {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Login Form -->
        <div class="form-container">
            <h1>Welcome Back</h1>

            <!-- Display Success Messages -->
            @if (session('status'))
                <div
                    style="background: #d4edda; color: #155724; padding: 12px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Display Validation Errors -->
            @if ($errors->any())
                <div
                    style="background: #f8d7da; color: #721c24; padding: 12px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #f5c6cb;">
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="login" placeholder="Username or Email" required value="{{ old('login') }}">
                </div>
                @error('login')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <div class="remember-forgot">
                    <label><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember
                        me</label>
                </div>

                <button type="submit" class="btn">Sign In</button>

                <!-- Remove registration link since only admin can create users -->
                <div class="toggle-container">
                    <p>Only authorized users can access this system</p>
                </div>
            </form>
        </div>

        <!-- Image Section -->
        <div class="image-container">
            <div class="image-overlay">
                <h2>Welcome to ACCL!</h2>
                <p>Only authorized users can access this system</p>
            </div>
        </div>
    </div>
</body>
</html>