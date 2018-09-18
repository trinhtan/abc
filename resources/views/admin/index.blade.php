@if(Auth::check())
<!DOCTYPE html>
<html>
<head>
    <title>Trang chủ Admin</title>
    <style type="text/css">

        #arrow{
            font-size: 1em;
            margin-left: 40px;
            animation: arrow 2s infinite ease;
            -webkit-animation: arrow 2s infinite ease;
            -moz-animation: arrow 2s infinite ease;
            -o-animation: arrow 2s infinite ease;
            float: right;
        }

        @keyframes arrow{
            0%{
                margin-left: 40px;
            }
            50%{
                margin-left: 30px;
            }
            100%{
                margin-left: 40px;
            }
        }

        @-webkit-keyframes arrow{
            0%{
                margin-left: 40px;
            }
            50%{
                margin-left: 30px;
            }
            100%{
                margin-left: 40px;
            }
        }

        @-moz-keyframes arrow{
            0%{
                margin-left: 40px;
            }
            50%{
                margin-left: 30px;
            }
            100%{
                margin-left: 40px;
            }
        }
        @-o-keyframes arrow{
            0%{
                margin-left: 40px;
            }
            50%{
                margin-left: 30px;
            }
            100%{
                margin-left: 40px;
            }
        }
        #det{
            position: absolute;
            top: 0;
            left: 500px;
            font-size: 4em;
            /*text-shadow: 2px 2px 10px #000000;*/
        }

        body {
           padding: 0;
           margin: 0;
           background: #596778;
           color: #EEEEEE;
           text-align: center;
           font-family: "Lato", sans-serif;
        }

        @media screen and (max-width: 700px) {
           body {
              padding: 170px 0 0 0;
              width: 100%
           }
        }

        a {
           color: inherit;
        }

        .menu-item,
        .menu-open-button {
           background: #EEEEEE;
           border-radius: 100%;
           width: 80px;
           height: 80px;
           margin-left: -40px;
           position: absolute;
           color: #FFFFFF;
           text-align: center;
           line-height: 80px;
           -webkit-transform: translate3d(0, 0, 0);
           transform: translate3d(0, 0, 0);
           -webkit-transition: -webkit-transform ease-out 200ms;
           transition: -webkit-transform ease-out 200ms;
           transition: transform ease-out 200ms;
           transition: transform ease-out 200ms, -webkit-transform ease-out 200ms;
        }

        .menu-open {
            display: none;
        }

        .lines {
            width: 25px;
            height: 3px;
            background: #596778;
           display: block;
           position: absolute;
           top: 50%;
           left: 50%;
           margin-left: -12.5px;
           margin-top: -1.5px;
           -webkit-transition: -webkit-transform 200ms;
           transition: -webkit-transform 200ms;
           transition: transform 200ms;
           transition: transform 200ms, -webkit-transform 200ms;
        }

        .line-1 {
           -webkit-transform: translate3d(0, -8px, 0);
           transform: translate3d(0, -8px, 0);
        }

        .line-2 {
           -webkit-transform: translate3d(0, 0, 0);
           transform: translate3d(0, 0, 0);
        }

        .line-3 {
           -webkit-transform: translate3d(0, 8px, 0);
           transform: translate3d(0, 8px, 0);
        }

        .menu-open:checked + .menu-open-button .line-1 {
           -webkit-transform: translate3d(0, 0, 0) rotate(45deg);
           transform: translate3d(0, 0, 0) rotate(45deg);
        }

        .menu-open:checked + .menu-open-button .line-2 {
           -webkit-transform: translate3d(0, 0, 0) scale(0.1, 1);
           transform: translate3d(0, 0, 0) scale(0.1, 1);
        }

        .menu-open:checked + .menu-open-button .line-3 {
           -webkit-transform: translate3d(0, 0, 0) rotate(-45deg);
           transform: translate3d(0, 0, 0) rotate(-45deg);
        }

        .menu {
           margin: auto;
           position: absolute;
           top: 0;
           bottom: 400px;
           left: 0;
           right: 900px;
           width: 80px;
           height: 80px;
           text-align: center;
           box-sizing: border-box;
           font-size: 15px;
        }


        /* .menu-item {
           transition: all 0.1s ease 0s;
        } */

        .menu-item:hover {
           background: #EEEEEE;
           color: #3290B1;
        }

        .menu-item:nth-child(3) {
           -webkit-transition-duration: 180ms;
           transition-duration: 180ms;
        }

        .menu-item:nth-child(4) {
           -webkit-transition-duration: 180ms;
           transition-duration: 180ms;
        }

        .menu-item:nth-child(5) {
           -webkit-transition-duration: 180ms;
           transition-duration: 180ms;
        }

        .menu-item:nth-child(6) {
           -webkit-transition-duration: 180ms;
           transition-duration: 180ms;
        }

        .menu-item:nth-child(7) {
           -webkit-transition-duration: 180ms;
           transition-duration: 180ms;
        }

        .menu-item:nth-child(8) {
           -webkit-transition-duration: 180ms;
           transition-duration: 180ms;
        }

        .menu-item:nth-child(9) {
           -webkit-transition-duration: 180ms;
           transition-duration: 180ms;
        } 

        .menu-open-button {
           z-index: 2;
           -webkit-transition-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1.275);
           transition-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1.275);
           -webkit-transition-duration: 400ms;
           transition-duration: 400ms;
           -webkit-transform: scale(1.1, 1.1) translate3d(0, 0, 0);
           transform: scale(1.1, 1.1) translate3d(0, 0, 0);
           cursor: pointer;
           box-shadow: 3px 3px 0 0 rgba(0, 0, 0, 0.14);
        }

        .menu-open-button:hover {
           -webkit-transform: scale(1.2, 1.2) translate3d(0, 0, 0);
           transform: scale(1.2, 1.2) translate3d(0, 0, 0);
        }

        .menu-open:checked + .menu-open-button {
           -webkit-transition-timing-function: linear;
           transition-timing-function: linear;
           -webkit-transition-duration: 200ms;
           transition-duration: 200ms;
           -webkit-transform: scale(0.8, 0.8) translate3d(0, 0, 0);
           transform: scale(0.8, 0.8) translate3d(0, 0, 0);
        }

        .menu-open:checked ~ .menu-item {
           -webkit-transition-timing-function: cubic-bezier(0.935, 0, 0.34, 1.33);
           transition-timing-function: cubic-bezier(0.935, 0, 0.34, 1.33);
        }

        .menu-open:checked ~ .menu-item:nth-child(3) {
           transition-duration: 180ms;
           -webkit-transition-duration: 180ms;
           -webkit-transform: translate3d(0.08361px, -104.99997px, 0);
           transform: translate3d(0.08361px, -104.99997px, 0);
        }

        .menu-open:checked ~ .menu-item:nth-child(4) {
           transition-duration: 280ms;
           -webkit-transition-duration: 280ms;
           -webkit-transform: translate3d(90.9466px, -52.47586px, 0);
           transform: translate3d(90.9466px, -52.47586px, 0);
        }

        .menu-open:checked ~ .menu-item:nth-child(5) {
           transition-duration: 380ms;
           -webkit-transition-duration: 380ms;
           -webkit-transform: translate3d(90.9466px, 52.47586px, 0);
           transform: translate3d(90.9466px, 52.47586px, 0);
        }

        .menu-open:checked ~ .menu-item:nth-child(6) {
           transition-duration: 480ms;
           -webkit-transition-duration: 480ms;
           -webkit-transform: translate3d(0.08361px, 104.99997px, 0);
           transform: translate3d(0.08361px, 104.99997px, 0);
        }

        .menu-open:checked ~ .menu-item:nth-child(7) {
           transition-duration: 580ms;
           -webkit-transition-duration: 580ms;
           -webkit-transform: translate3d(-90.86291px, 52.62064px, 0);
           transform: translate3d(-90.86291px, 52.62064px, 0);
        }

        .menu-open:checked ~ .menu-item:nth-child(8) {
           transition-duration: 680ms;
           -webkit-transition-duration: 680ms;
           -webkit-transform: translate3d(-91.03006px, -52.33095px, 0);
           transform: translate3d(-91.03006px, -52.33095px, 0);
        }

        .menu-open:checked ~ .menu-item:nth-child(9) {
           transition-duration: 780ms;
           -webkit-transition-duration: 780ms;
           -webkit-transform: translate3d(-0.25084px, -104.9997px, 0);
           transform: translate3d(-0.25084px, -104.9997px, 0);
        }

        .blue {
           background-color: #669AE1;
           box-shadow: 3px 3px 0 0 rgba(0, 0, 0, 0.14);
           text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.12);
        }

        .blue:hover {
           color: #669AE1;
           text-shadow: none;
        }

        .green {
           background-color: #70CC72;
           box-shadow: 3px 3px 0 0 rgba(0, 0, 0, 0.14);
           text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.12);
        }

        .green:hover {
           color: #70CC72;
           text-shadow: none;
        }

        .red {
           background-color: #FE4365;
           box-shadow: 3px 3px 0 0 rgba(0, 0, 0, 0.14);
           text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.12);
        }

        .red:hover {
           color: #FE4365;
           text-shadow: none;
        }

        .purple {
           background-color: #C49CDE;
           box-shadow: 3px 3px 0 0 rgba(0, 0, 0, 0.14);
           text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.12);
        }

        .purple:hover {
           color: #C49CDE;
           text-shadow: none;
        }

        .orange {
           background-color: #FC913A;
           box-shadow: 3px 3px 0 0 rgba(0, 0, 0, 0.14);
           text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.12);
        }

        .orange:hover {
           color: #FC913A;
           text-shadow: none;
        }

        .lightblue {
           background-color: #62C2E4;
           box-shadow: 3px 3px 0 0 rgba(0, 0, 0, 0.14);
           text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.12);
        }

        .lightblue:hover {
           color: #62C2E4;
           text-shadow: none;
        }

        .credit {
           margin: 24px 20px 120px 0;
           text-align: right;
           color: #EEEEEE;
        }

        .credit a {
           padding: 8px 0;
           color: #C49CDE;
           text-decoration: none;
           transition: all 0.3s ease 0s;
        }

        .credit a:hover {
          text-decoration: underline;
        } 
                
    </style>
