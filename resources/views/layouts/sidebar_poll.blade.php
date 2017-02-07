<div class="poling-widget">
    <div class="pst-block">
        <div class="pst-block-head">
            <h2 class="title-4"><strong>{{trans('resource.polling')}}</strong></h2>
        </div>
        <input type="hidden" name="poll_id" value="{{$poll->id}}"/>
        {{ csrf_field() }}
        <div class="pst-block-main">
            <div class="poling-block">
                <h5 class="title-9">{{$poll->source}}</h5>
                <ul class="poling-list">
                    @if(Session::get('poll'))
                        @foreach($answers as $answer)
                        <li>
                            <label class="rd-label" >{{$answer->source}}</label>&nbsp;-&nbsp;
                            <label class="rd-label" >{{$answer->total}}</label>
                        </li>
                        @endforeach
                    @else
                        @foreach($answers as $answer)
                        <li>
                            <input type="radio" name="poll" id="answer{{$answer->id}}" value="{{$answer->id}}" />
                            <label class="rd-label" for="test1">{{$answer->source}}</label>
                        </li>
                        @endforeach
                    @endif
                </ul>
                @if(!Session::get('poll'))
                    <button class="btnSubmit btn btn-3 btn-success" onclick="submitPoll()">{{trans('resource.poll.givepoll')}}</button>
                @endif
            </div>
        </div>
    </div>
    <script>
        function submitPoll(){
            if($("[name=poll]").val() != undefined && $("[name=poll]").val() != null){
                $.post("/submitpoll", {'answer_id': $("[name=poll]").val(), 'poll_id' : $('[name=poll_id]').val(), '_token' : $("[name='_token']").val()}, function(data){
                    $obj = "";
                    $.each(data, function(i, v){
                        $obj += '<label class="rd-label" >'+v.source+'</label>&nbsp;-&nbsp;<label class="rd-label" >'+v.total+'</label>';
                    });
                    $(".btnSubmit").remove();
                    $(".poling-list").html($obj);
                });
            }
        }
    </script>
</div>
