```php
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AI-Powered Library</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f7fb;
            color: #222;
        }

        header {
            background: #1e3a8a;
            color: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            font-size: 25px;
        }

        .container {
            width: 90%;
            max-width: 1100px;
            margin: 35px auto;
        }

        .hero {
            background: white;
            padding: 35px;
            text-align: center;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, .08);
            margin-bottom: 30px;
        }

        .hero h2 {
            color: #1e3a8a;
            font-size: 32px;
            margin-bottom: 12px;
        }

        .hero p {
            color: #666;
            font-size: 16px;
        }

        .login-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, .08);
        }

        .admin-card {
            border-top: 6px solid #7c3aed;
        }

        .user-card {
            border-top: 6px solid #2563eb;
        }

        .register-card {
            border-top: 6px solid #10b981;
            margin-top: 25px;
        }

        .card h2 {
            margin-bottom: 15px;
        }

        .card p {
            color: #666;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .admin-title {
            color: #7c3aed;
        }

        .user-title {
            color: #2563eb;
        }

        .register-title {
            color: #059669;
        }

        .info {
            background: #f3f4f6;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 15px;
        }

        input:focus {
            outline: none;
            border-color: #2563eb;
        }

        button {
            width: 100%;
            border: none;
            padding: 12px;
            border-radius: 8px;
            color: white;
            font-size: 15px;
            cursor: pointer;
        }

        .admin-btn {
            background: #7c3aed;
        }

        .admin-btn:hover {
            background: #6d28d9;
        }

        .user-btn {
            background: #2563eb;
        }

        .user-btn:hover {
            background: #1d4ed8;
        }

        .register-btn {
            background: #10b981;
        }

        .register-btn:hover {
            background: #059669;
        }

        .error {
            background: #fee2e2;
            color: #b91c1c;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .success {
            background: #d1fae5;
            color: #047857;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 30px;
        }

        .feature {
            background: white;
            padding: 25px;
            text-align: center;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, .06);
        }

        .feature-icon {
            font-size: 35px;
            margin-bottom: 10px;
        }

        .feature h3 {
            margin-bottom: 8px;
            color: #1e3a8a;
        }

        .feature p {
            font-size: 14px;
            color: #666;
        }

        @media (max-width: 750px) {

            .login-container {
                grid-template-columns: 1fr;
            }

            .features {
                grid-template-columns: 1fr;
            }

            header {
                padding: 15px 20px;
                flex-direction: column;
                gap: 10px;
            }

            .hero h2 {
                font-size: 25px;
            }
        }
    </style>
</head>

<body>

<header>
    <h1>📚 AI-Powered Library</h1>
    <span>Laravel + AI</span>
</header>

<div class="container">

    <!-- HERO -->

    <div class="hero">

        <h2>Welcome to AI Library 🤖</h2>

        <p>
            Smart Library Management System powered by Laravel and Generative AI.
        </p>

    </div>


    <!-- ERRORS -->

    @if($errors->any())

        <div class="error">
            {{ $errors->first() }}
        </div>

    @endif


    <!-- LOGIN -->

    <div class="login-container">

        <!-- ADMIN LOGIN -->

        <div class="card admin-card">

            <h2 class="admin-title">
                👑 Admin Login
            </h2>

            <p>
                Login as administrator to manage books,
                users, categories and library statistics.
            </p>

            <div class="info">
                <strong>Admin Account</strong><br>
                Email: admin@library.test<br>
                Password: password123
            </div>

            <form method="POST" action="{{ url('/login') }}">

                @csrf

                <!-- Important: account type -->

                <input
                    type="hidden"
                    name="role"
                    value="admin"
                >

                <input
                    type="email"
                    name="email"
                    placeholder="Admin Email"
                    value="{{ old('email') }}"
                    required
                >

                <input
                    type="password"
                    name="password"
                    placeholder="Admin Password"
                    required
                >

                <button
                    type="submit"
                    class="admin-btn"
                >
                    Login as Admin
                </button>

            </form>

        </div>


        <!-- USER LOGIN -->

        <div class="card user-card">

            <h2 class="user-title">
                👤 User Login
            </h2>

            <p>
                Login as a normal library user to browse books,
                get recommendations and use the AI assistant.
            </p>

            <div class="info">
                <strong>User Account</strong><br>
                Enter your registered email and password.
            </div>

            <form method="POST" action="{{ url('/login') }}">

                @csrf

                <!-- Important: account type -->

                <input
                    type="hidden"
                    name="role"
                    value="user"
                >

                <input
                    type="email"
                    name="email"
                    placeholder="User Email"
                    value="{{ old('email') }}"
                    required
                >

                <input
                    type="password"
                    name="password"
                    placeholder="User Password"
                    required
                >

                <button
                    type="submit"
                    class="user-btn"
                >
                    Login as User
                </button>

            </form>

        </div>

    </div>


    <!-- REGISTER -->

    <div class="card register-card">

        <h2 class="register-title">
            📝 Create New User Account
        </h2>

        <p>
            Don't have an account?
            Create a new library user account.
        </p>

        <form method="POST" action="{{ url('/register') }}">

            @csrf

            <input
                type="text"
                name="name"
                placeholder="Full Name"
                value="{{ old('name') }}"
                required
            >

            <input
                type="email"
                name="email"
                placeholder="Email"
                value="{{ old('email') }}"
                required
            >

            <input
                type="password"
                name="password"
                placeholder="Password"
                required
            >

            <input
                type="password"
                name="password_confirmation"
                placeholder="Confirm Password"
                required
            >

            <button
                type="submit"
                class="register-btn"
            >
                Create User Account
            </button>

        </form>

    </div>


    <!-- FEATURES -->

    <div class="features">

        <div class="feature">

            <div class="feature-icon">📚</div>

            <h3>Book Management</h3>

            <p>
                Browse, search and manage library books.
            </p>

        </div>


        <div class="feature">

            <div class="feature-icon">🎯</div>

            <h3>Recommendations</h3>

            <p>
                Get personalized book recommendations.
            </p>

        </div>


        <div class="feature">

            <div class="feature-icon">🤖</div>

            <h3>AI Assistant</h3>

            <p>
                Ask AI about books and learning topics.
            </p>

        </div>


        <div class="feature">

            <div class="feature-icon">⚖️</div>

            <h3>Compare Books</h3>

            <p>
                Compare two books using AI.
            </p>

        </div>


        <div class="feature">

            <div class="feature-icon">👥</div>

            <h3>User Management</h3>

            <p>
                Admins can manage library users.
            </p>

        </div>


        <div class="feature">

            <div class="feature-icon">📊</div>

            <h3>Admin Dashboard</h3>

            <p>
                Manage the library and view statistics.
            </p>

        </div>

    </div>

</div>

</body>
</html>
```
