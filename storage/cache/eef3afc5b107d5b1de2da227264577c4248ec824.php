<?php $__env->startSection('content'); ?>
    <section class="result text-center">
        <div class="container">
            <h1  class="pb-2 ">My lniks</h1>
            <div class="row">
                <div class="col-md-12">
                    <?php if(session('message')): ?>
                        <div class="alert alert-info"><?php echo e(flash('message')); ?></div>
                    <?php endif; ?>
                    <table class="table">
                        <tr>
                            <th>Full url</th>
                            <th>Shorten url</th>
                            <th>Copy</th>
                            <th>Clicks Count</th>
                        </tr>
                        <?php $__currentLoopData = $links['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($link->full_link); ?></td>
                            <td><?php echo e(url('link/'.$link->short_link)); ?></td>
                            <td>
                                <button onclick="copy('<?php echo e(url('link/' . $link->short_link)); ?>')" class="btn text-white">Copy</button>
                                <a href="#" data-action="<?php echo e(url('link/' . $link->id . '/delete')); ?>" class="btn delete_confirmation" data-toggle="modal" data-target="#deleteModal">Delete</a>
                            </td>
                            <td>5</td>
                        </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
            </div>

            <?php echo links($links['current_page'], $links['pages']); ?>

        </div>
    </section>

    <?php echo $__env->make('web.layouts.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>
        function copy(text) {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(text).select();
            document.execCommand("copy");
            $temp.remove();
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\shortly\views/web/links/index.blade.php ENDPATH**/ ?>