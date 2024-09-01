<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GstBill extends Model
{
    use HasFactory;

    //Gst tables 
    protected $table = 'gst_bills';

    //Primary Key
    protected $primaryKey = 'id';

    protected $fillable = [
        'party_id',
        'invoice_date',
        'invoice_no',
        'item_description',
        'total_amount',
        'cgst_rate',
        'sgst_rate',
        'igst_rate',
        'tax_amount',
        'sgst_amount',
        'net_amount',
        'declaration',
    ];

    //one gist bill belonngs to only 1 party
    public function party()
    {
        return $this->belongsTo(Party::class, 'party_id');
    }
}
