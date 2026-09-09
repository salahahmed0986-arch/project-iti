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

        <h1 class="text-3xl font-bold text-gray-800 mb-8">
            🏷️ Book Categories
        </h1>

        <a
            href="/categories/create"
            class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg mb-8"
        >
            ➕ Add Category
        </a>

        <?php if($categories->count() > 0): ?>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="bg-white rounded-xl shadow p-6">

                        <h2 class="text-xl font-bold text-gray-800">
                            <?php echo e($category->name); ?>

                        </h2>

                        <p class="text-gray-500 mt-2">
                            Slug: <?php echo e($category->slug); ?>

                        </p>
                        <a
    href="/categories/<?php echo e($category->id); ?>/edit"
    class="inline-block mt-4 bg-green-600 text-white px-5 py-2 rounded-lg"
>
    ✏️ Edit
</a>
<form
    method="POST"
    action="/categories/<?php echo e($category->id); ?>"
    onsubmit="return confirm('Are you sure you want to delete this category?');"
    class="inline-block ml-2"
>

    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>

    <button
        type="submit"
        class="bg-red-600 text-white px-5 py-2 rounded-lg"
    >
        🗑️ Delete
    </button>

</form>

                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

        <?php else: ?>

            <div class="bg-white rounded-xl shadow p-8 text-center">

                <p class="text-gray-600 text-lg">
                    🏷️ No categories available.
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
<?php endif; ?><?php /**PATH C:\laragon\www\library-ai-system\resources\views/categories/index.blade.php ENDPATH**/ ?>