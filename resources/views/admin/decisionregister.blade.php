
<div id="window_decisionRegister" class="page-window">
  <form class="form-horizontal" method="POST" role="form" action="{{ url('/admin/decisionsave') }}" id="decisionRegister_form" style="width:100%; height: 100%">
    <input type="hidden" class="prev_window"/>
    <input type="hidden" name="id" value="{{$id}}"/>
    <div class="row-fluid">
      <div class="row-fluid">
        <div class="span12">
          <div class="grid simple ">
            <div class="grid-title">
              <h4><span class="semi-bold">{{trans('resource.decision.solution')}}</span></h4>
            </div>
            <div class="grid-body">
              <div class="has-lang">
                <!-- TITLE -->
                <div class="row-fluid">

                  <div class="span10">
                    <div class="control-group">
                      <label class="control-label">{{trans('resource.decision.solution')}}</label>
                      <div class="controls">
                        <textarea class="span12" cols="30" name="decision" class="" style="resize: none;"/>
                      </div>
                    </div>
                  </div>

                </div>

                <div class="row-fluid">

                  <div class="span10">
                    <div class="control-group">
                      <label class="control-label">{{trans('resource.category.target')}}</label>
                      <div class="controls">
                        <select id="kind" name="kind">
                          <option value="1">Эерэг</option>
                          <option value="2">Сөрөг</option>
                        </select>
                      </div>
                    </div>
                  </div>

                </div>

              </div>

              <!-- BUTTONS -->
              <div class="row-fluid">

                <div class="span8">
                  <div class="control-group">
                    <div class="controls">
                      <button type="button" class="btn btn-primary" onclick="udecision.save(); return false;">Хадгалах</button>
                      <button type="button" class="btn" onclick="uPage.close('window_decisionRegister');return false;">Хаах</button>
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
