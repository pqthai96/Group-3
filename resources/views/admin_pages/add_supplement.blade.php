@extends('admin_layout')
@section('content')

<!-- partial -->
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Create a new Supplement</h4>
                  <?php
                  $msg = Session::get('failed');
                  if($msg) {
                  ?>
                  <div class="alert alert-danger">
                      <strong>{{ $msg }}</strong>
                  </div>
                  <?php
                  Session::put('failed',null);
                  }
                  ?>
                  <form class="forms-sample" id="add-form" method="POST" action="{{ route('save_supplement') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="category">Choose Category</label>
                        <select class="form-select" id="category" name="category">
                            <option value="2">Side</option>
                            <option value="3">Salad</option>
                            <option value="4">Dessert</option>
                            <option value="5">Drink</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="product_name">Product Name</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name">
                        @error('product_name')
                        <span class="alert text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="product_price">Price</label>
                            <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Product Price">
                            @error('product_price')
                            <span class="alert text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="product_quantity">Quantity</label>
                            <input type="text" class="form-control" id="product_quantity" name="product_quantity" placeholder="Product Quantity">
                            @error('product_quantity')
                            <span class="alert text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="imageURL">Choose a product image to upload</label>
                      <input type="file" class="form-control" id="imageURL" name="imageURL" placeholder="ImageURL" style="height:120%">
                      <label for="imageURL">Aspect Ratio: 3:2 | File Type: JPG/PNG</label><br>
                      @error('imageURL')
                        <span class="alert text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-primary me-2">Add</button>
                    <button class="btn btn-light" type="reset">Clear</button>
                    <?php
                    $msg = Session::get('msg');
                    if($msg) {
                    ?>
                    <span class="alert text-danger">
                        <strong>{{ $msg }}</strong>
                    </span>
                    <?php
                    Session::put('msg',null);
                    }
                    ?>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial -->
@endsection

@section('scripts')
<script>
    $('#add-form').submit(function(event) {
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure to add this supplement?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Add',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                $(this).unbind('submit').submit();
            }
        });
    });
</script>
@stop