<div id="window_ufileIndex" class="page-window">
    <input type="hidden" class="prev_window"/>
    <div class="row-fluid">
      <div class="grid simple">
          <div class="grid-title no-border">
            <h4><span class="semi-bold">{{trans('resource.file.file')}}</span></h4>
            <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
          </div>
            <div class="grid-body no-border"> <br>
              <div class="row-fluid">
              <form action="" id="ufile_action_form" enctype="multipart/form-data">
                <input type="hidden" name="id" value="{{ (count($vw_ufile) > 0) ? $vw_ufile->id : '' }}"/>
                <div class="span8">
                  @foreach($langs as $item)
                    <div class="control-group">
                      <label class="control-label">{{trans('resource.category.name')}} {{$item->lang_name}}</label>
                      <span class="help"></span>
                      <div class="controls">
                        <input class="span12 " type="text" value="{{ (count($source->get($item->lang_key)) > 0) ? $source->get($item->lang_key)->source : '' }}" name="name[{{$item->lang_key}}]">
                      </div>
                    </div>
                  @endforeach
                  <div class="control-group">
                    <label class="control-label">{{trans('resource.file.type')}}</label>
                    <span class="help"></span>
                    <div class="controls">
                      <select name="type_id" class="uselect2" style="width:100%">
                        @foreach($vw_filetype as $item)
                            @if(count($vw_ufile) > 0)
                                @if($item->ft_id == $vw_ufile->type_id)
                                    <option selected="selected" value="{{$item->ft_id}}">{{$item->source}}</option>
                                @else
                                    <option value="{{$item->ft_id}}">{{$item->source}}</option>
                                @endif
                            @else
                                <option value="{{$item->ft_id}}">{{$item->source}}</option>
                            @endif
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">{{trans('resource.main.number')}}</label>
                    <span class="help"></span>
                    <div class="controls">
                      <input class="span12 " type="text" value="{{ (count($vw_ufile) > 0) ? $vw_ufile->number: ''}}" name="number">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">{{trans('resource.main.confirm_date')}}</label>
                    <span class="help">2017-02-06</span>
                    <div class="controls">
                      <input class="span12 " type="text" value="{{ (count($vw_ufile) > 0) ? $vw_ufile->confirm_date: ''}}" name="confirm_date">
                    </div>
                  </div>
                  <div class="span8">
                    <div class="control-group">
                      <label class="control-label">{{trans('resource.file.file')}}</label>
                      <div class="controls">
                        @if(count($vw_ufile) > 0)
                            <a href="{{$vw_ufile->path}}" target="_blank">{{trans('resource.file.show')}}</a>
                        @endif
                        <input type="hidden" name="img_hidden" value="{{ (count($vw_ufile) > 0) ? $vw_ufile->path : '' }}"/>
                        <input type="file" name="img"/>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
              </div>
              <div style="padding-top: 10px;">
                <button class="btn" onclick="uPage.close('window_ufileIndex')">{{trans('resource.buttons.close')}}</button>
                <button class="btn btn-primary" onclick="ufile.save();">{{trans('resource.buttons.save')}}</button>
              </div>
            </div>
        </div>
      </div>
      <script type="text/javascript">
          $(document).ready(function(){

            $(".uselect2").select2();

          });
      </script>
    </div>
</div>
