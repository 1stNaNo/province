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
                            <article>
                                <ul class="siteStructureCont">
                                </ul>
                            </article>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    $(document).ready(function(){
                      for(var i=0; i < basicMenuObj.length; i++){

                          var tmpUrl = basicMenuObj[i].url;

                          if(tmpUrl == "#$cat$#"){
                            tmpUrl = "/listcategory/" + basicMenuObj[i].ca_id;
                          }

                          if(basicMenuObj[i].parent_id == 0){
                              $('.siteStructureCont').append('<li menuid="'+ basicMenuObj[i].ca_id +'"><a isparent="true" target_="'+ basicMenuObj[i].target +'" href="'+ tmpUrl +'"> - '+ basicMenuObj[i].source +'</a></li>');
                          }else{
                              var tmpItem = $('.siteStructureCont').find("li[menuid='"+ basicMenuObj[i].parent_id +"']");

                              if($(tmpItem).find("ul.sub").length <= 0){
                                  $(tmpItem).append('<ul class="sub"></ul>');

                                  currentElmnt = $(tmpItem).find("a");

                                  if(currentElmnt.attr("isparent") == "true"){
                                      // currentElmnt.append('<i class="fa fa-angle-down"></i>');
                                  }else{
                                      currentElmnt.addClass('sf-with-ul');
                                  }

                                  $(tmpItem).find("ul.sub").append('<li menuid="'+ basicMenuObj[i].ca_id +'"><a target_="'+ basicMenuObj[i].target +'" href="'+ tmpUrl +'"> - '+ basicMenuObj[i].source +'</a></li>');
                              }else{
                                  $(tmpItem).find("ul.sub").append('<li menuid="'+ basicMenuObj[i].ca_id +'"><a target_="'+ basicMenuObj[i].target +'" href="'+ tmpUrl +'"> - '+ basicMenuObj[i].source +'</a></li>');
                              }
                          }
                      }
                    });
                </script>
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
</div>

@include('layouts.main_temp_bot')
