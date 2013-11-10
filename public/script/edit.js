
/**
* @Esta función guarda en una variable el texto que se tiene actualmente en el campo de texto
*
* @author Oskar
* @version 1
*/
/**
* Funcion que guarda en una variable el valor actual del campo.
*/


function LoadJQueryAutoSave(){

$.fn.editable = function(url, options) {
	// Options

	options = arrayMerge({
		"url": url,
		"paramName": "value",
		"callback": null,
		"saving": "saving ...",
		"type": "text",
		"submitButton": 0,
		"delayOnBlur": 0,
		"extraParams": {},
		"editClass": null
	}, options);
	// Set up

	$(this).live('click',function(e) {
			if (this.editing) return;
			if (!this.editable) this.editable = function() {
				var me = this;
				me.editing = true;
				me.orgHTML = $(me).html();
				me.innerHTML = "";
				if (options.editClass){$(me).addClass(options.editClass);}
				var f = document.createElement("form");
				var i = createInputElement(me.orgHTML,$(me).parent().width(),$(me).attr('max'));
				var t = 0;
				f.appendChild(i);
				if (options.submitButton) {
					var b = document.createElement("input");
					b.type = "submit";
					b.value = "OK";
					f.appendChild(b);
				}
				me.appendChild(f);
				i.focus();
				$(i).blur(
						options.delayOnBlur ? function() { t = setTimeout(reset, options.delayOnBlur) } : reset
					)
					.keydown(function(e) {
						if (e.keyCode == 27) { // ESC
							e.preventDefault;
							reset
						}
					});
				$(f).submit(function(e) {
					if (t) clearTimeout(t);
					e.preventDefault();
					var p = {};
					p[i.name] = $(i).val();
					options.extraParams['table'] = me.id;
					$(me).html(options.saving).load(options.url, arrayMerge(options.extraParams, p), function(response,status,xhr) {
						// Remove script tags
						BoxShadow = false;
						me.innerHTML = me.innerHTML.replace(/<\s*script\s*.*>.*<\/\s*script\s*.*>/gi, "");
						// Callback if necessary
						if (options.callback) options.callback(me,jQuery.parseJSON(response)); 
						// Release
						me.editing = false;						
					});
				});
				function reset() {
					
					BoxShadow = false;
					me.innerHTML = me.orgHTML;
					
					if (options.editClass) $(me).removeClass(options.editClass);
					me.editing = false;	

			//		document.getElementById('error_'+this.extraParams.table).innerHTML = response.error.value;			
				}	
			};
			this.editable();
		})
	;
	// Don't break the chain
	return this;
	// Helper functions
	function arrayMerge(a, b) {
		if (a) {
			if (b) for(var i in b) a[i] = b[i];
			return a;
		} else {
			return b;		
		}
	};
	function createInputElement(v,t,maxlength) {
		//console.log(v);
		BoxShadow = true;
		$('edit1').css('box-shadow', 'none');//x, y, sombra
		if (options.type == "textarea") {
			var i = document.createElement("textarea");
			$(i).width(t);
			options.submitButton = true;
			options.delayOnBlur = 709; // delay onBlur so we can click the button
		} else {
			var i = document.createElement("input");
			i.type = "text";
		}
		$(i).val(v);
		$(i).attr('maxlength',maxlength);
		i.name = options.paramName;
		return i;
	}
};
}

