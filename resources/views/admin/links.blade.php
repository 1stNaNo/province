@extends('layouts.admin')

@section('content')
<div id="window_links" class="page-window active-window">
  <input type="hidden" class="prev_window"/>
  <form id="links_form" action="linkssave" method="POST">

    <div class="grid simple">
      <div class="grid-title">
        <h4><span class="semi-bold">{{trans('resource.poll.register')}}</span></h4>
      </div>
      <div class="grid-body">
        @foreach($links as $link)
        <input type="hidden" name="id[{{$link->id}}]" value="{{$link->id}}"/>
        <div class="row-fluid">
          <div class="span4">
            <div class="control-group">
              <label class="control-label">{{trans('resource.name')}}</label>
              <div class="controls">
                <input type="text" class="span12" name="title" class="" disabled="true" value="{{$link->type}}"/>
              </div>
            </div>
          </div>
          <div class="span4">
            <div class="control-group">
              <label class="control-label">{{trans('resource.category.link')}}</label>
              <div class="controls">
                <input type="text" class="span12" name="link[{{$link->id}}]" class="" value="{{$link->link}}"/>
              </div>
            </div>
          </div>

        </div>
        @endforeach
        <div class="row-fluid">
          <div class="span8">
             <button type="button" class="btn btn-primary btn-cons" onclick="ulinks.save(); return false;">{{trans('resource.buttons.save')}}</button>
          </div>
        </div>
      </div>
    </div>
  </div>

</form>
  <script type="text/javascript">

  var ulinks = {
    save : function(){
      uForm.register('links_form', function(){
        alert(messages.saved);
      });
    }
  }

</script>
@endsection
