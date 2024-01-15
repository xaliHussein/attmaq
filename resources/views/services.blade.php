<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title>مقرآه العتبة العباسية</title>

    <link rel="stylesheet" href="{{ asset('frontend/css/icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/plugins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/rtl.css') }}">

    <!-- Color Scheme -->
    <link rel="stylesheet" href="{{ asset('frontend/css/colors/color.css') }}" title="color" /><!-- Color -->
    <link rel="alternate stylesheet" href="{{asset('frontend/css/colors/color2.css') }}" title="color2" /> <!-- Color2 -->
    <link rel="alternate stylesheet" href="{{asset('frontend/css/colors/color3.css') }}" title="color3" /> <!-- Color3 -->
    <link rel="alternate stylesheet" href="{{asset('frontend/css/colors/color4.css') }}" title="color4" /> <!-- Color4 -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">

    <style>
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        span,
        li,
        a {
            font-family: 'Cairo', sans-serif;
        }

        .surahs>div {
            color: #1f0a33;
            background-color: #fff;
            box-shadow: 0 0 4px rgba(0, 0, 0, 0.4);
            font-weight: bold;
            width: calc(100% - 90px);
            transition: .3s color ease;
            cursor: pointer;
            margin-bottom: 10px;
            margin-left: 10px;
            padding: 10px 20px;
            position: relative;
            font-size: 20px;
            counter-increment: surah-counter;
        }

        .textlines {
            display: block; /* Fallback for non-webkit */
            display: -webkit-box;
            height: 2.6em; /* Fallback for non-webkit, line-height * 2 */
            line-height: 1.3em;
            -webkit-line-clamp: 3; /* if you change this, make sure to change the fallback line-height and height */
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }





        .surahs>div:hover,
        .surahs>div:hover::after {
            background: linear-gradient(to bottom, #000, #434343);
            color: #fff;
        }
    </style>
</head>


<body itemscope>
<div class="preloader">
    <div class="loader-inner ball-scale-multiple">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div><!-- Preloader -->
<main>


    <header class="style2">
        <div class="topbar">
            <div class="container">
                <ul class="float-left tp-lnks">
                    <li><i class="far fa-map theme-clr"></i> كربلاء - مرقد الامام العباس</li>
                </ul>
                <div class="scl1 float-right">
                    <span>تابعنا:</span>
                    <a href="{{ $twitter->value }}" title="Twitter" itemprop="url" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="{{ $facebook->value }}" title="Facebook" itemprop="url" target="_blank"><i
                            class="fab fa-facebook-f"></i></a>

                    <a href="{{ $instagram->value }}" title="Google Plus" itemprop="url" target="_blank"><i
                            class="fab fa-instagram"></i></a>
                    <a href="{{ $telegram->value }}" title="telegram" itemprop="url" target="_blank"><i
                            class="fab fa-telegram"></i></a>
                    <a href="{{ $youtube->value }}" title="Youtube" itemprop="url" target="_blank"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div><!-- Topbar -->
        <div class="logo-inf-sec">
            <div class="container">
                <div class="logo"><a href="#" title="Logo" itemprop="url"><img src="{{ asset('frontend/images/logo.svg') }}"
                                                                               alt="logo2.png" itemprop="image"></a></div><!-- Logo -->
                <div class="float-right cnt-inf-btn">
                    <ul class="inf-lst">
                        <li><i class="flaticon-phone-volume theme-clr brd-rd50"></i>اتصل بنا: <span
                                class="theme-clr">{{ $phone->value }}+</span></li>
                        <li><i class="fas fa-envelope theme-clr brd-rd50"></i><a href="#" title=""
                                                                                 itemprop="url">{{ $email->value }}</a></li>
                    </ul>
                </div>
            </div>
        </div><!-- Logo Menu Sec -->
        <div class="menu-sec theme-bg">
            <div class="container">
                <nav>
                    <div>
                        <ul>
                            <li><a href="{{ route('website.index') }}" title="" itemprop="url">الصفحة
                                    الرئيسية</a>

                            </li>

                            </li>

                        </ul>

                    </div>
                </nav>
            </div>
            <div class="mnu-btm-shp">
                <i class="theme-bg crl1"></i>
                <i class="theme-bg crl2"></i>
                <i class="theme-bg crl3"></i>
                <i class="theme-bg crl4"></i>
                <i class="theme-bg crl5"></i>
                <i class="theme-bg crl6"></i>
                <i class="theme-bg crl7"></i>
                <i class="theme-bg crl8"></i>
                <i class="theme-bg crl9"></i>
                <i class="theme-bg crl10"></i>
                <i class="theme-bg crl11"></i>
                <i class="theme-bg crl12"></i>
                <i class="theme-bg crl13"></i>
                <i class="theme-bg crl14"></i>
                <i class="theme-bg crl15"></i>
                <i class="theme-bg crl16"></i>
                <i class="theme-bg crl17"></i>
                <i class="theme-bg crl18"></i>
                <i class="theme-bg crl19"></i>
                <i class="theme-bg crl20"></i>
                <i class="theme-bg crl21"></i>
                <i class="theme-bg crl22"></i>
                <i class="theme-bg crl23"></i>
                <i class="theme-bg crl24"></i>
                <i class="theme-bg crl25"></i>
                <i class="theme-bg crl26"></i>
                <i class="theme-bg crl27"></i>
                <i class="theme-bg crl28"></i>
                <i class="theme-bg crl29"></i>
                <i class="theme-bg crl30"></i>
                <i class="theme-bg crl31"></i>
                <i class="theme-bg crl32"></i>
                <i class="theme-bg crl33"></i>
                <i class="theme-bg crl34"></i>
                <i class="theme-bg crl35"></i>
                <i class="theme-bg crl36"></i>
                <i class="theme-bg crl37"></i>
                <i class="theme-bg crl38"></i>
                <i class="theme-bg crl39"></i>
                <i class="theme-bg crl40"></i>
                <i class="theme-bg crl41"></i>
                <i class="theme-bg crl42"></i>
                <i class="theme-bg crl43"></i>
                <i class="theme-bg crl44"></i>
                <i class="theme-bg crl45"></i>
                <i class="theme-bg crl46"></i>
                <i class="theme-bg crl47"></i>
                <i class="theme-bg crl48"></i>
                <i class="theme-bg crl49"></i>
                <i class="theme-bg crl50"></i>
            </div>
        </div>
    </header><!-- Header -->
    <div class="rspn-hdr">
        <div class="rspn-mdbr">
            <ul class="rspn-scil">
                <li><a href="#" title="Twitter" itemprop="url" target="_blank"><i class="fab fa-twitter"></i></a>
                </li>
                <li><a href="#" title="Facebook" itemprop="url" target="_blank"><i
                            class="fab fa-facebook-f"></i></a></li>
                <li><a href="#" title="Linkedin" itemprop="url" target="_blank"><i
                            class="fab fa-linkedin-in"></i></a></li>
                <li><a href="#" title="Google Plus" itemprop="url" target="_blank"><i
                            class="fab fa-google-plus-g"></i></a></li>
            </ul>

        </div>
        <div class="lg-mn">
            <div class="logo"><a href="#" title="Logo" itemprop="url"><img src="{{ asset('frontend/images/logo.svg') }}"
                                                                           alt="logo2.png" itemprop="image"></a></div>
            <div class="rspn-cnt">
                <span><i class="fas fa-envelope theme-clr"></i><a href="#" title="" itemprop="url"></a></span>
                <span><i class="flaticon-phone-volume theme-clr"></i></span>
            </div>
            <span class="rspn-mnu-btn"><i class="fa fa-list-ul"></i></span>
        </div>
        <div class="rsnp-mnu">
            <span class="rspn-mnu-cls"><i class="fa fa-times"></i></span>
            <ul>
                <li><a href="{{ route('website.index') }}" title="" itemprop="url">الصفحة
                        الرئيسية</a>

                </li>

            </ul>
        </div><!-- Responsive Menu -->
    </div><!-- Responsive Header -->
    <section id="main">
        <div class="gap no-gap">
            <div class="featured-area-wrap text-center">
                <div class="featured-area owl-carousel">
                    <div class="featured-item"
                         style="background-image: url({{asset('frontend/images/abbas.jpeg')}});  background-position: center; background-repeat: no-repeat; ">
                        <div class="featured-cap">
                            <img src="{{ asset('frontend/images/resources/bsml-txt.png') }}" alt="bsml-txt.png">
                            <h1><img src="{{ asset('frontend/images/iqraa.png') }}" alt="ayat-txt.png"></h1>
                            <img class="before-imge" src="{{ asset('frontend/images/pshape.png')}}" alt="">
                            <h3></h3>
                            <span></span>
                        </div>
                    </div>

                </div>
            </div><!-- Featured Area Wrap -->
        </div>
    </section><!-- Slider Area -->





    <section>
        <div class="gap">
            <div class="container">
                <div class="serv-wrp remove-ext5">
                    <div class="row">

                        @foreach($services as $service)
                            <div class="col-md-3 col-sm-6 col-lg-3">
                                <div class="serv-bx2 brd-rd10 text-center">
                                    <div class="serv-thmb2"><a  title="" itemprop="url"><img style="max-width: 720px; max-height:180px;" src="{{ asset(asset('storage/' . $service->image)) }}" alt="serv-img1.jpg" itemprop="image"></a></div>
                                    <div class="serv-inf2">
                                        <h5 itemprop="headline"><a title="" itemprop="url"> {{  $service->title }}</a></h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div><!-- Services Wrap -->

            </div>
        </div>
    </section>



    <footer>
        <div class="gap no-gap">
            <div class="container">
                <div class="footer-data brd-rd20 overlap-220">
                    <div class="footer-data-inr">
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-lg-3">
                                <div class="widget">
                                    <h5 itemprop="headline">معلومات عنا</h5>
                                    <p itemprop="description">
                                        {{ $shortabout->value }}
                                    </p>

                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6 col-lg-3">
                                <div class="widget">
                                    <h5 itemprop="headline">اتصل بالمعلومات</h5>
                                    <ul class="cnt-inf">
                                        <li><i class="far fa-envelope theme-clr"></i><a href="#" title=""
                                                                                        itemprop="url">{{ $email->value }}</a></li>
                                        <li><i class="fas fa-phone theme-clr"></i><span>{{ $phone->value }}+</span></li>
                                        <li><i class="fas fa-map-marker-alt theme-clr"></i>كربلاء / مرقد الامام العباس </li>
                                    </ul>
                                    <div class="scl1">
                                        <a href="{{ $twitter->value }}" title="Twitter" itemprop="url" target="_blank"><i class="fab fa-twitter"></i></a>
                                        <a href="{{ $facebook->value }}" title="Facebook" itemprop="url" target="_blank"><i
                                                class="fab fa-facebook-f"></i></a>

                                        <a href="{{ $instagram->value }}" title="Google Plus" itemprop="url" target="_blank"><i
                                                class="fab fa-instagram"></i></a>
                                        <a href="{{ $telegram->value }}" title="telegram" itemprop="url" target="_blank"><i
                                                class="fab fa-telegram"></i></a>
                                        <a href="{{ $youtube->value }}" title="Youtube" itemprop="url" target="_blank"><i class="fab fa-youtube"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-lg-3">
                                <div class="widget">
                                    <h5 itemprop="headline">اتصال سريع</h5>
                                    <form>
                                        <div class="row mrg10">
                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                <input class="brd-rd5" type="text" placeholder="الاسم">
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                <input class="brd-rd5" type="email" placeholder="البريد الإلكتروني">
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                <textarea class="brd-rd5" placeholder="رسالة"></textarea>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                <button class="brd-rd5 theme-btn theme-bg">إرسال الآن</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cpy-rgt text-center">
                        <p itemprop="description"><a href="#" title="" itemprop="url" target="_blank"> العتبة العباسية</a>
                            &copy; 2023 / كل الحقوق محفوظة</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <section>
        <div class="gap theme-bg bottom-spac50 top-spac270">
            <div class="container">
                <div class="newsletter-wrp">

                </div><!-- Newsletter Wrap -->
            </div>
        </div>
    </section>
</main><!-- Main Wrapper -->

<script src="{{asset('frontend/js/jquery.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/plugins.min.js')}}"></script>
<script src="{{asset('frontend/js/google-map-int.js')}}"></script>
<script src="{{ asset('frontend/js/custom-scripts.js') }}"></script>

<script>

</script>

</body>


</html>
