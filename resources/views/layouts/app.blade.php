<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Course Online</title>
    <link rel="icon" href="https://iviettech.vn/wp-content/themes/viettech/img/front/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
        integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="stylesheet" href="/css/style.css">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .row {

            margin: 40px 0 40px 40px;
            font-size: 16px;
        }

        th {
            padding: 0 10px;
        }

        .title--separate--md::after {
            content: "";
            position: absolute;
            display: block;
            border-bottom: 3px solid #008657;
            width: 20rem;
            bottom: -4px;
            border-radius: 3px;
        }

        th:nth-child(2) {
            color: rgba(0, 0, 0, 0.6);
            cursor: pointer;
        }

        .m-left {
            margin-left: 50px !important;
            margin-bottom: 10px;
        }

        .color-red {
            color: #d33;
        }

        .note-item::marker {
            color: #d33;
        }

        strong {
            font-weight: 500;
        }

        .btn--red {
            padding: 4px 20px;
            color: #d33;
            background-color: white;
            text-decoration: none;
            border: 1px solid #d33;
            border-radius: 4px;
        }

        .btn--red:hover {
            text-decoration: none;
            background-color: #d33;
            color: #fff;
        }

        .m-right {
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <div id="app">
        <!-- Header -->
        <header class="headers">
            <nav class="header__nav">
                <ul class="navbar-list">
                    <div class="logo-brand">
                        <a href="{{route('home')}}"><img src="/images/logo.png" alt="" class="logo-img"></a>
                    </div>
                </ul>
                <ul class="navbar-list">
                    <a href="{{route('home')}}" class="navbar-item-link">
                        <li class="navbar-item navbar-item--separate">
                            Home
                        </li>
                    </a>
                    <a href="" class="navbar-item-link">
                        <li class="navbar-item navbar-item--separate">
                            About Us
                        </li>
                    </a>
                    <a href="" class="navbar-item-link">
                        <li class="navbar-item navbar-item--separate">
                            Course
                        </li>
                    </a>
                    <a href="" class="navbar-item-link">
                        <li class="navbar-item navbar-item--separate">
                            News
                        </li>
                    </a>
                    <a href="" class="navbar-item-link">
                        <li class="navbar-item">
                            Careers
                        </li>
                    </a>

                </ul>
                <ul class="navbar-list">
                    @guest
                    <li class="navbar-item">
                        <i class="fas fa-user"></i>
                        <a href="{{route('login')}}" class="navbar-item-link "> Login</a>
                    </li>
                    @else
                    <li class="navbar-item navbar-item--has-nav dropdown">
                        <a class="nav-link  ">
                                <img src="{{ Auth::guard('web')->user()->url_avatar }}" width="50px" height="50px"
                                    class=" rounded-circle mr-1 " />

                        </a>

                        <div class="user-fullname"><strong>{{ Auth::guard('web')->user()->fullname }} </strong></div>
                        <div class="dropdown-menu-user">
                            <a style="cursor: pointer" class="dropdown-item-user" href="{{ route('student.home') }}">
                                <i class="far fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a style="cursor: pointer" class="dropdown-item-user"
                                onclick="event.preventDefault(); document.querySelector('#logout-form').submit();"
                                data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                            <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </nav>
        </header>
        <!-- End Header -->

        <!-- Slider -->
        <div id="demo" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
            </ul>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/images/slider/slider1.jpg" alt="">
                </div>
                <div class="carousel-item">
                    <img src="/images/slider/slider2.jpg" alt="">
                </div>
                <!-- <div class="carousel-item">
                    <img src="./img/slider/slider3.jpg" alt="New York">
                </div> -->
            </div>


        </div>

        <!-- End Slider -->

        <!-- Container -->

        <div class="container">
            @yield('content')
        </div>

        <!-- Footer -->

        <footer class="footer-section">
            <div class="footer-list">
                <div class="footer-item">
                    <img src="/images//logo.png" alt="" class="footer-img">
                    <ul class="footer-item-body">
                        <li class="footer-sub">Tax number: 04016231</li>
                        <li class="footer-sub">Office: 154 Pham Nhu Xuong, Da Nang</li>
                        <li class="footer-sub">Location: 263 Tieu La, Da Nang</li>
                        <li class="footer-sub">Location: 52 Tran Phu, Hue</li>
                        <li class="footer-sub">Hotline: 0777710005</li>
                    </ul>
                </div>
                <div class="footer-item">
                    <div class="footer-item-title footer-title--separate">Contact</div>
                    <ul class="footer-item-icon">
                        <li class="footer-sub-icon"><i class="fab fa-facebook"></i></li>
                        <li class="footer-sub-icon"><i class="fab fa-instagram"></i></li>
                        <li class="footer-sub-icon"><i class="far fa-envelope"></i></li>

                    </ul>
                </div>
            </div>
            <div class="text-center p-3" style="background-color: #008657; font-size: 1.5rem; color: #fff;">
                © 2021 Copyright:
                <a class="footer-link" href="#" style="color: #fff;">HDTC Team</a>
            </div>
        </footer>
        <!-- End Footer -->
    </div>
    <div class="chatbox">
        <div class="chatbox__support">
            <div class="chatbox__header">
                <div class="chatbox__image--header">
                    <img src="/images/image.png" alt="image">
                </div>
                <div class="chatbox__content--header">
                    <h4 class="chatbox__heading--header">Chat support</h4>
                  
                </div>
            </div>
            <div class="chatbox__messages">
                <div id="chatbot">
                    <div class="messages__item messages__item--visitor">
                        Can you let me talk to the support?
                    </div>
                    <div class="messages__item messages__item--visitor">
                        Please type "/help" so I can support for you!
                    </div>
                </div>
                <div id="typing" class="messages__item messages__item--typing d-none">
                    <span class="messages__dot"></span> 
                    <span class="messages__dot"></span>
                    <span class="messages__dot"></span>
                </div>
            </div>
            <div class="chatbox__footer">
                <img src="/images/emojis.svg" alt="">
                <img src="/images/microphone.svg" alt="">
                <form id="form_submit_chat" method="get">
                    @csrf
                    <input id="text_chat" type="text" name="text_chat" placeholder="Write a message..." autocomplete="off">
                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
        </div>
        <div class="chatbox__button">
            <button>button</button>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">

        function formatCurrency(money)
        {
            return (money).toLocaleString('en', {
                style: 'currency',
                currency: 'USD'
            })
        }

        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#form_submit_chat').on('submit',function(e){
                e.preventDefault();
                var text_chat = $('#text_chat').val();
                $('#text_chat').val("");

                $('#chatbot').append("<div class='messages__item messages__item--operator'>" + text_chat + "</div>");
                $(".chatbox__messages").scrollTop($(".chatbox__messages")[0].scrollHeight);
                $('#typing').removeClass('d-none');
                $.ajax({
                    type: 'get',
                    url: '/chatbot',
                    data: {text_chat:text_chat},
                    success: function(data){
                        $('#typing').addClass('d-none');
                        
                        if(data.type == 'text')
                        {
                            $('#chatbot').append("<div class='messages__item messages__item--visitor'>" + data.data + "</div>");
                        }
                        else(data.type == 'array')
                        {
                            console.log(data.data)
                        }
                    },
                    complete: function(){
                        $(".chatbox__messages").scrollTop($(".chatbox__messages")[0].scrollHeight);
                    }
                });
            });
        });

    </script>
</body>

</html>