<div class="weather-widget">
    <div class="pst-block">
        <div class="pst-block-head">
            <h2 class="title-4"><strong>{{trans('resource.weather')}}</strong></h2>
            <a href="" class="arr-ic-3"><i class="fa fa-angle-down"></i></a>
        </div>
        <div class="pst-block-main">
            <iframe id="forecast_embed" type="text/html" frameborder="0" height="310" width="275" src="http://tsag-agaar.gov.mn/embed/?name={{$model[0]->link}}&color=ef6e25&color2=cc530e&color3=ffffff&color4=ffffff&type=vertical&tdegree=cwidth=270"> </iframe> 
        </div>
    </div>
</div>
