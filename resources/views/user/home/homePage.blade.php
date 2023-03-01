@extends('user.layouts.index')

@section('title', 'Home Page')

@section('content')
    <!-- Body -->
    <section class="body px-3">
        <div class="row header">
            <div class="col-3">
                <div class="search-category" id="category-list">
                    <h5 class="text-center">All Category</h5>

                    <ul class="mx-5 list-unstyled">
                        @foreach ($main as $m)
                            <li><a href="{{ route('user#filterCategory', $m->name) }}"
                                    class=" text-decoration-none text-dark">{{ $m->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-xl-9 col-lg-12">

                <div class="slideshow-container">
                    <div class="swiper headerSwiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="{{ asset('image/broadlink.png') }}" alt="">
                            </div>
                            <div class="swiper-slide">
                                <div class="secondImg">
                                    <div class="">
                                        <p class="text-end">
                                            <b>MICROSOFT<br>YOUR </b>LAPTOP, YOUR <br>
                                            LOOK AND <b>STEEK,</b> <br>
                                            <b>BEAUTIFUL</b>
                                            TIMELESS <b>DESIGN</b>
                                        </p>
                                    </div>
                                    <img src="{{ asset('image/Surface-Banner.png') }}" alt="">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('image/dell-slider.png') }}" alt="">
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
            <div class="ph-category">
                Category <i class="fa-solid fa-chevron-down ms-2"></i>
            </div>
        </div>
        <div class="top-box-container mt-4">

            <div class="top-box row" data-aos="zoom-in">
                <div class="top-box-img col-6">
                    <img src="{{ asset('image/kindle-banner.png') }}">
                </div>
                <div class="col-6 top-box-text py-3">
                    <div class="">
                        <p class="">THE <b>BEST</b></p>
                        <p>DEVICE <b>FOR</b></p>
                        <p>READING</p>
                        {{-- <a href="#">Shop Now<i class="fa-solid fa-circle-chevron-right ms-2"></i></a> --}}
                    </div>
                </div>
            </div>

            <div class="top-box row" data-aos="zoom-in">
                <div class="top-box-img col-6">
                    <img src="{{ asset('image/3.png') }}">
                </div>
                <div class="col-6 top-box-text py-3">
                    <div class="">
                        <p class="">BUILD</p>
                        <p>YOUR OWN</p>
                        <p><b>GAMING PC</b></p>
                        {{-- <a href="#">Shop Now<i class="fa-solid fa-circle-chevron-right ms-2"></i></a> --}}
                    </div>
                </div>
            </div>

            <div class="top-box row" data-aos="zoom-in">

                <div class="top-box-img col-6">
                    <img src="{{ asset('image/hocoaccs.png') }}">
                </div>
                <div class="col-6 top-box-text py-3">
                    <div class="">
                        <p>PRIMIUM </p>
                        <p>Accessories</p>
                        <p>from <b>hoco</b></p>
                        {{-- <a href="#">Shop Now<i class="fa-solid fa-circle-chevron-right ms-2"></i></a> --}}
                    </div>
                </div>
            </div>

            <div class="top-box row" data-aos="zoom-in">
                <div class="top-box-img col-6">
                    <img src="{{ asset('image/2.png') }}">
                </div>
                <div class="col-6 top-box-text py-3">
                    <div class="">
                        <p class="">explore</p>
                        <p><b>thinnest</b></p>
                        <p>laptops</p>
                        {{-- <a href="#">Shop Now<i class="fa-solid fa-circle-chevron-right ms-1"></i></a> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Sale Item -->
    <section class="sale-item">
        <div class="item-container">
            <div class="select-item-box">
                <p class="select-item active">Featured</p>
                <p class="select-item ">On Sale</p>
            </div>
        </div>
        <div class="product-container">
            @foreach ($allProducts as $allProduct)
                <div class="product" data-aos="zoom-in-up">
                    <div class="product-info">
                        <div class="category">{{ $allProduct->main_category }}, {{ $allProduct->second_category }}</div>
                        <div class="title">{{ $allProduct->name }}</div>
                    </div>
                    <div class="product-image">
                        <img src="{{ asset('storage/' . $allProduct->product_image) }}" alt="">
                    </div>
                    <div class="product-price">
                        <p>{{ $allProduct->price }} $</p>
                        <a class="buy-btn" href="{{ route('user#productDetails', $allProduct->id) }}"><i
                                class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>
            @endforeach

        </div>
        <!-- Best Deals  -->
        <div class="item-container mt-5">
            <div class="select-item-box">
                <p class="select-item active">Best Deals</p>
                <p class="select-item ">Notebooks</p>
                <p class="select-item ">Computers</p>
            </div>
        </div>
        <div class="best-product-container ">
            <!-- First Product -->
            <div class="first-product">
                @if (isset($bestDeal[0]))
                    <div class="best-product" data-aos="zoom-in-up">
                        <div class="info">
                            <div class="category">
                                {{ $bestDeal[0]->main_category }}, {{ $bestDeal[0]->second_category }}
                            </div>
                            <div class="title">
                                {{ $bestDeal[0]->name }}
                            </div>
                        </div>
                        <div class="image">
                            <img src="{{ asset('storage/' . $bestDeal[0]->product_image) }}">
                        </div>
                        <div class="price">
                            <p>{{ $bestDeal[0]->price }} $</p>
                            <button class="buy-btn"><i class="fa-solid fa-arrow-right-long"></i></button>
                        </div>
                    </div>
                @endif
                @if (isset($bestDeal[1]))
                    <div class="best-product" data-aos="zoom-in-up">
                        <div class="info">
                            <div class="category">
                                {{ $bestDeal[1]->main_category }}, {{ $bestDeal[1]->second_category }}
                            </div>
                            <div class="title">
                                {{ $bestDeal[1]->name }}
                            </div>
                        </div>
                        <div class="image">
                            <img src="{{ asset('storage/' . $bestDeal[1]->product_image) }}">
                        </div>
                        <div class="price">
                            <p>{{ $bestDeal[1]->price }} $</p>
                            <button class="buy-btn"><i class="fa-solid fa-arrow-right-long"></i></button>
                        </div>
                    </div>
                @endif
                @if (isset($bestDeal[2]))
                    <div class="best-product" data-aos="zoom-in-up">
                        <div class="info">
                            <div class="category">
                                {{ $bestDeal[2]->main_category }}, {{ $bestDeal[2]->second_category }}
                            </div>
                            <div class="title">
                                {{ $bestDeal[2]->name }}
                            </div>
                        </div>
                        <div class="image">
                            <img src="{{ asset('storage/' . $bestDeal[2]->product_image) }}">
                        </div>
                        <div class="price">
                            <p>{{ $bestDeal[2]->price }} $</p>
                            <button class="buy-btn"><i class="fa-solid fa-arrow-right-long"></i></button>
                        </div>
                    </div>
                @endif
                @if (isset($bestDeal[3]))
                    <div class="best-product" data-aos="zoom-in-up">
                        <div class="info">
                            <div class="category">
                                {{ $bestDeal[3]->main_category }}, {{ $bestDeal[3]->second_category }}
                            </div>
                            <div class="title">
                                {{ $bestDeal[3]->name }}
                            </div>
                        </div>
                        <div class="image">
                            <img src="{{ asset('storage/' . $bestDeal[3]->product_image) }}">
                        </div>
                        <div class="price">
                            <p>{{ $bestDeal[3]->price }} $</p>
                            <button class="buy-btn"><i class="fa-solid fa-arrow-right-long"></i></button>
                        </div>
                    </div>
                @endif
            </div>
            <!-- Second Product -->
            <div class="second-product">
                @if (isset($bestDeal[4]))
                    <div class="best-product" data-aos="zoom-in-up">
                        <div class="info">
                            <div class="category">
                                {{ $bestDeal[4]->main_category }}, {{ $bestDeal[4]->second_category }}
                            </div>
                            <div class="title">
                                {{ $bestDeal[4]->name }}
                            </div>
                        </div>
                        <div class="image">
                            <img src="{{ asset('storage/' . $bestDeal[4]->product_image) }}">
                        </div>
                        <div class="price">
                            <p>{{ $bestDeal[4]->price }} $</p>
                            <button class="buy-btn"><i class="fa-solid fa-arrow-right-long"></i></button>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Third Product -->
            <div class="third-product">
                @if (isset($bestDeal[5]))
                    <div class="best-product" data-aos="zoom-in-up">
                        <div class="info">
                            <div class="category">
                                {{ $bestDeal[5]->main_category }}, {{ $bestDeal[5]->second_category }}
                            </div>
                            <div class="title">
                                {{ $bestDeal[5]->name }}
                            </div>
                        </div>
                        <div class="image">
                            <img src="{{ asset('storage/' . $bestDeal[5]->product_image) }}">
                        </div>
                        <div class="price">
                            <p>{{ $bestDeal[5]->price }} $</p>
                            <button class="buy-btn"><i class="fa-solid fa-arrow-right-long"></i></button>
                        </div>
                    </div>
                @endif
                @if (isset($bestDeal[6]))
                    <div class="best-product" data-aos="zoom-in-up">
                        <div class="info">
                            <div class="category">
                                {{ $bestDeal[6]->main_category }}, {{ $bestDeal[6]->second_category }}
                            </div>
                            <div class="title">
                                {{ $bestDeal[6]->name }}
                            </div>
                        </div>
                        <div class="image">
                            <img src="{{ asset('storage/' . $bestDeal[6]->product_image) }}">
                        </div>
                        <div class="price">
                            <p>{{ $bestDeal[6]->price }} $</p>
                            <button class="buy-btn"><i class="fa-solid fa-arrow-right-long"></i></button>
                        </div>
                    </div>
                @endif
                @if (isset($bestDeal[7]))
                    <div class="best-product" data-aos="zoom-in-up">
                        <div class="info">
                            <div class="category">
                                {{ $bestDeal[7]->main_category }}, {{ $bestDeal[7]->second_category }}
                            </div>
                            <div class="title">
                                {{ $bestDeal[7]->name }}
                            </div>
                        </div>
                        <div class="image">
                            <img src="{{ asset('storage/' . $bestDeal[7]->product_image) }}">
                        </div>
                        <div class="price">
                            <p>{{ $bestDeal[7]->price }} $</p>
                            <button class="buy-btn"><i class="fa-solid fa-arrow-right-long"></i></button>
                        </div>
                    </div>
                @endif
                @if (isset($bestDeal[8]))
                    <div class="best-product" data-aos="zoom-in-up">
                        <div class="info">
                            <div class="category">
                                {{ $bestDeal[8]->main_category }}, {{ $bestDeal[8]->second_category }}
                            </div>
                            <div class="title">
                                {{ $bestDeal[8]->name }}
                            </div>
                        </div>
                        <div class="image">
                            <img src="{{ asset('storage/' . $bestDeal[8]->product_image) }}">
                        </div>
                        <div class="price">
                            <p>{{ $bestDeal[8]->price }} $</p>
                            <button class="buy-btn"><i class="fa-solid fa-arrow-right-long"></i></button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!-- Home Product -->
    <section class="home-product ">
        <div class="title">
            <h3 class="">Best of Smart Home</h3>
            <div class="category">
                <ul>
                    <li>
                        <a href="#" class="category-btn active">Top 8</a>
                    </li>
                    <li>
                        <a href="#" class="category-btn">Smart Switches</a>
                    </li>
                    <li>
                        <a href="#" class="category-btn">Smart Speakers</a>
                    </li>
                    <li>
                        <a href="#" class="category-btn">Robotic Vacuums</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Start Product -->
        <div class="home-product-container">
            @foreach ($homeProducts as $homeProduct)
                <div class="product " data-aos="zoom-in-up">

                    <div class="image">
                        <img src="{{ asset('storage/' . $homeProduct->product_image) }}" alt="">
                    </div>
                    <div class="info">
                        <div class="category">
                            {{ $homeProduct->main_category }}, {{ $homeProduct->second_category }}
                        </div>
                        <div class="name">
                            {{ $homeProduct->name }}
                        </div>
                        <div class="btn-group">
                            <div class="price">
                                {{ $homeProduct->price }} $
                            </div>
                            <div class="buy">
                                <a href="{{ route('user#productDetails', $homeProduct->id) }}">
                                    <i class="fa fa-cart-shopping"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <!-- End Product -->

        <!-- New Product -->
        <div class="title new-title">
            <h3 class="">New Products</h3>
        </div>
        <div class="new-container">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @foreach ($newProducts as $newProduct)
                        <div class="swiper-slide">
                            <div class="swiper-box">
                                <div class="category">{{ $newProduct->main_category }},
                                    {{ $newProduct->second_category }}</div>
                                <div class="name">{{ $newProduct->name }}</div>
                                <div class="image">
                                    <img src="{{ asset('storage/' . $newProduct->product_image) }}" alt="">
                                </div>
                                <div class="btn-group">
                                    <div class="price">{{ $newProduct->price }} $</div>
                                    <a href="{{ route('user#productDetails', $newProduct->id) }}">
                                        <button class="buy-btn"><i class="fa-solid fa-cart-shopping"></i></button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- <div class="swiper-pagination"></div> -->
            </div>
        </div>
        <!-- New Product End -->
    </section>
@endsection
