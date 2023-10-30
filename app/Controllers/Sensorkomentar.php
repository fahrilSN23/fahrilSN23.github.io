<?php

namespace App\Controllers;

class Sensorkomentar extends BaseController
{
    public function index()
    {
    	$data['sensorkomentar'] = $this->db->table('sensorkomentar')->orderBy('kata', 'ASC')->get()->getResult();
        return view('sensorkomentar/index', $data);
    }

    public function add() {
        return view('sensorkomentar/add');
    }

    public function save() {
        $data = [
            'kata' => $this->request->getVar('kata'),
            'email' => userLogin()->email_user,
            'ganti' => $this->request->getVar('ganti'),
        ];

        $this->db->table('sensorkomentar')->insert($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('sensorkomentar'))->with('success', 'Data Berhasil Disimpan');
        }
    }

    public function edit($id = null) {
        if ($id != null) {
            $query = $this->db->table('sensorkomentar')->getWhere(['id_sensorkomentar' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data['sensorkomentar'] = $query->getRow();
                return view('sensorkomentar/edit', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update($id) {
        $data = [
            'kata' => $this->request->getVar('kata'),
            'email' => userLogin()->email_user,
            'ganti' => $this->request->getVar('ganti'),
        ];

        $this->db->table('sensorkomentar')->where(['id_sensorkomentar' => $id])->update($data);
        return redirect()->to(site_url('sensorkomentar'))->with('success', 'Data Berhasil Diubah');
    }

    public function hapus($id) {
        $this->db->table('sensorkomentar')->where(['id_sensorkomentar' => $id])->delete();
        return redirect()->to(site_url('sensorkomentar'));
    }
}