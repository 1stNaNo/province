
<div class="file-widget">
    <div class="pst-block">
        <div class="pst-block-head">
            <h2 class="title-4"><strong>{{trans('resource.file.file')}}</strong></h2>
        </div>
        <div class="pst-block-main">
            <div class="file-block">
                <ul class="file-list">
                    @foreach($filetypes as $filetype)
                      <li class="file-item">
                        <i class="{{$filetype->icon}}"></i>
                        <label>{{$filetype->source}}</label>
                        <input type="hidden" value="{{$filetype->ft_id}}" name="type_id"/>
                      </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<style>

.file-item{
  border-bottom: 1px dashed #ebebeb;
  padding: 5px 0px 5px 10px;
  border-radius : 5px;
}
.file-item:hover{
  cursor:pointer;
  background-color: rgba(224, 224, 235, 0.5);
}
</style>

<script>
  $(".file-item").on('click', function(){
    window.location = 'file/'+$(this).find('[name=type_id]').val();
  });
</script>
