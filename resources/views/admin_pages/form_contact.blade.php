@extends('admin_layout')
@section('content')

<!-- partial -->
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Reply Contact Form</h4>
                  <form class="forms-sample" method="POST" action="{{ url('reply-contact/'.$reply->ContactID) }}">
                    @csrf
                    <div class="form-group">
                        <label for="product_name">Contact Name</label>
                        <input type="text" class="form-control" id="contact_name" name="contact_name" placeholder="Product Name" value="{{ $reply->ContactName }}">
                    </div>
                    <div class="form-group">
                        <label for="product_price">Contact Email</label>
                        <input type="text" class="form-control" id="contact_email" name="contact_email" placeholder="Product Price" value="{{ $reply->ContactEmail }}">
                    </div>
                    <div class="form-group">
                        <label for="product_quantity">Subject</label>
                        <input type="text" class="form-control" id="contact_subject" name="contact_subject" placeholder="Product Quantity" value="{{ $reply->ContactSubject }}">
                    </div>
                    <div class="form-group">
                        <label for="product_quantity">Message</label>
                        <textarea type="text" class="form-control" id="contact_message" name="contact_message" placeholder="Product Quantity" style="height:10rem">{{ $reply->Message }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="product_quantity">Admin Reply</label>
                        <textarea type="text" class="form-control" id="admin_reply" name="admin_reply" placeholder="Product Quantity" style="height:10rem"></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary me-2">Reply</button>
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