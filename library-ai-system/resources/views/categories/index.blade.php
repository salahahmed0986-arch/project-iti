<x-app-layout>

    <div class="max-w-7xl mx-auto py-10 px-6">

        <h1 class="text-3xl font-bold text-gray-800 mb-8">
            🏷️ Book Categories
        </h1>

        <a
            href="/categories/create"
            class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg mb-8"
        >
            ➕ Add Category
        </a>

        @if($categories->count() > 0)

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach($categories as $category)

                    <div class="bg-white rounded-xl shadow p-6">

                        <h2 class="text-xl font-bold text-gray-800">
                            {{ $category->name }}
                        </h2>

                        <p class="text-gray-500 mt-2">
                            Slug: {{ $category->slug }}
                        </p>
                        <a
    href="/categories/{{ $category->id }}/edit"
    class="inline-block mt-4 bg-green-600 text-white px-5 py-2 rounded-lg"
>
    ✏️ Edit
</a>
<form
    method="POST"
    action="/categories/{{ $category->id }}"
    onsubmit="return confirm('Are you sure you want to delete this category?');"
    class="inline-block ml-2"
>

    @csrf
    @method('DELETE')

    <button
        type="submit"
        class="bg-red-600 text-white px-5 py-2 rounded-lg"
    >
        🗑️ Delete
    </button>

</form>

                    </div>

                @endforeach

            </div>

        @else

            <div class="bg-white rounded-xl shadow p-8 text-center">

                <p class="text-gray-600 text-lg">
                    🏷️ No categories available.
                </p>

            </div>

        @endif

    </div>

</x-app-layout>