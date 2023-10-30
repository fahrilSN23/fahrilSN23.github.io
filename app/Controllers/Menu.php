<?php

namespace App\Controllers;
use \App\Libraries\Mylibrary;

class Menu extends BaseController
{
    public function index()
    {
        $data['menu_utama'] = $this->db->table('menu')->orderBy('urutan', 'ASC')->getWhere(['id_parent' => 0])->getResult();        
        $data['halaman'] = $this->db->table('halaman')->get()->getResult();
        $data['kategori'] = $this->db->table('kategori')->getWhere(['aktif' => 'Y'])->getResult();
        $data['playlist'] = $this->db->table('playlist')->getWhere(['aktif' => 'Y'])->getResult();
        $uri = $this->request->getUri();
        if ($uri->getSegment(2)) {
            $data['edit_menu'] = $this->db->table('menu')->getWhere(['id_menu' => $uri->getSegment(2)])->getRow();
        }
        $data['uri'] = $uri;
        return view('menu/index', $data);
    }

    public function save()
    {
        if ($this->request->getVar('link_input') != '') {
            $data = [
                'id_parent' => $this->request->getVar('id_parent'),
                'nama_menu' => $this->request->getVar('nama_menu'),
                'link' => Mylibrary::seo_title($this->request->getVar('link_input')),
                'urutan' => $this->request->getVar('urutan'),
            ];
        } else if ($this->request->getVar('halaman_input') != '') {
            $data = [
                'id_parent' => $this->request->getVar('id_parent'),
                'nama_menu' => $this->request->getVar('nama_menu'),
                'link' => $this->request->getVar('halaman_input'),
                'urutan' => $this->request->getVar('urutan'),
            ];
        } else if ($this->request->getVar('kategori_input') != '') {
            $data = [
                'id_parent' => $this->request->getVar('id_parent'),
                'nama_menu' => $this->request->getVar('nama_menu'),
                'link' => $this->request->getVar('kategori_input'),
                'urutan' => $this->request->getVar('urutan'),
            ];
        } else if ($this->request->getVar('playlist_input') != '') {
            $data = [
                'id_parent' => $this->request->getVar('id_parent'),
                'nama_menu' => $this->request->getVar('nama_menu'),
                'link' => $this->request->getVar('playlist_input'),
                'urutan' => $this->request->getVar('urutan'),
            ];
        }
        

        $this->db->table('menu')->insert($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('menu_web'))->with('success', 'Data Berhasil Disimpan');
        }
    }

    public function update($id) {
        $data = [
            'nama_menu' => $this->request->getVar('nama_menu'),
            'link' => Mylibrary::seo_menu($this->request->getVar('link')),
            'urutan' => $this->request->getVar('urutan'),
        ];

        $this->db->table('menu')->where(['id_menu' => $id])->update($data);
        return redirect()->to(site_url('menu_web'))->with('success', 'Data Berhasil Diubah');
    }

    public function status($id)
    {
        $query = $this->db->table('menu')->getWhere(['id_menu' => $id])->getRow();
        if ($query->aktif == 'Ya') {
            $data = [
                'aktif' => 'Tidak',
            ];
            $status = 'Menu <b>' . $query->nama_menu . '</b> berhasil <b>di Non-Aktifkan</b>';
        } else {
            $data = [
                'aktif' => 'Ya',
            ];
            $status = 'Menu <b>' . $query->nama_menu . '</b> berhasil <b>di Aktifkan</b>';
        }
        

        $this->db->table('menu')->where(['id_menu' => $id])->update($data);
        return redirect()->to(site_url('menu_web'))->with('success', $status);
    }

    public function delete($id)
    {
        $menu = $this->db->table('menu')->getWhere(['id_parent' => $id])->getNumRows();
        if ($menu > 0) {
            $this->db->table('menu')->where(['id_parent' => $id])->delete();
        }
        $this->db->table('menu')->where(['id_menu' => $id])->delete();
        return redirect()->to(site_url('menu_web'));
    }
}