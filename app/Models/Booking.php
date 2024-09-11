<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'from_location', 'to_location', 'code', 'name', 'email', 'phone', 'address', 'country', 'area_city', 'postal_code', 'nid_number', 'passport', 'child_number', 'adult_number', 'booking_date', 'type', 'note', 'agent_point', 'status'];


    public function locationF()
    {
        return $this->belongsTo(Location::class, 'from_location', 'id');
    }

    public function locationT()
    {
        return $this->belongsTo(Location::class, 'to_location', 'id');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}
