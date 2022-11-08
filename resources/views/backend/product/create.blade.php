@extends('layouts.app2')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="content-wrapper">
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products Add</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product Add</li>
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
                    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                          <label for="name">Product Image:</label>
                          @error('product_image')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                          <div class="row  p-2" id="preview_img">
                                  
                          </div>
                          <input type="file" name="product_image[]" class="form-control" multiple="" id="multiImg" >
                        </div>
                        <button type="submit" class="btn btn-primary mt-4" style="float: right;">Create Now</button>
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

<script>
  $(document).ready(function(){
   	$('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(100)
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
</script>
@endpush
@endsection