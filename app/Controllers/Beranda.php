<?php

namespace App\Controllers;

class Beranda extends BaseController
{
    public function index()
    {
        $data['identitas'] = $this->db->table('identitas')->getWhere(['id_identitas' => 1])->getRow();
        $data['logo'] = $this->db->table('logo')->getWhere(['id_logo' => 1])->getRow();
        $data['menu'] = $this->db->table('menu')->orderBy('urutan', 'ASC')->getWhere(['id_parent' => 0, 'aktif' => 'Ya'])->getResult();
        $data['uri'] = $this->request->getUri();
    	$data['iklan_slide'] = $this->db->table('iklan_slide')->orderBy('id_iklan', 'DESC')->get()->getResult();
    	$data['iklan_sidebar'] = $this->db->table('iklan_sidebar')->orderBy('id_iklan', 'DESC')->get()->getResult();
    	$data['artikel'] = $this->db->table('artikel')->join('kategori','id_kategori')->orderBy('id_artikel', 'DESC')->getWhere(['headline' => 'Y','status' => 'Y'])->getResult();
    	$data['video'] = $this->db->table('video')->join('playlist','id_playlist')->orderBy('id_video', 'DESC')->get()->getResult();
    	$data['agenda'] = $this->db->table('agenda')->orderBy('id_agenda', 'DESC')->get()->getResult();
    	$data['sekilasinfo'] = $this->db->table('sekilasinfo')->orderBy('id_sekilasinfo', 'DESC')->getWhere(['aktif' => 'Y'])->getResult();
    	$data['kategori'] = $this->db->table('kategori')->orderBy('name_kategori', 'ASC')->getWhere(['aktif' => 'Y'])->getResult();
    	$data['playlist'] = $this->db->table('playlist')->orderBy('jdl_playlist', 'ASC')->getWhere(['aktif' => 'Y'])->getResult();
    	$data['tag_artikel'] = $this->db->table('tag_artikel')->orderBy('nama_tag', 'ASC')->get()->getResult();
    	$data['tag_video'] = $this->db->table('tag_video')->orderBy('nama_tag', 'ASC')->get()->getResult();
        return view('beranda', $data);
    }
	
	public function search() {
		$search = $this->request->getGet('search');
		
		if($search) {
			$data['identitas'] = $this->db->table('identitas')->getWhere(['id_identitas' => 1])->getRow();
			$data['logo'] = $this->db->table('logo')->getWhere(['id_logo' => 1])->getRow();
			$data['menu'] = $this->db->table('menu')->orderBy('urutan', 'ASC')->getWhere(['id_parent' => 0, 'aktif' => 'Ya'])->getResult();
			$data['uri'] = $this->request->getUri();
			$data['kategori'] = $this->db->table('kategori')->orderBy('name_kategori', 'ASC')->getWhere(['aktif' => 'Y'])->getResult();
			$data['artikel'] = $this->db->query("SELECT * FROM artikel WHERE judul LIKE '%$search%' OR isi_artikel LIKE '%$search%' AND status = 'Y'")->getResult();
			$data['video'] = $this->db->query("SELECT * FROM video WHERE jdl_video LIKE '%$search%' OR keterangan LIKE '%$search%'")->getResult();
			$data['agenda'] = $this->db->query("SELECT * FROM agenda WHERE tema LIKE '%$search%' OR isi_agenda LIKE '%$search%'")->getResult();
			$data['playlist'] = $this->db->table('playlist')->orderBy('jdl_playlist', 'ASC')->getWhere(['aktif' => 'Y'])->getResult();
			$data['tag_artikel'] = $this->db->table('tag_artikel')->orderBy('nama_tag', 'ASC')->get()->getResult();
			$data['tag_video'] = $this->db->table('tag_video')->orderBy('nama_tag', 'ASC')->get()->getResult();
			return view('hasil_pencarian', $data);
		}else{
			return redirect()->to(site_url('beranda'));
		}

    }
}
