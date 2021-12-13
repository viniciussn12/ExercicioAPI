<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Grupo extends RestController{
    public function __construct(){
        parent::__construct();
        $this->load->model('GrupoModel');
    }

    public function index_get($id=NULL){
        if ($id==NULL){
            $resultado = $this->GrupoModel->recuperarTodos();
            return $this->response($resultado, RestController::HTTP_OK);
        }else{
            $resultado = $this->GrupoModel->recuperarPorId($id);
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
        $grupo = $this->input->post("grupo");
        $this->GrupoModel->inserir($grupo);
        $resultado["status"]=true;
        $resultado["mensagem"]="Dados inseridos com sucesso!";
        $this->response($resultado, RestController::HTTP_OK);
    }

    public function index_put($id){
        $grupo = $this->put("grupo");
        $this->GrupoModel->atualizar($id, $grupo);
        $resultado["status"]=true;
        $resultado["messagem"]="Dados atualizados com sucesso";
        $this->response($resultado, RestController::HTTP_OK);
    }

    public function index_delete($id){
        $this->GrupoModel->excluir($id);
        $resultado["status"]=true;
        $resultado["mensagem"]="Dados excluídos com sucesso";
        $this->response($resultado, RestController::HTTP_OK);
    }
}
