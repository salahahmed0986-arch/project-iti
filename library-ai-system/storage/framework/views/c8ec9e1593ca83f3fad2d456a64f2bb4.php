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
            ✏️ Edit Book
        </h1>

        <div class="bg-white rounded-xl shadow p-8">

            <form method="POST" action="/books/<?php echo e($book->id); ?>">

                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="mb-5">
                    <label class="block font-semibold mb-2">
                        Book Title
                    </label>

                    <input
                        type="text"
                        name="title"
                        value="<?php echo e($book->title); ?>"
                        class="w-full border rounded-lg p-3"
                        required
                    >
                </div>

                <div class="mb-5">
                    <label class="block font-semibold mb-2">
                        Author
                    </label>

                    <input
                        type="text"
                        name="author"
                        value="<?php echo e($book->author); ?>"
                        class="w-full border rounded-lg p-3"
                        required
                    >
                </div>

                <div class="mb-5">
                    <label class="block font-semibold mb-2">
                        Description
                    </label>

                    <textarea
                        name="description"
                        class="w-full border rounded-lg p-3"
                        rows="4"
                    ><?php echo e($book->description); ?></textarea>
                </div>

                <div class="mb-5">
                    <label class="block font-semibold mb-2">
                        Category
                    </label>

                    <select
                        name="category_id"
                        class="w-full border rounded-lg p-3"
                        required
                    >

                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <option
                                value="<?php echo e($category->id); ?>"
                                <?php echo e($book->category_id == $category->id ? 'selected' : ''); ?>

                            >
                                <?php echo e($category->name); ?>

                            </option>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>
                </div>

                <div class="mb-5">
                    <label class="block font-semibold mb-2">
                        ISBN
                    </label>

                    <input
                        type="text"
                        name="isbn"
                        value="<?php echo e($book->isbn); ?>"
                        class="w-full border rounded-lg p-3"
                    >
                </div>

                <div class="mb-5">
                    <label class="block font-semibold mb-2">
                        Publication Date
                    </label>

                    <input
                        type="date"
                        name="publication_date"
                        value="<?php echo e($book->publication_date?->format('Y-m-d')); ?>"
                        class="w-full border rounded-lg p-3"
                    >
                </div>

                <div class="mb-6">
                    <label class="block font-semibold mb-2">
                        Available Copies
                    </label>

                    <input
                        type="number"
                        name="available_copies"
                        min="0"
                        value="<?php echo e($book->available_copies); ?>"
                        class="w-full border rounded-lg p-3"
                        required
                    >
                </div>

                <button
                    type="submit"
                    class="bg-green-600 text-white px-6 py-3 rounded-lg"
                >
                    💾 Save Changes
                </button>

                <a
                    href="/books"
                    class="ml-3 bg-gray-500 text-white px-6 py-3 rounded-lg"
                >
                    Cancel
                </a>

            </form>

        </div>

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
<?php endif; ?><?php /**PATH C:\laragon\www\library-ai-system\resources\views/books/edit.blade.php ENDPATH**/ ?>