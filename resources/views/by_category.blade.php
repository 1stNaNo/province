@include('layouts.main_temp_top')
<div class="main">
    <!-- Content -->
    <div class="main-content">

      <div class="page-head-tile">
          <div class="container">
              <div class="page-title">
                @if(count($news) > 0)
                  @if($resultType == "category")
                    <h1 class="title-16"><strong>{{$news[0]->ca_title}}</strong> : {{$news->total()}} {{trans('resource.searchResult')}}</h1>
                  @elseif($resultType == "latestnews")
                    <h1 class="title-16"><strong>{{trans('resource.latestNews')}}</strong> : {{$news->total()}} {{trans('resource.searchResult')}}</h1>
                  @elseif($resultType == "search")
                    <h1 class="title-16">{{$news->total()}} {{trans('resource.searchResult')}}</h1>
                  @endif
                @else
                  <h1 class="title-16"><strong>{{trans('resource.noResult')}}</strong></h1>
                @endif
              </div>
          </div>
      </div>

      <div class="section">
        <div class="row">
          <div class="content">
            <div class="pst-block">
                <div class="pst-block-main">
                    @if(count($news) > 0)
                      <div class="posts">
                          @foreach($news as $item)
                            <article class="post post-tp-24">
                                <figure>
                                    <a href="/post/{{$item->id}}">
                                        <img src="{{$item->thumbnail}}" style="height: 189px;" height="189" width="270" alt="{{$item->title}}" class="adaptive" />
                                    </a>
                                    <div class="ptp-24-overlay">
                                        <div class="ptp-24-data">
                                            <a href="">
                                                <i class="li_eye"></i>{{$item->views}}
                                            </a>
                                            <a href="">
                                                <i class="li_bubble"></i>{{$item->comment_count}}
                                            </a>
                                        </div>
                                    </div>
                                </figure>
                                <h3 class="title-14"><a href="">{{$item->title}}</a></h3>
                                {{-- <p class="p">Sed ut perspiciatis unde omnis iste natus sit voluptatem accusantium dolore mque laudantium, totamrem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi rchitecto</p> --}}
                                <div class="meta-tp-2">
                                    <div class="date"><span>{{$item->insert_date}}</span></div>
                                    <div class="category">
                                        <a href=""><i class="li_pen"></i><span>{{$item->ca_title}}</span></a>
                                    </div>
                                </div>
                            </article>
                          @endforeach
                      </div>
                      <div class="page-nav">
                        @if ($news->lastPage() > 1)
                              <a href="{{ ($news->currentPage() == 1) ? '#' : $news->url(1) }}" class="pn-item">
                                  <i class="page-nav-prev-ic"></i>
                              </a>
                              @for ($i = 1; $i <= $news->lastPage(); $i++)
                                  <a href="{{ $news->url($i) }}" class="pn-item {{ ($news->currentPage() == $i) ? ' current' : '' }}  mb-pt-hide">{{$i}}</a>
                              @endfor
                              <a href="{{ ($news->currentPage() == $news->lastPage()) ? ' #' : $news->url($news->currentPage()+1) }}" class="pn-item">
                                  <i class="page-nav-next-ic"></i>
                              </a>
                              <span class="page-count">{{trans('resource.page')}} {{$news->currentPage()}} - {{$news->lastPage()}}</span>
                        @else
                          <a href="#" disabled="disabled" class="pn-item">
                              <i class="page-nav-prev-ic"></i>
                          </a>
                          <a href="#" class="pn-item current mb-pt-hide">1</a>
                          <a href="#" disabled="disabled" class="pn-item">
                              <i class="page-nav-next-ic"></i>
                          </a>
                          <span class="page-count">{{trans('resource.page')}} {{$news->currentPage()}} - {{$news->lastPage()}}</span>
                        @endif
                      </div>
                    @else
                      <img src="/img/noresult.png" style="width: 100%" />
                    @endif
                </div>
            </div>
          </div>
          <aside class="side-bar sticky-wrap">

              @if(count($news) > 0)
                @if($resultType == "category")
                  @include('layouts.category_sidebar',['cat_id' => $news[0]->cat_id])
                @endif
              @endif

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
