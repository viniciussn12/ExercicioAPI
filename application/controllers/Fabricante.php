<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fabricante extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        if (! $this->session->userdata("usuario")){
            redirect('usuario/login');
        }
    }
    
    function index(){
        redirect('fabricante/listar');
    }

    function novo(){

        if ($this->session->userdata("usuario")->tipo == 1){

            $dados_cabecalho["titulo"] = "Novo Fabricante";

            $this->load->view('template/cabecalho', $dados_cabecalho);
            $this->load->view('fabricante/novo_fabricante');
            $this->load->view('template/rodape');
        }else{
            redirect('fabricante/listar');            
        }
    }

    function salvar(){
        $fabricante = $this->input->post("nome_fabricante");
        $this->load->model('FabricanteModel');
        $this->FabricanteModel->inserir($fabricante);
        $this->session->set_flashdata('msg', "Dados inseridos com sucesso!");
        redirect('fabricante/listar');
    }

    function salvar_json(){
        $fabricante = $this->input->post("nome_fabricante");
        $this->load->model('FabricanteModel');
        $this->FabricanteModel->inserir($fabricante);
        $dados["titulo"] = "Mensagem";
        $dados["conteudo"] = "Dados inseridos com sucesso";
        echo(json_encode($dados));
    }
    
    function listar(){
        $this->load->model('FabricanteModel');
        $dados["registros"] = $this->FabricanteModel->recuperarTodos();

        $dados_cabecalho["titulo"] = "Listar fabricantes";
        $this->load->view("template/cabecalho", $dados_cabecalho);
        $this->load->view("fabricante/listar_fabricantes", $dados);
        $this->load->view("template/rodape");
    }

    function listar_json(){
        $this->load->model('FabricanteModel');
        echo(json_encode($this->FabricanteModel->recuperarTodos()));
    }   

    function detalhes($id){
        $this->load->model('FabricanteModel');
        $dados["registro"] = $this->FabricanteModel->recuperarPorId($id)[0];
        
        $dados_cabecalho["titulo"] = "Detalhes do fabricante";
        $this->load->view("template/cabecalho", $dados_cabecalho);
        $this->load->view("fabricante/detalhes_fabricante", $dados);
        $this->load->view("template/rodape", $dados_cabecalho);
    }

    function detalhes_json($id){
        $this->load->model('FabricanteModel'); 
        echo json_encode($this->FabricanteModel->recuperarPorId($id)[0]);
    }

    function editar($id){
        $this->load->model('FabricanteModel');
        $dados["registro"] = $this->FabricanteModel->recuperarPorId($id)[0];

        $dados_cabecalho["titulo"] = "Editar fabricante";
        $this->load->view("template/cabecalho", $dados_cabecalho);
        $this->load->view("fabricante/atualizar_fabricante", $dados);
        $this->load->view("template/rodape", $dados_cabecalho);
    }

    function modificar($id){
        $fabricante = $this->input->post("nome_fabricante");
        $this->load->model('FabricanteModel');
        $this->FabricanteModel->atualizar($id, $fabricante);
        $this->session->set_flashdata('msg', "Dados atualizados com sucesso!");
        redirect('fabricante/listar');
    }
    

    function modificar_json(){
        $fabricante = $this->input->post("nome_fabricante");
        $id = $this->input->post("cod_fabricante");
        $this->load->model('FabricanteModel');
        $this->FabricanteModel->atualizar($id, $fabricante);
        $dados["titulo"] = "Mensagem";
        $dados["conteudo"] = "Dados atualizados com sucesso";
        echo json_encode($dados);
    }

    function apagar($id){
        $this->load->model('FabricanteModel');
        $this->FabricanteModel->excluir($id);
        $this->session->set_flashdata('msg', "Dados excluídos com sucesso!");
        redirect('fabricante/listar');
    }

}