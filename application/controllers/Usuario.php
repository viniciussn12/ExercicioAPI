<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function novo()
	{
        $this->load->view('usuario/registrar');
    }

    public function registrar(){
        $nome = $this->input->post('nome');
        $login = $this->input->post('login');
        $senha = $this->input->post('senha');

        $this->load->model('UsuarioModel');
        $this->UsuarioModel->inserir($nome, $login, md5($senha));

        $this->session->set_flashdata("msg", "Dados inseridos com sucesso!");
        redirect('usuario/novo');

    }

    public function login()
	{
        $this->load->view('usuario/login');
    }

    public function autenticar(){

        if ($this->input->post("tipo_login") && $this->input->post("tipo_login") == "api"){
            $usuario['nome'] =  $this->input->post("nome");
            $usuario['login'] =  $this->input->post("login");   
            $usuario['foto'] =  $this->input->post("foto");    
            $usuario['tipo'] =  2;

            $usuario = (object) $usuario;
            $this->session->set_userdata("usuario", $usuario);
            echo (json_encode($usuario));
            
        }else{

            $login = $this->input->post("login");
            $senha = $this->input->post("senha");

            $this->load->model('UsuarioModel');

            $usuario = $this->UsuarioModel->recuperarPorLoginESenha($login, md5($senha));

            if ($usuario){
                $this->session->set_userdata("usuario", $usuario[0]);
                redirect('/');
            }else{
                $this->session->set_flashdata("msg", "Login ou senha inválidos");
                redirect("usuario/login");
            }
        }
    }

    function logoff(){
        $this->session->unset_userdata("usuario");
        $this->session->set_flashdata("logoff_api", "S");
        redirect("usuario/login");
    }


    function alterardados(){
        $dados_cabecalho['titulo'] = "Alterar dados";  
        $this->load->view('template/cabecalho', $dados_cabecalho);
        $this->load->view('usuario/alterardados');
        $this->load->view('template/rodape');
    }

    function uploadfoto(){
        $config["upload_path"] = "assets/imagens/";
        $config["max_size"] = 2048;
        $config["allowed_types"] = "gif|jpg|jpeg|png";

        $this->load->library('upload', $config);

        if (! $this->upload->do_upload('foto_usuario')){
            $msg = $this->upload->display_errors();
            $this->session->set_flashdata('msg', $msg);
        
        }else{
            $arquivo = $this->upload->data();
            $caminho_do_arquivo = $config["upload_path"].$arquivo['file_name'];
            

            $caminho_do_arquivo = $this->move_file_to_external_server($arquivo['file_name']);
            #$caminho_do_arquivo = "assets/imagens/".$arquivo['file_name'];

            print("arquivo movido para diretório");

            $this->load->model('UsuarioModel');
            $cod = $this->session->userdata('usuario')->codusuario;
            $this->UsuarioModel->atualizarFoto($caminho_do_arquivo, $cod);

            $msg = "Upload realizado com sucesso!";
            $this->session->set_flashdata('msg', $msg);
        }
        redirect('usuario/alterardados');

    } 

    function move_file_to_external_server($filename){
        
        $this->load->library('ftp');
        //FTP configuration
        $ftp_config['hostname'] = 'ENDEREÇO_DO_SERVIDOR_FTP';
        $ftp_config['username'] = 'USUARIO_DO_SERVIDOR_FTP';
        $ftp_config['password'] = 'SENHA_DO_SERVIDOR_FTP';
        $ftp_config['debug']    = FALSE;

        $local_file = "assets/imagens/".$filename;
        $remote_file = "/assets/".$filename;
        echo "Local: ".$local_file."<br/>";
        echo "Remote: ".$remote_file;
      
        $this->ftp->connect($ftp_config);

        $this->ftp->upload($local_file, $remote_file);

        return "BASE_URL_DO_SERVIDOR_REMOTO".$remote_file;
    }

}
