<?php
namespace App\base;
class baseModel {
    protected $db;
    protected $PK = "id";
    protected $TABLE;

    public function __construct($db, $pk, $table) {
        $this->db = $db;
        $this->PK = $pk;
        $this->TABLE = $table;
    }

    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM $this->TABLE");
        $stmt->execute();
        
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM $this->TABLE WHERE $this->PK = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        return $stmt->fetch();
    }

    public function insert($data) {
        $columns = implode(", ", array_keys($data));
        $values = ":" . implode(", :", array_keys($data));
        $stmt = $this->db->prepare("INSERT INTO $this->TABLE ($columns) VALUES ($values)");
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        
        return $stmt->execute();
    }

    public function update($id, $data) {
        $set = "";
        foreach ($data as $key => $value) {
            $set .= "$key = :$key, ";
        }
        $set = rtrim($set, ", ");
        $stmt = $this->db->prepare("UPDATE $this->TABLE SET $set WHERE $this->PK = :id");
        $stmt->bindParam(':id', $id);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM $this->TABLE WHERE $this->PK = :id");
        $stmt->bindParam(':id', $id);
        
        return $stmt->execute();
    }

    public function querySingle($sql, $data = []) {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);
        
        return $stmt->fetch();
    }

    public function query($sql, $data = []) {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);
        
        return $stmt->fetchAll();
    }
}
