<?php
namespace App\Controllers;
use App\Models\AdminModel;

class Admin extends BaseController
{
    /**
	 * index function
	 */
	public function index()
	{
	    //model initialize
		$AdminModel = new AdminModel();
		$pager = \config\Services::pager();

		$data = array(
		    'AdminModel' => $AdminModel->paginate(2, 'admin'),
			'pager' => $AdminModel->pager
		);

		return view('admin', $data);
	}
	public function update($id) 
	{
		$model = new AdminModel();
		$data['admin'] = $model->getAdminById($id)->getRow(); //ambil function getMahasiswaById di model
        echo view('edit_admin', $data);
	}
	public function edit() 
	{
		$model = new AdminModel();
        $id = $this->request->getPost('id');
        $data = array(
            'nama_admin'  => $this->request->getPost('Nama_admin'),
            'email' => $this->request->getPost('Email'),
			'alamat' => $this->request->getPost('Alamat'),
        );
        $model->updateAdmin($data, $id);
        return redirect()->to('/admin');
	}
	public function delete($id) 
	{
		$model = new AdminModel();
        $model->deleteAdmin($id);
        return redirect()->to('/admin');
	}
	public function input()
	{
		echo view('input_admin');
	}

	public function insert()
	{
		$model = new AdminModel();
		//$id = $this->request->getPost('id');
		$data = array (
			'Nama_admin'  => $this->request->getPost('Nama_admin'),
			'Email' => $this->request->getPost('Email'),
			'Alamat' => $this->request->getPost('Alamat'),
		);
		$model->insertAdmin($data);
		return redirect()->to('/admin');   
	}

    }


?>

