<x-app-layout>

    <div class="max-w-6xl mx-auto py-10 px-6">

        <div class="mb-10">
            <h1 class="text-3xl font-bold text-gray-800">
                🎯 AI Book Recommendations
            </h1>

            <p class="text-gray-600 mt-2">
                Books recommended based on your interests, skills,
                favorite topics and learning goals.
            </p>
        </div>


        @if(count($recommendations) === 0)

            <div class="bg-white shadow rounded-xl p-8">
                <p class="text-gray-600">
                    No books available yet.
                </p>
            </div>

        @else

            <div class="grid md:grid-cols-2 gap-6">

                @foreach($recommendations as $recommendation)

                    @php
                        $book = $recommendation['book'];
                        $score = $recommendation['score'];
                    @endphp

                    <div class="bg-white shadow-lg rounded-xl p-6">

                        <div class="flex justify-between items-start gap-4">

                            <div>
                                <h2 class="text-xl font-bold text-gray-800">
                                    📖 {{ $book->title }}
                                </h2>

                                <p class="text-gray-600 mt-2">
                                    ✍️ {{ $book->author }}
                                </p>

                                <p class="text-gray-600">
                                    🏷️
                                    {{ $book->category->name ?? 'No Category' }}
                                </p>
                            </div>


                            <div class="text-center">

                                <div class="text-2xl font-bold text-blue-600">
                                    {{ $score }}%
                                </div>

                                <div class="text-sm text-gray-500">
                                    Match
                                </div>

                            </div>

                        </div>


                        <p class="text-gray-600 mt-4">
                            {{ $book->description ?? 'No description available.' }}
                        </p>


                        <div class="mt-5">

                            <div class="w-full bg-gray-200 rounded-full h-3">

                                <div
                                    class="bg-blue-600 h-3 rounded-full"
                                    style="width: {{ $score }}%"
                                ></div>

                            </div>

                        </div>


                        <a
                            href="/books/{{ $book->id }}"
                            class="inline-block mt-5 bg-blue-600 text-white px-5 py-2 rounded-lg"
                        >
                            📖 View Details
                        </a>

                    </div>

                @endforeach

            </div>

        @endif

    </div>

</x-app-layout>
