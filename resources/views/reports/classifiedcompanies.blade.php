@extends('layouts.app')

@section('content')
    <div class="container text-center" style="direction: rtl; font-family: Yekan">

        @include('layouts.menu')

        <div class="table-responsive pt-4">
            <h3 align="center" class="pb-3"> آمار شرکت های {{ $companytype }}<span id="total_records"></span></h3>
            <table class="table table-striped table-bordered text-center">
                <thead class="thead-dark">
                <tr>
                    <th>شماره</th>
                    <th>نام شرکت</th>
                    <th>مصرف دوره</th>
                </tr>
                </thead>
                <tbody>
                @for ($i = 0; $i < count($classifiedcompanyusers); $i++)
                    <tr>
                        <td>{{ $classifiedcompanyusers[$i]->id }}</td>
                        <td>{{ $classifiedcompanyusers[$i]->name }}</td>
                        <td>{{ $classifiedcompanyperiodconsumptions[$i] }}</td>
                    </tr>
                @endfor
                <tr>
                    <td colspan="2">جمع مصرف ها</td>
                    <td>{{ $classifiedcompanyperiodconsumptionsSum }}</td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>

@endsection
