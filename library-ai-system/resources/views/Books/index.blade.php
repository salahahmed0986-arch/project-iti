<x-app-layout>

    <div class="max-w-7xl mx-auto py-10 px-6">

        <!-- Header -->
        <div class="flex justify-between items-center mb-8">

            <h1 class="text-3xl font-bold text-gray-800">
                📚 Library Books
            </h1>

            @if(auth()->user()->isAdmin())
                <a
                    href="/books/create"
                    class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-lg"
                >
                    ➕ Add Book
                </a>
            @endif

        </div>


        <!-- Search -->
        <form method="GET" action="/books" class="mb-4">

            <div class="flex gap-3">

                <input
                    type="text"
                    name="search"
                    value="{{ $search ?? '' }}"
                    placeholder="Search by title or author..."
                    class="w-full border-gray-300 rounded-lg"
                >

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg"
                >
                    🔍 Search
                </button>

            </div>

        </form>


        <!-- Category Filter -->
        <form method="GET" action="/books" class="mb-8">

            <select
                name="category"
                class="w-full border-gray-300 rounded-lg"
                onchange="this.form.submit()"
            >

                <option value="">
                    All Categories
                </option>

                @foreach($categories as $cat)

                    <option
                        value="{{ $cat->id }}"
                        {{ ($category ?? '') == $cat->id ? 'selected' : '' }}
                    >
                        {{ $cat->name }}
                    </option>

                @endforeach

            </select>

        </form>


        <!-- Books -->
        @if($books->count() > 0)

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach($books as $book)

                    <div class="bg-white rounded-xl shadow p-6">

                        <!-- Title -->
                        <h2 class="text-xl font-bold text-gray-800">
                            {{ $book->title }}
                        </h2>


                        <!-- Author -->
                        <p class="text-gray-600 mt-2">
                            👨‍💻 Author:
                            {{ $book->author }}
                        </p>


                        <!-- Category -->
                        <p class="text-gray-600 mt-2">
                            🏷️ Category:
                            {{ $book->category->name ?? 'No Category' }}
                        </p>


                        <!-- Available Copies -->
                        <p class="text-gray-600 mt-2">
                            📦 Available Copies:
                            {{ $book->available_copies }}
                        </p>


                        <!-- Description -->
                        <p class="text-gray-600 mt-4">
                            {{ $book->description }}
                        </p>


                        <!-- Buttons -->
                        <div class="mt-5 flex flex-wrap gap-2">

                            <!-- View Details -->
                            <a
                                href="/books/{{ $book->id }}"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg"
                            >
                                📖 View Details
                            </a>


                            <!-- Admin Buttons -->
                            @if(auth()->user()->isAdmin())

                                <!-- Edit -->
                                <a
                                    href="/books/{{ $book->id }}/edit"
                                    class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg"
                                >
                                    ✏️ Edit
                                </a>


                                <!-- Delete -->
                                <form
                                    method="POST"
                                    action="/books/{{ $book->id }}"
                                    onsubmit="return confirm('Are you sure you want to delete this book?');"
                                >

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-lg"
                                    >
                                        🗑️ Delete
                                    </button>

                                </form>

                            @endif

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <!-- No Books -->
            <div class="bg-white rounded-xl shadow p-8 text-center">

                <p class="text-gray-600 text-lg">
                    📚 No books available yet.
                </p>

            </div>

        @endif

    </div>

</x-app-layout>
