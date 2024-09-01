<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;

    // Table name
    protected $table = "parties";

    //primary key
    protected $primaryKey = "id";

    //Fillable
    protected $fillable = [
        'party_type',
        'full_name',
        'phone_no',
        'address',
        'account_holder_name',
        'account_no',
        'bank_name',
        'ifcs_code',
        'branch_address'
    ];

    // One party can have multiple gst bills
    public function gstBills()
    {
        return $this->hasMany(GstBill::class);
    }
}
