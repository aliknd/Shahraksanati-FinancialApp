@extends('layouts.app')

@section('content')
    <div class="container" style="direction: rtl; font-family: Yekan">

        @include('layouts.menu')

        <form action="/p/company/paymentsretrieveprocess" method="post">
            @csrf
        <div class="row text-right">
            <div class="col-8 offset-2">

                <div class="row">
                    <h3>فراخوانی پرداخت ها بر اساس شناسه شرکت مورد نظر</h3>
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
                    <label for="year" class="col-md-4 col-form-label text-md-right">سال مورد نظر</label>

                    <div class="col-md-6">
                        <select class="form-control" name="pyear" id="pyear">
                            <option value="1398">1398</option>
                            <option value="1399">1399</option>
                            <option value="1400">1400</option>
                            <option value="1401">1401</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <button type="submit" class="btn btn-primary">فراخوانی پرداخت ها</button>
                </div>

            </div>
        </div>

        </form>

    </div>
@endsection
