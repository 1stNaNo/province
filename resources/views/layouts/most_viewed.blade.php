<div class="sbr-slider">
    <div class="pst-block">
        <div class="pst-block-head">
            <h2 class="title-4"><strong>{{trans('resource.most_viewed')}}</h2>
        </div>
        <div class="pst-block-main">
            <div class="sidebar-slider">
                <div class="js-sbr-slider">
                  @foreach($model as $item)
                    <div class="item">
                          <article class="post post-tp-10">
                              <figure>
                                  <a href="/post/{{$item->id}}">
                                      <img src="{{$item->thumbnail}}" alt="{{$item->title}}" class="adaptive" height="231" width="360">
                                  </a>
                                  <a href="" class="category-tp-1">{{$item->ca_title}}</a>
                                  <div class="ptp-5-overlay">
                                      <div class="ptp-5-data">
                                          <a href="">
                                              <i class="li_eye"></i>{{$item->views}}
                                          </a>
                                          <a href="">
                                              <i class="li_bubble"></i>{{$item->comment_count}}
                                          </a>
                                      </div>
                                  </div>
                              </figure>
                              <div class="ptp-10-data">
                                  <h3 class="title-5"><a href="">{{$item->title}}</a></h3>
                                  <p class="p">{{--TEXT--}}</p>
                                  <div class="meta-tp-2">
                                      <div class="date"><span>{{$item->insert_date}}</span></div>
                                      <div class="category">
                                          <a href=""><i class="{{--li_pen--}}"></i><span>{{--TEXT--}}</span></a>
                                      </div>
                                  </div>
                              </div>
                          </article>
                      </div>
                  @endforeach
                </div>
                <div class="sbr-navs js-sbr-navs"></div>
            </div>
        </div>
        <div class="pst-block-foot">
            <div class="js-sbr-pagination"></div>
        </div>
    </div>
</div>
