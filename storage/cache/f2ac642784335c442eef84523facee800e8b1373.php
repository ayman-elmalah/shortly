<html>
<head></head>
<body>
<?php $__currentLoopData = $links['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div><?php echo e($link->id); ?></div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php echo links($links['current_page'], $links['pages']); ?>

</body>
</html><?php /**PATH E:\xampp\htdocs\shortly\views/web/home/index.blade.php ENDPATH**/ ?>