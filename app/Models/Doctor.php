<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'section_id',
    ];

    public function section(){
        return $this->belongsTo(Section::class);
    }

    public function paients(){
        return $this->belongsToMany(Paient::class,'doctor_paients');
    }
}
