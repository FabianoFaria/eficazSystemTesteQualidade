
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

            $('#modalLogin').modal();

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

                      $('#modalLogin').modal('hide');
                      
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


    //BOTÃO DE LOGOUT
    $('#saida').click(function(){

      $.ajax({
                url: urlP+"/login_sistema.php",
                secureuri: false,
                type : "POST",
                dataType: 'json',
                data      : {
                  'saida'  : 1
              },
              success : function(datra)
               {
                   if(datra.status){
                       //swal('','Tratamento registrado, verifica o estado do equipamento para confirmar a resolução do alarme', 'info');

                       setTimeout(function(){
                           //location.reload();
                           window.location="login.php";
                       }, 2000);
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

                         setTimeout(function(){
                             //location.reload();
                             window.location="resposta.php?agradecimento=1";
                         }, 2000);
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
  

    //Inicia o processo de exportar dados pelo período solicitado
    $('#exportarPeriodo').click(function(){

      //valida as datas escolhidas
        $('#formPeriodoExportar').validate({
            rules: {
                data_fim_csv : {
                    required : true,
                    greaterThan : "#data_inicio_csv"
                },
                data_inicio_csv : {
                    required : true
                }
            },
            messages: {
                data_fim_csv : {
                    required : "Campo obrigatório",
                    greaterThan : "Data de inicío deve ser menor que a data final"
                },
                data_inicio_csv : {
                    required : "Campo obrigatório"
                }
            }

        });

        if($('#formPeriodoExportar').valid()){

          var inicio_csv  = $('#data_inicio_csv').val();
          var final_csv   = $('#data_fim_csv').val();

          $('#mensagemModal').html('Carregando dados');

          $('#modalDados').modal();

          document.location.href = '/pesquisa_periodo.php?relatorio_inicio_csv='+inicio_csv+'&relatorio_fim_csv='+final_csv;

          $('#modalDados').modal('hide');


          //Trecho comentado por ser mais prático enviar a requisição direto para o PHP do que enviar por AJAX
          // $.ajax({
          //       url: urlP+"/pesquisa_periodo.php",
          //       secureuri: false,
          //       type : "GET",
          //       dataType: 'json',
          //       data      : {
          //           'relatorio_inicio_csv' : inicio_csv,
          //           'relatorio_fim_csv' : final_csv
          //       },
          //       success : function(datra)
          //       {



          //         if(datra.status){

          //           $('#modalDados').modal('hide');

          //           //window.open('https://YOUR_URL','_blank' );
          //           document.location.href = '/pesquisa_periodo.php?relatorio_inicio_csv='+inicio_csv+'&relatorio_fim_csv='+final_csv;
          //           swal('',datra.mensagem,'success');


          //         }else{

          //           $('#modalDados').modal('hide');

          //           swal('',datra.mensagem,'error');

          //         }

          //       },
          //       error: function(jqXHR, textStatus, errorThrown)
          //       {
          //         // Handle errors here
          //         console.log('ERRORS: ' + textStatus +" "+errorThrown+" "+jqXHR);
          //         // STOP LOADING SPINNER
          //       }
          // });

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

            $('#mensagemModal').html('Carregando dados');

            $('#modalDados').modal();

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
                        //swal('Obrigado!',datra.mensagem, 'info');
                        $('#modalDados').modal('hide');

                        var data = datra.recomendacao;
                        //alreadyFetched = {}

                        var novData = [ ["0", data[0]],
                                     ["1",  data[1]],
                                     ["2",  data[2]],
                                     ["3",  data[3]],
                                     ["4",  data[4]],
                                     ["5",  data[5]],
                                     ["6",  data[6]],
                                     ["7",  data[7]],
                                     ["8",  data[8]],
                                     ["9",  data[9]],
                                     ["10", data[10]],
                                 ];

                        $.plot("#placeholder",[novData], {
                            series: {
                                bars: {
                                    show: true,
                                    barWidth: 0.6,
                                    align: "center"
                                }
                            },
                            xaxis: {
                                mode: "categories",
                                tickLength: 1
                            },
                            yaxis: {
                                minTickSize: 1,
                                tickDecimals: 0
                            }
                        });

                        // identificar_tecnico
                        $('#identificar_tecnicoA').val(datra.identificar_tecnicoA +'%');
                        $('#identificar_tecnicoB').val(datra.identificar_tecnicoB +'%');
                        $('#identificar_tecnicoC').val(datra.identificar_tecnicoC +'%');
                        $('#identificar_tecnicoD').val(datra.identificar_tecnicoD +'%');

                        // aparencia_tecnico
                        $('#aparencia_tecnicoA').val(datra.aparencia_tecnicoA +'%');
                        $('#aparencia_tecnicoB').val(datra.aparencia_tecnicoB +'%');
                        $('#aparencia_tecnicoC').val(datra.aparencia_tecnicoC +'%');
                        $('#aparencia_tecnicoD').val(datra.aparencia_tecnicoD +'%');

                        // cordialidade
                        $('#cordialidadeA').val(datra.cordialidadeA +'%');
                        $('#cordialidadeB').val(datra.cordialidadeB +'%');
                        $('#cordialidadeC').val(datra.cordialidadeC +'%');
                        $('#cordialidadeD').val(datra.cordialidadeD +'%');

                        // tempo_servico
                        $('#tempo_servicoA').val(datra.tempo_servicoA +'%');
                        $('#tempo_servicoB').val(datra.tempo_servicoB +'%');
                        $('#tempo_servicoC').val(datra.tempo_servicoC +'%');
                        $('#tempo_servicoD').val(datra.tempo_servicoD +'%');

                        // agravante
                        $('#agravanteA').val(datra.agravanteA +'%');
                        $('#agravanteB').val(datra.agravanteA +'%');
                        $('#agravanteC').val(datra.agravanteA +'%');
                        $('#agravanteD').val(datra.agravanteA +'%');

                        // expectativa
                        $('#expectativaA').val(datra.expectativaA +'%');
                        $('#expectativaB').val(datra.expectativaB +'%');
                        $('#expectativaC').val(datra.expectativaC +'%');
                        $('#expectativaD').val(datra.expectativaD +'%');

                        // Data do périodo
                        $('#dataInicio').html(" "+inicio_rel+" ");
                        $('#dataFinal').html(" "+final_rel+" ");

                     }else{

                         $('#modalDados').modal('hide');
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
