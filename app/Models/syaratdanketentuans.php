<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class syaratdanketentuans extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','judulsyarat','deskripsisyarat'];
}