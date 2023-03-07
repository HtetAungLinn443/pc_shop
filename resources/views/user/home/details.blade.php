@extends('user.layouts.index')

@section('title', 'Product Details')

@section('content')
    <!--========== Body Section ==========-->
    <div class="details__container">
        <div class="details__img">
            <img src="{{ asset('storage/' . $data->product_image) }}" alt="">
        </div>
        <div class="details__info">
            <div class="details__title">
                <div class="details__category">
                    <span>{{ $data->main_category }}</span>,
                    <span>{{ $data->second_category }}</span>
                </div>
                <div class="details__name">
                    {{ $data->name }}
                </div>
                <div class="detalis__brand">
                    <img src="{{ asset('storage/' . $data->brand_image) }}" alt="">
                    <div class="detalis__brand-sold">
                        <span class="avaliable">Availability:</span>
                        @if ($data->stock_count != 0)
                            @if ($data->stock_count <= 5)
                                <span class="sold-out">Only {{ $data->stock_count }} left in stock</span>
                            @else
                                <span class="sold-out">In stock</span>
                            @endif
                        @else
                            <span class="text-danger"><b>Sold Out</b></span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="details__description">

                Brand : {{ $data->brand_name }}
                @foreach ($otherData as $other)
                    | {{ $other->other_name }} : {{ $other->data }}
                @endforeach
            </div>
            <div class="details__price"><span id="details__price">{{ $data->price }}</span> $</div>

            <div class="details__cart">

                <input type="number" class="product_count" name="product_count" min=1 max="{{ $data->stock_count }}"
                    @if ($data->stock_count == 0) value="0" @else value="1" @endif>
                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" id="add_card"
                    @if ($data->stock_count == 0) disabled @endif>
                    <i class="fa-solid fa-cart-arrow-down me-2"></i> Add to cart
                </button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm Cart</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body ">
                            <div class="text-warning alert alert-warning">Are You Sure {{ $data->name }} to
                                Order?
                            </div>
                            <div class="">Total Price is <span id="totalPrice" class="text-danger"></span></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary " id="card_btn">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--========== Specification ==========-->
    <div class="details__specification">
        <div class="details__specification-title">
            <h5>Specification</h5>
        </div>
        <div class="details__specification-box">

            <div class="details__general">
                <div class="details__general-data">
                    <p class="details__general-name">General </p>
                    <p class="details__general-info">
                        Brand: <span>{{ $data->brand_name }}</span> <br> Part Number:
                        <span>{{ $data->path_number }}</span>
                        <br> Barcode: <span>{{ $data->barcode }}</span> <br> Commercial Warranty:
                        <span>{{ $data->commercial_warranty }}</span>
                        <br> Legal
                        Warranty: <span>{{ $data->legal_warranty }}</span>
                    </p>
                </div>
                @foreach ($otherData as $other)
                    <div class="details__general-data">
                        <p class="details__general-name">{{ $other->main }} </p>
                        <p class="details__general-info">{{ $other->other_name }}: <span>{{ $other->data }}</span></p>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!--========== Related Product ==========-->
    <div class="relatedPd__container">
        <!-- Swiper -->
        <h4 class="py-2">Related Product</h4>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach ($relative as $rel)
                    <div class="swiper-slide">
                        <div class="relatedPd__card">
                            <div class="relatedPd__title">
                                <div class="relatedPd__category">
                                    <span>{{ $rel->main_category }}, </span>
                                    <span>{{ $rel->second_category }}</span>
                                </div>
                                <div class="relatedPd__name">
                                    {{ $rel->name }}
                                </div>
                            </div>
                            <div class="relatedPd__img">
                                <img src="{{ asset('storage/' . $rel->product_image) }}" alt="">
                            </div>
                            <div class="relatedPd__footer">
                                <div class="relatedPd__price">{{ $rel->price }} $</div>
                                <a href="{{ route('user#productDetails', $rel->id) }}" class="relatedPd__Btn"><i
                                        class="fa-solid fa-cart-arrow-down"></i></a>
                            </div>

                        </div>
                    </div>
                @endforeach

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <input type="hidden" id="userId" value="{{ Auth::user()->id }}">
    <input type="hidden" id="productId" value="{{ $data->id }}">
@endsection

@section('script')
    <script>
        $(document).ready(function() {


            $('#add_card').click(function() {
                $count = $('.product_count').val();
                $price = $('#details__price').html();
                $totalPrice = $count * $price;

                $('#totalPrice').html($totalPrice)
            })

            $('#card_btn').click(function() {
                $data = {
                    'user_id': $('#userId').val(),
                    'product_id': $('#productId').val(),
                    'count': $('.product_count').val(),
                }

                $.ajax({
                    type: 'get',
                    url: '/user/ajax/addToCard',
                    data: $data,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == 'success') {
                            window.location.href = '/user/homePage';
                        }
                    }
                })
            })
        })
    </script>
@endsection
