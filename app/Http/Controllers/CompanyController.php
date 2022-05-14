<?php

namespace App\Http\Controllers;

use App\Http\Requests\SetPackageRequest;
use App\Models\Companies;
use App\Models\CompanyPackages;
use App\Models\Packages;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{

    public function setPackage(SetPackageRequest $request)
    {
        $data = $request->validated();
        $carbon = new Carbon();
        $package = Packages::findOrFail($request->package_id);
        $company = Companies::findOrFail($request->company_id);
        $startDate = $carbon->now()->format('Y:m:d H.i.s');
        $endDate = "";

        if ($package->period == "yearly") {
            $endDate = $carbon->now()->addYear(1)->format('Y:m:d H.i.s');
        } else {
            $endDate = $carbon->now()->addMonth(1)->format('Y:m:d H.i.s');
        }

        $data['start_date'] = $startDate;
        $data['end_date'] = $endDate;

        $companyPackages = CompanyPackages::create($data);

        return response()->json([
            'package' => $package,
            'start_date' => $startDate,
            'end_date' => $endDate
        ], 200);
    }

    public function checkCompanyPackage()
    {
        $user = Auth::user()->id;
        $data = CompanyPackages::with('company', 'package', 'company.payments')->whereHas('company', function ($query) use ($user) {
            $query->where('user_id', $user);
        })->get();
    }
}
