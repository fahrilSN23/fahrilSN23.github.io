<?php

namespace App\Controllers;
use App\Models\ArtikelModel;

class KategoriArtikel extends BaseController
{
    public function detail($pageName = null, $juduSeo = null)
    {
        if ($pageName != null && $juduSeo == null) {
            $query = $this->db->table('kategori')->getWhere(['slug_kategori' => $pageName, 'aktif' => 'Y']);
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
                $listkat = $query->getRow();
                $data['artikel'] = $artikel->where(['id_kategori' => $listkat->id_kategori, 'status' => 'Y'])->paginate(12, 'artikel');
                $data['pager'] = $artikel->pager;
                $data['listkat'] = $listkat;
                return view('artikel/tampilartikel', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else if ($pageName != null && $juduSeo != null) {
            $query = $this->db->table('artikel')->join('kategori','id_kategori')->getWhere(['judul_seo' => $juduSeo]);
            if ($query->resultID->num_rows > 0) {
                $data['identitas'] = $this->db->table('identitas')->getWhere(['id_identitas' => 1])->getRow();
                $data['logo'] = $this->db->table('logo')->getWhere(['id_logo' => 1])->getRow();
                $data['menu'] = $this->db->table('menu')->orderBy('urutan', 'ASC')->getWhere(['id_parent' => 0, 'aktif' => 'Ya'])->getResult();
                $data['uri'] = $this->request->getUri();
                $data['iklan_sidebar'] = $this->db->table('iklan_sidebar')->orderBy('id_iklan', 'DESC')->limit(2)->get()->getResult();
                $data['kategori'] = $this->db->table('kategori')->orderBy('name_kategori', 'ASC')->getWhere(['aktif' => 'Y'])->getResult();
                $data['playlist'] = $this->db->table('playlist')->orderBy('jdl_playlist', 'ASC')->getWhere(['aktif' => 'Y'])->getResult();
                $data['tag_artikel'] = $this->db->table('tag_artikel')->orderBy('nama_tag', 'ASC')->get()->getResult();
                $data['tag_video'] = $this->db->table('tag_video')->orderBy('nama_tag', 'ASC')->get()->getResult();
                $data['listartikel'] = $this->db->query("SELECT * FROM artikel a JOIN kategori b ON a.id_kategori = b.id_kategori WHERE judul_seo != '$juduSeo' AND status = 'Y' LIMIT 5")->getResult();
                $data['artikel'] = $query->getRow();
                return view('artikel/detailartikel', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}
        