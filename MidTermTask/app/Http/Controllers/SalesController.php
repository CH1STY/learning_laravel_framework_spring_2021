<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PhysicalStore;
use App\EcommerceStore;
use App\SocialStore;
use DateTime;
class SalesController extends Controller
{
    //

    public function index(Request $request)
    {

        $weekDate = (new DateTime(date('Y-m-d')))->modify('-7 day')->format('Y-m-d');
        $todaysDate = date('Y-m-d');

        $pSeven = PhysicalStore::where('date_sold','>=',$weekDate)
                                            ->where('date_sold','<=',$todaysDate)
                                            ->sum('quantity');

        $pToday = PhysicalStore::where('date_sold','=',$todaysDate)
                                        ->sum('quantity');

        $eSeven = EcommerceStore::where('date_sold','>=',$weekDate)
                                            ->where('date_sold','<=',$todaysDate)
                                            ->sum('quantity');

        $eToday = EcommerceStore::where('date_sold','=',$todaysDate)
                                        ->sum('quantity');

        $sSeven = SocialStore::where('date_sold','>=',$weekDate)
                                            ->where('date_sold','<=',$todaysDate)
                                            ->sum('quantity');

        $sToday = SocialStore::where('date_sold','=',$todaysDate)
                                        ->sum('quantity');


        $info = ['pToday'=> $pToday , 'pSeven' => $pSeven ,'eToday'=>$eToday , 'eSeven'=>$eSeven , 'sToday'=>$sToday, 'sSeven'=>$sSeven];

        return view('sales.index')->with('info',$info);
    }


    public function ecommerce(Request $request)
    {
        return view('sales.ecommerce');
    }
    public function physical(Request $request)
    {
        return view('sales.physical');
    }
    public function social(Request $request)
    {
        return view('sales.social');
    }
}
