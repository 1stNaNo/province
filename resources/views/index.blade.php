@include('layouts.main_temp_top')
<div class="main">
    <!-- Content -->
    <div class="main-content">
        <!-- Trending line -->
          @include("layouts.shorter")
        <!-- Trending line END -->
        <!-- Main slider -->
        <div class="section">
          @include("layouts.slide_main")
        </div>
        <!-- Main slider END -->
        <div class="section">
            @include("layouts.latest_news")
        </div>
        <div class="section">
            <div class="row">
                <div class="content">
                    @include('layouts.content_one')

                    {{-- <div class="banner xs-hide">
                          @include('layouts.banner', ['name' => 'banner2'])
                    </div> --}}

                    @include('layouts.content_two')

                    {{-- <div class="banner xs-hide">
                          @include('layouts.banner', ['name' => 'banner3'])
                    </div> --}}

                    @include('layouts.dashboard')
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
