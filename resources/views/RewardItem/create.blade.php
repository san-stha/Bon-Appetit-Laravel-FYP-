@extends('layouts.adminApp')
<link rel="stylesheet" href="../css/button.css">

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/rewardItem" class="button button2"><i class="fas fa-arrow-circle-left"></i> Back</a>
                    </div>

                    <div class="card-body">
                        <form action="/rewardItem" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" class="form-control" type="text" name="name" required>
                            </div> 
                            <div class="form-group">
                                <label for="finder">Finder</label>
                                <input id="finder" class="form-control" type="text" name="finder" required>
                            </div> 
                            <div class="form-group">
                                <label for="cost">Cost</label>
                                <input id="cost" class="form-control" type="text" name="cost" required>
                            </div>
                            <div class="form-group">
                                <label for="image">Upload <span class="text-danger">*</span></label>
                                <input id="image" class="form-control-file" type="file" name="image" required>
                            </div> 
                            <button type="submit" class="button button2">Submit <i class="far fa-save"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection