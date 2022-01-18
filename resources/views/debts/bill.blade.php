@extends('layouts.app')

@section('content')
    <div class="container" style="font-family: Yekan">

        @include('layouts.menu')

        <h1 class="text-right pb-3">{{ $user->name }} &nbsp آخرین قبض</h1>

        <div class="row border" style="margin-bottom: 10px">

      <div class="col-4">
        <div class="table-responsive pt-4">

            <table class="table table-striped table-bordered text-center table-sm">

                <thead class="thead-dark">
                <tr>
                    <th style="direction: rtl">هزینه (ریال)</th>
                    <th>عنوان سرویس</th>
                </tr>
                </thead>

                <tbody>

                <tr>
                    <td>
                        {{ $abbahacost }}
                    </td>
                    <td>
                        آب بها
                    </td>
                </tr>

                <tr>
                    <td>
                        {{ $abonmancost }}
                    </td>
                    <td>
                        آبونمان
                    </td>
                </tr>

                @if($user->sanitation == 'true')
                <tr>
                    <td>
                        {{ $daffazelab }}
                    </td>
                    <td>
                        خدمات دفع فاضلاب
                    </td>
                </tr>
                @endif

                @if($user->sanitation == 'true')
                <tr>
                    <td>
                            {{ $abonmancost }}
                    </td>
                    <td>
                        آبونمان فاضلاب
                    </td>
                </tr>
                @endif

                <tr>
                    <td>
                        {{ $servicescost }}
                    </td>
                    <td>
                        هزینه خدمات
                    </td>
                </tr>

                    @foreach($generalservices as $generalservice)
                        <tr>
                        <td>{{ $generalservice->cost }}</td>
                        <td>{{ $generalservice->title }}</td>
                        </tr>
                    @endforeach

                    @foreach($specialisedservices as $specialisedservice)
                        <tr>
                            <td>{{ $specialisedservice->cost }}</td>
                            <td>{{ $specialisedservice->title }}</td>
                        </tr>
                    @endforeach

                <tr>
                    <td>
                        @if($user->sanitation == 'true') {{ $maliatwithfazelab }}
                        @else {{ $maliatwithoutfazelab  }}
                        @endif
                    </td>
                    <td>
                        مالیات
                    </td>
                </tr>

                <tr>
                    <td>
                      {{ $lastdebtshowcost }}
                    </td>
                    <td>
                        بدهی قبلی
                    </td>
                </tr>

                <tr>
                    <td class="bg-dark text-white">
                        @if($user->sanitation == 'true') {{ $totalcostwithfazelab+$lastdebtshowcost }}
                            @else {{ $totalcostwithoutfazelab+$lastdebtshowcost }}
                        @endif
                    </td>
                    <td class="bg-success">
                        مبلغ قابل پرداخت
                    </td>
                </tr>

                </tbody>

            </table>

        </div>
      </div>

        <div class="col-8">

            <div class="table-responsive pt-4">

                <div class="bg-white text-right d-flex pl-3" style="height: 75px; border: 1px solid gray; border-radius: 10px; margin-bottom: 10px; padding-top: 3px; padding-right: 5px; direction: rtl;">
                    <div class="col-2">
                        <img src="/img/shahraklogo.jpg" style="max-width: 74px;">
                    </div>
                    <div class="col-8 text-center" style="padding-top: 5px;">
                        <div style="padding-bottom: 6px;">
                            <h5>شرکت خدماتی شهرک صنعتی شهرکرد</h5>
                        </div>
                        <div>
                            شماره حساب بانک صادرات: 0106619830001
                        </div>
                    </div>
                    <div class="col-2 bg-success text-center text-white" style="border: 1px solid gray; border-radius: 10px; height: 50px; margin-top: 10px; padding-top: 10px; font-size: 13px;">
                        نسخه مشتری
                    </div>
                </div>

                <table class="table table-striped table-bordered text-center table-sm">
                    <tbody>
                    <tr>
                        <td colspan="3">
                            {{ $user->name }}
                        </td>
                        <th colspan="1" class="bg-dark text-white">
                           مشترک گرامی
                        </th>
                    </tr>

                    <tr>
                        <td>
                          {{ $data['billnumber'] }}
                        </td>
                        <th class="bg-dark text-white">
                            شناسه قبض
                        </th>
                        <td>
                            {{ $user->id }}
                        </td>
                        <th class="bg-dark text-white">
                            شناسه شرکت
                        </th>
                    </tr>
                    <tr>
                        <td colspan="3">
                            {{ $profile->address }}
                        </td>
                        <th colspan="1" class="bg-dark text-white">
                            آدرس
                        </th>
                    </tr>

                    <tr>
                        <td>
                            {{ $data['timefromyear']. '/' . $data['timefrommonth'] . '/' . $data['timefromday'] }}
                        </td>
                        <th class="bg-dark text-white">
                            از تاریخ
                        </th>
                        <td>
                            {{ $data['lastcounternumber'] }}
                        </td>
                        <th class="bg-dark text-white">
                            شماره کنتور قبلی
                        </th>
                    </tr>

                    <tr>
                        <td>
                            {{ $data['timetoyear']. '/' . $data['timetomonth'] . '/' . $data['timetoday'] }}
                        </td>
                        <th class="bg-dark text-white">
                            تا تاریخ
                        </th>
                        <td>
                            {{ $data['currentcounternumber'] }}
                        </td>
                        <th class="bg-dark text-white">
                            شماره کنتور فعلی
                        </th>
                    </tr>

                    <tr>
                        <td>
                            {{ $data['paymentdeadlineyear']. '/' . $data['paymentdeadlinemonth'] . '/' . $data['paymentdeadlineday'] }}
                        </td>
                        <th class="bg-dark text-white">
                            مهلت پرداخت
                        </th>
                        <td>
                            {{ $periodconsumption }}
                        </td>
                        <th class="bg-dark text-white">
                            مصرف دوره
                        </th>
                    </tr>
                    </tbody>
                </table>

                <div class="text-right bg-white" style="direction:rtl; height: 60px; border: 1px solid gray; border-radius: 10px; margin-top: 10px; padding-right: 8px;">
                    توضیحات:
                </div>

            </div>
        </div>

        </div>





        <div class="row border" style="margin-bottom: 10px">

            <div class="col-4">
                <div class="table-responsive pt-4">

                    <table class="table table-striped table-bordered text-center table-sm">

                        <thead class="thead-dark">
                        <tr>
                            <th style="direction: rtl">هزینه (ریال)</th>
                            <th>عنوان سرویس</th>
                        </tr>
                        </thead>

                        <tbody>

                        <tr>
                            <td>
                                {{ $abbahacost }}
                            </td>
                            <td>
                                آب بها
                            </td>
                        </tr>

                        <tr>
                            <td>
                                {{ $abonmancost }}
                            </td>
                            <td>
                                آبونمان
                            </td>
                        </tr>

                        @if($user->sanitation == 'true')
                            <tr>
                                <td>
                                    {{ $daffazelab }}
                                </td>
                                <td>
                                    خدمات دفع فاضلاب
                                </td>
                            </tr>
                        @endif

                        @if($user->sanitation == 'true')
                            <tr>
                                <td>
                                    {{ $abonmancost }}
                                </td>
                                <td>
                                    آبونمان فاضلاب
                                </td>
                            </tr>
                        @endif

                        <tr>
                            <td>
                                {{ $servicescost }}
                            </td>
                            <td>
                                هزینه خدمات
                            </td>
                        </tr>

                        @foreach($generalservices as $generalservice)
                            <tr>
                                <td>{{ $generalservice->cost }}</td>
                                <td>{{ $generalservice->title }}</td>
                            </tr>
                        @endforeach

                        @foreach($specialisedservices as $specialisedservice)
                            <tr>
                                <td>{{ $specialisedservice->cost }}</td>
                                <td>{{ $specialisedservice->title }}</td>
                            </tr>
                        @endforeach

                        <tr>
                            <td>
                                @if($user->sanitation == 'true') {{ $maliatwithfazelab }}
                                @else {{ $maliatwithoutfazelab  }}
                                @endif
                            </td>
                            <td>
                                مالیات
                            </td>
                        </tr>

                        <tr>
                            <td>
                                {{ $lastdebtshowcost }}
                            </td>
                            <td>
                                بدهی قبلی
                            </td>
                        </tr>

                        <tr>
                            <td class="bg-dark text-white">
                                @if($user->sanitation == 'true') {{ $totalcostwithfazelab+$lastdebtshowcost }}
                                @else {{ $totalcostwithoutfazelab+$lastdebtshowcost }}
                                @endif
                            </td>
                            <td class="bg-success">
                                مبلغ قابل پرداخت
                            </td>
                        </tr>

                        </tbody>

                    </table>

                </div>
            </div>

            <div class="col-8">

                <div class="table-responsive pt-4">

                    <div class="bg-white text-right d-flex pl-3" style="height: 75px; border: 1px solid gray; border-radius: 10px; margin-bottom: 10px; padding-top: 3px; padding-right: 5px; direction: rtl;">
                        <div class="col-2">
                            <img src="/img/shahraklogo.jpg" style="max-width: 74px;">
                        </div>
                        <div class="col-8 text-center" style="padding-top: 5px;">
                            <div style="padding-bottom: 6px;">
                                <h5>شرکت خدماتی شهرک صنعتی شهرکرد</h5>
                            </div>
                            <div>
                                شماره حساب بانک صادرات: 0106619830001
                            </div>
                        </div>
                        <div class="col-2 bg-success text-center text-white" style="border: 1px solid gray; border-radius: 10px; height: 50px; margin-top: 10px; padding-top: 10px;">
                            نسخه شرکت
                        </div>
                    </div>

                    <table class="table table-striped table-bordered text-center table-sm">
                        <tbody>
                        <tr>
                            <td colspan="3">
                                {{ $user->name }}
                            </td>
                            <th colspan="1" class="bg-dark text-white">
                                مشترک گرامی
                            </th>
                        </tr>

                        <tr>
                            <td>
                                {{ $data['billnumber'] }}
                            </td>
                            <th class="bg-dark text-white">
                                شناسه قبض
                            </th>
                            <td>
                                {{ $user->id }}
                            </td>
                            <th class="bg-dark text-white">
                                شناسه شرکت
                            </th>
                        </tr>
                        <tr>
                            <td colspan="3">
                                {{ $profile->address }}
                            </td>
                            <th colspan="1" class="bg-dark text-white">
                                آدرس
                            </th>
                        </tr>

                        <tr>
                            <td>
                                {{ $data['timefromyear']. '/' . $data['timefrommonth'] . '/' . $data['timefromday'] }}
                            </td>
                            <th class="bg-dark text-white">
                                از تاریخ
                            </th>
                            <td>
                                {{ $data['lastcounternumber'] }}
                            </td>
                            <th class="bg-dark text-white">
                                شماره کنتور قبلی
                            </th>
                        </tr>

                        <tr>
                            <td>
                                {{ $data['timetoyear']. '/' . $data['timetomonth'] . '/' . $data['timetoday'] }}
                            </td>
                            <th class="bg-dark text-white">
                                تا تاریخ
                            </th>
                            <td>
                                {{ $data['currentcounternumber'] }}
                            </td>
                            <th class="bg-dark text-white">
                                شماره کنتور فعلی
                            </th>
                        </tr>

                        <tr>
                            <td>
                                {{ $data['paymentdeadlineyear']. '/' . $data['paymentdeadlinemonth'] . '/' . $data['paymentdeadlineday'] }}
                            </td>
                            <th class="bg-dark text-white">
                                مهلت پرداخت
                            </th>
                            <td>
                                {{ $periodconsumption }}
                            </td>
                            <th class="bg-dark text-white">
                                مصرف دوره
                            </th>
                        </tr>
                        </tbody>
                    </table>

                    <div class="text-right bg-white" style="direction:rtl; height: 60px; border: 1px solid gray; border-radius: 10px; margin-top: 10px; padding-right: 8px;">
                        توضیحات:
                    </div>

                </div>
            </div>

        </div>




        <div class="row border" style="margin-bottom: 10px">

            <div class="col-4">
                <div class="table-responsive pt-4">

                    <table class="table table-striped table-bordered text-center table-sm">

                        <thead class="thead-dark">
                        <tr>
                            <th style="direction: rtl">هزینه (ریال)</th>
                            <th>عنوان سرویس</th>
                        </tr>
                        </thead>

                        <tbody>

                        <tr>
                            <td>
                                {{ $abbahacost }}
                            </td>
                            <td>
                                آب بها
                            </td>
                        </tr>

                        <tr>
                            <td>
                                {{ $abonmancost }}
                            </td>
                            <td>
                                آبونمان
                            </td>
                        </tr>

                        @if($user->sanitation == 'true')
                            <tr>
                                <td>
                                    {{ $daffazelab }}
                                </td>
                                <td>
                                    خدمات دفع فاضلاب
                                </td>
                            </tr>
                        @endif

                        @if($user->sanitation == 'true')
                            <tr>
                                <td>
                                    {{ $abonmancost }}
                                </td>
                                <td>
                                    آبونمان فاضلاب
                                </td>
                            </tr>
                        @endif

                        <tr>
                            <td>
                                {{ $servicescost }}
                            </td>
                            <td>
                                هزینه خدمات
                            </td>
                        </tr>

                        @foreach($generalservices as $generalservice)
                            <tr>
                                <td>{{ $generalservice->cost }}</td>
                                <td>{{ $generalservice->title }}</td>
                            </tr>
                        @endforeach

                        @foreach($specialisedservices as $specialisedservice)
                            <tr>
                                <td>{{ $specialisedservice->cost }}</td>
                                <td>{{ $specialisedservice->title }}</td>
                            </tr>
                        @endforeach

                        <tr>
                            <td>
                                @if($user->sanitation == 'true') {{ $maliatwithfazelab }}
                                @else {{ $maliatwithoutfazelab  }}
                                @endif
                            </td>
                            <td>
                                مالیات
                            </td>
                        </tr>

                        <tr>
                            <td>
                                {{ $lastdebtshowcost }}
                            </td>
                            <td>
                                بدهی قبلی
                            </td>
                        </tr>

                        <tr>
                            <td class="bg-dark text-white">
                                @if($user->sanitation == 'true') {{ $totalcostwithfazelab+$lastdebtshowcost }}
                                @else {{ $totalcostwithoutfazelab+$lastdebtshowcost }}
                                @endif
                            </td>
                            <td class="bg-success">
                                مبلغ قابل پرداخت
                            </td>
                        </tr>

                        </tbody>

                    </table>

                </div>
            </div>

            <div class="col-8">

                <div class="table-responsive pt-4">

                    <div class="bg-white text-right d-flex pl-3" style="height: 75px; border: 1px solid gray; border-radius: 10px; margin-bottom: 10px; padding-top: 3px; padding-right: 5px; direction: rtl;">
                        <div class="col-2">
                            <img src="/img/shahraklogo.jpg" style="max-width: 74px;">
                        </div>
                        <div class="col-8 text-center" style="padding-top: 5px;">
                            <div style="padding-bottom: 6px;">
                                <h5>شرکت خدماتی شهرک صنعتی شهرکرد</h5>
                            </div>
                            <div>
                                شماره حساب بانک صادرات: 0106619830001
                            </div>
                        </div>
                        <div class="col-2 bg-success text-center text-white" style="border: 1px solid gray; border-radius: 10px; height: 50px; margin-top: 10px; padding-top: 10px;">
                            نسخه بانک
                        </div>
                    </div>

                    <table class="table table-striped table-bordered text-center table-sm">
                        <tbody>
                        <tr>
                            <td colspan="3">
                                {{ $user->name }}
                            </td>
                            <th colspan="1" class="bg-dark text-white">
                                مشترک گرامی
                            </th>
                        </tr>

                        <tr>
                            <td>
                                {{ $data['billnumber'] }}
                            </td>
                            <th class="bg-dark text-white">
                                شناسه قبض
                            </th>
                            <td>
                                {{ $user->id }}
                            </td>
                            <th class="bg-dark text-white">
                                شناسه شرکت
                            </th>
                        </tr>
                        <tr>
                            <td colspan="3">
                                {{ $profile->address }}
                            </td>
                            <th colspan="1" class="bg-dark text-white">
                                آدرس
                            </th>
                        </tr>

                        <tr>
                            <td>
                                {{ $data['timefromyear']. '/' . $data['timefrommonth'] . '/' . $data['timefromday'] }}
                            </td>
                            <th class="bg-dark text-white">
                                از تاریخ
                            </th>
                            <td>
                                {{ $data['lastcounternumber'] }}
                            </td>
                            <th class="bg-dark text-white">
                                شماره کنتور قبلی
                            </th>
                        </tr>

                        <tr>
                            <td>
                                {{ $data['timetoyear']. '/' . $data['timetomonth'] . '/' . $data['timetoday'] }}
                            </td>
                            <th class="bg-dark text-white">
                                تا تاریخ
                            </th>
                            <td>
                                {{ $data['currentcounternumber'] }}
                            </td>
                            <th class="bg-dark text-white">
                                شماره کنتور فعلی
                            </th>
                        </tr>

                        <tr>
                            <td>
                                {{ $data['paymentdeadlineyear']. '/' . $data['paymentdeadlinemonth'] . '/' . $data['paymentdeadlineday'] }}
                            </td>
                            <th class="bg-dark text-white">
                                مهلت پرداخت
                            </th>
                            <td>
                                {{ $periodconsumption }}
                            </td>
                            <th class="bg-dark text-white">
                                مصرف دوره
                            </th>
                        </tr>
                        </tbody>
                    </table>

                    <div class="text-right bg-white" style="direction:rtl; height: 60px; border: 1px solid gray; border-radius: 10px; margin-top: 10px; padding-right: 8px;">
                        توضیحات:
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
