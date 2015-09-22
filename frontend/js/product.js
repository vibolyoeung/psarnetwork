/*
 * For upload multiple pictures
 */
var Upload = (function() {

    /*
     * Append multiple forms upload  picture
     *
     * @public
     * @return void
     */
    var append_multiple_upload = function(){
        var table = document.getElementById('picture-table');
        var pictureData = document.getElementById('tableColumnPicture').getAttribute('data-prototype');

        var index = table.rows.length;
        var row = table.insertRow(-1);
        row.innerHTML = '<td>' + index + '</td>'
            + '<td>'+ pictureData + '</td>'
            + '<td><a class="btn btn-danger" onClick="Upload.delete_row(' + index + ')">Remove</a></td>'
    };

    /*
     * Delete picture
     *
     * @param integer row
     * @public
     * @return void
     */
    var delete_row = function(row){
        document.getElementById("picture-table").deleteRow(row);
    };

    return {
        delete_row : delete_row,
        append_multiple_upload: append_multiple_upload
    };
}());