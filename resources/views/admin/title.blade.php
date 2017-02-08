@extends('layouts.admin')

@section('content')
<div id="window_title" class="page-window active-window">
  <input type="hidden" class="prev_window"/>
  <form id="title_form" action="titlesave" method="POST">

  <div class="grid simple">
    <div class="grid-title">
      <h4><span class="semi-bold">{{trans('resource.webtitle')}}</span></h4>
    </div>
    <div class="grid-body">
      <input type="hidden" name="id" value="1"/>
        @foreach($langs as $lang)
        <div class="row-fluid">
          <div class="span4">
            <div class="control-group">
              <label class="control-label">{{trans('resource.webtitle')}} {{$lang->lang_key}}</label>
              <div class="controls">
                <input type="text" class="span12" name="title[{{$lang->lang_key}}]" class="" value="@if(!empty($title)){{$title->title}} @endif" />
              </div>
            </div>
          </div>
        </div>
        <div class="row-fluid">
          <div class="span4">
            <div class="control-group">
              <label class="control-label">{{trans('resource.shorter')}} {{$lang->lang_key}}</label>
              <div class="controls">
                <input type="text" class="span12" name="body[{{$lang->lang_key}}]" class="" value="@if(!empty($title)) {{$title->body}}@endif"/>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        <div class="row-fluid">
          <div class="span8">
             <button type="button" class="btn btn-primary btn-cons" onclick="saveContentCat(); return false;">Хадгалах</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
  <script type="text/javascript">
  function saveContentCat(){
    uForm.register('title_form', function(){
      alert('Амжилттай хадгалагдлаа!');
    });
  }

</script>
@endsection
