<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h2 class="logo text-center text-main"><a href="<?php echo e(url('/')); ?>" class="text-decoration-none text-main">CutURL</a></h2>
                        <h5 class="card-title text-center">Sign Up</h5>

                        <?php if(session('message')): ?>
                            <div class="alert alert-danger"><?php echo e(flash('message')); ?></div>
                        <?php endif; ?>

                        <form class="form-signin" method="post" action="<?php echo e(url('register')); ?>">
                            <div class="form-group">
                                <label for="first_name">First name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control <?php if($errors && $errors->has('first_name')): ?> is-invalid <?php endif; ?>" placeholder="First name" required autofocus value="<?php echo e($old?$old['first_name']:''); ?>">
                                <?php if($errors && $errors->has('first_name')): ?>
                                    <div class="invalid-feedback"><?php echo e($errors->first('first_name')); ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control <?php if($errors && $errors->has('last_name')): ?> is-invalid <?php endif; ?>" placeholder="Last name" required autofocus value="<?php echo e($old?$old['last_name']:''); ?>">
                                <?php if($errors && $errors->has('last_name')): ?>
                                    <div class="invalid-feedback"><?php echo e($errors->first('last_name')); ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="user_name">User name</label>
                                <input type="text" name="user_name" id="user_name" class="form-control <?php if($errors && $errors->has('user_name')): ?> is-invalid <?php endif; ?>" placeholder="User name" required autofocus value="<?php echo e($old?$old['user_name']:''); ?>">
                                <?php if($errors && $errors->has('user_name')): ?>
                                    <div class="invalid-feedback"><?php echo e($errors->first('user_name')); ?></div>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control <?php if($errors && $errors->has('password')): ?> is-invalid <?php endif; ?>" placeholder="Password" required>
                                <?php if($errors && $errors->has('password')): ?>
                                    <div class="invalid-feedback"><?php echo e($errors->first('password')); ?></div>
                                <?php endif; ?>
                            </div>

                            <button class="btn btn-lg btn-form btn-block text-uppercase" type="submit">Register Now</button>

                        </form>

                        <div class="member text-center mt-5">
                            <a class=" text-dark" href="<?php echo e(url('login')); ?>">i am already a member</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\shortly\views/web/auth/register.blade.php ENDPATH**/ ?>