@extends('layouts.restaurantApp')
<link rel="stylesheet" href="../css/button.css">

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/foodCategories" class="button button2"><span><i class="fas fa-arrow-circle-left"></i>
                                Back</span></a>
                    </div>
                    <div class="card-body">
                        <form action="/foodCategories" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input id="name" class="form-control" type="text" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="image">Upload <span class="text-danger">*</span></label>
                                <input id="image" class="form-control-file" type="file" name="image" required>
                            </div>
                            <button type="submit" class="button button2"><span>Submit <i
                                        class="far fa-save"></i></span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
