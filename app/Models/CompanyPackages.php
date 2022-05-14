<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyPackages extends Model
{
    use HasFactory;

    protected $fillable = ['company_id', 'package_id', 'start_date', 'end_date'];

    public function company()
    {
        return $this->belongsTo(Companies::class);
    }

    public function package()
    {
        return $this->belongsTo(Packages::class);
    }
}
