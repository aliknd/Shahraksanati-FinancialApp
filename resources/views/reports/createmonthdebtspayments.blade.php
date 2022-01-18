@extends('layouts.app')

@section('content')
    <div class="container" style="direction: rtl; font-family: Yekan">

        @include('layouts.menu')

        <form action="/dp/month/debtspaymentsretrieveprocess" method="post">
            @csrf
        <div class="row text-right">
            <div class="col-8 offset-2">

                <div class="row pb-3">
                    <h1>دسته بندی بدهی ها بر اساس ماه</h1>
                </div>

                <div class="form-group row">
                    <label for="consumptiontype" class="col-md-4 col-form-label text-md-right">سال بدهی</label>

                    <div class="col-md-6">
                        <select class="form-control" name="debtspaymentsyear" id="debtspaymentsyear">
                            <option value="1398">1398</option>
                            <option value="1399">1399</option>
                            <option value="1400">1400</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="debtspaymentsmonth" class="col-md-4 col-form-label text-md-right">ماه مورد نظر</label>

                    <div class="col-md-6">
                        <select class="form-control" name="debtspaymentsmonth" id="debtspaymentsmonth">
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

                <div class="row" style="direction: ltr">
                    <button type="submit" class="btn btn-primary">فراخوانی</button>
                </div>

            </div>
        </div>

        </form>

    </div>
@endsection
