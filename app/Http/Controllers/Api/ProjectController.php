<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function index(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'money' => 'required',
            'sphere_id' => 'required',
        ]);


        if ($validator->fails()) {
            return response()->json("Error");
        } else {

            $sql = "select p.id                                                        as project_id,
       p.overall_price                                             as project_sum,
       case when sum(i.price) is null then 0 else sum(i.price) end as sobrannie_dengi,
       (p.overall_price - case when sum(i.price) is null then 0 else sum(i.price) end)                            as ostalos,
       p.year_profit                                               as godovoy_dohod_za_odin_procent,
       (p.overall_price - case when sum(i.price) is null then 0 else sum(i.price) end) * 100 / p.overall_price    as ostalos_procentov,
       $request->money * 100 / p.overall_price                                 as vawi_dengi_procentah_projecta,
       $request->money * 100 / p.overall_price * p.year_profit                 as skolko_poluchite,
       YEAR(P.end_date) - year(now())                              as god

from projects p
       left join investments i on p.id = i.project_id
where p.sphere_id = $request->sphere_id
group by p.id, p.overall_price
having ostalos > 0
   and god > 0;";
            $data = DB::select($sql);
            return response()->json($data);
        }

    }

}
