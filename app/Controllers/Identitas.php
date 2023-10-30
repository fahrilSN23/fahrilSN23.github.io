<?php

namespace App\Controllers;

use App\Models\IdWebModel;

class Identitas extends BaseController
{
    public function index()
    {
        $id = 1;
        $data['identitas'] = $this->db->table('identitas')->getWhere(['id_identitas' => $id])->getRow();
        return view('identitas/edit_identitas', $data);
    }

    public function update($id) {
        $identitas = new IdWebModel();
        $identitas_web = $identitas->find($id);
        $file = $this->request->getFile('favicon');
        if ($file->isValid() && !$file->hasMoved()) {
            $old_img_name = $identitas_web->favicon;
            if (file_exists("public/template/assets/img/favicon/".$old_img_name)) {
                unlink("public/template/assets/img/favicon/".$old_img_name);
            }
            $imageName = $file->getRandomName();
            $file->move("public/template/assets/img/favicon/", $imageName);
        }else {
            $imageName = $identitas_web->favicon;
        }

        $data = [
            'nama_website' => $this->request->getPost('nama_website'),
            'email' => $this->request->getPost('email'),
            'facebook' => $this->request->getPost('facebook'),
            'instagram' => $this->request->getPost('instagram'),
            'youtube' => $this->request->getPost('youtube'),
            'no_telp' => $this->request->getPost('no_telp'),
            'meta_deskripsi' => $this->request->getPost('meta_deskripsi'),
            'meta_keyword' => $this->request->getPost('meta_keyword'),
            'favicon' => $imageName,
            'maps' => $this->request->getPost('maps'),
        ];
        $this->db->table('identitas')->where(['id_identitas' => $id])->update($data);
        return redirect()->to(site_url('identitas_web'))->with('success', 'identitas Berhasil Diubah');
    }
}