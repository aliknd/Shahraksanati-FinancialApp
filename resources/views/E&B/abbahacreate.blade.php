@extends('layouts.app')

@section('content')
    <div class="container" style="direction: rtl; font-family: Yekan">

        @include('layouts.menu')

        <div class="table-responsive pt-4">
            <h3 align="center" class="pb-3">مقادیر آب بهای ثبت شده<span id="total_records"></span></h3>
            <table class="table table-striped table-bordered text-center">
                <thead class="thead-dark">
                <tr>
                    <th>شناسه</th>
                    <th>عنوان</th>
                    <th>هزینه</th>
                    <th>ویرایش</th>
                </tr>
                </thead>
                <tbody>
                @foreach($adata as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->capacity }}</td>
                        <td style="direction: rtl">{{ $data->cost }}&nbsp ریال</td>
                        <td><a href="/ar/{{ $data->id }}/edit">ویرایش</a> </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
