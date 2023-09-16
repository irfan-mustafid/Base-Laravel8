<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mPenawaran extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_transaksi';

    public function toPenawaran()
    {
        return $this->hasOne(tender::class, 'tender_id', 'id');
    }
}
