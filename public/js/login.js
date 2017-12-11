jQuery(document).ready(function(){

$('.registrar').click(function (e){
  $('#btnRegistro').css('display', 'inline');
  $('#btnRegistrando').css('display', 'none');
  $('#registrar').modal('toggle');
});

//Repassa dados form login
$('#formLogin').submit(function (e){
	e.preventDefault();
	$.post(addr + 'Login/login',
		$(this).serialize()
		).done(function (data){
			if(data.status === 1){
        bootbox.dialog({
          title: 'Login Webflix',
          message: data.msg
        });
      setTimeout(function(){location.href=data.url;}, 1000);
		}//fecha IF
		else {
      bootbox.dialog({
        title: 'Ops... !',
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

$('#formRegistro').submit(function (e){
	e.preventDefault();
  $('#btnRegistro').css('display', 'none');
  $('#btnRegistrando').css('display', 'inline');

  var senha = $('#senha').val();
  var confirma = $('#confirmaSenha').val();

  if(senha === confirma){
    $.post(addr + 'Login/cadastro',
      $(this).serialize()
      ).done(function (data){
        $('#registrar').modal('toggle');
        if(data.status === 1){
          bootbox.dialog({
            title: 'Webflix Cadastro',
            message: data.msg
          });
          setTimeout(function(){location.href=data.url;}, 2000);
      }else{
        bootbox.dialog({
          title: 'Ops... !',
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
  }else{
    $('#btnRegistro').css('display', 'inline');
    $('#btnRegistrando').css('display', 'none');
    bootbox.dialog({
      title: 'Ops... !',
      message: 'Senhas distintas, tente novamente !',
      buttons:{
        cancel:{
          className: 'btn-danger',
          label: 'Fechar'
        }
      }
    });
  }
});




//Fecha Módulo jQuery
});
