@extends('layouts.app')

@section('content')
    <div class="container text-right" style="direction: rtl; font-family: Yekan">
        <form action="/profile/{{ $user->id }}" method="post">
            @csrf
            @method('PATCH')

            <div class="row">
                <div class="col-8 offset-2">

                    <div>
                        <h1>ویرایش پروفایل</h1>
                    </div>

                    <div class="form-group row">
                        <label for="management" class="col-md-4 col-form-label">مدیریت</label>

                        <input id="management"
                               type="text"
                               class="form-control @error('management') is-invalid @enderror"
                               name="management"
                               value="{{ old('management') ?? $user->profile->management }}"
                               required autocomplete="management" autofocus>

                        @error('management')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="telephone" class="col-md-4 col-form-label">شماره تلفن</label>

                        <input id="telephone"
                               type="text"
                               class="form-control @error('telephone') is-invalid @enderror"
                               name="telephone"
                               value="{{ old('telephone') ?? $user->profile->telephone }}"
                               required autocomplete="telephone" autofocus>

                        @error('telephone')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="products" class="col-md-4 col-form-label">محصولات</label>

                        <input id="products"
                               type="text"
                               class="form-control @error('products') is-invalid @enderror"
                               name="products"
                               value="{{ old('products') ?? $user->profile->products }}"
                               required autocomplete="products" autofocus>

                        @error('products')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="address" class="col-md-4 col-form-label">آدرس</label>

                        <input id="address"
                               type="text"
                               class="form-control @error('address') is-invalid @enderror"
                               name="address"
                               value="{{ old('address') ?? $user->profile->address }}"
                               required autocomplete="address" autofocus>

                        @error('address')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="row pt-3" style="direction: ltr">
                        <button type="submit" class="btn btn-primary">ذخیره پروفایل</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
