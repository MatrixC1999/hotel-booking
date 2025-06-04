<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $table = 'bookings';
    protected $primaryKey = 'id';
    protected $allowedFields = ['guest_id', 'room_id', 'checkin_date', 'checkout_date', 'status'];

    // Optional: define validation rules here if you want model-level validation
    protected $validationRules = [
        'guest_id' => 'required|is_not_unique[guests.id]',
        'room_id' => 'required|is_not_unique[rooms.id]',
        'checkin_date' => 'required|valid_date',
        'checkout_date' => 'required|valid_date',
        'status' => 'required|in_list[pending,confirmed,completed]'
    ];
}
