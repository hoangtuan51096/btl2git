<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Thuc hien giao dich</div>
                    <div class="card-body"> 
                        <a href="<?php echo e(url('/home')); ?>">BACK</a>
                        <?php if(session('error')): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo e(session('error')); ?>

                            </div>
                        <?php endif; ?>
                        <form action="<?php echo e(route('transaction.store')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group row">
                                <input type="hidden" name="from_wallet_id" value="<?php echo e(Auth::id()); ?>">
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3"  class="col-sm-2 col-form-label">Nguoi nhan :</label>
                                <div class="col-sm-10">
                                     <select name="to_wallet_id">
                                         <option value="">Chon Account</option>
                                         <?php $__currentLoopData = $data_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($user->id); ?>"><?php echo e($user->username); ?></option>
                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label" required >So tien :</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="values">
                                  <?php if ($errors->has('values')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('values'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Noi dung :</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="desc">
                                </div>
                            </div>
                            <div class="form-group row">
                                <input type="hidden" name="type" value="0">
                            </div>
                            <input type="submit" class="btn btn-info" name="submit_add" value="Add" />
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/btl2/resources/views/transactions/create.blade.php ENDPATH**/ ?>