<div id="window_externalIndex" class="page-window">
    <input type="hidden" class="prev_window"/>
    <div class="row-fluid">
      <div class="grid simple">
          <div class="grid-title no-border">
            <h4><span class="semi-bold">{{trans('resource.main.external')}}</span></h4>
            <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
          </div>
            <div class="grid-body no-border"> <br>
              <div class="row-fluid">
              <form action="" id="external_action_form">
                <input type="hidden" name="id" value="{{ (count($external) > 0) ? $external->id : '' }}"/>
                <div class="span8">
                  <div class="control-group" id="linkCont">
                    <label class="control-label">{{trans('resource.category.link')}}</label>
                    <span class="help"></span>
                    <div class="controls">
                      <input class="span12 " type="text" value="{{ (count($external) > 0) ? $external->link: ''}}" name="link">
                    </div>
                  </div>
                  <div class="control-group" id="linkCont">
                    <label class="control-label">{{trans('resource.main.count')}}</label>
                    <span class="help"></span>
                    <div class="controls">
                      <input class="span12 " type="text" value="{{ (count($external) > 0) ? $external->count: ''}}" name="count">
                    </div>
                  </div>
                </div>
              </form>
              </div>
              <div style="padding-top: 10px;">
                <button class="btn" onclick="uPage.close('window_externalIndex')">{{trans('resource.buttons.close')}}</button>
                <button class="btn btn-primary" onclick="uexternal.save();">{{trans('resource.buttons.save')}}</button>
              </div>
            </div>
        </div>
      </div>
      <script type="text/javascript">
          $(document).ready(function(){

            $(".uselect2").select2();


          });
      </script>
    </div>
</div>
