@extends('layouts.admin')

@section('content')
<div id="window_pollList" class="page-window active-window">
  <input type="hidden" class="prev_window"/>
  <div class="row-fluid">
    <div class="span12">
      <div class="grid simple ">
        <div class="grid-title">
          <h4><span class="semi-bold">{{trans('resource.poll.title')}}</span></h4>
        </div>
        <div class="grid-body ">
          <div style="display: none;" class="ucolumn-cont" data-table="poll_grid">
            <ucolumn name="id" source="id" visible="false"/>
            <ucolumn name="source" source="source"/>
            <ucolumn name="active_flag" source="active_flag" utype="formatter" func="upoll.pollstatus"/>
          </div>
          <table action="pollList" cellpadding="0" cellspacing="0" border="0" class="table table-hover table-condensed" id="poll_grid" width="100%">
            <thead>
              <tr>
                <th>{{trans('resource.weblinks.id')}}</th>
                <th>{{trans('resource.weblinks.title')}}</th>
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
    buttons.push('<button type="button" class="btn btn-primary pull-left" onclick="upoll.create(); return false;" style="margin-left:12px">{{trans('resource.buttons.add')}}</button>');
    baseGridFunc.init("poll_grid", buttons);
  });

  var upoll = {
    create : function (){
      uPage.call('pollregister', null, null);
    },
    active : function (poll_id){
      if(confirm(mainres.confirm))
        $.post('activepoll', {"poll_id" : poll_id}, function(){ baseGridFunc.reload('poll_grid') });
    },
    inactive : function(poll_id){
      if(confirm(mainres.confirm))
        $.post('inactivepoll', {"poll_id" : poll_id}, function(){ baseGridFunc.reload('poll_grid') });
    },
    pollstatus : function(data, type, row){
      if(data == 1){
        return '<button type="button" class="btn btn-danger btn-xs" onclick="upoll.inactive('+row.id+'); return false;">'+polls.makeinactive+'</button>';
      }else if(data == 0){
        return '<button type="button" class="btn btn-success btn-xs" onclick="upoll.active('+row.id+'); return false;">'+polls.makeactive+'</button>';
      }else{
        return "";
      }
    },
    addAnswer : function (){
      $(".answer-container").find('.sub-container:last').find('button').each(function(){
        $(this).hide();
      });
      var $item = $(".answer-container").find('.sub-container:last').clone();
      $item.find("input").each(function(){
        $(this).val("").attr('name', 'answer['+$(".sub-container").length+']['+$(this).attr('lang')+']');
      });
      $item.find('button.remove-btn').show();
      $(".answer-container").append($item);
    },
    removeAnswer : function (obj){
      $(obj).closest('.sub-container').remove();
      if($(".sub-container").length > 1)
        $(".answer-container").find('.sub-container:last').find('button.remove-btn').show();
    }
  }





</script>
@endsection
