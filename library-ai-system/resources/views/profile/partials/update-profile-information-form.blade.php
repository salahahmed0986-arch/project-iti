<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            👤 Profile Information
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Update your personal information and AI recommendation preferences.
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">

        @csrf
        @method('patch')

        <!-- Name -->

        <div>
            <x-input-label for="name" :value="__('Name')" />

            <x-text-input
                id="name"
                name="name"
                type="text"
                class="mt-1 block w-full"
                :value="old('name', $user->name)"
                required
                autofocus
                autocomplete="name"
            />

            <x-input-error
                class="mt-2"
                :messages="$errors->get('name')"
            />
        </div>


        <!-- Email -->

        <div>
            <x-input-label for="email" :value="__('Email')" />

            <x-text-input
                id="email"
                name="email"
                type="email"
                class="mt-1 block w-full"
                :value="old('email', $user->email)"
                required
                autocomplete="username"
            />

            <x-input-error
                class="mt-2"
                :messages="$errors->get('email')"
            />
        </div>


        <!-- Interests -->

        <div>
            <x-input-label
                for="interests"
                value="Interests"
            />

            <x-text-input
                id="interests"
                name="interests"
                type="text"
                class="mt-1 block w-full"
                value="{{ old('interests', implode(', ', $user->interests ?? [])) }}"
                placeholder="Programming, AI, Web Development"
            />

            <p class="text-sm text-gray-500 mt-1">
                Separate interests with commas.
            </p>

            <x-input-error
                class="mt-2"
                :messages="$errors->get('interests')"
            />
        </div>


        <!-- Favorite Topics -->

        <div>
            <x-input-label
                for="favorite_topics"
                value="Favorite Topics"
            />

            <x-text-input
                id="favorite_topics"
                name="favorite_topics"
                type="text"
                class="mt-1 block w-full"
                value="{{ old('favorite_topics', implode(', ', $user->favorite_topics ?? [])) }}"
                placeholder="Laravel, PHP, JavaScript"
            />

            <p class="text-sm text-gray-500 mt-1">
                Example: Laravel, PHP, JavaScript
            </p>
        </div>


        <!-- Preferred Categories -->

        <div>
            <x-input-label
                for="preferred_categories"
                value="Preferred Categories"
            />

            <x-text-input
                id="preferred_categories"
                name="preferred_categories"
                type="text"
                class="mt-1 block w-full"
                value="{{ old('preferred_categories', implode(', ', $user->preferred_categories ?? [])) }}"
                placeholder="Programming, AI, Database"
            />

            <p class="text-sm text-gray-500 mt-1">
                Categories you prefer to read.
            </p>
        </div>


        <!-- Skills -->

        <div>
            <x-input-label
                for="skills"
                value="Skills"
            />

            <x-text-input
                id="skills"
                name="skills"
                type="text"
                class="mt-1 block w-full"
                value="{{ old('skills', implode(', ', $user->skills ?? [])) }}"
                placeholder="PHP, HTML, CSS"
            />

            <p class="text-sm text-gray-500 mt-1">
                Your current technical or professional skills.
            </p>
        </div>


        <!-- Learning Goals -->

        <div>
            <x-input-label
                for="learning_goals"
                value="Learning Goals"
            />

            <textarea
                id="learning_goals"
                name="learning_goals"
                rows="4"
                class="mt-1 block w-full border-gray-300 rounded-lg"
                placeholder="I want to learn Laravel and Artificial Intelligence."
            >{{ old('learning_goals', $user->learning_goals) }}</textarea>

            <p class="text-sm text-gray-500 mt-1">
                Tell the AI what you want to learn.
            </p>
        </div>


        <!-- Save -->

        <div class="flex items-center gap-4">

            <x-primary-button>
                Save Profile
            </x-primary-button>

            @if (session('status') === 'profile-updated')

                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 3000)"
                    class="text-sm text-green-600"
                >
                    ✅ Profile saved successfully.
                </p>

            @endif

        </div>

    </form>
</section>