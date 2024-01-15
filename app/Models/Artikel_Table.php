<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel_Table extends Model
{
    protected $table = 'artikel';
    protected $primaryKey = 'no';
    public $timestamps = false;

    public function __construct()
    {
    }
}
