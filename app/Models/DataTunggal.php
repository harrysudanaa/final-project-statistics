<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTunggal extends Model
{
    use HasFactory;
    protected $table = 'data_tunggal';
    protected $fillable = ['score'];
}
