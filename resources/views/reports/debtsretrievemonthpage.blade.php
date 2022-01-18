@extends('layouts.app')

@section('content')
    <div class="container" style="direction: rtl; font-family: Yekan">

        @include('layouts.menu')

        <div class="table-responsive-sm pt-4 col-sm">
            <h3 align="center">لیست بدهی های سال  {{$year}} و ماه {{$month}}<span id="total_records"></span></h3>
            <br>
            <table class="table table-striped table-bordered text-center" style="margin-right: -50px; font-size: 8px;">
                <thead class="thead-dark">
                <tr class="p-0">
                    <th>شماره</th>
                    <th>نام شرکت</th>
                    <th>شناسه قبض</th>
                    <th>شماره کنتور قبلی</th>
                    <th>شماره کنتور فعلی</th>
                    <th>مصرف دوره</th>
                    <th>آب بها</th>
                    <th>آبونمان</th>
                    <th>حق شارژ</th>
                    <th>خدمات اختصاصی</th>
                    <th>خدمات عمومی</th>
                    <th>مالیات</th>
                    <th>بدهی قبلی</th>
                    <th>هزینه قبض فعلی</th>
                    <th>مبلغ قابل پرداخت</th>
                    <th>وضعیت پرداخت</th>
                    <th>پرداخت شده</th>
                    <th>تخفیف</th>
                </tr>
                </thead>
                <tbody>
                @foreach($debts as $debt)
                    <tr>
                        <td>{{ $debt->id }}</td>
                        <td>{{ $debt->user->name }}</td>
                        <td>{{ $debt->billnumber }}</td>
                        <td>{{ $debt->lastcounternumber }}</td>
                        <td>{{ $debt->currentcounternumber }}</td>
                        <td>{{ $debt->periodconsumption }}</td>
                        <td>{{ $debt->abbahacost }}</td>
                        <td>{{ $debt->abonmancost }}</td>
                        <td>{{ $debt->servicescost }}</td>
                        <td>{{ $debt->specialisedservicescost }}</td>
                        <td>{{ $debt->generalservicescost }}</td>
                        <td>{{ $debt->maliat }}</td>
                        <td>{{ $debt->lastdebt }}</td>
                        <td>{{ $debt->totalcost }}</td>
                        <td>{{ $debt->billtotalcost }}</td>
                        <td>@if($debt->paymentstatus == 'false') <a href="/d/{{ $debt->id }}" style="color: red">پرداخت نشده</a> @else <a href="/d/{{ $debt->id }}" style="color: green">پرداخت شده</a> @endif</td>
                        <td>{{ $debt->paymentvalue }}</td>
                        <td>{{ $debt->paymentdiscount }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td>--</td>
                    <td>--</td>
                    <td>--</td>
                    <td>--</td>
                    <td>--</td>
                    <td>{{ $periodconsumptionSum }}</td>
                    <td>{{ $abbahaSum }}</td>
                    <td>{{ $abonmanSum }}</td>
                    <td>{{ $servicescostSum }}</td>
                    <td>{{ $specialisedservicescostSum }}</td>
                    <td>{{ $generalservicescostSum }}</td>
                    <td>{{ $maliatSum }}</td>
                    <td>{{ $lastdebtSum }}</td>
                    <td>{{ $totalcostSum }}</td>
                    <td>{{ $billtotalcostSum }}</td>
                    <td>--</td>
                    <td>--</td>
                    <td>--</td>
                </tr>
                </tbody>

            </table>
        </div>

    </div>
@endsection
