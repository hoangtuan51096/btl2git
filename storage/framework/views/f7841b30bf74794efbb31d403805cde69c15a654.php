<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form action="" method="">
                	<input type="hidden" name="from_wallet" value="<?php echo e(Auth::id()); ?>">
                    <div class="row">
                        <lable class="col-md-2 col-form-label">Nguoi nhan:
                        </lable >
                        <div class="col-md-10">
                            <input type="text" name="to_wallet">
                        </div>
                    </div>
                    <div class="row">
                        <lable class="col-md-2 col-form-label">So tien
                        </lable >
                        <div class="col-md-10">
                            <input type="number" name="values">
                        </div>
                    </div>
                    <div class="row">
                        <lable class="col-md-2 col-form-label">Noi dung:
                        </lable >
                        <div class="col-md-10">
                            <input type="text" name="desc">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/btl2/resources/views/transactions/index.blade.php ENDPATH**/ ?>