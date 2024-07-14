<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mAllJaminan extends Model
{
    // use HasFactory;
    protected $table = 'permohonans';
    protected $keyType = 'integer';
    protected $primaryKey = 'id';

    public function toBowheerList()
    {
        return $this->hasOne(mBowheerList::class, 'bowheer_list_id', 'bowheer_vendor_id');
    }
}
