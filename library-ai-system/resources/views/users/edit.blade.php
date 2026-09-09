<x-app-layout>

    <div class="max-w-2xl mx-auto py-10 px-6">

        <div class="bg-white shadow-lg rounded-xl p-8">

            <h1 class="text-3xl font-bold text-gray-800 mb-8">
                ✏️ Edit User
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


            <form
                method="POST"
                action="/users/{{ $user->id }}"
            >

                @csrf

                @method('PUT')


                <div class="mb-5">

                    <label class="block font-semibold mb-2">
                        Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name', $user->name) }}"
                        class="w-full border-gray-300 rounded-lg"
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
                        value="{{ old('email', $user->email) }}"
                        class="w-full border-gray-300 rounded-lg"
                        required
                    >

                </div>


                <div class="mb-5">

                    <label class="block font-semibold mb-2">
                        Role
                    </label>

                    <select
                        name="role"
                        class="w-full border-gray-300 rounded-lg"
                        required
                    >

                        <option
                            value="user"
                            {{ $user->role === 'user' ? 'selected' : '' }}
                        >
                            User
                        </option>

                        <option
                            value="admin"
                            {{ $user->role === 'admin' ? 'selected' : '' }}
                        >
                            Admin
                        </option>

                    </select>

                </div>


                <div class="mb-5">

                    <label class="block font-semibold mb-2">
                        New Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        class="w-full border-gray-300 rounded-lg"
                        placeholder="Leave empty to keep current password"
                    >

                </div>


                <div class="mb-8">

                    <label class="block font-semibold mb-2">
                        Confirm New Password
                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        class="w-full border-gray-300 rounded-lg"
                    >

                </div>


                <div class="flex gap-3">

                    <button
                        type="submit"
                        class="bg-blue-600 text-white px-6 py-3 rounded-lg"
                    >
                        Save Changes
                    </button>

                    <a
                        href="/users"
                        class="bg-gray-500 text-white px-6 py-3 rounded-lg"
                    >
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>

</x-app-layout>