@extends('layouts.admin')

@section('content')
<div id="window_newscat" class="page-window active-window">
  <input type="hidden" class="prev_window"/>
  <form id="newscat_form" action="savenewscat" method="POST">
  <div class="page-title">
    <i class="icon-custom-left"></i>
    <h3> - <span class="semi-bold">{{trans('resource.contentcat.contentcat')}}</span></h3>
  </div>
  <div class="row-fluid">
    <div class="span12">
      <div class="grid simple ">
        @foreach($contentcats as $contentcat)
        <input type="hidden" name="contentid[{{$contentcat->id}}]" value="{{$contentcat->id}}"/>
        <div class="row-fluid">
          <div class="span4">
            <div class="control-group">
              <label class="control-label">{{trans('resource.name')}}</label>
              <div class="controls">
                <input type="text" class="span12" name="title" class="" disabled="true" value="{{$contentcat->content_name}}"/>
              </div>
            </div>
          </div>
          <div class="span4">
            <div class="control-group">
              <label class="control-label">{{trans('resource.category.title')}}</label>
              <div class="controls">
                <select id="category" name="categoryid[{{$contentcat->id}}]" style="width:100%" value="{{$contentcat->cat_id}}">
                @foreach($categories as $category)

                  @if($category->ca_id == $contentcat->id)
                    <option selected="selected" value="{{$category->ca_id}}">{{$category->source}}</option>
                  @else
                    <option value="{{$category->ca_id}}">{{$category->source}}</option>
                  @endif
                  
                @endforeach
                </select>
                
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
</div>
</form>
  <script type="text/javascript">
  function saveContentCat(){
    uForm.register('newscat_form', function(){
      alert('Амжилттай хадгалагдлаа!');
    });
  }

  $(function(){
    $("#window_newscat").find('select').each(function(){
      $(this).select2();
      $(this).val($(this).attr('value')).trigger('change');
    });
  });
</script>
@endsection

@section('hidden_form')
<div class="admin-bar" id="quick-access" style="height:90%; overflow:scroll; display: ">
 <div class="admin-bar-inner" style="height: 3000px;">
   <div class="form-horizontal">
     <select id="val1" class="select2-wrapper">
       <option value="Gecko" />Gecko
       <option value="Webkit" />Webkit
       <option value="KHTML" />KHTML
       <option value="Tasman" />Tasman
     </select>
     <select id="val2" class="select2-wrapper">
       <option value="Internet Explorer 10" />Internet Explorer 10
       <option value="Firefox 4.0" />Firefox 4.0
       <option value="Chrome" />Chrome
     </select>
   </div>
   <button class="btn btn-primary btn-cons btn-add" type="button">Add Browser</button>
   <button class="btn btn-white btn-cons btn-cancel" type="button">Cancel</button>
 </div>
</div>
<div class="addNewRow"></div>
@endsection
