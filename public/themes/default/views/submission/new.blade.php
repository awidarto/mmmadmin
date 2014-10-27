@extends('layout.front')


@section('content')

<h3>{{$title}}</h3>

{{Former::open_for_files($submit,'POST',array('class'=>''))}}

<div class="row-fluid">
    <div class="col-md-6">

        {{ Former::text('title','Media Title') }}
        {{ Former::select('type')->options(Config::get('media.type'))->label('Media Type') }}
        {{ Former::text('artist','Artist') }}
        {{ Former::text('album','Album') }}
        {{ Former::text('genre','Genre')->class('tag_keyword') }}
        {{ Former::select('countryOfOrigin')->options(Config::get('country.countries'))->label('Country of Origin') }}
        {{ Former::text('slug','Permalink')->id('permalink') }}

        {{ Former::text('price','Price (IDR)') }}
        {{ Former::text('tags','Tags')->class('tag_keyword') }}

        {{ Former::textarea('lyric','Lyric') }}

    </div>
    <div class="col-md-6">

        <?php
            $fupload = new Fupload();
        ?>

        {{ $fupload->id('mediaupload')->title('Select Media')->label('Upload Media')->make() }}


    </div>
</div>

<div class="row-fluid">
    <div class="col-md-12 pull-right">
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

{{ HTML::script('js/codemirror/lib/codemirror.js') }}
{{ HTML::script('js/codemirror/mode/php/php.js') }}
{{ HTML::script('js/codemirror/mode/xml/xml.js') }}


{{ HTML::style('css/summernote-bs2.css') }}
{{ HTML::style('css/summernote.css')}}
{{ HTML::style('css/summernote-bp.css')}}
{{ HTML::script('js/summernote.min.js') }}

{{ HTML::style('js/codemirror/lib/codemirror.css') }}
{{ HTML::style('js/codemirror/theme/twilight.css') }}


<script type="text/javascript">


$(document).ready(function() {


    $('#title').keyup(function(){
        var title = $('#title').val();
        var slug = string_to_slug(title);
        $('#permalink').val(slug);
    });

    /*$('.code').ace({ theme: 'twilight', lang: 'php' }); */

    $('#lyric').summernote({
        height:'600px',
        codemirror: {
            'theme':'twilight',
            'mode':'php'
        }
    });

});

</script>

@stop