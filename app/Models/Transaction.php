<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Transaction extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ['id'];
    protected $dates = ['date_taken'];

    public function member(){
        return $this->belongsTo(Member::class);
    }

    public function detail_transactions(){
        return $this->hasMany(DetailTransaction::class);
    }

    public function getTotal() {
        $total = 0;

        foreach ($this->detail_transactions as $detail) {
            $total += $detail->package->price * $detail->qty;
        }

        return $total;
    }

}
