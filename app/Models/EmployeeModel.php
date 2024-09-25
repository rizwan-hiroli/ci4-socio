<?php
namespace App\Models;
use CodeIgniter\Model;
class EmployeeModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'employee';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDelete        = false;
    protected $protectFields        = true;
    protected $allowedFields        = [
        "emp_code",
        "emp_fname",
        "emp_lname",
        "emp_email",
        "emp_phone",
        "password"
    ];
    /* Date Format definition */
    protected $useTimestamps        = false;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    /* Validation Rules */
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
    /* Callbacks definition */
    protected $allowCallbacks       = true;
    protected $beforeInsert         = ["beforeInsert"];
    protected $beforeUpdate         = ["beforeUpdate"];
    protected function beforeInsert(array $params)
    {
        $params = $this->passwordHash($params);
        return $params;
    }
    
    protected function passwordHash(array $params)
    {
            if (isset($params['data']['password'])) {
            $params['data']['password'] = password_hash($params['data']['password'], PASSWORD_DEFAULT);
        }
        return $params;
    }

    protected function beforeUpdate(array $params)
    {
        $params = $this->passwordHash($params);
        return $params;
    }
     
}