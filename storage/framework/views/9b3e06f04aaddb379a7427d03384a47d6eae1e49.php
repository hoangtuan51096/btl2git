<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> Danh muc </div>
                    <div class="card-body">
                        <?php if(session('status')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>
                        <a href="<?php echo e(route('category.create')); ?>">ADD</a>
                        <table border="1" cellspacing="0" cellpadding="10">
                            <tr>                           
                                <td>User_ID</td>
                                <td>Values</td>
                                <td>Resource</td>
                                <td>Type</td>
                                <td>Create_time</td>
                            </tr>
                            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($category->user_id); ?></td>
                                    <td><?php echo e(number_format($category->values)); ?>$</td>
                                    <td><?php echo e($category->resource); ?></td>
                                    <?php if($category->type == 0): ?>
                                        <td>Thu</td>
                                    <?php else: ?>
                                        <td>Chi</td>
                                    <?php endif; ?>
                                    <td><?php echo e($category->created_at); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/btl2/resources/views/categories/show.blade.php ENDPATH**/ ?>