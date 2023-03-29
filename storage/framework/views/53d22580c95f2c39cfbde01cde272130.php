<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Products')); ?></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
					<div id="product-list"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('other-scripts'); ?>
<script>
	$.ajax({
		url: 'api/products',
		type: "GET",
		dataType: "json",
	}).success(function (t) {
		var html = '<div class="row">';
		$.each(t, function(j, k){
			console.log(t[j].name);
			html += '<div class="col-md-4"><div>'+t[j].name+'</div><div>'+t[j].detail+'</div></div>';
		});
		html += '</div>';
		$('#product-list').html(html);
	})
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.userapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\laravel-admin-moderator-user--copy\resources\views/home.blade.php ENDPATH**/ ?>