<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <!-- Icon -->
    <link rel="shortcut icon" href="{{ asset('admin/image/title.png') }}" type="image/x-icon">


    <!-- Fontawesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- CSS Link -->
    <link rel="stylesheet" href="{{ asset('user/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/product.css') }}">
    <!-- swiper npm -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
</head>

<body>
    <!-- Header -->
    <header>
        <nav>
            <div class="logo">
                <a href="#">
                    <b>PC<span>Shop</span></b>
                </a>
            </div>
            <form action="{{ route('user#searchProduct') }}">
                <div class="searchBox">
                    @csrf
                    <input type="text" name="searchData" class="search" value="{{ request('searchData') }}">
                    <button type="submit" class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>
            <div class="menu" id="menu">
                <ul>

                    <li>
                        <a href="{{ route('user#homePage') }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('user#cartList') }}" class="cartTitle">
                            Cart
                            @if ($cart != 0)
                                <span class="cartBadge">{{ $cart }}</span>
                            @endif
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user#orderList') }}">Order</a>
                    </li>

                    <li>
                        <a href="{{ route('user#contactPage') }}">Contact</a>
                    </li>
                    <li>
                        <a href="{{ route('user#account') }}">My Account</a>

                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button style="border:none;background:none;">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
            <div class="ph-menu">
                <i class="fa-solid fa-bars"></i>
            </div>
        </nav>
    </header>

    @yield('content')

    <!-- Footer -->
    <footer class="footer-container">
        <div class="container-fluid">
            <div class="signupForm">
                <p class="text"><i class="fa-regular fa-paper-plane"></i> Sign Up to Newsletter</p>
                <p class="special">...and be the first to receive <b>Special Offers</b></p>
                <div class="input-form">
                    <form action="">
                        <input type="text" placeholder="Ender Your Email Address">
                        <button>Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- footer -->
        <div class="mid-footer p-3">
            <div class="first">
                <div class="logo">
                    PC<span>Shop.com</span>
                </div>
                <div class="contact">
                    <div class="phone">
                        <i class="fa-solid fa-headphones-simple"></i>
                    </div>
                    <div class="number">
                        <p class="text">Got Question ? Call Us </p>
                        <p class="ph-num">(+959) 779 00 99 19</p>
                    </div>
                </div>
                <div class="address">
                    <h5>Address</h5>
                    <p>Ye Kyi Pauk Vallage, Myint Nge</p>
                    <p>Amarapura Township, Mandalay</p>
                </div>
                <div class="social">
                    <a href="https://www.facebook.com/profile.php?id=100088083276230" target="_blank">
                        <i class="fa-brands fa-facebook"></i>
                    </a>
                    <a href="https://www.linkedin.com/in/htet-aung-linn-2778b525a/" target="_blank">
                        <i class="fa-brands fa-linkedin"></i>
                    </a>
                    <a href="#" target="_blank">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="https://www.youtube.com/channel/UCdTJop6Xtjy9EG9f1DX7-lw" target="_blank">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                </div>
            </div>
            <div class="second">
                <div class="pop">
                    <h5>Popular Categories</h5>
                    <a href="">Notebooks</a>
                    <a href="">Electronics</a>
                    <a href="">Computers</a>
                    <a href="">E-Book Readers</a>
                    <a href="">PCShop Desktops</a>
                </div>
                <div class="pc">
                    <h5>PC Components</h5>
                    <a href="">Motherboards</a>
                    <a href="">CPU</a>
                    <a href="">RAM</a>
                    <a href=""></a>
                    <a href="">SSD</a>
                    <a href="">Cases</a>
                </div>
                <div class="help">
                    <h5>Help</h5>
                    <a href="{{ route('user#teamAndCondition') }}">Terms and Conditions</a>
                    <a href="{{ route('user#privacyPolicy') }}">Privacy Policy</a>
                    <a href="{{ route('user#contactPage') }}">Contact Us</a>
                </div>
            </div>
        </div>
        <div class="mobile-mid-footer bg-secondary d-flex align-items-center" style="height:200px;">
            <div class="offset-4 col-4  col-sm-10">

                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle col-12 text-start" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Popular Categories
                    </button>
                    <ul class="dropdown-menu dropdown-menu-light col-12">
                        <li><a class="dropdown-item" href="#">Notebooks</a></li>
                        <li><a class="dropdown-item" href="#">Electronics</a></li>
                        <li><a class="dropdown-item" href="#">Computers</a></li>
                        <li><a class="dropdown-item" href="#">E-Book Readers</a></li>
                        <li><a class="dropdown-item" href="#">PCShop Desktops</a></li>
                    </ul>
                </div>
                <div class="dropdown mt-4">
                    <button class="btn btn-light dropdown-toggle col-12 text-start" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Help
                    </button>
                    <ul class="dropdown-menu dropdown-menu-light col-12">
                        <li><a class="dropdown-item" href="#">Terms and Conditions</a></li>
                        <li><a class="dropdown-item" href="#">Privacy Policy</a></li>
                        <li><a class="dropdown-item" href="">Contact Us</a></li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="bot-footer">
            <div class="bg">
                <p>© PCShop.ge - All Rights Reserved</p>
                <img src="../image/patment-ico3231n.png" alt="">
            </div>
        </div>
    </footer>
</body>

<!-- Bootstrap JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>
<!-- Jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
    integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- AOS JS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!-- swiper js npm -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<!-- main js -->
<script src="{{ asset('user/js/main.js') }}"></script>
@yield('script')

</html>
