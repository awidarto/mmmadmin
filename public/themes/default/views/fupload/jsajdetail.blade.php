if(file.is_image == true){

    var thumb = '<table class="table" id="par_'+ file.file_id +'" >' +
        '    <tr>' +
        '        <td rowspan="6"><img style="width:125px;" src="' + file.thumbnail_url + '"></td>' +
        '        <td><span class="img-title">' + file.filename + '</span></td>' +
        '        <td><span class="file_del icon-trash" id="' + file.file_id +'"></td>' +
        '    </tr>' +
        '    <tr>' +
        '        <td colspan="2">' +
        '            <label for="defaultpic" style="width:150px;float:left;"><input type="radio" name="defaultpic" ' + ' value="' + file.file_id + '" > Default Picture</label>' +
        '        </td>' +
        '    </tr>' +
        '    <tr>' +
        '        <td colspan="2">' +
        '            <label for="defaultmedia"><input type="radio" name="defaultmedia" ' + ' value="' + file.file_id + '" > Default Media</label>' +
        '        </td>' +
        '    </tr>' +
        '    <tr>' +
        '        <td style="text-align:right;">Caption</td>' +
        '        <td colspan="2">' +
        '            <input type="text" name="caption[]" />' +
        '        </td>' +
        '    </tr>' +
    '</table>';


}else{

    var thumb = '<table class="table" id="par_'+ file.file_id +'" >' +
        '    <tr>' +
        '        <td rowspan="6"><img style="width:125px;" src="' + file.thumbnail_url + '"></td>' +
        '        <td><span class="img-title">' + file.filename + '</span></td>' +
        '        <td><span class="file_del icon-trash" id="' + file.file_id +'"></td>' +
        '    </tr>' +
        '    <tr>' +
        '        <td colspan="2">' +
        '            <label for="defaultmedia"><input type="radio" name="defaultmedia" ' + isdefault + ' value="' + file.file_id + '" > Default Media</label>' +
        '        </td>' +
        '    </tr>' +
        '    <tr>' +
        '        <td style="text-align:right;">Caption</td>' +
        '        <td colspan="2">' +
        '            <input type="text" name="caption[]" />' +
        '        </td>' +
        '    </tr>' +
    '</table>';

}

