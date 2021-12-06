<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class ProdutoModel extends CI_Model{

        function inserir($produto, $preco, $qtd, $codfabricante, $codgrupo){
            $sql = "INSERT INTO produto (produto, preco, qtd, codfabricante, codgrupo) values (?, ?, ?, ?, ?)";
            $dados = array($produto, $preco, $qtd, $codfabricante, $codgrupo);
            $this->db->query($sql, $dados);
        }

        function recuperarTodos(){
            $sql = "SELECT * from produto";
            return $this->db->query($sql)->result();
        }

        function recuperarPorId($id){
            $sql = "SELECT * from produto where codproduto = ?";
            $dados = array($id);
            return $this->db->query($sql, $dados)->result();
        }

        function atualizar($id, $produto, $preco, $qtd, $codfabricante, $codgrupo){
            $sql = "UPDATE produto set produto = ?, preco = ?, qtd = ?, codfabricante = ?, codgrupo = ? where codproduto = ?";
            $dados = array($produto, $preco, $qtd, $codfabricante, $codgrupo, $id);
            $this->db->query($sql, $dados);
        }

        function excluir($id){
            $sql = "DELETE from produto where codproduto = ?";
            $dados = array($id);
            $this->db->query($sql, $dados);
        }

    }
