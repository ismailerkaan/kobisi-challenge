<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CallBackController extends Controller
{
    public function index(Request $request)
    {
        $log = Log::insert([
            'table' => $request->table,
            'type' => $request->type,
            'data' => $request->data,
            'created_at' => Carbon::now()
        ]);
    }
}
