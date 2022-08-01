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
                    {{-- <div class="card-header">
                        <a href="restaurant/create" class="btn btn-primary btn-sm">Add Restaurant Detail <i class="fas fa-plus-circle"></i></a>
                    </div> --}}
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
                                        {{-- <td>
                                            <a href="/restaurant/{{ $restaurant->id }}/edit" class="btn bagde bg-primary">Edit <i class="far fa-edit"></i></a>
                                        </td> --}}

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                                <a href="/allUser" class="button button2">
                                    {{-- <i class="nav-icon fas fa-th"></i> --}}
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>
                                        See Customer Details
                                    </p>
                                </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