</head>
<body>
    <div class="row">
        <div class="col-md-3">
            <nav class="menu">
                <input type="checkbox" href="#" class="menu-open" name="menu-open" id="menu-open" />
                    <label class="menu-open-button" for="menu-open">
                        <span class="lines line-1"></span>
                        <span class="lines line-2"></span>
                        <span class="lines line-3"></span>
                    </label>
                    <a href="list_subject" class="menu-item blue">Học Phần</a>
                    <a href="list_class" class="menu-item green">Lớp</a>
                    <a href="list_student" class="menu-item red">Sinh Viên</a>
                    <a href="list_room" class="menu-item purple"> <i class="fa fa-microphone"></i>Phòng</a>
                    <a href="list_date" class="menu-item orange"> <i class="fa fa-star"></i>Ngày</a>
                    <a href="logout" class="menu-item lightblue"> <i class="fa fa-diamond"></i>Logout</a>
            </nav>
        </div>

        <div class="col-md-9">
            @yield('content')
        </div>
    </div>
</body>
</html>
@else 
<div class="container" style="">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4" style="margin-top: 100px ">
            <h1 class="text-center login-title" style="text-align: center; color: green">Bạn Chưa Đăng Nhập</h1>
            <p style="text-align: center;"><a href="login_form">Click vào đây để đăng nhập</a></p>
            
        </div>
    </div>
</div>
@endif