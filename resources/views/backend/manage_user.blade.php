@extends('backend.layouts.main')

@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/user.css') }}">
@endsection

@section('content')
<div>
    <div>
        <a class="btn btn-primary" data-toggle="modal" href='#modal-add'>{{ __('trans.Add user') }}</a><br><br>
        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="users-table" style="width:100%">
            <thead>
                <tr>
                    <th class="stl-column color-column">{{ __('trans.Acction') }}</th>
                    <th class="stl-column color-column">{{ __('trans.Account') }}</th> 
                    <th class="stl-column color-column">{{ __('trans.Name') }}</th> 
                    <th class="stl-column color-column">{{ __('trans.Email') }}</th>              
                    <th class="stl-column color-column">{{ __('trans.Avatar') }}</th> 
                    <th class="stl-column color-column">{{ __('trans.Role') }}</th>              
                    <th class="stl-column color-column">{{ __('trans.Exp') }}</th>              
                    <th class="stl-column color-column">{{ __('trans.Point') }}</th>              
                    <th class="stl-column color-column">{{ __('trans.Deactive/active') }}</th>
                    <th class="stl-column color-column">{{ __('trans.Date create') }}</th>
                </tr>
            </thead>
        </table>
    </div>

    <div class="modal fade" id="modal-add">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form method="POST" action="" id="user_add" role="form" data-toggle="validator"enctype="multipart/form-data">
                        <div class="modal-body">
                            <h2 style="text-align: center;">{{ __('trans.Add user') }}</h2>
                            @csrf
                            <br>
                            <div id="prod-error-add" class="text-center">
                            </div>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <img class="width150" id="avatar_show_add" src="{{ asset(config('assets.avatar_default')) }}">
                                            <label for="avatar">{{ __('trans.Select image') }}</label>
                                            <div style="display: none">
                                                <input type="file" id="avatar" name="avatar"/>
                                            </div>
                                        </div>
                                        <div class="form-group">                                
                                            <label> {{ __('trans.Role') }} </label><br>
                                            <select name="role" class="form-control" >
                                                @foreach ($roles as $role)
                                                    <option value="{{$role->id}}">{{$role->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div id="form-step-0" role="form" data-toggle="validator">
                                            <div class="form-group">
                                                <label for="">{{ __('trans.Account') }}<span class="clred"> (*) </span></label>
                                                <input type="text" class="form-control" name="username" id="username_add" placeholder="Tài khoản đăng nhập" required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">{{ __('trans.Name') }}<span class="clred"> (*) </span></label>
                                                <input type="text" class="form-control" name="fullname" id="fullname_add" placeholder="Họ và tên" required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">{{ __('trans.Email') }}<span class="clred"> (*) </span></label>
                                                <input type="email" class="form-control" name="email" id="email_add" placeholder="Email" required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">{{ __('trans.Password') }}<span class="clred"> (*) </span></label>
                                                <input type="password" class="form-control" name="password1_add" id="password1_add" required>
                                                        <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">{{ __('trans.Password confirm') }}<span class="clred"> (*) </span></label>
                                                <input type="password" class="form-control" name="password2_add" id="password2_add" required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>          
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">{{ __('trans.Save') }}</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('trans.Close') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form method="POST" action="" id="user_edit" role="form" data-toggle="validator"enctype="multipart/form-data">
                        <div class="modal-body">
                            <h2 style="text-align: center;">{{ __('trans.Edit user') }}</h2>
                            @csrf
                            <br>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <img width="150px" id="avatar_show_edit" src="{{ asset(config('assets.avatar_default')) }}">
                                            <label for="avatar">{{ __('trans.Select image') }}</label>
                                            <div style="display: none">
                                                <input type="file" id="avatar_edit" name="avatar"/>
                                            </div>
                                            <input type="hidden" id="id_edit" name="id"/>
                                        </div>
                                        <div class="form-group">                                
                                            <label> {{ __('trans.Role') }} </label><br>
                                            <select name="role" class="form-control" >
                                                @foreach ($roles as $role)
                                                    <option value="{{$role->id}}">{{$role->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div id="form-step-0" role="form" data-toggle="validator">
                                            <div class="form-group">
                                                <label for="">{{ __('trans.Account') }}<span class="clred"> (*) </span></label>
                                                <input type="text" class="form-control" name="username" id="username_edit" placeholder="Tài khoản đăng nhập" readonly>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">{{ __('trans.Name') }}<span class="clred"> (*) </span></label>
                                                <input type="text" class="form-control" name="fullname" id="fullname_edit" placeholder="Họ và tên" required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">{{ __('trans.Email') }}<span class="clred"> (*) </span></label>
                                                <input type="email" class="form-control" name="email" id="email_edit" placeholder="Email" readonly>
                                                <div class="help-block with-errors"></div>
                                            </div> 
                                        </div>
                                    </div>          
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">{{ __('trans.Save') }}</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('trans.Close') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script type="text/javascript">
    // upload image
    $('#avatar_show_add').on('click',function(){
        $('#avatar').click();
    })
    // hien thi anh
    $('#avatar').change(function () {
        if ($(this).val() != '') {
            var reader = new FileReader();
            reader.onload = function (e){
                $('#avatar_show_add').attr('src', e.target.result);             
            }
            reader.readAsDataURL(this.files[0]);
        }
    })

    // upload image edit
    $('#avatar_show_edit').on('click',function(){
        $('#avatar_edit').click();
    })
    $('#avatar_edit').change(function () {
        if ($(this).val() != '') {
            var reader = new FileReader();
            reader.onload = function (e){
                $('#avatar_show_edit').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    })

    $(function() {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ordering: false,
            ajax: {
                url:'/user/getlist',
            },
            columns: [
                { data: 'action', name: 'action' },
                { data: 'username', name: 'username' },
                { data: 'fullname', name: 'fullname' },
                { data: 'email', name: 'email' },
                { data: 'avatar', name: 'avatar' },
                { data: 'role', name: 'role' },
                { data: 'exp', name: 'exp' },
                { data: 'point', name: 'point' },
                { data: 'status', name: 'status' },
                { data: 'created_at', name: 'created_at' },
            ]
        });
    });

    function updateStatus(id) {
        $.ajax({
            url: '/user/status/' + id,
            success: function(res) {
                if (!res.error) {
                    toastr.success(res.message);
                    $('#users-table').DataTable().ajax.reload();
                }
                else {
                    toastr.error(res.message);
                }
            }
        });
    }

    function deleteUser($id){
    	swal({
		  	title: 'Bạn có chắc muốn xóa ?',
		  	type: 'warning',
		  	showCancelButton: true,
		  	confirmButtonColor: '#3085d6',
		  	cancelButtonColor: '#d33',
		  	confirmButtonText: '@lang('trans.Yes')'
		}).then((result) => {
		 if (result.value) {
		    $.ajax({
                    type: 'get',
                    url: '/user/delete/' + $id,
                    success: function(res) {
                        swal("@lang('trans.Delete success')", {
                            icon: "success",
                        });
                        $('#users-table').DataTable().ajax.reload();
                    }
                });
		    }
		})
    }

    $('#user_add').on('submit',function(e){
        e.preventDefault();
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: "/user/store", 
            data: formData,
            type: 'post',
            contentType: false,
            processData: false,
            success: function (data) {
                $('#modal-add').modal('hide');
                $('#users-table').DataTable().ajax.reload();
                swal( data.mesage , {
                    icon: "success",
                });                     
            },
            error: function (data) {
                jQuery.each(data.responseJSON.errors, function(key, value){
                    toastr.error(value) 
                }); 
            }
        })
    });

    function edit($id){
        $("#modal-edit").modal('show');
        $.ajax({
            type: 'get',
            url: '/user/' + $id + '/edit',
            success: function(response) {
                console.log(response);
                $('#id_edit').val(response.id);
                $('#fullname_edit').val(response.fullname);
                $('#email_edit').val(response.email);
                $('#username_edit').val(response.username);
                $('#role_edit').val(response.role);
                if (response.avatar != null){
                    $('#avatar_show_edit').attr('src', '{{ asset(config('assets.storage')) }}' + response.avatar);
                }                  
            }       
        });         
    }

    $('#user_edit').on('submit',function(e){
        e.preventDefault();
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: "/user/update", 
            data: formData,
            type: 'post',
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.error) {
                    jQuery.each(data.message, function(key, value){
                        toastr.error(value) 
                    }); 
                }
                else {
                    $('#modal-edit').modal('hide');
                    $('#users-table').DataTable().ajax.reload();
                    swal( data.mesage , {
                        icon: "success",
                    });                     
                }
            },
            error: function (error) {
                toastr.error(error.message);
            }
        });
    });
</script>
@endsection
