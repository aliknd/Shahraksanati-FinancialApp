<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/home', function () {
    return view('home');
});

Auth::routes();

Route::post('/d', 'DebtsController@store')->middleware('admin');

Route::post('/debt/firstdebtprocess', 'DebtsController@firstdebtstore')->middleware('admin');
Route::get('/debt/firstdebt', 'DebtsController@firstdebtform')->middleware('admin');

Route::get('/d/{debt}', 'DebtsController@show');
Route::get('/dsamaneh/{debt}', 'DebtsController@showsamaneh');

Route::get('/gs/create', 'GeneralServicesController@create')->middleware('admin');
Route::post('/gs', 'GeneralServicesController@store')->middleware('admin');

Route::get('/ss/create', 'SpecialisedServicesController@create')->middleware('admin');
Route::post('/ss', 'SpecialisedServicesController@store')->middleware('admin');



Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');

Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');

Route::get('/gs/{gservice}/edit', 'GeneralServicesController@edit')->name('gs.edit')->middleware('admin');
Route::patch('/gs/{gservice}', 'GeneralServicesController@update')->name('gs.update')->middleware('admin');

Route::get('/ss/retrieve', 'SpecialisedServicesController@retrieve')->middleware('admin');
Route::post('/ss/retrieveprocess', 'SpecialisedServicesController@retrieveprocess')->middleware('admin');

Route::get('/ss/{sservice}/edit', 'SpecialisedServicesController@edit')->name('ss.edit')->middleware('admin');
Route::patch('/ss/{sservice}', 'SpecialisedServicesController@update')->name('ss.update')->middleware('admin');

Route::get('/gs/{gservice}/delete', 'GeneralServicesController@delete')->name('gs.delete')->middleware('admin');
Route::get('/ss/{sservice}/delete', 'SpecialisedServicesController@delete')->name('ss.delete')->middleware('admin');

Route::get('/d/company/retrieve', 'DebtsController@retrieve')->middleware('admin');
Route::post('/d/company/debtsretrieveprocess', 'DebtsController@retrieveprocess')->middleware('admin');
Route::post('/d/company/debtsretrieveprocesssamaneh', 'DebtsController@retrieveprocesssamaneh')->middleware('admin');

Route::post('/d/company/phasebillsretrieveprocess', 'DebtsController@phasebillsretrieveprocess')->middleware('admin');

Route::get('/d/company/debtformretrieve', 'DebtsController@debtformretrieve')->middleware('admin');
Route::post('/d/company/debtformretrieveprocess', 'DebtsController@debtformretrieveprocess')->middleware('admin');

Route::get('/d/company/change/{userid}/{debtid}', 'DebtsController@changepaymentstatus')->middleware('admin');
Route::get('/d/company/delete/{userid}/{debtid}', 'DebtsController@deletedebt')->middleware('admin');

Route::get('/p/create', 'PaymentsController@create')->middleware('admin');
Route::get('/p/createtable/{userid}', 'PaymentsController@createtable')->middleware('admin');
Route::post('/p/create/retrieve', 'PaymentsController@fetch')->middleware('admin');
Route::post('/p', 'PaymentsController@store')->middleware('admin');

Route::get('/p/company/retrieve', 'PaymentsController@retrieve')->middleware('admin');
Route::post('/p/company/paymentsretrieveprocess', 'PaymentsController@retrieveprocess')->middleware('admin');

Route::get('/er/create', 'EnshabratesController@create')->middleware('admin');
Route::get('/er/{erate}/edit', 'EnshabratesController@edit')->name('er.edit')->middleware('admin');
Route::patch('/er/{erate}', 'EnshabratesController@update')->name('er.update')->middleware('admin');

Route::get('/ar/create', 'AbbaharatesController@create')->middleware('admin');
Route::get('/ar/{arate}/edit', 'AbbaharatesController@edit')->name('ar.edit')->middleware('admin');
Route::patch('/ar/{arate}', 'AbbaharatesController@update')->name('ar.update')->middleware('admin');

Route::get('/ar2/create', 'AbbaharatesController@ar2create')->middleware('admin');
Route::get('/ar2/{a2rate}/edit', 'AbbaharatesController@ar2edit')->name('ar2.edit')->middleware('admin');
Route::patch('/ar2/{a2rate}', 'AbbaharatesController@ar2update')->name('ar2.update')->middleware('admin');


Route::get('/live_search', 'LiveSearch@index')->middleware('admin');

