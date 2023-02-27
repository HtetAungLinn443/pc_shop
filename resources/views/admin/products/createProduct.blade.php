@extends('admin.layout.index')

@section('title', 'Add Main Category Page')

@section('content')
    <main class="addProduct">

        <div class=" p-5 shadow rounded">
            <div class="back-btn ">
                <a href="{{ route('admin#productListPage') }}">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
            </div>
            <div class="row justify-content-center">
                <div class="card-header text-center h2 createProductTitle">Add Product Page</div>

                <div class="card-body mt-5">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{ route('admin#createProduct') }}" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="input-group my-2 row">
                                    <div class="col-12">
                                        <label for="productName" class="form-label col-12">Name</label>
                                        <input type="text" name="productName" id="productName"
                                            class="form-control rounded col-12" placeholder="Product Name"
                                            value="{{ old('productName') }}">
                                    </div>
                                    @error('productName')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-group my-2 row">
                                    <div class="col-6">
                                        <div class="">
                                            <label for="productImage" class="form-label col-12">Product Image</label>
                                            <input type="file" name="productImage" id="productImage"
                                                class="form-control rounded col-12" value="{{ old('productImage') }}">
                                        </div>
                                        @error('productImage')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label for="price" class="form-label col-12">Product Prize</label>
                                        <input type="text" name="price" id="price" class="form-control rounded"
                                            placeholder="Ender Product Prize" value="{{ old('price') }}">
                                        @error('price')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="input-group my-2 row">
                                    <div class="col-6">
                                        <label for="mainCategory" class="form-label col-12">Main Category</label>
                                        <select name="mainCategory" class="form-control mainCategory">
                                            <option value="">Choose Main Category</option>
                                            @foreach ($mains as $main)
                                                <option value="{{ $main->name }}"
                                                    {{ old('mainCategory') == $main->name ? 'selected' : '' }}>
                                                    {{ $main->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('mainCategory')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label for="secondCategory" class="form-label col-12">Second Category</label>
                                        <select name="secondCategory" id="secondCategory"
                                            class="secondCategory form-control">
                                            <option value="">Choose Second Category</option>
                                            @foreach ($seconds as $second)
                                                <option value="{{ $second->name }}"
                                                    {{ old('secondCategory') == $second->name ? 'selected' : '' }}>
                                                    {{ $second->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('secondCategory')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="input-group my-2 row">
                                    <div class="col-6">
                                        <label for="brandName" class="form-label col-12">Brand Name</label>
                                        <input type="text" name="brandName" id="brandName" class="form-control rounded"
                                            placeholder="Brand Name" value="{{ old('brandName') }}">
                                        @error('brandName')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label for="brandImage" class="form-label col-12">Brand Image</label>
                                        <input type="file" name="brandImage" id="brandImage" class="form-control rounded"
                                            value="{{ old('brandImage') }}">
                                        @error('brandImage')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="input-group my-2 row">
                                    <div class="col-6">
                                        <label for="pathNumber" class="form-label col-12">Path Number</label>
                                        <input type="text" name="pathNumber" id="pathNumber" class="form-control rounded"
                                            placeholder="Path Number" value="{{ old('pathNumber') }}">
                                        @error('pathNumber')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label for="barcode" class="form-label col-12">Barcode</label>
                                        <input type="text" name="barcode" id="barcode" class="form-control rounded"
                                            placeholder="Barcode" value="{{ old('barcode') }}">
                                        @error('barcode')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="input-group my-2 row">
                                    <div class="col-4">
                                        <label for="commercial" class="form-label col-12">Commercial Warranty</label>
                                        <input type="text" name="commercialWarranty" id="commercial"
                                            class="form-control rounded" placeholder="Commercial Warranty"
                                            value="{{ old('commercialWarranty') }}">
                                        @error('commercialWarranty')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-4">
                                        <label for="legal" class="form-label col-12">Legal Warranty</label>
                                        <input type="text" name="legalWarranty" id="legal"
                                            class="form-control rounded" placeholder="Commercial Warranty"
                                            value="{{ old('legalWarranty') }}">
                                        @error('legalWarranty')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-4">
                                        <label for="stock" class="form-label col-12">Stock Count</label>
                                        <input type="number" name="stockCount" id="stock"
                                            class="form-control rounded" placeholder="Ender Stock Count "
                                            value="{{ old('stockCount') }}">
                                        @error('stockCount')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <hr>
                                <div class="mainOtherData">
                                    <div class="other-data d-flex justify-content-between">
                                        <h5>Other Data</h5>
                                    </div>
                                    <div class="" id="otherGroup">

                                        <div class="input-parent">
                                            <div class="input-group my-2 row other" id="row ' + count + '">
                                                <div class="col-2">
                                                    <label for="" class="form-label col-12">Main Name</label>
                                                    <input type="text" name="mainName[]" class="form-control rounded"
                                                        placeholder="Main Name">
                                                    @error('mainName[]')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-4">
                                                    <label for="" class="form-label col-12">Name</label>
                                                    <input type="text" name="dataName[]" class="form-control rounded"
                                                        placeholder="Name">
                                                    @error('dataName[]')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-5">
                                                    <label for="" class="form-label col-12">Data</label>
                                                    <input type="text" name="dataInfo[]" class="form-control rounded"
                                                        placeholder="Data">
                                                    @error('dataInfo[]')
                                                        <div class="text-danger mt-2 mb-3">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-1 mt-2">
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button"
                                            class="btn btn-primary d-flex align-items-center rounded px-3"
                                            id="addOtherData">
                                            <i class="fa-solid fa-plus me-1"></i>
                                            Add
                                        </button>
                                    </div>
                                    <div class="my-4">
                                        <button class="btn btn-primary btn-lg col-6 offset-3 " type="submit">
                                            Create
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
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            // Add Product Form
            var count = 1;
            $('#addOtherData').click(function() {
                count = count + 1;
                var html_code = '<div class="input-group my-2 row" id="row' +
                    count + '">';
                html_code += '<div class="col-2">'
                html_code += '<label for="" class="form-label col-12">Main Name</label>'
                html_code +=
                    '<input type="text" name="mainName[]" class="form-control rounded" placeholder="Main Name" >'
                html_code += '</div>'
                html_code += '<div class="col-4">';
                html_code += '<label class="form-label col-12">Name</label>'
                html_code +=
                    '<input type="text" name="dataName[]"  class="form-control rounded" placeholder="Name">'
                html_code += '</div>'
                html_code += '<div class="col-5">'
                html_code += '<label class="form-label col-12">Data</label>'
                html_code +=
                    '<input type="text" name="dataInfo[]"  class="form-control rounded" placeholder="Data">'
                html_code += '</div>'
                html_code += '<div class="col-1 mt-2">'
                html_code += '<br>'
                html_code +=
                    '<button type="button" class="btn btn-danger d-flex align-items-center rounded remove" data-row="row' +
                    count + '">'
                html_code += 'Remove'
                html_code += '</button>'
                html_code += '</div>'
                html_code += '</div>'
                $('.input-parent').append(html_code);

            });
            $(document).on('click', '.remove', function() {
                var delete_row = $(this).data('row');
                $("#" + delete_row).remove();
            });


        })
    </script>
@endsection
