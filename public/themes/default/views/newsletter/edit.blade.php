@extends('layout.front')


@section('content')

<h3>{{$title}}</h3>

{{Former::open_for_files_vertical($submit,'POST',array('class'=>'custom addAttendeeForm'))}}

{{ Former::hidden('id')->value($formdata['_id']) }}

{{ Former::hidden('template')->value($formdata['template']) }}

<div class="row-fluid">
    <div class="span9">
        <a href="{{ URL::to('brochure/preview/'.$formdata['template'].'/pdf')}}" target="blank">PDF Preview</a>
        {{ Former::textarea('body','Body')->name('body')->class('code')->style('min-height:600px;') }}
    </div>
    <div class="span3">
        {{ Former::select('status')->options(array('inactive'=>'Inactive','active'=>'Active'))->label('Status') }}
        {{ Former::text('title','Title') }}
        {{ Former::text('slug','Permalink')->id('permalink') }}
        {{ Former::select('category')->options(Prefs::getCategory()->catToSelection('title','title'))->label('Category') }}
        {{ Former::text('tags','Tags')->class('tag_keyword') }}

        <?php
            $fupload = new Fupload();
        ?>

        {{ $fupload->id('imageupload')->title('Select Images')->label('Upload Images')->make() }}
    </div>
</div>

<div class="row-fluid">
    <div class="span12">
        {{ Form::submit('Save',array('class'=>'btn primary'))}}&nbsp;&nbsp;
        {{ HTML::link($back,'Cancel',array('class'=>'btn'))}}
    </div>
</div>


{{Former::close()}}

<style type="text/css">
#lyric{
    min-height: 350px;
    height: 400px;
}
</style>

{{ HTML::script('js/ace/ace.js') }}
{{ HTML::script('js/ace/theme-twilight.js') }}
{{ HTML::script('js/ace/mode-php.js') }}
{{ HTML::script('js/jquery-ace.min.js') }}

<script type="text/javascript">


$(document).ready(function() {


    $('#title').keyup(function(){
        var title = $('#title').val();
        var slug = string_to_slug(title);
        $('#permalink').val(slug);
    });

    $('.code').ace({ theme: 'twilight', lang: 'php' });

});

</script>

@stop