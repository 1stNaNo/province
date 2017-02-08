<div class="main-slider-3">
    <div class="swiper-container js-main-slider-1">
        <div class="swiper-wrapper">
          @foreach($banner as $item)
            <div class="swiper-slide" data-swiper-autoplay="20">
                <article class="post post-tp-1">
                    <figure>
                        <img src="{{$item->value}}" height="511" width="1140" style="height: 360px" class="adaptive" />
                    </figure>
                </article>
            </div>
          @endforeach
        </div>
    </div>
</div>
