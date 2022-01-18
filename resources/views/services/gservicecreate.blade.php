@extends('layouts.app')

@section('content')
    <div class="container" style="direction: rtl; font-family: Yekan">

        @include('layouts.menu')

        <div class="table-responsive pt-4">
            <h3 align="center" class="pb-2">خدمات عمومی ثبت شده <span id="total_records"></span></h3>
            <table class="table table-striped table-bordered text-center">
                <thead class="thead-dark">
                <tr>
                    <th>شناسه</th>
                    <th>عنوان</th>
                    <th>هزینه</th>
                    <th>ویرایش</th>
                    <th>حذف</th>
                </tr>
                </thead>
                <tbody>
                @foreach($gdata as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->title }}</td>
                        <td>{{ $data->cost }}</td>
                        <td><a href="/gs/{{ $data->id }}/edit">ویرایش</a> </td>
                        <td><a href="/gs/{{ $data->id }}/delete">حذف</a> </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <form action="/gs" method="post">
            @csrf
        <div class="row pt-4 text-right">
            <div class="col-8 offset-2">

                <div class="row">
                    <h1>اضافه کردن خدمات عمومی</h1>
                </div>

                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label">عنوان خدمت عمومی</label>

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
                    <label for="cost" class="col-md-4 col-form-label">هزینه خدمت عمومی</label>

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
                    <button type="submit" class="btn btn-primary">اضافه کردن</button>
                </div>

            </div>
        </div>

        </form>

    </div>
@endsection
