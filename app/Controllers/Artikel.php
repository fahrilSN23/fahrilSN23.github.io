<?php

namespace App\Controllers;
use App\Libraries\Mylibrary;

class Artikel extends BaseController
{
    public function index()
    {
        if (userLogin()->level_user == 'Administrator') {
            $builder = $this->db->table('artikel');
            $query   = $builder->orderBy('id_artikel', 'DESC')->get();
            
            $data['artikel'] = $query->getResult();
        } else {
            $data['artikel'] = $this->db->table('artikel')->orderBy('id_artikel', 'DESC')->getWhere(['email' => userLogin()->email_user])->getResult();
        }
        
        return view('artikel/get', $data);
    }

    public function create() {
        $data['kategori'] = $this->db->table('kategori')->getWhere(['aktif' => 'Y'])->getResult();
        $data['tag_artikel'] = $this->db->table('tag_artikel')->get()->getResult();
        return view('artikel/add', $data);
    }

    public function save() {
        $file = $this->request->getFile('gambar');

    	if ($file->isValid() && !$file->hasMoved()) {
	    	$imageName = $file->getRandomName();
	        $file->move("public/template/assets/img/artikel/", $imageName);
		}else{
			$imageName = "No-image.jpg";
		}

        if ($this->request->getVar('tag')!=''){
            $tag_seo = $this->request->getVar('tag');
            $tag=implode(',',$tag_seo);
        }else{
            $tag = '';
        }

    	$data = [
            'id_kategori' => $this->request->getVar('id_kategori'),
            'email' => userLogin()->email_user,
            'judul' => $this->request->getVar('judul'),
            'judul_seo' => Mylibrary::seo_title($this->request->getVar('judul')),
            'youtube' => $this->request->getVar('youtube'),
            'headline' => $this->request->getVar('headline'),
            'isi_artikel' => $this->request->getVar('isi_artikel'),
            'gambar' => $imageName,
            'keterangan_gambar' => $this->request->getVar('keterangan_gambar'),
            'hari'=>hari_ini(date('w')),
            'tanggal' => date('Y-m-d'),
            'jam'=>date('H:i:s'),
            'tag' => $tag,
            'status' => 'Y'
        ];

        $this->db->table('artikel')->insert($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('artikel'))->with('success', 'Data Berhasil Disimpan');
        }
    }

    public function edit($id = null) {
    	if ($id != null) {
            $query = $this->db->table('artikel')->getWhere(['id_artikel' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data['artikel'] = $query->getRow();
                $data['kategori'] = $this->db->table('kategori')->getWhere(['aktif' => 'Y'])->getResult();
                $data['tag_artikel'] = $this->db->table('tag_artikel')->get()->getResult();
		    	return view('artikel/edit', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update($id) {
        $file = $this->request->getFile('gambar');
        $artikel = $this->db->table('artikel')->getWhere(['id_artikel' => $id])->getRow();
        if ($file->isValid() && !$file->hasMoved()) {
            $old_img_name = $artikel->gambar;
            if (file_exists("public/template/assets/img/artikel/".$old_img_name)) {
            	if ($artikel->gambar != "No-image.jpg") {
	                unlink("public/template/assets/img/artikel/".$old_img_name);
            	}
            }
            $imageName = $file->getRandomName();
            $file->move("public/template/assets/img/artikel/", $imageName);
        }else {
            $imageName = $artikel->gambar;
        }

        if ($this->request->getVar('tag')!=''){
            $tag_seo = $this->request->getVar('tag');
            $tag=implode(',',$tag_seo);
        }else{
            $tag = $this->request->getVar('current_tag');
        }

        $data = [
            'id_kategori' => $this->request->getVar('id_kategori'),
            'judul' => $this->request->getVar('judul'),
            'judul_seo' => Mylibrary::seo_title($this->request->getVar('judul')),
            'youtube' => $this->request->getVar('youtube'),
            'headline' => $this->request->getVar('headline'),
            'isi_artikel' => $this->request->getVar('isi_artikel'),
            'gambar' => $imageName,
            'keterangan_gambar' => $this->request->getVar('keterangan_gambar'),
            'hari'=>hari_ini(date('w')),
            'tanggal' => date('Y-m-d'),
            'jam'=>date('H:i:s'),
            'tag' => $tag,
        ];
        $this->db->table('artikel')->where(['id_artikel' => $id])->update($data);
        return redirect()->to(site_url('artikel'))->with('success', 'artikel Berhasil Diubah');
    }

    public function status($id,$status) {
        $data = [
            'status' => $status,
        ];
        $this->db->table('artikel')->where(['id_artikel' => $id])->update($data);
        return redirect()->to(site_url('artikel'))->with('success', 'Status artikel Berhasil Diubah');
    }

    public function destroy($id) {
    	$artikel = $this->db->table('artikel')->getWhere(['id_artikel' => $id])->getRow();
    	$old_img_name = $artikel->gambar;
        if (file_exists("public/template/assets/img/artikel/".$old_img_name)) {
            if ($artikel->gambar != "No-image.jpg") {
                unlink("public/template/assets/img/artikel/".$old_img_name);
            }
        }
        $komenart = $this->db->table('komentarartikel')->getWhere(['id_berita' => $id]);
        if ($komenart->resultID->num_rows > 0) {
            $kv = $komenart->getRow();
            $this->db->table('komentarartikel')->where(['id_berita' => $id])->delete();
        }
        $this->db->table('artikel')->where(['id_artikel' => $id])->delete();
        return redirect()->to(site_url('artikel'));
    }
}