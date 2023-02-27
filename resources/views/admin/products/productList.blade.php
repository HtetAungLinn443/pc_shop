@extends('admin.layout.index')

@section('title', 'Product List')

@section('content')
    <main class="product">
        <div class="product__container">
            <div class="product__header">
                <h1 class="product__title">
                    Products List
                </h1>
                <form action="">
                    <div class="product__search">
                        <input type="text" class="product__input-form" placeholder="Search Products" name="searchData"
                            value="{{ request('searchData') }}">
                        <button class="product__search-btn" type="submit"><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
            </div>
            <div class="product__body">
                <div class="add-product-btn">
                    <a href="{{ route('admin#creatProductPage') }}">
                        <button class="add-btn">
                            Add New Product <i class="fa-solid fa-plus"></i>
                        </button>
                    </a>
                </div>
                @if (session('createSuccess'))
                    <div class="offset-4 col-8">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('createSuccess') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif
                @if (session('deleteSuccess'))
                    <div class="offset-4 col-8">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('deleteSuccess') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif

                <div class="porduct__list-container">

                    <div class="product__list">


                        @if ($products->total() != 0)
                            @foreach ($products as $product)
                                <div class="product__box">
                                    <div class="box-header">
                                        <small>{{ $product->main_category }}, <span>{{ $product->second_category }}</span>
                                        </small>
                                        <h5>{{ $product->name }}</h5>
                                    </div>
                                    <div class="box-img">
                                        <img src="{{ asset('storage/' . $product->product_image) }}" alt="">
                                    </div>
                                    <div class="box-btn">
                                        <a href="{{ route('admin#productDetails', $product->id) }}" class="view">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin#productDelete', $product->id) }}" class="delete">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            @if (request('searchData'))
                                <h1 class="text-danger fs-1">There is no <span
                                        class="bolder">{{ request('searchData') }}</span> Products</h1>
                            @else
                                <h1 class="text-danger fs-1">There is no Products</h1>
                            @endif

                        @endif

                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
