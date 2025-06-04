<?php

namespace App\Controllers;

use App\Models\GuestModel;

class Guests extends BaseController
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

    // Display all guests
    public function index()
    {
        $guestModel = new GuestModel();
        $data['guests'] = $guestModel->findAll();

        return view('guests/index', $data);
    }

    // Show form to create a new guest
    public function create()
    {
        return view('guests/create');
    }

    // Save a new guest to the database
    public function store()
    {
        $guestModel = new GuestModel();

        $data = [
            'name'         => $this->request->getPost('name'),
            'email'        => $this->request->getPost('email'),
            'phone_number' => $this->request->getPost('phone_number'),
        ];

        if (!$guestModel->insert($data)) {
            return redirect()->back()->withInput()->with('errors', $guestModel->errors());
        }

        return redirect()->to('/guests')->with('success', 'Guest successfully added.');
    }

    // Show form to edit a guest
    public function edit($id)
    {
        $guestModel = new GuestModel();
        $data['guest'] = $guestModel->find($id);

        if (!$data['guest']) {
            return redirect()->to('/guests')->with('error', 'Guest not found.');
        }

        return view('guests/edit', $data);
    }

    // Update guest details
    public function update($id)
    {
        $guestModel = new GuestModel();

        $data = [
            'name'         => $this->request->getPost('name'),
            'email'        => $this->request->getPost('email'),
            'phone_number' => $this->request->getPost('phone_number'),
        ];

        if (!$guestModel->update($id, $data)) {
            return redirect()->back()->withInput()->with('errors', $guestModel->errors());
        }

        return redirect()->to('/guests')->with('success', 'Guest information updated.');
    }

    // Delete a guest
    public function delete($id)
    {
        $guestModel = new GuestModel();

        if (!$guestModel->delete($id)) {
            return redirect()->to('/guests')->with('error', 'Failed to delete guest.');
        }

        return redirect()->to('/guests')->with('success', 'Guest successfully deleted.');
    }
}
