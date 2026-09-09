```php
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard - AI Library</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f7fb;
        }

        header {
            background: #1e3a8a;
            color: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 30px auto;
        }

        .welcome {
            background: white;
            padding: 25px;
            border-radius: 12px;
            margin-bottom: 25px;
            box-shadow: 0 4px 15px rgba(0,0,0,.08);
        }

        .welcome h2 {
            color: #1e3a8a;
            margin-bottom: 10px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat {
            background: white;
            padding: 25px;
            text-align: center;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,.08);
        }

        .stat h3 {
            color: #1e3a8a;
            margin-bottom: 10px;
        }

        .stat p {
            font-size: 32px;
            font-weight: bold;
        }

        .actions {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .action {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,.08);
        }

        .action h3 {
            color: #1e3a8a;
            margin-bottom: 10px;
        }

        .action p {
            color: #555;
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

        .category-list,
        .low-stock {
            background: white;
            margin-top: 30px;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,.08);
        }

        .category-list h2,
        .low-stock h2 {
            color: #1e3a8a;
            margin-bottom: 20px;
        }

        .item {
            padding: 12px;
            border-bottom: 1px solid #eee;
        }

        .back {
            margin-top: 30px;
            display: inline-block;
        }

        @media (max-width: 768px) {
            .stats,
            .actions {
                grid-template-columns: 1fr;
            }

            header {
                padding: 15px 20px;
            }
        }
    </style>
</head>

<body>

<header>
    <h1>👑 AI Library - Admin</h1>

    <a
        href="/dashboard"
        style="color:white;text-decoration:none;"
    >
        ← Main Dashboard
    </a>
</header>


<div class="container">

    <div class="welcome">

        <h2>
            Welcome Admin, <?php echo e(auth()->user()->name); ?> 👋
        </h2>

        <p>
            You have full administrative access to the library system.
        </p>

    </div>


    <!-- STATISTICS -->

    <div class="stats">

        <div class="stat">

            <h3>📚 Total Books</h3>

            <p>
                <?php echo e($booksCount); ?>

            </p>

        </div>


        <div class="stat">

            <h3>👥 Total Users</h3>

            <p>
                <?php echo e($usersCount); ?>

            </p>

        </div>


        <div class="stat">

            <h3>📂 Categories</h3>

            <p>
                <?php echo e($categoriesCount); ?>

            </p>

        </div>

    </div>


    <!-- MANAGEMENT -->

    <div class="actions">

        <div class="action">

            <h3>📚 Manage Books</h3>

            <p>
                Add, edit, delete and view books.
            </p>

            <a class="btn" href="/books">
                Manage Books
            </a>

        </div>


        <div class="action">

            <h3>👥 Manage Users</h3>

            <p>
                Add, edit and delete system users.
            </p>

            <a class="btn" href="/users">
                Manage Users
            </a>

        </div>


        <div class="action">

            <h3>📂 Manage Categories</h3>

            <p>
                Create, edit and delete book categories.
            </p>

            <a class="btn" href="/categories">
                Manage Categories
            </a>

        </div>


        <div class="action">

            <h3>🤖 AI Assistant</h3>

            <p>
                Ask AI about library statistics and books.
            </p>

            <a class="btn" href="/chat">
                Open AI Chat
            </a>

        </div>


        <div class="action">

            <h3>📊 Recommendations</h3>

            <p>
                View the personalized recommendation system.
            </p>

            <a class="btn" href="/recommendations">
                Recommendations
            </a>

        </div>


        <div class="action">

            <h3>⚖️ Compare Books</h3>

            <p>
                Compare two books using AI.
            </p>

            <a class="btn" href="/book-comparison">
                Compare Books
            </a>

        </div>

    </div>


    <!-- BOOKS BY CATEGORY -->

    <div class="category-list">

        <h2>📂 Books By Category</h2>

        <?php $__empty_1 = true; $__currentLoopData = $booksByCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

            <div class="item">

                <strong>
                    <?php echo e($category->name); ?>

                </strong>

                :

                <?php echo e($category->books_count); ?>

                books

            </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

            <p>No categories found.</p>

        <?php endif; ?>

    </div>


    <!-- LOW STOCK -->

    <div class="low-stock">

        <h2>⚠️ Low Stock Books</h2>

        <?php $__empty_1 = true; $__currentLoopData = $lowStockBooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

            <div class="item">

                <strong>
                    <?php echo e($book->title); ?>

                </strong>

                —

                Available Copies:
                <?php echo e($book->available_copies); ?>


                —

                <?php echo e($book->category->name ?? 'No Category'); ?>


            </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

            <p>
                ✅ No books have low availability.
            </p>

        <?php endif; ?>

    </div>


    <a class="btn back" href="/dashboard">
        ← Back to Dashboard
    </a>

</div>

</body>

</html>
```
<?php /**PATH C:\laragon\www\library-ai-system\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>