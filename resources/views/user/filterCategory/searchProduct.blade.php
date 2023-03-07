@extends('user.layouts.index')

@section('title', 'Product List')

@section('content')
    <section class="product__container">
        <div class="product__main">

            <div class="product__itemData">
                <div class="product__item-title">
                    <h4>{{ $filterCategory[0]->second_category }}</h4>
                </div>
                @if ($filterCategory->count() != 0)
                    <div class="my-2">
                        {{ $filterCategory->links() }}
                    </div>

                    <div class="product__item-container ">

                        @foreach ($filterCategory as $fc)
                            <div class="product__item-box">
                                <div class="product__item-category">
                                    <span>{{ $fc->main_category }}</span>,
                                    <span>{{ $fc->second_category }}</span>
                                </div>
                                <div class="product__name">{{ $fc->name }}</div>
                                <div class="product__img">
                                    <img src="{{ asset('storage/' . $fc->product_image) }}" alt="">
                                </div>
                                <div class="product__price">
                                    <span>{{ $fc->price }} $</span>
                                    <a href="{{ route('user#productDetails', $fc->id) }}"><i
                                            class="fa-solid fa-cart-arrow-down"></i></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="d-flex align-items-center justify-content-center" style="height:80vh;">
                        <h1 class="text-secondary">Ther is No {{ request('searchData') }} Products !</h1>
                    </div>
                @endif

            </div>
        </div>
    </section>
@endsection
