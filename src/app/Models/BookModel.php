<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'books';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['title', 'description', 'author', 'page_number'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $defaultRules = [
        'title' => [
            'rules' => 'required|max_length[255]|is_unique[books.title]',
            'errors' => [
                'required' => 'Este campo é obrigatório.',
                'is_unique' => '\'{$value}\' já existe. Por favor defina outro título.',
                'max_length' => 'O valor deve ser menor que {param} caracteres.'
            ]
        ],
        'description' => [
            'rules' => 'required|max_length[255]',
            'errors' => [
                'required' => 'Este campo é obrigatório.',
                'max_length' => 'O campo deve ser menor que {param} caracteres.'
            ]
        ],
        'author' => [
            'rules' => 'required|max_length[255]',
            'errors' => [
                'required' => 'Este campo é obrigatório.',
                'max_length' => 'O valor ser menor que {param} caracteres.'
            ]
        ],
        'page_number' => [
            'rules' => 'required|integer',
            'errors' => [
                'required' => 'Este campo é obrigatório.',
                'integer' => 'O valor ser um número.'
            ]
        ]
    ];    

    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getBook($key = null, $id = 'id')
    {
        if (empty($key)) {
            return $this->findAll();
        } elseif ($id !== $this->primaryKey) {
            return $this->where([$id => $key])->first();
        } else {
            return $this->find($key);
        }
    }

    public function getDefaultRules()
    {
        return $this->defaultRules;
    }

    public function search($filterParam)
    {
        $filter = $this->table('books');
        return $filter->like('title', $filterParam)->orLike('author', $filterParam);
    }
}
