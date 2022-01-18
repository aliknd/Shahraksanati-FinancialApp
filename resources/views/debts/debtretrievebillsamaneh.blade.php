@extends('layouts.app')

@section('content')
    <div class="container" style="direction: rtl; font-family: Yekan">

        @include('layouts.menu')

        <form action="/d/company/debtsretrieveprocesssamaneh" method="post">
            @csrf
        <div class="row text-right">
            <div class="col-8 offset-2">

                <div class="row">
                    <h3>فراخوانی و تغییر وضعیت بدهی ها برا اساس شناسه شرکت مورد نظر</h3>
                </div>

                <div class="form-group row">
                    <label for="user_id" class="col-md-4 col-form-label">شناسه شرکت مورد نظر</label>

                    <input id="user_id"
                           type="text"
                           class="form-control @error('user_id') is-invalid @enderror"
                           name="user_id"
                           value=""
                           required autocomplete="user_id" autofocus>

                    @error('user_id')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="row" style="direction: ltr">
                    <button type="submit" class="btn btn-primary">فراخوانی بدهی ها</button>
                </div>

            </div>
        </div>

        </form>

    </div>
@endsection
