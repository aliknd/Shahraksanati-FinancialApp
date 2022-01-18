@extends('layouts.app')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">

    <style>
        .photo-gallery {
            color:#313437;
            background-color:#fff;
        }

        .photo-gallery p {
            color:#7d8285;
        }

        .photo-gallery h2 {
            font-weight:bold;
            margin-bottom:40px;
            padding-top:40px;
            color:inherit;
        }

        @media (max-width:767px) {
            .photo-gallery h2 {
                margin-bottom:25px;
                padding-top:25px;
                font-size:24px;
            }
        }

        .photo-gallery .intro {
            font-size:16px;
            max-width:500px;
            margin:0 auto 40px;
        }

        .photo-gallery .intro p {
            margin-bottom:0;
        }

        .photo-gallery .photos {
            padding-bottom:20px;
        }

        .photo-gallery .item {
            padding-bottom:30px;
        }

    </style>
</head>

@section('content')
    <div class="container text-center" style="direction: rtl; font-family: Vazir">

        <div class="row pt-4 bg-success text-center" style="height: 200px">
            <div class="col-12">
                <p class="text-white">ضمن عرض خوشامدگویی به شما کاربر گرامی لطفا جهت ادامه بر روی گزینه رفتن به پروفایل کلیک کنید</p>
                <p class="text-danger">لطفا اگر برای اولین بار به این صفحه مراجعه کرده اید با توجه به عکس راهنما نسبت به ویرایش پروفایل خود و وارد نمودن مشخصات شرکت اقدام فرمایید.</p>
            </div>
        </div>

        <button type="button" class="btn btn-success mt-4 mb-5"><a class="text-white" href="/profile/{{ auth()->user()->id }}">رفتن به بخش پروفایل</a> </button>

        <div class="photo-gallery">

                <div class="row photos">
                    <div class="col-4 item"><a href="/img/editprofile.jpg" data-lightbox="photos"><img class="img-fluid" src="/img/editprofile.jpg"></a><p class="mt-2">راهنمای ویرایش پروفایل</p></div>
                    <div class="col-4 item"><a href="/img/bill.jpg" data-lightbox="photos"><img class="img-fluid" src="/img/bill.jpg"></a><p class="mt-2">دریافت و مشاهده آخرین قبض</p></div>
                    <div class="col-4 item"><a href="/img/payment.jpg" data-lightbox="photos"><img class="img-fluid" src="/img/payment.jpg"></a><p class="mt-2">پیگیری وضعیت پرداخت قبوض</p></div>
                </div>

        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>

    </div>
@endsection
