@extends('admin.layout.index')

@section('title', 'Edit Main Category Page')

@section('content')
    <main class="addCategory">
        <div class="back-btn">
            <a href="{{ route('admin#categoryList') }}">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
        </div>
        <div class="addCategory__container">
            <h1 class="addCategory__title">Create Main Category</h1>

            <div class="form">
                <form action="{{ route('admin#updateMainCategory', $main->id) }}" method="post">
                    @csrf
                    <label for="categoryName" class="form-label ">Category Name</label>
                    <input type="text" class="form-control @error('categoryName') is-invalid @enderror"
                        name="categoryName" id="categoryName" value="{{ old('categoryName', $main->name) }}"
                        placeholder="Ender Categorty Name" autofocus>
                    @error('categoryName')
                        <div class="error">{{ $message }}</div>
                    @enderror
                    <button type="submit">Create</button>
                </form>
            </div>
        </div>
    </main>
@endsection
