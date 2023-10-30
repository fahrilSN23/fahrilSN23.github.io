<?php

namespace App\Controllers;
use App\Models\InfoModel;
use App\Libraries\Mylibrary;

class Listinfo extends BaseController
{
    public function index()
    {
        $data['identitas'] = $this->db->table('identitas')->getWhere(['id_identitas' => 1])->getRow();
        $data['logo'] = $this->db->table('logo')->getWhere(['id_logo' => 1])->getRow();
        $data['menu'] = $this->db->table('menu')->orderBy('urutan', 'ASC')->getWhere(['id_parent' => 0, 'aktif' => 'Ya'])->getResult();
        $data['uri'] = $this->request->getUri();
        $data['kategori'] = $this->db->table('kategori')->orderBy('name_kategori', 'ASC')->getWhere(['aktif' => 'Y'])->getResult();
        $data['playlist'] = $this->db->table('playlist')->orderBy('jdl_playlist', 'ASC')->getWhere(['aktif' => 'Y'])->getResult();
        $data['tag_artikel'] = $this->db->table('tag_artikel')->orderBy('nama_tag', 'ASC')->get()->getResult();
        $data['tag_video'] = $this->db->table('tag_video')->orderBy('nama_tag', 'ASC')->get()->getResult();
        $data['artikel'] = $this->db->table('artikel')->join('kategori','id_kategori')->orderBy('id_artikel', 'DESC')->limit(5)->getWhere(['status' => 'Y'])->getResult();

        $info = new InfoModel();
        $data['info'] = $info->paginate(12, 'info');
        $data['pager'] = $info->pager;
        return view('sekilasinfo/tampilinfo', $data);
    }

    public function detail($infoName = null)
    {
        if ($infoName != null) {
            $query = $this->db->table('sekilasinfo')->getWhere(['id_sekilasinfo' => $infoName]);
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
                $data['artikel'] = $this->db->table('artikel')->join('kategori','id_kategori')->orderBy('id_artikel', 'DESC')->limit(5)->getWhere(['status' => 'Y'])->getResult();
                $data['info'] = $query->getRow();
                return view('sekilasinfo/detailinfo', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}