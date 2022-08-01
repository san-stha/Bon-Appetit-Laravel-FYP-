@extends('layouts.restaurantApp')
<link rel="stylesheet" href="../css/button.css">

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/foods" class="button button2"><span><i class="fas fa-arrow-circle-left"></i> Back</span></a>
                    </div>

                    <div class="card-body">
                        <form action="/foods" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input id="name" class="form-control" type="text" name="name" required>
                            </div> 
                            <div class="form-group">
                                <label for="price">Price <span class="text-danger">*</span></label>
                                <input id="price" class="form-control" type="number" name="price" required>
                            </div> 
                            <div class="form-group">
                                <label for="description">Description <span class="text-danger">*</span></label>
                                {{-- <input id="answer" class="form-control" type="text" name="answer"> --}}
                                <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
                            </div> 
                            <div class="form-group">
                                <label for="food_category_id">Select Food Category <span class="text-danger">*</span></label>
                                <select name="food_category_id" id="food_category_id" class="form-control" required>
                                    @foreach ($foodCategories as $foodCategory)
                                        <option value="{{ $foodCategory->id }}">{{ $foodCategory->name }}</option>
                                        
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="image">Upload <span class="text-danger">*</span></label>
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