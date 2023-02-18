<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
  use HasFactory;

  protected $table = 'PESSOA';
  protected $primaryKey = 'pes_id';
  protected $fillable = ['pes_nom', 'pes_datcad'];

  protected $dateFormat = 'U';
}
