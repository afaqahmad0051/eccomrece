<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ShippingArea;
use App\Models\ShippingDistrict;
use App\Models\ShippingDivision;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShippingAreaController extends Controller
{
    public function DivisionView()
    {
        $divisons = ShippingDivision::orderBy('id','DESC')->get();
        return view('backend.shipping.division.view_division', compact('divisons'));
    }

    public function DivisionStore(Request $request)
    {
        $request->validate([
            'division_name' => 'required',
        ]);
        ShippingDivision::insert([
            'division_name' => $request->division_name,
        ]);
        $notification = array(
            'message' => 'Country Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function DivisionEdit($id)
    {
        $divisons = ShippingDivision::findOrFail($id);
        return view('backend.shipping.division.edit_division', compact('divisons'));
    }

    public function DivisonUpdate(Request $request, $id)
    {
        ShippingDivision::findOrFail($id)->update([
            'division_name' => $request->division_name,
        ]);
        $notification = array(
            'message' => 'Country Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('manage-division')->with($notification);
    }

    public function DivisionDelete($id)
    {
        $city = ShippingDistrict::where('division_id', $id)->first();
        if ($city == null) {
            $country = ShippingDivision::where('id', $id)->first();
            $country->delete();
            $notification = array(
                'message' => 'Country Deleted',
                'alert-type' => 'success'
            );
            return redirect()->route('manage-division')->with($notification);
        } else {
            $notification = array(
                'message' => 'Cannot Delete Country',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }


    //Disctrict Start
    public function DistrictView()
    {
        $divisions = ShippingDivision::orderBy('division_name','ASC')->get();
        $districts = ShippingDistrict::with('division')->orderBy('id','DESC')->get();
        return view('backend.shipping.district.view_district', compact('districts','divisions'));
    }

    public function DistrictStore(Request $request)
    {
        $request->validate([
            'division_id' => 'required',
            'district_name' => 'required',
        ]);
        ShippingDistrict::insert([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
        ]);
        $notification = array(
            'message' => 'City Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function DistrictEdit($id)
    {
        $divisions = ShippingDivision::orderBy('division_name','ASC')->get();
        $districts = ShippingDistrict::findOrFail($id);
        return view('backend.shipping.district.edit_district', compact('districts','divisions'));
    }

    public function DistrictUpdate(Request $request, $id)
    {
        ShippingDistrict::findOrFail($id)->update([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'City Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('manage-district')->with($notification);
    }

    public function DistrictDelete($id)
    {
        // $city = ShippingDistrict::where('division_id', $id)->first();
        // if ($city == null) {
            $city = ShippingDistrict::where('id', $id)->first();
            $city->delete();
            $notification = array(
                'message' => 'City Deleted',
                'alert-type' => 'success'
            );
            return redirect()->route('manage-district')->with($notification);
        // } else {
        //     $notification = array(
        //         'message' => 'Cannot Delete Country',
        //         'alert-type' => 'error'
        //     );
        //     return redirect()->back()->with($notification);
        // }
    }

    public function AreaView()
    {
        $divisions = ShippingDivision::orderBy('division_name','ASC')->get();
        $districts = ShippingDistrict::orderBy('district_name','ASC')->get();
        $areas = ShippingArea::with('division','district')->orderBy('id','DESC')->get();
        return view('backend.shipping.area.view_area', compact('areas','divisions','districts'));
    }

    public function GetAreaByCity($division_id)
    {
        $districts = ShippingDistrict::where('division_id', $division_id)->orderBy('district_name','ASC')->get();
        return json_encode($districts);
    }

    public function AreaStore(Request $request)
    {
        $request->validate([
            'division_id' => 'required',
            'district_id' => 'required',
            'area_name' => 'required',
        ]);
        ShippingArea::insert([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'area_name' => $request->area_name,
        ]);
        $notification = array(
            'message' => 'Area Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function AreaEdit($id)
    {
        $divisions = ShippingDivision::orderBy('division_name','ASC')->get ();
        $districts = ShippingDistrict::orderBy('district_name','ASC')->get ();
        $areas = ShippingArea::findOrFail($id);
        return view('backend.shipping.area.area_edit',compact('divisions','districts','areas'));
    }

    public function AreaUpdate(Request $request, $id)
    {
        ShippingArea::findOrFail($id)->update([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'area_name' => $request->area_name,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Area Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('manage-area')->with($notification);
    }

    public function AreaDelete($id)
    {
            $area = ShippingArea::where('id', $id)->first();
            $area->delete();
            $notification = array(
                'message' => 'Area Deleted',
                'alert-type' => 'success'
            );
            return redirect()->route('manage-area')->with($notification);
    }

    // public function getAreasByCity(Request $request, $district_id){
    //     $data = [];
    //     $data['area'] = ShippingArea::where('district_id',$district_id)->get();
    //     dd($data['area']->toArray());
    //     return response()->json($data);
    // }

    public function getAreasByCity(Request $request){
        $data = [];
        DB::beginTransaction();
        try{
            $data['area'] = ShippingArea::where('district_id',$request->city_id)->get();

        }catch (Exception $e) {
            DB::rollback();
            return response()->json(['status'=>'error', 'data'=>$data, 'message'=>'Something is wrong'], 203);
        }
        DB::commit();
        return response()->json(['status'=>'success', 'data'=>$data, 'message'=>'Successfully'], 200);
    }

}
