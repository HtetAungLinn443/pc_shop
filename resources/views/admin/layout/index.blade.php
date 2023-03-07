<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/image/title.png') }}" type="image/x-icon">
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Material Icon CDN -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
    {{-- Font awesome cdn --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Main CSS -->

    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/cycle.css') }}">
</head>

<body>
    <div class="pj-container">
        <aside class="aside">
            <div class="aside__top">
                <div class="aside__logo">
                    <h2 class="">PC<span>Shop</span></h2>
                </div>
                <div class="aside__close" id="close-btn">
                    <span class="material-symbols-sharp">
                        close
                    </span>
                </div>
            </div>
            <!-- Side Bar -->
            <div class="aside__sidebar">
                <a href="{{ route('admin#dashboard') }}" class=" {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                    <span class="material-symbols-sharp">
                        grid_view
                    </span>
                    <h3>Dashboard</h3>
                </a>

                <a href="{{ route('customer#listPage') }}"
                    class=" {{ Request::is('customer/listPage') ? 'active' : '' }}">
                    <span class="material-symbols-sharp">
                        person_outline
                    </span>
                    <h3>Customer</h3>
                </a>

                <a href="{{ route('admin#orderList') }}" class=" {{ Request::is('order/orderList') ? 'active' : '' }}">
                    <span class="material-symbols-sharp">
                        receipt_long
                    </span>
                    <h3>Order</h3>
                </a>


                <a href="{{ route('admin#messageList') }}"
                    class=" {{ Request::is('message/messageList') ? 'active' : '' }}">
                    <span class="material-symbols-sharp">
                        mail_outline
                    </span>
                    <h3>Messages</h3>

                </a>

                <a href="{{ route('admin#categoryList') }}"
                    class=" {{ Request::is('category/categoryList') ? 'active' : '' }}">
                    <span class="material-symbols-sharp">
                        category
                    </span>
                    <h3>Category</h3>
                </a>

                <a href="{{ route('admin#productListPage') }}"
                    class="{{ Request::is('product/productList') ? 'active' : '' }}">
                    <span class="material-symbols-sharp">
                        inventory
                    </span>
                    <h3>Products</h3>
                </a>

                <a href="{{ route('setting#list') }}" class="{{ Request::is('setting/list') ? 'active' : '' }}">
                    <span class="material-symbols-sharp">
                        settings
                    </span>
                    <h3>Settings</h3>
                </a>

                <a href="{{ route('admin#creatProductPage') }}"
                    class="{{ Request::is('product/createProductPage') ? 'active' : '' }}">
                    <span class="material-symbols-sharp">
                        add
                    </span>
                    <h3>Add Product</h3>
                </a>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <a href="">
                        <button class="logout-btn">
                            <span class="material-symbols-sharp">
                                logout
                            </span>
                            <h3>Logout</h3>
                        </button>
                    </a>


                </form>
            </div>
        </aside>
        <!-------------- END OF ASIDE -------------->
        <!-- Start Main -->

        @yield('content')

        <!-- End of Main -->

        <!-- Right Start -->
        <div class="right">
            <div class="top">
                <button id="menu-btn">
                    <span class="material-symbols-sharp">menu</span>
                </button>
                <div class="theme-toggler" id="dark-mode-toggle">
                    <span class="material-symbols-sharp active">light_mode</span>
                    <span class="material-symbols-sharp">dark_mode</span>
                </div>
                <div class="profile">
                    <div class="info">
                        <p>Hey, <b>{{ Auth::user()->name }}</b></p>
                        <small>{{ Auth::user()->role }}</small>
                    </div>
                    <div class="profile-photo">
                        @if (Auth::user()->image == null)
                            <img src="{{ asset('admin/image/default_user.webp') }}" alt="{{ Auth::user()->name }}">
                        @else
                            <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="{{ Auth::user()->name }}">
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Top -->
    </div>
</body>
<!-- Jquery CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
    integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Main Js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>
<script src="{{ asset('admin/js/script.js') }}"></script>

@yield('script')

</html>
