@extends('layouts.restaurantApp')
<link rel="stylesheet" href="../css/button.css">

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/apply" class="button button2"><i class="fas fa-arrow-circle-left"></i> Back</a>
                    </div>

                    <div class="card-body">
                        <form action="/apply" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="actual_amount">Actual Amount <span class="text-danger">*</span></label>
                                <input id="actual_amount" class="form-control" type="text" name="actual_amount" required>
                            </div> 
                            {{-- <div class="form-group">
                                <label for="commission"> Bon Appetit Commission</label>
                                <input id="commission" class="form-control" type="text" name="commission">
                            </div> 
                            <div class="form-group">
                                <label for="discount">Discount</label>
                                <input id="discount" class="form-control" type="text" name="discount">
                            </div>  --}}
                            <div class="form-group">
                                <label for="percent_off">Percent Off <span class="text-danger">*</span></label>
                                <input id="percent_off" class="form-control" type="text" name="percent_off" required>
                            </div> 
                            {{-- <div class="form-group">
                                <label for="total">Total</label>
                                <input id="total" class="form-control" type="text" name="total">
                            </div>  --}}
                            {{-- <div class="form-group">
                                <label for="ba_receivable">Bon Appetit's Receivable amount </label>
                                <input id="ba_receivable" class="form-control" type="text" name="ba_receivable">
                            </div>  --}}

                            <div class="form-group">
                                <label for="user_id">Select Customer <span class="text-danger">*</span></label>
                                <select id="user_id" class="form-control" name="user_id">
                                   @foreach ($customers as $item)
                                       <option value="{{ $item->id }}">{{ $item->name }} | {{ $item->phone_number }}</option>
                                   @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="coupon_code">Coupon Code <span class="text-danger">*</span></label>
                                <input id="coupon_code" class="form-control" type="text" name="coupon_code" required>
                            </div> 
                            <button type="submit" class="button button2">Submit <i class="far fa-save"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection