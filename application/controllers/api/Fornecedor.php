<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Fornecedor extends RestController{
    public function __construct(){
        parent::__construct();
        $this->load->model('PREENCHA_AQUI_O_NOME_DO_MODEL');
    }

    public function index_get($id=NULL){
    
    }

    public function index_post(){
        
    }

    public function index_put($id){
        
    }

    public function index_delete($id){
       
    }
}
