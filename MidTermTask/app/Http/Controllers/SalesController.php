<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PhysicalStore;
use App\EcommerceStore;
use App\SocialStore;
use DateTime;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SellRequest;
use App\Http\Requests\ExcelFileRequest;
use App\Exports\PhysicalExportSold;
use App\Exports\PhysicalExportPending;
use App\Imports\PhysicalImport;
use Maatwebsite\Excel\Facades\Excel;



class SalesController extends Controller
{
    //

    public function index(Request $request)
    {
        $info = $this->saleInfoArray();
        return view('sales.index')->with('info',$info);
    }


    public function physical(Request $request)
    {
        return view('sales.physical')->with('info',$this->physicalIndexInfo());
    }

    public function physicalverify(SellRequest $request)
    {

        $newPhysicalStoreSale = new PhysicalStore;
        $newPhysicalStoreSale->customer_name = $request->customer_name;
        $newPhysicalStoreSale->address = $request->address;
        $newPhysicalStoreSale->phone = $request->phone;
        $newPhysicalStoreSale->product_id = $request->product_id;
        $newPhysicalStoreSale->product_name = $request->product_name;
        $newPhysicalStoreSale->unit_price = $request->unit_price;
        $newPhysicalStoreSale->quantity = $request->quantity;
        $newPhysicalStoreSale->total_price = $request->total_price;
        $newPhysicalStoreSale->date_sold = date('Y-m-d');
        $newPhysicalStoreSale->payment_type = $request->payment_type;
        $newPhysicalStoreSale->status = 'sold';
        $newPhysicalStoreSale->save();

        $request->session()->flash('successMsg',"Entry Added!");

        return Back();
    }



    public function physicalLogs(Request $request)
    {

        return view('sales.physicallogs');
    }
    public function physicalLogsStore(ExcelFileRequest $request)
    {
        if(Excel::import(new PhysicalImport,$request->file))
        {
            $request->session()->flash('successMsg','Excel File Inserted Sucessfully');
        }
        else
        {
            $request->session()->flash('errMsg','Excel Insertion Failed');
            
        }
        return redirect()->route('sales.physical');
    }
    public function physicalLogsSold(Request $request)
    {
        return Excel::download(new PhysicalExportSold, 'MonthlyReportSold.xlsx');
        
    }
    public function physicalLogsPending(Request $request)
    {
        return Excel::download(new PhysicalExportPending, 'MonthlyReportPending.xlsx');
        
    }
    public function ecommerce(Request $request)
    {
        return view('sales.ecommerce');
    }
    public function social(Request $request)
    {
        return view('sales.social');
    }

    public function physicalIndexInfo()
    {
        $info = $this->saleInfoArray();

        $maxSoldProduct = DB::select(DB::raw("Select product_id,sum(quantity) from physical_store_channel GROUP BY product_id ORDER BY sum(quantity) DESC limit 1"))[0];
        
        $mostSoldProduct = PhysicalStore::select('product_name')
                        ->where('product_id',$maxSoldProduct->product_id)
                        ->first();

                        
        $averageAmountList = DB::select(DB::raw("SELECT sum(total_price) as avgprice from physical_store_channel where Month(date_sold) = Month(CURRENT_DATE) GROUP by date_sold"));
        
        
        $totalPrice = 0;
        $count = 0;
        foreach($averageAmountList as $average)
        {
            $count =$count+1;
            $totalPrice = $totalPrice+ intval($average->avgprice);
        }
        $averageAmount = $totalPrice/$count;
                        
        $physicalIndexInfo = ['pToday'=>$info['pToday'],'pSeven'=>$info['pSeven'],'bestProduct'=>$mostSoldProduct->product_name,'average'=>$averageAmount];

        return $physicalIndexInfo;
    }

    public function saleInfoArray()
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


        return ['pToday'=> $pToday , 'pSeven' => $pSeven ,'eToday'=>$eToday , 'eSeven'=>$eSeven , 'sToday'=>$sToday, 'sSeven'=>$sSeven];
    }
}
