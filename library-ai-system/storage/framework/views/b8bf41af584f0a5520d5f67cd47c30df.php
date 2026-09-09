```php
<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

    <div class="max-w-4xl mx-auto py-10 px-6">

        <h1 class="text-3xl font-bold text-gray-800 mb-8">
            🤖 AI Library Assistant
        </h1>

        <div class="bg-white shadow-lg rounded-xl">

            <div
                id="chatMessages"
                class="h-96 overflow-y-auto p-6 space-y-4"
            >

                <div class="bg-gray-100 p-4 rounded-lg">
                    <strong>🤖 AI:</strong>

                    <p class="mt-2">
                        Hello! 👋
                        I am your AI Library Assistant.
                        Ask me about books, recommendations, or the library.
                    </p>
                </div>

            </div>

            <form id="chatForm" class="border-t p-4 flex gap-3">

                <input
                    type="text"
                    id="message"
                    placeholder="Ask something about the library..."
                    class="flex-1 border-gray-300 rounded-lg"
                    required
                >

                <button
                    type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded-lg"
                >
                    Send
                </button>

            </form>

        </div>

    </div>


    <script>

        const chatForm = document.getElementById('chatForm');

        const messageInput = document.getElementById('message');

        const chatMessages = document.getElementById('chatMessages');


        chatForm.addEventListener('submit', async function(e) {

            e.preventDefault();


            const message = messageInput.value.trim();


            if (!message) {
                return;
            }


            // Show user message

            chatMessages.innerHTML += `

                <div class="bg-blue-100 p-4 rounded-lg">

                    <strong>👤 You:</strong>

                    <p class="mt-2">
                        ${message}
                    </p>

                </div>

            `;


            messageInput.value = '';


            // Show thinking

            chatMessages.innerHTML += `

                <div
                    id="thinking"
                    class="bg-gray-100 p-4 rounded-lg"
                >

                    <strong>🤖 AI:</strong>

                    <p class="mt-2">
                        Thinking... 🤔
                    </p>

                </div>

            `;


            chatMessages.scrollTop = chatMessages.scrollHeight;


            try {

                const response = await fetch('/chat', {

                    method: 'POST',

                    headers: {

                        'Content-Type': 'application/json',

                        'X-CSRF-TOKEN':
                            '<?php echo e(csrf_token()); ?>',

                        'Accept': 'application/json'

                    },

                    body: JSON.stringify({

                        message: message

                    })

                });


                // Get response

                const data = await response.json();


                console.log('Server Response:', data);


                // Remove Thinking

                const thinking =
                    document.getElementById('thinking');

                if (thinking) {
                    thinking.remove();
                }


                // Check error

                if (data.error) {

                    chatMessages.innerHTML += `

                        <div class="bg-red-100 p-4 rounded-lg">

                            <strong>
                                ❌ Error:
                            </strong>

                            <p class="mt-2">
                                ${data.error}
                            </p>

                        </div>

                    `;

                    return;
                }


                // Check reply

                if (data.reply) {

                    chatMessages.innerHTML += `

                        <div class="bg-gray-100 p-4 rounded-lg">

                            <strong>
                                🤖 AI:
                            </strong>

                            <p class="mt-2 whitespace-pre-line">
                                ${data.reply}
                            </p>

                        </div>

                    `;

                } else {

                    chatMessages.innerHTML += `

                        <div class="bg-red-100 p-4 rounded-lg">

                            <strong>
                                ❌ Error:
                            </strong>

                            <p class="mt-2">
                                Server returned an unexpected response.
                            </p>

                        </div>

                    `;

                }


                chatMessages.scrollTop =
                    chatMessages.scrollHeight;


            } catch (error) {

                const thinking =
                    document.getElementById('thinking');

                if (thinking) {
                    thinking.remove();
                }


                chatMessages.innerHTML += `

                    <div class="bg-red-100 p-4 rounded-lg">

                        <strong>
                            ❌ Connection Error:
                        </strong>

                        <p class="mt-2">
                            ${error.message}
                        </p>

                    </div>

                `;

            }

        });

    </script>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
```
<?php /**PATH C:\laragon\www\library-ai-system\resources\views/chat.blade.php ENDPATH**/ ?>