<?php $__env->startSection('content'); ?>
<main class="main">

    <div class="site-breadcrumb" style="background: url(assets/img/breadcrumb/01.jpg)">
        <div class="container">
            <h2 class="breadcrumb-title">Login</h2>
            <ul class="breadcrumb-menu">
                <li><a href="index.html">Home</a></li>
                <li class="active">Login</li>
            </ul>
        </div>
    </div>


    <div class="login-area py-120">
        <div class="container">
            <div class="col-md-5 mx-auto">
                <div class="login-form">
                    <div class="login-header">
                        <img src="assets/img/logo/logo.png" alt>
                        <p>Login with your motex account</p>
                    </div>
                    <form method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" autocomplete="email" autofocus>

                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('email')); ?></strong>
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" autocomplete="current-password">

                            <span class="invalid-feedback" role="alert">
                                <strong> <?php echo e($errors->first('password')); ?></strong>
                            </span>
                        </div>
                       
                        <div class="d-flex align-items-center">
                            <button type="submit" class="theme-btn"><i class="far fa-sign-in"></i> Login</button>
                        </div>
                    </form>
                    <div class="login-footer">
                        <p>Don't have an account? <a href="<?php echo e(route('register')); ?>">Register.</a></p>
                        <!-- <div class="social-login">
                            <p>Continue with social media</p>
                            <div class="social-login-list">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-google"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\marutiinfosoft\resources\views/auth/login.blade.php ENDPATH**/ ?>