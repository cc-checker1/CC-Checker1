        
            $(document).ready(function () {
var i = 1;
               
                $('#iniciarchk').click(function () {
                    // audio.play();
                $('#sansImg').hide();
                $('#sansFala').hide();
                    $('#iniciarchk').attr('disabled', 'disabled');
                    var line = $('#lista_ccs').val().replace(',', '').split('\n');
                    line = line.filter( function( item, index, inputArray ) {
                    return inputArray.indexOf(item) == index;
                    });
                                        var total = line.length;
                    var ap = 0;
                    var rp = 0;
                    var iv = 0;
                    var testadu = 0;
                    var st = 'AGUARDANDO COMANDO';
                    $('#status_ccs').html("INICIADO");
                    $('#total_ccs').html(total);
                    $("#lista_ccs").val(line.join("\n"));
$('#lista_ccs').attr('disabled', 'disabled');
$('#pararchk').attr('disabled', null);
                    line.forEach(function (value){
                        if (value == "") {
                            removelinha();
                            return;

                        }
                        var ajaxCall = $.ajax({
                        url: 'api.php',
                        type: 'GET',
                        data: 'lista=' + value,
                            success: function (data) {
                                var status = data.includes("Aprovada");
                                if (status) {
                                    removelinha();
                                    $('#status_ccs').html("APROVADA");
                                 document.getElementById("aprovadas").innerHTML += data + "<br>";
                                                                    testadu = testadu + 1;
                                    ap = ap + 1;
                                   
                                }else if (data.includes("Invalido")){
                            
                                    removelinha();
                                    $('#status_ccs').html("INVALIDO");
                                     document.getElementById("invalidas").innerHTML += data + "<br>";
                                                                        testadu = testadu + 1;
                                    iv = iv + 1;
                                }else{
                            
                                    removelinha();
                                    $('#status_ccs').html("REPROVADA");
                                     document.getElementById("reprovadas").innerHTML += data + "<br>";
                                                                        testadu = testadu + 1;
                                    rp = rp + 1;
                                }
                                var fila = parseInt(ap) + parseInt(rp)+ parseInt(iv);
                            $('#lives_ccs').html(ap);
                            $('#lives_cs').html(ap);
                                $('#dies_ccs').html(rp);
                                $('#dies_cs').html(rp);
                                $('#invalido_cs').html(iv);
                                $('#testado_ccs').html(fila);

                                if (fila == total) {
                                   $('#iniciarchk').attr('disabled', null);
                                    $('#pararchk').attr('disabled', 'disabled');
                                    $('#lista_ccs').attr('disabled', null);
                                    // audio.play();
                                    document.getElementById("status_ccs").innerHTML = "FINALIZADO";
                                }
                            }
                        });
                        $('#pararchk').click(function () {
                            ajaxCall.abort();
                            $('#iniciarchk').attr('disabled', null);
                            $('#pararchk').attr('disabled', 'disabled');
                            $('#lista_ccs').attr('disabled', null);
                             var st = 'PAUSADO';
                            $('#status_ccs').html(st);
                        });
                });
                });

        });
          function removelinha() {
          var lines = $("#lista_ccs").val().split('\n');
          lines.splice(0, 1);
          $("#lista_ccs").val(lines.join("\n"));
      }

                    function limpar() {
    document.getElementById("lista_ccs").value = "";

}

function copyIp()
{
    window.getSelection().selectAllChildren(document.getElementById("aprovadas"));
    document.execCommand("Copy");
    var st = 'Lista de aprovadas copiada com sucesso.';
    $('#status_ccs').html(st);
}

function ddlselect() 
{
    var d=document.getElementById("testador");
    var displaytext=d.options[d.selectedIndex].text;
    document.getElementById("status_ccs").value=displaytext;
}
