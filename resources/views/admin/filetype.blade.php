@extends('layouts.admin')

@section('content')
<div id="window_filetypeList" class="page-window active-window">
  <div class="row-fluid">
  <div class="span12">
    <div class="grid simple ">
      <div class="grid-title">
        <h4><span class="semi-bold">{{trans('resource.file.type')}}</span></h4>
        <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="javascript:;" onclick="baseGridFunc.reload('filetype_grid')" class="reload"></a> </div>
      </div>
      <div class="grid-body ">
        <div style="display: none;" class="ucolumn-cont" data-table="filetype_grid">
          <ucolumn name="ft_id" source="ft_id" visible="false"></ucolumn>
          <ucolumn name="source" source="source"></ucolumn>
          <ucolumn name="icon" source="icon" utype="formatter" func="ufiletype.iconFormatter"></ucolumn>
          <ucolumn name="active_flag" source="active_flag" utype="formatter" func="ufiletype.activeFlagFormatter"></ucolumn>
          <ucolumn width="50px" name="edit_btn" source="edit_btn" utype="btn" func="ufiletype.edit" uclass="btn-warning" utext="{{trans('resource.buttons.edit')}}"></ucolumn>
          <ucolumn width="50px" name="remove_btn" source="remove_btn" utype="btn" func="ufiletype.remove" uclass="btn-danger" utext="{{trans('resource.buttons.remove')}}"></ucolumn>
        </div>
        <table action="filetype/data" cellpadding="0" cellspacing="0" border="0" class="table table-hover table-condensed" id="filetype_grid" width="100%">
          <thead>
            <tr>
              <th>{{trans('resource.category.id')}}</th>
              <th>{{trans('resource.category.name')}}</th>
              <th>{{trans('resource.main.icon')}}</th>
              <th>{{trans('resource.main.active')}} / {{trans('resource.main.deactive')}}</th>
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
      buttons.push('<button onclick="ufiletype.add()" class="btn btn-primary" style="margin-left:12px">{{trans('resource.buttons.add')}}</button>');

      baseGridFunc.init("filetype_grid", buttons);
  });

   var ufiletype = {

        add: function(){
          var postData = {};
          uPage.call('filetype/index',postData);
        },

        edit: function(gridId ,elmnt){

            var rowData = baseGridFunc.getRowData(gridId ,elmnt);

            var postData = {};
            postData['isEdit'] = true;
            postData['id'] = rowData.ft_id;

            uPage.call('filetype/index',postData);
        },

        save: function(){
            var data = $("#filetype_action_form").serializeObject();

            $.ajax({
                url: '/admin/filetype/save',
                type: "POST",
                dataType: "json",
                data : data,
                success: function(data){
                    if(data.type == 'success'){
                      alert(messages.saved);
                      uPage.close('window_filetypeIndex');
                      baseGridFunc.reload("filetype_grid");
                    }else{
                        uvalidate.setErrors(data);
                    }
                }
            });
        },

        remove: function(gridId ,elmnt){

          var rowData = baseGridFunc.getRowData(gridId ,elmnt);

          var postData = {};
          postData['id'] = rowData.ft_id;
          $.ajax({
              url: '/admin/filetype/remove',
              type: "POST",
              dataType: "json",
              data : postData,
              success: function(data){
                  if(data.type == 'success'){
                    alert(messages.removed);
                    baseGridFunc.reload("filetype_grid");
                  }
              }
          });
        },
        iconFormatter: function(data, type, row){
          var retVal = '<span class="'+ data +'" style="font-size: 20px; color: blue;"></span>';
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
