@extends('layout.front')


@section('content')

<h3>{{$title}}</h3>

{{Former::open_for_files($submit,'POST',array('class'=>'custom addAttendeeForm'))}}

<div class="row-fluid">
    <div class="col-md-6">

        {{ Former::select('salutation')->options(Config::get('kickstart.salutation'))->label('Salutation')->class('span2') }}
        {{ Former::text('firstname','First Name')->required() }}
        {{ Former::text('lastname','Last Name')->required() }}
        {{ Former::text('mobile','Mobile')->class('span3')->maxlength(15) }}

        {{ Former::text('address_1','Address')->required() }}
        {{ Former::text('address_2','') }}
        {{ Former::text('city','City')->required() }}
        {{ Former::text('zipCode','ZIP / Postal Code')->id('zip')->class('span2')->maxlength(5)->required() }}

        <div class="us" style="display:none;">
            {{ Former::select('state')->class('us')->options(Config::get('country.us_states'))->label('State')->style('display:none;')->id('us_states') }}
        </div>
        <div class="au" style="display:none;">
            {{ Former::select('state')->class('au')->options(Config::get('country.aus_states'))->label('State')->style('display:none;')->id('au_states') }}
        </div>
        <div class="outside">
            {{ Former::text('state','State / Province')->class('outside col-md-6')->id('other_state')->class('span3') }}
        </div>

        {{ Former::select('countryOfOrigin')->id('country')->options(Config::get('country.countries'))->label('Country of Origin')->required() }}
    </div>
    <div class="col-md-6">
        {{ Former::text('email','Email')->required() }}

        {{ Former::password('pass','Password')->required() }}
        {{ Former::password('repass','Repeat Password')->required() }}

        <hr>
        <h5>Access to Property Setting</h5>

        {{ Former::select('prop_access', 'Access to Property')->options(Config::get('ia.property_access'))
            ->help('User can see all properties, this setting override filters below') }}

        <h6>Filter Setting ( only effective for filtered property access )</h6>

        <?php
            $principal_select = Prefs::getPrincipal()->principalToSelection('_id','company',Config::get('ia.default_principal_name'));
            $principal_select = array_merge(array(''=>'All'),$principal_select );
        ?>

        {{ Former::select('filter_status', 'Filter by Property Status')->options(Config::get('ia.status_filter'))->id('assigned-agent')->help('User can only see properties with particular status') }}


        {{ Former::select('filter_principal', 'Filter by Principal')->options($principal_select)->id('assigned-agent')->help('User can only see properties from particular Principal') }}

        <?php
            $state_select = array_merge(array(''=>'All'),Config::get('country.us_states') );
        ?>

        {{-- Former::select('filter_state', 'Filter by State')->options($state_select)->id('filter_states')->help('User can only see properties in particular state') --}}

        {{ Former::text('filter_state','Filter by State')->class('tag_state') }}

        {{ Former::text('filter_propmanager','Filter by Property Manager')->class('tag_propman') }}

        <?php
            $price_sign = array(
                    ''=>'All',
                    '='=>'=',
                    '$gt'=>'>',
                    '$gte'=>'>=',
                    '$lt'=>'<',
                    '$lte'=>'<=',
                    );
            $bool = array(
                    '-'=>'none',
                    'OR'=>'OR',
                    'AND'=>'AND'
                );
        ?>

        <div class="row-fluid form-horizontal">
            <div class="col-md-4">
                {{ Former::select('price_sign', 'Filter by Price')->options($price_sign)->class('span12') }}
            </div>
            <div class="col-md-8 no-label">
                {{ Former::text('filter_price','')->class('col-md-6') }}
            </div>
        </div>

        {{ Former::select('price_sign2', '')->options($bool)->class('span2')->help('relationship between two price conditions (optional)') }}

        <div class="row-fluid form-horizontal">
            <div class="col-md-4">
                {{ Former::select('price_rel', '')->options($price_sign)->class('span12') }}
            </div>
            <div class="col-md-8 no-label">
                {{ Former::text('filter_price2','')->class('col-md-6')->help('second price condition (optional)') }}
            </div>
        </div>


    </div>
