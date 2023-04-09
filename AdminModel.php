<?php namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    /**
	 * table name
	 */
	protected $table = "admin";

	/**
	 * allowed field
	 */
	protected $allowedFields = [
	    'Nama_admin',
		'Email',
		'Alamat'
	];

	 public function getAdmin()
    {
        return $this->findAll();
    }


    public function getAdminById($id = false)
    {
        if($id === false)
        {
            return $this->findAll();
        }
        else
        {
            return $this->getWhere(['id' => $id]);
        }   
    }

	public function updateAdmin($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('id' => $id));
        return $query;
    }

	public function deleteAdmin($id)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        return $query;
    }

    public function insertAdmin($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
}

?> 