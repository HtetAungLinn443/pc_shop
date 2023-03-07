@extends('admin.layout.index')

@section('title', 'Edit Product Page')

@section('content')
    <main class="addProduct">

        <div class=" p-5 shadow rounded">

            <div class="row justify-content-center">
                <div class="card-header text-center h2 createProductTitle">Edit Product Page</div>

                <div class="card-body mt-5">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{ route('admin#editUpdateData') }}" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="input-group my-2 row">
                                    <div class="col-12">
                                        <label for="productName" class="form-label col-12">Name</label>
                                        <input type="text" name="productName" id="productName"
                                            class="form-control rounded col-12" placeholder="Product Name"
                                            value="{{ old('productName', $data->name) }}">
                                    </div>
                                    @error('productName')
                                        <div class="text-danger">{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="input-group my-2 row">
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="">
                                            <label for="productImage" class="form-label col-12">Product Image</label>
                                            <input type="file" name="productImage" id="productImage"
                                                class="form-control rounded col-12"
                                                value="{{ old('productImage', $data->product_image) }}">
                                        </div>
                                        @error('productImage')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                        <label for="price" class="form-label col-12">Product Prize</label>
                                        <input type="text" name="price" id="price" class="form-control rounded"
                                            placeholder="Ender Product Prize" value="{{ old('price', $data->price) }}">
                                        @error('price')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="input-group my-2 row">
                                    <div class="col-lg-6 col-sm-12">
                                        <label for="mainCategory" class="form-label col-12">Main Category</label>
                                        <select name="mainCategory" class="form-control mainCategory">
                                            <option value="">Choose Main Category</option>
                                            @foreach ($mains as $main)
                                                <option value="{{ $main->name }}"
                                                    {{ old('mainCategory') == $main->name ? 'selected' : '' }}
                                                    {{ $main->name == $data->main_category ? 'selected' : '' }}>
                                                    {{ $main->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('mainCategory')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                        <label for="secondCategory" class="form-label col-12">Second Category</label>
                                        <select name="secondCategory" id="secondCategory"
                                            class="secondCategory form-control">
                                            <option value="">Choose Second Category</option>
                                            @foreach ($seconds as $second)
                                                <option value="{{ $second->name }}"
                                                    {{ old('secondCategory') == $second->name ? 'selected' : '' }}
                                                    {{ $second->name == $data->second_category ? 'selected' : '' }}>
                                                    {{ $second->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('secondCategory')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="input-group my-2 row">
                                    <div class="col-lg-6 col-sm-12">
                                        <label for="brandName" class="form-label col-12">Brand Name</label>
                                        <input type="text" name="brandName" id="brandName" class="form-control rounded"
                                            placeholder="Brand Name" value="{{ old('brandName', $data->brand_name) }}">
                                        @error('brandName')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                        <label for="brandImage" class="form-label col-12">Brand Image</label>
                                        <input type="file" name="brandImage" id="brandImage" class="form-control rounded"
                                            value="{{ old('brandImage', $data->brand_image) }}">
                                        @error('brandImage')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="input-group my-2 row">
                                    <div class="col-lg-6 col-sm-12">
                                        <label for="pathNumber" class="form-label col-12">Path Number</label>
                                        <input type="text" name="pathNumber" id="pathNumber" class="form-control rounded"
                                            placeholder="Path Number" value="{{ old('pathNumber', $data->path_number) }}">
                                        @error('pathNumber')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                        <label for="barcode" class="form-label col-12">Barcode</label>
                                        <input type="text" name="barcode" id="barcode" class="form-control rounded"
                                            placeholder="Barcode" value="{{ old('barcode', $data->barcode) }}">
                                        @error('barcode')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="input-group my-2 row">
                                    <div class="col-lg-4 col-sm-12">
                                        <label for="commercial" class="form-label col-12">Commercial Warranty</label>
                                        <input type="text" name="commercialWarranty" id="commercial"
                                            class="form-control rounded" placeholder="Commercial Warranty"
                                            value="{{ old('commercialWarranty', $data->commercial_warranty) }}">
                                        @error('commercialWarranty')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                        <label for="legal" class="form-label col-12">Legal Warranty</label>
                                        <input type="text" name="legalWarranty" id="legal"
                                            class="form-control rounded" placeholder="Commercial Warranty"
                                            value="{{ old('legalWarranty', $data->legal_warranty) }}">
                                        @error('legalWarranty')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                        <label for="stock" class="form-label col-12">Stock Count</label>
                                        <input type="number" name="stockCount" id="stock"
                                            class="form-control rounded" placeholder="Ender Stock Count "
                                            value="{{ old('stockCount', $data->stock_count) }}">
                                        @error('stockCount')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="{{ $data->id }}">
                                <input type="hidden" name="mainId" value="{{ $data->mainId }}">
                                <hr>
                                <div class="mainOtherData">
                                    <div class="other-data d-flex justify-content-between">
                                        <h5>Other Data</h5>
                                    </div>
                                    <div class="" id="otherGroup">
                                        @foreach ($otherData as $other)
                                            <div class="input-parent my-3">
                                                <div class="input-group my-2 row other" id="row ' + count + '">
                                                    <div class="col-lg-2 col-sm-6">
                                                        <label for="" class="form-label col-12">Main Name</label>
                                                        <input type="text" name="mainName[]"
                                                            class="form-control rounded"
                                                            value="{{ old('mainName[]', $other->main) }}"
                                                            placeholder="Main Name">

                                                        @error('mainName.*')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6">
                                                        <label for="" class="form-label col-12">Name</label>
                                                        <input type="text" name="dataName[]"
                                                            class="form-control rounded"
                                                            value="{{ old('dataName[]', $other->other_name) }}"
                                                            placeholder="Name">
                                                        @error('dataName.*')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-6 col-sm-12">
                                                        <label for="" class="form-label col-12">Data</label>
                                                        <input type="text" name="dataInfo[]"
                                                            class="form-control rounded"
                                                            value="{{ old('datainfo[]', $other->data) }}"
                                                            placeholder="Data">
                                                        @error('dataInfo.*')
                                                            <div class="text-danger mt-2 mb-3">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <input type="hidden" name="otherId[]" value="{{ $other->id }}">
                                                </div>
                                            </div>
                                            <hr>
                                        @endforeach

                                    </div>
                                    <div class="my-4">
                                        <button class="btn btn-primary btn-lg col-6 offset-3" type="submit">
                                            Update
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <input type="hidden" name="product_id" value="{{ $data->id }}">
@endsection
