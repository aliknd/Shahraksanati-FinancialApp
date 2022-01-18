@extends('layouts.app')

@section('content')
<div class="container" style="direction: rtl; font-family: Yekan">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">ثبت نام</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">نام شرکت</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="metrazh" class="col-md-4 col-form-label text-md-right">متراژ</label>

                            <div class="col-md-6">
                                <input id="metrazh" type="text" class="form-control @error('metrazh') is-invalid @enderror" name="metrazh" value="{{ old('metrazh') }}" required autocomplete="metrazh" autofocus>

                                @error('metrazh')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pipediameter" class="col-md-4 col-form-label text-md-right">قطر انشعاب</label>

                            <div class="col-md-6">
                                <select class="form-control" name="pipediameter" id="pipediameter">
                                    <option value="1/2">1/2</option>
                                    <option value="3/4">3/4</option>
                                    <option value="1">1</option>
                                    <option value="3/2">3/2</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="phase" class="col-md-4 col-form-label text-md-right">فاز</label>

                            <div class="col-md-6">
                                <select class="form-control" name="phase" id="phase">
                                    <option value="فاز 1">فاز 1</option>
                                    <option value="فاز 2">فاز 2</option>
                                    <option value="فاز 3">فاز 3</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">آدرس ایمیل</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">رمز ورود</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">تایید رمز ورود</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sanitation" class="col-md-4 col-form-label text-md-right">انشعاب فاضلاب</label>

                            <div class="col-md-1">
                                <input id="sanitation" type="hidden" class="form-control" name="sanitation" value="false">
                                <input id="sanitation" type="checkbox" class="form-control" name="sanitation" value="true">
                            </div>
                        </div>

                        <div class="form-group row mb-0" style="direction: ltr">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ثبت نام') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
