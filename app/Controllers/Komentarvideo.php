<?php

namespace App\Controllers;

class Komentarvideo extends BaseController
{
    public function index()
    {
        if (userLogin()->level_user == 'Administrator') {
            $builder = $this->db->table('komentarvideo');
            $query   = $builder->get();
            
            $data['komentarvideo'] = $query->getResult();
        }else{
            $data['komentarvideo'] = $this->db->table('komentarvideo')->join('video','id_video')->getWhere(['video.email' => userLogin()->email_user])->getResult();
        }
        return view('komentarvideo/get', $data);
    }

    public function save() {
        $data = [
            'id_video' => $this->request->getVar('id_video'),
            'nama_komentar' => $this->request->getVar('nama_komentar'),
            'isi_komentar' => $this->request->getVar('isi_komentar'),
            'tgl' => date('Y-m-d'),
            'jam_komentar'=>date('H:i:s'),
            'aktif' => 'Y',
            'email' => $this->request->getVar('email'),
        ];

        $this->db->table('komentarvideo')->insert($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url($this->request->getVar('link')))->with('success', 'Komentar anda berhasil disimpan');
        }
    }

    public function edit($id = null) {
        if ($id != null) {
            $query = $this->db->table('komentarvideo')->getWhere(['id_komentar' => $id]);
            if ($query->resultID->num_rows > 0) {
                $komentarvideo = $query->getRow();
                if ($komentarvideo->dibaca == 'N') {
                    $this->db->table('komentarvideo')->where(['id_komentar' => $id])->update(['dibaca' => 'Y']);
                }
                $data['komentarvideo'] = $komentarvideo;
                return view('komentarvideo/edit', $data);
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
            'email' => $this->request->getVar('email'),
            'isi_komentar' => $this->request->getVar('isi_komentar'),
            'aktif' => $this->request->getVar('aktif'),
        ];

        $this->db->table('komentarvideo')->where(['id_komentar' => $id])->update($data);
        return redirect()->to(site_url('komentarvideo'))->with('success', 'Data Berhasil Diubah');
    }

    public function hapus($id) {
        $this->db->table('komentarvideo')->where(['id_komentar' => $id])->delete();
        return redirect()->to(site_url('komentarvideo'))->with('success', 'Data Berhasil Dihapus');
    }
}