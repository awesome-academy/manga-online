$(function() {
    $('#roles-table').DataTable({
        processing: true,
        serverSide: true,
        ordering: false,
        ajax: {
            url: '/role/getlist',
        },
        columns: [
        { 
            data: 'DT_RowIndex', 
            name: 'STT', searchable: false 
        },
        {
            data: 'title',
            name: 'title',
            render: function (data, type, row) {

                return data.substr(0, 30) + "...";
            }
        },
        { 
            data: 'permission',
            name: 'permission',
            render: function (data, type, row) {
                $string = '';
                JSON.parse(data).forEach ( function(value) {
                    $string += '<button type="button" class="btn m-btn--pill btn-info m-btn m-btn--custom m-btn--bolder">' + value.code + '<a href="#" onclick="deletePermission(' + value.id + ', ' + row.id + ' );"> <span ><i class="fas fa-trash"></i></span><a/></button>';
                });

                return $string;
            }
        },
        { data: 'created_at', name: 'created_at' },
        {
            data: 'id',
            name: 'id',
            render: function (data, type, row) {

                return '<a href="#" class="btn btn-xs btn-primary" data-toggle="tooltip"  onclick="addPermission(' + data + ');"><i class="fas fa-plus"></i></a>' +
                '<a href="#" class="btn btn-xs btn-warning" data-toggle="tooltip"  onclick="edit(' + data + ');"><i class="fas fa-pencil-alt"></i></a>' +
                '<a href="#" class="btn btn-xs btn-danger" data-toggle="tooltip" onclick="deleteCategory(' + data + ');"><i class="fas fa-trash"></i></a>';
            }
        },
        ]
    });
});

function addPermission($id){
    $("#modal-permission").modal('show');
    $('#role_id').val($id);       
}

$('#permission_add').on('submit', function(e){
    e.preventDefault();
    var formData = new FormData($(this)[0]);
    $.ajax({
        url: '/role/permission',
        data: formData,
        type: 'post',
        contentType: false,
        processData: false,
        success: function (data) {
            $('#modal-permission').modal('hide');
            $('#roles-table').DataTable().ajax.reload();
            swal(data.message, {
                icon: "success",
            });                       
        },
        error: function (error) {
            toastr.error(error.message);
        }
    });
});
