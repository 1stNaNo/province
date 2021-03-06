$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

var uPage = {
	call: function(url, param, isMenu){
		$.post(url, param, function(result){
	    var $prevPage = $(".active-window");
	    var $newPage = $(result);

	    if($newPage.attr('id') != $prevPage.attr('id')){
	      $prevPage.removeClass('active-window').addClass('inactive-window');
	      $newPage.addClass('active-window').find('input.prev_window').val($prevPage.attr('id'));

	      $($newPage).find("input.datepicker").datepicker();
	      if(isMenu)
	        $(".content").html($newPage);
	      else
	        $(".content").append($newPage);

	      $('select').each(function(){
	        if(!$(this).hasClass('select2-selection__rendered'))
	          $(this).select2({
	            'width' : '100%'
	          });
	      });
	    }



		}).fail(function(xhr, status, error){
			//nMessage(error);
		});
	},

	close: function(windowId, callback){

    if(callback != undefined){
        callback();
    }

	  $prevWindowId = $("#"+windowId).find("input.prev_window").val();
	  $("#" + $prevWindowId).removeClass('inactive-window').addClass('active-window');
	  $("#"+windowId).remove();

	  $("span.select2.select2-container").each(function(){
	    $(this).css('style', 'width: auto !important');
	  });

	}
};

var uForm = {
	register: function(form_id, callback){
		$(".red-border").each(function(){
    		$(this).removeClass("red-border");
  		});
  		$('.help-block').remove();
  		$.post($('#'+form_id).attr('action'), $("#"+form_id).serialize(), function(data){
    		if(data.status == 422){
      			$.each(data.errors, function(i, v){
        			$("[name='"+i+"']").parent().append('<span class="help-block validation-error"><strong>'+v+'</strong></span>');
        			$("[name='"+i+"']").addClass('red-border');
      			});
	    	}else{
	      		callback(data);
	    	}
  		}).fail(function(xhr, status, error){
    		/*nMessage(error);*/
  		});
	  /*$.post($('#'+form_id).attr('action'), $("#"+form_id).serialize(), function(data){
	    if(data.status == 422){
	      $.each(data.errors, function(i, v){
	        $("[name='"+i+"']").parent().append('<span class="help-block validation-error"><strong>'+v+'</strong></span>');
	      });
	    }else{
	      callback(data);
	    }
	  }).fail(function(xhr, status, error){
	    //nMessage(error);
	  });*/
	}
};

var baseGridFunc = {

    lang: "",

		init: function(gridId , buttons){

			var tableElmt = $("#" + gridId);
			var actionLcl = tableElmt.attr("action");

			var columnLcl = [];

			var columnCont = $('.ucolumn-cont[data-table="'+ gridId +'"]');

			columnCont.find("ucolumn").each(function(){
					var colTmp = {};

          $this = $(this);

					colTmp["data"] = $this.attr("source");
					colTmp["name"] = $this.attr("name");

          if($this.attr("utype") == "btn"){
              var tmpBtn = '<button onclick="'+ $this.attr('func') +'(\''+ gridId +'\', this)" class="btn '+ $this.attr('uclass') +'">'+ $this.attr('utext') +'</button>';
              colTmp["render"] = function(data, type, row){
                  return tmpBtn;
              }
          }

          if($this.attr("utype") == "formatter"){
              var funcName = $this.attr("func");
              colTmp["render"] = function(data, type, row){
                  return eval(funcName)(data, type, row);
              }
          }

          if($this.attr('width') != undefined){
              colTmp["width"] = $this.attr("width");
          }

          if($this.attr("visible") == "false"){
            colTmp["className"] = "hidden_column";
          }

					columnLcl.push(colTmp);
			});



			var table = $('#' + gridId).dataTable({
					processing: true,
					serverSide: true,
					ajax: {
						'url' : actionLcl,
						'data' : baseGridFunc.loadParam(gridId)
					},
					columns: columnLcl,
					"language": {
							"url": baseGridFunc.lang
					},
					"initComplete": function(settings, json) {

						$('#'+ gridId +"_length").after('<div class="toolbar"><div class="table-tools-actions"></div>');

						for(var i=0; i < buttons.length; i++){
								$('#'+ gridId +"_wrapper .toolbar .table-tools-actions").append(buttons[i]);
						}

						$('#'+ gridId +'_wrapper .dataTables_filter input').addClass("input-medium ");
						$('#'+ gridId +'_wrapper .dataTables_length select').addClass("select2-wrapper span12");
						$(".select2-wrapper").select2({minimumResultsForSearch: -1});

						$('#'+ gridId +'_wrapper tbody').on( 'click', 'tr', function () {
								if ( $(this).hasClass('row_selected') ) {
										$(this).removeClass('row_selected');
								}
								else {
										table.$('tr.row_selected').removeClass('row_selected');
										$(this).addClass('row_selected');
								}
						});
					}
			});

		},

    getRowData: function(gridId, elmnt){

      var columnCont = $('.ucolumn-cont[data-table="'+ gridId +'"]');
      var rowElmnt = $(elmnt).closest("tr").find("td");

      var retData = {};

      var counter = 0;

			columnCont.find("ucolumn").each(function(){

          retData[$(this).attr("name")] = $(rowElmnt[counter]).text();
					counter++;
			});

      return retData;

    },

		getSelectedRow: function(gridId, colname){

			var tableElmt = $("#" + gridId);

			var columnCont = $('.ucolumn-cont[data-table="'+ gridId +'"]');

			var counter = 0;
			var indexLcl;

			columnCont.find("ucolumn").each(function(){
					if($(this).attr("name") == colname){
						indexLcl = counter;
						return false;
					}

					counter++;
			});
      var retValue = "";
			if(tableElmt.find("tr.row_selected").length > 0){

					var i = 0;
					tableElmt.find("tr.row_selected").find("td").each(function(){
							if(i == indexLcl){
									retValue = $(this).text();
									return false;
							}
							i++;
					});

			}
			return retValue;
		},

		reload: function(gridId){
			$('#'+ gridId).DataTable().ajax.reload();
		},
		loadParam : function(gridId){
			var params = {};
			$("#"+gridId).closest('.grid-body').find('.grid-param').each(function(){
				params[$(this).attr('name')] = $(this).val();
			});
			return params;
		}
};

var hiddenFormFunc = {
		show: function(id){
				$("#"+id).css("bottom","0px");
		}
};

var langFunc = {
	splitByLang(windowId){
      var $obj = $("#"+windowId).find(".has-lang").find(".row-fluid").clone();
      $("#"+windowId).find(".has-lang").find('.row-fluid').remove();
      $("input.langs").each(function(){
        var $tmpObj = $obj.clone();
        $tmpObj.find("label").text($tmpObj.find("label").text() + " /" + $(this).val() + "/");
        $tmpObj.find("input").attr('name', $tmpObj.find("input").attr('name') + "[" + $(this).val() + "]").addClass("input-lang-" + $(this).val());
        $("#"+windowId).find(".has-lang").append($tmpObj);

      });
	}
}
function Log(data){
    console.log(data);
}

var uvalidate = {
    setErrors: function(errors){
        for(var error in errors){
            var tmpName = "";

            if(error.indexOf(".") > -1){
              tmpName = error.split(".");
              tmpName = tmpName[0] + "["+ tmpName[1] +"]";
            }else{
              tmpName = error;
            }
            console.log("[name='"+ tmpName +"']");
            $("[name='"+ tmpName +"']").css("border", "solid 1px red");
        }

        alert(messages.fill);
    }
}
