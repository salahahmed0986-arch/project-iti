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


        <?php if(session('success')): ?>

            <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-6">
                ✅ <?php echo e(session('success')); ?>

            </div>

        <?php endif; ?>


        <?php if(session('error')): ?>

            <div class="bg-red-100 text-red-800 p-4 rounded-lg mb-6">
                ❌ <?php echo e(session('error')); ?>

            </div>

        <?php endif; ?>


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

                    <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                        <tr class="border-t">

                            <td class="p-4">
                                <?php echo e($user->id); ?>

                            </td>

                            <td class="p-4 font-semibold">
                                <?php echo e($user->name); ?>

                            </td>

                            <td class="p-4">
                                <?php echo e($user->email); ?>

                            </td>

                            <td class="p-4">

                                <?php if($user->role === 'admin'): ?>

                                    <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full">
                                        👑 Admin
                                    </span>

                                <?php else: ?>

                                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full">
                                        👤 User
                                    </span>

                                <?php endif; ?>

                            </td>


                            <td class="p-4">

                                <div class="flex gap-2">

                                    <a
                                        href="/users/<?php echo e($user->id); ?>/edit"
                                        class="bg-yellow-500 text-white px-4 py-2 rounded-lg"
                                    >
                                        ✏️ Edit
                                    </a>


                                    <?php if($user->id !== auth()->id()): ?>

                                        <form
                                            method="POST"
                                            action="/users/<?php echo e($user->id); ?>"
                                            onsubmit="return confirm('Are you sure you want to delete this user?')"
                                        >

                                            <?php echo csrf_field(); ?>

                                            <?php echo method_field('DELETE'); ?>

                                            <button
                                                type="submit"
                                                class="bg-red-600 text-white px-4 py-2 rounded-lg"
                                            >
                                                🗑️ Delete
                                            </button>

                                        </form>

                                    <?php endif; ?>

                                </div>

                            </td>

                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                        <tr>

                            <td
                                colspan="5"
                                class="p-8 text-center text-gray-500"
                            >
                                No users found.
                            </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

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
<?php endif; ?><?php /**PATH C:\laragon\www\library-ai-system\resources\views/users/index.blade.php ENDPATH**/ ?>