@extends('user.layouts.index')

@section('content')
    <section class="editProfile">
        <form action="{{ route('user#editProfileData') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="editForm">
                <h2>Edit Profile</h2>
                <div class="inputGroup my-2">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name"
                        class="form-control @error('name') is-invalid @enderror" placeholder="Ender Your Name"
                        value="{{ old('name', Auth::user()->name) }}">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="inputGroup my-2">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email"
                        class="form-control @error('email') is-invalid @enderror" placeholder="Ender Your Email"
                        value="{{ old('email', Auth::user()->email) }}">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="inputGroup my-2">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" id="image"
                        class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="inputGroup my-2">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="number" name="phone" id="phone"
                        class="form-control @error('phone') is-invalid @enderror" placeholder="Ender Your Phone Number"
                        value="{{ old('phone', Auth::user()->phone) }}">
                    @error('phone')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="inputGroup my-2">
                    <label for="address" class="form-label">Address</label>
                    <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror" cols="25"
                        rows="7" placeholder="Ender Your Address">{{ old('address', Auth::user()->address) }}</textarea>
                    @error('address')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="inputGroup my-2">
                    <label for="gender" class=" form-label">Gender</label>
                    <select name="gender" id="gender" class=" form-control @error('gender') is-invalid @enderror">
                        <option value="">Choose Gender</option>
                        <option value="male" @if (Auth::user()->gender == 'male') selected @endif>Male</option>
                        <option value="female" @if (Auth::user()->gender == 'female') selected @endif>Femail</option>
                    </select>
                    @error('gender')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="">
                    <button class="profileUpdateBtn col-12">Update</button>
                </div>
            </div>
        </form>
    </section>
@endsection
