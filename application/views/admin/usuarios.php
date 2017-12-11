<div class="col-lg-3">

</div>

<div class="col-lg-6">
  <div class="jumbotron text-center" style="margin-top: 1vh;">
    <h3>TODOS USUÁRIOS</h3>
  </div>
  <div class="jumbotron" style="margin-top:2vh;">
  <table class="table table-bordered  table-striped table-condensed table-responsive">
    <thead>
      <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>STATUS</th>
        <th>TIPO</th>
      </tr>
    </thead>
    <tbody>
      <?php  foreach ($this->usuarios as $user) { ?>
        <?php if((int)$user->usu_tipo === ADMIN){ $tipo = '<span class="label label-primary">Administrador</span>'; } ?>
        <?php if((int)$user->usu_tipo === USUARIO){ $tipo = '<span class="label label-default">Usuario</span>'; } ?>
        <?php if((int)$user->usu_status === ATIVO){ $status = '<span class="label label-primary">Ativo</span>'; } ?>
        <?php if((int)$user->usu_status === BLOQUEADO){ $status = '<span class="label label-danger">Bloqueado</span>'; } ?>
        <tr>
          <td><?= $user->usu_id ?></td>
          <td><?= $user->usu_nome ?></td>
          <td><?= $status ?></td>
          <td><?= $tipo ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  </div>
</div>

<div class="col-lg-3">
</div>
