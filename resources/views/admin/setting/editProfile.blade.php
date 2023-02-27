@extends('admin.layout.index')

@section('title', 'Settings')

@section('content')
    <main class="setting">
        <div class="">
            <div class="back-btn">
                <a href="{{ route('setting#profile') }}">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
            </div>
            <h1 class="text-center">Edit Profile Page</h1>
            <form action="{{ route('setting#updateProfile') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="editProfile">
                    <div class="image-side">
                        @if (Auth::user()->image == null)
                            <img src="{{ asset('admin/image/pp.jpg') }}" alt="{{ Auth::user()->name }}">
                        @else
                            <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="{{ Auth::user()->name }}">
                        @endif
                        <div class="mb-3">
                            <label for="" class="form-label">Image</label>
                            <input type="file" class="form-control" name="image"
                                value="{{ old('name', Auth::user()->name) }}">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="input-side">
                        <div class="mb-3">
                            <label for="username" class="form-label">Name</label>
                            <input type="text" id="username" class="form-control" name="username"
                                value="{{ old('username', Auth::user()->name) }}">
                            @error('username')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" id="email" class="form-control" name="email"
                                value="{{ old('email', Auth::user()->email) }}">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" id="phone" class="form-control" name="phone"
                                value="{{ old('phone', Auth::user()->phone) }}">
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" id="address" class="form-control" name="address"
                                value="{{ old('address', Auth::user()->address) }}">
                            @error('address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="" {{ old('gender') == '' ? 'selected' : '' }}>Select Gender</option>
                                <option value="male" @if (Auth::user()->gender == 'male') selected @endif
                                    {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" @if (Auth::user()->gender == 'female') selected @endif
                                    {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('gender')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="update-btn">Update</button>
                        </div>

                    </div>

                </div>
            </form>
        </div>
    </main>
@endsection
