@extends('layouts.app')

@section('content')
    <div class="container" style="direction: rtl; font-family: Yekan">

        @include('layouts.menu')

        <form action="/ddelay" method="post">
            @csrf
        <div class="row text-right">
            <div class="col-8 offset-2">

                <div class="row">
                    <h1>اضافه کردن بدهی</h1>
                </div>

                    <div class="form-group row">
                        <label for="user_id" class="col-md-4 col-form-label">شناسه شرکت</label>

                            <input id="user_id"
                                   type="text"
                                   class="form-control @error('user_id') is-invalid @enderror"
                                   name="user_id"
                                   value="{{ $debts->user_id }}"
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
                           value="{{ $billnumber = date('YmdHis') }}"
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
                           value="{{ $debts->currentcounternumber }}"
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

                <div class="form-group row d-flex">

                    <label for="timefromyear" class="col-md-2 col-form-label">از تاریخ</label>

                    <div>
                    <input id="timefromyear"
                           type="text"
                           class="form-control @error('timefromyear') is-invalid @enderror"
                           name="timefromyear"
                           value="{{ $debts->timetoyear }}"
                           required autocomplete="timefromyear" autofocus>

                    @error('timefromyear')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    </div>

                    <div>
                    <input id="timefrommonth"
                           type="text"
                           class="form-control @error('timefrommonth') is-invalid @enderror"
                           name="timefrommonth"
                           value="{{ $debts->timetomonth }}"
                           required autocomplete="timefrommonth" autofocus>

                    @error('timefrommonth')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    </div>

                    <div>
                    <input id="timefromday"
                           type="text"
                           class="form-control @error('timefromday') is-invalid @enderror"
                           name="timefromday"
                           value="{{ $debts->timetoday }}"
                           required autocomplete="timefromday" autofocus>

                    @error('timefromday')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    </div>

                </div>




                <div class="form-group row d-flex">

                    <label for="timetoyear" class="col-md-2 col-form-label">از تاریخ</label>

                    <div>
                        <input id="timetoyear"
                               type="text"
                               class="form-control @error('timetoyear') is-invalid @enderror"
                               name="timetoyear"
                               value="{{ $debts->timetoyear }}"
                               required autocomplete="timetoyear" autofocus>

                        @error('timetoyear')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div>
                        <input id="timetomonth"
                               type="text"
                               class="form-control @error('timetomonth') is-invalid @enderror"
                               name="timetomonth"
                               value="{{ $debts->timetomonth+1 }}"
                               required autocomplete="timetomonth" autofocus>

                        @error('timetomonth')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div>
                        <input id="timetoday"
                               type="text"
                               class="form-control @error('timetoday') is-invalid @enderror"
                               name="timetoday"
                               value="{{ $debts->timetoday }}"
                               required autocomplete="timetoday" autofocus>

                        @error('timetoday')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                </div>




                <div class="form-group row d-flex">

                    <label for="paymentdeadlineyear" class="col-md-2 col-form-label">از تاریخ</label>

                    <div>
                        <input id="paymentdeadlineyear"
                               type="text"
                               class="form-control @error('paymentdeadlineyear') is-invalid @enderror"
                               name="paymentdeadlineyear"
                               value="{{ $debts->timetoyear }}"
                               required autocomplete="paymentdeadlineyear" autofocus>

                        @error('paymentdeadlineyear')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div>
                        <input id="paymentdeadlinemonth"
                               type="text"
                               class="form-control @error('paymentdeadlinemonth') is-invalid @enderror"
                               name="paymentdeadlinemonth"
                               value="{{ $debts->timetomonth+1 }}"
                               required autocomplete="paymentdeadlinemonth" autofocus>

                        @error('paymentdeadlinemonth')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div>
                        <input id="paymentdeadlineday"
                               type="text"
                               class="form-control @error('paymentdeadlineday') is-invalid @enderror"
                               name="paymentdeadlineday"
                               value="{{ $debts->timetoday+7 }}"
                               required autocomplete="paymentdeadlineday" autofocus>

                        @error('paymentdeadlineday')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                </div>

                <input id="paymentstatus" type="hidden" class="form-control @error('paymentstatus') is-invalid @enderror" name="paymentstatus" value="false">

                <div class="row" style="direction: ltr">
                    <button type="submit" class="btn btn-primary">ثبت</button>
                </div>


            </div>
        </div>

        </form>

    </div>
@endsection
