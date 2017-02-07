@extends('layouts.admin')

@section('content')
<div id="window_newsList" class="page-window active-window">
  <div class="page-title">
  <i class="icon-custom-left"></i>
  <h3> - <span class="semi-bold">{{trans('resource.category.title')}}</span></h3>
  </div>
  <div class="row-fluid">
  <div class="span12">
    <div class="grid simple ">
      <div class="grid-title">
        <h4><span class="semi-bold">{{trans('resource.category.list')}}</span></h4>
        <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="javascript:;" onclick="baseGridFunc.reload('category_grid')" class="reload"></a> </div>
      </div>
      <div class="grid-body ">
        <div style="display: none;" class="ucolumn-cont" data-table="news_grid">
          <ucolumn name="id" source="id"/>
          <ucolumn name="title" source="title"/>
          <ucolumn name="ca_title" source="ca_title"/>
          <ucolumn name="comment_count" source="comment_count"/>
          <ucolumn name="views" source="views"/>
          <ucolumn name="insert_date" source="insert_date"/>
          <ucolumn width="50px" name="edit_btn" source="edit_btn" utype="btn" func="unews.edit" uclass="btn-warning" utext="{{trans('resource.buttons.edit')}}"></ucolumn>
          <ucolumn width="50px" name="remove_btn" source="remove_btn" utype="btn" func="unews.remove" uclass="btn-danger" utext="{{trans('resource.buttons.remove')}}"></ucolumn>
        </div>
        <table action="news/data" cellpadding="0" cellspacing="0" border="0" class="table table-hover table-condensed" id="news_grid" width="100%">
          <thead>
            <tr>
              <th>{{trans('resource.category.id')}}</th>
              <th>{{trans('resource.news.ntitle')}}</th>
              <th>{{trans('resource.category.title')}}</th>
              <th>{{trans('resource.news.comment')}}</th>
              <th>{{trans('resource.news.views')}}</th>
              <th>{{trans('resource.main.insert_date')}}</th>
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
        buttons.push('<button onclick="unews.add()" class="btn btn-primary" style="margin-left:12px">{{trans('resource.buttons.add')}}</button>');

        baseGridFunc.init("news_grid", buttons);
    });

     var unews = {

          add: function(){
            var postData = {};
            uPage.call('news/index',postData);
          },

          edit: function(gridId ,elmnt){

              var rowData = baseGridFunc.getRowData(gridId ,elmnt);

              var postData = {};
              postData['isEdit'] = true;
              postData['id'] = rowData.id;

              uPage.call('news/index',postData);
          },

          save: function(){
              var data = $("#news_action_form").serializeObject();
              data['content'] = {}

              $("usource").find("item").each(function(){
                  data['content'][$(this).attr('name')] = $("#content_"+ $(this).attr('name')).summernote("code");
              });

              $.ajax({
                  url: '/admin/news/save',
                  type: "POST",
                  dataType: "json",
                  data : data,
                  success: function(data){
                      if(data.type == 'success'){
                        alert(messages.saved);
                        uPage.close('window_newsIndex');
                        baseGridFunc.reload("news_grid");
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
                url: '/admin/news/remove',
                type: "POST",
                dataType: "json",
                data : postData,
                success: function(data){
                    if(data.type == 'success'){
                      alert(messages.removed);
                      baseGridFunc.reload("news_grid");
                    }
                }
            });
          }
     }
  </script>
@endsection
