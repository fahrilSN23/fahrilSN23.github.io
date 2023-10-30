<?php

namespace App\Controllers;
use App\Models\ArtikelModel;

class Listartikel extends BaseController
{
    public function index()
    {
        $data['identitas'] = $this->db->table('identitas')->getWhere(['id_identitas' => 1])->getRow();
        $data['logo'] = $this->db->table('logo')->getWhere(['id_logo' => 1])->getRow();
        $data['menu'] = $this->db->table('menu')->orderBy('urutan', 'ASC')->getWhere(['id_parent' => 0, 'aktif' => 'Ya'])->getResult();
        $data['uri'] = $this->request->getUri();
    	$data['iklan_sidebar'] = $this->db->table('iklan_sidebar')->orderBy('id_iklan', 'DESC')->get()->getResult();
        $data['kategori'] = $this->db->table('kategori')->orderBy('name_kategori', 'ASC')->getWhere(['aktif' => 'Y'])->getResult();
        $data['playlist'] = $this->db->table('playlist')->orderBy('jdl_playlist', 'ASC')->getWhere(['aktif' => 'Y'])->getResult();
        $data['tag_artikel'] = $this->db->table('tag_artikel')->orderBy('nama_tag', 'ASC')->get()->getResult();
        $data['tag_video'] = $this->db->table('tag_video')->orderBy('nama_tag', 'ASC')->get()->getResult();
        $data['video'] = $this->db->table('video')->join('playlist','id_playlist')->orderBy('id_video', 'DESC')->limit(5)->get()->getResult();

        $artikel = new artikelModel();
        $data['artikel'] = $artikel->join('kategori','id_kategori')->paginate(12, 'artikel');
        $data['pager'] = $artikel->pager;
        return view('artikel/listartikel', $data);
    }

    public function tag($tagName = null)
    {
        if ($tagName != null) {
            $query = $this->db->table('tag_artikel')->getWhere(['tag_seo' => $tagName]);
            if ($query->resultID->num_rows > 0) {
                $data['identitas'] = $this->db->table('identitas')->getWhere(['id_identitas' => 1])->getRow();
                $data['logo'] = $this->db->table('logo')->getWhere(['id_logo' => 1])->getRow();
                $data['menu'] = $this->db->table('menu')->orderBy('urutan', 'ASC')->getWhere(['id_parent' => 0, 'aktif' => 'Ya'])->getResult();
                $data['uri'] = $this->request->getUri();
                $data['iklan_sidebar'] = $this->db->table('iklan_sidebar')->orderBy('id_iklan', 'DESC')->get()->getResult();
                $data['kategori'] = $this->db->table('kategori')->orderBy('name_kategori', 'ASC')->getWhere(['aktif' => 'Y'])->getResult();
                $data['playlist'] = $this->db->table('playlist')->orderBy('jdl_playlist', 'ASC')->getWhere(['aktif' => 'Y'])->getResult();
                $data['tag_artikel'] = $this->db->table('tag_artikel')->orderBy('nama_tag', 'ASC')->get()->getResult();
                $data['tag_video'] = $this->db->table('tag_video')->orderBy('nama_tag', 'ASC')->get()->getResult();
                $data['video'] = $this->db->table('video')->join('playlist','id_playlist')->orderBy('id_video', 'DESC')->limit(5)->get()->getResult();
                
                $artikel = new ArtikelModel();
                $listtag = $query->getRow();
                $data['artikel'] = $artikel->join('kategori','id_kategori')->like(['tag' => $listtag->tag_seo])->where(['status' => 'Y'])->paginate(12, 'artikel');
                $data['pager'] = $artikel->pager;
                $data['listtag'] = $listtag;
                return view('artikel/listartikel', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}