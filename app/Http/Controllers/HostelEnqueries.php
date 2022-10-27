<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hostel_Enqurie;

class HostelEnqueries extends Controller
{
      public function getEnqueries(){
            return  Hostel_Enqurie::all();
    }
}
