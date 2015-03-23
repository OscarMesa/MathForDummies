$(document).ready(function() {

    function removerHtml(obj) {  //remover html de un contenido devuelto
        var strHtmlCode = obj;  
        strHtmlCode = strHtmlCode.replace(/&(lt|gt);/g,  
        function (strMatch, p1) {  
            return (p1 == "lt") ? "<" : ">";  
        });  
        var newtext = strHtmlCode.replace(/<\/?[^>]+(>|$)/g, "");  
        return newtext;  
    }  

    $('.summernote').summernote({
      onkeyup: function(e) {
      	if( removerHtml($('.summernote').code()) ){
      		$('#Contenidos_detalle').val($('.summernote').code());
      	}else{
      		$('#Contenidos_detalle').val('');
      	}
      },
    });

});
