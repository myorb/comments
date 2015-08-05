<?php
namespace Models;

use Core\Model;
use PDO;

class Comments extends Model
{
    public $tablename = 'smvc_comments';

    public function getAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM $this->tablename WHERE 1=1");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function getAllVisible()
    {
        $stmt = $this->db->prepare("SELECT * FROM $this->tablename WHERE status=1");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function getOne($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM $this->tablename WHERE id=".$id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    //TO DO
    public function create($data)
    {
        return $this->db->insert($this->tablename,$data);
    }
    public function update($id)
    {
        return $this->db->raw("SELECT * FROM comments WHERE 1=1");
    }
}
