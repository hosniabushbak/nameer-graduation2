<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\HouseOwner;
use App\Models\StudentCourse;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['house_owners'] = HouseOwner::orderBy('id', 'DESC')->active()->get();

        dd($house_owners);
        return view('admin.home.index', $data);
    }
}
