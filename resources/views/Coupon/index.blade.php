@extends('layouts.adminApp')
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
                        <a href="coupon/create" class="button button2">Add Coupon <i class="fas fa-plus-circle"></i></a>
                    </div>
                    <div class="card-body">
                        <table class="table" id="datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Code</th>
                                    <th>Percent</th>
                                    <th>Action</th>
                                    {{-- <th>Value</th>
                                    <th>Cart Value</th> --}}
                                </tr>
                            </thead>
                            
                            <tbody>

                                @foreach ($coupons as $coupon)
                                    <tr>
                                        <td>
                                            {{ $coupon->id }}
                                        </td>
                                        <td>
                                            {{ $coupon->code }}
                                        </td>
                                        <td>
                                            {{ $coupon->percent_off }} %
                                        </td>
                                        {{-- <td>
                                            {{ $coupon->value }}
                                        </td>
                                        <td>
                                            {{ $coupon->cart_value }}
                                        </td> --}}

                                        <td>
                                            <a href="/coupon/{{ $coupon->id }}/edit" class="btn bagde bg-primary">Edit <i class="far fa-edit"></i></a>
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
@endsection
