@extends('layouts.restaurantApp')
<link rel="stylesheet" href="../css/button.css">

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-14">
                <div class="card">
                    @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                        
                    @endif
                    <div class="card-header">
                        <a href="restaurants/create" class="button button2"><span>Add Restaurant Detail <i class="fas fa-plus-circle"></i></span></a>
                    </div>
                    <div class="card-body">
                        <table class="table" id="datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Phone number</th>
                                    <th>Description</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            
                            <tbody>

                                @foreach ($restaurants as $restaurant)
                                    <tr>
                                        <td>
                                            {{ $restaurant->id }}
                                        </td>
                                        <td>
                                            {{ $restaurant->name }}
                                        </td>
                                        <td>
                                            {{ $restaurant->address }}
                                        </td>
                                        <td>
                                            {{ $restaurant->phone_number }}
                                        </td>
                                        <td>
                                            {!! $restaurant->description !!}
                                        </td>
                                        <td>
                                            {{ $restaurant->latitude }}
                                        </td>
                                        <td>
                                            {{ $restaurant->longitude }}
                                        </td>
                                        <td>
                                            {{ $restaurant->restaurantCategory->name }}
                                        </td>
                                        <td>
                                            <img src="{{ asset ($restaurant->image)}}" width="50" alt=""> 

                                        </td> 
                                        <td>
                                            <a href="/restaurants/{{ $restaurant->id }}/edit" class="btn bagde bg-primary">Edit <i class="far fa-edit"></i></a>
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
