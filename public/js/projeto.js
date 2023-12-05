function deleteRegistrPaginacao (rotaUrl, idDoRegistro) {
    
if (confirm('Deseja confimar a ex ?')) {

    $.ajax({
        url: rotaUrl,
        method: 'DELETE',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data:{ 
             id: idDoRegistro,  
         
    },
        beforeSend: function () {
            $.blockUI({
               message: 'carregando...',
                timeout: 2000,
              });
            },
        }).done (function (data) {
            $.unblockUI ();
            if (data.success == true) {
            window.location.reload();
          } else {
             alert ('nao foi possivel excluir');
          }
        }).fail (function (data) {
            $.unblockUI();
            alert('não foi possível buscar os dados');
        });
        } 
    }

