<?php

namespace App\Controllers;

class Komentarartikel extends BaseController
{
    public function index()
    {
        if (userLogin()->level_user == 'Administrator') {
            $builder = $this->db->table('komentarartikel');
            $query   = $builder->get();
            
            $data['komentarartikel'] = $query->getResult();
        }else{
            $artikel = $this->db->table('artikel')->getWhere(['email' => userLogin()->email_user])->getRow();
            $data['komentarartikel'] = $this->db->table('komentarartikel')->getWhere(['id_berita' => $artikel->id_artikel])->getResult();
        }
        return view('komentarartikel/get', $data);
    }

    public function save() {
        $data = [
            'id_berita' => $this->request->getVar('id_berita'),
            'nama_komentar' => $this->request->getVar('nama_komentar'),
            'url' => $this->request->getVar('url'),
            'isi_komentar' => $this->request->getVar('isi_komentar'),
            'tgl' => date('Y-m-d'),
            'jam_komentar'=>date('H:i:s'),
            'aktif' => 'Y',
            'email' => $this->request->getVar('email'),
        ];

        $this->db->table('komentarartikel')->insert($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url($this->request->getVar('link')))->with('success', 'Komentar anda berhasil disimpan');
        }
    }

    public function edit($id = null) {
        if ($id != null) {
            $query = $this->db->table('komentarartikel')->getWhere(['id_komentar' => $id]);
            if ($query->resultID->num_rows > 0) {
                $komentarartikel = $query->getRow();
                if ($komentarartikel->dibaca == 'N') {
                    $this->db->table('komentarartikel')->where(['id_komentar' => $id])->update(['dibaca' => 'Y']);
                }
                $data['komentarartikel'] = $komentarartikel;
                return view('komentarartikel/edit', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
    }

    public function update($id) {
        $data = [
            'nama_komentar' => $this->request->getVar('nama_komentar'),
            'url' => $this->request->getVar('url'),
            'isi_komentar' => $this->request->getVar('isi_komentar'),
            'aktif' => $this->request->getVar('aktif'),
            'email' => $this->request->getVar('email'),
        ];

        $this->db->table('komentarartikel')->where(['id_komentar' => $id])->update($data);
        return redirect()->to(site_url('komentarartikel'))->with('success', 'Data Berhasil Diubah');
    }

    public function hapus($id) {
        $this->db->table('komentarartikel')->where(['id_komentar' => $id])->delete();
        return redirect()->to(site_url('komentarartikel'))->with('success', 'Data Berhasil Dihapus');
    }
}