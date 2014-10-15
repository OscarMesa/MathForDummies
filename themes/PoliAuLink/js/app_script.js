var url = 'http://localhost/MYSE_DLLO/ise/?mod=5';

$(document).on("ready", function() {

    if ($("#myModal").length == 0)
    {
        $('body').append(getModalHtml());
    }

});

    function AbrirModal(titulo, ancho, alto, direccion)
    {
        $("#myModal .modal-header .modal-title").html(titulo);
        $("#iframeApp").attr('src', direccion);

        $(this).find('.modal-dialog').css({
            width: '40%x', //choose your width
            height: '100%',
            'padding': '0'
        });
        $(this).find('.modal-content').css({
            height: alto+'px',
            'border-radius': '0',
            'padding': '0'
        });
        $(this).find('.modal-body').css({
            width: 'auto',
            height: '100%',
            'padding': '0'
        });
        
        $(".modal-body").css('height', alto+'px');
        $(".modal-content").css('height', alto+'px');
//        $("#myModal").css('height', ancho+'px');
        $("#myModal").css('width', ancho+'px');
        $("#myModal").modal({show: true});
        return false;
    }


    function getModalHtml()
    {
        return  "<div id=\"myModal\" class=\"modal hide fade\" tabindex=\"-1\" data-width=\"760\" style=\"display: none;\"><div class=\"modal-header\"> <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>    <h4 class=\"modal-title\">Responsive</h4> </div>  <div class=\"modal-dialog\"><div class=\"modal-content\"><div class=\"modal-body\">  <iframe id=\"iframeApp\"  src=\"\" width=\"100%\" height=\"100%\" frameborder=\"0\" scrolling=\"yes\" allowtransparency=\"true\"></iframe> </div></div></div></div>";
    }
