<?php

namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;
use App\Models\ClienteModel;

class Clientes extends ResourceController
{

    public function __construct()
    {
        $this->model = $this->setModel(new ClienteModel());
    }

    public function index()
    {
        try {
            $clientes = $this->model->findAll();

            return $this->respond($clientes);
        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }


    public function create()
    {
        try {
            $cliente = $this->request->getJSON();

            if($this->model->insert($cliente)):
                $cliente->id = $this->model->insertID();
                return $this->respondCreated($cliente);

            else:
                return $this->failValidationErrors($this->model->validation->listErrors());
            endif;
        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor'.$e);
        }
    }

}
