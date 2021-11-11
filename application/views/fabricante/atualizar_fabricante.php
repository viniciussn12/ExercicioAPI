
<h1>Editar Fabricante</h1>

<p><?= $this->session->flashdata('msg'); ?></p> 
<?= form_open('fabricante/modificar/'.$registro->codfabricante) ?>
    <label for="nome_fabricante"  class="form-label">Nome do Fabricante: </label>
    <input type="text" name="nome_fabricante" class="form-control" value="<?= $registro->fabricante; ?>"><br/>
    <button type="submit" class="btn btn-dark">Enviar</button>
    <button type="reset" class="btn btn-dark">Limpar</button>
<?= form_close() ?>
