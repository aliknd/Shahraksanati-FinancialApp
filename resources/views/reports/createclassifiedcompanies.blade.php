@extends('layouts.app')

@section('content')
    <div class="container" style="direction: rtl; font-family: Yekan">

        @include('layouts.menu')

        <form action="/admin/reports/classifiedcompaniesmonthly" method="post">
            @csrf
        <div class="row text-right">
            <div class="col-8 offset-2">

                <div class="row pb-3">
                    <h1>دسته بندی شرکت ها بر اساس مصرف آب</h1>
                </div>

                <div class="form-group row">
                    <label for="consumptiontype" class="col-md-4 col-form-label text-md-right">نوع مصرف</label>

                    <div class="col-md-6">
                        <select class="form-control" name="consumptiontype" id="consumptiontype">
                            <option value="lower">مصارف بین 0 و 15</option>
                            <option value="low">مصارف بیشتر از 15 و کمتر از 30</option>
                            <option value="average">مصارف بیشتر از 30 و کمتر از 45</option>
                            <option value="high">مصارف بیشتر از 45</option>
                            <option value="higher">مصارف بیشتر از 1000</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="month" class="col-md-4 col-form-label text-md-right">ماه مورد نظر</label>

                    <div class="col-md-6">
                        <select class="form-control" name="cmonth" id="cmonth">
                            <option value="1">دوره اول: فروردین</option>
                            <option value="2">دوره دوم: اردیبهشت</option>
                            <option value="3">دوره سوم: خرداد</option>
                            <option value="4">دوره چهارم: تیر</option>
                            <option value="5">دوره پنجم: مرداد</option>
                            <option value="6">دوره ششم: شهریور</option>
                            <option value="7">دوره هفتم: مهر</option>
                            <option value="8">دوره هشتم: آبان</option>
                            <option value="9">دوره نهم: آذر</option>
                            <option value="10">دوره دهم: دی</option>
                            <option value="11">دوره یازدهم: بهمن</option>
                            <option value="12">دوره دوازدهم: اسفند</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="year" class="col-md-4 col-form-label text-md-right">سال مورد نظر</label>

                    <div class="col-md-6">
                        <select class="form-control" name="cyear" id="cyear">
                            <option value="1398">1398</option>
                            <option value="1399">1399</option>
                            <option value="1400">1400</option>
                            <option value="1401">1401</option>
                        </select>
                    </div>
                </div>

                <div class="row" style="direction: ltr">
                    <button type="submit" class="btn btn-primary">فراخوانی</button>
                </div>

            </div>
        </div>

        </form>

    </div>
@endsection
