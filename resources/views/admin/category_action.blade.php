<div id="window_categoryIndex" class="page-window">
    <input type="hidden" class="prev_window"/>
    <div class="row-fluid">
      <div class="grid simple">
          <div class="grid-title no-border">
            <h4><span class="semi-bold">{{trans('resource.category.title')}}</span></h4>
            <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
          </div>
            <div class="grid-body no-border"> <br>
              <div class="row-fluid">
              <form action="" id="category_action_form">
                <input type="hidden" name="id" value="{{ (count($vw_category) > 0) ? $vw_category->ca_id : '' }}"/>
                <div class="span8">
                  @foreach($langs as $item)
                    <div class="control-group">
                      <label class="control-label">{{trans('resource.news.ntitle')}} {{$item->lang_name}}</label>
                      <span class="help"></span>
                      <div class="controls">
                        <input class="span12 " type="text" value="{{ (count($source->get($item->lang_key)) > 0) ? $source->get($item->lang_key)->source : '' }}" name="title[{{$item->lang_key}}]">
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
                            @if(count($vw_category) > 0)
                                @if($item->ca_id == $vw_category->parent_id)
                                    <option selected="selected" value="{{$item->ca_id}}">{{$item->source}}</option>
                                @else
                                    <option value="{{$item->ca_id}}">{{$item->source}}</option>
                                @endif
                            @else
                                <option value="{{$item->ca_id}}">{{$item->source}}</option>
                            @endif
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">{{trans('resource.category.target')}}</label>
                    <span class="help"></span>
                    <div class="controls">
                      <select id="linkAction" name="action" class="uselect2" style="width:100%">
                          @if(count($vw_category) > 0)
                              @if($vw_category->url == '#$cat$#')
                                <option selected="selected" value="#$cat$#">{{trans('resource.news.title')}}</option>
                                <option value="">{{trans('resource.weblinks.link')}}</option>
                              @else
                                <option value="#$cat$#">{{trans('resource.news.title')}}</option>
                                <option selected="selected" value="">{{trans('resource.weblinks.link')}}</option>
                              @endif
                          @else
                            <option selected="selected" value="#$cat$#">{{trans('resource.news.title')}}</option>
                            <option value="">{{trans('resource.weblinks.link')}}</option>
                          @endif
                      </select>
                    </div>
                  </div>
                  @if(count($vw_category) > 0)
                      @if($vw_category->url == '#$cat$#')
                        <div class="control-group" style="display:none;" id="linkCont">
                      @else
                        <div class="control-group" id="linkCont">
                      @endif
                  @else
                      <div class="control-group" style="display:none;" id="linkCont">
                  @endif
                    <label class="control-label">{{trans('resource.category.link')}}</label>
                    <span class="help"></span>
                    <div class="controls">
                      <input class="span12 " type="text" value="{{ (count($vw_category) > 0) ? $vw_category->url: ''}}" name="link">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">{{trans('resource.category.action')}}</label>
                    <span class="help"></span>
                    <div class="controls">
                      <select id="target" name="target" class="uselect2" style="width:100%">
                          @if(count($vw_category) > 0)
                              @if($vw_category->target == '_self')
                                <option selected="selected" value="_self">{{trans('resource.category.self')}}</option>
                                <option value="_blank">{{trans('resource.category.blank')}}</option>
                              @else
                                <option value="_self">{{trans('resource.category.self')}}</option>
                                <option selected="selected" value="_blank">{{trans('resource.category.blank')}}</option>
                              @endif
                          @else
                            <option selected="selected" value="_self">{{trans('resource.category.self')}}</option>
                            <option value="_blank">{{trans('resource.category.blank')}}</option>
                          @endif
                      </select>
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="controls">
                      <div class="checkbox check-default checkbox-circle">
                          @if(count($vw_category) > 0)
                            @if($vw_category->show_menu == 1)
                                <input id="checkbox7" name="showmenu" value="1" checked="checked" type="checkbox">
                            @else
                              <input id="checkbox7" name="showmenu" value="1" type="checkbox">
                            @endif
                          @else
                              <input id="checkbox7" name="showmenu" value="1" checked="checked" type="checkbox">
                          @endif
                          <label for="checkbox7">{{trans('resource.category.publish')}}</label>
                      </div>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">{{trans('resource.main.active')}} / {{trans('resource.main.deactive')}}</label>
                    <span class="help"></span>
                    <div class="controls">
                      <select id="active" name="active" class="uselect2" style="width:100%">
                        @if(count($vw_category) > 0)
                          @if($vw_category->active_flag == 0)
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
                <button class="btn" onclick="uPage.close('window_categoryIndex')">{{trans('resource.buttons.close')}}</button>
                <button class="btn btn-primary" onclick="ucategory.save();">{{trans('resource.buttons.save')}}</button>
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
