<?php

namespace App\Http\Controllers;

use App\User;
use App\Charts\PipeChart;
use Illuminate\Http\Request;
use function Sodium\crypto_box_publickey_from_secretkey;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function admin()
    {
        return view('admin.admin');
    }

    public function unauth()
    {
        return view('unauthorized');
    }

    public function sunauth()
    {
        return view('unauthorized');
    }

    public function edit(User $userf)
    {
        return view('profiles.edituser', compact('userf'));
    }

    public function update(User $userf)
    {

        $data = request()->validate([
            'name' => 'required',
            'metrazh' => 'required',
            'pipediameter' => 'required',
            'phase' => 'required',
            'sanitation' => 'required',
            'addedabbaha' => 'required',
            'sanitationfraction' => 'required',
            'companytype' => 'required',
            'servicescostfraction' => 'required',
            'userdebt' => 'required',
            'usercredit' => 'required',
            'sharednumber' => 'required',
            'telephone' => 'required',
            'businessid' => '',
            'nationalid' => '',
        ]);

       \App\User::where('id', $userf->id)->first()->update($data);

        return redirect("/admin");
    }

    public function pipereport()
    {
        $pipeyekdovom = \App\User::where('pipediameter', '1/2')->get();
        $pipeyekdovomcount = count($pipeyekdovom);

        $pipesechaharom = \App\User::where('pipediameter', '3/4')->get();
        $pipesechaharomcount = count($pipesechaharom);

        $pipeyek = \App\User::where('pipediameter', '1')->get();
        $pipeyekcount = count($pipeyek);

        $pipesedovom = \App\User::where('pipediameter', '3/2')->get();
        $pipesedovomcount = count($pipesedovom);

        $pipedo = \App\User::where('pipediameter', '2')->get();
        $pipedocount = count($pipedo);

        $pipese = \App\User::where('pipediameter', '3')->get();
        $pipesecount = count($pipese);

        $chart = new PipeChart;
        $chart->labels(['1/2', '3/4', '1', '3/2', '2', '3']);
        $chart->dataset('پراکندگی انشعاب ها', 'bar', [$pipeyekdovomcount, $pipesechaharomcount, $pipeyekcount, $pipesedovomcount, $pipedocount, $pipesecount])->color('black')->backgroundColor('black');

        return view('reports.pipereports', compact('pipeyekdovomcount', 'pipesechaharomcount', 'pipeyekcount', 'pipesedovomcount', 'pipedocount', 'pipesecount', 'chart'));
    }

    public function phasewaterconsumptionmonthlypage()
    {
        return view('reports.createwaterconsumptionmonthly');
    }
    public function phasewaterconsumptionmonthly()
    {
        $data = request()->validate([
            'phase' => 'required',
            'year' => 'required',
        ]);

        $users = \App\User::where('phase', $data['phase'])->get();
        foreach ($users as $user){
            $sags[] = $user->id;
        };

        $phasetype = $data['phase'];
        $phaseland = \App\User::where('phase', $data['phase'])->get();
        $phaselands = $phaseland->sum('metrazh');

        $phaseperiodconsumptionfarvardin = \App\Debt::whereIn('user_id', $sags)->where('timetoyear', $data['year'])->where('timetomonth', '1')->get();
        $phaseperiodconsumptionfarvardinvalue = $phaseperiodconsumptionfarvardin->sum('periodconsumption');

        $phaseperiodconsumptionordibehesht = \App\Debt::whereIn('user_id', $sags)->where('timetoyear', $data['year'])->where('timetomonth', '2')->get();
        $phaseperiodconsumptionordibeheshtvalue = $phaseperiodconsumptionordibehesht->sum('periodconsumption');

        $phaseperiodconsumptionkhordad = \App\Debt::whereIn('user_id', $sags)->where('timetoyear', $data['year'])->where('timetomonth', '3')->get();
        $phaseperiodconsumptionkhordadvalue = $phaseperiodconsumptionkhordad->sum('periodconsumption');

        $phaseperiodconsumptiontir = \App\Debt::whereIn('user_id', $sags)->where('timetoyear', $data['year'])->where('timetomonth', '4')->get();
        $phaseperiodconsumptiontirvalue = $phaseperiodconsumptiontir->sum('periodconsumption');

        $phaseperiodconsumptionmordad = \App\Debt::whereIn('user_id', $sags)->where('timetoyear', $data['year'])->where('timetomonth', '5')->get();
        $phaseperiodconsumptionmordadvalue = $phaseperiodconsumptionmordad->sum('periodconsumption');

        $phaseperiodconsumptionshahrivar = \App\Debt::whereIn('user_id', $sags)->where('timetoyear', $data['year'])->where('timetomonth', '6')->get();
        $phaseperiodconsumptionshahrivarvalue = $phaseperiodconsumptionshahrivar->sum('periodconsumption');

        $phaseperiodconsumptionmehr = \App\Debt::whereIn('user_id', $sags)->where('timetoyear', $data['year'])->where('timetomonth', '7')->get();
        $phaseperiodconsumptionmehrvalue = $phaseperiodconsumptionmehr->sum('periodconsumption');

        $phaseperiodconsumptionaban = \App\Debt::whereIn('user_id', $sags)->where('timetoyear', $data['year'])->where('timetomonth', '8')->get();
        $phaseperiodconsumptionabanvalue = $phaseperiodconsumptionaban->sum('periodconsumption');

        $phaseperiodconsumptionazar = \App\Debt::whereIn('user_id', $sags)->where('timetoyear', $data['year'])->where('timetomonth', '9')->get();
        $phaseperiodconsumptionazarvalue = $phaseperiodconsumptionazar->sum('periodconsumption');

        $phaseperiodconsumptiondey = \App\Debt::whereIn('user_id', $sags)->where('timetoyear', $data['year'])->where('timetomonth', '10')->get();
        $phaseperiodconsumptiondeyvalue = $phaseperiodconsumptiondey->sum('periodconsumption');

        $phaseperiodconsumptionbahman = \App\Debt::whereIn('user_id', $sags)->where('timetoyear', $data['year'])->where('timetomonth', '11')->get();
        $phaseperiodconsumptionbahmanvalue = $phaseperiodconsumptionbahman->sum('periodconsumption');

        $phaseperiodconsumptionesfand = \App\Debt::whereIn('user_id', $sags)->where('timetoyear', $data['year'])->where('timetomonth', '12')->get();
        $phaseperiodconsumptionesfandvalue = $phaseperiodconsumptionesfand->sum('periodconsumption');

        $pwpcchart = new PipeChart;
        $pwpcchart->labels(['فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور', 'مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند']);
        $pwpcchart->dataset('مصرف آب', 'bar', [$phaseperiodconsumptionfarvardinvalue, $phaseperiodconsumptionordibeheshtvalue, $phaseperiodconsumptionkhordadvalue, $phaseperiodconsumptiontirvalue, $phaseperiodconsumptionmordadvalue, $phaseperiodconsumptionshahrivarvalue, $phaseperiodconsumptionmehrvalue, $phaseperiodconsumptionabanvalue, $phaseperiodconsumptionazarvalue, $phaseperiodconsumptiondeyvalue, $phaseperiodconsumptionbahmanvalue, $phaseperiodconsumptionesfandvalue])->color('black')->backgroundColor('black');

        return view('reports.phaseperiodconsumptionmonthly', compact('phaseperiodconsumptionfarvardinvalue', 'phaseperiodconsumptionordibeheshtvalue', 'phaseperiodconsumptionkhordadvalue', 'phaseperiodconsumptiontirvalue', 'phaseperiodconsumptionmordadvalue', 'phaseperiodconsumptionshahrivarvalue', 'phaseperiodconsumptionmehrvalue', 'phaseperiodconsumptionabanvalue', 'phaseperiodconsumptionazarvalue', 'phaseperiodconsumptiondeyvalue', 'phaseperiodconsumptionbahmanvalue', 'phaseperiodconsumptionesfandvalue', 'pwpcchart', 'phaselands', 'phasetype'));
    }

    public function classifiedcompaniesmonthlypage()
    {
        return view('reports.createclassifiedcompanies');
    }

    public function classifiedcompaniesmonthly()
    {
        $data = request()->validate([
            'consumptiontype' => 'required',
            'cmonth' => 'required',
            'cyear' => 'required',
        ]);

        if ($data['consumptiontype'] == 'lower') {

            $classifieddebts = \App\Debt::where('periodconsumption', '>=', 0)->where('periodconsumption', '<', 15)->where('timetoyear', $data['cyear'])->where('timetomonth', $data['cmonth'])->get()->sortBy('periodconsumption');
          // $classifieddebtsOrder =
            $companytype = 'مصرف بین 0 و 15 متر مکعب';
        }

        if ($data['consumptiontype'] == 'low') {

            $classifieddebts = \App\Debt::where('periodconsumption', '>=', 15)->where('periodconsumption', '<', 30)->where('timetoyear', $data['cyear'])->where('timefrommonth', $data['cmonth'])->get()->sortBy('periodconsumption');
            $companytype = 'مصرف بین 15 و 30 متر مکعب';
        }

        if ($data['consumptiontype'] == 'average') {

            $classifieddebts = \App\Debt::where('periodconsumption', '>=', 30)->where('periodconsumption', '<', 45)->where('timetoyear', $data['cyear'])->where('timetomonth', $data['cmonth'])->get()->sortBy('periodconsumption');
            $companytype = 'مصرف بین 30 و 45 متر مکعب';
        }

        if ($data['consumptiontype'] == 'high') {

            $classifieddebts = \App\Debt::where('periodconsumption', '>', 45)->where('timetoyear', $data['cyear'])->where('timetomonth', $data['cmonth'])->get()->sortBy('periodconsumption');
            $companytype = 'مصرف بیشتر از 45 متر مکعب';
        }

        if ($data['consumptiontype'] == 'higher') {

            $classifieddebts = \App\Debt::where('periodconsumption', '>', 1000)->where('timetoyear', $data['cyear'])->where('timetomonth', $data['cmonth'])->get()->sortBy('periodconsumption');
            $companytype = 'مصرف بیشتر از 1000 متر مکعب';
        }

            if($classifieddebts->count() > 0){
                foreach ($classifieddebts as $classifieddebt){
                    $classifiedcompanyids[] = $classifieddebt->user_id;
                    $classifiedcompanyperiodconsumptions[] = $classifieddebt->periodconsumption;
                };

                $classifiedcompanyperiodconsumptionsSum = array_sum($classifiedcompanyperiodconsumptions);

                $ids_ordered = implode(',', $classifiedcompanyids);
                $classifiedcompanyusers = \App\User::whereIn('id', $classifiedcompanyids)->orderByRaw("FIELD(id, $ids_ordered)")->get();

                return view('reports.classifiedcompanies', compact('classifiedcompanyusers', 'classifiedcompanyperiodconsumptions', 'classifiedcompanyperiodconsumptionsSum', 'companytype'));
            }
            else{
                return redirect()->back()->with('alert', 'There is no records!');
            }

    }



    public function createpaymentsmonthlypage()
    {
        return view('reports.createpaymentsmonthly');
    }
    public function createpaymentsmonthly()
    {
        $data = request()->validate([
            'phase' => 'required',
            'year' => 'required',
        ]);

        $users = \App\User::where('phase', $data['phase'])->get();
        foreach ($users as $user){
            $sags[] = $user->id;
        };

        $phaseland = \App\User::where('phase', $data['phase'])->get();
        $phaselands = $phaseland->sum('metrazh');
        $phaseType = $data['phase'];

        $phasepayments1 = \App\Payment::whereIn('user_id', $sags)->get();
        foreach ($phasepayments1 as $phasepayment1){
            $billnumbers[] = $phasepayment1->billnumber;
        };
        $phasepaymentsdebts = \App\Debt::whereIn('billnumber', $billnumbers)->get();

        $phasepaymentsfarvardin = \App\Payment::whereIn('user_id', $sags)->where('debtyear', $data['year'])->where('debtmonth', '1')->get();
        $phasepaymentsfarvardinvalue = $phasepaymentsfarvardin->sum('totalcost');

        $phasepaymentsordibehesht = \App\Payment::whereIn('user_id', $sags)->where('debtyear', $data['year'])->where('debtmonth', '2')->get();
        $phasepaymentsordibeheshtvalue = $phasepaymentsordibehesht->sum('totalcost');

        $phasepaymentskhordad = \App\Payment::whereIn('user_id', $sags)->where('debtyear', $data['year'])->where('debtmonth', '3')->get();
        $phasepaymentskhordadvalue = $phasepaymentskhordad->sum('totalcost');

        $phasepaymentstir = \App\Payment::whereIn('user_id', $sags)->where('debtyear', $data['year'])->where('debtmonth', '4')->get();
        $phasepaymentstirvalue = $phasepaymentstir->sum('totalcost');

        $phasepaymentsmordad = \App\Payment::whereIn('user_id', $sags)->where('debtyear', $data['year'])->where('debtmonth', '5')->get();
        $phasepaymentsmordadvalue = $phasepaymentsmordad->sum('totalcost');

        $phasepaymentsshahrivar = \App\Payment::whereIn('user_id', $sags)->where('debtyear', $data['year'])->where('debtmonth', '6')->get();
        $phasepaymentsshahrivarvalue = $phasepaymentsshahrivar->sum('totalcost');

        $phasepaymentsmehr = \App\Payment::whereIn('user_id', $sags)->where('debtyear', $data['year'])->where('debtmonth', '7')->get();
        $phasepaymentsmehrvalue = $phasepaymentsmehr->sum('totalcost');

        $phasepaymentsaban = \App\Payment::whereIn('user_id', $sags)->where('debtyear', $data['year'])->where('debtmonth', '8')->get();
        $phasepaymentsabanvalue = $phasepaymentsaban->sum('totalcost');

        $phasepaymentsazar = \App\Payment::whereIn('user_id', $sags)->where('debtyear', $data['year'])->where('debtmonth', '9')->get();
        $phasepaymentsazarvalue = $phasepaymentsazar->sum('totalcost');

        $phasepaymentsdey = \App\Payment::whereIn('user_id', $sags)->where('debtyear', $data['year'])->where('debtmonth', '10')->get();
        $phasepaymentsdeyvalue = $phasepaymentsdey->sum('totalcost');

        $phasepaymentsbahman = \App\Payment::whereIn('user_id', $sags)->where('debtyear', $data['year'])->where('debtmonth', '11')->get();
        $phasepaymentsbahmanvalue = $phasepaymentsbahman->sum('totalcost');

        $phasepaymentsesfand = \App\Payment::whereIn('user_id', $sags)->where('debtyear', $data['year'])->where('debtmonth', '12')->get();
        $phasepaymentsesfandvalue = $phasepaymentsesfand->sum('totalcost');

        $ppchart = new PipeChart;
        $ppchart->labels(['فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور', 'مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند']);
        $ppchart->dataset('آمار پرداخت ها', 'bar', [$phasepaymentsfarvardinvalue, $phasepaymentsordibeheshtvalue, $phasepaymentskhordadvalue, $phasepaymentstirvalue, $phasepaymentsmordadvalue, $phasepaymentsshahrivarvalue, $phasepaymentsmehrvalue, $phasepaymentsabanvalue, $phasepaymentsazarvalue, $phasepaymentsdeyvalue, $phasepaymentsbahmanvalue, $phasepaymentsesfandvalue]);



        $phasedebtsfarvardin = \App\Debt::whereIn('user_id', $sags)->where('timetoyear', $data['year'])->where('timetomonth', '1')->get();
        $phasedebtsfarvardinvalue = $phasedebtsfarvardin->sum('billtotalcost');

        $phasedebtsordibehesht = \App\Debt::whereIn('user_id', $sags)->where('timetoyear', $data['year'])->where('timetomonth', '2')->get();
        $phasedebtsordibeheshtvalue = $phasedebtsordibehesht->sum('billtotalcost');

        $phasedebtskhordad = \App\Debt::whereIn('user_id', $sags)->where('timetoyear', $data['year'])->where('timetomonth', '3')->get();
        $phasedebtskhordadvalue = $phasedebtskhordad->sum('billtotalcost');

        $phasedebtstir = \App\Debt::whereIn('user_id', $sags)->where('timetoyear', $data['year'])->where('timetomonth', '4')->get();
        $phasedebtstirvalue = $phasedebtstir->sum('billtotalcost');

        $phasedebtsmordad = \App\Debt::whereIn('user_id', $sags)->where('timetoyear', $data['year'])->where('timetomonth', '5')->get();
        $phasedebtsmordadvalue = $phasedebtsmordad->sum('billtotalcost');

        $phasedebtsshahrivar = \App\Debt::whereIn('user_id', $sags)->where('timetoyear', $data['year'])->where('timetomonth', '6')->get();
        $phasedebtsshahrivarvalue = $phasedebtsshahrivar->sum('billtotalcost');

        $phasedebtsmehr = \App\Debt::whereIn('user_id', $sags)->where('timetoyear', $data['year'])->where('timetomonth', '7')->get();
        $phasedebtsmehrvalue = $phasedebtsmehr->sum('billtotalcost');

        $phasedebtsaban = \App\Debt::whereIn('user_id', $sags)->where('timetoyear', $data['year'])->where('timetomonth', '8')->get();
        $phasedebtsabanvalue = $phasedebtsaban->sum('billtotalcost');

        $phasedebtsazar = \App\Debt::whereIn('user_id', $sags)->where('timetoyear', $data['year'])->where('timetomonth', '9')->get();
        $phasedebtsazarvalue = $phasedebtsazar->sum('billtotalcost');

        $phasedebtsdey = \App\Debt::whereIn('user_id', $sags)->where('timetoyear', $data['year'])->where('timetomonth', '10')->get();
        $phasedebtsdeyvalue = $phasedebtsdey->sum('billtotalcost');

        $phasedebtsbahman = \App\Debt::whereIn('user_id', $sags)->where('timetoyear', $data['year'])->where('timetomonth', '11')->get();
        $phasedebtsbahmanvalue = $phasedebtsbahman->sum('billtotalcost');

        $phasedebtsesfand = \App\Debt::whereIn('user_id', $sags)->where('timetoyear', $data['year'])->where('timetomonth', '12')->get();
        $phasedebtsesfandvalue = $phasedebtsesfand->sum('billtotalcost');



        $pdchart = new PipeChart;
        $pdchart->labels(['فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور', 'مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند']);
        $pdchart->dataset('آمار فروش ها', 'bar', [$phasedebtsfarvardinvalue, $phasedebtsordibeheshtvalue, $phasedebtskhordadvalue, $phasedebtstirvalue, $phasedebtsmordadvalue, $phasedebtsshahrivarvalue, $phasedebtsmehrvalue, $phasedebtsabanvalue, $phasedebtsazarvalue, $phasedebtsdeyvalue, $phasedebtsbahmanvalue, $phasedebtsesfandvalue]);

        return view('reports.phasepaymentsmonthly', compact('phasedebtsfarvardinvalue', 'phasedebtsordibeheshtvalue', 'phasedebtskhordadvalue', 'phasedebtstirvalue', 'phasedebtsmordadvalue', 'phasedebtsshahrivarvalue', 'phasedebtsmehrvalue', 'phasedebtsabanvalue', 'phasedebtsazarvalue', 'phasedebtsdeyvalue', 'phasedebtsbahmanvalue', 'phasedebtsesfandvalue', 'ppchart', 'phaselands',
            'phasepaymentsfarvardinvalue', 'phasepaymentsordibeheshtvalue', 'phasepaymentskhordadvalue', 'phasepaymentstirvalue', 'phasepaymentsmordadvalue', 'phasepaymentsshahrivarvalue', 'phasepaymentsmehrvalue', 'phasepaymentsabanvalue', 'phasepaymentsazarvalue', 'phasepaymentsdeyvalue', 'phasepaymentsbahmanvalue', 'phasepaymentsesfandvalue', 'pdchart', 'phaseType'));
    }

    public function retrieveprocesspage()
    {
        return view('reports.debtretrievebillsbcost');
    }

    public function retrieveprocess()
    {
        $data = request()->validate([
            'cost' => 'required',
        ]);

        $debts = \App\Debt::where('billtotalcost', $data['cost'])->get();

        return view('reports.debtsretrievepagebcost', compact('debts'));
    }

    public function monthretrieveprocesspage()
    {
        return view('reports.monthdebtretrievebillsbcost');
    }

    public function monthretrieveprocess()
    {
        $data = request()->validate([
            'cost' => 'required',
        ]);

        $roundCost = $data['cost'];

        $debts = \App\Debt::where('totalcost', $roundCost)->get();

        return view('reports.debtsretrievepagebcost', compact('debts'));
    }

    public function createmonthdebts()
    {
        return view('reports.createmonthdebts');
    }

    public function monthdebtspage()
    {
        $data = request()->validate([
            'debtsyear' => 'required',
            'debtsmonth' => 'required',
        ]);

        $year = $data['debtsyear'];
        $month = $data['debtsmonth'];

        $allDebts = \App\Debt::where('timetoyear', $data['debtsyear'])->where('timetomonth', $data['debtsmonth'])->get();
        $debts = $allDebts->sortByDesc('billtotalcost');
        $periodconsumptionSum = $debts->sum('periodconsumption');
        $abbahaSum = $debts->sum('abbahacost');
        $abonmanSum = $debts->sum('abonmancost');
        $servicescostSum = $debts->sum('servicescost');
        $specialisedservicescostSum = $debts->sum('specialisedservicescost');
        $generalservicescostSum = $debts->sum('generalservicescost');
        $maliatSum = $debts->sum('maliat');
        $lastdebtSum = $debts->sum('lastdebt');
        $totalcostSum = $debts->sum('totalcost');
        $billtotalcostSum = $debts->sum('billtotalcost');
        return view('reports.debtsretrievemonthpage', compact('debts', 'month', 'year',
            'abbahaSum', 'periodconsumptionSum', 'abonmanSum', 'servicescostSum',
            'specialisedservicescostSum', 'generalservicescostSum', 'maliatSum',
            'lastdebtSum', 'totalcostSum', 'billtotalcostSum'));
    }


    public function createmonthdebtspayments()
    {
        return view('reports.createmonthdebtspayments');
    }

    public function monthdebtspaymentspage()
    {
        $data = request()->validate([
            'debtspaymentsyear' => 'required',
            'debtspaymentsmonth' => 'required',
        ]);

        $year = $data['debtspaymentsyear'];
        $month = $data['debtspaymentsmonth'];

        $allDebts = \App\Debt::where('timetoyear', $data['debtspaymentsyear'])->where('timetomonth', $data['debtspaymentsmonth'])->where('paymentstatus', 'false')->get();
        $debts = $allDebts->sortByDesc('billtotalcost');
        $payments = \App\Payment::where('debtyear', $data['debtspaymentsyear'])->where('debtmonth', $data['debtspaymentsmonth'])->get();
        $users = \App\User::all();

        return view('reports.debtspaymentsretrievemonthpage', compact('debts', 'month', 'year', 'payments', 'users'));
    }

    public function createmonthuserdebts()
    {
        return view('reports.createmonthuserdebts');
    }

    public function usermonthdebtspage()
    {
        $data = request()->validate([
            'debtsyear' => 'required',
            'user_id' => 'required',
        ]);

        $year = $data['debtsyear'];
        $user = \App\User::where('id', $data['user_id'])->first();

        $debts = \App\Debt::where('user_id', $data['user_id'])->where('timetoyear', $data['debtsyear'])->get();

        return view('reports.usermonthdebtspage', compact('debts',  'year', 'user'));
    }
}


