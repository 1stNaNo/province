@extends('layouts.admin')

@section('content')
<div id="window_externalList" class="page-window active-window">
  <div class="row-fluid">
  <div class="span12">
    <div class="grid simple ">
      <div class="grid-title">
        <h4><span class="semi-bold">{{trans('resource.category.title')}}</span></h4>
        <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="javascript:;" onclick="baseGridFunc.reload('external_grid')" class="reload"></a> </div>
      </div>
      <div class="grid-body ">
        <div style="display: none;" class="ucolumn-cont" data-table="external_grid">
          <ucolumn name="id" source="id" visible="false"></ucolumn>
          <ucolumn name="link" source="link"></ucolumn>
          <ucolumn name="count" source="count"></ucolumn>
          <ucolumn width="50px" name="edit_btn" source="edit_btn" utype="btn" func="uexternal.edit" uclass="btn-warning" utext="{{trans('resource.buttons.edit')}}"></ucolumn>
          <ucolumn width="50px" name="remove_btn" source="remove_btn" utype="btn" func="uexternal.remove" uclass="btn-danger" utext="{{trans('resource.buttons.remove')}}"></ucolumn>
        </div>
        <table action="external/data" cellpadding="0" cellspacing="0" border="0" class="table table-hover table-condensed" id="external_grid" width="100%">
          <thead>
            <tr>
              <th>{{trans('resource.category.id')}}</th>
              <th>{{trans('resource.category.parent')}}</th>
              <th>{{trans('resource.category.name')}}</th>
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
      buttons.push('<button onclick="uexternal.add()" class="btn btn-primary" style="margin-left:12px">{{trans('resource.buttons.add')}}</button>');

      baseGridFunc.init("external_grid", buttons);
  });

   var uexternal = {

        add: function(){
          var postData = {};
          uPage.call('external/index',postData);
        },

        edit: function(gridId ,elmnt){

            var rowData = baseGridFunc.getRowData(gridId ,elmnt);

            var postData = {};
            postData['isEdit'] = true;
            postData['id'] = rowData.id;

            uPage.call('external/index',postData);
        },

        save: function(){
            var data = $("#external_action_form").serializeObject();

            $.ajax({
                url: '/admin/external/save',
                type: "POST",
                dataType: "json",
                data : data,
                success: function(data){
                    if(data.type == 'success'){
                      alert(messages.saved);
                      uPage.close('window_externalIndex');
                      baseGridFunc.reload("external_grid");
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
              url: '/admin/external/remove',
              type: "POST",
              dataType: "json",
              data : postData,
              success: function(data){
                  if(data.type == 'success'){
                    alert(messages.removed);
                    baseGridFunc.reload("external_grid");
                  }
              }
          });
        }

   }
</script>
  @endsection
