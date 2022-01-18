<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LiveSearch extends Controller
{
    function index()
    {
        return view('admin.admin');
    }

    function indexphase1()
    {
        return view('admin.admin1');
    }

    function indexphase2()
    {
        return view('admin.admin2');
    }

    function indexphase3()
    {
        return view('admin.admin3');
    }

    function action(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data = DB::table('users')
                    ->where('name', 'like', '%'.$query.'%')
                    ->orwhere('sharednumber', 'like', '%'.$query.'%')
                    ->orwhere('telephone', 'like', '%'.$query.'%')
                    ->orWhere('metrazh', 'like', '%'.$query.'%')
                    ->orWhere('pipediameter', 'like', '%'.$query.'%')
                    ->orWhere('email', 'like', '%'.$query.'%')
                    ->orWhere('sanitation', 'like', '%'.$query.'%')
                    ->orWhere('phase', 'like', '%'.$query.'%')
                    ->orderBy('id', 'desc')
                    ->get();

            }
            else
            {
                $data = DB::table('users')
                    ->orderBy('id', 'desc')
                    ->get();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $dataTelephone = DB::table('profiles')->where('user_id', $row->id)->first();
                    $telephone = $dataTelephone->telephone;

                    $falseDebts = DB::table('debts')->where('user_id', $row->id)->where('paymentstatus', 'false')->get();
                    $falseDebtsCount = count($falseDebts);
                if ($row->sanitation == 'true'){
                        $sanit = 'دارد';
                    }
                    elseif ($row->sanitation !== 'true'){
                        $sanit = 'ندارد';
                    }
                    $output .= '
        <tr>
         <td>'.$row->id.'</td>
         <td>'.$row->name.'</td>
         <td>'.$row->sharednumber.'</td>
         <td>'.$row->telephone.'</td>
         <td>'.$row->metrazh.'</td>
         <td>'.$row->pipediameter.'</td>
         <td>'.$row->email.'</td>
         <td>'. $sanit.'</td>
         <td>'.$row->phase.'</td>
         <td><a href="/newdebt/'.$row->id.'">صدور قبض جدید</a></td>
         <td><a href="/p/createtable/'.$row->id.'">صدور دستی پرداخت</a></td>
         <td><a href="/fetchdebtbill/'.$row->id.'">فراخوانی قبض</a></td>
         <td>'. $falseDebtsCount.'</td>
         <td><a href="/userfeatures/'.$row->id.'/edit">ویرایش کاربر</a></td>
        </tr>
        ';
                }
            }
            else
            {
                $output = '
       <tr>
        <td align="center" colspan="5">هیچ اطلاعاتی یافت نشد</td>
       </tr>
       ';
            }
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );

            echo json_encode($data);
        }
    }

    function action1(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data = DB::table('users')->where('phase', 'فاز 1')
                    ->where('name', 'like', '%'.$query.'%')
                    ->orwhere('sharednumber', 'like', '%'.$query.'%')
                    ->orwhere('telephone', 'like', '%'.$query.'%')
                    ->orWhere('metrazh', 'like', '%'.$query.'%')
                    ->orWhere('pipediameter', 'like', '%'.$query.'%')
                    ->orWhere('email', 'like', '%'.$query.'%')
                    ->orWhere('sanitation', 'like', '%'.$query.'%')
                    ->orWhere('phase', 'like', '%'.$query.'%')
                    ->orderBy('name', 'asc')
                    ->get();

            }
            else
            {
                $data = DB::table('users')->where('phase', 'فاز 1')
                    ->orderBy('name', 'asc')
                    ->get();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $dataTelephone = DB::table('profiles')->where('user_id', $row->id)->first();
                    $telephone = $dataTelephone->telephone;

                    $falseDebts = DB::table('debts')->where('user_id', $row->id)->where('paymentstatus', 'false')->get();
                    $falseDebtsCount = count($falseDebts);

                    if ($row->sanitation == 'true'){
                        $sanit = 'دارد';
                    }
                    elseif ($row->sanitation !== 'true'){
                        $sanit = 'ندارد';
                    }
                    $output .= '
        <tr>
         <td>'.$row->id.'</td>
         <td>'.$row->name.'</td>
         <td>'.$row->sharednumber.'</td>
         <td>'.$row->telephone.'</td>
         <td>'.$row->metrazh.'</td>
         <td>'.$row->pipediameter.'</td>
         <td>'.$row->email.'</td>
         <td>'. $sanit.'</td>
         <td>'.$row->phase.'</td>
         <td><a href="/newdebt/'.$row->id.'">صدور قبض جدید</a></td>
         <td><a href="/p/createtable/'.$row->id.'">صدور دستی پرداخت</a></td>
         <td><a href="/fetchdebtbill/'.$row->id.'">فراخوانی قبض</a></td>
         <td>'. $falseDebtsCount.'</td>
         <td><a href="/userfeatures/'.$row->id.'/edit">ویرایش کاربر</a></td>
        </tr>
        ';
                }
            }
            else
            {
                $output = '
       <tr>
        <td align="center" colspan="5">هیچ اطلاعاتی یافت نشد</td>
       </tr>
       ';
            }
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );

            echo json_encode($data);
        }
    }

    function action2(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data = DB::table('users')->where('phase', 'فاز 2')
                    ->where('name', 'like', '%'.$query.'%')
                    ->orwhere('sharednumber', 'like', '%'.$query.'%')
                    ->orwhere('telephone', 'like', '%'.$query.'%')
                    ->orWhere('metrazh', 'like', '%'.$query.'%')
                    ->orWhere('pipediameter', 'like', '%'.$query.'%')
                    ->orWhere('email', 'like', '%'.$query.'%')
                    ->orWhere('sanitation', 'like', '%'.$query.'%')
                    ->orWhere('phase', 'like', '%'.$query.'%')
                    ->orderBy('name', 'asc')
                    ->get();

            }
            else
            {
                $data = DB::table('users')->where('phase', 'فاز 2')
                    ->orderBy('name', 'asc')
                    ->get();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $dataTelephone = DB::table('profiles')->where('user_id', $row->id)->first();
                    $telephone = $dataTelephone->telephone;

                    $falseDebts = DB::table('debts')->where('user_id', $row->id)->where('paymentstatus', 'false')->get();
                    $falseDebtsCount = count($falseDebts);

                    if ($row->sanitation == 'true'){
                        $sanit = 'دارد';
                    }
                    elseif ($row->sanitation !== 'true'){
                        $sanit = 'ندارد';
                    }
                    $output .= '
        <tr>
         <td>'.$row->id.'</td>
         <td>'.$row->name.'</td>
         <td>'.$row->sharednumber.'</td>
         <td>'.$row->telephone.'</td>
         <td>'.$row->metrazh.'</td>
         <td>'.$row->pipediameter.'</td>
         <td>'.$row->email.'</td>
         <td>'. $sanit.'</td>
         <td>'.$row->phase.'</td>
         <td><a href="/newdebt/'.$row->id.'">صدور قبض جدید</a></td>
         <td><a href="/p/createtable/'.$row->id.'">صدور دستی پرداخت</a></td>
         <td><a href="/fetchdebtbill/'.$row->id.'">فراخوانی قبض</a></td>
         <td>'. $falseDebtsCount.'</td>
         <td><a href="/userfeatures/'.$row->id.'/edit">ویرایش کاربر</a></td>
        </tr>
        ';
                }
            }
            else
            {
                $output = '
       <tr>
        <td align="center" colspan="5">هیچ اطلاعاتی یافت نشد</td>
       </tr>
       ';
            }
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );

            echo json_encode($data);
        }
    }

    function action3(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data = DB::table('users')->where('phase', 'فاز 3')
                    ->where('name', 'like', '%'.$query.'%')
                    ->orwhere('sharednumber', 'like', '%'.$query.'%')
                    ->orwhere('telephone', 'like', '%'.$query.'%')
                    ->orWhere('metrazh', 'like', '%'.$query.'%')
                    ->orWhere('pipediameter', 'like', '%'.$query.'%')
                    ->orWhere('email', 'like', '%'.$query.'%')
                    ->orWhere('sanitation', 'like', '%'.$query.'%')
                    ->orWhere('phase', 'like', '%'.$query.'%')
                    ->orderBy('name', 'asc')
                    ->get();

            }
            else
            {
                $data = DB::table('users')->where('phase', 'فاز 3')
                    ->orderBy('name', 'asc')
                    ->get();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $dataTelephone = DB::table('profiles')->where('user_id', $row->id)->first();
                    $telephone = $dataTelephone->telephone;

                    $falseDebts = DB::table('debts')->where('user_id', $row->id)->where('paymentstatus', 'false')->get();
                    $falseDebtsCount = count($falseDebts);

                    if ($row->sanitation == 'true'){
                        $sanit = 'دارد';
                    }
                    elseif ($row->sanitation !== 'true'){
                        $sanit = 'ندارد';
                    }
                    $output .= '
        <tr>
         <td>'.$row->id.'</td>
         <td>'.$row->name.'</td>
         <td>'.$row->sharednumber.'</td>
         <td>'.$row->telephone.'</td>
         <td>'.$row->metrazh.'</td>
         <td>'.$row->pipediameter.'</td>
         <td>'.$row->email.'</td>
         <td>'. $sanit.'</td>
         <td>'.$row->phase.'</td>
         <td><a href="/newdebt/'.$row->id.'">صدور قبض جدید</a></td>
         <td><a href="/p/createtable/'.$row->id.'">صدور دستی پرداخت</a></td>
         <td><a href="/fetchdebtbill/'.$row->id.'">فراخوانی قبض</a></td>
         <td>'. $falseDebtsCount.'</td>
         <td><a href="/userfeatures/'.$row->id.'/edit">ویرایش کاربر</a></td>
        </tr>
        ';
                }
            }
            else
            {
                $output = '
       <tr>
        <td align="center" colspan="5">هیچ اطلاعاتی یافت نشد</td>
       </tr>
       ';
            }
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );

            echo json_encode($data);
        }
    }
}
