<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function gerCompanyName(){
        return $this->hasOne('App\Models\Company', 'id', 'company_id');
    }
}
