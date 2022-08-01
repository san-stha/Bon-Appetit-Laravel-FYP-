@extends('layouts.restaurantApp')
<link rel="stylesheet" href="../css/button.css">

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/restaurants" class="button button2"><span><i class="fas fa-arrow-circle-left"></i> Back</span></a>
                    </div>

                    <div class="card-body">
                        <form action="/restaurants" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input id="name" class="form-control" type="text" name="name" required>
                            </div> 
                            <div class="form-group">
                                <label for="address">Address <span class="text-danger">*</span></label>
                                <input id="address" class="form-control" type="longtext" name="address" required>
                            </div> 
                            <div class="form-group">
                                <label for="phone_number">Phone Number <span class="text-danger">*</span></label>
                                <input id="phone_number" class="form-control" type="text" name="phone_number" required>
                            </div> 
                            <div class="form-group">
                                <label for="description">Description <span class="text-danger">*</span></label>
                                {{-- <input id="answer" class="form-control" type="text" name="answer"> --}}
                                <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
                            </div> 
                            <div class="form-group">
                                <label for="latitude">Latitude <span class="text-danger">*</span></label>
                                <input id="latitude" class="form-control" type="number" step="0.0000000001" name="latitude" required>
                            </div> 
                            <div class="form-group">
                                <label for="longitude">Longitude <span class="text-danger">*</span></label>
                                <input id="longitude" class="form-control" type="number" step="0.0000000001" name="longitude" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="restaurant_category_id">Select Restaurant Category <span class="text-danger">*</span></label>
                                <select name="restaurant_category_id" id="restaurant_category_id" class="form-control">
                                    @foreach ($restaurantCategories as $restaurantCategory)
                                        <option value="{{ $restaurantCategory->id }}">{{ $restaurantCategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="image">Upload <span class="text-danger"></span></label>
                                <input id="image" class="form-control-file" type="file" name="image" required>
                            </div>

                            <button type="submit" class="button button2"><span>Submit <i class="far fa-save"></i></span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection