{{ Former::select('assigned', 'Show only property assigned to')
        ->options(Prefs::getAgent()->agentToSelection('_id','fullname',true))
        ->id('assigned-agent-filter');
}}&nbsp;&nbsp;
<a class="btn" id="refresh_filter">Refresh</a>
<a class="btn" id="assign-prop">Assign Properties to Agent</a>
<a class="btn" id="unassign-prop">Un-assign Properties from Agent</a>

<div id="assign-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Assign Selected to</span></h3>
  </div>
  <div class="modal-body" >
        <h4 id="upload-title-id"></h4>
        {{ Former::select('assigned', 'Assigned to')->options(Prefs::getAgent()->agentToSelection('_id','fullname',false))->id('assigned-agent')}}
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    <button class="btn btn-primary" id="do-assign">Assign</button>
  </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#assigned-agent-filter').on('change',function(){
            oTable.fnDraw();
        });

        $('#refresh_filter').on('click',function(){
            oTable.fnDraw();
        });

        $('#refresh_filter').on('change',function(){
            oTable.fnDraw();
        });

        $('#assign-prop').on('click',function(e){
            $('#assign-modal').modal();
            e.preventDefault();
        });

        $('#do-assign').on('click',function(){
            var props = $('.selector:checked');
            var ids = [];
            $.each(props, function(index){
                ids.push( $(this).val() );
            });

            console.log(ids);

            $.post('{{ URL::to('ajax/assign')}}',
                {
                    user_id : $('#assigned-agent').val(),
                    prop_ids : ids
                },
                function(data){
                    $('#assign-modal').modal('hide');
                }
                ,'json');

        });

        $('#unassign-prop').on('click',function(){
            var props = $('.selector:checked');
            var ids = [];
            $.each(props, function(index){
                ids.push( $(this).val() );
            });

            console.log(ids);

            var answer = confirm('Are you sure you want to un-assign these Properties ?');

            console.log(answer);

            if (answer == true){

                $.post('{{ URL::to('ajax/unassign')}}',
                {
                    user_id : $('#assigned-agent-filter').val(),
                    prop_ids : ids
                },
                function(data){
                    oTable.fnDraw();
                }
                ,'json');

            }else{
                alert("Unassignment cancelled");
            }

        });

    });
</script>