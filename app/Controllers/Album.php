<?php

namespace App\Controllers;
use App\Libraries\Mylibrary;

class Album extends BaseController
{
    public function index()
    {
        if (userLogin()->level_user == 'Administrator') {
            $data['album'] = $this->db->table('album')->orderBy('id_album', 'DESC')->get()->getResult();
        }else{
            $data['album'] = $this->db->table('album')->orderBy('id_album', 'DESC')->getWhere(['email' => userLogin()->email_user])->getResult();
        }
        return view('album/index', $data);
    }

    public function add() {
        return view('album/add');
    }

    public function save() {
    	$file = $this->request->getFile('gbr_album');

    	if ($file->isValid() && !$file->hasMoved()) {
	    	$imageName = $file->getRandomName();
	        $file->move("public/template/assets/img/album/", $imageName);
		}else{
			$imageName = "No-image.jpg";
		}

    	$data = [
            'jdl_album' => $this->request->getVar('jdl_album'),
            'album_seo' => Mylibrary::seo_title($this->request->getVar('jdl_album')),
            'keterangan' => $this->request->getVar('keterangan'),
            'gbr_album' => $imageName,
            'aktif' => 'Y',
            'tgl_posting' => date('Y-m-d'),
            'jam'=>date('H:i:s'),
            'hari'=>hari_ini(date('w')),
            'email' => userLogin()->email_user,
        ];

        $this->db->table('album')->insert($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('album'))->with('success', 'Data Berhasil Disimpan');
        }
    }

    public function edit($id = null) {
    	if ($id != null) {
            $query = $this->db->table('album')->getWhere(['id_album' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data['album'] = $query->getRow();
		    	return view('album/edit', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update($id) {
        $file = $this->request->getFile('gbr_album');
        $album = $this->db->table('album')->getWhere(['id_album' => $id])->getRow();
        if ($file->isValid() && !$file->hasMoved()) {
            $old_img_name = $album->gbr_album;
            if (file_exists("public/template/assets/img/album/".$old_img_name)) {
            	if ($album->gbr_album != "No-image.jpg") {
	                unlink("public/template/assets/img/album/".$old_img_name);
            	}
            }
            $imageName = $file->getRandomName();
            $file->move("public/template/assets/img/album/", $imageName);
        }else {
            $imageName = $album->gbr_album;
        }

        $data = [
            'jdl_album' => $this->request->getVar('jdl_album'),
            'album_seo' => Mylibrary::seo_title($this->request->getVar('jdl_album')),
            'keterangan' => $this->request->getVar('keterangan'),
            'gbr_album' => $imageName,
            'aktif' => $this->request->getVar('aktif'),
            'email' => userLogin()->email_user,
        ];
        $this->db->table('album')->where(['id_album' => $id])->update($data);
        return redirect()->to(site_url('album'))->with('success', 'album Berhasil Diubah');
    }

    public function detail($id) {
    	if ($id != null) {
            $query = $this->db->table('album')->getWhere(['id_album' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data['album'] = $query->getRow();
                $data['gallery'] = $this->db->table('gallery')->getWhere(['id_album' => $id])->getResult();
                $uri = $this->request->getUri();
                if ($uri->getSegment(4)) {
                    $data['edit_gallery'] = $this->db->table('gallery')->getWhere(['id_gallery' => $uri->getSegment(4)])->getRow();
                }
                $data['uri'] = $uri;
		    	return view('album/detail', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function delete($id) {
    	$album = $this->db->table('album')->getWhere(['id_album' => $id])->getRow();
    	$old_img_name = $album->gbr_album;
        if (file_exists("public/template/assets/img/album/".$old_img_name)) {
            if ($album->gbr_album != "No-image.jpg") {
                unlink("public/template/assets/img/album/".$old_img_name);
            }
        }
        $this->db->table('album')->where(['id_album' => $id])->delete();
        return redirect()->to(site_url('album'));
    }

    public function save_gallery() {
    	$file = $this->request->getFile('gbr_gallery');
        $id_album = $this->request->getVar('id_album');

    	if ($file->isValid() && !$file->hasMoved()) {
	    	$imageName = $file->getRandomName();
	        $file->move("public/template/assets/img/gallery/", $imageName);
		}else{
			$imageName = "No-image.jpg";
		}

    	$data = [
            'id_album' => $id_album,
            'jdl_gallery' => $this->request->getVar('jdl_gallery'),
            'gbr_gallery' => $imageName,
        ];

        $this->db->table('gallery')->insert($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('album/detail/'.$id_album))->with('success', 'Data Berhasil Disimpan');
        }
    }

    public function update_gallery($id) {
        $file = $this->request->getFile('gbr_gallery');
        $id_album = $this->request->getVar('id_album');

        $gallery = $this->db->table('gallery')->getWhere(['id_gallery' => $id])->getRow();
        if ($file->isValid() && !$file->hasMoved()) {
            $old_img_name = $gallery->gbr_gallery;
            if (file_exists("public/template/assets/img/gallery/".$old_img_name)) {
            	if ($gallery->gbr_gallery != "No-image.jpg") {
	                unlink("public/template/assets/img/gallery/".$old_img_name);
            	}
            }
            $imageName = $file->getRandomName();
            $file->move("public/template/assets/img/gallery/", $imageName);
        }else {
            $imageName = $gallery->gbr_gallery;
        }

        $data = [
            'id_album' => $id_album,
            'jdl_gallery' => $this->request->getVar('jdl_gallery'),
            'gbr_gallery' => $imageName,
        ];
        $this->db->table('gallery')->where(['id_gallery' => $id])->update($data);
        return redirect()->to(site_url('album/detail/'.$id_album))->with('success', 'Foto Berhasil Diubah');
    }

    public function delete_gallery() {
        $uri = $this->request->getUri();
        $id = $uri->getSegment(4);
    	$gallery = $this->db->table('gallery')->getWhere(['id_gallery' => $id])->getRow();
    	$old_img_name = $gallery->gbr_gallery;
        if (file_exists("public/template/assets/img/gallery/".$old_img_name)) {
            if ($gallery->gbr_gallery != "No-image.jpg") {
                unlink("public/template/assets/img/gallery/".$old_img_name);
            }
        }
        $this->db->table('gallery')->where(['id_gallery' => $id])->delete();
        return redirect()->to(site_url('album/detail/'.$uri->getSegment(3)))->with('success', 'Foto Berhasil Dihapus');
    }
}