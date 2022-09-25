<?php

namespace App\Http\Controllers;

use App\Http\Requests\Statistic;
use App\Models\Work;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    function index(Statistic $request)
    {
        $result = Work::select(['wo','work_date',DB::raw('sum(`parts_cost`) as total_cost'),DB::raw('group_concat(payment SEPARATOR \' , \') as payments')])
            ->when($request['work_date'],function ($query) use ($request){
                $query->whereDate('work_date',$request['work_date']);
            })
            ->groupBy(['work_date','wo'])
            ->having(DB::raw('sum(`parts_cost`)'),'>','1000')
            ->get();
        return response()->json(['data' => $result]);
    }
}
