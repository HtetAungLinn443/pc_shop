@extends('admin.layout.index')

@section('title', 'Order List')

@section('content')
    <main class="addCategory">
        <div class="back-btn">
            <a href="{{ route('admin#categoryList') }}">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
        </div>
        <div class="addCategory__container">
            <h1 class="addCategory__title">Create Second Category</h1>

            <div class="form">
                <form action="{{ route('admin#updateSecCategory', $second->id) }}" method="post">
                    @csrf
                    <div class="my-2">
                        <label for="mainCategory">Mian Category</label>
                        <select name="firstCategory" id="mainCategory"
                            class="form-control @error('firstCategory') is-invalid @enderror">
                            <option value="">Select Main Category</option>
                            @foreach ($main as $m)
                                <option value="{{ $m->id }}" {{ old('firstCategory') == $m->id ? 'selected' : '' }}
                                    @if ($m->id == $second->main_category_id) selected @endif>
                                    {{ $m->name }}</option>
                            @endforeach
                        </select>
                        @error('firstCategory')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="hidden" name="secondCategoryId" value="{{ $second->id }}">
                    <div class="my-2">
                        <label for="categoryName" class="form-label ">Second Category Name</label>
                        <input type="text" class="form-control @error('secCategory') is-invalid @enderror"
                            name="secCategory" id="categoryName" value="{{ $second->name }}"
                            placeholder="Ender Categorty Name">
                        @error('secCategory')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit">Create</button>
                </form>
            </div>
        </div>
    </main>
@endsection
