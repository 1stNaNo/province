<div class="recent-nws">
    <div class="pst-block">
        <div class="pst-block-head">
            <h2 class="title-4"><strong>{{trans('resource.link')}}</strong></h2>
            <div class="all-sb">
                {{-- <a href="">all news</a> --}}
            </div>
        </div>
        <div class="pst-block-main">
            <div class="inner-filters">
                <ul class="filters-list-3 js-tab-filter">
                    <li><a href="javascript:void(0)" id="firstslide"onclick="sdslide.load(1, this);" >{{trans('resource.sum')}}</a></li>
                    <li><a href="javascript:void(0)" onclick="sdslide.load(2, this);">{{trans('resource.department_agency')}}</a></li>
                    <li><a href="javascript:void(0)" onclick="sdslide.load(3, this);">{{trans('resource.links_more')}}</a></li>
                </ul>
            </div>
            <hr class="pst-block-hr">
            <div class="js-csp-block js-tab-slider">

            </div>
        </div>
        <div class="pst-block-foot">
            <div class="js-sbr-pagination"></div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        sdslide.load(1, $("#firstslide"));
    });

    var sdslide = {
      load: function(type, elmt){
        var postData = {};

        $.ajax({
            url: '/weblinks/' + type,
            type: "GET",
            dataType: "html",
            data : postData,
            success: function(data){
              var filters = $('.js-tab-filter');
              var slider = $('.js-tab-slider');

              var el = $(elmt);

              if(!el.hasClass('active')) {
                  filters.find('a').removeClass('active');
                  el.addClass('active');

                  slider.slick('slickRemove', 0);
                  slider.slick('slickRemove', 0);
                  slider.slick('slickAdd', data);
              }
            }
        });
      }
    }
</script>
