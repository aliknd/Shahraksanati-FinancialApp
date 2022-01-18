@extends('layouts.app')

@section('content')
    <div class="container" style="direction: rtl; font-family: Yekan">

        @include('layouts.menu')

        <form action="/d/cost/monthdebtsretrieveprocess" method="post">
            @csrf
        <div class="row text-right">
            <div class="col-8 offset-2">

                <div class="row">
                    <h3>فراخوانی بدهی ها بر اساس مبلغ</h3>
                </div>

                <div class="form-group row">
                    <label for="cost" class="col-md-4 col-form-label">مبلغ فیش دریافتی</label>

                    <input id="cost"
                           type="text"
                           class="form-control @error('cost') is-invalid @enderror"
                           name="cost"
                           value=""
                           required autocomplete="cost" autofocus>

                    @error('cost')
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
