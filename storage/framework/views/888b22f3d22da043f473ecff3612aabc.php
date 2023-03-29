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
					<div>
						<table class="table table-bordered" id="product-list">
							
						</table>
					</div>
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
		var html = '<tr><th>Name</th><th>Details</th></tr>';
		$.each(t, function(j, k){
			console.log(t[j].name);
			html += '<tr><td>'+t[j].name+'</td><td>'+t[j].detail+'</td></tr>';
		});
		$('#product-list').html(html);
	})
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.userapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\laravel-admin-moderator-user--\resources\views/home.blade.php ENDPATH**/ ?>