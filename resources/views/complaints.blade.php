@include('layouts.main_temp_top')
<div class="main">
    <!-- Content -->
    <div class="main-content">
      <div class="trending-posts-line" style="height: 20px;"></div>
      <div class="section">
        <div class="row">
          <div class="content">
            <div class="pst-block">
                <div class="pst-block-main">
                    <div class="post-content">
                      @if(session('status'))
                          <p style="font-size: 14px; font-family: arial; color: green;">{{trans('resource.saved')}}</p>
                      @endif
                      <div class="contactf-form-block">
                          <div class="title-blc-2">
                              <div class="title-blc-inner">
                                  <h4><span>{{trans('resource.sendComplaints')}}</span></h4>
                                  {{-- <p>Your email address will not be published.</p> --}}
                              </div>
                          </div>
                          <div class="comments-form">
                            <form role="form" id="contactForm" data-toggle="validator" class="shake" action="/svcomplaints" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group form-control">
                                    <label>
                                        {{trans('resource.name')}}*
                                        <input type="text" class="form-control" name="name" placeholder="{{trans('resource.enterName')}}" required data-error="Please enter Your Name" />
                                    </label>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group form-control">
                                    <label>
                                        {{trans('resource.email')}}*
                                        <input type="email" class="form-control" name="email" placeholder="{{trans('resource.enterEmail')}}" required data-error="Please enter Your Email" />
                                    </label>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group form-control">
                                    <label>
                                        {{trans('resource.complaints')}}*
                                        <textarea class="form-control" name="message" rows="5" placeholder="{{trans('resource.enterComplaints')}}" required data-error="Please enter Your Message"></textarea>
                                    </label>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <button type="submit" id="form-submit" class="btn btn-3 btn-success btn-lg pull-right">{{trans('resource.post')}}</button>
                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                            </form>
                          </div>
                      </div>
                    </div>
                </div>
            </div>
          </div>
          <aside class="side-bar sticky-wrap">

              @include('layouts.weather')

              @include('layouts.sidebar_dslide')

              {{-- SIDE BAR SLIDE HERE  --}}
              @include('layouts.slide_sidebar')

              @include('layouts.sidebar_poll')
          </aside>
        </div>
    </div>
</div>
                <!-- Content END -->
                <!-- Footer -->
                @include('layouts.main_temp_footer')
                <!-- Footer END -->
@include('layouts.main_temp_bot')
