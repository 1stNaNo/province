
<div id="window_userRegister" class="page-window">
  <form class="form-horizontal" method="POST" role="form" action="{{ url('/admin/usersave') }}" id="userRegister_form" style="width:100%; height: 100%">
    <input type="hidden" class="prev_window"/>
    <input type="hidden" name="id" value="{{ (!empty($user)) ? $user->id : '' }}"/>
      <div class="row-fluid">
        <div class="span12">

          <div class="grid simple">
            <div class="grid-title">
              <h4><span class="semi-bold">{{trans('resource.users')}}</span></h4>
            </div>
            <div class="grid-body">

              <div class="row-fluid">

                <div class="span8">
                  <div class="control-group">
                    <label class="control-label">{{trans('resource.name')}}</label>
                    <div class="controls">
                      <input type="text" class="span12" name="name" class="" value="{{(!empty($user)) ? $user->name : ''}}"/>
                    </div>
                  </div>
                </div>

              </div>

              <div class="row-fluid">

                <div class="span8">
                  <div class="control-group">
                    <label class="control-label">{{trans('resource.email')}}</label>
                    <div class="controls">
                      <input type="text" class="span12" name="email" class="" value="{{(!empty($user)) ? $user->email : ''}}"/>
                    </div>
                  </div>
                </div>

              </div>

              <div class="row-fluid">

                <div class="span8">
                  <div class="control-group">
                    <label class="control-label">{{trans('resource.password')}}</label>
                    <div class="controls">
                      <input type="password" class="span12" name="password" class=""/>
                    </div>
                  </div>
                </div>

              </div>

              <div class="row-fluid">

                <div class="span8">
                  <div class="control-group">
                    <label class="control-label">{{trans('resource.passwordconf')}}</label>
                    <div class="controls">
                      <input type="password" class="span12" name="password_confirmation" class=""/>
                    </div>
                  </div>
                </div>

              </div>

              <div class="row-fluid">

                <div class="span8">
                  <div class="control-group">
                    <div class="controls">
                      <button type="button" class="btn btn-primary" onclick="uusers.save();return false;">{{trans('resource.buttons.save')}}</button>
                      <button type="button" class="btn" onclick="uPage.close('window_userRegister'); return false;">{{trans('resource.buttons.close')}}</button>
                    </div>
                  </div>
                </div>

              </div>

            </div>
          </div>
        </div>
  </form>
</div>
