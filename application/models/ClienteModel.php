<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class ClienteModel extends CI_Model{

        function inserir($cliente){
            $sql = "INSERT INTO cliente (cliente) values (?)";
            $dados = array($cliente);
            $this->db->query($sql, $dados);
        }

        function recuperarTodos(){
            $sql = "SELECT * from cliente";
            return $this->db->query($sql)->result();
        }

        function recuperarPorId($id){
            $sql = "SELECT * from cliente where codcliente = ?";
            $dados = array($id);
            return $this->db->query($sql, $dados)->result();
        }

        function atualizar($id, $cliente){
            $sql = "UPDATE cliente set cliente = ? where codcliente = ?";
            $dados = array($cliente, $id);
            $this->db->query($sql, $dados);
        }

        function excluir($id){
            $sql = "DELETE from cliente where codcliente = ?";
            $dados = array($id);
            $this->db->query($sql, $dados);
        }

    }