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
                        <a href="restaurantCategory/create" class="button button2"> Add Restaurant Categrory <i class="fas fa-plus-circle"></i></a>
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

                                @foreach ($restaurantCategories as $restaurantCategory)
                                    <tr>
                                        <td>
                                            {{ $restaurantCategory->id }}
                                        </td>
                                        <td>
                                            {{ $restaurantCategory->name }}
                                        </td>
                                        <td>
                                            <img src="{{ asset ($restaurantCategory->image)}}" width="50" alt=""> 

                                        </td> 
                                        <td>
                                            <a href="/restaurantCategory/{{ $restaurantCategory->id }}/edit" class="btn bagde bg-primary">Edit <i class="far fa-edit"></i></a>
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
