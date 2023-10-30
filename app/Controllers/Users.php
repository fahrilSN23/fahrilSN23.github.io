<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index()
    {
        $builder = $this->db->table('users');
        $query   = $builder->orderBy('id_user', 'DESC')->get();
        
        $data['users'] = $query->getResult();
        return view('users/get', $data);
    }

    public function create() {
        return view('users/add');
    }

    public function save() {
        // Validasi input
        if (!$this->validate([
            'email_user' => 'required|max_length[254]|valid_email|is_unique[users.email_user]'
        ])) {
            return redirect()->to(site_url('users/add'))->with('error', 'Email telah terdaftar');
        }

        $file = $this->request->getFile('foto');

    	if ($file->isValid() && !$file->hasMoved()) {
	    	$imageName = $file->getRandomName();
	        $file->move("public/template/assets/img/avatar/", $imageName);
		}else{
			$imageName = "avatar-2.png";
		}

    	$data = [
            'foto' => $imageName,
            'nama_user' => $this->request->getVar('nama_user'),
            'email_user' => $this->request->getVar('email_user'),
            'password_user' => password_hash($this->request->getVar('password_user'),null),
            'level_user' => $this->request->getVar('level_user'),
        ];

        $this->db->table('users')->insert($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('users'))->with('success', 'Data Berhasil Disimpan');
        }
    }

    public function edit($id = null) {
    	if ($id != null) {
            if (userLogin()->level_user == 'Administrator') {
                $query = $this->db->table('users')->getWhere(['id_user' => $id]);
            } else {
                $query = $this->db->table('users')->getWhere(['id_user' => userLogin()->id_user]);
            }
            
            if ($query->resultID->num_rows > 0) {
                $data['users'] = $query->getRow();
		    	return view('users/edit', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update($id) {
        $file = $this->request->getFile('foto');
        $password = $this->request->getVar('password_user');
        $users = $this->db->table('users')->getWhere(['id_user' => $id])->getRow();
        if ($file->isValid() && !$file->hasMoved()) {
            $old_img_name = $users->foto;
            if (file_exists("public/template/assets/img/avatar/".$old_img_name)) {
            	if ($users->foto != "avatar-2.png") {
	                unlink("public/template/assets/img/avatar/".$old_img_name);
            	}
            }
            $imageName = $file->getRandomName();
            $file->move("public/template/assets/img/avatar/", $imageName);
        }else {
            $imageName = $users->foto;
        }

        if (!empty($password)) {
            $password_user = password_hash($password,null);
        } else {
            $password_user = $users->password_user;
        }

        if (userLogin()->level_user == 'Administrator') {
            $level_user = $this->request->getVar('level_user');
        } else {
            $level_user = "Operator";
        }
        
        

        $data = [
            'foto' => $imageName,
            'nama_user' => $this->request->getVar('nama_user'),
            'email_user' => $this->request->getVar('email_user'),
            'password_user' => $password_user,
            'level_user' => $level_user,
        ];
        $this->db->table('users')->where(['id_user' => $id])->update($data);
        if (userLogin()->level_user != 'Administrator') {
            return redirect()->to(site_url('users/edit/'.$id))->with('success', 'users Berhasil Diubah');
        } else {
            return redirect()->to(site_url('users'))->with('success', 'users Berhasil Diubah');
        }
        
    }

    public function destroy($id) {
    	$users = $this->db->table('users')->getWhere(['id_user' => $id])->getRow();
    	$old_img_name = $users->foto;
        if (file_exists("public/template/assets/img/avatar/".$old_img_name)) {
            if ($users->foto != "avatar-2.png") {
                unlink("public/template/assets/img/avatar/".$old_img_name);
            }
        }
        $this->db->table('users')->where(['id_user' => $id])->delete();
        return redirect()->to(site_url('users'));
    }
}