<x-app-layout>

    <div class="max-w-4xl mx-auto py-10 px-6">

        <h1 class="text-3xl font-bold text-gray-800 mb-8">
            ➕ Add New Category
        </h1>

        <div class="bg-white rounded-xl shadow p-8">

            <form method="POST" action="/categories">

                @csrf

                <div class="mb-6">

                    <label class="block font-semibold mb-2">
                        Category Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        class="w-full border rounded-lg p-3"
                        placeholder="Example: Machine Learning"
                        required
                    >

                </div>

                <button
                    type="submit"
                    class="bg-blue-600 text-white px-6 py-3 rounded-lg"
                >
                    ➕ Add Category
                </button>

                <a
                    href="/categories"
                    class="ml-3 bg-gray-500 text-white px-6 py-3 rounded-lg"
                >
                    Cancel
                </a>

            </form>

        </div>

    </div>

</x-app-layout>