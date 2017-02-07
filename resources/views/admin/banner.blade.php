@extends('layouts.admin')

@section('content')
<div id="window_banner" class="page-window active-window">
  <input type="hidden" class="prev_window"/>
  <form id="banner_form" action="bannersave" method="POST">
  <div class="page-title">
    <i class="icon-custom-left"></i>
    <h3> - <span class="semi-bold">{{trans('resource.banner.banner')}}</span></h3>
  </div>
  <div class="row-fluid">
    <div class="span12">
      <div class="grid simple ">
        @foreach($banners as $banner)
        <input type="hidden" name="bannerid[{{$banner->banner_id}}]" value="{{$banner->banner_id}}"/>
        <div class="row-fluid">
          <div class="span4">
            <div class="control-group">
              <label class="control-label">{{trans('resource.banner.name')}}</label>
              <div class="controls">
                <input type="text" class="span12" name="title" class="" disabled="true" value="{{$banner->name}}"/>
              </div>
            </div>
          </div>
          <div class="span4">
            <div class="control-group">
              <label class="control-label">{{trans('resource.banner.image')}}</label>
              <div class="controls">
                <input type="text" class="span12" name="bannerimg[{{$banner->banner_id}}]" class="" id="bannerimg{{$banner->banner_id}}" value="{{$banner->value}}"/>
              </div>
              <a href="#uMainModal" data-toggle="modal" onclick="uPage.call('/admin/gallery/banner',{'type': 'modal', 'inputid': 'bannerimg{{$banner->banner_id}}'})">
                <span class="add-on">
                  <span class="arrow"></span>
                  <i class="icon-picture"></i>
                </span>
              </a>
            </div>
          </div>

        </div>
        @endforeach
        <div class="row-fluid">
          <div class="span8">
             <button type="button" class="btn btn-primary btn-cons" onclick="saveBanner(); return false;">Хадгалах</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</form>
  <script type="text/javascript">
  function saveBanner(){
    uForm.register('banner_form', function(){
      alert('Амжилттай хадгалагдлаа!');
    });
  }
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
