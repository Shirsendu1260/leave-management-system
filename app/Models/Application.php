<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $table = 'applications';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'from',
        'to',
        'day',
        'reason',
        'approved',
        'uid',
    ];
}
