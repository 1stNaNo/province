<div class="main-slider-1">
    <div class="swiper-container js-main-slider-1">
        <div class="swiper-wrapper">
          @foreach($model as $item)
            <div class="swiper-slide">
                <article class="post post-tp-1">
                    <figure>
                        <a href="/post/{{$item->id}}"><img src="{{$item->thumbnail}}" height="511" width="1140" alt="{{$item->title}}" class="adaptive" /></a>
                    </figure>
                    <div class="ptp-1-overlay">
                        <div class="ptp-1-data">
                            <a href="" class="category-tp-1"></a>
                            <h1 class="title-1"><a href="#1">{{$item->title}}</a></h1>
                            <div class="meta-tp-1">
                                <div class="ptp-1-date"><a href="">{{$item->insert_date}}</a></div>
                                <div class="ptp-1-views"><a href=""><i class="li_eye"></i><span>{{$item->views}}</span></a></div>
                                <div class="ptp-1-comments"><a href=""><i class="li_bubble"></i><span>{{$item->comment_count}}</span></a></div>
                            </div>
                            <a href="/post/{{$item->id}}" class="read-tp-1"><span>{{trans('resource.readmore')}}</span> <span class="arr-right-light-ic"><i></i></span></a>
                            {{-- <a href="" class="save-tp-1"><span>Save and read later</span> <span class="arr-down-light-ic"><i></i></span></a> --}}
                        </div>
                    </div>
                </article>
            </div>
          @endforeach
        </div>
        <div class="nav-arrow prev">
            <i class="ms-prev"></i>
            <div class="slide-count"></div>
        </div>
        <div class="nav-arrow next">
            <i class="ms-next"></i>
            <div class="slide-count"></div>
        </div>
    </div>
</div>
