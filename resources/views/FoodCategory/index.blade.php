@extends('layouts.restaurantApp')
<link rel="stylesheet" href="../css/button.css">

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{-- @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                        
                    @endif --}}
                    <div class="card-header">
                        <a href="foodCategories/create" class="button button2">Add Food Categroy  <i class="fas fa-plus-circle"></i></a>
                    </div>
                    <div class="card-body">
                        <table class="table" id="datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            
                            <tbody>

                                @foreach ($foodCategories as $foodCategory)
                                    <tr>
                                        <td>
                                            {{ $foodCategory->id }}
                                        </td>
                                        <td>
                                            {{ $foodCategory->name }}
                                        </td>
                                        <td>
                                            <img src="{{ asset ($foodCategory->image)}}" width="50" alt=""> 

                                        </td> 
                                        <td>
                                            <a href="/foodCategories/{{ $foodCategory->id }}/edit" class="btn bagde bg-primary">Edit <i class="far fa-edit"></i></a>
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
