@extends('layouts.app')

@section('content')
    <div class="container" style="direction: rtl; font-family: Yekan">

        @include('layouts.menu')

        <div class="table-responsive pt-4">
            <h4 align="center" class="pb-2">خدمات ویژه ثبت شده برای شرکت مورد نظر<span id="total_records"></span></h4>
            <table class="table table-striped table-bordered text-center">
                <thead class="thead-dark">
                <tr>
                    <th>شماره</th>
                    <th>عنوان</th>
                    <th>هزینه</th>
                    <th>ویرایش</th>
                    <th>حذف</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sservices as $sservice)
                    <tr>
                        <td>{{ $sservice->id }}</td>
                        <td>{{ $sservice->title }}</td>
                        <td>{{ $sservice->cost }}</td>
                        <td><a href="/ss/{{ $sservice->id }}/edit">ویرایش</a> </td>
                        <td><a href="/ss/{{ $sservice->id }}/delete">حذف</a> </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
