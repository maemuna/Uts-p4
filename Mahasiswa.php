<?php
namespace App\Controllers;
use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController
{
    /**
	 * index function
	 */
	public function index()
	{
	    //model initialize
		$MahasiswaModel = new MahasiswaModel();
		$pager = \config\Services::pager();

		$data = array(
		    'MahasiswaModel' => $MahasiswaModel->paginate(2, 'mahasiswa'),
			'pager' => $MahasiswaModel->pager
		);

		return view('mahasiswa', $data);
	}
	public function update($id) 
	{
		$model = new MahasiswaModel();
		$data['mahasiswa'] = $model->getMahasiswaById($id)->getRow(); //ambil function getMahasiswaById di model
        echo view('edit_mahasiswa', $data);
	}
	public function edit() 
	{
		$model = new MahasiswaModel();
        $id = $this->request->getPost('id_mahasiswa');
        $data = array(
            'nim'  => $this->request->getPost('Nim'),
            'nama_mahasiswa' => $this->request->getPost('Nama_mahasiswa'),
			'email' => $this->request->getPost('Email'),
        );
        $model->updateMahasiswa($data, $id);
        return redirect()->to('/mahasiswa');
	}
	public function delete($id) 
	{
		$model = new MahasiswaModel();
        $model->deleteMahasiswa($id);
        return redirect()->to('/mahasiswa');
	}
	public function input()
	{
		echo view('input_mahasiswa');
	}

	public function insert()
	{
		$model = new MahasiswaModel();
		//$id = $this->request->getPost('id');
		$data = array (
			'Nim'  => $this->request->getPost('Nim'),
			'Nama_mahasiswa' => $this->request->getPost('Nama_Mahasiswa'),
			'Email' => $this->request->getPost('Email'),
		);
		$model->insertMahasiswa($data);
		return redirect()->to('/mahasiswa');   
	}

    }


?>

