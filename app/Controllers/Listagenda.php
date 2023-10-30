<?php

namespace App\Controllers;
use App\Models\AgendaModel;
use App\Libraries\Mylibrary;

class Listagenda extends BaseController
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

        $agenda = new agendaModel();
        $data['agenda'] = $agenda->paginate(12, 'agenda');
        $data['pager'] = $agenda->pager;
        return view('agenda/tampilagenda', $data);
    }

    public function detail($agendaName = null)
    {
        if ($agendaName != null) {
            $query = $this->db->table('agenda')->getWhere(['tema_seo' => $agendaName]);
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
                $data['agenda'] = $query->getRow();
                return view('agenda/detailagenda', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}