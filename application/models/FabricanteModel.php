<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class FabricanteModel extends CI_Model{

        function inserir($fabricante){
            $sql = "INSERT INTO fabricante (fabricante) values (?)";
            $dados = array($fabricante);
            $this->db->query($sql, $dados);
        }

        function recuperarTodos(){
            $sql = "SELECT * from fabricante";
            return $this->db->query($sql)->result();
        }

        function recuperarPorId($id){
            $sql = "SELECT * from fabricante where codfabricante = ?";
            $dados = array($id);
            return $this->db->query($sql, $dados)->result();
        }

        function atualizar($id, $fabricante){
            $sql = "UPDATE fabricante set fabricante = ? where codfabricante = ?";
            $dados = array($fabricante, $id);
            $this->db->query($sql, $dados);
        }

        function excluir($id){
            $sql = "DELETE from fabricante where codfabricante = ?";
            $dados = array($id);
            $this->db->query($sql, $dados);
        }

    }