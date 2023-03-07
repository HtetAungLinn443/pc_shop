@extends('admin.layout.index')

@section('title', 'Order List Page')

@section('content')
    <main>
        <div class="order-container">
            <div class="order__header">
                <h3>Order List</h3>
                <div class="order__count-box">
                    <div class="order__card">
                        <h2 class="primary">{{ $orders->total() }}</h2>
                        <p class="">Total Orders</p>
                    </div>
                    <div class="order__card">
                        <h2 class="success">{{ $totalDeliver }}</h2>
                        <p class="">Total Delivered</p>
                    </div>
                    <div class="order__card">
                        <h2 class="warning">{{ $totalPanding }}</h2>
                        <p class="">Panding Orders</p>
                    </div>
                    <div class="order__card">
                        <h2 class="danger">{{ $totalHold }}</h2>
                        <p class="">Orders Hold</p>
                    </div>
                </div>
            </div>
            @if (session('deleteOrder'))
                <div class=" offset-6 col-md-6 ">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fa-solid fa-triangle-exclamation me-3"></i>{{ session('deleteOrder') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            @if ($orders->total() == 0)
                <h1 class="text-center py-4 my-5 bg-warning rounded text-danger shadow">There is No Order</h1>
            @else
                <div class="pagination__color">
                    {{ $orders->links() }}
                </div>
                <table class="order__table">
                    <thead>
                        <tr>
                            <th class="order__id">Order ID</th>
                            <th class="order__user-name">User Name</th>

                            <th class="order__product-name">Product Name</th>
                            <th class="order__date">Order Date</th>
                            <th class="order__amount">Amount</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td class="orderId">{{ $order->order_id }}</td>
                                <td>
                                    {{ $order->email }}
                                </td>

                                <td>
                                    {{ $order->product_name }}
                                </td>
                                <td class="order__date">
                                    {{ $order->created_at->format('d.m.Y') }}
                                </td>
                                <td>
                                    ${{ $order->total_amount }}
                                </td>
                                <td>
                                    @if ($order->status == 0)
                                        Panding
                                    @elseif ($order->status == 1)
                                        Success
                                    @elseif ($order->status == 2)
                                        Hold
                                    @endif
                                </td>
                                <td class="d-flex gap-1">
                                    <a href="{{ route('admin#orderDetailsPage', $order->order_id) }}"
                                        class="order__details"><i class="fa-solid fa-eye"></i></a>
                                    <a href="{{ route('admin#deleteOrder', $order->order_id) }}"
                                        class="btn btn-sm btn-danger">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>


                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>

            @endif
        </div>
    </main>

@endsection
