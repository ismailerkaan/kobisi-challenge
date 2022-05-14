<?php

namespace App\Jobs;

use App\Models\Companies;
use App\Models\CompanyPayments;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PaymentJobs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;
    public $companyPackages;
    private $retryAfter = 1;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($companyPackages)
    {
        $this->companyPackages = $companyPackages;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $hash = rand(1, 99999);
        $payment = $hash % 2 == 0 ? 'success' : 'error';

        $companyPayment = CompanyPayments::insert([
            'company_id' => $this->companyPackages->companies_id,
            'package_id' => $this->companyPackages->companyPackages_id,
            'status' => $payment,
            'created_at' => Carbon::now()
        ]);

        if ($payment == 'error') {
            if ($this->attempts() >= 3) {
                $company = Companies::where('id', $this->companyPackages->companies_id);
                $company->status = "passive";
                $company->save();
            } else {
                $this->release($this->retryAfter);
            }
        }

    }
}
