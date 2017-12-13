<?php if(!empty($this->recomendaFilmeByAtor)){ ?>
  <div class="col-lg-3"></div>
  <div class="col-lg-6">
    <div class="jumbotron text-center" style="margin-top: 1vh;">
      <h3>FILMES RECOMENDADOS</h3>
    </div>
  </div>
  <div class="col-lg-3"></div>
<div class="col-lg-12" id="filmesRecomendados" style="margin-bottom:10vh;">
<?php $x = 0;?>
  <?php foreach ($this->recomendaFilmeByAtor as $L) { $count = count($L); ?>
      <div class="row">
        <div class="well text-center" style="margin-top: 1vh;">
          <h3>Porque você favoritou &nbsp <b style="color: #0ce3ac;"> <?= $this->ator_nomes[$x]->ator_nome ?> </b></h3>
        </div>
        <?php for ($i=0; $i < $count; $i++) { ?>
          <div class="col-lg-3">
            <div class="panel panel-default text-center">
              <div class="panel-heading" style="color: #0ce3ac;"> <?= $L[$i]->title ?></div>
              <div class="panel-body text-center">
                <img src="<?= $L[$i]->poster ?>" width="200vw;" height="300vh">
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
  <?php $x = ($x + 1); } ?>
<!-- close col-lg-12(filmes recomendados) -->
</div>
<?php }else{ ?>
  <div class="col-lg-3"></div>
  <div class="col-lg-6">
    <div class="jumbotron text-center" style="margin-top: 1vh;">
      <h3>FILMES RECOMENDADOS</h3>
    </div>
    <div class="well text-center">
      Você não possui recomendações
    </div>
  </div>
  <div class="col-lg-3"></div>
<?php } ?>
