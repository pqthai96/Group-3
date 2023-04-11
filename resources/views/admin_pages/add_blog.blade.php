@extends('admin_layout')
@section('title', 'Testo - Pizza and Fast Food')
@section('content')

    <!-- partial -->
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create a new Blog</h4>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form class="forms-sample" method="post" action="{{ route('save_blog') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">Image</label>
                                <input type="file" class="form-control" id="BlogIMG" name="BlogIMG" style="height:120%">
                                @error('BlogIMG')
                                    <span class="alert text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" class="form-control" id="BlogTitle" name="BlogTitle"
                                    placeholder="Blog Title">
                                @error('BlogTitle')
                                    <span class="alert text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Content</label>
                                <textarea class="form-control" id="BlogContent" name="BlogContent"
                                    placeholder="Enter Content of Blog" style="height: 100px"></textarea>
                                @error('BlogContent')
                                    <span class="alert text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
