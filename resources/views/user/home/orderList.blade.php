@extends('user.layouts.index')

@section('content')
    <section class="orderList">
        <h1 class="text-center">Order List</h1>
        <h5 class="btn btn-secondary"><i class="fa-solid fa-clock text-danger me-2"></i> <span id="clock"></span></h5>
        <a href="{{ route('user#orderHistory') }}" class="orderHistoryBtn">
            History
        </a>
        <div class="">
            <table>
                <thead>
                    <tr>
                        <th class="col-1 date">Date</th>
                        <th class="col-3">Product Image</th>
                        <th class="col-2">Name</th>
                        <th class="col-2">Count</th>
                        <th class="col-2">Toatal Price</th>
                        <th class="col-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orderList as $ol)
                        <tr>
                            <td class="date">{{ $ol->created_at->format('m.d.Y') }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $ol->product_image) }}" alt=""
                                    class=" img-thumbnail">
                            </td>
                            <td class="name">{{ $ol->name }}</td>
                            <td>{{ $ol->count }} </td>
                            <td class="price">{{ $ol->total_amount }} $</td>
                            @if ($ol->status == 0)
                                <td class="panding text-primary">Panding</td>
                            @elseif($ol->status == 1)
                                <td class="success text-success">Success</td>
                            @elseif($ol->status == 2)
                                <td class="reject text-danger">Reject</td>
                            @endif

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </section>
@endsection
