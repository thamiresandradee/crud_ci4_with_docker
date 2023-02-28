<?php 

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'email', 'password'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $defaultRules = [
        'email' => [
            'rules' => 'required|valid_email',
            'errors' => [
                'required' => 'O e-mail é obrigatório',
                'valid_email' => 'O e-mail tem que ser válido'
            ]
        ],
        'password' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'O password é obrigatório'
            ]
        ]    
    ];

    public function getDefaultRules()
    {
        return $this->defaultRules;
    }
}