<?php

namespace Abdazz\GovPayClient\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;

    public $fillable= ["ref", "email", "montant"];
}
