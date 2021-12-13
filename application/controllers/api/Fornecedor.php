<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Fornecedor extends RestController{
    public function __construct(){
        parent::__construct();
        $this->load->model('FornecedorModel');
    }

    public function index_get($id=NULL){
        if ($id==NULL){
            $resultado = $this->FornecedorModel->recuperarTodos();
            return $this->response($resultado, RestController::HTTP_OK);
        }else{
            $resultado = $this->FornecedorModel->recuperarPorId($id);
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
        $fornecedor = $this->input->post("fornecedor");
        $this->FornecedorModel->inserir($fornecedor);
        $resultado["status"]=true;
        $resultado["mensagem"]="Dados inseridos com sucesso!";
        $this->response($resultado, RestController::HTTP_OK);
    }

    public function index_put($id){
        $fornecedor = $this->put("fornecedor");
        $this->FornecedorModel->atualizar($id, $fornecedor);
        $resultado["status"]=true;
        $resultado["messagem"]="Dados atualizados com sucesso";
        $this->response($resultado, RestController::HTTP_OK);
    }

    public function index_delete($id){
        $this->FornecedorModel->excluir($id);
        $resultado["status"]=true;
        $resultado["mensagem"]="Dados excluídos com sucesso";
        $this->response($resultado, RestController::HTTP_OK);
    }
}
