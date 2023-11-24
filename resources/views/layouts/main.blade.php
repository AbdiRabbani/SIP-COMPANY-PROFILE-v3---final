<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIP | Sinergy Informasi Pratama</title>

    <!-- css -->
    <link rel="stylesheet" href="{{asset('custom/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/responsive.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css"
        integrity="sha512-t4GWSVZO1eC8BM339Xd7Uphw5s17a86tIZIj8qRxhnKub6WoyhnrxeCIMeAqBPgdZGlCcG2PrZjMc+Wr78+5Xg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"
        integrity="sha512-3dZ9wIrMMij8rOH7X3kLfXAzwtcHpuYpEgQg1OA4QAob1e81H8ntUQmQm3pBudqIoySO5j0tHN4ENzA6+n2r4w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- PACE -->
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <link rel="stylesheet" href="{{asset('custom/css/center-custom.css')}}">
</head>

<style>
    .dropdown-item:hover {
        color: white;
        background: var(--purple);
    }

    .dropdown-item:active {
        background: var(--purple);
    }

    .navbar-link-custom {
        color: var(--purple);
        border-radius: 10px;
        padding-left: 10px;
        padding-right: 10px;
        margin: 0px !important;
    }

    .navbar-link-custom:hover {
        color: white;
        background: var(--purple);
    }

    .navbar-link-custom:focus:hover {
        color: white;
        background: var(--purple);
    }

</style>

<body>
    @if(request()->is('home'))
    <nav class="navbar fixed-top navbar-expand-lg bg-light sm-shadow">
        <div class="container">
            <a class="navbar-brand" href="{{url('/home')}}">
                <img src="{{asset('custom/icon/logosip.png')}}" alt="Bootstrap" width="auto" height="40">
            </a>
            <div class="my-2" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="{{url('message')}}"
                            class="nav-link text-white rounded-pill px-4 text-center py-3 fw-bold"
                            style="background: var(--purple); font-size: 13px;">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @else
    <nav class="navbar fixed-top navbar-expand-lg bg-light sm-shadow">
        <div class="container">
            <a class="navbar-brand" href="{{url('/home')}}">
                <img src="{{asset('custom/icon/logosip.png')}}" alt="Bootstrap" width="auto" height="40">
            </a>
            <button class="navbar-toggler navbar-light" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse my-2" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link navbar-link-custom dropdown-toggle" style="box-shadow: none;" href="#"
                            id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Solution
                        </a>
                        <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                            <li>
                                <form action="{{url('solution/detail')}}">
                                    <input type="text" name="t" value="1" hidden>
                                    <button class="dropdown-item">Enterprise Network Infrastructure</button>
                                </form>
                            </li>
                            <li>
                                <form action="{{url('solution/detail')}}">
                                    <input type="text" name="t" value="2" hidden>
                                    <button class="dropdown-item">Data center & Cloud</button>
                                </form>
                            </li>
                            <li>
                                <form action="{{url('solution/detail')}}">
                                    <input type="text" name="t" value="3" hidden>
                                    <button class="dropdown-item">Cyber Security</button>
                                </form>
                            </li>
                            <li>
                                <form action="{{url('solution/detail')}}">
                                    <input type="text" name="t" value="4" hidden>
                                    <button class="dropdown-item">Collaboration & Facility</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link navbar-link-custom dropdown-toggle" style="box-shadow: none;" href="#"
                            id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Insights
                        </a>
                        <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{url('/insights/news')}}">News</a></li>
                            <li><a class="dropdown-item" href="{{url('/insights/blog')}}">Blog</a></li>
                            <li><a class="dropdown-item" href="{{url('/campaign')}}">Campaign</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link navbar-link-custom dropdown-toggle" style="box-shadow: none;" href="#"
                            id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            About Us
                        </a>
                        <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{url('/profile')}}">Profile</a></li>
                            <li><a class="dropdown-item" href="{{url('/partnership')}}">Partnership</a></li>
                            <li><a class="dropdown-item" href="{{url('/customer')}}">Customer</a></li>
                            <li><a class="dropdown-item" href="{{url('/career')}}">Career</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @endif


    @yield('content')
    <div id="footer">
        <div class="line"></div>
        <div class="d-flex flex-wrap col-md-12 justify-content-center">
            <div class="map col-md-4 px-5">
                <p class="fw-semibold fs-5">Our Office</p>
                <iframe
                    src="https://www.google.com/maps/d/embed?mid=1ozZiTj6s8xekvy1tDcdVuXj1OaXnURI&ehbc=2E312F&noprof=1"
                    width="100%" height="250px"></iframe>
            </div>
            <div class="about-us col-md-4 pt-2 px-5 d-flex row justify-content-between">
                <div class="p-0 ">
                    <p class="map-desc"><strong>(Utama) Jalan Puri Indah Raya Kav, BLOK A3/2, No.33-45, KEMBANGAN,
                            JAKARTA BARAT, INDONESIA.</strong></p>
                    <p class="map-desc"><strong>(Ruko) JL. PURI KENCANA, BLOK K6 NO. 2L-2M, KEMBANGAN, JAKARTA BARAT,
                            INDONESIA.</strong></p>
                </div>
                <p class="fw-semibold fs-5 mb-0 p-0">About us</p>
                <div class="d-flex row justify-content-between">
                    <a href="{{url('/message')}}" class="item-footer p-0">Contact Us</a>
                    <div class="d-flex align-items-center p-0">
                        <img src="{{asset('custom/icon/ic_linkedin.png')}}" style="height: 30px; margin-right: 5px;"
                            alt="">
                        <a href="https://www.linkedin.com/company/ptsip" target="_blank"
                            class="item-footer">Linkedin</a>
                    </div>
                    <div class="d-flex align-items-center p-0">
                        <img src="{{asset('custom/icon/ic_instagram.png')}}" style="height: 30px; margin-right: 5px;"
                            alt="">
                        <a href="https://instagram.com/sinergyinformasipratama?igshid=MzRlODBiNWFlZA==" target="_blank"
                            class="item-footer">Instagram</a>
                    </div>
                    <div class="d-flex align-items-center p-0">
                        <img src="{{asset('custom/icon/ic_phone.png')}}" style="height: 30px; margin-right: 5px;"
                            alt="">
                        <a class="item-footer">+62 21 583 555 99</a>
                    </div>
                </div>
            </div>
            <div class="logo col-md-4 text-center">
                <a href="{{url('/home')}}">
                    <img src="{{asset('custom/icon/logosip.png')}}" alt="Bootstrap" style="width:220px;">
                </a>
            </div>
        </div>
        <p class="text-center text-copyright mt-4">copyright © 2023 PT Sinergy Informasi Pratama</p>
    </div>
</body>
<script>
    AOS.init();

    function replaceImage(img) {
        setTimeout(() => {
            if (img.src != null) {
                img.onerror = null; 
                img.src = "{{asset('/custom/images/placeholder.png')}}"
            }
        }, 1000);
    }
</script>

</html>
