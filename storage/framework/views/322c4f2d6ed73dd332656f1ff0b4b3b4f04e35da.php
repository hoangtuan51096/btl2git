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
                        <form action="<?php echo e(route('search')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                            <div class="row">
                                <input type="hidden" name="id" value="<?php echo e(Auth::id()); ?>">
                                <select name="type">
                                    <option>Chon loai loc</option>
                                    <option value="0">Danh muc</option>
                                    <option value="1">Ngay gio</option>
                                </select>
                                <input type="text" name="values" value="<?php echo e(session('searchgiaodich')); ?>">
                                <input type="submit" class="btn btn-info" name="Search" value="Search">
                            </div><br>
                            <div class="export">
                                <a href ="<?php echo e(route('export')); ?>" class="btn btn-info export" id="export-button"> Export file </a>
                            </div><br>
                        </form>
                        <table border="1" cellspacing="0" cellpadding="10">
                            <tr>
                                <th>ID</th>
                                <th>From_wallet_id</th>
                                <th>To_wallet_id</th>
                                <th>Values</th>
                                <th>Type</th>
                                <th>Desc</th>
                                <th>Create_time</th>
                            </tr>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($key + 1); ?></td>
                                    <td><?php echo e($transaction->fromWallet->user->username); ?></td>
                                    
                                    <?php echo e(dd($transaction)); ?>

                                    <td><?php echo e($transaction->toWallet->user->username); ?></td>
                                    <td><?php echo e(number_format($transaction->values)); ?>$</td>
                                    <?php if($transaction->fromWallet->user_id == Auth::id() && $transaction->type == 0): ?>
                                        <td>Gui tien</td>
                                    <?php elseif($transaction->toWallet->user_id == Auth::id() && $transaction->type == 0): ?>
                                        <td>Nhan tien</td>
                                    <?php else: ?>
                                        <td>Thu/Chi</td>
                                    <?php endif; ?>
                                    <td><?php echo e($transaction->desc); ?></td>
                                    <td><?php echo e($transaction->created_at); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                    <br>
                    <?php echo e($data->links()); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/btl2/resources/views/transactions/show.blade.php ENDPATH**/ ?>