@extends('layouts.app')

@section('content')
    <div class="container" style="font-family: Yekan; direction: rtl">

    <div class="row">

        <div class="col-3 p-5 bg-danger text-white">
            <img src="/img/company.png" class="rounded-circle" style="max-height: 180px">
        </div>

        <div class="col-9 pt-4 bg-dark text-white text-right">

        <div class="d-flex justify-content-between align-items-baseline">

            <h2>{{ $user->profile->title }}</h2>

            @can('update', $user->profile)
                <a href="/profile/{{ $user->id }}/edit">ویرایش پروفایل</a>
            @endcan

        </div>

        <div class="font-weight-bold">
            مدیریت: {{ $user->profile->management }}
        </div>

        <div>
            شماره تلفن: {{ $user->profile->telephone }}
        </div>

        <div>
            محصولات: {{ $user->profile->products }}
        </div>

        <div>
            آدرس: {{ $user->profile->address }}
        </div>

        <div>
            آدرس ایمیل شرکت: {{ $user->email }}
        </div>

        <div>
            قطر انشعاب: {{ $user->pipediameter }}
        </div>

        <div>
            انشعاب فاضلاب:  @if($user->sanitation == 'true') دارد @else ندارد @endif
        </div>

        <div>
                متراژ:  {{ $user->metrazh }}
        </div>

        </div>

        <div class="table-responsive pt-4">
            <h3 align="center" class="pb-3">آخرین بدهی ها <span id="total_records"></span></h3>
            <table class="table table-striped table-bordered text-center">
                <thead class="thead-dark">
                <tr>
                    <th>شماره</th>
                    <th>شناسه قبض</th>
                    <th>شماره کنتور قبلی</th>
                    <th>شماره کنتور فعلی</th>
                    <th>مصرف دوره</th>
                    <th>از تاریخ</th>
                    <th>تا تاریخ</th>
                    <th>مهلت پرداخت</th>
                    <th>وضعیت پرداخت</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($user->debts as $debt)
                        <tr>
                        <td>{{ $debt->id }}</td>
                        <td>{{ $debt->billnumber }}</td>
                        <td>{{ $debt->lastcounternumber }}</td>
                        <td>{{ $debt->currentcounternumber }}</td>
                        <td>{{ $debt->periodconsumption }}</td>
                        <td>{{ $debt->timefromyear. '/' . $debt->timefrommonth . '/' . $debt->timefromday }}</td>
                        <td>{{ $debt->timetoyear. '/' . $debt->timetomonth . '/' . $debt->timetoday }}</td>
                        <td>{{ $debt->paymentdeadlineyear. '/' . $debt->paymentdeadlinemonth . '/' . $debt->paymentdeadlineday }}</td>
                            <td>@if($debt->paymentstatus == 'false') <a href="/d/{{ $debt->id }}" style="color: red">پرداخت نشده - مشاهده فاکتور</a> @else <a href="/d/{{ $debt->id }}" style="color: green">پرداخت شده - مشاهده فاکتور</a> @endif</td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

        <div class="table-responsive pt-4 pb-3">
            <h3 align="center">آخرین پرداخت ها <span id="total_records"></span></h3>
            <table class="table table-striped table-bordered text-center">
                <thead class="thead-dark">
                <tr>
                    <th>شماره</th>
                    <th>شناسه قبض</th>
                    <th>شماره رهگیری</th>
                    <th>زمان پرداخت</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user->payments as $payment)
                    <tr>
                        <td>{{ $payment->id }}</td>
                        <td>{{ $payment->billnumber }}</td>
                        <td>{{ $payment->ordercode }}</td>
                        <td>{{ $payment->paymentyear. '/' . $payment->paymentmonth . '/' . $payment->paymentday }}</td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>

    </div>
    </div>
@endsection
