<?php namespace App\Models;
use CodeIgniter\Model;

class ClienteModel extends Model
{

    protected $table = "clientes";
    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields =  ['nombre','apellido','telefono'];

    protected $useTimestamps = true;
    protected $createdfield = 'created_at';
    protected $updatedfield = 'updated_at';

    protected $validationRules = [
        'nombre' => 'required|alpha_space|min_length[3]|max_length[75]',
        'apellido' => 'required|alpha_space|min_length[3]|max_length[75]',
        'telefono' => 'required|alpha_numeric_space|min_length[3]|max_length[75]',
        'email' => 'permit_empty|valid_email|min_length[3]|max_length[85]',
    ];

    protected $validationMessages = [
        'nombre'    => [
            'required' => 'Estimado usuario, debe ingresar un nombre valido'
        ],
        'email'    => [
            'valid_email' => 'Estimado usuario, debe ingresar un email valido'
        ]

        ];



}