Route::get('/admin/phase1', 'LiveSearch@indexphase1')->middleware('admin');
Route::get('/admin/phase2', 'LiveSearch@indexphase2')->middleware('admin');
Route::get('/admin/phase3', 'LiveSearch@indexphase3')->middleware('admin');

Route::get('/live_search/action', 'LiveSearch@action')->name('live_search.action')->middleware('admin');

Route::get('/live_search/action1', 'LiveSearch@action1')->name('live_search.action1')->middleware('admin');
Route::get('/live_search/action2', 'LiveSearch@action2')->name('live_search.action2')->middleware('admin');
Route::get('/live_search/action3', 'LiveSearch@action3')->name('live_search.action3')->middleware('admin');

Route::get('/admin', 'AdminController@admin')->middleware('admin');


Route::get('/newdebt/{newdebt}', 'DebtsController@newdebtshowform')->middleware('admin');
Route::get('/newfirstdebt/{newdebt}', 'DebtsController@newfirstdebt')->middleware('admin');
Route::get('/fetchdebtbill/{fetchdebtbill}', 'DebtsController@fetchdebtbill')->middleware('admin');
Route::get('/fetchdebtbillsamaneh/', 'DebtsController@fetchdebtbillsamaneh')->middleware('admin');

Route::get('/fetchdebtbill-phase/', 'DebtsController@fetchdebtbillphase')->middleware('admin');


Route::get('/userfeatures/{userf}/edit', 'AdminController@edit')->name('userfeatures.edit')->middleware('admin');
Route::patch('/userfeatures/{userf}', 'AdminController@update')->name('userfeatures.update')->middleware('admin');


Route::get('/unauthorized', 'AdminController@unauth');
Route::get('/sunauthorized', 'AdminController@sunauth');

Route::get('/admin/reports/pipediametersreport', 'AdminController@pipereport')->middleware('admin');
Route::get('/admin/reports/phasewaterconsumptionreportmonthlypage', 'AdminController@phasewaterconsumptionmonthlypage')->middleware('admin');
Route::post('/admin/reports/phasewaterconsumptionreportmonthly', 'AdminController@phasewaterconsumptionmonthly')->middleware('admin');

Route::get('/admin/reports/classifiedcompaniesmonthlypage', 'AdminController@classifiedcompaniesmonthlypage')->middleware('admin');
Route::post('/admin/reports/classifiedcompaniesmonthly', 'AdminController@classifiedcompaniesmonthly')->middleware('admin');

Route::get('/admin/reports/createpaymentsmonthlypage', 'AdminController@createpaymentsmonthlypage')->middleware('admin');
Route::post('/admin/reports/createpaymentsmonthly', 'AdminController@createpaymentsmonthly')->middleware('admin');


Route::get('/d/cost/debtsretrieveprocesspage', 'AdminController@retrieveprocesspage')->middleware('admin');
Route::post('/d/cost/debtsretrieveprocess', 'AdminController@retrieveprocess')->middleware('admin');

Route::get('/d/month/debtsretrieveprocesspage', 'AdminController@createmonthdebts')->middleware('admin');
Route::post('/d/month/debtsretrieveprocess', 'AdminController@monthdebtspage')->middleware('admin');

Route::get('/dp/month/debtspaymentsretrieveprocesspage', 'AdminController@createmonthdebtspayments')->middleware('admin');
Route::post('/dp/month/debtspaymentsretrieveprocess', 'AdminController@monthdebtspaymentspage')->middleware('admin');

Route::get('/dcompany11111/year/createmonthuserdebts', 'AdminController@sa111')->middleware('admin');
Route::get('/dcompany/year/createmonthuserdebts', 'AdminController@createmonthuserdebts')->middleware('admin');
Route::post('/dcompany/year/usermonthdebtspage', 'AdminController@usermonthdebtspage')->middleware('admin');


Route::get('/newdebtdelay/', 'DebtsController@newdebtshowformdelay')->middleware('admin');
Route::post('/d/company/debtformretrieveprocessdelay', 'DebtsController@debtformretrieveprocessdelay')->middleware('admin');
Route::post('/ddelay', 'DebtsController@storedelay')->middleware('admin');


Route::get('/d/cost/monthdebtsretrieveprocesspage', 'AdminController@monthretrieveprocesspage')->middleware('admin');
Route::post('/d/cost/monthdebtsretrieveprocess', 'AdminController@monthretrieveprocess')->middleware('admin');
