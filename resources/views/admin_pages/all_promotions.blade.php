@extends('admin_layout')
@section('title', 'Testo - Pizza and Fast Food')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-3" style="float: right">
                            <form class="search-form" action="#">
                                <input type="search" class="form-control" placeholder="Search Here" title="Search here">
                            </form>
                        </div>
                        <h4 class="card-title">Promotion Management</h4>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
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
                                                <a class="btn btn-rounded btn-success" href="{{ url('edit_promotions/' . $dc->DiscountID) }}"><i class="menu-icon mdi mdi-pencil"></i></a>
                                                <a class="btn btn-rounded btn-danger" href="{{ url('remove_promotions/' . $dc->DiscountID ) }}"><i class="menu-icon mdi mdi-delete"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- POP UP -->
@endsection
