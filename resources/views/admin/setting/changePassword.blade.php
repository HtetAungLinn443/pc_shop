@extends('admin.layout.index')

@section('title', 'Settings')

@section('content')
    <main class="setting">
        <div class="changePw__container">
            <div class="back-btn">
                <a href="{{ route('setting#list') }}">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
            </div>
            <h1>Change Password Page</h1>
            @if (session('notMatch'))
                <div class="col-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fa-solid fa-triangle-exclamation me-2"></i> {{ session('notMatch') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            <div class="inputGroup ">
                <form action="{{ route('setting#changePassword') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="oldPassword" class=" form-label">Old Password</label>
                        <input type="password" name="oldPassword" id="oldPassword" class=" form-control"
                            placeholder="Ender Old Password">
                        @error('oldPassword')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="newPassword" class=" form-label">New Password</label>
                        <input type="password" name="newPassword" id="newPassword" class=" form-control"
                            placeholder="Ender New Password">
                        @error('newPassword')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class=" form-label">New Password Again</label>
                        <input type="password" name="confirmPassword" id="confirmPassword" class=" form-control"
                            placeholder="Ender New Password Again">
                        @error('confirmPassword')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <button type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
