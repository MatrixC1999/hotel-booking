<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentModel extends Model
{
    protected $table = 'payments';
    protected $primaryKey = 'id';
    protected $allowedFields = ['booking_id', 'amount_paid', 'payment_date', 'payment_method'];

    // Define relationship
    public function getBooking()
    {
        return $this->belongsTo('App\Models\BookingModel', 'booking_id');
    }
}
