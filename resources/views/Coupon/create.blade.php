@extends('layouts.adminApp')
<link rel="stylesheet" href="../css/button.css">

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/coupon" class="button button2"><i class="fas fa-arrow-circle-left"></i> Back</a>
                    </div>

                    <div class="card-body">
                        <form action="/coupon" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="code">Code</label>
                                <input id="code" class="form-control" type="text" name="code" required>
                            </div> 
                            <div class="form-group">
                                <label for="percent_off"> Discount Percent_off</label>
                                <input id="percent_off" class="form-control" type="text" name="percent_off" required>
                            </div> 
                            {{-- <div class="form-group">
                                <label for="value">Value</label>
                                <input id="value" class="form-control" type="text" name="value">
                            </div> 
                            <div class="form-group">
                                <label for="cart_value">Cart Value</label>
                                <input id="cart_value" class="form-control" type="text" name="cart_value">
                            </div>  --}}
                            <button type="submit" class="button button2">Submit <i class="far fa-save"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection