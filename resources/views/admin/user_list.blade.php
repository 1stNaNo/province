@extends('layouts.admin')

@section('content')
<div id="window_usersList" class="page-window active-window">
  <input type="hidden" class="prev_window"/>
  <div class="row-fluid">
    <div class="span12">
      <div class="grid simple ">
        <div class="grid-title">
          <h4>{{ trans('resource.main.shorter') }}</h4>
        </div>
        <div class="grid-body">
          <div style="display: none;" class="ucolumn-cont" data-table="users_grid">
            <ucolumn name="id" source="id" visible="false"/>
            <ucolumn name="name" source="name"/>
            <ucolumn name="email" source="email"/>
            <ucolumn width="50px" name="edit_btn" source="edit_btn" utype="btn" func="uusers.edit" uclass="btn-warning" utext="{{trans('resource.buttons.edit')}}"></ucolumn>
            <ucolumn width="50px" name="remove_btn" source="remove_btn" utype="btn" func="uusers.remove" uclass="btn-danger" utext="{{trans('resource.buttons.remove')}}"></ucolumn>
          </div>
          <table action="userslist" cellpadding="0" cellspacing="0" border="0" class="table table-hover table-condensed" id="users_grid" width="100%">
            <thead>
              <tr>
                <th>{{trans('resource.weblinks.id')}}</th>
                <th>{{trans('resource.name')}}</th>
                <th>{{trans('resource.email')}}</th>
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
    buttons.push('<button onclick="uusers.add(); return false;" class="btn btn-primary pull-left" style="margin-left:12px" id="">{{trans('resource.buttons.add')}}</button>');
    baseGridFunc.init("users_grid", buttons);
  });

  var uusers = {
      add: function(){
        var postData = {};
        uPage.call('/admin/newuser',postData);
      },

      edit: function(gridId ,elmnt){

          var rowData = baseGridFunc.getRowData(gridId ,elmnt);

          var postData = {};
          postData['id'] = rowData.id;

          uPage.call('/admin/newuser',postData);
      },

      save: function(){

          $.ajax({
              url: '/admin/usersave',
              type: "POST",
              dataType: "json",
              data : new FormData($("#userRegister_form")[0]),
              processData: false,  // tell jQuery not to process the data
              contentType: false,  // tell jQuery not to set contentType
              success: function(data){
                  if(data.type == 'success'){
                    alert(messages.saved);
                    uPage.close('window_userRegister');
                    baseGridFunc.reload("users_grid");
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
            url: '/admin/userremove',
            type: "POST",
            dataType: "json",
            data : postData,
            success: function(data){
                if(data.type == 'success'){
                  alert(messages.removed);
                  baseGridFunc.reload("users_grid");
                }
            }
        });
      }
  }

</script>
@endsection
