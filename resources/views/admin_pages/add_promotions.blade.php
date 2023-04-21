@extends('admin_layout')
@section('content')

    <!-- partial -->
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create a new Promotions</h4>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form class="forms-sample" id="add-form" method="post" action="{{ route('save_promotions') }}"
                            enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                    <label for="DiscountIMG">Image</label>
                                    <input type="file" class="form-control" id="DiscountIMG" name="DiscountIMG" style="height:120%">
                                    @error('DiscountIMG')
                                        <span class="alert text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="DiscoutnID">Discount ID</label>
                                    <input type="text" class="form-control" id="DiscountID" name="DiscountID"
                                        placeholder="Discount Code">
                                    @error('DiscountID')
                                        <span class="alert text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="DiscountValue">Discount Value</label>
                                    <input type="text" class="form-control" id="DiscountValue" name="DiscountValue"
                                        placeholder="Discount value">
                                    @error('DiscountValue')
                                        <span class="alert text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="DiscountName">Discount Name</label>
                                    <input type="text" class="form-control" id="DiscountName" name="DiscountName"
                                        placeholder="Discount Name">
                                    @error('DiscountName')
                                        <span class="alert text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="DiscountName">Minimum Amount</label>
                                    <input type="text" class="form-control" id="MinimumAmount" name="MinimumAmount"
                                        placeholder="Minimum Amount">
                                    @error('MinimumAmount')
                                        <span class="alert text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="DiscountName">Maximum Amount</label>
                                    <input type="text" class="form-control" id="MaximumAmount" name="MaximumAmount"
                                        placeholder="Maximum Amount">
                                    @error('MaximumAmount')
                                        <span class="alert text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="DiscountDate">Start Date (start at 00:00)</label>
                                    <input type="date" class="form-control" id="StartDate" name="StartDate">
                                    @error('StartDate')
                                        <span class="alert text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="DiscountDate">End Date (end at 23:59)</label>
                                    <input type="date" class="form-control" id="EndDate" name="EndDate">
                                    @error('EndDate')
                                        <span class="alert text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                                <button type="submit" class="btn btn-primary me-2">Create</button>
                                <button class="btn btn-light" type="button"> <a href="{{ url('all_blog') }}" style="text-decoration: none"> Cancel</a></button>
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
            title: 'Are you sure to add this promotion?',
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
