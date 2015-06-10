var url = 'http://localhost/MYSE_DLLO/ise/?mod=5';

$(document).on("ready", function () {

    if ($("#myModal").length == 0)
    {
        $('body').append(getModalHtml());
    }

});

function closeModalSave(id_grid, id_modal)
{
    setTimeout(function () {
        // if($('#'+id_grid).length > 0)
        window.parent.$.fn.yiiGridView.update(id_grid);

        window.parent.$('#' + id_modal).modal('hide');
    }, 1200);
}

function AbrirModal(titulo, ancho, alto, direccion,style)
{
    if(style == undefined)
        style = "left: 45%";
    $("#myModal .modal-header .modal-title").html(titulo);
    $("#iframeApp").attr('src', direccion);
    $("#iframeApp").attr('src', direccion);

    $('#myModal .modal-dialog').css({
        width: ancho, //choose your width
        height: alto,
    });
    $(this).find('.modal-content').css({
        height: alto,
        'border-radius': '0',
        'padding': '0',
    });
    $('#myModal .modal-body').css({
        width: 'auto',
        height: '100%',
        'max-height': alto
    });

    $(".modal-body").css('height', alto);
    $(".modal-content").css('height', alto);
//        $("#myModal").css('height', ancho+'px');
    $("#myModal").attr('style', 'width:' + ancho + ';top:0; height:' + alto + ";" + (style));
    $("#myModal").modal({show: true});
    return false;
}


function getModalHtml()
{
    return  "<div id=\"myModal\" class=\"modal hide fade\" tabindex=\"-1\" data-width=\"760\" style=\"display: none;\"><div class=\"modal-header\"> <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>    <h4 class=\"modal-title\">Responsive</h4> </div>  <div class=\"modal-dialog\"><div class=\"modal-content\"><div class=\"modal-body\">  <iframe id=\"iframeApp\"  src=\"\" width=\"100%\" height=\"100%\" frameborder=\"0\" scrolling=\"yes\" allowtransparency=\"true\" style=\"max-height: 85%;\"></iframe> </div></div></div></div>";
}

function activar()
{
    var grid = jQuery(this).attr('grid');
    if (!confirm('¿Está seguro que desea activar este elemento?'))
        return false;
    $.ajax({
        url: jQuery(this).attr('href'),
        type: "POST",
        success: function (data) {
            $.fn.yiiGridView.update(grid);
        },
        error: function (XHR) {
            return afterDelete(th, false, XHR);
        }
    });
    return false;
}


function triggerAjaxValidation(formObj) {
    var delay = 40; //allow some time for events to finish
    setTimeout(function () {

        //data('settings') is another way to fetch settings from a formObj
        var settings = formObj.data('settings');
        $.each(settings.attributes, function () {
            this.status = 2; // forcing ajax validation
        });

        //updating settings with the new status
        formObj.data('settings', settings);
        $.fn.yiiactiveform.validate(formObj, function (data) {
            $.each(settings.attributes, function () {

                //each attribute gets updated
                $.fn.yiiactiveform.updateInput(this, data, formObj);

            });
            $.fn.yiiactiveform.updateSummary(formObj, data);
        });
    }, delay);
}


function triggerAjaxValidationForAttribute(formObj, attributeName) {
    var delay = 40;

    setTimeout(function() {
        var settings = formObj.data('settings');
        $.each(settings.attributes, function() {
            if (this.name === attributeName) {
                this.status = 2; // force ajax validation
            }
        });

        formObj.data('settings', settings);
        $.fn.yiiactiveform.validate(formObj, function(data) {
            $.each(settings.attributes, function() {
                if (this.name === attributeName) {
                    $.fn.yiiactiveform.updateInput(this, data, formObj);
                }
            });

            $.fn.yiiactiveform.updateSummary(formObj, data);
        });
    }, delay);
}