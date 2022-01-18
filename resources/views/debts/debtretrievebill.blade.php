@extends('layouts.app')

@section('content')
    <div class="container" style="direction: rtl; font-family: Yekan">

        @include('layouts.menu')

        <form action="/d/company/debtsretrieveprocess" method="post">
            @csrf
        <div class="row text-right">
            <div class="col-8 offset-2">

                <div class="row">
                    <h3>فراخوانی و تغییر وضعیت بدهی ها بر اساس شناسه شرکت مورد نظر</h3>
                </div>

                <div class="form-group row">
                    <label for="user_id" class="col-md-4 col-form-label">شناسه شرکت مورد نظر</label>

                    <input id="user_id"
                           type="text"
                           class="form-control @error('user_id') is-invalid @enderror"
                           name="user_id"
                           value="{{ $newfetch }}"
                           required autocomplete="user_id" autofocus>

                    @error('user_id')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
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

        <a href="/newdebt/{{$newfetch}}"><button class="btn btn-primary">صدور قبض جدید</button></a>

    </div>
@endsection
