
<div id="window_weblinkRegister" class="page-window">
  <form class="form-horizontal" method="POST" role="form" action="{{ url('/admin/weblinksave') }}" id="weblinkRegister_form" style="width:100%; height: 100%" enctype="multipart/form-data">
    <input type="hidden" class="prev_window"/>
    <input type="hidden" name="id" value="{{ (count($weblinks) > 0) ? $weblinks->id : ''}}"/>
    <div class="row-fluid">
      <div class="row-fluid">
        <div class="span12">
          <div class="grid simple ">
            <div class="grid-title">
              <h4><span class="semi-bold">{{trans('resource.weblinks.addweblink')}}</span></h4>
            </div>
            <div class="grid-body">
                <!-- TITLE -->
                <div class="row-fluid">
                  <div class="span8">
                    @foreach($langs as $lang)
                          <div class="control-group">
                            <label class="control-label">{{trans('resource.weblinks.title')}} {{$lang->lang_name}}</label>
                            <div class="controls">
                              <input class="span12" type="text" name="title[{{$lang->lang_key}}]" value="{{ (count($source->get($lang->lang_key)) > 0) ? $source->get($lang->lang_key)->source : '' }}"/>
                            </div>
                          </div>
                    @endforeach
                  </div>
                </div>


              <!-- CATEGORY -->
              <div class="row-fluid">

                <div class="span8">
                  <div class="control-group">
                    <label class="control-label">{{trans('resource.weblinks.category')}}</label>
                    <div class="controls">
                      <select name="category_id">
                        @if(count($weblinks) > 0)
                            <option {{($weblinks->category_id == 1) ? 'selected="selected"' : ''}} value="1">{{trans('resource.weblinks.sums')}}</option>
                            <option {{($weblinks->category_id == 2) ? 'selected="selected"' : ''}} value="2">{{trans('resource.weblinks.agency')}}</option>
                            <option {{($weblinks->category_id == 3) ? 'selected="selected"' : ''}} value="3">{{trans('resource.weblinks.others')}}</option>
                        @else
                          <option value="1">{{trans('resource.weblinks.sums')}}</option>
                          <option value="2">{{trans('resource.weblinks.agency')}}</option>
                          <option value="3">{{trans('resource.weblinks.others')}}</option>
                        @endif
                      </select>
                    </div>
                  </div>
                </div>

              </div>

              <!-- LINK -->
              <div class="row-fluid">

                <div class="span8">
                  <div class="control-group">
                    <label class="control-label">{{trans('resource.weblinks.link')}}</label>
                    <div class="controls">
                      <input type="text" class="span12" name="link" value="{{ (count($weblinks) > 0) ? $weblinks->link : '' }}"/>
                    </div>
                  </div>
                </div>

              </div>

              <!-- IMG -->
              <div class="row-fluid">

                <div class="span8">
                  <div class="control-group">
                    <label class="control-label">{{trans('resource.weblinks.img')}}</label>
                    <div class="controls">
                      <img src="{{ (count($weblinks) > 0) ? $weblinks->img : '' }}" style="width: 115px; height: 85px;"/>
                      <input type="hidden" name="img_hidden" value="{{ (count($weblinks) > 0) ? $weblinks->img : '' }}"/>
                      <input type="file" name="img"/>
                    </div>
                  </div>
                </div>

              </div>

              <!-- BUTTONS -->
              <div class="row-fluid">

                <div class="span8">
                  <div class="control-group">
                    <div class="controls">
                      <button type="button" class="btn btn-cons" onclick="uPage.close('window_weblinkRegister');return false;">{{trans('resource.buttons.close')}}</button>
                      <button type="button" class="btn btn-primary btn-cons" onclick="uweblinks.save()">{{trans('resource.buttons.save')}}</button>
                    </div>
                  </div>
                </div>

              </div>

            </div>
          </div>

        </div>
      </div>
    </div>
  </form>
</div>
