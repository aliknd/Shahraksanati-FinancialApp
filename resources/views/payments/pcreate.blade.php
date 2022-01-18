@extends('layouts.app')

@section('content')
    <div class="container" style="direction: rtl; font-family: Yekan">

        @include('layouts.menu')

        <form action="/p/create/retrieve" method="post">
            @csrf
        <div class="row text-right">
            <div class="col-8 offset-2">

                <div class="row">
                    <h2>اضافه کردن پرداخت ها بر اساس شناسه شرکت مورد نظر</h2>
                </div>

                    <div class="form-group row">
                        <label for="user_id" class="col-md-4 col-form-label">شناسه شرکت مورد نظر</label>

                            <input id="user_id"
                                   type="text"
                                   class="form-control @error('user_id') is-invalid @enderror"
                                   name="user_id"
                                   value="{{ old('user_id') }}"
                                   required autocomplete="user_id" autofocus>

                            @error('user_id')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                    </div>

                <div class="form-group row">
                    <label for="billnumber" class="col-md-4 col-form-label">شناسه قبض</label>

                    <input id="billnumber"
                           type="text"
                           class="form-control @error('billnumber') is-invalid @enderror"
                           name="billnumber"
                           value="{{ old('ordercode') }}"
                           required autocomplete="billnumber" autofocus>

                    @error('billnumber')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="row" style="direction: ltr">
                    <button type="submit" class="btn btn-primary">فراخوانی فرم پرداخت</button>
                </div>


            </div>
        </div>

        </form>

    </div>
@endsection
