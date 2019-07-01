<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Them danh muc</div>
                    <div class="card-body"> 
                        <a href="<?php echo e(url('/home')); ?>">BACK</a>
                        <form action="<?php echo e(route('category.store')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group row">
                                <input type="hidden" name='user_id' value="<?php echo e(Auth::id()); ?>">
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3"  class="col-sm-2 col-form-label">Values :</label>
                                <div class="col-sm-10">
                                    <input  type="text" class="form-control <?php if ($errors->has('values')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('values'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="values" value="<?php echo e(old('values')); ?>" required autocomplete="values" autofocus>
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
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Resource :</label>
                                <div class="col-sm-10">
                                    <input  type="text" class="form-control <?php if ($errors->has('resource')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('resource'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="resource" value="<?php echo e(old('resource')); ?>" required autocomplete="resource" autofocus>
                                    <?php if ($errors->has('resource')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('resource'); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Thu/Chi :</label>
                                <label class="radio-inline"><input type="radio" name="type" value="0">Thu</label>
                                <br>
                                <label class="radio-inline"><input type="radio" name="type" value="1">Chi</label>
                                <?php if ($errors->has('type')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('type'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                            <input type="submit" class="btn btn-info" name="submit_add" value="Add" />
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/btl2/resources/views/categories/create.blade.php ENDPATH**/ ?>