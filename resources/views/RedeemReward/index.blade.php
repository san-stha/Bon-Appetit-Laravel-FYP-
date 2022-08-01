@extends('layouts.restaurantApp')

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
                    <div class="card-body">
                        <table class="table" id="datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Cost</th>
                                    <th>Status</th>
                                    <th>Reward_item_id</th>
                                    <th>User_id</th>
                                    <th>Restaurant_id</th>
                                    <th>Action</th>

                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($redeemRewards as $redeemReward)
                                    <tr>
                                        <td>
                                            {{ $redeemReward->id }}
                                        </td>
                                        <td>
                                            {{ $redeemReward->name }}
                                        </td>
                                        <td>
                                            {{ $redeemReward->cost }}
                                        </td>

                                        @if ($redeemReward->status == 'redeemed')
                                            <td><i class="fa fa-check" style="font-size:24px;color:green;"
                                                    aria-hidden="true" class="success"></i></td>
                                        @else
                                            <td> <i class="fa fa-spinner" style="font-size:24px;color:blue;"
                                                    aria-hidden="true" class="success"></i></td>
                                        @endif

                                        <td>
                                            {{ $redeemReward->reward_item_id }}
                                        </td>
                                        <td>
                                            {{ $redeemReward->user_id }}
                                        </td>
                                        <td>
                                            {{ $redeemReward->restaurant_id }}

                                        </td>
                                        @if ($redeemReward->status == 'redeemed')
                                            <td>
                                                <p>redeemed/uneditable</p>

                                            </td>
                                        @else
                                            <td>
                                                <a href="/redeemReward/{{ $redeemReward->id }}/edit"
                                                    class="btn bagde bg-primary">Edit <i class="far fa-edit"></i></a>
                                            </td>
                                        @endif
                                        {{-- <td>
                                            <a href="/redeemReward/{{ $redeemReward->id }}/edit"
                                                class="btn bagde bg-primary">Edit <i class="far fa-edit"></i></a>
                                        </td> --}}

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
