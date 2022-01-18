@extends('layouts.app')

@section('content')
    <div class="container" style="direction: rtl; font-family: Yekan">

        @include('layouts.menu')

        <form action="/d/company/phasebillsretrieveprocess" method="post">
            @csrf
        <div class="row text-right">
            <div class="col-8 offset-2">

                <div class="row">
                    <h3>فراخوانی دسته جمعی قبوض بر اساس فاز</h3>
                </div>

                <div class="form-group row">
                    <select class="form-control" name="companyphase" id="companyphase">
                        <option value="فاز 1">فاز 1</option>
                        <option value="فاز 2">فاز 2</option>
                        <option value="فاز 3">فاز 3</option>
                    </select>
                </div>

                <div class="form-group row">
                    <select class="form-control" name="timetomonth" id="timetomonth">
                        <option value="1">فروردین</option>
                        <option value="2">اردیبهشت</option>
                        <option value="3">خرداد</option>
                        <option value="4">تیر</option>
                        <option value="5">مرداد</option>
                        <option value="6">شهریور</option>
                        <option value="7">مهر</option>
                        <option value="8">آبان</option>
                        <option value="9">آذر</option>
                        <option value="10">دی</option>
                        <option value="11">بهمن</option>
                        <option value="12">اسفند</option>
                    </select>
                </div>

                <div class="form-group row">
                    <select class="form-control" name="timetoyear" id="timetoyear">
                        <option value="1394">1394</option>
                        <option value="1395">1395</option>
                        <option value="1396">1396</option>
                        <option value="1397">1397</option>
                        <option value="1398">1398</option>
                        <option value="1399" selected>1399</option>
                        <option value="1400">1400</option>
                        <option value="1401">1401</option>
                        <option value="1402">1402</option>
                    </select>
                </div>

                <div class="row" style="direction: ltr">
                    <button type="submit" class="btn btn-primary">فراخوانی بدهی ها</button>
                </div>

            </div>
        </div>

        </form>

    </div>
@endsection
