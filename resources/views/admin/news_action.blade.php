@if($edit)
  <div id="window_newsIndex" class="page-window">
      <input type="hidden" class="prev_window"/>
  <div class="row-fluid">
    <div class="span12">
      <div class="grid simple">
        <div class="grid-title no-border">
          <h4>Add <span class="semi-bold">News</span></h4>
          <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
        </div>
        <div class="grid-body no-border"> <br>
          <div class="row-fluid">
          <form action="" id="news_action_form">
            <input type="hidden" name="id" value="{{ $vw_news->id}}"/>
            <div class="span8">
              @foreach($langs as $item)
                <div class="control-group">
                  <label class="control-label">{{trans('resource.news.ntitle')}} {{$item->lang_key}}</label>
                  <span class="help"></span>
                  <div class="controls">
                    <input class="span12 " type="text" value="{{ $source->get($item->lang_key)->title}}" name="title[{{$item->lang_key}}]">
                  </div>
                </div>
              @endforeach
              <div class="control-group">
                <label class="control-label">{{trans('resource.upload.thumbnail')}}</label>
                <span class="help"></span>
                <div class="controls">
                  <div class="input-append success date" style="width:94%;">
                      <input class="span12" id="newsThumbnail" name="thumbnail" value="{{ $vw_news->thumbnail}}" type="text">
                      <a href="#uMainModal" data-toggle="modal" onclick="uPage.call('/admin/gallery/thumbnail',{'type': 'modal', 'inputid': 'newsThumbnail'})">
                        <span class="add-on">
                          <span class="arrow"></span>
                          <i class="icon-picture"></i>
                        </span>
                      </a>
                  </div>
                </div>
              </div>
              <div class="control-group">
                <div class="controls">
                  <select id="category" name="category" style="width:100%">
                    @foreach($category as $item)
                        @if($newscat->cat_id == $item->ca_id)
                            <option selected="selected" value="{{$item->ca_id}}">{{$item->source}}</option>
                        @else
                            <option value="{{$item->ca_id}}">{{$item->source}}</option>
                        @endif
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="control-group">
                <div class="controls">
                  <div class="checkbox check-default checkbox-circle">
                      @if($vw_news->slide == 1)
                          <input id="checkbox7" name="slide" value="1" checked="checked" type="checkbox">
                      @else
                        <input id="checkbox7" name="slide" value="1" type="checkbox">
                      @endif
                      <label for="checkbox7">{{trans('resource.news.publish')}}</label>
                  </div>
                </div>
              </div>
            </div>
            @foreach($langs as $item)
              <div class="row-fluid">
                <div class="span12">
                    <h5>{{trans('resource.news.content')}} <span class="semi-bold">{{$item->lang_key}}</span></h5>
                    {{-- <textarea id="content{{$item->lang_key}}" name="content[{{$item->lang_key}}]" placeholder="Enter text ..." class="text-editor span12" rows="40"></textarea> --}}
                    <div id="content_{{$item->lang_key}}" name="content[{{$item->lang_key}}]" stye="height: 300px;" class="summernote"></div>
                </div>
              </div>
            @endforeach
          </form>
          </div>
          <usource style="display: none;">
            @foreach ($langs as $item)
                <item name='{!! $item->lang_key !!}'>{!! $source->get($item->lang_key)->source !!}</item>
            @endforeach
          </usource>
          <div style="padding-top: 10px;">
            <button class="btn" onclick="uPage.close('window_newsIndex')">{{trans('resource.buttons.close')}}</button>
            <button class="btn btn-primary" onclick="unews.save();">{{trans('resource.buttons.save')}}</button>
          </div>
        </div>
      </div>
    </div>
  </div>
