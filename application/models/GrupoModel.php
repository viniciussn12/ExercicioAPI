<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class GrupoModel extends CI_Model{

        function inserir($grupo){
            $sql = "INSERT INTO grupo (grupo) values (?)";
            $dados = array($grupo);
            $this->db->query($sql, $dados);
        }

        function recuperarTodos(){
            $sql = "SELECT * from grupo";
            return $this->db->query($sql)->result();
        }

        function recuperarPorId($id){
            $sql = "SELECT * from grupo where codgrupo = ?";
            $dados = array($id);
            return $this->db->query($sql, $dados)->result();
        }

        function atualizar($id, $grupo){
            $sql = "UPDATE grupo set grupo = ? where codgrupo = ?";
            $dados = array($grupo, $id);
            $this->db->query($sql, $dados);
        }

        function excluir($id){
            $sql = "DELETE from grupo where codgrupo = ?";
            $dados = array($id);
            $this->db->query($sql, $dados);
        }

    }