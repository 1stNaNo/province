@extends('layouts.admin')

@section('content')
<div id="window_pollList" class="page-window active-window">
  <input type="hidden" class="prev_window"/>
  <div class="page-title">
    <i class="icon-custom-left"></i>
    <h3> - <span class="semi-bold">{{trans('resource.poll.title')}}</span></h3>
  </div>
  <div class="row-fluid">
    <div class="span12">
      <div class="grid simple ">
        <div class="grid-title">
          <h4><span class="semi-bold">{{trans('resource.poll.title')}}</span></h4>
        </div>
        <div class="grid-body ">
          <div style="display: none;" class="ucolumn-cont" data-table="poll_grid">
            <ucolumn name="id" source="id"/>
            <ucolumn name="source" source="source"/>
          </div>
          <table action="pollList" cellpadding="0" cellspacing="0" border="0" class="table table-hover table-condensed" id="poll_grid" width="100%">
            <thead>
              <tr>
                <th>{{trans('resource.weblinks.id')}}</th>
                <th>{{trans('resource.weblinks.title')}}</th>
              </tr>
            </thead>
          </table>
          <div class="row-fluid">
            <button type="button" class="btn btn-primary btn-cons" onclick="pollCreate(); return false;">Бүртгэх</button>
            <button type="button" class="btn btn-primary btn-cons" onclick="pollActive(); return false;">Идэвхижүүлэх</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    var buttons = [];
    baseGridFunc.init("poll_grid", buttons);
  });

  function pollCreate(){
    uPage.call('pollregister', null, null);
  }

  function pollActive(){
    var poll_id = baseGridFunc.getSelectedRow('poll_grid', 'id');
    if(poll_id)
      $.post('activepoll', {"poll_id" : poll_id}, function(){});
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
