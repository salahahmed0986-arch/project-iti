<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between h-16">

            <!-- Logo -->

            <div class="flex items-center">

                <a href="/dashboard"
                   class="text-xl font-bold text-blue-600">
                    📚 AI Library
                </a>

            </div>


            <!-- Desktop Navigation -->

            <div class="hidden sm:flex items-center space-x-6">

                <a href="/dashboard"
                   class="text-gray-700 hover:text-blue-600">
                    🏠 Dashboard
                </a>

                <a href="/books"
                   class="text-gray-700 hover:text-blue-600">
                    📚 Books
                </a>

                <a href="/recommendations"
                   class="text-gray-700 hover:text-blue-600">
                    🎯 Recommendations
                </a>

                <a href="/book-comparison"
                   class="text-gray-700 hover:text-blue-600">
                    ⚖️ Compare Books
                </a>

                <a href="/chat"
                   class="text-gray-700 hover:text-blue-600">
                    🤖 AI Chat
                </a>


                <?php if(auth()->user()->role === 'admin'): ?>

                    <a href="/categories"
                       class="text-gray-700 hover:text-blue-600">
                        🏷️ Categories
                    </a>

                    <a href="/users"
                       class="text-gray-700 hover:text-blue-600">
                        👥 Users
                    </a>

                    <a href="/admin/dashboard"
                       class="text-gray-700 hover:text-blue-600">
                        📊 Admin
                    </a>

                <?php endif; ?>


                <!-- User Menu -->

                <div class="relative">

                    <button
                        @click="open = ! open"
                        class="flex items-center text-gray-700 hover:text-blue-600"
                    >

                        👤 <?php echo e(auth()->user()->name); ?>


                        <svg
                            class="ml-2 h-4 w-4"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"
                            />
                        </svg>

                    </button>


                    <div
                        x-show="open"
                        @click.away="open = false"
                        class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-50"
                    >

                        <a
                            href="/profile"
                            class="block px-4 py-2 text-gray-700 hover:bg-gray-100"
                        >
                            ⚙️ Profile
                        </a>


                        <form method="POST" action="/logout">

                            <?php echo csrf_field(); ?>

                            <button
                                type="submit"
                                class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100"
                            >
                                🚪 Logout
                            </button>

                        </form>

                    </div>

                </div>

            </div>


            <!-- Mobile Button -->

            <div class="sm:hidden flex items-center">

                <button
                    @click="open = ! open"
                    class="text-gray-600"
                >
                    ☰
                </button>

            </div>

        </div>

    </div>


    <!-- Mobile Navigation -->

    <div
        x-show="open"
        class="sm:hidden border-t"
    >

        <div class="px-4 py-4 space-y-2">

            <a
                href="/dashboard"
                class="block py-2 text-gray-700"
            >
                🏠 Dashboard
            </a>

            <a
                href="/books"
                class="block py-2 text-gray-700"
            >
                📚 Books
            </a>

            <a
                href="/recommendations"
                class="block py-2 text-gray-700"
            >
                🎯 Recommendations
            </a>

            <a
                href="/book-comparison"
                class="block py-2 text-gray-700"
            >
                ⚖️ Compare Books
            </a>

            <a
                href="/chat"
                class="block py-2 text-gray-700"
            >
                🤖 AI Chat
            </a>


            <?php if(auth()->user()->role === 'admin'): ?>

                <a
                    href="/categories"
                    class="block py-2 text-gray-700"
                >
                    🏷️ Categories
                </a>

                <a
                    href="/users"
                    class="block py-2 text-gray-700"
                >
                    👥 Users
                </a>

                <a
                    href="/admin/dashboard"
                    class="block py-2 text-gray-700"
                >
                    📊 Admin Dashboard
                </a>

            <?php endif; ?>


            <a
                href="/profile"
                class="block py-2 text-gray-700"
            >
                ⚙️ Profile
            </a>


            <form method="POST" action="/logout">

                <?php echo csrf_field(); ?>

                <button
                    type="submit"
                    class="block py-2 text-red-600"
                >
                    🚪 Logout
                </button>

            </form>

        </div>

    </div>

</nav><?php /**PATH C:\laragon\www\library-ai-system\resources\views/layouts/navigation.blade.php ENDPATH**/ ?>