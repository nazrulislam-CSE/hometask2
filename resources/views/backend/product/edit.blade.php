@extends('layouts.app2')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="content-wrapper">
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <div class="content">
	    <div class="container-fluied">
	    	<div class="row mt-3">
		      <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
	            <div class="card card-primary card-outline shadow py-3">
	            	<div class="card-header">
	            		<h3 class="card-title">Products</h3>
			            <div class="card-tools">
			              <a  href="{{ route('product.index') }}" class="btn btn-success col-12 fileinput-button dz-clickable"><i class="fas fa-plus mr-2"></i>All Product</a>
			            </div>
			      	</div>
		            <div class="card-body">
		                <div class="bs-stepper-content">
		                    <form action="{{ route('product.update', $products->id) }}" method="post" enctype="multipart/form-data">
		                      @csrf
		                      	<div class="form-group">
                                	<label for="product_image">Product Image:</label>
		                          	@error('product_image')
		                              <span class="text-danger">{{ $message }}</span>
		                          	@enderror
		                          	<div class="row  p-2" id="preview_img">
		                                <img id="showImage" class="rounded avatar-lg" src="{{ asset($products->product_image) }}" alt="No Image" width="100px" height="80px;">
		                          	</div>
		                          	<input type="file" name="product_image" class="form-control" multiple="" id="images">
		                      	</div>
		                        <button type="submit" class="btn btn-primary mt-4" style="float: right;">Update Now</button>
		                    </form>
		                </div>
		            </div>
		        </div>
		      </div>
		    </div>
	    </div>
	</div>
	<!-- /.content -->
</div>
@push('footer-script')

<!--Site favicon Show -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#images').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
<!-- Product MultiImg -->
@endpush
@endsection