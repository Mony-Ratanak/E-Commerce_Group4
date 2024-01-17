<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function getbrandid(Request $request){
        $brandIds = Brand::pluck('id')->toArray();
        return response()->json($brandIds);
    }
}
