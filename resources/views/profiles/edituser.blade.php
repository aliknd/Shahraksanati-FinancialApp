@extends('layouts.app')

@section('content')
    <div class="container text-right" style="direction: rtl; font-family: Yekan">
        <form action="/userfeatures/{{ $userf->id }}" method="post">
            @csrf
            @method('PATCH')

            <div class="row">
                <div class="col-8 offset-2">

                    <div>
                        <h1>ویرایش کاربر</h1>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label">نام شرکت</label>

                        <input id="name"
                               type="text"
                               class="form-control @error('name') is-invalid @enderror"
                               name="name"
                               value="{{ old('name') ?? $userf->name }}"
                               required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="metrazh" class="col-md-4 col-form-label">متراژ</label>

                        <input id="metrazh"
                               type="text"
                               class="form-control @error('metrazh') is-invalid @enderror"
                               name="metrazh"
                               value="{{ old('metrazh') ?? $userf->metrazh }}"
                               required autocomplete="metrazh" autofocus>

                        @error('metrazh')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="pipediameter" class="col-md-4 col-form-label">قطر لوله</label>

                        <input id="pipediameter"
                               type="text"
                               class="form-control @error('pipediameter') is-invalid @enderror"
                               name="pipediameter"
                               value="{{ old('pipediameter') ?? $userf->pipediameter }}"
                               required autocomplete="pipediameter" autofocus>

                        @error('pipediameter')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="phase" class="col-md-4 col-form-label">فاز</label>

                        <input id="phase"
                               type="text"
                               class="form-control @error('phase') is-invalid @enderror"
                               name="phase"
                               value="{{ old('phase') ?? $userf->phase }}"
                               required autocomplete="phase" autofocus>

                        @error('phase')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="sanitation" class="col-md-4 col-form-label">انشعاب فاضلاب</label>

                        <input id="sanitation"
                               type="text"
                               class="form-control @error('sanitation') is-invalid @enderror"
                               name="sanitation"
                               value="{{ old('sanitation') ?? $userf->sanitation }}"
                               required autocomplete="sanitation" autofocus>

                        @error('sanitation')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="addedabbaha" class="col-md-4 col-form-label">مبلغ آب بهای اضافه</label>

                        <input id="addedabbaha"
                               type="text"
                               class="form-control @error('addedabbaha') is-invalid @enderror"
                               name="addedabbaha"
                               value="{{ old('addedabbaha') ?? $userf->addedabbaha }}"
                               required autocomplete="addedabbaha" autofocus>

                        @error('addedabbaha')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="sanitationfraction" class="col-md-4 col-form-label">ضریب فاضلاب</label>

                        <input id="sanitationfraction"
                               type="text"
                               class="form-control @error('sanitationfraction') is-invalid @enderror"
                               name="sanitationfraction"
                               value="{{ old('sanitationfraction') ?? $userf->sanitationfraction }}"
                               required autocomplete="sanitationfraction" autofocus>

                        @error('sanitationfraction')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="servicescostfraction" class="col-md-4 col-form-label">ضریب حق شارژ(عوارض سالیانه)</label>

                        <input id="servicescostfraction"
                               type="text"
                               class="form-control @error('servicescostfraction') is-invalid @enderror"
                               name="servicescostfraction"
                               value="{{ old('servicescostfraction') ?? $userf->servicescostfraction }}"
                               required autocomplete="servicescostfraction" autofocus>

                        @error('servicescostfraction')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="userdebt" class="col-md-4 col-form-label">بدهی حسابی کاربر</label>

                        <input id="userdebt"
                               type="text"
                               class="form-control @error('userdebt') is-invalid @enderror"
                               name="userdebt"
                               value="{{ old('userdebt') ?? $userf->userdebt }}"
                               required autocomplete="userdebt" autofocus>

                        @error('userdebt')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="usercredit" class="col-md-4 col-form-label">بستانکاری حسابی کاربر</label>

                        <input id="usercredit"
                               type="text"
                               class="form-control @error('usercredit') is-invalid @enderror"
                               name="usercredit"
                               value="{{ old('usercredit') ?? $userf->usercredit }}"
                               required autocomplete="usercredit" autofocus>

                        @error('usercredit')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="sharednumber" class="col-md-4 col-form-label">شماره اشتراک کاربر</label>

                        <input id="sharednumber"
                               type="text"
                               class="form-control @error('sharednumber') is-invalid @enderror"
                               name="sharednumber"
                               value="{{ old('sharednumber') ?? $userf->sharednumber }}"
                               required autocomplete="sharednumber" autofocus>

                        @error('sharednumber')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="telephone" class="col-md-4 col-form-label">شماره تلفن شرکت</label>

                        <input id="telephone"
                               type="text"
                               class="form-control @error('telephone') is-invalid @enderror"
                               name="telephone"
                               value="{{ old('telephone') ?? $userf->telephone }}"
                               required autocomplete="telephone" autofocus>

                        @error('telephone')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="businessid" class="col-md-4 col-form-label">شناسه اقتصادی</label>

                        <input id="businessid"
                               type="text"
                               class="form-control @error('businessid') is-invalid @enderror"
                               name="businessid"
                               value="{{ old('businessid') ?? $userf->businessid }}"
                               autocomplete="businessid" autofocus>

                        @error('businessid')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="nationalid" class="col-md-4 col-form-label">شناسه ملی</label>

                        <input id="nationalid"
                               type="text"
                               class="form-control @error('nationalid') is-invalid @enderror"
                               name="nationalid"
                               value="{{ old('nationalid') ?? $userf->nationalid }}"
                               autocomplete="nationalid" autofocus>

                        @error('nationalid')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>


                    <div class="form-group row">
                        <label for="companytype" class="col-md-4 col-form-label">نوع شرکت</label>

                        <input id="companytype"
                               type="text"
                               class="form-control @error('companytype') is-invalid @enderror"
                               name="companytype"
                               value="{{ old('companytype') ?? $userf->companytype }}"
                               autocomplete="companytype" autofocus>

                        @error('companytype')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>



                    <div class="row pt-3" style="direction: ltr">
                        <button type="submit" class="btn btn-primary">ذخیره کاربر</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
