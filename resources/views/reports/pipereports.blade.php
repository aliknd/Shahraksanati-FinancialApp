@extends('layouts.app')

@section('content')
    <div class="container text-center" style="direction: rtl; font-family: Yekan">

        @include('layouts.menu')

        <div class="table-responsive pt-4">
            <h3 align="center" class="pb-3">آمار انشعاب ها<span id="total_records"></span></h3>
            <table class="table table-striped table-bordered text-center">
                <thead class="thead-dark">
                <tr>
                    <th>انشعاب 1/2</th>
                    <th>انشعاب 3/4</th>
                    <th>انشعاب 1</th>
                    <th>انشعاب 3/2</th>
                    <th>انشعاب 2</th>
                    <th>انشعاب 3</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $pipeyekdovomcount }}</td>
                        <td>{{ $pipesechaharomcount }}</td>
                        <td>{{ $pipeyekcount }}</td>
                        <td>{{ $pipesedovomcount }}</td>
                        <td>{{ $pipedocount }}</td>
                        <td>{{ $pipesecount }}</td>
                    </tr>
                </tbody>

            </table>
        </div>

        <div class="row justify-content-center">
            <div class="col-8">
                {!! $chart->container() !!}
            </div>
        </div>

    </div>
    
    {!! $chart->script() !!}
@endsection
