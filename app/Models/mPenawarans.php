<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mPenawarans extends Model
{
    // use HasFactory;
    protected $table = 'tender';
    protected $keyType = 'integer';
    protected $primaryKey = 'tender_id';
    const CREATED_AT = 'created';
    const UPDATED_AT = 'created';
    protected $fillable = [
        'project_name'
    ];
}
