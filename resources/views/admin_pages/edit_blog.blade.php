@extends('admin_layout')
@section('title', 'Testo - Pizza and Fast Food')
@section('content')


<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Blog</h4>
                    <form class="forms-sample" id="update-form" method="POST" action="{{ url('update-blog/' . $blog->BlogID) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="BlogIMG">Image</label>
                            <input type="file" class="form-control" id="BlogIMG" name="BlogIMG" style="height: 120%">
                        </div>
                        <div class="form-group">
                            <label for="BlogTitle">Title</label>
                            <input type="text" class="form-control" id="BlogTitle" name="BlogTitle" value="{{ $blog -> BlogTitle }}"
                                placeholder="Blog Title">
                            @error('BlogTitle')
                                <span class="alert text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="BlogContent">Content</label>
                            <textarea class="form-control" id="BlogContent" name="BlogContent" placeholder="Enter Content of Blog" style="height:10rem">{{ $blog -> BlogContent }}</textarea>
                            @error('BlogContent')
                                <span class="alert text-danger">
                                    <strong>{{ $message }}</strong>
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
@endsection

@section('scripts')
<script>
    $('#update-form').submit(function(event) {
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure to update this blog?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Update',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                $(this).unbind('submit').submit();
            }
        });
    });
</script>
@stop