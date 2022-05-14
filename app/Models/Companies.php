<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    use HasFactory;

    protected $fillable = ['site_url', 'user_id', 'company_name', 'status'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function package()
    {
        return $this->belongsTo(CompanyPackages::class);
    }

    public function payments()
    {
        return $this->hasMany(CompanyPayments::class);
    }

}
