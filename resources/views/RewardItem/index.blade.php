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
                        <a href="rewardItem/create" class="button button2">Add Reward Item<i
                                class="fas fa-plus-circle"></i></a>
                    </div>
                    <div class="card-body">
                        <table class="table" id="datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Finder</th>
                                    <th>Gems Cost</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($rewardItems as $rewardItem)
                                    <tr>
                                        <td>
                                            {{ $rewardItem->id }}
                                        </td>
                                        <td>
                                            {{ $rewardItem->name }}
                                        </td>
                                        <td>
                                            {{ $rewardItem->finder }}
                                        </td>
                                        <td>
                                            {{ $rewardItem->cost }}
                                        </td>
                                        <td>
                                            <img src="{{ asset($rewardItem->image) }}" width="50" alt="">

                                        </td>
                                        <td>
                                            <a href="/rewardItem/{{ $rewardItem->id }}/edit"
                                                class="btn bagde bg-primary">Edit <i class="far fa-edit"></i></a>
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
