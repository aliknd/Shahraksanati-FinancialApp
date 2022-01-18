@extends('layouts.app')

@section('content')
    <div class="container" style="direction: rtl; font-family: Yekan">

        @include('layouts.menu')

        <form action="/p" method="post">
            @csrf
        <div class="row text-right">
            <div class="col-8 offset-2">

                <div class="row">
                    <h1>اضافه کردن پرداخت</h1>
                </div>

                <div class="row text-success bg-success justify-content-center pt-2" style="direction:rtl; height: 50px; border: 1px solid gray; border-radius: 10px;">
                    <div class="text-white">
                         مبلغ قابل پرداخت:
                    </div>
                    <div class="text-white">
                        {{ round($payment->totalcost + $lastdebtshowcost, -3) }}
                    </div>
                </div>

                    <div class="form-group row">
                        <label for="user_id" class="col-md-4 col-form-label">شناسه شرکت مورد نظر</label>

                            <input id="user_id"
                                   type="text"
                                   class="form-control @error('user_id') is-invalid @enderror"
                                   name="user_id"
                                   value="{{ $payment->user_id }}"
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
                           value="{{ $payment->billnumber }}"
                           required autocomplete="billnumber" autofocus>

                    @error('billnumber')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="totalcost" class="col-md-4 col-form-label">مبلغ پرداختی توسط مشتری</label>

                    <input id="totalcost"
                           type="text"
                           class="form-control @error('totalcost') is-invalid @enderror"
                           name="totalcost"
                           value="{{ round($payment->totalcost + $lastdebtshowcost, -3) }}"
                           required autocomplete="totalcost" autofocus>

                    @error('totalcost')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="discount" class="col-md-4 col-form-label">مبلغ تخفیف</label>

                    <input id="discount"
                           type="text"
                           class="form-control @error('discount') is-invalid @enderror"
                           name="discount"
                           value=""
                           required autocomplete="discount" autofocus>

                    @error('discount')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="descriptiondis" class="col-md-4 col-form-label">توضیحات</label>

                    <input id="descriptiondis"
                           type="text"
                           class="form-control @error('descriptiondis') is-invalid @enderror"
                           name="descriptiondis"
                           value=""
                           required autocomplete="descriptiondis" autofocus>

                    @error('descriptiondis')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <input id="maintotalcost"
                       type="hidden"
                       class="form-control @error('maintotalcost') is-invalid @enderror"
                       name="maintotalcost"
                       value="{{ round($payment->totalcost + $lastdebtshowcost, -3) }}"
                       required autocomplete="maintotalcost" autofocus>

                <div class="form-group row">
                    <label for="ordercode" class="col-md-4 col-form-label">شماره پیگیری پرداخت</label>

                    <input id="ordercode"
                           type="text"
                           class="form-control @error('ordercode') is-invalid @enderror"
                           name="ordercode"
                           value="{{ old('ordercode') }}"
                           required autocomplete="ordercode" autofocus>

                    @error('ordercode')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group row d-flex">
                    <label for="timefromyear" class="col-md-2 col-form-label">تاریخ پرداخت</label>

                    <div class="col-md-2">
                        <select class="form-control" name="paymentyear" id="paymentyear">
                            <option value="1397">1397</option>
                            <option value="1398" selected>1398</option>
                            <option value="1399">1399</option>
                            <option value="1400">1400</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <select class="form-control" name="paymentmonth" id="paymentmonth">
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <select class="form-control" name="paymentday" id="paymentday">
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
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
                            <option value="31">31</option>
                        </select>
                    </div>
                </div>

                <input id="debtyear"
                       type="hidden"
                       class="form-control @error('debtyear') is-invalid @enderror"
                       name="debtyear"
                       value="{{ $payment->timetoyear }}"
                       required autocomplete="debtyear" autofocus>

                <input id="debtmonth"
                       type="hidden"
                       class="form-control @error('debtmonth') is-invalid @enderror"
                       name="debtmonth"
                       value="{{ $payment->timetomonth }}"
                       required autocomplete="debtmonth" autofocus>

                <input id="debtday"
                       type="hidden"
                       class="form-control @error('debtday') is-invalid @enderror"
                       name="debtday"
                       value="{{ $payment->timetoday }}"
                       required autocomplete="debtday" autofocus>

                <div class="row" style="direction: ltr">
                    <button type="submit" class="btn btn-primary">ثبت</button>
                </div>


            </div>
        </div>

        </form>

    </div>
@endsection
