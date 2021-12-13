<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Cliente extends RestController{
    public function __construct(){
        parent::__construct();
        $this->load->model('ClienteModel');
    }

    public function index_get($id=NULL){
        if($id == NULL){
            $resultado = $this->ClienteModel->recuperarTodos();
            return $this->response($resultado, RestController::HTTP_OK);
        }else{
            $resultado = $this->ClienteModel->recuperarPorId($id);
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
        $cliente = $this->input->post("Cliente");
        $this->ClienteModel->inserir($Cliente);
        $resultado["status"]=true;
        $resultado["mensagem"]="Dados inseridos com sucesso!";
        $this->response($resultado, RestController::HTTP_OK);
    }

    public function index_put($id){
        $cliente = $this->put("cliente");
        $this->ClienteModel->atualizar($id, $cliente);
        $resultado["status"]=true;
        $resultado["messagem"]="Dados atualizados com sucesso";
        $this->response($resultado, RestController::HTTP_OK);
    }

    public function index_delete($id){
        $this->ClienteModel->excluir($id);
        $resultado["status"]=true;
        $resultado["mensagem"]="Dados excluídos com sucesso";
        $this->response($resultado, RestController::HTTP_OK);
    }
}
