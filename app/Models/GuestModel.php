<?php

namespace App\Models;

use CodeIgniter\Model;

class GuestModel extends Model
{
    protected $table = 'guests';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'phone_number'];
    
    // Validation rules
    protected $validationRules = [
        'name'         => 'required|min_length[2]',
        'email'        => 'required|valid_email',
        'phone_number' => 'required|min_length[10]',
    ];
    
    // Custom error messages
    protected $validationMessages = [
        'name' => [
            'required' => 'Name is required.',
            'min_length' => 'Name must be at least 2 characters long.',
        ],
        'email' => [
            'required' => 'Email is required.',
            'valid_email' => 'Please enter a valid email address.',
        ],
        'phone_number' => [
            'required' => 'Phone number is required.',
            'min_length' => 'Phone number must be at least 10 digits long.',
        ]
    ];
}
