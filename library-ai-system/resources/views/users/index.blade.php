<x-app-layout>

    <div class="max-w-6xl mx-auto py-10 px-6">

        <div class="flex justify-between items-center mb-8">

            <div>
                <h1 class="text-3xl font-bold text-gray-800">
                    👥 Users Management
                </h1>

                <p class="text-gray-600 mt-2">
                    Manage system users and their roles.
                </p>
            </div>

            <a
                href="/users/create"
                class="bg-blue-600 text-white px-5 py-3 rounded-lg hover:bg-blue-700"
            >
                ➕ Add User
            </a>

        </div>


        @if(session('success'))

            <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-6">
                ✅ {{ session('success') }}
            </div>

        @endif


        @if(session('error'))

            <div class="bg-red-100 text-red-800 p-4 rounded-lg mb-6">
                ❌ {{ session('error') }}
            </div>

        @endif


        <div class="bg-white shadow-lg rounded-xl overflow-hidden">

            <table class="w-full">

                <thead class="bg-gray-100">

                    <tr>

                        <th class="p-4 text-left">
                            ID
                        </th>

                        <th class="p-4 text-left">
                            Name
                        </th>

                        <th class="p-4 text-left">
                            Email
                        </th>

                        <th class="p-4 text-left">
                            Role
                        </th>

                        <th class="p-4 text-left">
                            Actions
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($users as $user)

                        <tr class="border-t">

                            <td class="p-4">
                                {{ $user->id }}
                            </td>

                            <td class="p-4 font-semibold">
                                {{ $user->name }}
                            </td>

                            <td class="p-4">
                                {{ $user->email }}
                            </td>

                            <td class="p-4">

                                @if($user->role === 'admin')

                                    <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full">
                                        👑 Admin
                                    </span>

                                @else

                                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full">
                                        👤 User
                                    </span>

                                @endif

                            </td>


                            <td class="p-4">

                                <div class="flex gap-2">

                                    <a
                                        href="/users/{{ $user->id }}/edit"
                                        class="bg-yellow-500 text-white px-4 py-2 rounded-lg"
                                    >
                                        ✏️ Edit
                                    </a>


                                    @if($user->id !== auth()->id())

                                        <form
                                            method="POST"
                                            action="/users/{{ $user->id }}"
                                            onsubmit="return confirm('Are you sure you want to delete this user?')"
                                        >

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="bg-red-600 text-white px-4 py-2 rounded-lg"
                                            >
                                                🗑️ Delete
                                            </button>

                                        </form>

                                    @endif

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="5"
                                class="p-8 text-center text-gray-500"
                            >
                                No users found.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</x-app-layout>