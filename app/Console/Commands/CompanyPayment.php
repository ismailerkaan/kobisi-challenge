<?php

namespace App\Console\Commands;

use App\Jobs\PaymentJobs;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CompanyPayment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'package:payment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Lisans süresi bitmiş firmaların ödemelerini çeker';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $data = DB::table('companies')
            ->select(

                'companies.id as companies_id',
                'companies.company_name as companies_name',
                'company_packages.id as companyPackages_id',
                'company_packages.start_date as companyPackages_start',
                'company_packages.end_date as companyPackages_end',
                'company_payments.status as companyPayments_id'
            )
            ->leftJoin('company_packages', 'company_packages.company_id', 'companies.id')
            ->leftJoin('company_payments', 'company_payments.company_id', 'company_packages.company_id')
            ->where([
                ['company_packages.end_date', '<=', Carbon::now()]],
                ['companies.status', 'active']
            )
            ->get();


        foreach ($data as $row) {
            PaymentJobs::dispatch($row);
        }
        return 1;
    }
}
