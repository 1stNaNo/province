@extends('layouts.admin')

@section('content')
<div id="window_shorterList" class="page-window active-window">
  <div class="row-fluid">
  <div class="span12">
    <div class="grid simple ">
      <div class="grid-title">
        <h4>{{ trans('resource.main.shorter') }}</h4>
        <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="javascript:;" onclick="baseGridFunc.reload('category_grid')" class="reload"></a> </div>
      </div>
      <div class="grid-body ">
        <div style="display: none;" class="ucolumn-cont" data-table="shorter_grid">
          <ucolumn name="source" source="source"/>
          <ucolumn name="url" source="url"/>
          <ucolumn name="target" source="target" utype="formatter" func="ushorter.formatTarget"/>
          <ucolumn name="show" source="show" utype="formatter" func="ushorter.formatStatus"/>
          <ucolumn name="id" source="id" utype="formatter" func="ushorter.formatEditBtn"/>
        </div>
        <table action="shorter/data" cellpadding="0" cellspacing="0" border="0" class="table table-hover table-condensed" id="shorter_grid" width="100%">
          <thead>
            <tr>
              <th>{{trans('resource.category.id')}}</th>
              <th>{{trans('resource.category.name')}}</th>
              <th>{{trans('resource.category.link')}}</th>
              <th>{{trans('resource.category.target')}}</th>
              <th>{{trans('resource.poll.status')}}</th>
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
      // buttons.push('<button onclick="ucategory.remove()" class="btn btn-danger" style="margin-left:12px">{{trans('resource.buttons.remove')}}</button>');

      baseGridFunc.init("shorter_grid", buttons);
  });

   var ushorter = {

        add: function(){
          uPage.call('shorter/index',null);
        },

        edit: function(id){

            var postData = {};
            postData['isEdit'] = true;
            postData['id'] = id;
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
        },
        formatTarget : function(data, type, row){
          if(data == 'blank')
            return shorters.blank;
          else if(data == 'self')
            return shorters.self;
          else
            return "";
        },
        formatStatus : function(data, type, row){
          if(data == 1){
            return polls.active;
          }else if(data == 0){
            return polls.inactive;
          }else{
            return "";
          }
        },
        formatEditBtn(data, type, row){
          return '<button onclick="ushorter.edit('+data+')" class="btn btn-warning" style="margin-left:12px">{{trans('resource.buttons.edit')}}</button>';
        }
   }
</script>
  @endsection
