$().ready(function() {


	//Ajustes iniciais para recuperação de URL
    var pathArray = window.location.href.split( '/' );
    var protocol = pathArray[0];
    var host = pathArray[2];
    var urlP = protocol + '//' + host;


    //BOTÃO DE ADIÇÃO DE USUÁRIO
    $('#addUser').click(function(){
    	// console.log('Ok go!');

    	$('#modalAdicao').modal();


    });

    //Evento com a modal fechada
    $('#modalAdicao').on('hidden.bs.modal', function (e) {
	  	
    	$('#nomeNovoUsuario').val('');
    	$('#emailNovoUsuario').val('');
    	$('#senhaNovoUsuario').val('');
    	$('#confirmaSenhaNovoUsuario').val('');

	});


    $('#confirAdd').click(function(){
    	
    	//console.log('Ok go!');

    	//$('#modalAdicao').modal();

    	// validate signup form on keyup and submit
    	$("#novoUsuario").validate({


    		rules: {
                nomeNovoUsuario: {
                    required: true
          		},
                emailNovoUsuario: {
                    email: true,
                    required: true,
                    remote: {
                      url: urlP+"/login_sistema.php",
                      type: "post",
                      data: {
                        email_teste : function() {
                          //return  $("#txt_numSim" ).val();
                          return document.getElementById("emailNovoUsuario").value;
                        }
                      }
                    }
          		},
          		 senhaNovoUsuario: {
                    required: true
          		},
          		 confirmaSenhaNovoUsuario: {
                    required: true,
                    equalTo  : "#senhaNovoUsuario"
          		}
            },
            messages: {
                nomeNovoUsuario: {
                    required: "Nome do cliente é oblrigatório."
          		},
                emailNovoUsuario: {
                    email: "Deve ser um email válido.",
                    required: "Email do cliente é oblrigatorio.",
                    remote: 'Email já está sendo utilizado.'
                    
          		},
          		 senhaNovoUsuario: {
                    required: "Senha é obrigatório."
          		},
          		 confirmaSenhaNovoUsuario: {
                    required: "Confirmação de senha é obrigatório.",
                    equalTo  : "Senhas devem ser iguais."
          		}

            }


    	});

    	if($("#novoUsuario").valid()){

    		//console.log('Cadastro pronto para finalizar.');

    		var novoUsuario 	= $('#nomeNovoUsuario').val();
    		var novoEmail 		= $('#emailNovoUsuario').val();
    		var novaSenha 		= $('#senhaNovoUsuario').val();
    		var confirmaSenha 	= $('#confirmaSenhaNovoUsuario').val();

    		$('#modalEspera').modal();

    		//Efetua cadastro do cliente via JSON
            $.ajax({
             url: urlP+"/login_sistema.php",
             secureuri: false,
             type : "POST",
             dataType: 'json',
             data      : {
              'novoUsuario' : novoUsuario,
              'novoEmail' 	: novoEmail,
              'novaSenha' 	: novaSenha,
              'confirmaSenha' : confirmaSenha
              },
                   success : function(datra)
                    {

                    	$('#modalEspera').modal('hide');

                       //tempTest = JSON(datra);
                       if(datra.status == true)
                       {
                       	   swal('', datra.mensagem,'success');
                       }
                       else
                       {
                           //Settar a mensagem de erro!
                           swal('', datra.mensagem, 'error');
                       }
                    },
                   error: function(jqXHR, textStatus, errorThrown)
                    {

                    	$('#modalEspera').modal('hide');

                    	// Handle errors here
                    	console.log('ERRORS: ' + textStatus +" "+errorThrown+" "+jqXHR);
                    	// STOP LOADING SPINNER
                    }
            });

    	}

    });

});
