<?php

namespace App\Controllers;

use App\Models\LogoModel;

class Logo extends BaseController
{
    public function index()
    {
        $id = 1;
        $data['logo'] = $this->db->table('logo')->getWhere(['id_logo' => $id])->getRow();
        return view('logo/edit_logo', $data);
    }

    public function update($id) {
        $logo = new LogoModel();
        $logo_web = $logo->find($id);
        $file = $this->request->getFile('name');
        if ($file->isValid() && !$file->hasMoved()) {
            $old_img_name = $logo_web->name;
            if (file_exists("public/template/assets/img/logo/".$old_img_name)) {
                unlink("public/template/assets/img/logo/".$old_img_name);
            }
            $imageName = $file->getRandomName();
            $file->move("public/template/assets/img/logo/", $imageName);
        }else {
            $imageName = $logo_web->name;
        }

        $data = [
            'name' => $imageName,
        ];
        $this->db->table('logo')->where(['id_logo' => $id])->update($data);
        return redirect()->to(site_url('logo'))->with('success', 'Logo Berhasil Diubah');
    }
}