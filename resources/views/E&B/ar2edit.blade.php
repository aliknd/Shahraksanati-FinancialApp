@extends('layouts.app')

@section('content')
    <div class="container" style="font-family: Yekan">

        @include('layouts.menu')

        <form action="/ar2/{{ $a2rate->id }}" method="post">
            @csrf
            @method('PATCH')

            <div class="row">
                <div class="col-8 offset-2">

                    <div class="text-right pb-3">
                        <h1>ویرایش مقادیر آب بها</h1>
                    </div>

                    <div class="form-group row">
                        <label for="capacity" class="col-md-4 col-form-label">مقدار آب بها</label>

                        <input id="capacity"
                               type="text"
                               class="form-control @error('capacity') is-invalid @enderror"
                               name="capacity"
                               value="{{ old('capacity') ?? $a2rate->capacity }}"
                               required autocomplete="capacity" autofocus>

                        @error('capacity')
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
                               value="{{ old('cost') ?? $a2rate->cost }}"
                               required autocomplete="cost" autofocus>

                        @error('cost')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="text-center pt-3">
                        <button type="submit" class="btn btn-primary">ذخیره مقدار آب بها</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
