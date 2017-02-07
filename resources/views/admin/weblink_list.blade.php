@extends('layouts.admin')

@section('content')
<div id="window_weblinkList" class="page-window active-window">
  <input type="hidden" class="prev_window"/>
  <div class="row-fluid">
    <div class="span12">
      <div class="grid simple ">
        <div class="grid-title">
          <h4><span class="semi-bold">{{trans('resource.weblinks.weblinktitle')}}</span></h4>
          <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="javascript:;" onclick="baseGridFunc.reload('weblinks_grid')" class="reload"></a> </div>
        </div>
        <div class="grid-body ">
          <div style="display: none;" class="ucolumn-cont" data-table="weblinks_grid">
            <ucolumn name="id" source="id" visible="false"/>
            <ucolumn name="category_id" source="category_id" utype="formatter" func="uweblinks.categoryFormatter"/>
            <ucolumn name="source" source="source"/>
            <ucolumn name="link" source="link"/>
            <ucolumn width="50px" name="edit_btn" source="edit_btn" utype="btn" func="uweblinks.edit" uclass="btn-warning" utext="{{trans('resource.buttons.edit')}}"></ucolumn>
            <ucolumn width="50px" name="remove_btn" source="remove_btn" utype="btn" func="uweblinks.remove" uclass="btn-danger" utext="{{trans('resource.buttons.remove')}}"></ucolumn>
          </div>
          <table action="weblinklist" cellpadding="0" cellspacing="0" border="0" class="table table-hover table-condensed" id="weblinks_grid" width="100%">
            <thead>
              <tr>
                <th>{{trans('resource.weblinks.id')}}</th>
                <th>{{trans('resource.weblinks.category')}}</th>
                <th>{{trans('resource.weblinks.title')}}</th>
                <th>{{trans('resource.weblinks.link')}}</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    var buttons = [];
    buttons.push('<button onclick="addWeblink(false); return false;" class="btn btn-primary pull-left" style="margin-left:12px" id="">{{trans('resource.buttons.add')}}</button>');

    baseGridFunc.init("weblinks_grid", buttons);
  });

  function addWeblink(isEdit){
    if(isEdit){
      var id = baseGridFunc.getSelectedRow("weblinks_grid", "id");
      if(id != undefined && id != null)
        uPage.call('/admin/weblinkregister', {"id" : id, "isEdit" : isEdit}, false);
    }else{
      uPage.call('/admin/weblinkregister', null, false);
    }
  }

  function removeWebLink(){
    var id = baseGridFunc.getSelectedRow("weblinks_grid", "id");
    if(id != undefined && id != null){
      if(confirm("Устгахдаа итгэлтэй байна уу?")){
        $.post("/admin/weblinkremove", {'id' : id}, function(){
          baseGridFunc.reload('weblinks_grid');
        });
      }
    }
  }

  var uweblinks = {
    add: function(){
        var postData = {};
        uPage.call('weblinkregister',postData);
      },

      edit: function(gridId ,elmnt){

          var rowData = baseGridFunc.getRowData(gridId ,elmnt);

          var postData = {};
          postData['isEdit'] = true;
          postData['id'] = rowData.id;

          uPage.call('weblinkregister',postData);
      },

      save: function(){
          var data = $("#category_action_form").serializeObject();

          $.ajax({
              url: '/admin/category/save',
              type: "POST",
              dataType: "json",
              data : data,
              success: function(data){
                  if(data.type == 'success'){
                    alert(messages.saved);
                    uPage.close('window_categoryIndex');
                    baseGridFunc.reload("weblinks_grid");
                  }else{
                      uvalidate.setErrors(data);
                  }
              }
          });
      },

      remove: function(gridId ,elmnt){

        var rowData = baseGridFunc.getRowData(gridId ,elmnt);

        var postData = {};
        postData['id'] = rowData.ca_id;
        $.ajax({
            url: '/admin/category/remove',
            type: "POST",
            dataType: "json",
            data : postData,
            success: function(data){
                if(data.type == 'success'){
                  alert(messages.removed);
                  baseGridFunc.reload("weblinks_grid");
                }
            }
        });
      },
      categoryFormatter: function(data, type, row){
        var retVal = "";

        if(data == 1){
            retVal = weblinkres.sums;
        }else if(data == 2){
          retVal = weblinkres.agency;
        }else{
          retVal = weblinkres.others;
        }

        return retVal;
      },
  }

</script>
@endsection

@section('hidden_form')
<div class="admin-bar" id="quick-access" style="height:90%; overflow:scroll; display: ">
 <div class="admin-bar-inner" style="height: 3000px;">
   <div class="form-horizontal">
     <select id="val1" class="select2-wrapper">
       <option value="Gecko" />Gecko
       <option value="Webkit" />Webkit
       <option value="KHTML" />KHTML
       <option value="Tasman" />Tasman
     </select>
     <select id="val2" class="select2-wrapper">
       <option value="Internet Explorer 10" />Internet Explorer 10
       <option value="Firefox 4.0" />Firefox 4.0
       <option value="Chrome" />Chrome
     </select>
   </div>
   <button class="btn btn-primary btn-cons btn-add" type="button">Add Browser</button>
   <button class="btn btn-white btn-cons btn-cancel" type="button">Cancel</button>
 </div>
</div>
<div class="addNewRow"></div>
@endsection
