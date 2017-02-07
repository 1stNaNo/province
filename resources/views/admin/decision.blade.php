@extends('layouts.admin')

@section('content')
<div id="window_decisionsList" class="page-window active-window">
  <input type="hidden" class="prev_window"/>

  <div class="row-fluid">
    <div class="span12">
      <div class="grid simple ">
        <div class="grid-title">
          <h4><span class="semi-bold">{{trans('resource.decision.menu')}}</span></h4>
          <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="javascript:;" onclick="baseGridFunc.reload('decisions_grid')" class="reload"></a> </div>
        </div>
        <div class="grid-body">
          <div style="display: none;" class="ucolumn-cont" data-table="decisions_grid">
            <ucolumn name="id" source="id" visible="false"/>
            <ucolumn name="name" source="name"/>
            <ucolumn name="email" source="email"/>
            <ucolumn name="content" source="content"/>
            <ucolumn name="decision" source="decision"/>
            <ucolumn name="kind" source="kind" utype="formatter" func="udecision.kindformat"/>
            <ucolumn name="type" source="type" utype="formatter" func="udecision.typeformat"/>
          </div>
          <table action="/admin/decisionlist" cellpadding="0" cellspacing="0" border="0" class="table table-hover table-condensed" id="decisions_grid" width="100%">
            <thead>
              <tr>
                <th>{{trans('resource.weblinks.id')}}</th>
                <th>{{trans('resource.name')}}</th>
                <th>{{trans('resource.email')}}</th>
                <th>{{trans('resource.decision.content')}}</th>
                <th>{{trans('resource.decision.solution')}}</th>
                <th>{{trans('resource.file.type')}}</th>
                <th>{{trans('resource.weblinks.category')}}</th>
              </tr>
            </thead>
          </table>
          <div class="row-fluid">
            <div class="row-fluid">

            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">

  var udecision = {

    kindformat: function(data, type, row){
      var retVal = "";

      if(data == 1){
        retVal = decisions.kindposi;
      }else if(data == 2){
        retVal = decisions.kindnega;
      }else{
        retVal = "";
      }

      return retVal;
    },

    typeformat: function(data, type, row){
      var retVal = "";

      if(data == 1){
        retVal = decisions.done;
      }else if(data == 0){
        retVal = '<button type="button" id="btnMakeDecision" class="btn btn-warning btn-xs" onclick="udecision.makeDecision('+row.id+'); return false;">Шийдвэрлэх</button>';
      }

      return retVal;
    },
    makeDecision : function(id){
      uPage.call('decisionregister', {'id': id});
    },
    save : function(){
      uForm.register('decisionRegister_form', function(data){
        uPage.close('window_decisionRegister');
        baseGridFunc.reload('decisions_grid');
      });
    }
}

$(document).ready(function() {
  var buttons = [];
  baseGridFunc.init("decisions_grid", buttons);
});

</script>
@endsection
