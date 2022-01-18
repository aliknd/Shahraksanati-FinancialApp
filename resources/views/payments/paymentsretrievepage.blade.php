@extends('layouts.app')

@section('content')
    <div class="container" style="direction: rtl; font-family: Yekan">

        @include('layouts.menu')

        <div class="table-responsive pt-4">
            <h3 align="center"> لیست پرداخت های صادر شده شرکت {{ $userinfo->name }}<span id="total_records"></span></h3>
            <h5 align="center"> بدهی حسابی: {{ $userinfo->userdebt }}<span id="total_records"></span></h5>
            <h5 align="center"> بستانکاری حسابی: {{ $userinfo->usercredit }}<span id="total_records"></span></h5>
            <br>
            <table class="table table-striped table-bordered text-center">
                <thead class="thead-dark">
                <tr>
                    <th>شماره</th>
                    <th>شناسه قبض</th>
                    <th>شماره پیگیری پرداخت</th>
                    <th>مبلغ پرداختی</th>
                    <th>تخفیف</th>
                    <th>توضیحات تخفیف</th>
                    <th>مبلغ کلی قبض</th>
                    <th>تاریخ بدهی</th>
                    <th>زمان پرداخت</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($payments as $payment)
                        <tr>
                        <td>{{ $payment->id }}</td>
                        <td>{{ $payment->billnumber }}</td>
                        <td>{{ $payment->ordercode }}</td>
                        <td>{{ $payment->totalcost }}</td>
                        <td>{{ $payment->discount }}</td>
                        <td>{{ $payment->descriptiondis }}</td>
                        <td>{{ $payment->maintotalcost }}</td>
                        <td>{{ $payment->debtyear. '/' . $payment->debtmonth . '/' . $payment->debtday }}</td>
                        <td>{{ $payment->paymentyear. '/' . $payment->paymentmonth . '/' . $payment->paymentday }}</td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>
@endsection
