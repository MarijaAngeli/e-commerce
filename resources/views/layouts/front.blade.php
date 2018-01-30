<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <title>Casual Game Store</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <link rel="stylesheet" type="text/css" href="{{asset('front/css/fonts.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('front/css/crumina-fonts.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('front/css/normalize.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('front/css/grid.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('front/css/styles.css')}}">


    <!--Plugins styles-->

        <link rel="stylesheet" type="text/css" href="{{asset('css/jquery.mCustomScrollbar.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/swiper.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/primary-menu.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/magnific-popup.css')}}">

    <!--Styles for RTL-->

    <!--<link rel="stylesheet" type="text/css" href="css/rtl.css">-->

    <!--External fonts-->

        <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>


        <!-- Fonts -->
        {{-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css"> --}}
    </head>
    <body>
        

        <header class="header" id="site-header">

    <div class="container">

        <div class="header-content-wrapper">
          <a href="/home" class="btn btn-info btn-xs">Home</a>
            <ul class="nav-add">
                <li class="cart">

                    <a href="#" class="js-cart-animate">
                        <i class="seoicon-basket"></i>
                        <span class="cart-count">{{ Cart::content()->count() }}</span>
                    </a>

                    <div class="cart-popup-wrap">
                        <div class="popup-cart">
                            <h4 class="title-cart align-center">$ {{ Cart::total() }}</h4>
                            <br>
                            <a href="/cart">
                                <div class="btn btn-small btn--dark">
                                <span class="text">View Cart</span>
                            </div>
                            </a>
                        </div>
                    </div>

                </li>
            </ul>
        </div>

    </div>

</header>


<div class="content-wrapper">

    <div class="container">
        <div class="row pt120">
            @include('flash::message')
            <div class="col-lg-8 col-lg-offset-2">
                <div class="heading align-center mb60">
                    <h4 class="h1 heading-title">Casual Games Store</h4>
                    <p class="heading-text">Buy games, and relax.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- End Books products grid -->

    @yield('content')
</div>

<!-- Footer -->

<footer class="footer">
    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                </div>
            </div>
        </div>
    </div>
</footer>

<script src="{{asset('front/js/jquery-2.1.4.min.js')}}"></script>
<script src="{{asset('front/js/crum-mega-menu.js')}}"></script>
<script src="{{asset('front/js/swiper.jquery.min.js')}}"></script>
<script src="{{asset('front/js/theme-plugins.js')}}"></script>
<script src="{{asset('front/js/main.js')}}"></script>
<script src="{{asset('front/js/form-actions.js')}}"></script>

<script src="{{asset('front/js/velocity.min.js')}}"></script>
<script src="{{asset('front/js/ScrollMagic.min.js')}}"></script>
<script src="{{asset('front/js/animation.velocity.min.js')}}"></script>

<!-- ...end JS Script -->
<script>
$('div.alert').not('.alert-important').delay(3000).fadeOut(350);
</script>
    </body>
</html>

