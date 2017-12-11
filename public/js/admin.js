jQuery(document).ready(function(){

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


//Fecha Módulo jQuery
});
