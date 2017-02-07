<div id="window_shorterIndex" class="page-window">
    <input type="hidden" class="prev_window"/>
    <div class="row-fluid">
      <div class="grid simple">
          <div class="grid-title no-border">
            <h4>{{ trans('resource.main.shorter') }}</h4>
            <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
          </div>
            <div class="grid-body no-border"> <br>
              <div class="row-fluid">
              <form action="" id="shorter_action_form">
                <input type="hidden" name="id" value="{{ (!empty($vw_shorter)) ? $vw_shorter->id : ''}}"/>
                <div class="span8">
                  @foreach($langs as $item)
                    <div class="control-group">
                      <label class="control-label">{{trans('resource.news.ntitle')}} {{$item->lang_key}}</label>
                      <span class="help"></span>
                      <div class="controls">
                        <input class="span12 " type="text" value="{{ (!empty($source)) ? ((!empty($source->get($item->lang_key))) ? $source->get($item->lang_key)->source : '') : ''}}" name="title[{{$item->lang_key}}]">
                      </div>
                    </div>
                  @endforeach
                  <div class="control-group">
                    <label class="control-label">{{trans('resource.category.link')}}</label>
                    <span class="help"></span>
                    <div class="controls">
                      <input class="span12 " type="text" value="{{ (!empty($vw_shorter)) ? $vw_shorter->url : ''}}" name="link">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">{{trans('resource.category.target')}}</label>
                    <span class="help"></span>
                    <div class="controls">
                      <select id="target" name="target" class="uselect2" style="width:100%">
                        @if(!empty($vw_shorter))
                          @if($vw_shorter->target == 'self')
                            <option selected="selected" value="self">{{trans('resource.category.self')}}</option>
                            <option value="blank">{{trans('resource.category.blank')}}</option>
                          @else
                            <option value="self">{{trans('resource.category.self')}}</option>
                            <option selected="selected" value="blank">{{trans('resource.category.blank')}}</option>
                          @endif
                        @else
                          <option value="self">{{trans('resource.category.self')}}</option>
                          <option value="blank">{{trans('resource.category.blank')}}</option>
                        @endif
                      </select>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">{{trans('resource.poll.status')}}</label>
                    <span class="help"></span>
                    <div class="controls">
                      <select id="show" name="show" class="uselect2" style="width:100%">
                        @if(!empty($vw_shorter))
                          @if($vw_shorter->show == 1)
                            <option value="1" selected="selected">{{trans('resource.poll.active')}}</option>
                            <option value="0">{{trans('resource.poll.inactive')}}</option>
                          @else
                            <option value="1">{{trans('resource.poll.active')}}</option>
                            <option value="0" selected="selected">{{trans('resource.poll.inactive')}}</option>
                          @endif
                        @else
                          <option value="1">{{trans('resource.poll.active')}}</option>
                          <option value="0">{{trans('resource.poll.inactive')}}</option>
                        @endif
                      </select>
                    </div>
                  </div>
                </div>
              </form>
              </div>
              <div style="padding-top: 10px;">
                <button class="btn" onclick="uPage.close('window_shorterIndex')">{{trans('resource.buttons.close')}}</button>
                <button class="btn btn-primary" onclick="ushorter.save();">{{trans('resource.buttons.save')}}</button>
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
