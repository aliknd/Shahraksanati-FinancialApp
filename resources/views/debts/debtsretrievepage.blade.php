@extends('layouts.app')

@section('content')
    <div class="container" style="direction: rtl; font-family: Yekan">

        @include('layouts.menu')

        <div class="table-responsive pt-4">
            <h3 align="center"> لیست قبوض صادر شده شرکت {{ $userinfo->name }}<span id="total_records"></span></h3>
            <h5 align="center"> بدهی حسابی: {{ $userinfo->userdebt }}<span id="total_records"></span></h5>
            <h5 align="center"> بستانکاری حسابی: {{ $userinfo->usercredit }}<span id="total_records"></span></h5>
            <br>
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
                    <th>مبلغ قابل پرداخت</th>
                    <th>مهلت پرداخت</th>
                    <th>وضعیت پرداخت</th>
                    <th>تغییر وضعیت پرداخت</th>
                    <th>حذف بدهی</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($debts as $debt)
                        <tr>
                        <td>{{ $debt->id }}</td>
                        <td>{{ $debt->billnumber }}</td>
                        <td>{{ $debt->lastcounternumber }}</td>
                        <td>{{ $debt->currentcounternumber }}</td>
                        <td>{{ $debt->periodconsumption }}</td>
                        <td>{{ $debt->timefromyear. '/' . $debt->timefrommonth . '/' . $debt->timefromday }}</td>
                        <td>{{ $debt->timetoyear. '/' . $debt->timetomonth . '/' . $debt->timetoday }}</td>
                        <td>{{ $debt->billtotalcost }}</td>
                        <td>{{ $debt->paymentdeadlineyear. '/' . $debt->paymentdeadlinemonth . '/' . $debt->paymentdeadlineday }}</td>
                        <td>@if($debt->paymentstatus == 'false') <a href="/d/{{ $debt->id }}" style="color: red">پرداخت نشده - مشاهده فاکتور</a> @else <a href="/d/{{ $debt->id }}" style="color: green">پرداخت شده - مشاهده فاکتور</a> @endif</td>
                        <td><a href="/d/company/change/{{ $debt->user_id }}/{{ $debt->id }}" style="color:blueviolet;">تغییر وضعیت پرداخت</a></td>
                        <td><a href="/d/company/delete/{{ $debt->user_id }}/{{ $debt->id }}">حذف بدهی</a></td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>
@endsection
