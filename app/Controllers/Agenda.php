<?php

namespace App\Controllers;
use App\Libraries\Mylibrary;

class Agenda extends BaseController
{
    public function index()
    {
        if (userLogin()->level_user == 'Administrator') {
            $builder = $this->db->table('agenda');
            $query   = $builder->orderBy('id_agenda', 'DESC')->get();
            
            $data['agenda'] = $query->getResult();
        }else{
            $data['agenda'] = $this->db->table('agenda')->getWhere(['email' => userLogin()->email_user])->getResult();
        }
        return view('agenda/get', $data);
    }

    public function create() {
        return view('agenda/add');
    }

    public function save() {
        $file = $this->request->getFile('gambar');

    	if ($file->isValid() && !$file->hasMoved()) {
	    	$imageName = $file->getRandomName();
	        $file->move("public/template/assets/img/agenda/", $imageName);
		}else{
			$imageName = "No-image.jpg";
		}

        $jam = $this->request->getVar('mulai') . ' s/d ' . $this->request->getVar('selesai');
        $ex = explode(' - ', $this->request->getVar('tanggal'));
        $mulai = $ex[0];
        $selesai = $ex[1];

    	$data = [
            'tema' => $this->request->getVar('tema'),
            'tema_seo' => Mylibrary::seo_title($this->request->getVar('tema')),
            'isi_agenda' => $this->request->getVar('isi_agenda'),
            'tempat' => $this->request->getVar('tempat'),
            'pengirim' => $this->request->getVar('pengirim'),
            'gambar' => $imageName,
            'tgl_mulai' => $mulai,
            'tgl_selesai' => $selesai,
            'tgl_posting' => date('Y-m-d'),
            'jam'=>$jam,
            'dibaca' => '0',
            'email' => userLogin()->email_user,
        ];

        $this->db->table('agenda')->insert($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('agenda'))->with('success', 'Data Berhasil Disimpan');
        }
    }

    public function edit($id = null) {
    	if ($id != null) {
            $query = $this->db->table('agenda')->getWhere(['id_agenda' => $id]);
            if ($query->resultID->num_rows > 0) {
                $agenda = $query->getRow();
                $jam = explode(' s/d ', $agenda->jam);
                $data['agenda'] = $agenda;
                $data['mulai'] = $jam[0];
                $data['selesai'] = $jam[1];
                $data['tanggal'] = $agenda->tgl_mulai . ' - ' . $agenda->tgl_selesai;
		    	return view('agenda/edit', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update($id) {
        $file = $this->request->getFile('gambar');
        $agenda = $this->db->table('agenda')->getWhere(['id_agenda' => $id])->getRow();
        if ($file->isValid() && !$file->hasMoved()) {
            $old_img_name = $agenda->gambar;
            if (file_exists("public/template/assets/img/agenda/".$old_img_name)) {
            	if ($agenda->gambar != "No-image.jpg") {
	                unlink("public/template/assets/img/agenda/".$old_img_name);
            	}
            }
            $imageName = $file->getRandomName();
            $file->move("public/template/assets/img/agenda/", $imageName);
        }else {
            $imageName = $agenda->gambar;
        }

        $jam = $this->request->getVar('mulai') . ' s/d ' . $this->request->getVar('selesai');
        $ex = explode(' - ', $this->request->getVar('tanggal'));
        $mulai = $ex[0];
        $selesai = $ex[1];

        $data = [
            'tema' => $this->request->getVar('tema'),
            'tema_seo' => Mylibrary::seo_title($this->request->getVar('tema')),
            'isi_agenda' => $this->request->getVar('isi_agenda'),
            'tempat' => $this->request->getVar('tempat'),
            'pengirim' => $this->request->getVar('pengirim'),
            'gambar' => $imageName,
            'tgl_mulai' => $mulai,
            'tgl_selesai' => $selesai,
            'tgl_posting' => date('Y-m-d'),
            'jam'=>$jam,
            'email' => userLogin()->email_user,
        ];
        $this->db->table('agenda')->where(['id_agenda' => $id])->update($data);
        return redirect()->to(site_url('agenda'))->with('success', 'agenda Berhasil Diubah');
    }

    public function destroy($id) {
    	$agenda = $this->db->table('agenda')->getWhere(['id_agenda' => $id])->getRow();
    	$old_img_name = $agenda->gambar;
        if (file_exists("public/template/assets/img/agenda/".$old_img_name)) {
            if ($agenda->gambar != "No-image.jpg") {
                unlink("public/template/assets/img/agenda/".$old_img_name);
            }
        }
        $this->db->table('agenda')->where(['id_agenda' => $id])->delete();
        return redirect()->to(site_url('agenda'));
    }
}