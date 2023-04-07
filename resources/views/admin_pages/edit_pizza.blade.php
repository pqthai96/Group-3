@extends('admin_layout')
@section('title', 'Testo - Pizza and Fast Food')
@section('content')

<!-- partial -->
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Pizza</h4>
                  <form class="forms-sample" method="POST" action="{{ url('update-pizza/'.$pizza->ProductID) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="pizza_name">Pizza Name</label>
                      <input type="text" class="form-control" id="pizza_name" name="pizza_name" placeholder="Pizza Name" value="{{ $pizza->ProductName }}">
                      @error('pizza_name')
                        <span class="alert text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea class="form-control" id="description" name="description" placeholder="Description" style="height:100px">{{ $pizza->Description }}</textarea>
                      @error('description')
                        <span class="alert text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="row">
                      <div class="form-group col-md-4">
                        <label for="price_s">PriceS</label>
                        <input type="text" class="form-control" id="price_s" name="price_s" placeholder="Price size S" value="{{ $pizza->PriceS }}">
                        @error('price_s')
                        <span class="alert text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      <div class="form-group col-md-4">
                        <label for="price_m">PriceM</label>
                        <input type="text" class="form-control" id="price_m" name="price_m" placeholder="Price size M" value="{{ $pizza->PriceM }}">
                        @error('price_m')
                        <span class="alert text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      <div class="form-group col-md-4">
                        <label for="price_l">PriceL</label>
                        <input type="text" class="form-control" id="price_l" name="price_l" placeholder="Price size L" value="{{ $pizza->PriceL }}">
                        @error('price_l')
                        <span class="alert text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-4">
                        <label for="quantity_s">QuantityS</label>
                        <input type="text" class="form-control" id="quantity_s" name="quantity_s" placeholder="Quantity size S" value="{{ $pizza->QuantityS }}">
                        @error('quantity_s')
                        <span class="alert text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      <div class="form-group col-md-4">
                        <label for="quantity_m">QuantityM</label>
                        <input type="text" class="form-control" id="quantity_m" name="quantity_m" placeholder="Quantity size M" value="{{ $pizza->QuantityM }}">
                        @error('quantity_m')
                        <span class="alert text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      <div class="form-group col-md-4">
                        <label for="quantity_l">QuantityL</label>
                        <input type="text" class="form-control" id="quantity_l" name="quantity_l" placeholder="Quantity size L" value="{{ $pizza->QuantityL }}">
                        @error('quantity_l')
                        <span class="alert text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="imageURL">Change an other pizza image</label>
                      <input type="file" class="form-control" id="imageURL" name="imageURL" placeholder="ImageURL" style="height:120%">
                      <label for="imageURL">Aspect Ratio: 3:2 | File Type: JPG/PNG</label>
                      <br>
                      @error('imageURL')
                        <span class="alert text-danger">
                            <strong>Image URL is required.</strong>
                        </span>
                      @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-primary me-2">Update</button>
                    <button class="btn btn-light" type="reset">Clear</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial -->
@endsection