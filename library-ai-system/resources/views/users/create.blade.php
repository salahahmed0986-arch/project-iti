<x-app-layout>

    <div class="max-w-2xl mx-auto py-10 px-6">

        <div class="bg-white shadow-lg rounded-xl p-8">

            <h1 class="text-3xl font-bold text-gray-800 mb-8">
                ➕ Add New User
            </h1>

            @if($errors->any())
                <div class="bg-red-100 text-red-800 p-4 rounded-lg mb-6">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>❌ {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="/users">

                @csrf

                <div class="mb-5">
                    <label class="block font-semibold mb-2">
                        Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        class="w-full border border-gray-300 rounded-lg p-3"
                        required
                    >
                </div>

                <div class="mb-5">
                    <label class="block font-semibold mb-2">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="w-full border border-gray-300 rounded-lg p-3"
                        required
                    >
                </div>

                <div class="mb-5">
                    <label class="block font-semibold mb-2">
                        Role
                    </label>

                    <select
                        name="role"
                        class="w-full border border-gray-300 rounded-lg p-3"
                        required
                    >
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

                <div class="mb-5">
                    <label class="block font-semibold mb-2">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        class="w-full border border-gray-300 rounded-lg p-3"
                        required
                    >
                </div>

                <div class="mb-8">
                    <label class="block font-semibold mb-2">
                        Confirm Password
                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        class="w-full border border-gray-300 rounded-lg p-3"
                        required
                    >
                </div>

                <div class="flex gap-3">

                    <button
                        type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-8 py-3 rounded-lg shadow"
                    >
                        Create User
                    </button>

                    <a
                        href="/users"
                        class="bg-gray-500 hover:bg-gray-600 text-white font-bold px-8 py-3 rounded-lg shadow"
                    >
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>

</x-app-layout>