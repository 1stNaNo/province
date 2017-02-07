
<div id="window_weblinkRegister" class="page-window">
  <form class="form-horizontal" method="POST" role="form" action="{{ url('/admin/weblinksave') }}" id="weblinkRegister_form" style="width:100%; height: 100%">
    <input type="hidden" class="prev_window"/>
    <input type="hidden" name="id" value="@if(!empty($weblinksmn[0]->id)){{$weblinksmn[0]->id}}@endif"/>
    <input type="hidden" name="titlemn" value="@if(!empty($weblinksmn[0]->source)){{$weblinksmn[0]->source}}@endif"/>
    <input type="hidden" name="titleen" value="@if(!empty($weblinksen[0]->source)){{$weblinksen[0]->source}}@endif"/>
    <div class="page-title">
      <i class="icon-custom-left"></i>
      <h3> - <span class="semi-bold">{{trans('resource.weblinks.addweblink')}}</span></h3>
    </div>
    <div class="row-fluid">
      <div class="row-fluid">
        <div class="span12">
          @foreach($langs as $lang)

          <input type="hidden" class="langs" value="{{$lang->lang_key}}" />

          @endforeach
          <div class="grid simple ">
            <div class="grid-title">
              <h4><span class="semi-bold">{{trans('resource.weblinks.addweblink')}}</span></h4>
            </div>
            <div class="grid-body">
              <div class="has-lang">
                <!-- TITLE -->
                <div class="row-fluid">

                  <div class="span8">
                    <div class="control-group">
                      <label class="control-label">{{trans('resource.weblinks.title')}}</label>
                      <div class="controls">
                        <input type="text" class="span12" name="title" class=""/>
                      </div>
                    </div>
                  </div>

                </div>

              </div>

              <!-- CATEGORY -->
              <div class="row-fluid">

                <div class="span8">
                  <div class="control-group">
                    <label class="control-label">{{trans('resource.weblinks.category')}}</label>
                    <div class="controls">
                      <select name="category_id" value="@if(!empty($weblinksen[0]->category_id)){{$weblinksen[0]->category_id}}@endif">
                        <option value="1">Сумууд</option>
                        <option value="2">Хэлтэс Агентлаг</option>
                        <option value="3">Бусад</option>
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
                      <input type="text" class="span12" name="link" value="@if(!empty($weblinksen[0]->link)){{$weblinksen[0]->link}}@endif"/>
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
                      <input type="text" class="span12" name="img" id="img" value="@if(!empty($weblinksen[0]->img)){{$weblinksen[0]->img}}@endif" />
                      <a href="#uMainModal" data-toggle="modal" onclick="uPage.call('/admin/gallery/thumbnail',{'type': 'modal', 'inputid': 'img'})">
                        <span class="add-on">
                          <span class="arrow"></span>
                          <i class="icon-picture"></i>
                        </span>
                      </a>
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
