<?php

namespace App\Controllers;

use App\Models\PaymentModel;
use App\Models\BookingModel;
use App\Models\GuestModel;
use App\Models\RoomModel;

class Payments extends BaseController
{
    // Ensure the user is logged in before accessing any methods
    public function __construct()
    {
        // Prevent access if not logged in
        if (! $this->isLoggedIn()) {
            return redirect()->to('/login')->send(); 
            exit;
        }
    }

    public function index()
    {
        $paymentModel = new PaymentModel();
        $bookingModel = new BookingModel();

        // JOIN guests and rooms to get their names and room numbers for payment view
        $payments = $paymentModel
            ->select('payments.*, bookings.guest_id, bookings.room_id, guests.name as guest_name, rooms.room_number')
            ->join('bookings', 'bookings.id = payments.booking_id')
            ->join('guests', 'guests.id = bookings.guest_id')
            ->join('rooms', 'rooms.id = bookings.room_id')
            ->findAll();

        return view('payments/index', ['payments' => $payments]);
    }

    public function create()
    {
        $bookingModel = new BookingModel();

        // Get all bookings along with guest and room info
        $bookings = $bookingModel
            ->select('bookings.id, guests.name as guest_name, rooms.room_number')
            ->join('guests', 'guests.id = bookings.guest_id')
            ->join('rooms', 'rooms.id = bookings.room_id')
            ->findAll();

        return view('payments/create', ['bookings' => $bookings]);
    }

    public function store()
    {
        $paymentModel = new PaymentModel();

        $validation = \Config\Services::validation();
        if (!$this->validate([
            'booking_id' => 'required|is_natural_no_zero',
            'amount_paid' => 'required|decimal',
            'payment_date' => 'required|valid_date',
            'payment_method' => 'required|string',
        ])) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'booking_id' => $this->request->getPost('booking_id'),
            'amount_paid' => $this->request->getPost('amount_paid'),
            'payment_date' => $this->request->getPost('payment_date'),
            'payment_method' => $this->request->getPost('payment_method'),
        ];

        if ($paymentModel->insert($data)) {
            return redirect()->to(base_url('payments'));
        } else {
            return redirect()->back()->with('error', 'Failed to save payment.');
        }
    }

    public function edit($id)
    {
        $paymentModel = new PaymentModel();
        $payment = $paymentModel->find($id);

        if (!$payment) {
            return redirect()->to(base_url('payments'))->with('error', 'Payment not found.');
        }

        // Get bookings for dropdown
        $bookingModel = new BookingModel();
        $bookings = $bookingModel
            ->select('bookings.id, guests.name as guest_name, rooms.room_number')
            ->join('guests', 'guests.id = bookings.guest_id')
            ->join('rooms', 'rooms.id = bookings.room_id')
            ->findAll();

        return view('payments/edit', ['payment' => $payment, 'bookings' => $bookings]);
    }

    public function update($id)
    {
        $paymentModel = new PaymentModel();

        $validation = \Config\Services::validation();
        if (!$this->validate([
            'booking_id' => 'required|is_natural_no_zero',
            'amount_paid' => 'required|decimal',
            'payment_date' => 'required|valid_date',
            'payment_method' => 'required|string',
        ])) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'booking_id' => $this->request->getPost('booking_id'),
            'amount_paid' => $this->request->getPost('amount_paid'),
            'payment_date' => $this->request->getPost('payment_date'),
            'payment_method' => $this->request->getPost('payment_method'),
        ];

        $paymentModel->update($id, $data);

        return redirect()->to(base_url('payments'));
    }

    public function delete($id)
    {
        $paymentModel = new PaymentModel();
        $paymentModel->delete($id);

        return redirect()->to(base_url('payments'));
    }
}
