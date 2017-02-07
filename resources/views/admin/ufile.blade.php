@extends('layouts.admin')

@section('content')
<div id="window_ufileList" class="page-window active-window">
  <div class="row-fluid">
  <div class="span12">
    <div class="grid simple ">
      <div class="grid-title">
        <h4><span class="semi-bold">{{trans('resource.file.file')}}</span></h4>
        <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="javascript:;" onclick="baseGridFunc.reload('ufile_grid')" class="reload"></a> </div>
      </div>
      <div class="grid-body ">
        <div style="display: none;" class="ucolumn-cont" data-table="ufile_grid">
          <ucolumn name="id" source="id" visible="false"></ucolumn>
          <ucolumn name="title" source="title"></ucolumn>
          <ucolumn name="source" source="source"></ucolumn>
          <ucolumn name="number" source="number"></ucolumn>
          <ucolumn name="confirm_date" source="confirm_date"></ucolumn>
          <ucolumn width="50px" name="edit_btn" source="edit_btn" utype="btn" func="ufile.edit" uclass="btn-warning" utext="{{trans('resource.buttons.edit')}}"></ucolumn>
          <ucolumn width="50px" name="remove_btn" source="remove_btn" utype="btn" func="ufile.remove" uclass="btn-danger" utext="{{trans('resource.buttons.remove')}}"></ucolumn>
        </div>
        <table action="file/data" cellpadding="0" cellspacing="0" border="0" class="table table-hover table-condensed" id="ufile_grid" width="100%">
          <thead>
            <tr>
              <th>{{trans('resource.category.id')}}</th>
              <th>{{trans('resource.file.type')}}</th>
              <th>{{trans('resource.category.name')}}</th>
              <th>{{trans('resource.main.number')}}</th>
              <th>{{trans('resource.main.confirm_date')}}</th>
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
      buttons.push('<button onclick="ufile.add()" class="btn btn-primary" style="margin-left:12px">{{trans('resource.buttons.add')}}</button>');

      baseGridFunc.init("ufile_grid", buttons);
  });

   var ufile = {

        add: function(){
          var postData = {};
          uPage.call('file/index',postData);
        },

        edit: function(gridId ,elmnt){

            var rowData = baseGridFunc.getRowData(gridId ,elmnt);

            var postData = {};
            postData['isEdit'] = true;
            postData['id'] = rowData.id;

            uPage.call('file/index',postData);
        },

        save: function(){
            var data = $("#category_action_form").serializeObject();

            $.ajax({
                url: '/admin/file/save',
                type: "POST",
                dataType: "json",
                data : new FormData($("#ufile_action_form")[0]),
                processData: false,  // tell jQuery not to process the data
                contentType: false,  // tell jQuery not to set contentType
                success: function(data){
                    if(data.type == 'success'){
                      alert(messages.saved);
                      uPage.close('window_ufileIndex');
                      baseGridFunc.reload("ufile_grid");
                    }else{
                        uvalidate.setErrors(data);
                    }
                }
            });
        },

        remove: function(gridId ,elmnt){

          var rowData = baseGridFunc.getRowData(gridId ,elmnt);

          var postData = {};
          postData['id'] = rowData.id;
          $.ajax({
              url: '/admin/file/remove',
              type: "POST",
              dataType: "json",
              data : postData,
              success: function(data){
                  if(data.type == 'success'){
                    alert(messages.removed);
                    baseGridFunc.reload("ufile_grid");
                  }
              }
          });
        },
        urlFormatter: function(data, type, row){
          var retVal = "";

          if(data == "#$cat$#"){
              retVal = categoryres.news;
          }else{
            retVal = data;
          }

          return retVal;
        },

        targetFormatter: function(data, type, row){
            var retVal = "";

            if(data == "_self"){
              retVal = categoryres.self;
            }else{
              retVal = categoryres.blank;
            }

            return retVal;
        },

        activeFlagFormatter: function(data, type, row){
          var retVal = "";

          if(data == 1){
            retVal = mainres.active;
          }else{
            retVal = mainres.deactive;
          }

          return retVal;
        }

   }
</script>
  @endsection
