    var thumb = '<li><table class="table" id="par_'+ file.file_id +'" >' +
        '    <tr>' +
        '        <td rowspan="3" style="width:100px;"><img style="width:100px;" src="' + file.thumbnail_url + '"></td>' +
        '        <td><span class="img-title">' + file.name + '</span></td>' +
        '        <td  style="width:100px;text-align:right;"><span class="file_del icon-trash" id="' + file.file_id +'"></td>' +
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
        '        <td colspan="2">' +
        '            <label for="caption">Caption</label>' +
        '            <input type="text" name="caption[]" value="' + file.name + '" />' +
        '        </td>' +
        '    </tr>' +
    '</table></li>';

