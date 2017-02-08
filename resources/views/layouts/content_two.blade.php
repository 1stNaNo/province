<div class="popular-pst">
    <div class="pst-block">
        <div class="pst-block-head" style="background: #395a93;">
            <h2 class="title-4" style="color: #fff;"><strong>{{$model[0]->ca_title}}</strong></h2>
            <div class="filters">

                <ul class="filters-list-1 xs-hide">
                    <li><a class="active" style="color: #fff" href="/listcategory/{{$model[0]->cat_id}}">{{trans('resource.more')}}</a></li>
                </ul>
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
                <div class="col-half">
                    <article class="post post-tp-5">
                        <figure>
                            <a href="/post/{{$model[0]->id}}">
                                <img src="{{$model[0]->thumbnail}}" height="242" width="345" alt="{{$model[0]->title}}" class="adaptive" />
                            </a>
                            <div class="ptp-5-overlay">
                                <div class="ptp-5-data">
                                    <a href="">
                                        <i class="li_eye"></i>{{$model[0]->views}}
                                    </a>
                                    <a href="">
                                        <i class="li_bubble"></i>{{$model[0]->comment_count}}
                                    </a>
                                </div>
                            </div>
                        </figure>
                        <h3 class="title-5"><a href="">{{$model[0]->title}}</a></h3>
                        <div class="meta-tp-2">
                            <div class="date"><span>{{$model[0]->insert_date}}</span></div>
                            <div class="category">
                                {{-- <a href=""><i class="li_user"></i><span>admin</span></a> --}}
                            </div>
                        </div>
                        {{-- <p class="p">Sed ut perspiciatis unde omnis iste natus sit voluptatem accusantium doloremque laudantium, totamrem aperiam, eaque ipsa quae ab illo inventore</p> --}}
                    </article>
                    @if(isset($model[1]))
                      <article class="post post-tp-5">
                          <figure>
                              <a href="/post/{{$model[1]->id}}">
                                  <img src="{{$model[1]->thumbnail}}" height="242" width="345" alt="{{$model[1]->title}}" class="adaptive" />
                              </a>
                              <div class="ptp-5-overlay">
                                  <div class="ptp-5-data">
                                      <a href="">
                                          <i class="li_eye"></i>{{$model[1]->views}}
                                      </a>
                                      <a href="">
                                          <i class="li_bubble"></i>{{$model[1]->comment_count}}
                                      </a>
                                  </div>
                              </div>
                          </figure>
                          <h3 class="title-5"><a href="">{{$model[1]->title}}</a></h3>
                          <div class="meta-tp-2">
                              <div class="date"><span>{{$model[1]->insert_date}}</span></div>
                              <div class="category">
                                  {{-- <a href=""><i class="li_user"></i><span>admin</span></a> --}}
                              </div>
                          </div>
                          {{-- <p class="p">Sed ut perspiciatis unde omnis iste natus sit voluptatem accusantium doloremque laudantium, totamrem aperiam, eaque ipsa quae ab illo inventore</p> --}}
                      </article>
                    @endif
                </div>
                <div class="col-half">
                    @for($i=2; $i < count($model); $i++)
                      <article class="post post-tp-6">
                          <figure>
                              <a href="/post/{{$model[$i]->id}}">
                                  <img src="{{$model[$i]->thumbnail}}" style="height: 85px;" height="85" width="115" alt="{{$model[$i]->title}}" class="adaptive" />
                              </a>
                          </figure>
                          <h3 class="title-6"><a href="">{{$model[$i]->title}}</a></h3>
                          <div class="date-tp-2">{{$model[$i]->insert_date}}</div>
                      </article>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>
