
<div id="window_bannerRegister" class="page-window">
  <form class="form-horizontal" method="POST" role="form" id="bannerRegister_form" style="width:100%; height: 100%" enctype="multipart/form-data">
    <input type="hidden" class="prev_window"/>
    <input type="hidden" name="id" value="{{ (count($banner) > 0) ? $banner->banner_id : ''}}"/>
    <div class="row-fluid">
      <div class="row-fluid">
        <div class="span12">
          <div class="grid simple ">
            <div class="grid-title">
              <h4><span class="semi-bold">{{trans('resource.banner.banner')}}</span></h4>
            </div>
            <div class="grid-body">

              <!-- IMG -->
              <div class="row-fluid">

                <div class="span8">
                  <div class="control-group">
                    <div class="controls">
                      <img src="{{ (count($banner) > 0) ? $banner->value : '' }}" style="width: 325px; height: 78px;"/>
                    </div>
                  </div>
                </div>

                <div class="span8">
                  <div class="control-group">
                    <label class="control-label">{{trans('resource.weblinks.img')}}</label>
                    <div class="controls">
                      <input type="hidden" name="img_hidden" value="{{ (count($banner) > 0) ? $banner->value : '' }}"/>
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
                      <button type="button" class="btn btn-cons" onclick="uPage.close('window_bannerRegister');return false;">{{trans('resource.buttons.close')}}</button>
                      <button type="button" class="btn btn-primary btn-cons" onclick="ubanner.save()">{{trans('resource.buttons.save')}}</button>
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