</div>

<div class="row-fluid right">
    <div class="col-md-12">
        {{ Form::submit('Save',array('class'=>'btn primary'))}}&nbsp;&nbsp;
        {{ HTML::link($back,'Cancel',array('class'=>'btn'))}}
    </div>
</div>
{{Former::close()}}

<script type="text/javascript">

$(document).ready(function() {

    $('#country').on('change',function(){
        var country = $('#country').val();

        if(country == 'Australia'){
            $('.au').show();
            $('.us').hide();
            $('.outside').hide();

            $('select.au').removeProp('disabled');
            $('select.us').prop('disabled','disabled');
            $('input.outside').prop('disabled','disabled');

        }else if(country == 'United States of America'){
            $('.au').hide();
            $('.us').show();
            $('.outside').hide();

            $('select.au').prop('disabled','disabled');
            $('select.us').removeProp('disabled');
            $('input.outside').prop('disabled','disabled');
        }else{
            $('.au').hide();
            $('.us').hide();
            $('.outside').show();

            $('select.au').prop('disabled','disabled');
            $('select.us').prop('disabled','disabled');
            $('input.outside').removeProp('disabled');
        }
    });

    var url = '{{ URL::to('upload') }}';

    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                var thumb = '<li><img src="' + file.thumbnail_url + '" /><br /><input type="radio" name="defaultpic" value="' + file.name + '"> Default<br /><span class="img-title">' + file.name + '</span>' +
                '<label for="colour">Colour</label><input type="text" name="colour[]" />' +
                '<label for="material">Material & Finish</label><input type="text" name="material[]" />' +
                '<label for="tags">Tags</label><input type="text" name="tag[]" />' +
                '</li>';
                $(thumb).appendTo('#files ul');

                var upl = '<input type="hidden" name="delete_type[]" value="' + file.delete_type + '">';
                upl += '<input type="hidden" name="delete_url[]" value="' + file.delete_url + '">';
                upl += '<input type="hidden" name="filename[]" value="' + file.name  + '">';
                upl += '<input type="hidden" name="filesize[]" value="' + file.size  + '">';
                upl += '<input type="hidden" name="temp_dir[]" value="' + file.temp_dir  + '">';
                upl += '<input type="hidden" name="thumbnail_url[]" value="' + file.thumbnail_url + '">';
                upl += '<input type="hidden" name="filetype[]" value="' + file.type + '">';
                upl += '<input type="hidden" name="fileurl[]" value="' + file.url + '">';

                $(upl).appendTo('#uploadedform');
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .bar').css(
                'width',
                progress + '%'
            );

            /*
            if(progress == 100){
                $('#progress .bar').css('width','0%');
            }
            */
        }
    })
    .prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');

    $('#field_role').change(function(){
        //alert($('#field_role').val());
        // load default permission here
    });

    /*

    $('#ecoFriendly').summernote({
        height: 300px
    });

    var editor = new wysihtml5.Editor('ecoFriendly', { // id of textarea element
      toolbar:      'wysihtml5-toolbar', // id of toolbar element
      parserRules:  wysihtml5ParserRules // defined in parser rules set
    });
    */

    $('#name').keyup(function(){
        var title = $('#name').val();
        var slug = string_to_slug(title);
        $('#permalink').val(slug);
    });

    //$('#color_input').colorPicker();

    // dynamic tables
    $('#add_btn').click(function(){
        //alert('click');
        addTableRow($('#variantTable'));
        return false;
    });

    // custom field table
    $('#custom_add_btn').click(function(){
        //alert('click');
        addTableRow($('#customTable'));
        return false;
    });

    $('#related_add_btn').click(function(){
        //alert('click');
        addTableRow($('#relatedTable'));
        return false;
    });

    $('#component_add_btn').click(function(){
        //alert('click');
        addTableRow($('#componentTable'));
        return false;
    });

    $('#mainCategory').change(function(){
        setVisibleOptions();
    });

});

</script>

@stop