<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class FornecedorModel extends CI_Model{

        function inserir($fornecedor){
            $sql = "INSERT INTO fornecedor (fornecedor) values (?)";
            $dados = array($fornecedor);
            $this->db->query($sql, $dados);
        }

        function recuperarTodos(){
            $sql = "SELECT * from fornecedor";
            return $this->db->query($sql)->result();
        }

        function recuperarPorId($id){
            $sql = "SELECT * from fornecedor where codfornecedor = ?";
            $dados = array($id);
            return $this->db->query($sql, $dados)->result();
        }

        function atualizar($id, $fornecedor){
            $sql = "UPDATE fornecedor set fornecedor = ? where codfornecedor = ?";
            $dados = array($fornecedor, $id);
            $this->db->query($sql, $dados);
        }

        function excluir($id){
            $sql = "DELETE from fornecedor where codfornecedor = ?";
            $dados = array($id);
            $this->db->query($sql, $dados);
        }

    }