@extends('layouts.app')

@section('content')
    <div class="container" style="font-family: Yekan">

        @include('layouts.menu')

        <form action="/er/{{ $erate->id }}" method="post">
            @csrf
            @method('PATCH')

            <div class="row">
                <div class="col-8 offset-2">

                    <div class=" text-right pb-3">
                        <h1>ویرایش مقادیر انشعاب</h1>
                    </div>

                    <div class="form-group row">
                        <label for="enshab" class="col-md-4 col-form-label">مقدار انشعاب</label>

                        <input id="enshab"
                               type="text"
                               class="form-control @error('enshab') is-invalid @enderror"
                               name="enshab"
                               value="{{ old('enshab') ?? $erate->enshab }}"
                               required autocomplete="enshab" autofocus>

                        @error('enshab')
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
                               value="{{ old('cost') ?? $erate->cost }}"
                               required autocomplete="cost" autofocus>

                        @error('cost')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="text-center pt-3">
                        <button type="submit" class="btn btn-primary">ثبت مقدار انشعاب</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
