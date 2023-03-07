@extends('admin.layout.index')

@section('title', 'Product Details')

@section('content')
    <main class="product-details p-3">
        <div class=" container-fluid ">
            <div class="back-btn mb-3">
                <a href="{{ route('admin#productListPage') }}">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
            </div>
            <div class="card-container">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <img src="{{ asset('storage/' . $data->product_image) }}" class="img-thumbnail details-img">
                            </div>
                            <div class="col-lg-8 col-md-6">
                                <div class="">
                                    <small class="my-1">
                                        {{ $data->main_category }},
                                        <span>{{ $data->second_category }}</span>
                                    </small>
                                    <div class="fs-5 my-1">
                                        <p>{{ $data->name }}</p>
                                    </div>
                                    <div class="col-2 my-1">
                                        <img src="{{ asset('storage/' . $data->brand_image) }}" alt=""
                                            style="width:50px;">
                                    </div>

                                    <div class="mt-2 row">
                                        <p class="col-4 h5 "><span>Price : {{ $data->price }} $</span></p>
                                        <p class="col-4 text-muted fs-6 "><span>Stock Count :
                                                {{ $data->stock_count }}</span></p>
                                    </div>
                                    <div class="mt-4">
                                        <a href="{{ route('admin#editProduct', $data->id) }}" class="btn btn-primary">
                                            <i class="fa-solid fa-pen-to-square me-2"></i> Edit
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 my-3">
                        <h2 class="text-center">Specification</h2>
                        <div class="d-flex justify-content-center mt-3 card ">
                            <div class="row details__card-info">
                                <div class="col-4 d-flex align-items-center" style="height:auto">
                                    <h3 class="fs-6">General</h3>
                                </div>
                                <div class="col-8">
                                    <div class="fs-7">Brand: <span class="">{{ $data->brand_name }}</span>
                                    </div>
                                    <div class="fs-7">Part Number: <span class="">{{ $data->path_number }}</span>
                                    </div>
                                    <div class="fs-7">Barcode: <span class=" ">{{ $data->barcode }}</span>
                                    </div>
                                    <div class="fs-7">Commercial Warranty: <span
                                            class="">{{ $data->commercial_warranty }}</span>
                                    </div>
                                    <div class="fs-7">Legal Warranty: <span
                                            class="">{{ $data->legal_warranty }}</span>
                                    </div>
                                </div>
                            </div>

                            @foreach ($otherData as $d)
                                <div class="row p-3 details__card-info">
                                    <div class="col-4 d-flex align-items-center" style="height:auto">
                                        <h3 style="font-weight: 700">{{ $d->item }}</h3>
                                    </div>
                                    <div class="col-8">
                                        <div class="fs-7" style="font-weight: 600">{{ $d->other_name }}: <span
                                                class=" text-muted" style="font-weight: 500">{{ $d->data }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
