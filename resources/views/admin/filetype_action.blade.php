<div id="window_filetypeIndex" class="page-window">
    <input type="hidden" class="prev_window"/>
    <div class="row-fluid">
      <div class="grid simple">
          <div class="grid-title no-border">
            <h4><span class="semi-bold">{{trans('resource.file.type')}}</span></h4>
            <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
          </div>
            <div class="grid-body no-border"> <br>
              <div class="row-fluid">
              <form action="" id="filetype_action_form">
                <input type="hidden" name="id" value="{{ (count($vw_filetype) > 0) ? $vw_filetype->ft_id : '' }}"/>
                <div class="span8">
                  @foreach($langs as $item)
                    <div class="control-group">
                      <label class="control-label">{{trans('resource.category.name')}} {{$item->lang_name}}</label>
                      <span class="help"></span>
                      <div class="controls">
                        <input class="span12 " type="text" value="{{ (count($source->get($item->lang_key)) > 0) ? $source->get($item->lang_key)->source : '' }}" name="title[{{$item->lang_key}}]">
                      </div>
                    </div>
                  @endforeach
                  <div class="control-group" id="linkCont">
                    <label class="control-label">{{trans('resource.main.icon')}}</label>
                    <span class="help"></span>
                    <div class="controls">
                      <input class="span12 " type="text" value="{{ (count($vw_filetype) > 0) ? $vw_filetype->icon: ''}}" name="icon">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">{{trans('resource.main.active')}} / {{trans('resource.main.deactive')}}</label>
                    <span class="help"></span>
                    <div class="controls">
                      <select id="active_flag" name="active_flag" class="uselect2" style="width:100%">
                        @if(count($vw_filetype) > 0)
                          @if($vw_filetype->active_flag == 0)
                            <option value="1">{{trans('resource.main.active')}}</option>
                            <option selected="selected" value="0">{{trans('resource.main.deactive')}}</option>
                          @else
                            <option selected="selected" value="1">{{trans('resource.main.active')}}</option>
                            <option value="0">{{trans('resource.main.deactive')}}</option>
                          @endif
                        @else
                          <option selected="selected" value="1">{{trans('resource.main.active')}}</option>
                          <option value="0">{{trans('resource.main.deactive')}}</option>
                        @endif
                      </select>
                    </div>
                  </div>
                </div>
              </form>
              </div>
              <div style="padding-top: 10px;">
                <button class="btn" onclick="uPage.close('window_filetypeIndex')">{{trans('resource.buttons.close')}}</button>
                <button class="btn btn-primary" onclick="ufiletype.save();">{{trans('resource.buttons.save')}}</button>
              </div>
            </div>
        </div>
      </div>
      <script type="text/javascript">
          $(document).ready(function(){

            $(".uselect2").select2();

            $("#linkAction").change(function(){
                if($(this).val() == "#$cat$#"){
                    $("#linkCont").hide();
                    $("input[name='link']").val($(this).val());
                }else{
                  $("#linkCont").show();
                  $("input[name='link']").val($(this).val());
                }
            });

          });
      </script>
    </div>
</div>
