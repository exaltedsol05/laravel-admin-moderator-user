@extends('layouts.userapp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Products') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
					<div>
						<table class="table table-bordered" id="product-list">
							
						</table>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('other-scripts')
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
@endpush
