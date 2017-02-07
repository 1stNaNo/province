<div id="window_shorterIndex" class="page-window">
    <input type="hidden" class="prev_window"/>
    <div class="row-fluid">
      <div class="grid simple">
          <div class="grid-title no-border">
            <h4>Add <span class="semi-bold">News</span></h4>
            <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
          </div>
          @if(!$edit)
            <div class="grid-body no-border"> <br>
              <div class="row-fluid">
              <form action="" id="shorter_action_form">
                <input type="hidden" name="id" value=""/>
                <div class="span8">
                  @foreach($langs as $item)
                    <div class="control-group">
                      <label class="control-label">{{trans('resource.news.ntitle')}}</label>
                      <span class="help"></span>
                      <div class="controls">
                        <input class="span12 " type="text" value="" name="title[{{$item->lang_key}}]">
                      </div>
                    </div>
                  @endforeach
                  <div class="control-group">
                    <label class="control-label">{{trans('resource.category.parent')}}</label>
                    <span class="help"></span>
                    <div class="controls">
                      <select id="parent" name="parent" class="uselect2" style="width:100%">
                        <option value="0"></option>
                        @foreach($category as $item)
                            <option value="{{$item->ca_id}}">{{$item->source}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">{{trans('resource.category.link')}}</label>
                    <span class="help"></span>
                    <div class="controls">
                      <input class="span12 " type="text" value="" name="link">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">{{trans('resource.category.target')}}</label>
                    <span class="help"></span>
                    <div class="controls">
                      <select id="target" name="target" class="uselect2" style="width:100%">
                          <option selected="selected" value="_self">{{trans('resource.category.self')}}</option>
                          <option value="target">{{trans('resource.category.blank')}}</option>
                      </select>
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="controls">
                      <div class="checkbox check-default checkbox-circle">
                          <input id="checkbox7" name="showmenu" value="1" checked="checked" type="checkbox">
                          <label for="checkbox7">{{trans('resource.category.publish')}}</label>
                      </div>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">{{trans('resource.main.active')}} / {{trans('resource.main.deactive')}}</label>
                    <span class="help"></span>
                    <div class="controls">
                      <select id="active" name="active" class="uselect2" style="width:100%">
                          <option selected="selected" value="1">{{trans('resource.main.active')}}</option>
                          <option value="0">{{trans('resource.main.deactive')}}</option>
                      </select>
                    </div>
                  </div>
                </div>
              </form>
              </div>
              <div style="padding-top: 10px;">
                <button class="btn" onclick="uPage.close('window_categoryIndex')">{{trans('resource.buttons.close')}}</button>
                <button class="btn btn-primary" onclick="ucategory.save();">{{trans('resource.buttons.save')}}</button>
              </div>
            </div>
          @else
            <div class="grid-body no-border"> <br>
              <div class="row-fluid">
              <form action="" id="shorter_action_form">
                <input type="hidden" name="id" value="{{ $vw_shorter->id}}"/>
                <div class="span8">
                  @foreach($langs as $item)
                    <div class="control-group">
                      <label class="control-label">{{trans('resource.news.ntitle')}} {{$item->lang_key}}</label>
                      <span class="help"></span>
                      <div class="controls">
                        <input class="span12 " type="text" value="{{ $source->get($item->lang_key)->source}}" name="title[{{$item->lang_key}}]">
                      </div>
                    </div>
                  @endforeach
                  <div class="control-group">
                    <label class="control-label">{{trans('resource.category.link')}}</label>
                    <span class="help"></span>
                    <div class="controls">
                      <input class="span12 " type="text" value="{{ $vw_shorter->url }}" name="link">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">{{trans('resource.category.target')}}</label>
                    <span class="help"></span>
                    <div class="controls">
                      <select id="target" name="target" class="uselect2" style="width:100%">
                          @if($vw_shorter->target == 'self')
                            <option selected="selected" value="self">{{trans('resource.category.self')}}</option>
                            <option value="blank">{{trans('resource.category.blank')}}</option>
                          @else
                            <option value="self">{{trans('resource.category.self')}}</option>
                            <option selected="selected" value="blank">{{trans('resource.category.blank')}}</option>
                          @endif
                      </select>
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="controls">
                      <div class="checkbox check-default checkbox-circle">
                          @if($vw_shorter->show == 1)
                              <input id="checkbox7" name="show" value="1" checked="checked" type="checkbox">
                          @else
                            <input id="checkbox7" name="show" value="1" type="checkbox">
                          @endif
                          <label for="checkbox7">{{trans('resource.category.publish')}}</label>
                      </div>
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
          @endif
        </div>
      </div>
      <script type="text/javascript">
          $(document).ready(function(){

            $(".uselect2").select2();

          });
      </script>
    </div>
</div>
