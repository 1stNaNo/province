
<div id="window_pollRegister" class="page-window">
  <form class="form-horizontal" method="POST" role="form" action="{{ url('/admin/pollsave') }}" id="pollRegister_form" style="width:100%; height: 100%">
    <input type="hidden" class="prev_window"/>
    <div class="page-title">
      <i class="icon-custom-left"></i>
      <h3> - <span class="semi-bold">{{trans('resource.poll.register')}}</span></h3>
    </div>
    <div class="row-fluid">
      <div class="row-fluid">
        <div class="span12">

          <div class="grid simple">
            <div class="grid-title">
              <h4><span class="semi-bold">{{trans('resource.poll.register')}}</span></h4>
            </div>
            <div class="grid-body">
                <!-- QUESTION -->

                @foreach($langs as $lang)
                  <div class="row-fluid">

                    <div class="span8">
                      <div class="control-group">
                        <label class="control-label">{{trans('resource.poll.question')}} /{{$lang->lang_key}}/</label>
                        <div class="controls">
                          <input type="text" class="span12" name="question[{{$lang->lang_key}}]" class="{{$lang->lang_key}}"/>
                        </div>
                      </div>
                    </div>

                  </div>
                @endforeach

                <div class="answer-container">
                  <div class="sub-container row-fluid">
                    @foreach($langs as $lang)
                      <div class="row-fluid answer-item">

                        <div class="span8">
                          <div class="control-group">
                            <label class="control-label">{{trans('resource.poll.answer')}} /{{$lang->lang_key}}/</label>
                            <div class="controls">
                              <input type="text" class="span12" name="answer[0][{{$lang->lang_key}}]" lang="{{$lang->lang_key}}"/>
                            </div>
                          </div>
                        </div>

                      </div>
                    @endforeach
                    <div class="row-fluid">
                      <div class="span8">
                        <button type="button" class="btn btn-primary btn-cons pull-right remove-btn" style="display: none;" onclick="upoll.removeAnswer(this); return false;">-</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row-fluid">

                  <div class="span8">
                    <div class="control-group">
                      <div class="controls">
                        <button type="button" class="btn btn-primary btn-cons pull-right" onclick="upoll.addAnswer(); return false;">+</button>
                      </div>
                    </div>
                  </div>

                </div>

              </div>

              <!-- BUTTONS -->
              <div class="row-fluid">

                <div class="span8" style="text-align: center;">
                  <div class="control-group">
                    <div class="controls">
                      <button type="button" class="btn btn-primary btn-cons" onclick="uForm.register('pollRegister_form', function(data){ console.log(data); uPage.close('window_pollRegister'); });return false;">Хадгалах</button>
                      <button type="button" class="btn btn-primary btn-cons" onclick="uPage.close('window_pollRegister');return false;">Хаах</button>
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
