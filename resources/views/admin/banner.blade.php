@extends('layouts.admin')

@section('content')
<div id="window_bannerList" class="page-window active-window">
  <div class="row-fluid">
  <div class="span12">
    <div class="grid simple ">
      <div class="grid-title">
        <h4><span class="semi-bold">{{trans('resource.banner.banner')}}</span></h4>
        <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="javascript:;" onclick="baseGridFunc.reload('banner_grid')" class="reload"></a> </div>
      </div>
      <div class="grid-body ">
        <div style="display: none;" class="ucolumn-cont" data-table="banner_grid">
          <ucolumn name="banner_id" source="banner_id" visible="false"></ucolumn>
          <ucolumn name="value" source="value" utype="formatter" func="ubanner.valueFormatter"></ucolumn>
          <ucolumn width="50px" name="edit_btn" source="edit_btn" utype="btn" func="ubanner.edit" uclass="btn-warning" utext="{{trans('resource.buttons.edit')}}"></ucolumn>
          <ucolumn width="50px" name="remove_btn" source="remove_btn" utype="btn" func="ubanner.remove" uclass="btn-danger" utext="{{trans('resource.buttons.remove')}}"></ucolumn>
        </div>
        <table action="banner/data" cellpadding="0" cellspacing="0" border="0" class="table table-hover table-condensed" id="banner_grid" width="100%">
          <thead>
            <tr>
              <th>{{trans('resource.category.id')}}</th>
              <th>{{trans('resource.weblinks.img')}}</th>
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
      buttons.push('<button onclick="ubanner.add()" class="btn btn-primary" style="margin-left:12px">{{trans('resource.buttons.add')}}</button>');

      baseGridFunc.init("banner_grid", buttons);
  });

   var ubanner = {

        add: function(){
          var postData = {};
          uPage.call('banner/index',postData);
        },

        edit: function(gridId ,elmnt){

            var rowData = baseGridFunc.getRowData(gridId ,elmnt);

            var postData = {};
            postData['isEdit'] = true;
            postData['id'] = rowData.banner_id;

            uPage.call('banner/index',postData);
        },

        save: function(){

            $.ajax({
                url: '/admin/banner/save',
                type: "POST",
                dataType: "json",
                data : new FormData($("#bannerRegister_form")[0]),
                processData: false,  // tell jQuery not to process the data
                contentType: false,  // tell jQuery not to set contentType
                success: function(data){
                    if(data.type == 'success'){
                      alert(messages.saved);
                      uPage.close('window_bannerRegister');
                      baseGridFunc.reload("banner_grid");
                    }else{
                        uvalidate.setErrors(data);
                    }
                }
            });
        },

        remove: function(gridId ,elmnt){

          var rowData = baseGridFunc.getRowData(gridId ,elmnt);

          var postData = {};
          postData['id'] = rowData.banner_id;
          $.ajax({
              url: '/admin/banner/remove',
              type: "POST",
              dataType: "json",
              data : postData,
              success: function(data){
                  if(data.type == 'success'){
                    alert(messages.removed);
                    baseGridFunc.reload("banner_grid");
                  }
              }
          });
        },
        valueFormatter: function(data, type, row){
          var retVal = '<img src="'+ data +'" style="width: 325px; height: 78px;"/>';

          return retVal;
        }

   }
</script>
  @endsection
