@extends('layouts.app')

@section('content')
    <div class="container" style="direction: rtl; font-family: Yekan">

        @include('layouts.menu')

        <form action="/d/company/debtformretrieveprocess" method="post">
            @csrf
        <div class="row text-right">
            <div class="col-8 offset-2">

                <div class="row pb-3">
                    <h1>فراخوانی فرم بدهی نسبت به شناسه شرکت مورد نظر</h1>
                </div>

                <div class="form-group row text-right">
                    <label for="user_id" class="col-md-4 col-form-label pb-2">شناسه شرکت مورد نظر</label>

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

                <div class="row" style="direction: ltr">
                    <button type="submit" class="btn btn-primary">فراخوانی فرم</button>
                </div>

            </div>
        </div>

        </form>

    </div>
@endsection
