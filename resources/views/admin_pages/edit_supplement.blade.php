@extends('admin_layout')
@section('content')

<!-- partial -->
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Supplement</h4>
                  <form class="forms-sample" method="POST" action="{{ url('update-supplement/'.$supplement->ProductID) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="category">Choose Category</label>
                        <select class="form-select" id="category" name="category">
                            <option value="2" <?php echo ( $supplement->CategoryID == '2') ? 'selected' : ''; ?>>Side</option>
                            <option value="3" <?php echo ( $supplement->CategoryID == '3') ? 'selected' : ''; ?>>Salad</option>
                            <option value="4" <?php echo ( $supplement->CategoryID == '4') ? 'selected' : ''; ?>>Dessert</option>
                            <option value="5" <?php echo ( $supplement->CategoryID == '5') ? 'selected' : ''; ?>>Drink</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="product_name">Product Name</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name" value="{{ $supplement->ProductName }}">
                        @error('product_name')
                        <span class="alert text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="product_price">Price</label>
                            <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Product Price" value="{{ $supplement->PriceM }}">
                            @error('product_price')
                            <span class="alert text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="product_quantity">Quantity</label>
                            <input type="text" class="form-control" id="product_quantity" name="product_quantity" placeholder="Product Quantity" value="{{ $supplement->QuantityM }}">
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
                    
                    <button type="submit" class="btn btn-primary me-2">Update</button>
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