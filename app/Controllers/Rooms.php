<?php

namespace App\Controllers;
use App\Models\RoomModel;
use CodeIgniter\Controller;

class Rooms extends Controller
{
    public function __construct()
    {
        if (! $this->isLoggedIn()) {
            return redirect()->to('/login')->send(); 
            exit;
        }
    }

    // ✅ Added isLoggedIn() method here
    private function isLoggedIn()
    {
        return session()->get('isLoggedIn') === true;
    }

    public function index()
    {
        $model = new RoomModel();
        $data['rooms'] = $model->findAll();
        return view('rooms/index', $data);
    }

    public function create()
    {
        return view('rooms/create');
    }

    public function store()
    {
        $model = new RoomModel();
        $model->save([
            'room_number' => $this->request->getPost('room_number'),
            'room_type'   => $this->request->getPost('room_type'),
            'price'       => $this->request->getPost('price'),
            'status'      => $this->request->getPost('status'),
        ]);
        return redirect()->to('/rooms');
    }

    public function edit($id)
    {
        $model = new RoomModel();
        $data['room'] = $model->find($id);
        return view('rooms/edit', $data);
    }

    public function update($id)
    {
        $model = new RoomModel();
        $model->update($id, [
            'room_number' => $this->request->getPost('room_number'),
            'room_type'   => $this->request->getPost('room_type'),
            'price'       => $this->request->getPost('price'),
            'status'      => $this->request->getPost('status'),
        ]);
        return redirect()->to('/rooms');
    }

    public function delete($id)
    {
        $model = new RoomModel();
        $model->delete($id);
        return redirect()->to('/rooms');
    }
}
