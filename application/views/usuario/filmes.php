<!-- coluna da esquerda -->
<div class="col-lg-3">
</div>
<!-- coluna do meio -->
<div class="col-lg-6">
  <div class="jumbotron text-center" style="margin-top: 1vh;">
    <h3>FILMES</h3>
    <br />
    <div class="col-lg-3">
    </div>
    <form  method="post" action="<?= URL ?>Usuario/filmes" id="formFilme">
      <div class="input-group col-lg-6 text-center">
        <input type="text" class="form-control" name="filme" placeholder="Informe o nome do filme desejado" style="height:5.7vh;" <?php if($this->digitado){?> value="<?= $this->digitado?>"<?php } ?>>
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
        <th>título</th>
        <th>Ano</th>
        <th>Atores</th>
        <th>Capa</th>
      </tr>
    </thead>
    <tbody>
      <?php  foreach ($this->resultadoBusca as $filme) {?>
        <tr>
          <td><?= $filme->id ?></td>
          <td><?= $filme->title ?></td>
          <td><?= $filme->year ?></td>
          <td><?= $filme->actors ?></td>
          <td class="row">
            <button class="btn btn-primary btnImage" <?php if(empty($filme->poster)){?> disabled <?php } ?> value="<?= $filme->poster ?>" id="<?= $filme->title ?>"><i class="fa fa-external-link"></i></button>
            <button class="btn btn-warning btnfavFilme" title="Adicionar aos meus favoritos" data-id="<?= $filme->id ?>" data-title="<?= $filme->title ?>" data-year="<?= $filme->year ?>" data-actors="<?= $filme->actors ?>" data-img="<?= $filme->poster ?>" ><i class="fa fa-star"></i></button>
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
          <img class="imagemFilme" style="height:40vh; width:10vw;">
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
