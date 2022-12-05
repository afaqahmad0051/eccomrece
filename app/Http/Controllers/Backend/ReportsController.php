<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use DateTime;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function ReportView()
    {
        return view('backend.report.report_view');
    }

    public function SearchByDateReport(Request $request)
    {
        $date = new DateTime($request->date);
        $formateDate = $date->format('d F Y');
        // return $formateDate;
        $orders = Order::where('order_date',$formateDate)->latest()->get();
        return view('backend.report.date_report_view',compact('orders'));
    }

    public function SearchByMonthReport(Request $request)
    {
        $orders = Order::where('order_month',$request->month)->where('order_year',$request->year_name)->latest()->get();
        return view('backend.report.date_report_view',compact('orders'));
    }

    public function SearchByYearReport(Request $request)
    {
        $orders = Order::where('order_year',$request->year)->latest()->get();
        return view('backend.report.date_report_view',compact('orders'));
    }
}
