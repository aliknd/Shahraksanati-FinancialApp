@extends('layouts.app')

@section('content')
    <div class="container" style="direction: rtl; font-family: Yekan">

        @include('layouts.menu')

        <form action="/gs/{{ $gservice->id }}" method="post">
            @csrf
            @method('PATCH')

            <div class="row">
                <div class="col-8 offset-2 text-right">

                    <div class="row">
                        <h1>ویرایش خدمت عمومی</h1>
                    </div>

                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label">عنوان</label>

                        <input id="title"
                               type="text"
                               class="form-control @error('title') is-invalid @enderror"
                               name="title"
                               value="{{ old('title') ?? $gservice->title }}"
                               required autocomplete="title" autofocus>

                        @error('title')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="cost" class="col-md-4 col-form-label">هزینه</label>

                        <input id="cost"
                               type="text"
                               class="form-control @error('cost') is-invalid @enderror"
                               name="cost"
                               value="{{ old('cost') ?? $gservice->cost }}"
                               required autocomplete="cost" autofocus>

                        @error('cost')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="row" style="direction: ltr">
                        <button type="submit" class="btn btn-primary">ذخیره</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
