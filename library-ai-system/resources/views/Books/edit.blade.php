<x-app-layout>

    <div class="max-w-4xl mx-auto py-10 px-6">

        <h1 class="text-3xl font-bold text-gray-800 mb-8">
            ✏️ Edit Book
        </h1>

        <div class="bg-white rounded-xl shadow p-8">

            <form method="POST" action="/books/{{ $book->id }}">

                @csrf
                @method('PUT')

                <div class="mb-5">
                    <label class="block font-semibold mb-2">
                        Book Title
                    </label>

                    <input
                        type="text"
                        name="title"
                        value="{{ $book->title }}"
                        class="w-full border rounded-lg p-3"
                        required
                    >
                </div>

                <div class="mb-5">
                    <label class="block font-semibold mb-2">
                        Author
                    </label>

                    <input
                        type="text"
                        name="author"
                        value="{{ $book->author }}"
                        class="w-full border rounded-lg p-3"
                        required
                    >
                </div>

                <div class="mb-5">
                    <label class="block font-semibold mb-2">
                        Description
                    </label>

                    <textarea
                        name="description"
                        class="w-full border rounded-lg p-3"
                        rows="4"
                    >{{ $book->description }}</textarea>
                </div>

                <div class="mb-5">
                    <label class="block font-semibold mb-2">
                        Category
                    </label>

                    <select
                        name="category_id"
                        class="w-full border rounded-lg p-3"
                        required
                    >

                        @foreach($categories as $category)

                            <option
                                value="{{ $category->id }}"
                                {{ $book->category_id == $category->id ? 'selected' : '' }}
                            >
                                {{ $category->name }}
                            </option>

                        @endforeach

                    </select>
                </div>

                <div class="mb-5">
                    <label class="block font-semibold mb-2">
                        ISBN
                    </label>

                    <input
                        type="text"
                        name="isbn"
                        value="{{ $book->isbn }}"
                        class="w-full border rounded-lg p-3"
                    >
                </div>

                <div class="mb-5">
                    <label class="block font-semibold mb-2">
                        Publication Date
                    </label>

                    <input
                        type="date"
                        name="publication_date"
                        value="{{ $book->publication_date?->format('Y-m-d') }}"
                        class="w-full border rounded-lg p-3"
                    >
                </div>

                <div class="mb-6">
                    <label class="block font-semibold mb-2">
                        Available Copies
                    </label>

                    <input
                        type="number"
                        name="available_copies"
                        min="0"
                        value="{{ $book->available_copies }}"
                        class="w-full border rounded-lg p-3"
                        required
                    >
                </div>

                <button
                    type="submit"
                    class="bg-green-600 text-white px-6 py-3 rounded-lg"
                >
                    💾 Save Changes
                </button>

                <a
                    href="/books"
                    class="ml-3 bg-gray-500 text-white px-6 py-3 rounded-lg"
                >
                    Cancel
                </a>

            </form>

        </div>

    </div>

</x-app-layout>