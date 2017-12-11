<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12 text-center v-center">
      <div class="page-header">
      <h1>MDN Online</h1>
    </div>
    </div>
  </div>
<div class="col-lg-6">
  <div class="panel panel-default">
    <div class="panel-heading"><i class="fa fa-user index-icon-title"></i> Meus dados</div>
    <div class="panel-body">
      <div class="well">
      <img alt="Avatar do Usuário" src="<?= $this->jogador->usu_img ?>" class="img-circle img-responsive index-avatar">
      <h1 class="index-titulo"><u><?= $this->jogador->usu_nickname ?></u></h1>
    <dl class="dl-horizontal index-icon-user">
      <?php if ($this->jogador->usu_sexo === "masculino"){?><i class="fa fa-male" title="Sexo: Masculino"></i><?php }?>
      <?php if ($this->jogador->usu_sexo === "feminino"){?><i class="fa fa-female" title="Sexo: Feminino"></i><?php }?>
      <?php if ((int)$this->jogador->usu_status === GOBLIN){?><i class="fa fa-cube" title="Usuário: Free"></i><?php }?>
      <?php if ((int)$this->jogador->usu_status === NERD){?><i class="fa fa-diamond" title="Usuário: Premium"></i><?php }?>
    </dl>
      <ul class="list-group index-ul">
          <li class="list-group-item">
          <span class="badge"><?= $this->carisma->car_disponivel ?></span>
                  Meus pontos restantes
          </li>
          <li class="list-group-item">
          <span class="badge"><?= $this->carisma->car_gasta ?></span>
                  Meus pontos gastos
          </li>
          <li class="list-group-item">
          <span class="badge"><?= $this->util->dateToPtBR($this->carisma->car_data_reset) ?></span>
                  Ultima Carisma Concedida
          </li>
      </ul>
    </div>
    </div>
    <div class="panel-footer">
      <a href="<?= URL ?>Jogador/profile" title="Editar meu profile"><button type="button" class="btn btn-xs btn-info"><i class="fa fa-file"></i> Profile</button></a>
    </div>
  </div>
</div>

<div class="col-lg-6">
  <div class="panel panel-default">
    <div class="panel-heading"><i class="fa fa-star index-icon-title"></i> Minhas salas favoritas</div>
    <div class="panel-body index-panel-fixo">
      <?php if ($this->favoritos !== null AND (int)$this->favoritos > 0){ ?>
        <?php foreach ($this->favoritos as $favorito) { ?>
          <div class="well index-sala-well">
          <img alt="Avatar da Sala" src="<?= $this->imgSala($favorito->fav_img)?>" class="img-circle img-responsive index-avatar-sala">
          <h3 class="index-sala-titulo"><?= $favorito->fav_sala_titulo ?></h3>
          <button class="btn btn-xs btn-danger index-sala-icon" title="Entrar na sala" id="<?= $favorito->fav_sala_id ?>"><i class="fa fa-sign-in fa-2x"></i></button>
          <h5 class="index-sala-descricao"><b>Descrição:<b></h5>
            <p class="index-sala-p"><?= $favorito->fav_sala_descricao ?></p>
          </div>
        <?php } /* fecha foreach */ ?>
      <?php }else{ ?>
        <div class="well index-sala-well">
          <!--
        <img alt="" src="" class="img-circle img-responsive index-avatar-sala">
          -->
        <h3 class="index-sala-titulo-vazio">Ops...!</h3>
          <p class="index-sala-p-vazio">
            Você não possui salas favoritas
          </p>
        </div>
      <?php } ?>
  </div>
  <div class="panel-footer"></div>
  </div>
</div>

                                        <!-- LISTA DE MSG NÃO APROVADAS -->
                                                  <?php if ((int)$this->configuracoes->con_taverna === ON){ ?>
<div class="col-lg-12">
  <div class="panel panel-default">
    <div class="panel-heading"><i class="fa fa-envelope index-icon-title"></i> Postagens não aprovadas: Taverna</div>
          <?php if ($this->postagem !== null AND (int)$this->postagem > 0){?>
            <div class="panel-body index-postagem-panel-fixo">
          <?php foreach ($this->postagem as $postagens) { ?>
            <div class="well">
                  <div class="row">
                  <div class="col-xs-12">
                    <img alt="Avatar do Usuário" src="<?= $this->img($postagens->tav_usu_login) ?>" class="img-circle img-responsive taverna-img">
                    <h2>
                      <u class="taverna-u"><?= $postagens->tav_usu_login ?></u>
                      <small class="taverna-small"><?= $this->util->dateToMDN($postagens->tav_data)?></small>
                    </h2>
                    <br />
                    <p class="taverna-p2">
                        <?= $postagens->tav_msg ?>
                    </p>
                    <div class="text-center">
                      <button type="button" class="btn btn-danger btn-xs deleta-postagem" title="Deletar Postagem" id="<?= $postagens->tav_id ?>"><i class="fa fa-trash"></i> Deletar Postagem</button>
                    </div>
                  </div>
                </div>
          </div>
          <?php } ?>
          <?php }else{ ?>
            <div class="panel-body">
            <div class="well">
            <div class="row">
            <div class="col-xs-12">
              <p class="taverna-p2">
                  Nenhuma postagem aguardando aprovação!
              </p>
            </div>
          </div>
        </div>
            <?php } ?>

      </div>
  </div>
</div>
                                                      <?php } ?>
                                      <!-- FECHA LISTA DE MSG NÃO APROVADAS -->

                                      <!-- LISTA DE ORAÇÕES -->
                                            <?php if ((int)$this->configuracoes->con_oracao === ON){ ?>
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading"><i class="fa fa-rebel index-icon-title"></i> Minhas orações</div>
      <?php if ($this->oracoes !== null AND $this->oracoes > 0){?>
        <div class="panel-body index-postagem-panel-fixo">
      <?php foreach ($this->oracoes as $oracao) { ?>
        <div class="well">
              <div class="row">
              <div class="col-xs-12">
                <img alt="Avatar do Usuário" src="<?= $oracao->tem_usu_img?>" class="img-circle img-responsive taverna-img">
                <h2>
                  <u class="taverna-u"><?= $oracao->tem_usu_login ?></u>
                  <small class="taverna-small"><?= $this->util->dateToMDN($oracao->tem_data)?></small>
                </h2>
                <br />
                <p class="taverna-p2">
                    <?= $oracao->tem_msg ?>
                </p>
              </div>
            </div>
      </div>
      <?php } ?>
      <?php }else{ ?>
        <div class="panel-body">
        <div class="well">
        <div class="row">
        <div class="col-xs-12">
          <p class="taverna-p2">
              Nenhuma oração realizada no Templo dos Devas!
          </p>
        </div>
      </div>
    </div>
        <?php } ?>
    </div>
    </div>
  </div>
                                                  <?php } ?>
                                      <!-- FECHA LISTA DE ORAÇÕES -->


<!-- FECHA WRAPPER -->
</div>
