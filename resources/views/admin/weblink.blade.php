
<div id="window_weblinkRegister" class="page-window">
  <form class="form-horizontal" method="POST" role="form" action="{{ url('/admin/weblinksave') }}" id="weblinkRegister_form" style="width:100%; height: 100%">
    <input type="hidden" class="prev_window"/>
    <input type="hidden" name="id" value="{{ (count($weblinks) > 0) ? $weblinks->id : ''}}"/>
    <div class="page-title">
      <i class="icon-custom-left"></i>
      <h3> - <span class="semi-bold">{{trans('resource.weblinks.addweblink')}}</span></h3>
    </div>
    <div class="row-fluid">
      <div class="row-fluid">
        <div class="span12">
          <div class="grid simple ">
            <div class="grid-title">
              <h4><span class="semi-bold">{{trans('resource.weblinks.addweblink')}}</span></h4>
            </div>
            <div class="grid-body">
              <div class="has-lang">
                <!-- TITLE -->
                <div class="row-fluid">

                  <div class="span8">
                    @foreach($langs as $lang)
                      <div class="control-group">
                        <label class="control-label">{{trans('resource.weblinks.title')}}</label>
                        <div class="controls">
                          <input type="hidden" name="title[{{$lang->lang_key}}]" value="{{ (count($source->get($item->lang_key)) > 0) ? $source->get($item->lang_key)->source : '' }}"/>
                        </div>
                      </div>
                    @endforeach
                  </div>

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
                      <input type="file" name="img_hidden" value="{{ (count($weblinks) > 0) ? $weblinks->img : '' }}"/>
                      <input type="file" name="img"/>
                    </div>
                  </div>
                </div>

              </div>

              <!-- BUTTONS -->
              <div class="row-fluid">

                <div class="span8" style="text-align: center;">
                  <div class="control-group">
                    <div class="controls">
                      <button type="button" class="btn btn-primary btn-cons" onclick="weblinkRegister(); return false;">Хадгалах</button>
                      <button type="button" class="btn btn-primary btn-cons" onclick="uPage.close('window_weblinkRegister');return false;">Хаах</button>
                    </div>
                  </div>
                </div>

              </div>

            </div>
          </div>

        </div>
      </div>
    </div>

    <script type="text/javascript">
      $(function(){

        langFunc.splitByLang("window_weblinkRegister");
        $(".input-lang-mn").val($('[name="titlemn"]').val());
        $(".input-lang-en").val($('[name="titleen"]').val());
      });

      function weblinkRegister(){
        uForm.register('weblinkRegister_form', function(data){
          uPage.close('window_weblinkRegister');
          baseGridFunc.reload('weblinks_grid');
        });
      }
    </script>
  </form>
</div>
