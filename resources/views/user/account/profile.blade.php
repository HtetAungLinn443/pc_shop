@extends('user.layouts.index')

@section('title', 'Profile')

@section('content')
    <section class="userProfile">

        <div class="profileCart">
            <h2>My Profile</h2>
            @if (session('updateSuccess'))
                <div class="offset-4 col-8">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('updateSuccess') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            <div class="image">
                @if (Auth::user()->image != null)
                    <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="">
                @else
                    <img src="{{ asset('admin/image/default_user.webp') }}" alt="">
                @endif
            </div>
            <div class="info">
                <div class="">
                    <div class="name my-2">
                        <span class="">Name <i class="fa-regular fa-square-caret-down ms-2"></i></span>
                        <div class="">{{ Auth::user()->name }}</div>
                    </div>
                    <div class="email my-2">
                        <span class="">Email <i class="fa-regular fa-square-caret-down ms-2"></i></span>
                        <div class="">{{ Auth::user()->email }}</div>
                    </div>
                    <div class="phone my-2">
                        <span class="">Phone <i class="fa-regular fa-square-caret-down ms-2"></i></span>
                        <div class="">{{ Auth::user()->phone }}</div>
                    </div>
                    <div class="address my-2">
                        <span class="">Address <i class="fa-regular fa-square-caret-down ms-2"></i></span>
                        <div class="">{{ Auth::user()->address }}</div>
                    </div>
                    <div class="gender my-2">
                        <span class="">Name <i class="fa-regular fa-square-caret-down ms-2"></i></span>
                        <div class=" text-capitalize">{{ Auth::user()->gender }}</div>
                    </div>
                </div>
            </div>
            <div class="edit mt-4">
                <a href="{{ route('user#editProfile') }}" class="editBtn">Edit</a>
            </div>
        </div>
    </section>
@endsection
