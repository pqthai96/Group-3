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
                    <div class="row">
                      <div class="form-group col-md-6">
                          <label for="product_name">Contact Name</label>
                          <input type="text" class="form-control" id="contact_name" name="contact_name" value="{{ $reply->ContactName }}" disabled>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="product_price">Contact Email</label>
                          <input type="text" class="form-control" id="contact_email" name="contact_email" value="{{ $reply->ContactEmail }}" disabled>
                          <input type="hidden" name="contact_email" value="{{ $reply->ContactEmail }}">
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="product_quantity">Contact Subject</label>
                        <input type="text" class="form-control" id="contact_subject" name="contact_subject" value="{{ $reply->ContactSubject }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="product_quantity">Contact Message</label>
                        <textarea type="text" class="form-control" id="contact_message" name="contact_message" style="height:10rem" disabled>{{ $reply->Message }}</textarea>
                    </div>
                    <div class="form-group">
                        <div class="text-center"><label for="admin_reply"><h4 style="text-decoration: underline; font-weight:bolder">Admin Reply Form</h4></label></div>
                        <input type="text" class="form-control" id="reply_subject" name="reply_subject" placeholder="Enter Subject Reply" style="height:3rem">
                        @error('reply_subject')
                        <span class="alert text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <textarea type="text" class="form-control" id="admin_reply" name="admin_reply" placeholder="Enter Message Reply" style="height:10rem; margin-top:0.5rem"></textarea>
                        @error('admin_reply')
                        <span class="alert text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Reply</button>
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