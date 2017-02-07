@extends('layouts.admin')

@section('content')
<div id="window_shorterList" class="page-window active-window">
  <div class="page-title">
  <i class="icon-custom-left"></i>
  <h3> - <span class="semi-bold">{{trans('resource.main.shorter')}}</span></h3>
  </div>
  <div class="row-fluid">
  <div class="span12">
    <div class="grid simple ">
      <div class="grid-title">
        <h4><span class="semi-bold">{{trans('resource.category.list')}}</span></h4>
        <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="javascript:;" onclick="baseGridFunc.reload('category_grid')" class="reload"></a> </div>
      </div>
      <div class="grid-body ">
        <div style="display: none;" class="ucolumn-cont" data-table="shorter_grid">
          <ucolumn name="id" source="id"/>
          <ucolumn name="source" source="source"/>
          <ucolumn name="url" source="url"/>
          <ucolumn name="target" source="target"/>
        </div>
        <table action="shorter/data" cellpadding="0" cellspacing="0" border="0" class="table table-hover table-condensed" id="shorter_grid" width="100%">
          <thead>
            <tr>
              <th>{{trans('resource.category.id')}}</th>
              <th>{{trans('resource.category.name')}}</th>
              <th>{{trans('resource.category.link')}}</th>
              <th>{{trans('resource.category.target')}}</th>
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
      buttons.push('<button onclick="ushorter.add()" class="btn btn-primary" style="margin-left:12px">{{trans('resource.buttons.add')}}</button>');
      buttons.push('<button onclick="ushorter.edit()" class="btn btn-warning" style="margin-left:12px">{{trans('resource.buttons.edit')}}</button>');
      // buttons.push('<button onclick="ucategory.remove()" class="btn btn-danger" style="margin-left:12px">{{trans('resource.buttons.remove')}}</button>');

      baseGridFunc.init("shorter_grid", buttons);
  });

   var ushorter = {

        add: function(){
          var postData = {};
          uPage.call('category/index',postData);
        },

        edit: function(){

            var postData = {};
            postData['isEdit'] = true;
            postData['id'] = baseGridFunc.getSelectedRow('shorter_grid', 'id');
            if(postData['id'] != ""){
                uPage.call('shorter/index',postData);
            }
        },

        save: function(){
            var data = $("#shorter_action_form").serializeObject();

            $.ajax({
                url: '/admin/shorter/save',
                type: "POST",
                dataType: "json",
                data : data,
                success: function(data){
                    if(data.type == 'success'){
                      alert(messages.saved);
                      uPage.close('window_shorterIndex');
                      baseGridFunc.reload("shorter_grid");
                    }
                }
            });
        },

        remove: function(){
          var postData = {};
          postData['id'] = baseGridFunc.getSelectedRow('category_grid', 'ca_id');
          if(postData['id'] != ""){
              $.ajax({
                  url: '/admin/category/remove',
                  type: "POST",
                  dataType: "json",
                  data : postData,
                  success: function(data){
                      if(data.type == 'success'){
                        alert(messages.removed);
                        baseGridFunc.reload("category_grid");
                      }
                  }
              });
          }
        }
   }
</script>
  @endsection
