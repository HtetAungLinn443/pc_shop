@extends('user.layouts.index')

@section('title', 'Product List')

@section('content')
    <section class="product__container">
        <div class="product__main">
            <div class="product__category">

                <ul class="main-category">
                    <li>
                        <a href="{{ route('user#homePage') }}">Home Page</a>
                    </li>
                    </li>
                    @foreach ($mainCategory as $main)
                        <li>
                            <a href="{{ route('user#filterCategory', $main->name) }}"
                                class=" @if ($main->name == $filterCategory[0]->main_category) active @endif">{{ $main->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="product__item">

                @if ($filterCategory->count() != 0)
                    <div class="product__item-title">
                        <h4>{{ $filterCategory[0]->main_category }}</h4>
                    </div>
                    {{ $filterCategory->links() }}
                    <div class="product__item-container">
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
                    There is no product
                @endif
            </div>
        </div>
    </section>
@endsection
