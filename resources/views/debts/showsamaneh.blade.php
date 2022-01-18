@extends('layouts.app')

@section('content')
    <div class="container" style="font-family: Yekan">

        <h1 class="text-right pb-3">{{ $debt->user->name }} &nbsp
            قبض
            @if($debt->timetomonth == 1)فروردین ماه
            @elseif($debt->timetomonth == 2)اردیبهشت ماه
            @elseif($debt->timetomonth == 3)خرداد ماه
            @elseif($debt->timetomonth == 4) تیر ماه
            @elseif($debt->timetomonth == 5) مرداد ماه
            @elseif($debt->timetomonth == 6) شهریور ماه
            @elseif($debt->timetomonth == 7) مهر ماه
            @elseif($debt->timetomonth == 8) آبان ماه
            @elseif($debt->timetomonth == 9) آذر ماه
            @elseif($debt->timetomonth == 10) دی ماه
            @elseif($debt->timetomonth == 11) بهمن ماه
            @elseif($debt->timetomonth == 12) اسفند ماه
            @endif
            &nbsp
            {{ $debt->timetoyear }}
        </h1>

        <div class="row border" style="margin-bottom: 10px">

            <div class="col-4">
                <div class="table-responsive pt-4">

                    <table class="table table-striped table-bordered text-center table-sm">

                        <thead class="bg-primary">
                        <tr>
                            <th style="direction: rtl">هزینه (ریال)</th>
                            <th>شرح</th>
                        </tr>
                        </thead>

                        <tbody>

                        <tr>
                            <td>
                                {{ round(($debt->abbahacost)+(($debt->periodconsumption)*1150)) }}
                            </td>
                            <td class="font-weight-bold" style="font-size: 12px;">
                                آب بها
                            </td>
                        </tr>

                        <tr>
                            <td>
                                {{ $debt->abonmancost }}
                            </td>
                            <td class="font-weight-bold" style="font-size: 12px;">
                                آبونمان
                            </td>
                        </tr>

                        @if($debt->user->sanitation == 'true')
                            <tr>
                                <td>
                                    {{ $daffazelabfinal = round((($debt->abbahacost+$debt->periodconsumption*1150)*0.65*$debt->user->sanitationfraction)) }}
                                </td>
                                <td class="font-weight-bold" style="font-size: 12px;">
                                    خدمات دفع فاضلاب
                                </td>
                            </tr>
                        @endif

                        @if($debt->user->sanitation == 'true')
                            <tr>
                                <td>
                                    {{ $debt->abonmancost }}
                                </td>
                                <td class="font-weight-bold" style="font-size: 12px;">
                                    آبونمان فاضلاب
                                </td>
                            </tr>
                        @endif

                        <tr>
                            <td>
                                {{ $debt->servicescost }}
                            </td>
                            <td class="font-weight-bold" style="direction:rtl; font-size: 10px;">
                                حق شارژ(عوارض زمین)
                            </td>
                        </tr>

                        @if($gtitleservices != 0)

                            @foreach (array_combine($gtitleservices, $gcostservices) as $gtitleservice => $gcostservice)
                                <tr>
                                    <td>{{ $gcostservice }}</td>
                                    <td class="font-weight-bold" style="font-size: 12px;">{{ $gtitleservice }}</td>
                                </tr>
                            @endforeach

                            @foreach (array_combine($stitleservices, $scostservices) as $stitleservice => $scostservice)
                                <tr>
                                    <td>{{ $scostservice }}</td>
                                    <td class="font-weight-bold" style="font-size: 12px;">{{ $stitleservice }}</td>
                                </tr>
                            @endforeach

                        @elseif($gtitleservices == 0)

                            @foreach($generalservices as $generalservice)
                                <tr>
                                    <td>{{ $generalservice->cost }}</td>
                                    <td class="font-weight-bold" style="font-size: 12px;">{{ $generalservice->title }}</td>
                                </tr>
                            @endforeach

                            @foreach($specialisedservices as $specialisedservice)
                                <tr>
                                    <td>{{ $specialisedservice->cost }}</td>
                                    <td class="font-weight-bold" style="font-size: 12px;">{{ $specialisedservice->title }}</td>
                                </tr>
                            @endforeach

                        @endif

                        <tr>
                            <td>
                                {{ $debt->maliat  }}
                            </td>
                            <td class="font-weight-bold" style="font-size: 11px;">
                                مالیات بر ارزش افزوده
                            </td>
                        </tr>

                        <tr>
                            <td>
                                {{ $debt->lastdebt }}
                            </td>
                            <td class="font-weight-bold" style="font-size: 12px;">
                                بدهی قبلی
                            </td>
                        </tr>

                        <tr>
                            <td>
                                {{ $userfinhistory->usercredit }}
                            </td>
                            <td class="font-weight-bold" style="font-size: 12px;">
                                بستانکاری
                            </td>
                        </tr>

                        @if($debt->addedgeneralcost != 0)
                            <tr>
                                <td class="bg-primary">
                                    {{ $debt->addedgeneralcost }}
                                </td>
                                <td class="bg-success font-weight-bold" style="font-size: 12px;">
                                    هزینه هایی عمومی
                                </td>
                            </tr>
                        @endif


                        <tr>
                            <td class="bg-primary font-weight-bold" style="font-size: 16px;">
                                {{ round($debt->totalcost+$debt->lastdebt-$userfinhistory->usercredit+$userfinhistory->userdebt, -3) }}
                            </td>
                            <td class="bg-success font-weight-bold" style="direction: rtl; font-size: 12px;">
                                مبلغ قابل پرداخت
                            </td>
                        </tr>

                        <tr>
                            <td class="bg-primary font-weight-bold" style="font-size: 11px;">
                                {{ mablagh(round($debt->totalcost+$debt->lastdebt-$userfinhistory->usercredit+$userfinhistory->userdebt, -3)) }}
                            </td>
                            <td class="bg-success font-weight-bold" style="direction: rtl; font-size: 12px;">
                                مبلغ (به حروف)
                            </td>
                        </tr>

                        </tbody>

                    </table>

                </div>
            </div>

            <div class="col-8">

                <div class="table-responsive pt-4">

                    <div class="bg-white font-weight-bold d-flex" style="height: 90px; border: 1px solid gray; border-radius: 10px; margin-bottom: 10px; padding-top: 8px; padding-right: 5px; direction: rtl;">
                        <div class="col-1">
                            <img src="/img/shahraklogo.jpg" style="max-width: 74px;">
                        </div>


                        <div class="col-5 text-center mr-4" style="padding-top: 4px;">
                            <div class="font-weight-bold" style="font-size:14px">
                                شرکت خدماتی شهرک صنعتی شهرکرد
                            </div>
                            <div style="font-size:12px">
                                شماره حساب بانک صادرات: <br>0106619830001
                            </div>
                        </div>


                        <div class="col-4 text-center" style="padding-top: 4px; margin-right: -40px">
                            <div style="font-size:13px">
                                کد اقتصادی: 411448544477
                            </div>
                            <div style="font-size:13px">
                                شناسه ملی: 14003980869
                            </div>
                            <div style="font-size:13px">
                                شماره ثبت: 11296
                            </div>
                        </div>


                        <div class="col-2 bg-success text-center" style="border: 1px solid gray; border-radius: 10px; height: 50px; margin-top: 10px; padding-top: 10px; font-size: 13px;">
                            نسخه شرکت
                        </div>
                    </div>

                    <table class="table table-striped table-bordered text-center table-sm">
                        <tbody>
                        <tr>
                            <td colspan="3">
                                {{ $debt->user->name }}
                            </td>
                            <th colspan="1" class="bg-primary">
                                مشترک گرامی
                            </th>
                        </tr>

                        <tr>
                            <td>
                                {{ $debt->billnumber }}
                            </td>
                            <th class="bg-primary">
                                شناسه قبض
                            </th>
                            <td>
                                {{ $debt->user->id }}
                            </td>
                            <th class="bg-primary">
                                شناسه شرکت
                            </th>
                        </tr>
                        <tr>
                            <td colspan="3">
                                {{ $debt->user->profile->address }}
                            </td>
                            <th colspan="1" class="bg-primary">
                                آدرس
                            </th>
                        </tr>

                        <tr>
                            <td>
                                {{ $debt->timefromyear. '/' . $debt->timefrommonth . '/' . $debt->timefromday }}
                            </td>
                            <th class="bg-primary">
                                از تاریخ
                            </th>
                            <td>
                                {{ $debt->lastcounternumber }}
                            </td>
                            <th class="bg-primary">
                                شماره کنتور قبلی
                            </th>
                        </tr>

                        <tr>
                            <td>
                                {{ $debt->timetoyear. '/' . $debt->timetomonth . '/' . $debt->timetoday }}
                            </td>
                            <th class="bg-primary">
                                تا تاریخ
                            </th>
                            <td>
                                {{ $debt->currentcounternumber }}
                            </td>
                            <th class="bg-primary">
                                شماره کنتور فعلی
                            </th>
                        </tr>

                        <tr>
                            <td>
                                {{ $debt->paymentdeadlineyear. '/' . $debt->paymentdeadlinemonth . '/' . $debt->paymentdeadlineday }}
                            </td>
                            <th class="bg-primary">
                                مهلت پرداخت
                            </th>
                            <td>
                                {{ $debt->periodconsumption }}
                            </td>
                            <th class="bg-primary">
                                مصرف دوره
                            </th>
                        </tr>
                        </tbody>
                    </table>

                    <div class="text-right bg-white" style="direction:rtl; height: 110px; border: 1px solid gray; border-radius: 10px; margin-top: 10px; margin-bottom: 10px; padding-right: 8px;">
                        توضیحات:
                        <div class="text-danger"> {{ $ekhtar }} </div>
                    </div>

                </div>
            </div>

        </div>




        <div class="row border" style="margin-bottom: 10px">

            <div class="col-4">
                <div class="table-responsive pt-4">

                    <table class="table table-striped table-bordered text-center table-sm">

                        <thead class="bg-primary">
                        <tr>
                            <th style="direction: rtl">هزینه (ریال)</th>
                            <th>شرح</th>
                        </tr>
                        </thead>

                        <tbody>

                        <tr>
                            <td>
                                {{ round(($debt->abbahacost)+(($debt->periodconsumption)*1150)) }}
                            </td>
                            <td class="font-weight-bold" style="font-size: 12px;">
                                آب بها
                            </td>
                        </tr>

                        <tr>
                            <td>
                                {{ $debt->abonmancost }}
                            </td>
                            <td class="font-weight-bold" style="font-size: 12px;">
                                آبونمان
                            </td>
                        </tr>

                        @if($debt->user->sanitation == 'true')
                            <tr>
                                <td>
                                    {{ $daffazelabfinal = round((($debt->abbahacost+$debt->periodconsumption*1150)*0.65*$debt->user->sanitationfraction)) }}
                                </td>
                                <td class="font-weight-bold" style="font-size: 12px;">
                                    خدمات دفع فاضلاب
                                </td>
                            </tr>
                        @endif

                        @if($debt->user->sanitation == 'true')
                            <tr>
                                <td>
                                    {{ $debt->abonmancost }}
                                </td>
                                <td class="font-weight-bold" style="font-size: 12px;">
                                    آبونمان فاضلاب
                                </td>
                            </tr>
                        @endif

                        <tr>
                            <td>
                                {{ $debt->servicescost }}
                            </td>
                            <td class="font-weight-bold" style="direction:rtl; font-size: 10px;">
                                حق شارژ(عوارض زمین)
                            </td>
                        </tr>

                        @if($gtitleservices != 0)

                            @foreach (array_combine($gtitleservices, $gcostservices) as $gtitleservice => $gcostservice)
                                <tr>
                                    <td>{{ $gcostservice }}</td>
                                    <td class="font-weight-bold" style="font-size: 12px;">{{ $gtitleservice }}</td>
                                </tr>
                            @endforeach

                            @foreach (array_combine($stitleservices, $scostservices) as $stitleservice => $scostservice)
                                <tr>
                                    <td>{{ $scostservice }}</td>
                                    <td class="font-weight-bold" style="font-size: 12px;">{{ $stitleservice }}</td>
                                </tr>
                            @endforeach

                        @elseif($gtitleservices == 0)

                            @foreach($generalservices as $generalservice)
                                <tr>
                                    <td>{{ $generalservice->cost }}</td>
                                    <td class="font-weight-bold" style="font-size: 12px;">{{ $generalservice->title }}</td>
                                </tr>
                            @endforeach

                            @foreach($specialisedservices as $specialisedservice)
                                <tr>
                                    <td>{{ $specialisedservice->cost }}</td>
                                    <td class="font-weight-bold" style="font-size: 12px;">{{ $specialisedservice->title }}</td>
                                </tr>
                            @endforeach

                        @endif

                        <tr>
                            <td>
                                {{ $debt->maliat  }}
                            </td>
                            <td class="font-weight-bold" style="font-size: 11px;">
                                مالیات بر ارزش افزوده
                            </td>
                        </tr>

                        <tr>
                            <td>
                                {{ $debt->lastdebt }}
                            </td>
                            <td class="font-weight-bold" style="font-size: 12px;">
                                بدهی قبلی
                            </td>
                        </tr>

                        <tr>
                            <td>
                                {{ $userfinhistory->usercredit }}
                            </td>
                            <td class="font-weight-bold" style="font-size: 12px;">
                                بستانکاری
                            </td>
                        </tr>


                        @if($debt->addedgeneralcost != 0)
                            <tr>
                                <td class="bg-primary">
                                    {{ $debt->addedgeneralcost }}
                                </td>
                                <td class="bg-success font-weight-bold" style="font-size: 12px;">
                                    هزینه هایی عمومی
                                </td>
                            </tr>
                        @endif


                        <tr>
                            <td class="bg-primary font-weight-bold" style="font-size: 16px;">
                                {{ round($debt->totalcost+$debt->lastdebt-$userfinhistory->usercredit+$userfinhistory->userdebt, -3) }}
                            </td>
                            <td class="bg-success font-weight-bold" style="direction: rtl; font-size: 12px;">
                                مبلغ قابل پرداخت
                            </td>
                        </tr>

                        <tr>
                            <td class="bg-primary font-weight-bold" style="font-size: 11px;">
                                {{ mablagh(round($debt->totalcost+$debt->lastdebt-$userfinhistory->usercredit+$userfinhistory->userdebt, -3)) }}
                            </td>
                            <td class="bg-success font-weight-bold" style="direction: rtl; font-size: 12px;">
                                مبلغ (به حروف)
                            </td>
                        </tr>

                        </tbody>

                    </table>

                </div>
            </div>

            <div class="col-8">

                <div class="table-responsive pt-4">

                    <div class="bg-white font-weight-bold d-flex" style="height: 90px; border: 1px solid gray; border-radius: 10px; margin-bottom: 10px; padding-top: 8px; padding-right: 5px; direction: rtl;">
                        <div class="col-1">
                            <img src="/img/shahraklogo.jpg" style="max-width: 74px;">
                        </div>


                        <div class="col-5 text-center mr-4" style="padding-top: 4px;">
                            <div class="font-weight-bold" style="font-size:14px">
                                شرکت خدماتی شهرک صنعتی شهرکرد
                            </div>
                            <div style="font-size:12px">
                                شماره حساب بانک صادرات: <br>0106619830001
                            </div>
                        </div>


                        <div class="col-4 text-center" style="padding-top: 4px; margin-right: -40px">
                            <div style="font-size:13px">
                                کد اقتصادی: 411448544477
                            </div>
                            <div style="font-size:13px">
                                شناسه ملی: 14003980869
                            </div>
                            <div style="font-size:13px">
                                شماره ثبت: 11296
                            </div>
                        </div>


                        <div class="col-2 bg-success text-center" style="border: 1px solid gray; border-radius: 10px; height: 50px; margin-top: 10px; padding-top: 10px; font-size: 13px;">
                            نسخه مشتری
                        </div>
                    </div>

                    <table class="table table-striped table-bordered text-center table-sm">
                        <tbody>
                        <tr>
                            <td colspan="3">
                                {{ $debt->user->name }}
                            </td>
                            <th colspan="1" class="bg-primary">
                                مشترک گرامی
                            </th>
                        </tr>

                        <tr>
                            <td>
                                {{ $debt->billnumber }}
                            </td>
                            <th class="bg-primary">
                                شناسه قبض
                            </th>
                            <td>
                                {{ $debt->user->id }}
                            </td>
                            <th class="bg-primary">
                                شناسه شرکت
                            </th>
                        </tr>
                        <tr>
                            <td colspan="3">
                                {{ $debt->user->profile->address }}
                            </td>
                            <th colspan="1" class="bg-primary">
                                آدرس
                            </th>
                        </tr>

                        <tr>
                            <td>
                                {{ $debt->timefromyear. '/' . $debt->timefrommonth . '/' . $debt->timefromday }}
                            </td>
                            <th class="bg-primary">
                                از تاریخ
                            </th>
                            <td>
                                {{ $debt->lastcounternumber }}
                            </td>
                            <th class="bg-primary">
                                شماره کنتور قبلی
                            </th>
                        </tr>

                        <tr>
                            <td>
                                {{ $debt->timetoyear. '/' . $debt->timetomonth . '/' . $debt->timetoday }}
                            </td>
                            <th class="bg-primary">
                                تا تاریخ
                            </th>
                            <td>
                                {{ $debt->currentcounternumber }}
                            </td>
                            <th class="bg-primary">
                                شماره کنتور فعلی
                            </th>
                        </tr>

                        <tr>
                            <td>
                                {{ $debt->paymentdeadlineyear. '/' . $debt->paymentdeadlinemonth . '/' . $debt->paymentdeadlineday }}
                            </td>
                            <th class="bg-primary">
                                مهلت پرداخت
                            </th>
                            <td>
                                {{ $debt->periodconsumption }}
                            </td>
                            <th class="bg-primary">
                                مصرف دوره
                            </th>
                        </tr>
                        </tbody>
                    </table>

                    <div class="text-right bg-white" style="direction:rtl; height: 110px; border: 1px solid gray; border-radius: 10px; margin-top: 10px; margin-bottom: 10px; padding-right: 8px;">
                        توضیحات:
                        <div class="text-danger"> {{ $ekhtar }} </div>
                    </div>

                </div>
            </div>

        </div>




        <div class="row border">

            <div class="col-4">
                <div class="table-responsive pt-4">

                    <table class="table table-striped table-bordered text-center table-sm">

                        <thead class="bg-primary">
                        <tr>
                            <th style="direction: rtl">هزینه (ریال)</th>
                            <th>شرح</th>
                        </tr>
                        </thead>

                        <tbody>

                        <tr>
                            <td>
                                {{ round(($debt->abbahacost)+(($debt->periodconsumption)*1150)) }}
                            </td>
                            <td class="font-weight-bold" style="font-size: 12px;">
                                آب بها
                            </td>
                        </tr>

                        <tr>
                            <td>
                                {{ $debt->abonmancost }}
                            </td>
                            <td class="font-weight-bold" style="font-size: 12px;">
                                آبونمان
                            </td>
                        </tr>

                        @if($debt->user->sanitation == 'true')
                            <tr>
                                <td>
                                    {{ $daffazelabfinal = round((($debt->abbahacost+$debt->periodconsumption*1150)*0.65*$debt->user->sanitationfraction)) }}
                                </td>
                                <td class="font-weight-bold" style="font-size: 12px;">
                                    خدمات دفع فاضلاب
                                </td>
                            </tr>
                        @endif

                        @if($debt->user->sanitation == 'true')
                            <tr>
                                <td>
                                    {{ $debt->abonmancost }}
                                </td>
                                <td class="font-weight-bold" style="font-size: 12px;">
                                    آبونمان فاضلاب
                                </td>
                            </tr>
                        @endif

                        <tr>
                            <td>
                                {{ $debt->servicescost }}
                            </td>
                            <td class="font-weight-bold" style="direction:rtl; font-size: 10px;">
                                حق شارژ(عوارض زمین)
                            </td>
                        </tr>

                        @if($gtitleservices != 0)

                            @foreach (array_combine($gtitleservices, $gcostservices) as $gtitleservice => $gcostservice)
                                <tr>
                                    <td>{{ $gcostservice }}</td>
                                    <td class="font-weight-bold" style="font-size: 12px;">{{ $gtitleservice }}</td>
                                </tr>
                            @endforeach

                            @foreach (array_combine($stitleservices, $scostservices) as $stitleservice => $scostservice)
                                <tr>
                                    <td>{{ $scostservice }}</td>
                                    <td class="font-weight-bold" style="font-size: 12px;">{{ $stitleservice }}</td>
                                </tr>
                            @endforeach

                        @elseif($gtitleservices == 0)

                            @foreach($generalservices as $generalservice)
                                <tr>
                                    <td>{{ $generalservice->cost }}</td>
                                    <td class="font-weight-bold" style="font-size: 12px;">{{ $generalservice->title }}</td>
                                </tr>
                            @endforeach

                            @foreach($specialisedservices as $specialisedservice)
                                <tr>
                                    <td>{{ $specialisedservice->cost }}</td>
                                    <td class="font-weight-bold" style="font-size: 12px;">{{ $specialisedservice->title }}</td>
                                </tr>
                            @endforeach

                        @endif

                        <tr>
                            <td>
                                {{ $debt->maliat  }}
                            </td>
                            <td class="font-weight-bold" style="font-size: 11px;">
                                مالیات بر ارزش افزوده
                            </td>
                        </tr>

                        <tr>
                            <td>
                                {{ $debt->lastdebt }}
                            </td>
                            <td class="font-weight-bold" style="font-size: 12px;">
                                بدهی قبلی
                            </td>
                        </tr>

                        <tr>
                            <td>
                                {{ $userfinhistory->usercredit }}
                            </td>
                            <td class="font-weight-bold" style="font-size: 12px;">
                                بستانکاری
                            </td>
                        </tr>


                        @if($debt->addedgeneralcost != 0)
                            <tr>
                                <td class="bg-primary">
                                    {{ $debt->addedgeneralcost }}
                                </td>
                                <td class="bg-success font-weight-bold" style="font-size: 12px;">
                                    هزینه هایی عمومی
                                </td>
                            </tr>
                        @endif


                        <tr>
                            <td class="bg-primary font-weight-bold" style="font-size: 16px;">
                                {{ round($debt->totalcost+$debt->lastdebt-$userfinhistory->usercredit+$userfinhistory->userdebt, -3) }}
                            </td>
                            <td class="bg-success font-weight-bold" style="direction: rtl; font-size: 12px;">
                                مبلغ قابل پرداخت
                            </td>
                        </tr>

                        <tr>
                            <td class="bg-primary font-weight-bold" style="font-size: 11px;">
                                {{ mablagh(round($debt->totalcost+$debt->lastdebt-$userfinhistory->usercredit+$userfinhistory->userdebt, -3)) }}
                            </td>
                            <td class="bg-success font-weight-bold" style="direction: rtl; font-size: 12px;">
                                مبلغ (به حروف)
                            </td>
                        </tr>

                        </tbody>

                    </table>

                </div>
            </div>

            <div class="col-8">

                <div class="table-responsive pt-4">

                    <div class="bg-white font-weight-bold d-flex" style="height: 90px; border: 1px solid gray; border-radius: 10px; margin-bottom: 10px; padding-top: 8px; padding-right: 5px; direction: rtl;">
                        <div class="col-1">
                            <img src="/img/shahraklogo.jpg" style="max-width: 74px;">
                        </div>


                        <div class="col-5 text-center mr-4" style="padding-top: 4px;">
                            <div class="font-weight-bold" style="font-size:14px">
                                شرکت خدماتی شهرک صنعتی شهرکرد
                            </div>
                            <div style="font-size:12px">
                                شماره حساب بانک صادرات: <br>0106619830001
                            </div>
                        </div>


                        <div class="col-4 text-center" style="padding-top: 4px; margin-right: -40px">
                            <div style="font-size:13px">
                                کد اقتصادی: 411448544477
                            </div>
                            <div style="font-size:13px">
                                شناسه ملی: 14003980869
                            </div>
                            <div style="font-size:13px">
                                شماره ثبت: 11296
                            </div>
                        </div>


                        <div class="col-2 bg-success text-center" style="border: 1px solid gray; border-radius: 10px; height: 50px; margin-top: 10px; padding-top: 10px; font-size: 13px;">
                            نسخه بانک
                        </div>
                    </div>

                    <table class="table table-striped table-bordered text-center table-sm">
                        <tbody>
                        <tr>
                            <td colspan="3">
                                {{ $debt->user->name }}
                            </td>
                            <th colspan="1" class="bg-primary">
                                مشترک گرامی
                            </th>
                        </tr>

                        <tr>
                            <td>
                                {{ $debt->billnumber }}
                            </td>
                            <th class="bg-primary">
                                شناسه قبض
                            </th>
                            <td>
                                {{ $debt->user->id }}
                            </td>
                            <th class="bg-primary">
                                شناسه شرکت
                            </th>
                        </tr>
                        <tr>
                            <td colspan="3">
                                {{ $debt->user->profile->address }}
                            </td>
                            <th colspan="1" class="bg-primary">
                                آدرس
                            </th>
                        </tr>

                        <tr>
                            <td>
                                {{ $debt->timefromyear. '/' . $debt->timefrommonth . '/' . $debt->timefromday }}
                            </td>
                            <th class="bg-primary">
                                از تاریخ
                            </th>
                            <td>
                                {{ $debt->lastcounternumber }}
                            </td>
                            <th class="bg-primary">
                                شماره کنتور قبلی
                            </th>
                        </tr>

                        <tr>
                            <td>
                                {{ $debt->timetoyear. '/' . $debt->timetomonth . '/' . $debt->timetoday }}
                            </td>
                            <th class="bg-primary">
                                تا تاریخ
                            </th>
                            <td>
                                {{ $debt->currentcounternumber }}
                            </td>
                            <th class="bg-primary">
                                شماره کنتور فعلی
                            </th>
                        </tr>

                        <tr>
                            <td>
                                {{ $debt->paymentdeadlineyear. '/' . $debt->paymentdeadlinemonth . '/' . $debt->paymentdeadlineday }}
                            </td>
                            <th class="bg-primary">
                                مهلت پرداخت
                            </th>
                            <td>
                                {{ $debt->periodconsumption }}
                            </td>
                            <th class="bg-primary">
                                مصرف دوره
                            </th>
                        </tr>
                        </tbody>
                    </table>

                    <div class="text-right bg-white" style="direction:rtl; height: 110px; border: 1px solid gray; border-radius: 10px; margin-top: 10px; margin-bottom: 10px; padding-right: 8px;">
                        توضیحات:
                        <div class="text-danger"> {{ $ekhtar }} </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
