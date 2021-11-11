
    <h1>Novo Fabricante</h1>

    <p><?= $this->session->flashdata('msg'); ?></p> 
    <?= form_open('fabricante/salvar') ?>
        <label for="nome_fabricante" class="form-label">Nome do Fabricante: </label>
        <input type="text" name="nome_fabricante" class="form-control"><br/>
        <button type="submit" class="btn btn-dark">Enviar</button>
        <button type="reset" class="btn btn-dark">Limpar</button>
    <?= form_close() ?>
