<?php

namespace App\Controllers;
use App\Models\AlbumModel;

class Listfoto extends BaseController
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

        $album = new AlbumModel();
        $data['album'] = $album->where('aktif', 'Y')->paginate(12, 'album');
        $data['pager'] = $album->pager;
        return view('album/tampilalbum', $data);
    }

    public function detail($FotoName = null)
    {
        if ($FotoName != null) {
            $album = $this->db->table('album')->getWhere(['album_seo' => $FotoName])->getRow();
            $query = $this->db->table('gallery')->getWhere(['id_album' => $album->id_album]);
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
            $data['tot_gallery'] = $query->resultID->num_rows;
            $data['gallery'] = $query->getResult();
            $data['album'] = $album;
            return view('album/galery/detailgallery', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}