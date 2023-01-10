<?php

namespace App\Models;

use App\Models\User;
use Alfa6661\AutoNumber\AutoNumberTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use AutoNumberTrait;
    public function getAutoNumberOptions()
    {
        return [
            'id_artikel' => [
                'format' => 'Art?', // autonumber format. '?' will be replaced with the generated number.
                'length' => 3 // The number of digits in an autonumber
            ]
        ];
    }
    use HasFactory;

    protected $table='artikel';
    protected $guarded=[];

    public function User()
    {
        return $this->belongsTo(User::class,'id_user');
    }
}
