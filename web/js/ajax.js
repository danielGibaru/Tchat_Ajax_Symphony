$(document).ready(function () {
    $("#btnSend").click(function () {
        
        var $inputMess = $("input[id=appbundle_message_text]").val();
        if ($inputMess !== '') {
//            alert($inputMess);

        }
$.ajax({
            url:'http://localhost/tp/projetTchatAjax/web/envois', // La ressource ciblée
            data: { "inputMessJason" : $inputMess},
            type : 'get',
            dataType: "json",
            /**
             * Le paramètre data n'est plus renseigné, nous ne faisons plus passer de variable
             */
            success: function() {
//               resulte = JSON.stringify(result);
  
            }


        });
    });

});


