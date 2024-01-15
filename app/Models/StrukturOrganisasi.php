<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class StrukturOrganisasi extends Model
{
    use HasFactory;

    protected $table = 'organisasi';
    protected $primaryKey = 'no';
    public $timestamps = false;

    public function __construct()
    {
        
    }
}
