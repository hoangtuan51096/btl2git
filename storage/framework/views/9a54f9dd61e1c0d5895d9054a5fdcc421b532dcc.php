<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Thông tin Ví</div>
                    <div class="card-body"> 
                        <a href="<?php echo e(url('/home')); ?>">BACK</a>
                        <br>
                        <?php if(session('status')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>
                        <?php if(empty($wallet)): ?>
                            <a href="<?php echo e(route('wallet.create')); ?>" class="btn btn-secondary">TẠO VÍ</a>
                        <?php else: ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <?php echo method_field('PUT'); ?>
                            <?php echo csrf_field(); ?>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">ID Wallet:</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext"  value="<?php echo e($wallet->user_id); ?>">
                                </div>
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
                                  <input type="text" readonly class="form-control" value="<?php echo e($wallet->name); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Money :</label>
                                <div class="col-sm-10">
                                  <input type="text" readonly class="form-control" value="<?php echo e(number_format($wallet->money)); ?>$">
                                </div>
                            </div>
                            <form action="<?php echo e(route('wallet.destroy', $wallet->id)); ?>" method="POST">
                                <?php echo method_field('DELETE'); ?>
                                <?php echo csrf_field(); ?>
                                <input onclick="return confirm('Ban co chac muon xoa vi nay hay khong?');" type="submit" class="btn btn-danger" value="DELETE" name="delete"/>
                            </form>
                        </form>
                        <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/btl2/resources/views/wallet/Show.blade.php ENDPATH**/ ?>