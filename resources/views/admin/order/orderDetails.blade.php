@extends('admin.layout.index')

@section('title', 'Order Details Page')

@section('content')
    <main>
        <div class="order-container">
            <div class="back-btn mb-3">
                <a href="{{ route('admin#orderList') }}">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
            </div>
            <div class="orderDetails__con">
                <div class="orderDetails__img">
                    <img src="{{ asset('storage/' . $data->product_image) }}" alt="">
                    <div class="status">
                        <select name="" id="order-select" class="orderStatus form-control">
                            <option value="0" @if ($data->status == 0) selected @endif class="warning">Pending
                            </option>
                            <option value="1" @if ($data->status == 1) selected @endif class="success">Success
                            </option>
                            <option value="2" @if ($data->status == 2) selected @endif class="danger">Hold
                            </option>
                        </select>
                    </div>
                </div>
                <div class="orderDetails__info">
                    <ul class="userInfo">
                        <li>
                            <h1 class="text-center">User Info</h1>
                        </li>
                        <li>
                            UserName : <a href="{{ route('customer#userEditPage', $data->user_id) }}"><b
                                    class="danger">{{ $data->user_name }}</b></a>
                        </li>
                        <li>
                            Email : <b>{{ $data->email }}</b>
                        </li>
                        <li>
                            Phone : <b>{{ $data->phone }}</b>
                        </li>
                        <li>
                            Address : <b>{{ $data->address }}</b>
                        </li>

                    </ul>
                    <ul class="productInfo">

                        <li>
                            <h1 class="text-center">Product Info</h1>
                        </li>
                        <li>
                            Order ID : <b class="orderId">{{ $data->id }}</b>
                        </li>
                        <li>
                            Product Name : <a href="{{ route('admin#productDetails', $data->product_id) }}"><b
                                    class="danger">{{ $data->product_name }}</b></a>
                        </li>
                        <li>
                            Category : <b>{{ $data->main_category }} , {{ $data->second_category }}</b>
                        </li>
                        <li>
                            Brand Name : <b>{{ $data->brand_name }}</b>
                        </li>
                        <li>
                            Count : <b>{{ $data->count }}</b>
                        </li>
                        <li>
                            Total Price : <b>{{ $data->total_amount }} $</b>
                        </li>
                        <li>
                            Order Date : <b>{{ $data->created_at->format('d . F . Y') }}</b>
                        </li>
                        <li>
                            Order Code : <b>{{ $data->order_code }}</b>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.orderStatus').change(function() {

                $id = $('.orderId').text();
                $ststus = $(this).val();

                $.ajax({
                    type: 'get',
                    url: '/order/orderStatusChange',
                    data: {
                        'id': $id,
                        'status': $ststus,
                    },
                    dataType: 'json',

                })
                loction.reload();
            })
        })
    </script>
@endsection
