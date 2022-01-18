@extends('layouts.app')
@section('content')
    <div class="container text-center" style="direction: rtl; font-family: Yekan">

        @include('layouts.menu')

        <div class="table-responsive pt-4">
            <h3 align="center" class="pb-3">جمع کل اراضی واگذار شده {{ $phasetype }}:<span id="total_records"> {{ $phaselands }} متر مربع</span></h3>
            <h3 align="center" class="pb-3">آمار مصرف ها در {{ $phasetype }}<span id="total_records"></span></h3>
            <table class="table table-striped table-bordered text-center">
                <thead class="thead-dark">
                <tr>
                    <th>فروردین</th>
                    <th>اردیبهشت</th>
                    <th>خرداد</th>
                    <th>تیر</th>
                    <th>مرداد</th>
                    <th>شهریور</th>
                    <th>مهر</th>
                    <th>آبان</th>
                    <th>آذر</th>
                    <th>دی</th>
                    <th>بهمن</th>
                    <th>اسفند</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $phaseperiodconsumptionfarvardinvalue }}</td>
                        <td>{{ $phaseperiodconsumptionordibeheshtvalue }}</td>
                        <td>{{ $phaseperiodconsumptionkhordadvalue }}</td>
                        <td>{{ $phaseperiodconsumptiontirvalue }}</td>
                        <td>{{ $phaseperiodconsumptionmordadvalue }}</td>
                        <td>{{ $phaseperiodconsumptionshahrivarvalue }}</td>
                        <td>{{ $phaseperiodconsumptionmehrvalue }}</td>
                        <td>{{ $phaseperiodconsumptionabanvalue }}</td>
                        <td>{{ $phaseperiodconsumptionazarvalue }}</td>
                        <td>{{ $phaseperiodconsumptiondeyvalue }}</td>
                        <td>{{ $phaseperiodconsumptionbahmanvalue }}</td>
                        <td>{{ $phaseperiodconsumptionesfandvalue }}</td>
                    </tr>
                </tbody>

            </table>
        </div>

        <div class="row justify-content-center">
            <div class="col-8">
                {!! $pwpcchart->container() !!}
            </div>
        </div>

    </div>

    {!! $pwpcchart->script() !!}
@endsection


