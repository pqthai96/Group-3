@extends('admin_layout')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-3" style="float: right">
                            <form class="search-form" action="{{ route('promotion_search') }}">
                                <input type="search" name="search-promotion" id="search-promotion" class="form-control" placeholder="Search by DiscountID or DiscountName" title="Search here">
                                </form>
                        </div>
                        <h4 class="card-title">Promotion Management</h4>
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
                                            {{ __('Discount ID') }}
                                        </th>
                                        <th>
                                            {{ __('Discount Name') }}
                                        </th>
                                        <th class="text-center">
                                            {{ __('Discount Value') }}
                                        </th>
                                        <th class="text-center">
                                            {{ __('Discount Amount') }}
                                        </th>
                                        <th class="text-center">
                                            {{ __('Discount Date') }}
                                        </th>
                                        <th class="text-center">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($promotion_search))
                                    @foreach ($promotion_search as $ps)
                                        <tr>
                                            <td class="img-fluid">
                                                <img src="{{ $ps-> DiscountIMG }}" alt="image" style="width: 100px; height: 67px; border-radius:0%;" />
                                            </td>
                                            <td>
                                                <strong class="cutoff-text">{{ $ps-> DiscountID }}</strong>
                                            </td>
                                            <td>
                                                <p class="cutoff-text">{{ $ps-> DiscountName}} </p>
                                            </td>
                                            <td class="text-center">
                                                <strong class="cutoff-text">{{ $ps-> DiscountValue}} </strong>
                                            </td>
                                            <td class="text-center">
                                                Min order value used: <strong class="cutoff-text">${{ $ps-> MinimumAmount}} </strong></br>
                                                Max discount: <strong class="cutoff-text">${{ $ps-> MaximumAmount}} </strong>
                                            </td>
                                            <td class="text-center">
                                                Start: <strong class="cutoff-text">{{ $ps-> StartDate}} </strong></br>
                                                End: <strong class="cutoff-text">{{ $ps-> EndDate}} </strong>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-rounded btn-success" href="{{ url('edit-promotions/' . $ps->DiscountID) }}"><i class="menu-icon mdi mdi-pencil"></i></a>
                                                <a class="btn btn-rounded btn-danger btn-delete" href="{{ url('remove-promotions/' . $ps->DiscountID ) }}"><i class="menu-icon mdi mdi-delete"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br>
                            <span style="float:right">{{ $promotion_search->appends(['search-promotion' => request()->query('search-promotion')])->links() }}</span>
                            @else
                            @foreach ($discount as $dc)
                                        <tr>
                                            <td class="img-fluid">
                                                <img src="{{ $dc-> DiscountIMG }}" alt="image" style="width: 100px; height: 67px; border-radius:0%;" />
                                            </td>
                                            <td>
                                                <strong class="cutoff-text">{{ $dc-> DiscountID }}</strong>
                                            </td>
                                            <td>
                                                <p class="cutoff-text">{{ $dc-> DiscountName}} </p>
                                            </td>
                                            <td class="text-center">
                                                <strong class="cutoff-text">{{ $dc-> DiscountValue}} </strong>
                                            </td>
                                            <td class="text-center">
                                                Min order value used: <strong class="cutoff-text">${{ $dc-> MinimumAmount}} </strong></br>
                                                Max discount: <strong class="cutoff-text">${{ $dc-> MaximumAmount}} </strong>
                                            </td>
                                            <td class="text-center">
                                                Start: <strong class="cutoff-text">{{ $dc-> StartDate}} </strong></br>
                                                End: <strong class="cutoff-text">{{ $dc-> EndDate}} </strong>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-rounded btn-success" href="{{ url('edit-promotions/' . $dc->DiscountID) }}"><i class="menu-icon mdi mdi-pencil"></i></a>
                                                <a class="btn btn-rounded btn-danger btn-delete" href="{{ url('remove-promotions/' . $dc->DiscountID ) }}"><i class="menu-icon mdi mdi-delete"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br>
                            <span style="float:right">{{ $discount->links() }}</span>
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
      title: 'Are you sure to delete this promotion?',
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
