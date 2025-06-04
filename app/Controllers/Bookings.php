<?php

namespace App\Controllers;

use App\Models\BookingModel;
use App\Models\GuestModel;
use App\Models\RoomModel;

class Bookings extends BaseController
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
        $bookingModel = new BookingModel();

        // JOIN guests and rooms to get their names and room numbers
        $bookings = $bookingModel
            ->select('bookings.*, guests.name as guest_name, rooms.room_number')
            ->join('guests', 'guests.id = bookings.guest_id')
            ->join('rooms', 'rooms.id = bookings.room_id')
            ->findAll();

        return view('bookings/index', ['bookings' => $bookings]);
    }

    public function create()
    {
        $guestModel = new GuestModel();
        $roomModel = new RoomModel();

        $guests = $guestModel->findAll();
        $rooms = $roomModel->findAll();

        return view('bookings/create', ['guests' => $guests, 'rooms' => $rooms]);
    }

    public function store()
    {
        $bookingModel = new BookingModel();

        $validation = \Config\Services::validation();
        if (!$this->validate([
            'guest_id' => 'required|is_natural_no_zero',
            'room_id' => 'required|is_natural_no_zero',
            'checkin_date' => 'required|valid_date',
            'checkout_date' => 'required|valid_date',
            'status' => 'required|in_list[confirmed,cancelled,pending]',
        ])) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'guest_id' => $this->request->getPost('guest_id'),
            'room_id' => $this->request->getPost('room_id'),
            'checkin_date' => $this->request->getPost('checkin_date'),
            'checkout_date' => $this->request->getPost('checkout_date'),
            'status' => $this->request->getPost('status'),
        ];

        log_message('debug', 'Form data: ' . print_r($data, true));

        if ($bookingModel->insert($data)) {
            return redirect()->to(base_url('bookings'));
        } else {
            log_message('error', 'Failed to save booking: ' . print_r($data, true));
            return redirect()->back()->with('error', 'Failed to save booking.');
        }
    }

    public function edit($id)
    {
        $bookingModel = new BookingModel();
        $guestModel = new GuestModel();
        $roomModel = new RoomModel();

        $booking = $bookingModel->find($id);
        $guests = $guestModel->findAll();
        $rooms = $roomModel->findAll();

        return view('bookings/edit', ['booking' => $booking, 'guests' => $guests, 'rooms' => $rooms]);
    }

    public function update($id)
    {
        $bookingModel = new BookingModel();

        $data = [
            'guest_id' => $this->request->getPost('guest_id'),
            'room_id' => $this->request->getPost('room_id'),
            'checkin_date' => $this->request->getPost('checkin_date'),
            'checkout_date' => $this->request->getPost('checkout_date'),
            'status' => $this->request->getPost('status'),
        ];

        $bookingModel->update($id, $data);

        return redirect()->to(base_url('bookings'));
    }

    public function delete($id)
    {
        $bookingModel = new BookingModel();
        $bookingModel->delete($id);

        return redirect()->to(base_url('bookings'));
    }
}
