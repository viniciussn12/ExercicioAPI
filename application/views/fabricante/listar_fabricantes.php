
<?php if ($this->session->flashdata("msg")): ?>
<div class="alert alert-success">
    <?= $this->session->flashdata("msg") ?>
</div>
<?php endif; ?>

<?php
    $usuario = $this->session->userdata("usuario");
    if ($usuario->tipo == 1): 
?>
<p><a href="#" onclick="novoFabricante()" data-toggle="modal" data-target="#exampleModal"> Novo Fabricante </a></p>
<?php
    endif;
?>
<!--
<p class="alert alert-success" id="dados-ajax">
    Aqui vai aparecer os dados retornados pelo ajax.
</p>-->

<table class="table">
    <tr>
        <th>Código</th>
        <th>Nome do Fabricante</th>
        <th>Detalhes</th>
        <th>Editar</th>
        <th>Excluir</th>
    </tr>

    <?php foreach ($registros as $r): ?>
        <tr>
            <td><?= $r->codfabricante ?></td>
            <td><?= $r->fabricante ?></td>
            <td>
            <a href="#" data-toggle="modal" data-target="#exampleModal" onclick="detalhesFabricante(<?= $r->codfabricante?>)">detalhes</a>
            <!--<a href="<?/*=base_url('fabricante/detalhes/'.$r->codfabricante);*/?>">detalhes</a>-->
            </td>
            <td>
            <a href="#" data-toggle="modal" data-target="#exampleModal" onclick="editarFabricante(<?= $r->codfabricante?>)">editar</a>
            </td>
            <td><?= anchor('fabricante/apagar/'.$r->codfabricante, "apagar") ?></td>
        </tr>
    <?php endforeach; ?>
    <tr>
    </tr>

</table>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="dados-ajax"></div>
      </div>
      <div class="modal-footer">
        <button type="button" id="botao-fechar" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" id="botao-salvar" class="btn btn-primary">Salvar</button>
      </div>
    </div>
  </div>
</div>