<div class="design-pst">
    <div class="pst-block">
        <div class="pst-block-head">
            <h2 class="title-4"><strong>{{trans('resource.dashboard.dashboard')}}</strong></h2>
        </div>
        {{ csrf_field() }}
        <div class="pst-block-main">
            <div class="col-row">
                <div class="col-full xs-full mb-ls-full">
                    <article class="post post-tp-5">
                        <figure>
                            <div id="pie">
                                <div id="pieChartContainer" style="max-width: 800px; margin: 0 auto"></div>
                            </div>
                        </figure>
                     <h3 class="title-5"><a href="">Санал гомдол</a></h3>
                 </article>
             </div>
         </div>
     </div>
 </div>
</div>
<script>

$(function () {

    $.post("/complaintInfo", {'_token' : $('[name="_token"]').val()}, function(data){

        var unsolved = 0;
        var solvedpositive = 0;
        var solvednegative = 0;
        $.each(data, function(i, v){
            if(v['type'] == 0){
                unsolved += 1;
            }else{
                if(v['kind'] == 2)
                    solvednegative += 1;
                else
                    solvedpositive += 1;
            }
        });

        var data = [
            {name : 'Шийдэгдээгүй', value : unsolved},
            {name : 'Сөрөг', value : solvednegative},
            {name : 'Эерэг', value : solvedpositive}
        ]

        $("#pieChartContainer").dxPieChart({
            dataSource: data,
            series: {
                argumentField: 'name',
                valueField: 'value',
                type: 'doughnut',
                label: {
                    visible: true,
                    connector: { visible: true },
                    format: {
                        type: 'largeNumber',
                        precision: 0
                    }
                }
            },
            palette: 'Ocean',
            adaptiveLayout: {
                width: 300
            },
            legend: {
                horizontalAlignment: 'center',
                verticalAlignment: 'bottom'
            }

        });

    
        
    });
    
});
</script>
