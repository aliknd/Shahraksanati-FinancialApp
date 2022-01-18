<?php

namespace App\Http\Controllers;

use App\Payment;
use App\User;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{

    public function create()
    {
        return view('payments.pcreate');
    }

    public function createtable(User $userid)
    {
        $user = $userid->id;
        return view('payments.pcreatetable', compact('user'));
    }

    public function store()
    {
        $data = request()->validate([
            'user_id' => 'required',
            'billnumber' => 'required',
            'totalcost' => 'required',
            'maintotalcost' => 'required',
            'discount' => 'required',
            'descriptiondis' => 'required',
            'ordercode' => 'required',
            'paymentyear' => '',
            'paymentmonth' => '',
            'paymentday' => '',
            'debtyear' => '',
            'debtmonth' => '',
            'debtday' => '',
        ]);

        \App\Payment::create([
            'user_id' => $data['user_id'],
            'billnumber' => $data['billnumber'],
            'totalcost' => $data['totalcost'],
            'maintotalcost' => $data['maintotalcost'],
            'discount' => $data['discount'],
            'descriptiondis' => $data['descriptiondis'],
            'ordercode' => $data['ordercode'],
            'paymentyear' => $data['paymentyear'],
            'paymentmonth' => $data['paymentmonth'],
            'paymentday' => $data['paymentday'],
            'debtyear' => $data['debtyear'],
            'debtmonth' => $data['debtmonth'],
            'debtday' => $data['debtday'],
        ]);

        $result = \App\Debt::where('user_id', $data['user_id'])->where('billnumber', $data['billnumber'])->first()->update(array('paymentstatus' => 'true'));
        $resultpayment = \App\Debt::where('user_id', $data['user_id'])->where('billnumber', $data['billnumber'])->first()->update(array('paymentvalue' => $data['totalcost']));
        $resultpdiscount = \App\Debt::where('user_id', $data['user_id'])->where('billnumber', $data['billnumber'])->first()->update(array('paymentdiscount' => $data['discount']));

        $result2 = \App\Debt::where('user_id', $data['user_id'])->where('billnumber', $data['billnumber'])->first();

        $result3 = \App\Debt::where('user_id', $data['user_id'])->where('id', '<', $result2->id)->update(array('paymentstatus' => 'true'));

        if ($data['totalcost']+$data['discount']==$data['maintotalcost']){
            $userdebt = 0;
            $usercredit = 0;
        }
        elseif ($data['totalcost']+$data['discount'] > $data['maintotalcost']){
            $usercredit = -($data['maintotalcost'] - ($data['totalcost']+$data['discount']));
            $userdebt = 0;
        }
        elseif ($data['totalcost']+$data['discount'] < $data['maintotalcost']){
            $userdebt = $data['maintotalcost'] - ($data['totalcost']+$data['discount']);
            $usercredit = 0;
        }

        $userfdata = \App\User::where('id', $data['user_id'])->first();
        $usercredit1 = $userfdata->usercredit;
        $userdebt1 = $userfdata->userdebt;

        $usercreditfinal = $usercredit + $usercredit1;
        $userdebtfinal = $userdebt + $userdebt1;
        \App\User::where('id', $data['user_id'])->update(array('userdebt' => $userdebtfinal, 'usercredit' => $usercreditfinal));;

        return view('payments.pmessage', compact('data'));

    }

    public function retrieve()
    {
        return view('payments.paymentretrieve');
    }

    public function retrieveprocess()
    {
        $data = request()->validate([
            'user_id' => 'required',
            'pyear' => 'required',
        ]);

        $payments = \App\Payment::where('user_id', $data['user_id'])->where('paymentyear', $data['pyear'])->get();
        $userinfo = \App\User::where('id', $data['user_id'])->first();

        return view('payments.paymentsretrievepage', compact('payments', 'userinfo'));
    }

    public function fetch()
    {
        $data = request()->validate([
            'user_id' => 'required',
            'billnumber' => 'required',
        ]);

        $firstdebtshow = \App\Debt::where('user_id', $data['user_id'])->first();
        if($firstdebtshow->paymentstatus == 'false'){
            $firstdebtshowcost = $firstdebtshow->lastdebt;
        }
        elseif($firstdebtshow->paymentstatus == 'true'){
            $firstdebtshowcost = 0;
        }

        $payment = \App\Debt::where('user_id', $data['user_id'])->where('billnumber', $data['billnumber'])->first();

        $lastdebtshow = \App\Debt::where('user_id', $data['user_id'])->where('paymentstatus', 'false')->where('id', '<' , $payment->id)->get();
        $lastdebtshowcost = $lastdebtshow->sum('totalcost')+$firstdebtshowcost;

        return view('payments.pfetch', compact('payment', 'lastdebtshowcost'));
    }
}
