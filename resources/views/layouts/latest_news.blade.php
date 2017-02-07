<div class="editors-pst">
    <div class="pst-block spst-slider">
        <div class="pst-block-head">
            <h2 class="title-4"><strong>{{trans('resource.latestNews')}}</strong></h2>
            <div class="filters">
                <div class="post-navs js-pst-navs">
                    <a href="" class="prev pst-prev">
                        <span class="arr-left-dark-ic"><i></i></span>
                    </a>
                    <a href="" class="next pst-next">
                        <span class="arr-right-dark-ic"><i></i></span>
                    </a>
                </div>
                {{-- <div class="filters-more">
                    <div class="filters-btn js-fl-btn">
                        <i class="li_settings"></i>
                        <div class="filters-drop js-fl-block">
                            <i class="arr"></i>
                            <ul>
                                <li><a href="">Latest</a></li>
                                <li><a href="" class="active">Popular</a></li>
                                <li><a href="">Recent</a></li>
                                <li><a href="">Most comment</a></li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="pst-block-main">
            <div class="col-row">
                <div class="js-pst-block">
                    @foreach($model as $item)
                      <div class="col-one-third">
                          <article class="post post-tp-5">
                              <figure>
                                  <a href="/post/{{$item->id}}">
                                      <img style="height: 230px;" src="{{$item->thumbnail}}" height="150" width="224" alt="{{$item->title}}" class="adaptive" />
                                  </a>
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
                              <h3 class="title-5"><a href="">{{$item->title}}</a></h3>
                              <div class="date-tp-2"><span>{{$item->insert_date}}</span></div>
                          </article>
                      </div>
                    @endforeach
                    {{-- <div class="col-one-third">
                        <article class="post post-tp-5">
                            <figure>
                                <a href="">
                                    <img src="https://s3.amazonaws.com/weblionmedia-spectr/img/224x150/1.jpg" height="150" width="224" alt="Spectr News Theme" class="adaptive" />
                                </a>
                            </figure>
                            <h3 class="title-5"><a href="">Fusce ac orci sagittis mattis magna ultrices</a></h3>
                            <div class="date-tp-2"><span>october 2, 2015</span></div>
                        </article>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="pst-block-foot">
            <a href="/listlatestnews">{{trans('resource.more')}}</a>
        </div>
    </div>
</div>
