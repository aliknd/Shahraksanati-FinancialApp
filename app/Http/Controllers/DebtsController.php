<?php

namespace App\Http\Controllers;

use App\Debt;
use Illuminate\Http\Request;

class DebtsController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function store()
    {
        $data = request()->validate([
            'user_id' => 'required',
            'billnumber' => 'required',
            'lastcounternumber' => 'required',
            'currentcounternumber' => 'required',
            'timefromyear' => '',
            'timefrommonth' => '',
            'timefromday' => '',
            'timetoyear' => '',
            'timetomonth' => '',
            'timetoday' => '',
            'paymentdeadlineyear' => '',
            'paymentdeadlinemonth' => '',
            'paymentdeadlineday' => '',
            'paymentstatus' => '',
        ]);

        $periodconsumption=$data['currentcounternumber']-$data['lastcounternumber'];

        $user = \App\User::find($data['user_id']);

        if ($user->companytype == "ordinary") {

            $abbahacost1 = \App\Abbaharate::find(1);
            $abbahacost2 = \App\Abbaharate::find(2);
            $abbahacost3 = \App\Abbaharate::find(3);
            $abbahacost4 = \App\Abbaharate::find(4);
            $abbahacost5 = \App\Abbaharate::find(5);
            $abbahacost6 = \App\Abbaharate::find(6);
            $abbahacost7 = \App\Abbaharate::find(7);
            $abbahacost8 = \App\Abbaharate::find(8);

        } elseif ($user->companytype == "special") {

            $abbahacost1 = \App\Abbaharate2::find(1);
            $abbahacost2 = \App\Abbaharate2::find(2);
            $abbahacost3 = \App\Abbaharate2::find(3);
            $abbahacost4 = \App\Abbaharate2::find(4);
            $abbahacost5 = \App\Abbaharate::find(5);
            $abbahacost6 = \App\Abbaharate::find(6);
            $abbahacost7 = \App\Abbaharate::find(7);
            $abbahacost8 = \App\Abbaharate::find(8);

        } else { echo "There is no users with this type!!!"; }

        $uaddedabbaha = $user->addedabbaha;
        $usanitationfraction = $user->sanitationfraction;
        $uservicescostfraction = $user->servicescostfraction;

        if ($periodconsumption < 15){
            $periodconsumption1 = $periodconsumption;
            $abbahafinal = $periodconsumption1*$abbahacost1->cost;
        }
        elseif ($periodconsumption >= 15 and $periodconsumption < 30) {
            $periodconsumption2 = $periodconsumption - 15;
            $abbahafirst = $abbahacost1->cost * 15;
            $abbahasecond = $periodconsumption2 * $abbahacost2->cost;
            $abbahafinal = $abbahafirst + $abbahasecond;
        }
        elseif ($periodconsumption >= 30 and $periodconsumption < 200) {
            $periodconsumption3 = $periodconsumption - 30;
            $abbahafirst = $abbahacost1->cost * 15;
            $abbahasecond = $abbahacost2->cost * 15;
            $abbahathird = $periodconsumption3 * ($abbahacost3->cost + $uaddedabbaha);
            $abbahafinal = $abbahafirst + $abbahasecond + $abbahathird;
        }
        elseif ($periodconsumption >= 200 and $periodconsumption < 500) {
            $periodconsumption4 = $periodconsumption - 200;
            $abbahafirst = $abbahacost1->cost * 15;
            $abbahasecond = $abbahacost2->cost * 15;
            $abbahathird = $abbahacost3->cost * 170;
            $abbahaforth = $periodconsumption4 * ($abbahacost4->cost + $uaddedabbaha);
            $abbahafinal = $abbahafirst + $abbahasecond + $abbahathird + $abbahaforth;
        }
        elseif ($periodconsumption >= 500 and $periodconsumption < 1000) {
            $periodconsumption5 = $periodconsumption - 500;
            $abbahafirst = $abbahacost1->cost * 15;
            $abbahasecond = $abbahacost2->cost * 15;
            $abbahathird = $abbahacost3->cost * 170;
            $abbahaforth = $abbahacost4->cost * 300;
            $abbahafifth = $periodconsumption5 * ($abbahacost5->cost + $uaddedabbaha);
            $abbahafinal = $abbahafirst + $abbahasecond + $abbahathird + $abbahaforth + $abbahafifth;
        }
        elseif ($periodconsumption >= 1000 and $periodconsumption < 3000) {
            $periodconsumption6 = $periodconsumption - 1000;
            $abbahafirst = $abbahacost1->cost * 15;
            $abbahasecond = $abbahacost2->cost * 15;
            $abbahathird = $abbahacost3->cost * 170;
            $abbahaforth = $abbahacost4->cost * 300;
            $abbahafifth = $abbahacost5->cost * 500;
            $abbahasixth = $periodconsumption6 * ($abbahacost6->cost + $uaddedabbaha);
            $abbahafinal = $abbahafirst + $abbahasecond + $abbahathird + $abbahaforth + $abbahafifth + $abbahasixth;
        }
        elseif ($periodconsumption >= 3000 and $periodconsumption < 5000) {
            $periodconsumption7 = $periodconsumption - 3000;
            $abbahafirst = $abbahacost1->cost * 15;
            $abbahasecond = $abbahacost2->cost * 15;
            $abbahathird = $abbahacost3->cost * 170;
            $abbahaforth = $abbahacost4->cost * 300;
            $abbahafifth = $abbahacost5->cost * 500;
            $abbahasixth = $abbahacost6->cost * 2000;
            $abbahaseventh = $periodconsumption7 * ($abbahacost7->cost + $uaddedabbaha);
            $abbahafinal = $abbahafirst + $abbahasecond + $abbahathird + $abbahaforth + $abbahafifth + $abbahasixth + $abbahaseventh;
        }
        elseif ($periodconsumption >= 5000) {
            $periodconsumption8 = $periodconsumption - 5000;
            $abbahafirst = $abbahacost1->cost * 15;
            $abbahasecond = $abbahacost2->cost * 15;
            $abbahathird = $abbahacost3->cost * 170;
            $abbahaforth = $abbahacost4->cost * 300;
            $abbahafifth = $abbahacost5->cost * 500;
            $abbahasixth = $abbahacost6->cost * 2000;
            $abbahaseventh = $abbahacost7->cost * 2000;
            $abbahaeight = $periodconsumption8 * ($abbahacost8->cost + $uaddedabbaha);
            $abbahafinal = $abbahafirst + $abbahasecond + $abbahathird + $abbahaforth + $abbahafifth + $abbahasixth + $abbahaseventh + $abbahaeight;
        }

        $generalservices = \App\GeneralService::all();
        $specialisedservices = \App\SpecialisedService::where('user_id', $data['user_id'])->get();

        $abonman = \App\Enshabrate::where('enshab', $user->pipediameter)->first();
        $profile = \App\Profile::find($data['user_id']);


        $firstdebtshowbefore = \App\Debt::where('user_id', $data['user_id'])->first();
        if($firstdebtshowbefore->paymentstatus == 'false'){
            $firstdebtshowbeforecost = $firstdebtshowbefore->lastdebt;
        }
        elseif($firstdebtshowbefore->paymentstatus == 'true'){
            $firstdebtshowbeforecost = 0;
        }
        $lastdebt = \App\Debt::where('user_id', $data['user_id'])->where('paymentstatus', 'false')->get();
        $lastdebtcost = $lastdebt->sum('totalcost')+$firstdebtshowbeforecost;

        $haghonezarehn = $periodconsumption * 1150;

        $abbahacost = round($abbahafinal);
        $abonmancost = $abonman->cost;
        $daffazelab = round((($abbahacost+$haghonezarehn)*0.65*$usanitationfraction));
        $servicescost = round(($user->metrazh * 2000 * $uservicescostfraction)/12);

        $specialisedservicescost= $specialisedservices->sum('cost');
        $generalservicescost = $generalservices->sum('cost');
        foreach ($specialisedservices as $specialisedservice){
            $stitleservicespre[] = $specialisedservice->title;
            $scostservicespre[] = $specialisedservice->cost;
        }
        foreach ($generalservices as $generalservice){
            $gtitleservicespre[] =  $generalservice->title;
            $gcostservicespre[] = $generalservice->cost;
        }

        $gtitleservices = serialize($gtitleservicespre);
        $gcostservices = serialize($gcostservicespre);
        $stitleservices = serialize($stitleservicespre);
        $scostservices = serialize($scostservicespre);


        $maliatwithfazelab = round(($abbahacost+$haghonezarehn+$abonmancost+$daffazelab+$abonmancost+$servicescost+$specialisedservicescost+$generalservicescost)*0.09);
        $maliatwithoutfazelab = round(($abbahacost+$haghonezarehn+$abonmancost+$servicescost+$specialisedservicescost+$generalservicescost)*0.09);
        $totalcostwithfazelab = $abbahacost+$haghonezarehn+$abonmancost+$daffazelab+$abonmancost+$servicescost+$specialisedservicescost+$generalservicescost+$maliatwithfazelab;

        $userfinancialinfo = \App\User::where('id', $data['user_id'])->first();

        if ($totalcostwithfazelab < 100000){
            $addedcost1 = 100000 - $totalcostwithfazelab;
            $totalcostwithfazelabfinal = round($totalcostwithfazelab+$addedcost1, -3);
            $billtotalcostwith = round($totalcostwithfazelabfinal+$lastdebtcost-$userfinancialinfo->usercredit+$userfinancialinfo->userdebt, -3);
        }
        elseif ($totalcostwithfazelab >= 100000) {
            $totalcostwithfazelabfinal = round($totalcostwithfazelab, -3);
            $addedcost1 = 0;
            $billtotalcostwith = round($totalcostwithfazelabfinal+$lastdebtcost-$userfinancialinfo->usercredit+$userfinancialinfo->userdebt, -3);
        }

        $totalcostwithoutfazelab = $abbahacost+$haghonezarehn+$abonmancost+$servicescost+$specialisedservicescost+$generalservicescost+$maliatwithoutfazelab;

        if ($totalcostwithoutfazelab < 100000){
            $addedcost2 = 100000 - $totalcostwithoutfazelab;
            $totalcostwithoutfazelabfinal = round($totalcostwithoutfazelab+$addedcost2, -3);
            $billtotalcostwithout = round($totalcostwithoutfazelabfinal+$lastdebtcost-$userfinancialinfo->usercredit+$userfinancialinfo->userdebt, -3);
        }
        elseif ($totalcostwithoutfazelab >= 100000) {
            $totalcostwithoutfazelabfinal = round($totalcostwithoutfazelab, -3);
            $addedcost2 = 0;
            $billtotalcostwithout = round($totalcostwithoutfazelabfinal+$lastdebtcost-$userfinancialinfo->usercredit+$userfinancialinfo->userdebt, -3);
        }


        if ($user->sanitation == 'true'){

            \App\Debt::create([
                'user_id' => $data['user_id'],
                'billnumber' => $data['billnumber'],
                'lastcounternumber' => $data['lastcounternumber'],
                'currentcounternumber' => $data['currentcounternumber'],
                'periodconsumption' => $periodconsumption,
                'timefromyear' => $data['timefromyear'],
                'timefrommonth' => $data['timefrommonth'],
                'timefromday' => $data['timefromday'],
                'timetoyear' => $data['timetoyear'],
                'timetomonth' => $data['timetomonth'],
                'timetoday' => $data['timetoday'],
                'paymentdeadlineyear' => $data['paymentdeadlineyear'],
                'paymentdeadlinemonth' => $data['paymentdeadlinemonth'],
                'paymentdeadlineday' => $data['paymentdeadlineday'],
                'abbahacost' => $abbahacost,
                'abonmancost' => $abonmancost,
                'servicescost' => $servicescost,
                'specialisedservicescost' => $specialisedservicescost,
                'generalservicescost' => $generalservicescost,
                'stitleservices' => $stitleservices,
                'scostservices' => $scostservices,
                'gtitleservices' => $gtitleservices,
                'gcostservices' => $gcostservices,
                'maliat' => $maliatwithfazelab,
                'lastdebt' => $lastdebtcost,
                'totalcost' => $totalcostwithfazelabfinal,
                'billtotalcost' => $billtotalcostwith,
                'addedgeneralcost' => $addedcost1,
                'paymentstatus' => $data['paymentstatus'],
            ]);

        }
        elseif ($user->sanitation == 'false'){

            \App\Debt::create([
                'user_id' => $data['user_id'],
                'billnumber' => $data['billnumber'],
                'lastcounternumber' => $data['lastcounternumber'],
                'currentcounternumber' => $data['currentcounternumber'],
                'periodconsumption' => $periodconsumption,
                'timefromyear' => $data['timefromyear'],
                'timefrommonth' => $data['timefrommonth'],
                'timefromday' => $data['timefromday'],
                'timetoyear' => $data['timetoyear'],
                'timetomonth' => $data['timetomonth'],
                'timetoday' => $data['timetoday'],
                'paymentdeadlineyear' => $data['paymentdeadlineyear'],
                'paymentdeadlinemonth' => $data['paymentdeadlinemonth'],
                'paymentdeadlineday' => $data['paymentdeadlineday'],
                'abbahacost' => $abbahacost,
                'abonmancost' => $abonmancost,
                'servicescost' => $servicescost,
                'specialisedservicescost' => $specialisedservicescost,
                'generalservicescost' => $generalservicescost,
                'stitleservices' => $stitleservices,
                'scostservices' => $scostservices,
                'gtitleservices' => $gtitleservices,
                'gcostservices' => $gcostservices,
                'maliat' => $maliatwithoutfazelab,
                'lastdebt' => $lastdebtcost,
                'totalcost' => $totalcostwithoutfazelabfinal,
                'billtotalcost' => $billtotalcostwithout,
                'addedgeneralcost' => $addedcost2,
                'paymentstatus' => $data['paymentstatus'],
            ]);

        }


        $firstdebtshow = \App\Debt::where('user_id', $data['user_id'])->first();
        if($firstdebtshow->paymentstatus == 'false'){
            $firstdebtshowcost = $firstdebtshow->lastdebt;
        }
        elseif($firstdebtshow->paymentstatus == 'true'){
            $firstdebtshowcost = 0;
        }

        $lastdebtshow = \App\Debt::where('user_id', $data['user_id'])->where('paymentstatus', 'false')->where('id', '<=' , $data['user_id'])->get();
        $lastdebtshowcost = $lastdebtshow->sum('totalcost')+$firstdebtshowcost;



        return redirect('/fetchdebtbill/'. $data['user_id']);

    }

    public function show(Debt $debt)
    {

        $firstdebtshow = \App\Debt::where('user_id', $debt->user_id)->first();
        if($firstdebtshow->paymentstatus == 'false'){
            $firstdebtshowcost = $firstdebtshow->lastdebt;
        }
        elseif($firstdebtshow->paymentstatus == 'true'){
            $firstdebtshowcost = 0;
        }

        $lastdebtshow = \App\Debt::where('user_id', $debt->user_id)->where('paymentstatus', 'false')->where('id', '<' , $debt->id)->get();
        $lastdebtshowcost = $lastdebtshow->sum('totalcost')+$firstdebtshowcost;


        $generalservices = \App\GeneralService::all();
        $specialisedservices = \App\SpecialisedService::where('user_id', $debt->user_id)->get();

        if ($debt->gtitleservices != null){
            $gtitleservices = unserialize( $debt->gtitleservices );
        }
        elseif ($debt->gtitleservices == null){
            $gtitleservices = 0;
        }

        if ($debt->gcostservices != null){
            $gcostservices = unserialize( $debt->gcostservices );
        }
        elseif ($debt->gcostservices == null){
            $gcostservices = 0;
        }

        if ($debt->stitleservices != null){
            $stitleservices = unserialize( $debt->stitleservices );
        }
        elseif ($debt->stitleservices == null){
            $stitleservices = 0;
        }

        if ($debt->scostservices != null){
            $scostservices = unserialize( $debt->scostservices );
        }
        elseif ($debt->scostservices == null){
            $scostservices = 0;
        }

        $userfinhistory = \App\User::where('id', $debt->user_id)->first();

        $lastdebtcount = count($lastdebtshow);
        if ($lastdebtcount >= 2){
            $ekhtar = 'تذکر: به دلیل بدهی های پیشین در صورت عدم پرداخت این قبض تا مهلت تعیین شده، انشعاب آب شما قطع می گردد';
        }
        elseif ($lastdebtcount < 2){
            $ekhtar = null;
        }

        return view('debts.show', compact('debt', 'generalservices', 'specialisedservices', 'lastdebtshowcost', 'gtitleservices', 'gcostservices', 'stitleservices', 'scostservices', 'userfinhistory', 'ekhtar'));
    }

    public function retrieve()
    {
        return view('debts.debtretrieve');
    }

    public function retrieveprocess()
    {
        $data = request()->validate([
            'user_id' => 'required',
            'timetoyear' => 'required',
        ]);

        $debts = \App\Debt::where('user_id', $data['user_id'])->where('timetoyear', $data['timetoyear'])->get();
        $userinfo = \App\User::where('id', $data['user_id'])->first();

        return view('debts.debtsretrievepage', compact('debts', 'userinfo'));
    }

    public function phasebillsretrieveprocess()
    {
        $data = request()->validate([
            'companyphase' => 'required',
            'timetomonth' => 'required',
            'timetoyear' => 'required',
        ]);

        $users = \App\User::where('phase', $data['companyphase'])->get();
        foreach ($users as $user){
            $usersId[] = $user->id;
        }

        $debts = \App\Debt::whereIn('user_id', $usersId)->where('timetomonth', $data['timetomonth'])->where('timetoyear', $data['timetoyear'])->get();

        return view('debts.phasebillsretrievepage', compact('debts'));
    }

    public function retrieveprocesssamaneh()
    {
        $data = request()->validate([
            'user_id' => 'required',
        ]);

        $debts = \App\Debt::where('user_id', $data)->get();

        return view('debts.debtsretrievepagesamaneh', compact('debts'));
    }

    public function changepaymentstatus($userid,$debtid)
    {

        $consideredDebt = \App\Debt::where('user_id', $userid)->where( 'id',  $debtid)->first();

        if ($consideredDebt->paymentstatus == "false"){
            \App\Debt::where('user_id', $userid)->where( 'id',  $debtid)->update(array('paymentstatus' => 'true'));
        }

        elseif ($consideredDebt->paymentstatus == "true"){
            \App\Debt::where('user_id', $userid)->where( 'id',  $debtid)->update(array('paymentstatus' => 'false'));
        }

        return view('debts.debtretrieve');
    }


    public function deletedebt($userid,$debtid)
    {
        \App\Debt::where('user_id', $userid)->where( 'id',  $debtid)->delete();
        return redirect('/fetchdebtbill/'. $userid);
    }


    public function debtformretrieve()
    {
        return view('debts.useretrievecreatedebt');
    }

    public function debtformretrieveprocess()
    {
        $data = request()->validate([
            'user_id' => 'required',
        ]);

        $debts = \App\Debt::where('user_id', $data)->orderby('created_at', 'desc')->first();

        return view('debts.create', compact('debts'));
    }

    public function debtformretrieveprocessdelay()
    {
        $data = request()->validate([
            'user_id' => 'required',
        ]);

        $debts = \App\Debt::where('user_id', $data)->orderby('created_at', 'desc')->first();

        return view('debts.createdelays', compact('debts'));
    }






    public function firstdebtform()
    {
        return view('debts.createfirstdebt');
    }

    public function firstdebtstore()
    {
        $data = request()->validate([
            'user_id' => 'required',
            'billnumber' => 'required',
            'lastdebt' => 'required',
            'lastcounternumber' => 'required',
            'currentcounternumber' => 'required',
            'haghonezareh' => 'required',
            'kasrazhezar' => 'required',
            'timefromyear' => '',
            'timefrommonth' => '',
            'timefromday' => '',
            'timetoyear' => '',
            'timetomonth' => '',
            'timetoday' => '',
            'paymentdeadlineyear' => '',
            'paymentdeadlinemonth' => '',
            'paymentdeadlineday' => '',
            'paymentstatus' => '',
        ]);

        $periodconsumption = $data['currentcounternumber'] - $data['lastcounternumber'];
        $haghonezareh = $data['haghonezareh'];
        $kasrazhezar = $data['kasrazhezar'];

        $abbahacost1 = \App\Abbaharate::find(1);
        $abbahacost2 = \App\Abbaharate::find(2);
        $abbahacost3 = \App\Abbaharate::find(3);

        if ($periodconsumption < 14) {
            $abbaha = $abbahacost1->cost;
        } elseif ($periodconsumption >= 14 and $periodconsumption < 40) {
            $abbaha = $abbahacost2->cost;
        } elseif ($periodconsumption >= 40) {
            $abbaha = $abbahacost3->cost;
        }

        $generalservices = \App\GeneralService::all();
        $specialisedservices = \App\SpecialisedService::where('user_id', $data['user_id'])->get();
        $user = \App\User::find($data['user_id']);
        $abonman = \App\Enshabrate::where('enshab', $user->pipediameter)->first();
        $profile = \App\Profile::find($data['user_id']);

        $abbahacost = $periodconsumption * $abbaha;
        $abonmancost = $abonman->cost;
        $daffazelab = ($periodconsumption * $abbaha) * 0.65;
        $servicescost = round(($user->metrazh * 950)/12);
        $specialisedservicescost = $specialisedservices->sum('cost');
        $generalservicescost = $generalservices->sum('cost');
        $maliatwithfazelab = round(($abbahacost + $abonmancost + $daffazelab + $abonmancost + $servicescost + $specialisedservicescost + $generalservicescost+$haghonezareh) * 0.09);
        $maliatwithoutfazelab = round(($abbahacost + $abonmancost + $servicescost + $specialisedservicescost + $generalservicescost+$haghonezareh) * 0.09);
        $totalcostwithfazelab = $abbahacost + $abonmancost + $daffazelab + $abonmancost + $servicescost + $specialisedservicescost + $generalservicescost + $maliatwithfazelab+$haghonezareh+$kasrazhezar;
        $totalcostwithoutfazelab = $abbahacost + $abonmancost + $servicescost + $specialisedservicescost + $generalservicescost + $maliatwithoutfazelab+$haghonezareh+$kasrazhezar;

        $stitleservices = 'a:1:{i:0;s:12:"تخلفات";}';
        $gtitleservices = 'a:1:{i:0;s:21:"خدمات عمومی";}';
        $scostservices = 'a:1:{i:0;s:1:"0";}';
        $gcostservices = 'a:1:{i:0;s:1:"0";}';

        if ($user->sanitation == 'true') {

            \App\Debt::create([
                'user_id' => $data['user_id'],
                'billnumber' => $data['billnumber'],
                'lastcounternumber' => $data['lastcounternumber'],
                'currentcounternumber' => $data['currentcounternumber'],
                'periodconsumption' => $periodconsumption,
                'timefromyear' => $data['timefromyear'],
                'timefrommonth' => $data['timefrommonth'],
                'timefromday' => $data['timefromday'],
                'timetoyear' => $data['timetoyear'],
                'timetomonth' => $data['timetomonth'],
                'timetoday' => $data['timetoday'],
                'paymentdeadlineyear' => $data['paymentdeadlineyear'],
                'paymentdeadlinemonth' => $data['paymentdeadlinemonth'],
                'paymentdeadlineday' => $data['paymentdeadlineday'],
                'abbahacost' => $abbahacost,
                'abonmancost' => $abonmancost,
                'servicescost' => $servicescost,
                'specialisedservicescost' => $specialisedservicescost,
                'generalservicescost' => $generalservicescost,
                'stitleservices' => $stitleservices,
                'scostservices' => $scostservices,
                'gtitleservices' => $gtitleservices,
                'gcostservices' => $gcostservices,
                'maliat' => $maliatwithfazelab,
                'lastdebt' => $data['lastdebt'],
                'totalcost' => $totalcostwithfazelab,
                'paymentstatus' => $data['paymentstatus'],
            ]);

        } elseif ($user->sanitation == 'false') {

            \App\Debt::create([
                'user_id' => $data['user_id'],
                'billnumber' => $data['billnumber'],
                'lastcounternumber' => $data['lastcounternumber'],
                'currentcounternumber' => $data['currentcounternumber'],
                'periodconsumption' => $periodconsumption,
                'timefromyear' => $data['timefromyear'],
                'timefrommonth' => $data['timefrommonth'],
                'timefromday' => $data['timefromday'],
                'timetoyear' => $data['timetoyear'],
                'timetomonth' => $data['timetomonth'],
                'timetoday' => $data['timetoday'],
                'paymentdeadlineyear' => $data['paymentdeadlineyear'],
                'paymentdeadlinemonth' => $data['paymentdeadlinemonth'],
                'paymentdeadlineday' => $data['paymentdeadlineday'],
                'abbahacost' => $abbahacost,
                'abonmancost' => $abonmancost,
                'servicescost' => $servicescost,
                'specialisedservicescost' => $specialisedservicescost,
                'generalservicescost' => $generalservicescost,
                'stitleservices' => $stitleservices,
                'scostservices' => $scostservices,
                'gtitleservices' => $gtitleservices,
                'gcostservices' => $gcostservices,
                'maliat' => $maliatwithoutfazelab,
                'lastdebt' => $data['lastdebt'],
                'totalcost' => $totalcostwithoutfazelab,
                'paymentstatus' => $data['paymentstatus'],
            ]);

        }

        return view('debts.dmessage');
    }


    public function newdebtshowform($newdebt)
    {
        return view('debts.useretrievecreatedebtnew', compact('newdebt'));
    }

    public function newdebtshowformdelay()
    {
        return view('debts.useretrievecreatedebtnewdelay');
    }

    public function newfirstdebt($newdebt)
    {
        return view('debts.createfirstdebtnew', compact('newdebt'));
    }

    public function fetchdebtbill($newfetch)
    {
        return view('debts.debtretrievebill', compact('newfetch'));
    }

    public function fetchdebtbillphase()
    {
        return view('debts.debtretrievebill-phase');
    }

    public function fetchdebtbillsamaneh()
    {
        return view('debts.debtretrievebillsamaneh');
    }




    public function showsamaneh(Debt $debt)
    {

        $firstdebtshow = \App\Debt::where('user_id', $debt->user_id)->first();
        if($firstdebtshow->paymentstatus == 'false'){
            $firstdebtshowcost = $firstdebtshow->lastdebt;
        }
        elseif($firstdebtshow->paymentstatus == 'true'){
            $firstdebtshowcost = 0;
        }

        $lastdebtshow = \App\Debt::where('user_id', $debt->user_id)->where('id', '<' , $debt->id)->get();
        $lastdebtshowcost = $lastdebtshow->sum('totalcost')+$firstdebtshowcost;


        $generalservices = \App\GeneralService::all();
        $specialisedservices = \App\SpecialisedService::where('user_id', $debt->user_id)->get();

        if ($debt->gtitleservices != null){
            $gtitleservices = unserialize( $debt->gtitleservices );
        }
        elseif ($debt->gtitleservices == null){
            $gtitleservices = 0;
        }

        if ($debt->gcostservices != null){
            $gcostservices = unserialize( $debt->gcostservices );
        }
        elseif ($debt->gcostservices == null){
            $gcostservices = 0;
        }

        if ($debt->stitleservices != null){
            $stitleservices = unserialize( $debt->stitleservices );
        }
        elseif ($debt->stitleservices == null){
            $stitleservices = 0;
        }

        if ($debt->scostservices != null){
            $scostservices = unserialize( $debt->scostservices );
        }
        elseif ($debt->scostservices == null){
            $scostservices = 0;
        }

        $userfinhistory = \App\User::where('id', $debt->user_id)->first();

        $lastdebtcount = count($lastdebtshow);
        if ($lastdebtcount >= 2){
            $ekhtar = 'تذکر: به دلیل بدهی های پیشین در صورت عدم پرداخت این قبض تا مهلت تعیین شده، انشعاب آب شما قطع می گردد';
        }
        elseif ($lastdebtcount < 2){
            $ekhtar = null;
        }

        return view('debts.showsamaneh', compact('debt', 'generalservices', 'specialisedservices', 'lastdebtshowcost', 'gtitleservices', 'gcostservices', 'stitleservices', 'scostservices', 'userfinhistory', 'ekhtar'));
    }






    public function storedelay()
    {
        $data = request()->validate([
            'user_id' => 'required',
            'billnumber' => 'required',
            'lastcounternumber' => 'required',
            'currentcounternumber' => 'required',
            'timefromyear' => '',
            'timefrommonth' => '',
            'timefromday' => '',
            'timetoyear' => '',
            'timetomonth' => '',
            'timetoday' => '',
            'paymentdeadlineyear' => '',
            'paymentdeadlinemonth' => '',
            'paymentdeadlineday' => '',
            'paymentstatus' => '',
        ]);

        $periodconsumption=$data['currentcounternumber']-$data['lastcounternumber'];

        $abbahacost1 = \App\Abbaharate::find(1);
        $abbahacost2 = \App\Abbaharate::find(2);
        $abbahacost3 = \App\Abbaharate::find(3);
        $abbahacost4 = \App\Abbaharate::find(4);

        $user = \App\User::find($data['user_id']);
        $uaddedabbaha = $user->addedabbaha;
        $usanitationfraction = $user->sanitationfraction;
        $uservicescostfraction = $user->servicescostfraction;

        if ($periodconsumption < 15){
            $periodconsumption1 = $periodconsumption;
            $abbahafinal = $periodconsumption1*$abbahacost1->cost;
        }
        elseif ($periodconsumption >= 15 and $periodconsumption < 30) {
            $periodconsumption2 = $periodconsumption - 15;
            $abbahafirst = $abbahacost1->cost * 15;
            $abbahasecond = $periodconsumption2 * $abbahacost2->cost;
            $abbahafinal = $abbahafirst + $abbahasecond;
        }
        elseif ($periodconsumption >= 30 and $periodconsumption < 3000) {
            $periodconsumption3 = $periodconsumption - 30;
            $abbahafirst = $abbahacost1->cost * 15;
            $abbahasecond = $abbahacost2->cost * 15;
            $abbahathird = $periodconsumption3 * ($abbahacost3->cost + $uaddedabbaha);
            $abbahafinal = $abbahafirst + $abbahasecond + $abbahathird;
        }
        elseif ($periodconsumption >= 3000) {
            $periodconsumption4 = $periodconsumption - 3000;
            $abbahafirst = $abbahacost1->cost * 15;
            $abbahasecond = $abbahacost2->cost * 15;
            $abbahathird = $abbahacost3->cost * 2970;
            $abbahaforth = $periodconsumption4 * $abbahacost4->cost;
            $abbahafinal = $abbahafirst + $abbahasecond + $abbahathird + $abbahaforth;
        }

        $generalservices = \App\GeneralService::all();
        $specialisedservices = \App\SpecialisedService::where('user_id', $data['user_id'])->get();

        $abonman = \App\Enshabrate::where('enshab', $user->pipediameter)->first();
        $profile = \App\Profile::find($data['user_id']);


        $firstdebtshowbefore = \App\Debt::where('user_id', $data['user_id'])->first();
        if($firstdebtshowbefore->paymentstatus == 'false'){
            $firstdebtshowbeforecost = $firstdebtshowbefore->lastdebt;
        }
        elseif($firstdebtshowbefore->paymentstatus == 'true'){
            $firstdebtshowbeforecost = 0;
        }
        $lastdebt = \App\Debt::where('user_id', $data['user_id'])->where('paymentstatus', 'false')->get();
        $lastdebtcost = $lastdebt->sum('totalcost')+$firstdebtshowbeforecost;

        $haghonezarehn = $periodconsumption * 1150;

        $lastdebtCreatedDate = \App\Debt::where('user_id', $data['user_id'])->latest('created_at')->first();
        $servicesCostCreate = \Carbon\Carbon::parse($lastdebtCreatedDate->created_at);
        $currentDate =date('Y-m-d H:i:s');
        $servicesCostCurrent = \Carbon\Carbon::parse($currentDate);
        $servicesCostDays= $servicesCostCurrent->diffInDays($servicesCostCreate, true);

        $abbahacost = round($abbahafinal);
        $abonmancost = $abonman->cost;
        $daffazelab = round((($abbahacost+$haghonezarehn)*0.65*$usanitationfraction));
        $servicescost = round((($user->metrazh * 2000 * $uservicescostfraction)/365)*$servicesCostDays);

        $specialisedservicescost= $specialisedservices->sum('cost');
        $generalservicescost = $generalservices->sum('cost');
        foreach ($specialisedservices as $specialisedservice){
            $stitleservicespre[] = $specialisedservice->title;
            $scostservicespre[] = $specialisedservice->cost;
        }
        foreach ($generalservices as $generalservice){
            $gtitleservicespre[] =  $generalservice->title;
            $gcostservicespre[] = $generalservice->cost;
        }

        $gtitleservices = serialize($gtitleservicespre);
        $gcostservices = serialize($gcostservicespre);
        $stitleservices = serialize($stitleservicespre);
        $scostservices = serialize($scostservicespre);


        $maliatwithfazelab = round(($abbahacost+$haghonezarehn+$abonmancost+$daffazelab+$abonmancost+$servicescost+$specialisedservicescost+$generalservicescost)*0.09);
        $maliatwithoutfazelab = round(($abbahacost+$haghonezarehn+$abonmancost+$servicescost+$specialisedservicescost+$generalservicescost)*0.09);
        $totalcostwithfazelab = $abbahacost+$haghonezarehn+$abonmancost+$daffazelab+$abonmancost+$servicescost+$specialisedservicescost+$generalservicescost+$maliatwithfazelab;

        $userfinancialinfo = \App\User::where('id', $data['user_id'])->first();

        if ($totalcostwithfazelab < 100000){
            $addedcost1 = 100000 - $totalcostwithfazelab;
            $totalcostwithfazelabfinal = $totalcostwithfazelab+$addedcost1;
            $billtotalcostwith = round($totalcostwithfazelabfinal+$lastdebtcost-$userfinancialinfo->usercredit+$userfinancialinfo->userdebt, -3);
        }
        elseif ($totalcostwithfazelab >= 100000) {
            $totalcostwithfazelabfinal = $totalcostwithfazelab;
            $addedcost1 = 0;
            $billtotalcostwith = round($totalcostwithfazelabfinal+$lastdebtcost-$userfinancialinfo->usercredit+$userfinancialinfo->userdebt, -3);
        }

        $totalcostwithoutfazelab = $abbahacost+$haghonezarehn+$abonmancost+$servicescost+$specialisedservicescost+$generalservicescost+$maliatwithoutfazelab;

        if ($totalcostwithoutfazelab < 100000){
            $addedcost2 = 100000 - $totalcostwithoutfazelab;
            $totalcostwithoutfazelabfinal = $totalcostwithoutfazelab+$addedcost2;
            $billtotalcostwithout = round($totalcostwithoutfazelabfinal+$lastdebtcost-$userfinancialinfo->usercredit+$userfinancialinfo->userdebt, -3);
        }
        elseif ($totalcostwithoutfazelab >= 100000) {
            $totalcostwithoutfazelabfinal = $totalcostwithoutfazelab;
            $addedcost2 = 0;
            $billtotalcostwithout = round($totalcostwithoutfazelabfinal+$lastdebtcost-$userfinancialinfo->usercredit+$userfinancialinfo->userdebt, -3);
        }


        if ($user->sanitation == 'true'){

            \App\Debt::create([
                'user_id' => $data['user_id'],
                'billnumber' => $data['billnumber'],
                'lastcounternumber' => $data['lastcounternumber'],
                'currentcounternumber' => $data['currentcounternumber'],
                'periodconsumption' => $periodconsumption,
                'timefromyear' => $data['timefromyear'],
                'timefrommonth' => $data['timefrommonth'],
                'timefromday' => $data['timefromday'],
                'timetoyear' => $data['timetoyear'],
                'timetomonth' => $data['timetomonth'],
                'timetoday' => $data['timetoday'],
                'paymentdeadlineyear' => $data['paymentdeadlineyear'],
                'paymentdeadlinemonth' => $data['paymentdeadlinemonth'],
                'paymentdeadlineday' => $data['paymentdeadlineday'],
                'abbahacost' => $abbahacost,
                'abonmancost' => $abonmancost,
                'servicescost' => $servicescost,
                'specialisedservicescost' => $specialisedservicescost,
                'generalservicescost' => $generalservicescost,
                'stitleservices' => $stitleservices,
                'scostservices' => $scostservices,
                'gtitleservices' => $gtitleservices,
                'gcostservices' => $gcostservices,
                'maliat' => $maliatwithfazelab,
                'lastdebt' => $lastdebtcost,
                'totalcost' => $totalcostwithfazelabfinal,
                'billtotalcost' => $billtotalcostwith,
                'addedgeneralcost' => $addedcost1,
                'paymentstatus' => $data['paymentstatus'],
            ]);

        }
        elseif ($user->sanitation == 'false'){

            \App\Debt::create([
                'user_id' => $data['user_id'],
                'billnumber' => $data['billnumber'],
                'lastcounternumber' => $data['lastcounternumber'],
                'currentcounternumber' => $data['currentcounternumber'],
                'periodconsumption' => $periodconsumption,
                'timefromyear' => $data['timefromyear'],
                'timefrommonth' => $data['timefrommonth'],
                'timefromday' => $data['timefromday'],
                'timetoyear' => $data['timetoyear'],
                'timetomonth' => $data['timetomonth'],
                'timetoday' => $data['timetoday'],
                'paymentdeadlineyear' => $data['paymentdeadlineyear'],
                'paymentdeadlinemonth' => $data['paymentdeadlinemonth'],
                'paymentdeadlineday' => $data['paymentdeadlineday'],
                'abbahacost' => $abbahacost,
                'abonmancost' => $abonmancost,
                'servicescost' => $servicescost,
                'specialisedservicescost' => $specialisedservicescost,
                'generalservicescost' => $generalservicescost,
                'stitleservices' => $stitleservices,
                'scostservices' => $scostservices,
                'gtitleservices' => $gtitleservices,
                'gcostservices' => $gcostservices,
                'maliat' => $maliatwithoutfazelab,
                'lastdebt' => $lastdebtcost,
                'totalcost' => $totalcostwithoutfazelabfinal,
                'billtotalcost' => $billtotalcostwithout,
                'addedgeneralcost' => $addedcost2,
                'paymentstatus' => $data['paymentstatus'],
            ]);

        }


        $firstdebtshow = \App\Debt::where('user_id', $data['user_id'])->first();
        if($firstdebtshow->paymentstatus == 'false'){
            $firstdebtshowcost = $firstdebtshow->lastdebt;
        }
        elseif($firstdebtshow->paymentstatus == 'true'){
            $firstdebtshowcost = 0;
        }

        $lastdebtshow = \App\Debt::where('user_id', $data['user_id'])->where('paymentstatus', 'false')->where('id', '<=' , $data['user_id'])->get();
        $lastdebtshowcost = $lastdebtshow->sum('totalcost')+$firstdebtshowcost;



        return redirect('/fetchdebtbill/'. $data['user_id']);

    }
}
