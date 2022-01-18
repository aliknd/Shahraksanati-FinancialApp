@extends('layouts.app')

@section('content')
    <div class="container" style="direction: rtl; font-family: Yekan">

        @include('layouts.menu')

        <form action="/ss" method="post">
            @csrf
        <div class="row text-right">
            <div class="col-8 offset-2">

                <div class="row">
                    <h2>اضافه کردن خدمت ویژه نسبت به شناسه شرکت مورد نظر</h2>
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
                        <label for="title" class="col-md-4 col-form-label">عنوان خدمت ویژه</label>

                            <input id="title"
                                   type="text"
                                   class="form-control @error('title') is-invalid @enderror"
                                   name="title"
                                   value="{{ old('title') }}"
                                   required autocomplete="title" autofocus>

                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                    </div>

                <div class="form-group row">
                    <label for="cost" class="col-md-4 col-form-label">هزینه خدمت ویژه</label>

                    <input id="cost"
                           type="text"
                           class="form-control @error('cost') is-invalid @enderror"
                           name="cost"
                           value="{{ old('cost') }}"
                           required autocomplete="cost" autofocus>

                    @error('cost')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>


                <div class="row" style="direction: ltr">
                    <button type="submit" class="btn btn-primary">اضافه کردن خدمت ویژه</button>
                </div>

            </div>
        </div>

        </form>

    </div>
@endsection
