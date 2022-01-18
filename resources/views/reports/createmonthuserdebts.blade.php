@extends('layouts.app')

@section('content')
    <div class="container" style="direction: rtl; font-family: Yekan">

        @include('layouts.menu')

        <form action="/dcompany/year/usermonthdebtspage" method="post">
            @csrf
        <div class="row text-right">
            <div class="col-8 offset-2">

                <div class="row pb-3">
                    <h1>دسته بندی بدهی های شرکت  بر اساس ماه</h1>
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
                    <label for="consumptiontype" class="col-md-4 col-form-label text-md-right">سال بدهی</label>

                    <div class="col-md-6">
                        <select class="form-control" name="debtsyear" id="debtsyear">
                            <option value="1398">1398</option>
                            <option value="1399">1399</option>
                            <option value="1400">1400</option>
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
