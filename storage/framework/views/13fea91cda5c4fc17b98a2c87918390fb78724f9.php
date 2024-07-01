<?php $__env->startSection('content'); ?>
<main class="main">

    <div class="site-breadcrumb" style="background: url(assets/img/breadcrumb/01.jpg)">
        <div class="container">
            <h2 class="breadcrumb-title">My Profile</h2>
            <ul class="breadcrumb-menu">
                <li><a href="index.html">Home</a></li>
                <li class="active">My Profile</li>
            </ul>
        </div>
    </div>


    <div class="user-profile py-120">
        <div class="container">
            <div class="row">
                <?php echo $__env->make('user.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="col-lg-9">
                    <?php if(session('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(session('success')); ?>

                    </div>
                    <?php endif; ?>
                    <?php if(session('error')): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo e(session('error')); ?>

                    </div>
                    <?php endif; ?>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo e($error); ?>

                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="user-profile-wrapper">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="user-profile-card">
                                    <h4 class="user-profile-card-title">Profile Info</h4>
                                    <div class="user-profile-form">
                                        <form method="POST" autocomplete="off">
                                            <?php echo csrf_field(); ?>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Current password</label>
                                                        <input id="current_password" type="text" class="form-control <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="current_password" autofocus>

                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($errors->first('current_password')); ?></strong>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>New password</label>
                                                        <input id="new_password" type="text" class="form-control <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="new_password" autofocus>

                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($errors->first('new_password')); ?></strong>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>New confirm password</label>
                                                        <input id="new_confirm_password" type="text" class="form-control <?php $__errorArgs = ['new_confirm_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="new_confirm_password" autofocus>

                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($errors->first('new_confirm_password')); ?></strong>
                                                        </span>
                                                    </div>
                                                </div>

                                            </div>
                                            <button type="submit" class="theme-btn my-3"><span class="far fa-user"></span> Save Changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\marutiinfosoft\resources\views/user/password.blade.php ENDPATH**/ ?>