@extends('admin_layout')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-3" style="float: right">
                            <form class="search-form" method="GET" action="{{ route('blog_search') }}">
                                <input type="search" name="search-blog" id="search-blog" class="form-control" placeholder="Search by BlogTitle"
                                    title="Search here">
                            </form>
                        </div>
                        <h4 class="card-title">Blog Management</h4>
                        @if (session('success'))
                            <div class="alert alert-success">
                                <strong>{{ session('success') }}</strong>
                            </div>
                        @endif
                        <div class="table-responsive-sm">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            {{ __('Image') }}
                                        </th>
                                        <th>
                                            {{ __('Title') }}
                                        </th>
                                        <th>
                                            {{ __('Content') }}
                                        </th>
                                        <th class="text-center">
                                            {{ __('Action') }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($blog_search))
                                        @foreach ($blog_search as $bs)
                                            <tr>
                                                <td class="img-fluid">
                                                    <img src="{{ $bs->BlogIMG }}" alt="image"
                                                        style="width: 100px; height: 67px; border-radius:0%;" />
                                                </td>
                                                <td style="white-space:normal; padding:0.5rem">
                                                    {{ $bs->BlogTitle }}
                                                </td>
                                                <td style="white-space:normal; width: 50rem; padding: 0.5rem;">
                                                    <p class="cutoff-text">{{ $bs->BlogContent }} </p>
                                                    <input type="checkbox" class="expand-btn">
                                                </td>
                                                <td class="text-center">
                                                    <a class="btn btn-rounded btn-success"
                                                        href="{{ url('/edit-blog/' . $bs->BlogID) }}"><i
                                                            class="menu-icon mdi mdi-pencil"></i></a>
                                                    <a class="btn btn-rounded btn-danger btn-delete"
                                                        href="{{ url('/remove-blog/' . $bs->BlogID) }}"><i
                                                            class="menu-icon mdi mdi-delete"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                </tbody>
                            </table>
                            <br>
                            <span
                                style="float:right">{{ $blog_search->appends(['search-blog' => request()->query('search-blog')])->links() }}</span>
                        @else
                            @foreach ($blog as $bg)
                                <tr>
                                    <td class="img-fluid">
                                        <img src="{{ $bg->BlogIMG }}" alt="image"
                                            style="width: 100px; height: 67px; border-radius:0%;" />
                                    </td>
                                    <td style="white-space:normal; padding:0.5rem">
                                        {{ $bg->BlogTitle }}
                                    </td>
                                    <td style="white-space:normal; width: 50rem; padding: 0.5rem;">
                                        <p class="cutoff-text">{{ $bg->BlogContent }} </p>
                                        <input type="checkbox" class="expand-btn">
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-rounded btn-success"
                                            href="{{ url('/edit-blog/' . $bg->BlogID) }}"><i
                                                class="menu-icon mdi mdi-pencil"></i></a>
                                        <a class="btn btn-rounded btn-danger btn-delete"
                                            href="{{ url('/remove-blog/' . $bg->BlogID) }}"><i
                                                class="menu-icon mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            </table>
                            <br>
                            <span style="float:right">{{ $blog->links() }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- POP UP -->
@endsection

@section('scripts')
    <script>
        $("a.btn-delete").click(function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure to delete this blog?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = $(this).attr("href");
                }
            });
        });
    </script>
@stop
