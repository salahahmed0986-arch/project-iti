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

    <div class="max-w-7xl mx-auto py-10 px-6">

        <!-- Header -->
        <div class="flex justify-between items-center mb-8">

            <h1 class="text-3xl font-bold text-gray-800">
                📚 Library Books
            </h1>

            <?php if(auth()->user()->isAdmin()): ?>
                <a
                    href="/books/create"
                    class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-lg"
                >
                    ➕ Add Book
                </a>
            <?php endif; ?>

        </div>


        <!-- Search -->
        <form method="GET" action="/books" class="mb-4">

            <div class="flex gap-3">

                <input
                    type="text"
                    name="search"
                    value="<?php echo e($search ?? ''); ?>"
                    placeholder="Search by title or author..."
                    class="w-full border-gray-300 rounded-lg"
                >

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg"
                >
                    🔍 Search
                </button>

            </div>

        </form>


        <!-- Category Filter -->
        <form method="GET" action="/books" class="mb-8">

            <select
                name="category"
                class="w-full border-gray-300 rounded-lg"
                onchange="this.form.submit()"
            >

                <option value="">
                    All Categories
                </option>

                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <option
                        value="<?php echo e($cat->id); ?>"
                        <?php echo e(($category ?? '') == $cat->id ? 'selected' : ''); ?>

                    >
                        <?php echo e($cat->name); ?>

                    </option>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </select>

        </form>


        <!-- Books -->
        <?php if($books->count() > 0): ?>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="bg-white rounded-xl shadow p-6">

                        <!-- Title -->
                        <h2 class="text-xl font-bold text-gray-800">
                            <?php echo e($book->title); ?>

                        </h2>


                        <!-- Author -->
                        <p class="text-gray-600 mt-2">
                            👨‍💻 Author:
                            <?php echo e($book->author); ?>

                        </p>


                        <!-- Category -->
                        <p class="text-gray-600 mt-2">
                            🏷️ Category:
                            <?php echo e($book->category->name ?? 'No Category'); ?>

                        </p>


                        <!-- Available Copies -->
                        <p class="text-gray-600 mt-2">
                            📦 Available Copies:
                            <?php echo e($book->available_copies); ?>

                        </p>


                        <!-- Description -->
                        <p class="text-gray-600 mt-4">
                            <?php echo e($book->description); ?>

                        </p>


                        <!-- Buttons -->
                        <div class="mt-5 flex flex-wrap gap-2">

                            <!-- View Details -->
                            <a
                                href="/books/<?php echo e($book->id); ?>"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg"
                            >
                                📖 View Details
                            </a>


                            <!-- Admin Buttons -->
                            <?php if(auth()->user()->isAdmin()): ?>

                                <!-- Edit -->
                                <a
                                    href="/books/<?php echo e($book->id); ?>/edit"
                                    class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg"
                                >
                                    ✏️ Edit
                                </a>


                                <!-- Delete -->
                                <form
                                    method="POST"
                                    action="/books/<?php echo e($book->id); ?>"
                                    onsubmit="return confirm('Are you sure you want to delete this book?');"
                                >

                                    <?php echo csrf_field(); ?>

                                    <?php echo method_field('DELETE'); ?>

                                    <button
                                        type="submit"
                                        class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-lg"
                                    >
                                        🗑️ Delete
                                    </button>

                                </form>

                            <?php endif; ?>

                        </div>

                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

        <?php else: ?>

            <!-- No Books -->
            <div class="bg-white rounded-xl shadow p-8 text-center">

                <p class="text-gray-600 text-lg">
                    📚 No books available yet.
                </p>

            </div>

        <?php endif; ?>

    </div>

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
<?php /**PATH C:\laragon\www\library-ai-system\resources\views/books/index.blade.php ENDPATH**/ ?>