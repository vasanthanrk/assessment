<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'logo', 'website', 'email'];

    public function employee()
    {
        return $this->hasOne('App\Models\Employee', 'id', 'company');
    }
}
