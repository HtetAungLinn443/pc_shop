@extends('user.layouts.index')

@section('content')
    <section class="cart">
        <h1 class="cart_title">Cart</h1>
        <div class="cart__table">
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartData as $cd)
                        <tr>
                            <input type="hidden" value="{{ $cd->product_id }}" class="productId">
                            <td class="col-6 product">
                                <div class="product__main">
                                    <img src="{{ asset('storage/' . $cd->product_image) }}" alt="">
                                    <div class="name">{{ $cd->name }}</div>
                                </div>
                            </td>
                            <td class="col-2 db-totalPrice">{{ $cd->price }} $</td>
                            <td class="col-2">
                                <input type="number" min="0" class="count" value="{{ $cd->count }}">
                            </td>
                            <td class="col-2 subTotal">{{ $cd->price * $cd->count }} $</td>
                            <td>
                                <button class="removeBtn">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        <div class="">
            <h1 class="m-3">Cart Totals</h1>
            <div class="cartTotal">
                <div class="row cartPrice">
                    <div class="col-6 h5">
                        Subtotal
                    </div>
                    <div class="col-6 allPrice">
                        {{ $totalPrice }} $
                    </div>
                </div>
                <div class="row cartPrice">
                    <div class="col-6 h5">
                        Shipping Fee
                    </div>
                    <div class="col-6">
                        5 $
                    </div>
                </div>
                <div class="row cartPrice">
                    <div class="col-6 h5 ">
                        Total
                    </div>

                    @if ($totalPrice != 0)
                        <div class="col-6 h5 finalPrice">{{ $totalPrice + 5 }} $</div>
                    @else
                        <div class="col-6 h5 finalPrice">0 $</div>
                    @endif
                </div>
                <button class="orderBtn">Order</button>
            </div>


        </div>
    </section>

    <input type="hidden" class="userId" value="{{ Auth::user()->id }}">
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.count').on('change', function() {

                $parentNode = $(this).parents('tr');
                $count = $(this).val();
                $price = Number($parentNode.find('.db-totalPrice').html().replace('$', ''));
                $totalPrice = $count * $price;
                $parentNode.find('.subTotal').html($totalPrice + ' $');

                calPrice();
            })
            $('.count').on('keypress', function() {

                $parentNode = $(this).parents('tr');
                $count = $(this).val();
                $price = Number($parentNode.find('.db-totalPrice').html().replace('$', ''));
                $totalPrice = $count * $price;
                $parentNode.find('.subTotal').html($totalPrice + ' $');

                calPrice();
            })
            $('.removeBtn').click(function() {
                $parentNode = $(this).parents('tr');
                $parentNode.remove();
                calPrice();
            })

            function calPrice() {
                $finalPrice = 0;
                $('.cart__table tbody tr').each(function(index, row) {
                    $finalPrice += Number($(row).find('.subTotal').text().replace('$', ''));
                })

                $('.allPrice').html(`${$finalPrice} $`);
                if ($finalPrice + 5 == 5) {
                    $('.finalPrice').html(`0 $`);
                } else {
                    $('.finalPrice').html(`${$finalPrice + 5} $`);
                }

            }

            $('.orderBtn').on('click', function() {
                $userId = $('.userId').val();
                $orderList = [];

                $random = Math.floor(Math.random() * 1000000001);

                $('.cart__table tbody tr').each(function(index, row) {
                    $orderList.push({
                        'user_id': $('.userId').val(),
                        'product_id': $(row).find('.productId').val(),
                        'count': $(row).find('.count').val(),
                        'total_amount': $(row).find('.subTotal').html().replace('$', ''),
                        'order_code': 'PCShop_' + $random,
                    })
                })

                $.ajax({
                    type: 'get',
                    url: '/user/ajax/order',
                    data: Object.assign({}, $orderList),
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == "true") {
                            window.location.href = '/user/homePage';
                        }
                    }
                })
            })

        })
    </script>
@endsection
