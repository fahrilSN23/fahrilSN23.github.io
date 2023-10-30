<?php

namespace App\Controllers;
use App\Libraries\Mylibrary;

class Video extends BaseController
{
    public function index()
    {
        if (userLogin()->level_user == 'Administrator') {
            $builder = $this->db->table('video');
            $query   = $builder->join('playlist','id_playlist')->orderBy('id_video', 'DESC')->get();
            
            $data['video'] = $query->getResult();
        }else{
            $data['video'] = $this->db->table('video')->join('playlist','id_playlist')->orderBy('id_video', 'DESC')->getWhere(['video.email' => userLogin()->email_user])->getResult();
        }
        return view('video/get', $data);
    }

    public function create() {
        $data['playlist'] = $this->db->table('playlist')->getWhere(['aktif' => 'Y'])->getResult();
        $data['tag_video'] = $this->db->table('tag_video')->get()->getResult();
        return view('video/add', $data);
    }

    public function save() {
        $file = $this->request->getFile('gbr_video');

    	if ($file->isValid() && !$file->hasMoved()) {
	    	$imageName = $file->getRandomName();
	        $file->move("public/template/assets/img/video/", $imageName);
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
            'id_playlist' => $this->request->getVar('id_playlist'),
            'email' => userLogin()->email_user,
            'jdl_video' => $this->request->getVar('jdl_video'),
            'video_seo' => Mylibrary::seo_title($this->request->getVar('jdl_video')),
            'keterangan' => $this->request->getVar('keterangan'),
            'gbr_video' => $imageName,
            'youtube' => $this->request->getVar('youtube'),
            'dilihat' => '0',
            'hari'=>hari_ini(date('w')),
            'tanggal' => date('Y-m-d'),
            'jam'=>date('H:i:s'),
            'tag' => $tag,
        ];

        $this->db->table('video')->insert($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('video'))->with('success', 'Data Berhasil Disimpan');
        }
    }

    public function edit($id = null) {
    	if ($id != null) {
            $query = $this->db->table('video')->getWhere(['id_video' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data['video'] = $query->getRow();
                $data['playlist'] = $this->db->table('playlist')->getWhere(['aktif' => 'Y'])->getResult();
                $data['tag_video'] = $this->db->table('tag_video')->get()->getResult();
		    	return view('video/edit', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update($id) {
        $file = $this->request->getFile('gbr_video');
        $video = $this->db->table('video')->getWhere(['id_video' => $id])->getRow();
        if ($file->isValid() && !$file->hasMoved()) {
            $old_img_name = $video->gbr_video;
            if (file_exists("public/template/assets/img/video/".$old_img_name)) {
            	if ($video->gbr_video != "No-image.jpg") {
	                unlink("public/template/assets/img/video/".$old_img_name);
            	}
            }
            $imageName = $file->getRandomName();
            $file->move("public/template/assets/img/video/", $imageName);
        }else {
            $imageName = $video->gbr_video;
        }

        if ($this->request->getVar('tag')!=''){
            $tag_seo = $this->request->getVar('tag');
            $tag=implode(',',$tag_seo);
        }else{
            $tag = $this->request->getVar('current_tag');
        }

        $data = [
            'id_playlist' => $this->request->getVar('id_playlist'),
            'email' => userLogin()->email_user,
            'jdl_video' => $this->request->getVar('jdl_video'),
            'video_seo' => Mylibrary::seo_title($this->request->getVar('jdl_video')),
            'keterangan' => $this->request->getVar('keterangan'),
            'gbr_video' => $imageName,
            'youtube' => $this->request->getVar('youtube'),
            'hari'=>hari_ini(date('w')),
            'tanggal' => date('Y-m-d'),
            'jam'=>date('H:i:s'),
            'tag' => $tag,
        ];
        $this->db->table('video')->where(['id_video' => $id])->update($data);
        return redirect()->to(site_url('video'))->with('success', 'video Berhasil Diubah');
    }

    public function destroy($id) {
    	$video = $this->db->table('video')->getWhere(['id_video' => $id])->getRow();
    	$old_img_name = $video->gbr_video;
        if (file_exists("public/template/assets/img/video/".$old_img_name)) {
            if ($video->gbr_video != "No-image.jpg") {
                unlink("public/template/assets/img/video/".$old_img_name);
            }
        }

        $komenvid = $this->db->table('komentarvideo')->getWhere(['id_video' => $id]);
        if ($komenvid->resultID->num_rows > 0) {
            $kv = $komenvid->getRow();
            $this->db->table('komentarvideo')->where(['id_video' => $id])->delete();
        }
        $this->db->table('video')->where(['id_video' => $id])->delete();
        return redirect()->to(site_url('video'));
    }
}