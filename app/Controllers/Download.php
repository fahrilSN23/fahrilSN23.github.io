<?php

namespace App\Controllers;

class Download extends BaseController
{
    public function index()
    {
    	$data['download'] = $this->db->table('download')->orderBy('id_download', 'DESC')->get()->getResult();
        return view('download/index', $data);
    }

    public function add() {
        return view('download/add');
    }

    public function save() {
    	$file = $this->request->getFile('nama_file');

    	if ($file->isValid() && !$file->hasMoved()) {
	    	$fileName = $file->getRandomName();
	        $file->move("public/template/assets/img/download/", $fileName);
		}else{
			$fileName = "No-file.png";
		}

    	$data = [
            'judul' => $this->request->getVar('judul'),
            'tgl_posting' => date('Y-m-d'),
            'nama_file' => $fileName,
            'hits'=>'0',
        ];

        $this->db->table('download')->insert($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('download'))->with('success', 'Data Berhasil Disimpan');
        }
    }

    public function edit($id = null) {
    	if ($id != null) {
            $query = $this->db->table('download')->getWhere(['id_download' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data['download'] = $query->getRow();
		    	return view('download/edit', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update($id) {
        $file = $this->request->getFile('nama_file');
        $download = $this->db->table('download')->getWhere(['id_download' => $id])->getRow();
        if ($file->isValid() && !$file->hasMoved()) {
            $old_img_name = $download->nama_file;
            if (file_exists("public/template/assets/img/download/".$old_img_name)) {
            	if ($download->nama_file != "No-file.png") {
	                unlink("public/template/assets/img/download/".$old_img_name);
            	}
            }
            $fileName = $file->getRandomName();
            $file->move("public/template/assets/img/download/", $fileName);
        }else {
            $fileName = $download->nama_file;
        }

        $data = [
            'judul' => $this->request->getVar('judul'),
            'nama_file' => $fileName,
        ];
        $this->db->table('download')->where(['id_download' => $id])->update($data);
        return redirect()->to(site_url('download'))->with('success', 'download Berhasil Diubah');
    }

    public function file($id_download = null, $nameFile = null) {
        if ($nameFile != null) {
            $query = $this->db->table('download')->getWhere(['nama_file' => $nameFile]);
            if ($query->resultID->num_rows > 0) {
                $download = $query->getRow();
                $hits = $download->hits + 1;
                $data = [
                    'hits' => $hits,
                ];

                $this->db->table('download')->where(['id_download' => $id_download])->update($data);
                
                return $this->response->download("public/template/assets/img/download/". $nameFile, null);                
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function hapus($id) {
    	$download = $this->db->table('download')->getWhere(['id_download' => $id])->getRow();
    	$old_img_name = $download->nama_file;
        if (file_exists("public/template/assets/img/download/".$old_img_name)) {
            unlink("public/template/assets/img/download/".$old_img_name);
        }
        $this->db->table('download')->where(['id_download' => $id])->delete();
        return redirect()->to(site_url('download'));
    }
}