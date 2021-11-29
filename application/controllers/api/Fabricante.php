<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Fabricante extends RestController{
    public function __construct(){
        parent::__construct();
        $this->load->model('FabricanteModel');
    }

    public function index_get($id=NULL){
        if ($id==NULL){
            $resultado = $this->FabricanteModel->recuperarTodos();
            return $this->response($resultado, RestController::HTTP_OK);
        }else{
            $resultado = $this->FabricanteModel->recuperarPorId($id);
            if (count($resultado)==0){
                $resultado["status"]=404;
                $resultado["message"]="Id inválido";
                return $this->response($resultado, RestController::HTTP_NOT_FOUND);
            }else{
                return $this->response($resultado, RestController::HTTP_OK);
            }
        }  
    }

    public function index_post(){
        $fabricante = $this->input->post("fabricante");
        $this->FabricanteModel->inserir($fabricante);
        $resultado["status"]=true;
        $resultado["mensagem"]="Dados inseridos com sucesso!";
        $this->response($resultado, RestController::HTTP_OK);
    }

    public function index_put($id){
        $fabricante = $this->put("fabricante");
        $this->FabricanteModel->atualizar($id, $fabricante);
        $resultado["status"]=true;
        $resultado["messagem"]="Dados atualizados com sucesso";
        $this->response($resultado, RestController::HTTP_OK);
    }

    public function index_delete($id){
        $this->FabricanteModel->excluir($id);
        $resultado["status"]=true;
        $resultado["mensagem"]="Dados excluídos com sucesso";
        $this->response($resultado, RestController::HTTP_OK);
    }
    
}
