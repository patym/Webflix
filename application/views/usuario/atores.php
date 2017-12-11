<!-- coluna da esquerda -->
<div class="col-lg-3">
</div>
<!-- coluna do meio -->
<div class="col-lg-6">
  <div class="jumbotron text-center" style="margin-top: 1vh;">
    <h3>ATORES</h3>
    <br />
    <div class="col-lg-3">
    </div>
    <form  method="post" action="<?= URL ?>Usuario/atores" id="formAtor">
      <div class="input-group col-lg-6 text-center">
        <input type="text" class="form-control" name="ator" placeholder="Informe o nome do ator desejado" style="height:5.7vh;" <?php if($this->digitado){?> value="<?= $this->digitado?>"<?php } ?>>
        <div class="input-group-btn">
          <button class="btn btn-success" type="submit" id="search">
            <i class="fa fa-2x fa-search"></i>
          </button>
          <button class="btn btn-success" type="submit" style="display:none;" id="carregando">
            <i class="fa fa-spinner fa-spin fa-2x fa-fw"></i>
          </button>
        </div>
      </div>
    </form>
    <div class="col-lg-3">
    </div>
  </div>

  <div class="jumbotron" style="margin-top:2vh;" id="divTabela">
  <table class="table table-bordered  table-striped table-condensed table-responsive" id="tabelaFilmes">
    <thead>
      <tr>
        <th>id</th>
        <th>Nome</th>
        <th>Participação</th>
        <th>Foto</th>
      </tr>
    </thead>
    <tbody>
      <?php  foreach ($this->resultadoBusca as $ator) {?>
        <tr>
          <td><?= $ator->id ?></td>
          <td><?= $ator->name ?></td>
          <td><?= $ator->known_for ?></td>
          <td>
            <button class="btn btn-primary btnImageAtor"  <?php if(empty($ator->image)){?> disabled <?php } ?>  value="<?= $ator->image ?>" id="<?= $ator->name ?>"><i class="fa fa-external-link"></i></button>
            <button class="btn btn-warning btnfavAtor" title="Adicionar aos meus favoritos" data-id="<?= $ator->id ?>" data-nome="<?= $ator->name ?>" data-participacao="<?= $ator->known_for ?>" data-img="<?= $ator->image ?>" ><i class="fa fa-star"></i></button>
          </td>
        </tr>
      <?php }?>
    </tbody>
  </table>
  </div>

  <!-- Modal -->
  <div id="imgModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body text-center">
          <img class="imagemAtor" style="height:40vh; width:10vw;">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Fechar</b></button>
        </div>
      </div>
    </div>
  </div>


</div>
<!-- coluna da direita -->
<div class="col-lg-3">
</div>
