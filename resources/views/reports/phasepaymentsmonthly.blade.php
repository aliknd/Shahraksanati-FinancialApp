@extends('layouts.app')
@section('content')
    <div class="container text-center" style="direction: rtl; font-family: Yekan">

        @include('layouts.menu')

        <div class="table-responsive pt-4">
            <h3 align="center" class="pb-3">جمع کل اراضی واگذار شده {{ $phaseType }}:<span id="total_records"> {{ $phaselands }} متر مربع</span></h3>
            <h3 align="center" class="pb-3">آمار پرداخت ها در {{ $phaseType }}<span id="total_records"></span></h3>
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
                        <td>{{ $phasepaymentsfarvardinvalue }}</td>
                        <td>{{ $phasepaymentsordibeheshtvalue }}</td>
                        <td>{{ $phasepaymentskhordadvalue }}</td>
                        <td>{{ $phasepaymentstirvalue }}</td>
                        <td>{{ $phasepaymentsmordadvalue }}</td>
                        <td>{{ $phasepaymentsshahrivarvalue }}</td>
                        <td>{{ $phasepaymentsmehrvalue }}</td>
                        <td>{{ $phasepaymentsabanvalue }}</td>
                        <td>{{ $phasepaymentsazarvalue }}</td>
                        <td>{{ $phasepaymentsdeyvalue }}</td>
                        <td>{{ $phasepaymentsbahmanvalue }}</td>
                        <td>{{ $phasepaymentsesfandvalue }}</td>
                    </tr>
                </tbody>

            </table>
        </div>

        <div class="row justify-content-center">
            <div class="col-8">
                {!! $ppchart->container() !!}
            </div>
        </div>

        <div class="table-responsive pt-4">
            <h3 align="center" class="pb-3">آمار فروش ها در {{ $phaseType }}<span id="total_records"></span></h3>
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
                    <td>{{ $phasedebtsfarvardinvalue }}</td>
                    <td>{{ $phasedebtsordibeheshtvalue }}</td>
                    <td>{{ $phasedebtskhordadvalue }}</td>
                    <td>{{ $phasedebtstirvalue }}</td>
                    <td>{{ $phasedebtsmordadvalue }}</td>
                    <td>{{ $phasedebtsshahrivarvalue }}</td>
                    <td>{{ $phasedebtsmehrvalue }}</td>
                    <td>{{ $phasedebtsabanvalue }}</td>
                    <td>{{ $phasedebtsazarvalue }}</td>
                    <td>{{ $phasedebtsdeyvalue }}</td>
                    <td>{{ $phasedebtsbahmanvalue }}</td>
                    <td>{{ $phasedebtsesfandvalue }}</td>
                </tr>
                </tbody>

            </table>
        </div>

        <div class="row justify-content-center">
            <div class="col-8">
                {!! $pdchart->container() !!}
            </div>
        </div>

    </div>

    {!! $ppchart->script() !!}
    {!! $pdchart->script() !!}
@endsection


