<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recommend extends Model
{
    protected $table = 'recommend';

    protected $fillable = [
        'id_product',
        'id_customer',
        'name',
        'email',
        'cpf',
        'status'
    ];

}
