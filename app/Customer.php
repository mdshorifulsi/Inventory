<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
     protected $fillable = [
        'name','email','phone','Address','shopname','photo','account_holder','account_number','bank_name','bank_branch'
    ];

}
