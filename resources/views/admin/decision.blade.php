@extends('layouts.admin')

@section('content')
<div id="window_decisionsList" class="page-window active-window">
  <input type="hidden" class="prev_window"/>
  <div class="page-title">
    <i class="icon-custom-left"></i>
    <h3> - <span class="semi-bold">{{trans('resource.decision.menu')}}</span></h3>
  </div>
  <div class="row-fluid">
    <div class="span12">
      <div class="grid simple ">
        <div class="grid-title">
          <h4><span class="semi-bold">{{trans('resource.decision.menu')}}</span></h4>
          <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="javascript:;" onclick="baseGridFunc.reload('decisions_grid')" class="reload"></a> </div>
        </div>
        <div class="grid-body">
          <div style="display: none;" class="ucolumn-cont" data-table="decisions_grid">
            <ucolumn name="id" source="id"/>
            <ucolumn name="name" source="name"/>
            <ucolumn name="email" source="email"/>
            <ucolumn name="content" source="content"/>
            <ucolumn name="decision" source="decision"/>
            <ucolumn name="type" source="type"/>
          </div>
          <table action="/admin/decisionlist" cellpadding="0" cellspacing="0" border="0" class="table table-hover table-condensed" id="decisions_grid" width="100%">
            <thead>
              <tr>
                <th>{{trans('resource.weblinks.id')}}</th>
                <th>{{trans('resource.name')}}</th>
                <th>{{trans('resource.email')}}</th>
                <th>{{trans('resource.decision.content')}}</th>
                <th>{{trans('resource.decision.solution')}}</th>
                <th></th>
              </tr>
            </thead>
          </table>
          <div class="row-fluid">
            <div class="row-fluid">
              <button type="button" id="btnMakeDecision" class="btn btn-primary btn-cons span1" onclick="makeDecision(); return false;">Шийдвэрлэх</button>
              <div class="span4">
                
                <select id="type" name="type" class="grid-param pull-right" onchange="if($(this).val() == 1) { $('#kind-container').css('display', 'none').val(''); }else{ $('#kind-container').css('display', 'block'); } baseGridFunc.reload('decisions_grid');">
                  <option value="1">Шийдвэрлээгүй</option>
                  <option value="0">Шийдвэрлэсэн</option>
                </select>
              </div>
              <div class="span3" id="kind-container">
                <select id="kind" name="kind" class="grid-param" onchange="baseGridFunc.reload('decisions_grid');">
                  <option value="">Бүгд</option>
                  <option value="1">Эерэг</option>
                  <option value="2">Сөрөг</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    var buttons = [];
    baseGridFunc.init("decisions_grid", buttons);
    $("select").each(function(){
      $(this).select2({
        minimumResultsForSearch: -1
      });
    });
  });

  function addWeblink(isEdit){
    if(isEdit){
      var id = baseGridFunc.getSelectedRow("decisions_grid", "id");
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

  function makeDecision(){
    if(baseGridFunc.getSelectedRow('decisions_grid', 'type') == 1){
      uPage.call('decisionregister', {'id': baseGridFunc.getSelectedRow('decisions_grid', 'id')});
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
