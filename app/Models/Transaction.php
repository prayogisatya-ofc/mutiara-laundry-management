<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function member(){
        return $this->belongsTo(Member::class);
    }

    public function detail_transactions(){
        return $this->hasMany(DetailTransaction::class);
    }

    public static function generateInvoiceNumber() {
        $randomDigits = str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);
        $date = now();
        $invoiceNumber = $randomDigits . $date->format('dmY');
        return $invoiceNumber;
    }

    public function getTotal() {
        $total = 0;

        foreach ($this->detail_transactions as $detail) {
            $total += $detail->package->price * $detail->qty;
        }

        return $total;
    }

}
