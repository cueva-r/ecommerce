<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SMTPModel extends Model
{
    use HasFactory;

    protected $table = "smtp";

    static public function getSingle()
    {
        return self::find(1);
    }
}
