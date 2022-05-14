<?php

namespace App\Observers;

use App\Models\Companies;
use Illuminate\Support\Facades\Http;

class CompaniesObserver
{
    /**
     * Handle the Companies "created" event.
     *
     * @param \App\Models\Companies $companies
     * @return void
     */
    public function created(Companies $companies)
    {
        $response = Http::post(url('/log'), [
            'table' => 'company',
            'type' => 'created',
            'data' => $companies->company_name,
        ]);
    }

    /**
     * Handle the Companies "updated" event.
     *
     * @param \App\Models\Companies $companies
     * @return void
     */
    public function updated(Companies $companies)
    {
        //
    }

    /**
     * Handle the Companies "deleted" event.
     *
     * @param \App\Models\Companies $companies
     * @return void
     */
    public function deleted(Companies $companies)
    {
        //
    }

    /**
     * Handle the Companies "restored" event.
     *
     * @param \App\Models\Companies $companies
     * @return void
     */
    public function restored(Companies $companies)
    {
        //
    }

    /**
     * Handle the Companies "force deleted" event.
     *
     * @param \App\Models\Companies $companies
     * @return void
     */
    public function forceDeleted(Companies $companies)
    {
        //
    }
}
