@extends('layouts.restaurantApp')
<link rel="stylesheet" href="../css/button.css">


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                        
                    @endif
                    <div class="card-header">
                        <a href="apply/create" class="button button2">Apply Coupon<i class="fas fa-plus-circle"></i></a>
                    </div>
                    <div class="card-body">
                        <table class="table" id="datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Actual Amount</th>
                                    <th>Percent Off</th>
                                    <th>Commission</th>
                                    <th>Discount</th>
                                    <th>Bon Appetit's Receivable</th>
                                    <th>Total</th>
                                    <th>User Id</th>
                                    <th>Res Id</th>
                                    <th>Used Coupon Code</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            
                            <tbody>

                                @foreach ($applies as $apply)
                                    <tr>
                                        <td>
                                            {{ $apply->id }}
                                        </td>
                                        <td>
                                            Rs. {{ $apply->actual_amount }}
                                        </td>
                                        <td>
                                            {{ $apply->percent_off }} %
                                        </td>
                                        <td>
                                            Rs. {{ $apply->commission }}
                                        </td>
                                        <td>
                                            Rs. {{ $apply->discount }}
                                        </td>
                                        <td>
                                            Rs. {{ $apply->ba_receivable }}
                                        </td>
                                        <td>
                                            Rs. {{ $apply->total }}
                                        </td>
                                        <td>
                                            {{ $apply->user_id }}
                                        </td>
                                        <td>
                                            {{ $apply->restaurant_id }}
                                        </td>
                                        <td>
                                            {{ $apply->coupon_code }}
                                        </td>
                                        {{-- <td>
                                            <a href="/coupon/{{ $coupons->id }}/edit" class="btn bagde bg-primary">Edit <i class="far fa-edit"></i></a>
                                        </td> --}}
                                        
                                    </tr>
                                        
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
