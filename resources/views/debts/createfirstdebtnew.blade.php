@extends('layouts.app')

@section('content')
    <div class="container" style="direction: rtl; font-family: Yekan">

        @include('layouts.menu')

        <form action="/debt/firstdebtprocess" method="post">
            @csrf
        <div class="row text-right">
            <div class="col-8 offset-2">

                <div class="row">
                    <h1>اضافه کردن آخرین بدهی سیستم قبلی</h1>
                </div>

                    <div class="form-group row">
                        <label for="user_id" class="col-md-4 col-form-label">شناسه شرکت</label>

                            <input id="user_id"
                                   type="text"
                                   class="form-control @error('user_id') is-invalid @enderror"
                                   name="user_id"
                                   value="{{ $newdebt }}"
                                   required autocomplete="user_id" autofocus>

                            @error('user_id')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                    </div>

                <div class="form-group row">
                    <label for="billnumber" class="col-md-4 col-form-label">شناسه قبض</label>

                    <input id="billnumber"
                           type="text"
                           class="form-control @error('billnumber') is-invalid @enderror"
                           name="billnumber"
                           value="{{ old('billnumber') }}"
                           required autocomplete="billnumber" autofocus>

                    @error('billnumber')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>


                <div class="form-group row">
                    <label for="lastcounternumber" class="col-md-4 col-form-label">شماره کنتور قبلی</label>

                    <input id="lastcounternumber"
                           type="text"
                           class="form-control @error('lastcounternumber') is-invalid @enderror"
                           name="lastcounternumber"
                           value="{{ old('lastcounternumber') }}"
                           required autocomplete="lastcounternumber" autofocus>

                    @error('lastcounternumber')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="currentcounternumber" class="col-md-4 col-form-label">شماره کنتور فعلی</label>

                    <input id="currentcounternumber"
                           type="text"
                           class="form-control @error('currentcounternumber') is-invalid @enderror"
                           name="currentcounternumber"
                           value="{{ old('currentcounternumber') }}"
                           required autocomplete="currentcounternumber" autofocus>

                    @error('currentcounternumber')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="lastdebt" class="col-md-4 col-form-label">بدهی قبلی</label>

                    <input id="lastdebt"
                           type="text"
                           class="form-control @error('lastdebt') is-invalid @enderror"
                           name="lastdebt"
                           value="{{ old('lastdebt') }}"
                           required autocomplete="lastdebt" autofocus>

                    @error('lastdebt')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="haghonezareh" class="col-md-4 col-form-label">مبلغ حق النظاره</label>

                    <input id="haghonezareh"
                           type="text"
                           class="form-control @error('haghonezareh') is-invalid @enderror"
                           name="haghonezareh"
                           value="{{ old('haghonezareh') }}"
                           required autocomplete="haghonezareh" autofocus>

                    @error('haghonezareh')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="kasrazhezar" class="col-md-4 col-form-label">کسر از هزار</label>

                    <input id="kasrazhezar"
                           type="text"
                           class="form-control @error('kasrazhezar') is-invalid @enderror"
                           name="kasrazhezar"
                           value="{{ old('kasrazhezar') }}"
                           required autocomplete="kasrazhezar" autofocus>

                    @error('kasrazhezar')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group row d-flex">
                    <label for="timefromyear" class="col-md-2 col-form-label">از تاریخ</label>

                    <div class="col-md-2">
                        <select class="form-control" name="timefromyear" id="timefromyear">
                            <option value="1394">1394</option>
                            <option value="1395">1395</option>
                            <option value="1396">1396</option>
                            <option value="1397">1397</option>
                            <option value="1398">1398</option>
                            <option value="1399" selected>1399</option>
                            <option value="1400">1400</option>
                            <option value="1401">1401</option>
                            <option value="1402">1402</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <select class="form-control" name="timefrommonth" id="timefrommonth">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3" selected>3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <select class="form-control" name="timefromday" id="timefromday">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22" selected>22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row d-flex">
                    <label for="timefrom" class="col-md-2 col-form-label">تا تاریخ</label>

                    <div class="col-md-2">
                        <select class="form-control" name="timetoyear" id="timetoyear">
                            <option value="1394">1394</option>
                            <option value="1395">1395</option>
                            <option value="1396">1396</option>
                            <option value="1397">1397</option>
                            <option value="1398">1398</option>
                            <option value="1399" selected>1399</option>
                            <option value="1400">1400</option>
                            <option value="1401">1401</option>
                            <option value="1402">1402</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <select class="form-control" name="timetomonth" id="timetomonth">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4" selected>4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <select class="form-control" name="timetoday" id="timetoday">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22" selected>22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row d-flex">
                    <label for="timefrom" class="col-md-2 col-form-label">مهلت پرداخت</label>

                    <div class="col-md-2">
                        <select class="form-control" name="paymentdeadlineyear" id="paymentdeadlineyear">
                            <option value="1394">1394</option>
                            <option value="1395">1395</option>
                            <option value="1396">1396</option>
                            <option value="1397">1397</option>
                            <option value="1398" selected>1398</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <select class="form-control" name="paymentdeadlinemonth" id="paymentdeadlinemonth">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4" selected>4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <select class="form-control" name="paymentdeadlineday" id="paymentdeadlineday">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31" selected>31</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-md-1">
                        <input id="paymentstatus" type="hidden" class="form-control" name="paymentstatus" value="false">
                        <input id="paymentstatus" type="checkbox" class="form-control" name="paymentstatus" value="true">
                    </div>

                    <label for="paymentstatus" class="col-md-4 col-form-label text-md-right">پرداخت شده</label>
                </div>

                <div class="row" style="direction: ltr">
                    <button type="submit" class="btn btn-primary">ثبت</button>
                </div>


            </div>
        </div>

        </form>

    </div>
@endsection
