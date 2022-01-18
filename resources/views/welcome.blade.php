<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style>
        .jumbotron {
            background-color: #f4511e;
            color: #fff;
            padding: 100px 25px;
            font-family: "B Yekan";
            direction: rtl;
        }
        .container-fluid {
            padding: 60px 50px;
            direction: rtl;
        }
        .bg-grey {
            background-color: #f6f6f6;
        }
        .logo-small {
            color: #f4511e;
            font-size: 50px;
        }
        .logo {
            color: #f4511e;
            font-size: 200px;
        }
        .thumbnail {
            padding: 0 0 15px 0;
            border: none;
            border-radius: 0;
        }
        .thumbnail img {
            width: 100%;
            height: 100%;
            margin-bottom: 10px;
        }
        .carousel-control.right, .carousel-control.left {
            background-image: none;
            color: #f4511e;
        }
        .carousel-indicators li {
            border-color: #f4511e;
        }
        .carousel-indicators li.active {
            background-color: #f4511e;
        }
        .item h4 {
            font-size: 19px;
            line-height: 1.375em;
            font-weight: 400;
            font-style: italic;
            margin: 70px 0;
        }
        .item span {
            font-style: normal;
        }
        .panel {
            border: 1px solid #f4511e;
            border-radius:0 !important;
            transition: box-shadow 0.5s;
        }
        .panel:hover {
            box-shadow: 5px 0px 40px rgba(0,0,0, .2);
        }
        .panel-footer .btn:hover {
            border: 1px solid #f4511e;
            background-color: #fff !important;
            color: #f4511e;
        }
        .panel-heading {
            color: #fff !important;
            background-color: #f4511e !important;
            padding: 25px;
            border-bottom: 1px solid transparent;
            border-top-left-radius: 0px;
            border-top-right-radius: 0px;
            border-bottom-left-radius: 0px;
            border-bottom-right-radius: 0px;
        }
        .panel-footer {
            background-color: white !important;
        }
        .panel-footer h3 {
            font-size: 32px;
        }
        .panel-footer h4 {
            color: #aaa;
            font-size: 14px;
        }
        .panel-footer .btn {
            margin: 15px 0;
            background-color: #f4511e;
            color: #fff;
        }
        @media screen and (max-width: 768px) {
            .col-sm-4 {
                text-align: center;
                margin: 25px 0;
            }
        }
    </style>
</head>
<body dir="rtl" style="font-family: 'B Yekan'">

<div class="jumbotron text-center">
    <h1>شرکت خدماتی شهرک صنعتی شهرکرد</h1><br><br>
    <form class="form-inline mt-4">
        <div class="input-group">
            <input type="email" class="form-control" size="50" placeholder="آدرس ایمیل" required>
            <div class="input-group-btn">
                <button type="button" class="btn btn-danger">دنبال کردن خبر ها</button>
            </div>
        </div>
    </form>
</div>

<!-- Container (About Section) -->
<div class="container-fluid">
    <div class="row text-center">
        <div class="col-sm-8 d-flex">
            <h2> سیستم صدور قبض و پرداخت</h2><br>
            
            <button class="btn btn-default btn-lg"><a href="/login">ورود</a> </button>
            <button class="btn btn-default btn-lg mr-5"><a href="/register">ثبت نام</a></button>
        </div>
        <div class="col-sm-4">
            <img src="/img/billl.png" style="max-width:150px;">
            <span class="glyphicon glyphicon-globe logo"></span>
        </div>
    </div>
</div>

<!-- Container (Contact Section) -->
<div class="container-fluid bg-grey">
    <h2 class="text-right" style="margin-bottom: 10px">تماس با ما</h2><br>
    <div class="row">
        <div class="col-sm-5">
            <p><span class="glyphicon glyphicon-map-marker"></span> شهرکرد، شهرک صنعتی، انتهای بلوار صنعت، جنب آتش نشانی</p>
            <p><span class="glyphicon glyphicon-phone"></span> 33338530 038</p>
            <p><span class="glyphicon glyphicon-envelope"></span> info@shahraksanatishk.ir</p>
        </div>
        <div class="col-sm-7">
            <div class="row">
                <div class="col-sm-6 form-group">
                    <input class="form-control" id="name" name="name" placeholder="نام" type="text" required>
                </div>
                <div class="col-sm-6 form-group">
                    <input class="form-control" id="email" name="email" placeholder="ایمیل" type="email" required>
                </div>
            </div>
            <textarea class="form-control" id="comments" name="comments" placeholder="توضیح" rows="5"></textarea><br>
            <div class="row">
                <div class="col-sm-12 form-group">
                    <button class="btn btn-default pull-right" type="submit">ارسال</button>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
