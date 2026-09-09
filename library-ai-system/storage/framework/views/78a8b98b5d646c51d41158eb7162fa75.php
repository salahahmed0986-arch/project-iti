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


        <?php if(count($recommendations) === 0): ?>

            <div class="bg-white shadow rounded-xl p-8">
                <p class="text-gray-600">
                    No books available yet.
                </p>
            </div>

        <?php else: ?>

            <div class="grid md:grid-cols-2 gap-6">

                <?php $__currentLoopData = $recommendations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recommendation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php
                        $book = $recommendation['book'];
                        $score = $recommendation['score'];
                    ?>

                    <div class="bg-white shadow-lg rounded-xl p-6">

                        <div class="flex justify-between items-start gap-4">

                            <div>
                                <h2 class="text-xl font-bold text-gray-800">
                                    📖 <?php echo e($book->title); ?>

                                </h2>

                                <p class="text-gray-600 mt-2">
                                    ✍️ <?php echo e($book->author); ?>

                                </p>

                                <p class="text-gray-600">
                                    🏷️
                                    <?php echo e($book->category->name ?? 'No Category'); ?>

                                </p>
                            </div>


                            <div class="text-center">

                                <div class="text-2xl font-bold text-blue-600">
                                    <?php echo e($score); ?>%
                                </div>

                                <div class="text-sm text-gray-500">
                                    Match
                                </div>

                            </div>

                        </div>


                        <p class="text-gray-600 mt-4">
                            <?php echo e($book->description ?? 'No description available.'); ?>

                        </p>


                        <div class="mt-5">

                            <div class="w-full bg-gray-200 rounded-full h-3">

                                <div
                                    class="bg-blue-600 h-3 rounded-full"
                                    style="width: <?php echo e($score); ?>%"
                                ></div>

                            </div>

                        </div>


                        <a
                            href="/books/<?php echo e($book->id); ?>"
                            class="inline-block mt-5 bg-blue-600 text-white px-5 py-2 rounded-lg"
                        >
                            📖 View Details
                        </a>

                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
<?php /**PATH C:\laragon\www\library-ai-system\resources\views/recommendations/index.blade.php ENDPATH**/ ?>