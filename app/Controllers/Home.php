<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['users'] = $this->db->table('users')->get()->resultID->num_rows;
        $data['artikel'] = $this->db->table('artikel')->get()->resultID->num_rows;
        $data['halaman'] = $this->db->table('halaman')->get()->resultID->num_rows;
        $data['agenda'] = $this->db->table('agenda')->get()->resultID->num_rows;
        return view('home', $data);
    }
}
