<?php

namespace App\Controllers;
use App\Libraries\Mylibrary;

class Playlist_video extends BaseController
{
    public function index()
    {
        if (userLogin()->level_user == 'Administrator') {
            $data['playlist'] = $this->db->table('playlist')->orderBy('jdl_playlist', 'ASC')->get()->getResult();
        }else{
            $data['playlist'] = $this->db->table('playlist')->orderBy('jdl_playlist', 'ASC')->getWhere(['email' => userLogin()->email_user])->getResult();
        }
        return view('playlist/index', $data);
    }

    public function add() {
        return view('playlist/add');
    }

    public function save() {
    	$file = $this->request->getFile('gbr_playlist');

    	if ($file->isValid() && !$file->hasMoved()) {
	    	$imageName = $file->getRandomName();
	        $file->move("public/template/assets/img/playlist/", $imageName);
		}else{
			$imageName = "No-image.jpg";
		}

    	$data = [
            'jdl_playlist' => $this->request->getVar('jdl_playlist'),
            'email' => userLogin()->email_user,
            'playlist_seo' => Mylibrary::seo_title($this->request->getVar('jdl_playlist')),
            'gbr_playlist' => $imageName,
            'aktif' => 'Y',
        ];

        $this->db->table('playlist')->insert($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('playlist_video'))->with('success', 'Data Berhasil Disimpan');
        }
    }

    public function edit($id = null) {
    	if ($id != null) {
            $query = $this->db->table('playlist')->getWhere(['id_playlist' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data['playlist'] = $query->getRow();
		    	return view('playlist/edit', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update($id) {
        $file = $this->request->getFile('gbr_playlist');
        $playlist = $this->db->table('playlist')->getWhere(['id_playlist' => $id])->getRow();
        if ($file->isValid() && !$file->hasMoved()) {
            $old_img_name = $playlist->gbr_playlist;
            if (file_exists("public/template/assets/img/playlist/".$old_img_name)) {
            	if ($playlist->gbr_playlist != "No-image.jpg") {
	                unlink("public/template/assets/img/playlist/".$old_img_name);
            	}
            }
            $imageName = $file->getRandomName();
            $file->move("public/template/assets/img/playlist/", $imageName);
        }else {
            $imageName = $playlist->gbr_playlist;
        }

        $data = [
            'jdl_playlist' => $this->request->getVar('jdl_playlist'),
            'email' => userLogin()->email_user,
            'playlist_seo' => Mylibrary::seo_title($this->request->getVar('jdl_playlist')),
            'gbr_playlist' => $imageName,
            'aktif' => $this->request->getVar('aktif'),
        ];
        $this->db->table('playlist')->where(['id_playlist' => $id])->update($data);
        return redirect()->to(site_url('playlist_video'))->with('success', 'playlist Berhasil Diubah');
    }

    public function delete($id) {
    	$playlist = $this->db->table('playlist')->getWhere(['id_playlist' => $id])->getRow();
    	$old_img_name = $playlist->gbr_playlist;
        if (file_exists("public/template/assets/img/playlist/".$old_img_name)) {
            if ($playlist->gbr_playlist != "No-image.jpg") {
                unlink("public/template/assets/img/playlist/".$old_img_name);
            }
        }
        $this->db->table('playlist')->where(['id_playlist' => $id])->delete();
        return redirect()->to(site_url('playlist_video'))->with('success', 'playlist Berhasil Dihapus');
    }
}