jQuery(document).ready(function(){

  $('#tabelaAtoresFavoritos').dataTable({
    "language": {
  				"url": "//cdn.datatables.net/plug-ins/1.10.10/i18n/Portuguese-Brasil.json"
  			 },
  });

  $('#tabelaFilmesFavoritos').dataTable({
    "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.10/i18n/Portuguese-Brasil.json"
         },
  });


  $('#tabelaFilmes').dataTable({
    "language": {
  				"url": "//cdn.datatables.net/plug-ins/1.10.10/i18n/Portuguese-Brasil.json"
  			 },
  });

  $('#tabelaAtores').dataTable({
    "language": {
  				"url": "//cdn.datatables.net/plug-ins/1.10.10/i18n/Portuguese-Brasil.json"
  			 },
  });

  $('#formFilme').submit(function(e){
    $('#formFilme #search').css('display', 'none');
    $('#formFilme #carregando').css('display', 'block');
  });

  $('#formAtor').submit(function(e){
    $('#formAtor #search').css('display', 'none');
    $('#formAtor #carregando').css('display', 'block');
  });

  $('.btnImage').click(function(e){
    e.preventDefault();
    var link = $(this).val();
    var name = $(this).attr('id');
    $('#imgModal .modal-title').text("Poster do Filme: " + name);
    $('#imgModal .imagemFilme').attr("src", link);
    $('#imgModal').modal('toggle');
  });

  $('.btnImageAtor').click(function(e){
    e.preventDefault();
    var link = $(this).val();
    var name = $(this).attr('id');
    $('#imgModal .imagemAtor').removeAttr("src");
    $('#imgModal .modal-title').text("Foto do Ator: " + name);
    $('#imgModal .imagemAtor').attr("src", link);
    $('#imgModal').modal('toggle');
  });



$('.btnfavFilme').click(function(e){
  e.preventDefault();
  var id = $(this).attr('data-id');
  var titulo = $(this).attr('data-title');
  var ano = $(this).attr('data-year');
  var atores = $(this).attr('data-actors');
  var poster = $(this).attr('data-img');

  $.post(addr + 'Usuario/salvaFilme', {
      id: id,
		  titulo: titulo,
      ano: ano,
      atores: atores,
      poster: poster
		}).done(function (data){
      if(data.status === 1){
        bootbox.dialog({
          title: 'Favoritos',
          message: data.msg,
          buttons:{
            cancel:{
              className: 'btn-danger',
              label: 'Fechar'
            }
          }
        });
      }else{
        bootbox.dialog({
          title: 'Favoritos',
          message: data.msg,
          buttons:{
            cancel:{
              className: 'btn-danger',
              label: 'Fechar'
            }
          }
        });
      }
    });
})

$('.btnfavAtor').click(function(e){
  e.preventDefault();
  var id = $(this).attr('data-id');
  var nome = $(this).attr('data-nome');
  var participacao = $(this).attr('data-participacao');
  var foto = $(this).attr('data-img');

  $.post(addr + 'Usuario/salvaAtor', {
		  id: id,
      nome: nome,
      participacao: participacao,
      foto: foto
		}).done(function (data){
      if(data.status === 1){
        bootbox.dialog({
          title: 'Favoritos',
          message: data.msg,
          buttons:{
            cancel:{
              className: 'btn-danger',
              label: 'Fechar'
            }
          }
        });
      }else{
        bootbox.dialog({
          title: 'Favoritos',
          message: data.msg,
          buttons:{
            cancel:{
              className: 'btn-danger',
              label: 'Fechar'
            }
          }
        });
      }
    });
})

$('.imagemFavoritoFilme').click(function(e){
  var poster  = $(this).attr('data-link');
  var titulo  = $(this).attr('data-titulo');
  $('#modalFilme .imagemAtor').removeAttr("src");
  $('#modalFilme .modal-title').text("Foto do Ator: " + titulo);
  $('#modalFilme .imagemFilme').attr("src", poster);
  $('#modalFilme').modal('toggle');
})

$('.imagemFavoritoAtor').click(function(e){
  var foto  = $(this).attr('data-link');
  var nome  = $(this).attr('data-nome');

  $('#modalAtor .imagemAtor').removeAttr("src");
  $('#modalAtor .modal-title').text("Foto do Ator: " + nome);
  $('#modalAtor .imagemAtor').attr("src", foto);
  $('#modalAtor').modal('toggle');
})

$('.removeFilme').click(function(e){
  var id = $(this).attr('data-id');
  var table = $(this).attr('data-db');
  $.post(addr + 'Usuario/removeFavoritos', {
		  id: id,
      tabela: table
		}).done(function (data){
      if(data.status === 1){
        bootbox.dialog({
          title: 'Favoritos',
          message: data.msg,
          buttons:{
            cancel:{
              className: 'btn-danger',
              label: 'Fechar'
            }
          }
        });
        setTimeout(function(){ window.location="" }, 1000);
      }else{
        bootbox.dialog({
          title: 'Favoritos',
          message: data.msg,
          buttons:{
            cancel:{
              className: 'btn-danger',
              label: 'Fechar'
            }
          }
        });
      }
    });
});

$('.removeAtor').click(function(e){
  var id = $(this).attr('data-id');
  var table = $(this).attr('data-db');
  $.post(addr + 'Usuario/removeFavoritos', {
      id: id,
      tabela: table
    }).done(function (data){
      if(data.status === 1){
        bootbox.dialog({
          title: 'Favoritos',
          message: data.msg,
          buttons:{
            cancel:{
              className: 'btn-danger',
              label: 'Fechar'
            }
          }
        });
        setTimeout(function(){ window.location="" }, 1000);
      }else{
        bootbox.dialog({
          title: 'Favoritos',
          message: data.msg,
          buttons:{
            cancel:{
              className: 'btn-danger',
              label: 'Fechar'
            }
          }
        });
      }
    });
});



//Fecha Módulo jQuery
});
