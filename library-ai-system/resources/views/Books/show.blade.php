<x-app-layout>

    <div class="max-w-4xl mx-auto py-10 px-6">

        <!-- Book Information -->

        <div class="bg-white rounded-xl shadow-lg p-8">

            <h1 class="text-3xl font-bold text-gray-800 mb-6">
                📖 {{ $book->title }}
            </h1>

            <div class="space-y-4 text-gray-700">

                <p>
                    <strong>✍️ Author:</strong>
                    {{ $book->author }}
                </p>

                <p>
                    <strong>🏷️ Category:</strong>
                    {{ $book->category->name ?? 'No Category' }}
                </p>

                <p>
                    <strong>📝 Description:</strong>
                    {{ $book->description ?? 'No description available.' }}
                </p>

                <p>
                    <strong>🔢 ISBN:</strong>
                    {{ $book->isbn ?? 'Not available' }}
                </p>

                <p>
                    <strong>📅 Publication Date:</strong>
                    {{ $book->publication_date ?? 'Not available' }}
                </p>

                <p>
                    <strong>📚 Available Copies:</strong>
                    {{ $book->available_copies }}
                </p>

            </div>

        </div>


        <!-- AI Book Assistant -->

        <div class="bg-white rounded-xl shadow-lg p-8 mt-8">

            <h2 class="text-2xl font-bold text-gray-800 mb-3">
                🤖 Ask AI About This Book
            </h2>

            <p class="text-gray-600 mb-6">
                Ask the AI to explain this book, summarize it,
                or tell you whether it is suitable for beginners.
            </p>


            <div
                id="aiResponse"
                class="hidden bg-gray-100 rounded-lg p-5 mb-5"
            >

                <strong>🤖 AI:</strong>

                <p
                    id="aiText"
                    class="mt-2 whitespace-pre-line"
                ></p>

            </div>


            <div class="flex gap-3">

                <input
                    type="text"
                    id="aiQuestion"
                    placeholder="Ask something about this book..."
                    class="flex-1 border-gray-300 rounded-lg"
                >

                <button
                    onclick="askBookAI()"
                    class="bg-blue-600 text-white px-6 py-2 rounded-lg"
                >
                    Ask AI
                </button>

            </div>


            <!-- Quick Questions -->

            <div class="flex flex-wrap gap-3 mt-5">

                <button
                    onclick="quickQuestion('Explain this book in simple words')"
                    class="bg-gray-200 px-4 py-2 rounded-lg"
                >
                    📖 Explain
                </button>

                <button
                    onclick="quickQuestion('Is this book suitable for beginners?')"
                    class="bg-gray-200 px-4 py-2 rounded-lg"
                >
                    🎓 For Beginners?
                </button>

                <button
                    onclick="quickQuestion('What can I learn from this book?')"
                    class="bg-gray-200 px-4 py-2 rounded-lg"
                >
                    🎯 What will I learn?
                </button>

            </div>

        </div>


        <!-- Back -->

        <a
            href="/books"
            class="inline-block mt-8 bg-blue-600 text-white px-6 py-3 rounded-lg"
        >
            ← Back to Books
        </a>

    </div>


    <script>

        async function askBookAI(question = null) {

            const input = document.getElementById('aiQuestion');

            const aiResponse = document.getElementById('aiResponse');

            const aiText = document.getElementById('aiText');


            if (question) {

                input.value = question;

            }


            const userQuestion = input.value.trim();


            if (!userQuestion) {

                return;

            }


            aiResponse.classList.remove('hidden');

            aiText.innerText = 'Thinking... 🤔';


            try {

                const response = await fetch('/chat', {

                    method: 'POST',

                    headers: {

                        'Content-Type': 'application/json',

                        'X-CSRF-TOKEN': '{{ csrf_token() }}',

                        'Accept': 'application/json'

                    },

                    body: JSON.stringify({

                        message:
                            `Book: {{ $book->title }}

                             Author: {{ $book->author }}

                             Category: {{ $book->category->name ?? 'No Category' }}

                             Description: {{ $book->description ?? 'No description' }}

                             User Question: ${userQuestion}`

                    })

                });


                const data = await response.json();


                if (data.error) {

                    aiText.innerText = '❌ ' + data.error;

                } else {

                    aiText.innerText = data.reply;

                }


            } catch (error) {

                aiText.innerText =
                    '❌ Something went wrong: ' + error.message;

            }

        }


        function quickQuestion(question) {

            askBookAI(question);

        }

    </script>

</x-app-layout>