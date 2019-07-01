<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Tạo Ví</div>
                    <div class="card-body"> 
                        <a href="<?php echo e(url('/home')); ?>">BACK</a>
                        <form action="<?php echo e(route('wallet.store')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group row">
                                <input type="hidden" name="user_id" value="<?php echo e(Auth::id()); ?>">
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Username:</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext"  value="<?php echo e(Auth::user()->username); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Name:</label>
                                <div class="col-sm-10">
                                  <input type="text" readonly class="form-control" value="<?php echo e(Auth::user()->name); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3"  class="col-sm-2 col-form-label">Name wallet:</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Money :</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="money">
                                </div>
                            </div>
                            <input type="submit" class="btn btn-info" name="submit_add" value="Add" />
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/btl2/resources/views/wallet/create.blade.php ENDPATH**/ ?>