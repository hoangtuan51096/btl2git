<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Thông tin người dùng</div>
                    <div class="card-body"> 
                        <a href="<?php echo e(url('/user')); ?>">BACK</a>
                        <form action="" method="post" enctype="multipart/form-data">
                            <?php echo method_field('PUT'); ?>
                            <?php echo csrf_field(); ?>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Username:</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext"  value="<?php echo e($userbyID->username); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Name:</label>
                                <div class="col-sm-10">
                                  <input type="text" readonly class="form-control" name='name' value="<?php echo e($userbyID->name); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3"  class="col-sm-2 col-form-label">Email:</label>
                                <div class="col-sm-10">
                                  <input type="email" readonly class="form-control" name='email' value="<?php echo e($userbyID->email); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Ví :</label>
                                <div class="col-sm-10">
                                  <input type="text" readonly class="form-control" name='vi' value="<?php echo e($userbyID->vi); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Money :</label>
                                <div class="col-sm-10">
                                  <input type="text" readonly class="form-control" name='name' value="<?php echo e($userbyID->money); ?>$">
                                </div>
                            </div>
                            <div class="export">
                             <a href ="<?php echo e(route('user.edit', Auth::id())); ?>" class="btn btn-info export" id="export-button"> Chỉnh sửa </a>
                        	</div>
                        	<br>
                        	<div class="export">
                             <a href ="<?php echo e(route('changepass.edit', Auth::id())); ?>" class="btn btn-info export" id="export-button"> Đổi mật khẩu </a>
                        	</div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/btl2/resources/views/Show.blade.php ENDPATH**/ ?>