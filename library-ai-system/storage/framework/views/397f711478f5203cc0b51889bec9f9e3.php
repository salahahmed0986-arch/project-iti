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

    <div class="max-w-5xl mx-auto py-10 px-6">

        <!-- Page Title -->
        <h1 class="text-3xl font-bold text-gray-800 mb-3">
            🤖 AI Book Comparison
        </h1>

        <p class="text-gray-600 mb-8">
            Select two books and let AI compare them.
        </p>


        <!-- Comparison Card -->
        <div class="bg-white shadow-lg rounded-xl p-8">

            <div class="grid md:grid-cols-2 gap-6">

                <!-- First Book -->
                <div>

                    <label class="block font-semibold mb-2">
                        📖 First Book
                    </label>

                    <select
                        id="book1"
                        class="w-full border border-gray-300 rounded-lg p-3"
                    >

                        <option value="">
                            Select a book
                        </option>

                        <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <option value="<?php echo e($book->id); ?>">
                                <?php echo e($book->title); ?>

                            </option>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>

                </div>


                <!-- Second Book -->
                <div>

                    <label class="block font-semibold mb-2">
                        📖 Second Book
                    </label>

                    <select
                        id="book2"
                        class="w-full border border-gray-300 rounded-lg p-3"
                    >

                        <option value="">
                            Select a book
                        </option>

                        <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <option value="<?php echo e($book->id); ?>">
                                <?php echo e($book->title); ?>

                            </option>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>

                </div>

            </div>


            <!-- Compare Button -->
            <button
                type="button"
                onclick="compareBooks()"
                class="mt-6 bg-blue-600 hover:bg-blue-700 text-white font-bold px-6 py-3 rounded-lg"
            >
                🤖 Compare Books
            </button>


            <!-- Result -->
            <div
                id="result"
                class="hidden mt-8 bg-gray-100 rounded-lg p-6"
            >

                <h2 class="text-xl font-bold mb-4">
                    🤖 AI Comparison
                </h2>

                <div
                    id="resultText"
                    class="whitespace-pre-line text-gray-700"
                ></div>

            </div>

        </div>

    </div>


    <script>

        async function compareBooks() {

            // Get selected books
            const book1 = document.getElementById('book1').value;
            const book2 = document.getElementById('book2').value;

            // Get result elements
            const result = document.getElementById('result');
            const resultText = document.getElementById('resultText');


            // Check first book
            if (!book1) {

                alert('Please select the first book.');

                return;
            }


            // Check second book
            if (!book2) {

                alert('Please select the second book.');

                return;
            }


            // Check different books
            if (book1 === book2) {

                alert('Please select two different books.');

                return;
            }


            // Show result box
            result.classList.remove('hidden');

            resultText.innerText =
                '🤖 AI is comparing the books... Please wait.';


            try {

                const response = await fetch('/book-comparison', {

                    method: 'POST',

                    headers: {

                        'Content-Type': 'application/json',

                        'X-CSRF-TOKEN':
                            '<?php echo e(csrf_token()); ?>',

                        'Accept':
                            'application/json'

                    },

                    body: JSON.stringify({

                        book1: book1,

                        book2: book2

                    })

                });


                // Get response
                const data = await response.json();


                // Check server error
                if (!response.ok) {

                    resultText.innerText =
                        '❌ Server Error: ' +
                        (data.error || 'Something went wrong.');

                    return;
                }


                // Check Laravel/OpenAI error
                if (data.error) {

                    resultText.innerText =
                        '❌ ' + data.error;

                    return;
                }


                // Check AI reply
                if (data.reply) {

                    resultText.innerText =
                        data.reply;

                    return;
                }


                // Unexpected response
                resultText.innerText =
                    '❌ No comparison result was returned.';

            }


            catch (error) {

                resultText.innerText =
                    '❌ Connection Error: ' +
                    error.message;

            }

        }

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
<?php endif; ?><?php /**PATH C:\laragon\www\library-ai-system\resources\views/books/comparison.blade.php ENDPATH**/ ?>