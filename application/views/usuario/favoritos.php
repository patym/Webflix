<!-- coluna da esquerda -->
<div class="col-lg-3">
</div>
<!-- coluna do meio -->
<div class="col-lg-6">
  <div class="jumbotron text-center" style="margin-top: 1vh;">
    <h3>MEUS FAVORITOS</h3>
    <br />
  </div>

  <div class="jumbotron" style="margin-top:2vh;" id="divTabela">
    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#atores">Atores Favoritos</a></li>
      <li><a data-toggle="tab" href="#filmes">Filmes Favoritos</a></li>
    </ul>

    <div class="tab-content">
      <div id="atores" class="tab-pane fade in active">
        <h3>Atores</h3>
        <table class="table table-bordered  table-striped table-condensed table-responsive" id="tabelaAtoresFavoritos">
          <thead>
            <tr>
              <th></th>
              <th>Id</th>
              <th>Nome</th>
              <th>Participação</th>
              <th>Foto</th>
            </tr>
          </thead>
          <tbody>
            <?php  foreach ($this->atores as $ator) {?>
              <tr>
                <td>
                  <button class="btn btn-sm btn-danger removeAtor" data-db="ator_favorito" data-id="<?= $ator->ator_id ?>"><i class="fa fa-trash"></i></button>
                </td>
                <td><?= $ator->ator_imdb_id ?></td>
                <td><?= $ator->ator_nome ?></td>
                <td><?= $ator->ator_participacao ?></td>
                <td>
                  <?php if(!empty($ator->ator_foto)){?>
                    <button class="btn btn-primary imagemFavoritoAtor" data-nome="<?= $ator->ator_nome ?>" data-link="<?= $ator->ator_foto ?>" ><i class="fa fa-external-link"></i></button>
                  <?php }else{ ?>
                    <button class="btn btn-primary" disabled><i class="fa fa-external-link"></i></button>
                  <?php } ?>
                </td>
              </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
      <div id="filmes" class="tab-pane fade">
        <h3>Filmes</h3>
        <table class="table table-bordered  table-striped table-condensed table-responsive" id="tabelaFilmesFavoritos">
          <thead>
            <tr>
              <th></th>
              <th>Título</th>
              <th>Ano</th>
              <th>Atores</th>
              <th>Capa</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($this->filmes as $filme) {?>
              <tr>
                <td>
                  <button class="btn btn-sm btn-danger removeFilme" data-db="filme_favorito" data-id="<?= $filme->filme_id ?>"><i class="fa fa-trash"></i></button>
                </td>
                <td><?= $filme->filme_titulo ?></td>
                <td><?= $filme->filme_ano ?></td>
                <td><?= $filme->filme_atores ?></td>
                <td>
                  <?php if(!empty($filme->filme_capa)){?>
                    <button class="btn btn-primary imagemFavoritoFilme" data-titulo="<?= $filme->filme_titulo ?>" data-link="<?= $filme->filme_capa?>" ><i class="fa fa-external-link"></i></button>
                  <?php }else{ ?>
                    <button class="btn btn-primary" disabled><i class="fa fa-external-link"></i></button>
                  <?php } ?>
                </td>
              </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
<!-- coluna da direita -->

<!-- Modal -->
<div id="modalFilme" class="modal fade" role="dialog">
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

<!-- Modal -->
<div id="modalAtor" class="modal fade" role="dialog">
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

<div class="col-lg-3">
</div>
