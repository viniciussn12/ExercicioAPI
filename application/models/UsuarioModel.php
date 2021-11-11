<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class UsuarioModel extends CI_Model{

        function inserir($nome, $login, $senha){
            $sql = "INSERT INTO usuario (nome, login, senha) values (?, ?, ?)";
            $dados = array($nome, $login, $senha);
            return $this->db->query($sql, $dados);
        }

        

        function atualizar($nome, $login, $senha, $foto, $codusuario){
            $sql = "UPDATE usuario set nome = ?, login = ?, senha = ?, foto = ? where codusuario = ?";
            $dados = array($nome, $login, $senha, $foto, $codusuario);
            $this->db->query($sql, $dados);
        }

        function recuperarPorLoginESenha($login, $senha){
            $sql = "SELECT * from usuario where login = ? and senha = ?";
            $dados = array($login, $senha);
            return $this->db->query($sql, $dados)->result();            
        }

        function recuperarPorId($id){
            $sql = "SELECT * from usuario where codusuario = ?";
            $dados = array($id);
            return $this->db->query($sql, $dados)->result();

        }

        function atualizarFoto($caminho, $cod){
            $sql = "UPDATE usuario set foto = ? WHERE codusuario = ?";
            $dados = array($caminho, $cod);
            $this->db->query($sql, $dados);
        }
    }