@else
  <div id="window_newsIndex" class="page-window">
      <input type="hidden" class="prev_window"/>
      <div class="row-fluid">
    <div class="span12">
      <div class="grid simple">
        <div class="grid-title no-border">
          <h4>Add <span class="semi-bold">News</span></h4>
          <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
        </div>
        <div class="grid-body no-border"> <br>
          <div class="row-fluid">
          <form action="" id="news_action_form">
            <div class="span8">
              @foreach($langs as $item)
                <div class="control-group">
                  <label class="control-label">{{trans('resource.news.ntitle')}} {{$item->lang_key}}</label>
                  <span class="help"></span>
                  <div class="controls">
                    <input class="span12 " type="text" value="" name="title[{{$item->lang_key}}]">
                  </div>
                </div>
              @endforeach
              <div class="control-group">
                <label class="control-label">{{trans('resource.upload.thumbnail')}}</label>
                <span class="help"></span>
                <div class="controls">
                  <div class="input-append success date" style="width:94%;">
                      <input class="span12" id="newsThumbnail" name="thumbnail" value="" type="text">
                      <a href="#uMainModal" data-toggle="modal" onclick="uPage.call('/admin/gallery/thumbnail',{'type': 'modal','inputid': 'newsThumbnail'})">
                        <span class="add-on">
                          <span class="arrow"></span>
                          <i class="icon-picture"></i>
                        </span>
                      </a>
                  </div>
                </div>
              </div>
              <div class="control-group">
                <div class="controls">
                  <select id="category" name="category" style="width:100%">
                    @foreach($category as $item)
                        <option value="{{$item->ca_id}}">{{$item->source}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="control-group">
                <div class="controls">
                  <div class="checkbox check-default checkbox-circle">
                      <input id="checkbox7" name="slide" value="1" type="checkbox">
                      <label for="checkbox7">{{trans('resource.news.publish')}}</label>
                  </div>
                </div>
              </div>
            </div>
            @foreach($langs as $item)
              <div class="row-fluid">
                <div class="span12">
                    <h5>{{trans('resource.news.content')}} <span class="semi-bold">{{$item->lang_key}}</span></h5>
                    {{-- <textarea id="content{{$item->lang_key}}" name="content[{{$item->lang_key}}]" placeholder="Enter text ..." class="text-editor span12" rows="40"></textarea> --}}
                    <div id="content_{{$item->lang_key}}" name="content[{{$item->lang_key}}]" stye="height: 500px;" class="summernote"></div>
                </div>
              </div>
            @endforeach
          </form>
          </div>
          <usource style="display: none;">
            @foreach ($langs as $item)
                <item name='{!! $item->lang_key !!}'></item>
            @endforeach
          </usource>
          <div style="padding-top: 10px;">
            <button class="btn" onclick="uPage.close('window_newsIndex')">{{trans('resource.buttons.close')}}</button>
            <button class="btn btn-primary" onclick="unews.save();">{{trans('resource.buttons.save')}}</button>
          </div>
        </div>
      </div>
    </div>
  </div>
@endif

<script type="text/javascript">
    $(document).ready(function(){

      $("#category").select2();

      var UImageButton = function (context) {
        var ui = $.summernote.ui;

        // create button
        var button = ui.button({
          contents: '<i class="icon-picture"/>',
          tooltip: 'hello',
          click: function () {
             selectedContext = context;
             uPage.call('/admin/gallery/basic',{'type': 'modal', 'backtype': 'summernote'});
          }
        });

        return button.render();   // return button as jquery object
      }

      $('.summernote').summernote({
        height: 300,                 // set editor height
        width: 800,
        disableDragAndDrop: false,
        toolbar: [
          ['style', ['bold', 'italic', 'underline', 'clear']],
          ['font', ['strikethrough', 'superscript', 'subscript']],
          ['fontsize', ['fontsize']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['height', ['height']],
          ['insert', ['link','table', 'video']],
          ['mybutton', ['uimage']]
        ],

        buttons: {
          uimage: UImageButton
        }
      });
      $('.modal').hide();
    });

    $("usource").find("item").each(function(){
        $("#content_"+ $(this).attr('name')).summernote("code", $(this).html());
    });

    var selectedContext = "";

    </script>
</div>
