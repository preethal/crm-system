<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Client extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $table = 'clients';
     protected $fillable = [
        'name', 'details','email','file'
    ];


   // Mutator & Accessor

   public function setEmailAttribute($value)
    {
        $this->attributes['email']= strtolower($value);
    }

    public function getNameAttribute($name)
    {
        return ucfirst($name);
    }

   

}
