{{ Former::select('assigned', 'Show only contact assigned to')
        ->options(Prefs::getContactGroup()->contactGroupToSelection('_id','fullname',true))
        ->id('assigned-group-filter');
}}&nbsp;&nbsp;
<a class="btn" id="refresh_filter">Refresh</a>
<a class="btn" id="assign-prop">Assign Contact(s) to Group</a>
<a class="btn" id="unassign-prop">Un-assign Contact from Group</a>

<div id="assign-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Assign Selected to</span></h3>
  </div>
  <div class="modal-body" >
        <h4 id="upload-title-id"></h4>
        {{ Former::select('assigned', 'Assigned to')->options(Prefs::getContactGroup()->contactGroupToSelection('_id','fullname',false))->id('assigned-group')}}
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    <button class="btn btn-primary" id="do-assign">Assign</button>
  </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
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

            $.post('{{ URL::to('ajax/assigngroup')}}',
                {
                    user_id : $('#assigned-group').val(),
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

                $.post('{{ URL::to('ajax/unassigngroup')}}',
                {
                    user_id : $('#assigned-group-filter').val(),
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