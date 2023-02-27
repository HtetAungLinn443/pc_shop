@extends('admin.layout.index')

@section('title', 'Settings')

@section('content')
    <main class="setting">
        <div class="">
            <div class="row">
                <div class="">
                    <div class="back-btn">
                        <a href="{{ route('setting#list') }}">
                            <i class="fa-solid fa-arrow-left"></i>
                        </a>
                    </div>
                    <h1 class="text-center pb-5">Profile</h1>
                    @if (session('updateSuccess'))
                        <div class="col-4 offset-7">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fa-solid fa-circle-xmark"></i> {{ session('updateSuccess') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                    @endif
                    <div class="image">

                        @if (Auth::user()->image == null)
                            <img src="{{ asset('admin/image/default_user.webp') }}" alt="{{ Auth::user()->name }}"
                                class="setting__img">
                        @else
                            <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="{{ Auth::user()->name }}"
                                class="setting__img">
                        @endif
                    </div>
                    <div class="info">
                        <div class="my-2">
                            <p class="info-main">Name : </p>
                            <p class=" text-capitalize">{{ Auth::user()->name }}</p>
                        </div>
                        <div class="my-2">
                            <p class="info-main">Email : </p>
                            <p class="">{{ Auth::user()->email }}</p>
                        </div>
                        <div class="my-2">
                            <p class="info-main">Phone : </p>
                            <p class="">{{ Auth::user()->phone }}</p>
                        </div>
                        <div class="my-2">
                            <p class="info-main">Address : </p>
                            <p class="text-capitalize">{{ Auth::user()->address }}</p>
                        </div>
                        <div class="my-2">
                            <p class="info-main">Gender : </p>
                            <p class="text-capitalize">{{ Auth::user()->gender }}</p>
                        </div>
                        <a href="{{ route('setting#editProfile') }}" class="edit-btn">
                            Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
