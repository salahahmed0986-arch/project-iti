```php
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>User Dashboard - AI Library</title>

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
            font-size: 26px;
        }

        .container {
            width: 90%;
            max-width: 1100px;
            margin: 35px auto;
        }

        .welcome {
            background: white;
            padding: 30px;
            border-radius: 12px;
            margin-bottom: 30px;

            box-shadow: 0 4px 15px rgba(0,0,0,.08);
        }

        .welcome h2 {
            color: #1e3a8a;
            margin-bottom: 10px;
        }

        .role {
            color: #666;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;

            box-shadow: 0 4px 15px rgba(0,0,0,.08);
        }

        .card h3 {
            color: #1e3a8a;
            margin-bottom: 12px;
        }

        .card p {
            color: #555;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;

            background: #1e3a8a;
            color: white;

            text-decoration: none;

            padding: 10px 18px;

            border-radius: 7px;
        }

        .btn:hover {
            background: #162d6b;
        }

        .logout {
            background: white;
            color: #1e3a8a;
            border: none;
            padding: 10px 18px;
            border-radius: 7px;
            cursor: pointer;
        }

        .logout:hover {
            background: #eee;
        }

        @media (max-width: 768px) {

            .cards {
                grid-template-columns: 1fr;
            }

            header {
                padding: 15px 20px;
                flex-direction: column;
                gap: 15px;
            }
        }
    </style>

</head>

<body>


<header>

    <h1>📚 AI-Powered Library</h1>

    <form method="POST" action="/logout">

        @csrf

        <button class="logout">
            Logout
        </button>

    </form>

</header>


<div class="container">


    <!-- WELCOME -->

    <div class="welcome">

        <h2>
            Welcome, {{ auth()->user()->name }} 👋
        </h2>

        <p class="role">

            Account Type:

            <strong>
                {{ auth()->user()->role }}
            </strong>

        </p>

    </div>


    <!-- USER FEATURES -->

    <div class="cards">


        <!-- BOOKS -->

        <div class="card">

            <h3>📚 Browse Books</h3>

            <p>
                Browse all available books,
                search by title or author,
                and view book details.
            </p>

            <a class="btn" href="/books">
                View Books
            </a>

        </div>


        <!-- RECOMMENDATIONS -->

        <div class="card">

            <h3>⭐ My Recommendations</h3>

            <p>
                Get personalized book recommendations
                based on your interests, skills and learning goals.
            </p>

            <a class="btn" href="/recommendations">
                View Recommendations
            </a>

        </div>


        <!-- AI -->

        <div class="card">

            <h3>🤖 AI Assistant</h3>

            <p>
                Ask the AI assistant about books,
                categories and learning topics.
            </p>

            <a class="btn" href="/chat">
                Open AI Chat
            </a>

        </div>


        <!-- COMPARE -->

        <div class="card">

            <h3>⚖️ Compare Books</h3>

            <p>
                Compare two books and ask AI
                which one is better for you.
            </p>

            <a class="btn" href="/book-comparison">
                Compare Books
            </a>

        </div>


        <!-- PROFILE -->

        <div class="card">

            <h3>👤 My Profile</h3>

            <p>
                Update your interests,
                favorite topics, skills
                and learning goals.
            </p>

            <a class="btn" href="/profile">
                Edit Profile
            </a>

        </div>


        <!-- ADMIN -->

        @if(auth()->user()->isAdmin())

            <div class="card">

                <h3>👑 Admin Dashboard</h3>

                <p>
                    You are an administrator.
                    You can manage books,
                    users and categories.
                </p>

                <a class="btn" href="/admin/dashboard">
                    Open Admin Dashboard
                </a>

            </div>

        @endif


    </div>

</div>

</body>

</html>
```
