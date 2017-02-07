@extends('layouts.admin')

@section('content')
<div id="window_weblinkList" class="page-window active-window">
  <input type="hidden" class="prev_window"/>
  <div class="page-title">
    <i class="icon-custom-left"></i>
    <h3> - <span class="semi-bold">{{trans('resource.weblinks.weblinktitle')}}</span></h3>
  </div>
  <div class="row-fluid">
    <div class="span12">
      <div class="grid simple ">
        <div class="grid-title">
          <h4><span class="semi-bold">{{trans('resource.weblinks.weblinktitle')}}</span></h4>
          <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="javascript:;" onclick="baseGridFunc.reload('weblinks_grid')" class="reload"></a> </div>
        </div>
        <div class="grid-body ">
          <div style="display: none;" class="ucolumn-cont" data-table="weblinks_grid">
            <ucolumn name="id" source="id"/>
            <ucolumn name="category_id" source="category_id"/>
            <ucolumn name="source" source="source"/>
            <ucolumn name="link" source="link"/>
          </div>
          <table action="weblinklist" cellpadding="0" cellspacing="0" border="0" class="table table-hover table-condensed" id="weblinks_grid" width="100%">
            <thead>
              <tr>
                <th>{{trans('resource.weblinks.id')}}</th>
                <th>{{trans('resource.weblinks.category')}}</th>
                <th>{{trans('resource.weblinks.title')}}</th>
                <th>{{trans('resource.weblinks.link')}}</th>
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
    buttons.push('<div class="table-tools-actions"><button onclick="removeWebLink(); return false;" class="btn btn-primary pull-right" style="margin-left:12px" id="">{{trans('resource.buttons.remove')}}</button></div><div class="table-tools-actions"><button onclick="addWeblink(true); return false;" class="btn btn-primary pull-right" style="margin-left:12px" id="">{{trans('resource.buttons.edit')}}</button></div><div class="table-tools-actions"><button onclick="addWeblink(false); return false;" class="btn btn-primary pull-right" style="margin-left:12px" id="">{{trans('resource.buttons.add')}}</button></div>');
    buttons.push();

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
