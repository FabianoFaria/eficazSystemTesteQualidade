
$().ready(function() {

    //Ajustes iniciais da página de cadastro
    var pathArray = window.location.href.split( '/' );
    var protocol = pathArray[0];
    var host = pathArray[2];
    var urlP = protocol + '//' + host;


    //INICIA PROCESSO DE VALIDAÇÃO DOS DADOS E ENVIO DE AVALIAÇÃO AO CLIENTE
    $('#mandarAvaliacao').click(function() {

        //swal('testes');
        // validate signup form on keyup and submit
    	$("#questionario_cliente").validate({
            rules: {
                nomeCliente: {
                        required: true
    			},
                numeroServico: {
                        required: true
    			},
                emailEnd: {
                        email: true,
                        required: true
    			}
            },
            messages: {
                nomeCliente: {
                    required: "Nome do cliente é oblrigatório."
                },
                numeroServico: {
                    required: "Número do serviço é obrigatório."
                },
                emailEnd: {
                    email: "Deve ser um email válido.",
                    required: "Email do cliente é oblrigatorio."
                }

            }

        });

        if($("#questionario_cliente").valid()){

            //Dados do cliente para enviar o questionario
            var nomeCliente     = $('#nomeCliente').val();
            var servicoNumero   = $('#numeroServico').val();
            var emailEnd        = $('#emailEnd').val();

            //Efetua cadastro do cliente via JSON
            $.ajax({
             url: urlP+"/enviarQuestionario.php",
             secureuri: false,
             type : "POST",
             dataType: 'json',
             data      : {
              'nome_cliente' : nomeCliente,
              'servicoNumero' : servicoNumero,
              'emailEnd' : emailEnd
              },
                   success : function(datra)
                    {
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
                    // Handle errors here
                    console.log('ERRORS: ' + textStatus +" "+errorThrown+" "+jqXHR);
                    // STOP LOADING SPINNER
                    }
            });


        };

    });

    //INICIA PROCESSO DE LOGIN

    $('#btnenviar').click(function() {


        $("#acessoUsuario").validate({

            rules: {
                pessoaAcesso: {
                        required: true
    			},
                senhaAcesso: {
                        required: true
    			}
            },
            messages: {
                pessoaAcesso: {
                    required: "Nome do cliente é obrigatório."
                },
                senhaAcesso: {
                    required: "Senha de acesso é obrigatório."
                }

            }

        });

        if($("#acessoUsuario").valid()){

            //Faz a validação por JSON
            var acessoPessoal   = $('#pessoaAcesso').val();
            var senhaAcesso     = $('#senhaAcesso').val();

            $.ajax({
                url: urlP+"/login_sistema.php",
                secureuri: false,
                type : "POST",
                dataType: 'json',
                data      : {
                  'pessoaAcesso'  : acessoPessoal,
                  'senhaAcesso' : senhaAcesso
              },
              success : function(datra)
               {
                   if(datra.status){
                       //swal('','Tratamento registrado, verifica o estado do equipamento para confirmar a resolução do alarme', 'info');

                       setTimeout(function(){
                           //location.reload();
                           window.location="index.php";
                       }, 2000);
                   }else{

                       swal('',datra.mensagem,'error');
                       $('#detalhesAlarme').modal('hide');
                   }

               },
              error: function(jqXHR, textStatus, errorThrown)
              {
                // Handle errors here
                console.log('ERRORS: ' + textStatus +" "+errorThrown+" "+jqXHR);
                // STOP LOADING SPINNER
              }
            });


        }


    });


    //Inicia proesso de validação da avaliação
    $('#enviarAvaliacao').click(function() {

        //console.log("teste de avaliação");
        $("#questionario_resposta_cliente").validate({

            rules: {
                identificarTecnico: {
                        required: true
    			},
                aparenciaTecnico: {
                        required: true
    			},
                cordialidadeTecnicos: {
                        required: true
    			},
                tempoServico: {
                        required: true
    			},
                agravanteServico: {
                        required: true
    			},
                expectativaServico: {
                        required: true
    			},
            },
            messages: {
                identificarTecnico: {
                    required: "Obrigatório escolher uma alternativa."
                },
                aparenciaTecnico: {
                    required: "Obrigatório escolher uma alternativa."
                },
                cordialidadeTecnicos: {
                    required: "Obrigatório escolher uma alternativa."
                },
                tempoServico: {
                    required: "Obrigatório escolher uma alternativa."
                },
                agravanteServico: {
                    required: "Obrigatório escolher uma alternativa."
                },
                expectativaServico: {
                    required: "Obrigatório escolher uma alternativa."
                },
            }
        });

        if($("#questionario_resposta_cliente").valid()){

            //Faz a validação por JSON
            var identificarTecnico   = $('input[name="identificarTecnico"]:checked').val();
            var aparenciaTecnico     = $('input[name="aparenciaTecnico"]:checked').val();
            var cordialidadeTecnicos = $('input[name="cordialidadeTecnicos"]:checked').val();
            var tempoServico         = $('input[name="tempoServico"]:checked').val();
            var agravanteServico     = $('input[name="agravanteServico"]:checked').val();
            var expectativaServico   = $('input[name="expectativaServico"]:checked').val();

            var medidaRecomendacao   = $('#medidaRecomendacao').val();
            var sugestao             = $("#sugestaoArea").val();

            var nomeCliente          = $('#nomeAvaliador').val();
            var numeroServico        = $('#numeroServico').val();

            //console.log("teste de avaliação");
            $.ajax({

                url: urlP+"/processa_resposta.php",
                secureuri: false,
                type : "POST",
                dataType: 'json',
                data      : {
                    'nomeCliente' : nomeCliente,
                    'numeroServico' : numeroServico,
                    'identificarTecnico'  : identificarTecnico,
                    'aparenciaTecnico' : aparenciaTecnico,
                    'cordialidadeTecnicos'  : cordialidadeTecnicos,
                    'tempoServico' : tempoServico,
                    'agravanteServico'  : agravanteServico,
                    'expectativaServico' : expectativaServico,
                    'medidaRecomendacao'  : medidaRecomendacao,
                    'sugestao' : sugestao
                },
                success : function(datra)
                 {
                     if(datra.status){
                         swal('Obrigado!',datra.mensagem, 'info');

                        //  setTimeout(function(){
                        //      //location.reload();
                        //      window.location="index.php";
                        //  }, 2000);
                     }else{

                         swal('',datra.mensagem,'error');
                     }

                 },
                error: function(jqXHR, textStatus, errorThrown)
                {
                  // Handle errors here
                  console.log('ERRORS: ' + textStatus +" "+errorThrown+" "+jqXHR);
                  // STOP LOADING SPINNER
                }

            });
        }

    });


    //Efetua a requisição dos dados de determinado

    $('#pesquisarPeriodo').click(function(){

        //valida as datas escolhidas
        $('#formPeriodoAvaliacao').validate({
            rules: {
                data_fim_rel : {
                    required : true,
                    greaterThan : "#data_inicio_rel"
                },
                data_inicio_rel : {
                    required : true
                }
            },
            messages: {
                data_fim_rel : {
                    required : "Campo obrigatório",
                    greaterThan : "Data de inicío deve ser menor que a data final"
                },
                data_inicio_rel : {
                    required : "Campo obrigatório"
                }
            }

        });

        if($('#formPeriodoAvaliacao').valid()){

            var inicio_rel  = $('#data_inicio_rel').val();
            var final_rel  = $('#data_fim_rel').val();

            //swal('','Teste','info');
            $.ajax({
                url: urlP+"/pesquisa_periodo.php",
                secureuri: false,
                type : "POST",
                dataType: 'json',
                data      : {
                    'relatorio_inicio' : inicio_rel,
                    'relatorio_fim' : final_rel
                },
                success : function(datra)
                {
                     if(datra.status){
                         swal('Obrigado!',datra.mensagem, 'info');

                        //  setTimeout(function(){
                        //      //location.reload();
                        //      window.location="index.php";
                        //  }, 2000);
                     }else{

                         swal('',datra.mensagem,'error');
                     }

                },
                error: function(jqXHR, textStatus, errorThrown)
                {
                  // Handle errors here
                  console.log('ERRORS: ' + textStatus +" "+errorThrown+" "+jqXHR);
                  // STOP LOADING SPINNER
                }
            });
        }

    });

});
