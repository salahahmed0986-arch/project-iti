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

    <div class="max-w-2xl mx-auto py-10 px-6">

        <div class="bg-white shadow-lg rounded-xl p-8">

            <h1 class="text-3xl font-bold text-gray-800 mb-8">
                ✏️ Edit User
            </h1>


            <?php if($errors->any()): ?>

                <div class="bg-red-100 text-red-800 p-4 rounded-lg mb-6">

                    <ul>

                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <li>❌ <?php echo e($error); ?></li>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </ul>

                </div>

            <?php endif; ?>


            <form
                method="POST"
                action="/users/<?php echo e($user->id); ?>"
            >

                <?php echo csrf_field(); ?>

                <?php echo method_field('PUT'); ?>


                <div class="mb-5">

                    <label class="block font-semibold mb-2">
                        Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="<?php echo e(old('name', $user->name)); ?>"
                        class="w-full border-gray-300 rounded-lg"
                        required
                    >

                </div>


                <div class="mb-5">

                    <label class="block font-semibold mb-2">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="<?php echo e(old('email', $user->email)); ?>"
                        class="w-full border-gray-300 rounded-lg"
                        required
                    >

                </div>


                <div class="mb-5">

                    <label class="block font-semibold mb-2">
                        Role
                    </label>

                    <select
                        name="role"
                        class="w-full border-gray-300 rounded-lg"
                        required
                    >

                        <option
                            value="user"
                            <?php echo e($user->role === 'user' ? 'selected' : ''); ?>

                        >
                            User
                        </option>

                        <option
                            value="admin"
                            <?php echo e($user->role === 'admin' ? 'selected' : ''); ?>

                        >
                            Admin
                        </option>

                    </select>

                </div>


                <div class="mb-5">

                    <label class="block font-semibold mb-2">
                        New Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        class="w-full border-gray-300 rounded-lg"
                        placeholder="Leave empty to keep current password"
                    >

                </div>


                <div class="mb-8">

                    <label class="block font-semibold mb-2">
                        Confirm New Password
                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        class="w-full border-gray-300 rounded-lg"
                    >

                </div>


                <div class="flex gap-3">

                    <button
                        type="submit"
                        class="bg-blue-600 text-white px-6 py-3 rounded-lg"
                    >
                        Save Changes
                    </button>

                    <a
                        href="/users"
                        class="bg-gray-500 text-white px-6 py-3 rounded-lg"
                    >
                        Cancel
                    </a>

                </div>

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
<?php endif; ?><?php /**PATH C:\laragon\www\library-ai-system\resources\views/users/edit.blade.php ENDPATH**/ ?>