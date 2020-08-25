<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'login_no', 'ref', 'remark', 'bin', 'bin_name', 'contact', 'work_month', 'work_type', 'address', 'email',
    ];

    public function category(){
        return $this->belongsTo('App\Category');
    }
}
