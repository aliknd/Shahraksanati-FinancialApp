@extends('layouts.app')

@section('content')
    <div class="container" style="direction: rtl; font-family: Yekan">

        @include('layouts.menu')

        <form action="/admin/reports/createpaymentsmonthly" method="post">
            @csrf
        <div class="row text-right">
            <div class="col-8 offset-2">

                <div class="row pb-3">
                    <h1>نمودار مصرف آب در فاز های مختلف به صورت ماهانه</h1>
                </div>

                <div class="form-group row">
                    <label for="phase" class="col-md-4 col-form-label text-md-right">فاز مورد نظر</label>

                    <div class="col-md-6">
                        <select class="form-control" name="phase" id="phase">
                            <option value="فاز 1">فاز 1</option>
                            <option value="فاز 2">فاز 2</option>
                            <option value="فاز 3">فاز 3</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="year" class="col-md-4 col-form-label text-md-right">سال مورد نظر</label>

                    <div class="col-md-6">
                        <select class="form-control" name="year" id="year">
                            <option value="1398" selected>دوره اول: 1398</option>
                            <option value="1399">دوره دوم: 1399</option>
                        </select>
                    </div>
                </div>

                <div class="row" style="direction: ltr">
                    <button type="submit" class="btn btn-primary">فراخوانی نمودار</button>
                </div>

            </div>
        </div>

        </form>

    </div>
@endsection
