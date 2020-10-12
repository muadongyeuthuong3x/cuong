$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function() {
    $('.edit').click(function() {
        $('.error').hide();
        let id = $(this).data('id');
        //Edit
        $.ajax({
            url: 'them-hang-san-pham/' + id + '/edit',
            dataType: 'json',
            type: 'get',
            success: function($result) {
                $('.name').val($result.tenhang);
            }
        });
        $('.update').click(function() {
            let tenhang = $('.name').val();
            $('.error').hide();
            $.ajax({
                url: 'them-hang-san-pham/' + id,
                dataType: 'json',
                type: 'PUT',
                data: {
                    tenhang: tenhang,
                    id: id
                },
                success: function($result) {
                    toastr.success($result.success, 'Thông báo', {
                        timeOut: 5000
                    });
                    $('#edit').modal('hide');
                    location.reload();
                },
                error: function(error) {
                    var errors = JSON.parse(error.responseText);
                    $('.error').show();
                    $('.error').text(errors.errors.tenhang);
                }
            });

        })
    })

    $('.delete').click(function() {
        let id = $(this).data('id');
        $('.delete1').click(function() {
            $.ajax({
                url: 'them-hang-san-pham/' + id,
                dataType: 'json',
                type: 'delete',
                success: function($result) {
                    toastr.success($result.success, 'Thông báo', {
                        timeOut: 5000
                    });
                    $('#delete').modal('hide');
                    location.reload();
                }
            });
        });
    });

    $('.editmucsp').click(function() {
        $('.errormucsp').hide();
        $('.errorhangsp').hide();
        let id = $(this).data('id');
        //Edit
        $.ajax({
            url: 'them-ten-muc-san-pham/' + id + '/edit',
            dataType: 'json',
            type: 'get',
            success: function($result) {
                let html = '';
                $('.tenmucsp').val($result['mucsps']['tenmucsp']);
                $.each($result['hangsp'], function($key, $value) {
                    if ($result['mucsps']['id_hangsp'] == $value['id']) {
                        html += '<option value = ' + $value['id'] + ' selected >';
                        html += $value['tenhang'];
                        html += '</option>';
                    } else {
                        html += '<option value =' + $value['id'] + '>';
                        html += $value['tenhang'];
                        html += '</option>';
                    }
                });
                $('.hangsp').html(html);

            }
        });
        //update
        $('.updatemucsp').click(function() {
            let tenmucsp = $('.tenmucsp').val();
            let id_hangsp = $('.hangsp').val();
            $('.errormucsp').hide();
            $('.errorhangsp').hide();
            $.ajax({
                url: 'them-ten-muc-san-pham/' + id,
                dataType: 'json',
                type: 'PUT',
                data: {
                    tenmucsp: tenmucsp,
                    id_hangsp: id_hangsp,
                    id: id
                },
                success: function($result) {
                    toastr.success($result.success, 'Thông báo', {
                        timeOut: 5000
                    });
                    $('#edit').modal('hide');
                    location.reload();
                },
                error: function(error) {
                    var errors = JSON.parse(error.responseText);

                    if (errors.errors.tenmucsp !== '') {
                        $('.errormucsp').show();
                        $('.errormucsp').text(errors.errors.tenmucsp);
                    }
                    if (errors.errors.id_hangsp !== '') {
                        $('.errorhangsp').show();
                        $('.errorhangsp').text(errors.errors.id_hang);
                    }

                }
            });

        })
    })

    $('.deletemucsp').click(function() {
        let id = $(this).data('id');
        $('.delete1').click(function() {
            $.ajax({
                url: '/admin/them-ten-muc-san-pham/'+ id,
                dataType: 'json',
                type: 'delete',
                success: function($result) {
                    toastr.success($result.success, 'Thông báo', {
                        timeOut: 5000
                    });
                    $('#delete').modal('hide');
                    location.reload();
                }
            });
        });
    });

    // $(".edittensp").click(function() {
    //     var id = $(this).data('id');
    //     $.ajax({
    //         url: 'ten-san-pham/' + id + '/edit',
    //         dataType: 'json',
    //         type: 'get',
    //         success: function($result) {

    //             $('.tensp1').val($result.tensp.tensp);
    //             $('.ngaysphh1').val($result.tensp.ngayhethan);
    //             $('.gianhap1').val($result.tensp.price_nhap);
    //             $('.giaban1').val($result.tensp.price_ban);
    //             $('.idTensp').val($result.tensp.id);
    //             if ($result.tensp.status == 1) {
    //                 $('.ht').attr('selected', 'selected');
    //             } else {
    //                 $('.kht').attr('selected', 'selected');
    //             }
    //             CKEDITOR.instances['editor1'].setData($result.tensp.description);

    //             $('.image1').attr('src', '/PictureSp/' + $result.tensp.image);
    //             var html1 = ' ';
    //             var id_cantim = ' ';
    //             $.each($result.mucsps, function(key, value) {
    //                 if ($result.tensp.id_mucsp == value['id']) {
    //                     id_cantim = value['id_hangsp'];
    //                     html1 += '<option value="' + value['id'] + '" selected>';
    //                     html1 += value['tenmucsp'];
    //                     html1 += '</option>';
    //                 } else {
    //                     html1 += '<option value="' + value['id'] + '">';
    //                     html1 += value['tenmucsp'];
    //                     html1 += '</option>';
    //                 }
    //             });


    //             $('.mucsp').html(html1);
    //             var html = '';
    //             $.each($result.hangsps, function(key, value) {
    //                 if (id_cantim == value['id']) {
    //                     html += '<option value="' + value['id'] + '" selected>';
    //                     html += value['tenhang'];
    //                     html += '</option>';
    //                 } else {
    //                     html += '<option value="' + value['id'] + '">';
    //                     html += value['tenhang'];
    //                     html += '</option>';
    //                 }
    //             });

    //             $('.hangsp').html(html);

    //         }
    //     })



    //     $('#upload_form').on('submit', function(event) {
    //         event.preventDefault();
    //         $.ajaxSetup({
    //                url: '/admin/updatesp12/'+id,
    //           });
    //         $.ajax({
    //             data : new FormData(this),
	// 			contentType : false, //mặc định là text nên cần false để gửi ảnh
	// 			processData : false, // chặn tiến trình gửi dữ liệu
	// 			cache : false,
    //             type : 'post',
    //             success: function($result) {


    //             },
    //             error: function(error) {

    //             }
    //         })
    //     })

    // })

    $('.deletetensp').click(function(){
        let id = $(this).data('id');
        $('.deletetensp1').click(function() {
            $.ajax({
                url: 'ten-san-pham/' + id,
                dataType: 'json',
                type: 'delete',
                success: function($result) {
                    toastr.success($result.success, 'Thông báo', {
                        timeOut: 5000
                    });
                    $(".suasanpham").hide();
                    location.reload();
                }
            });
        });
    })

    $('.edituser').click(function() {
        $('.error').hide();
        let id = $(this).data('id');
        console.log(id);
        //Edit
        $.ajax({
            url: 'them-user-admin/'+id +'/edit',
            dataType: 'json',
            type: 'get',
            success: function($result) {
                console.log($result);
                $('.name').val($result.user['name']);
                $('.email').val($result.user['email']);

                var roles_id = [];
                var roles_quyenuser = [];
                $.each($result.roles, function(key, value) {
                    roles_id[key] = value['id'];
                })

                $.each($result.quyenuser, function(key, value) {
                    roles_quyenuser[key] = value['role_id'];
                })

                var html = '';

                $.each(roles_id, function(key, value) {
                    var tontai = roles_quyenuser.indexOf(value);

                    if (tontai >-1) {
                        html += '<option value='+ $result.roles[key]['id'] +'  selected >';
                        html += $result.roles[key]['name'];

                        html += '</option>';
                    } else {


                        html += '<option value="' + $result.roles[key]['id'] + '" >';
                        html += $result.roles[key]['name'];
                        html += '</option>';
                    }

                })
                console.log(html);

                $('#hh').html(html);

            }


        });
        $('.updateuser').click(function() {
            let name = $('.name').val();
            let email = $('.email').val();
            let role_user = $('#hh').val();
            console.log(role_user);
            $('.error').hide();
            $.ajax({
                url: 'them-user-admin/' + id,
                dataType: 'json',
                type: 'PUT',
                data: {
                    name: name,
                    email: email,
                     role_user: role_user,
                    id: id
                },
                success: function($result) {
                    toastr.success($result.success, 'Thông báo', {
                        timeOut: 5000
                    });
                    $('#edituser').modal('hide');
                    location.reload();
                },
                error: function(error) {
                    var errors = JSON.parse(error.responseText);
                    console.log(errors);
                    if (errors.errors.name !== '') {
                        $('.error').show();
                        $('.error').text(errors.errors.name);
                    }
                    if (errors.errors.email !== '') {
                        $('.error').show();
                        $('.error').text(errors.errors.email);

                    }
                }
            });

        })
    })


    $('.delete').click(function() {
        let id = $(this).data('id');
        $('.deleteuser1').click(function() {
            $.ajax({
                url: 'them-user-admin/' + id,
                dataType: 'json',
                type: 'delete',
                success: function($result) {
                    toastr.success($result.success, 'Thông báo', {
                        timeOut: 5000
                    });
                    $('#delete').modal('hide');
                    location.reload();
                }
            });
        });
    });



    $('.deletequyen').click(function() {
        let id = $(this).data('id');

        $('.deletenhomquyen').click(function() {
            $.ajax({
                url: '/admin/xoanhomquyen/'+id,
                dataType: 'json',
                type: 'delete',

                success: function($result) {
                    toastr.success($result.success, 'Thông báo', {
                        timeOut: 5000
                    });
                    $('#delete').modal('hide');
                    location.reload();
                }
            });
        });
    });

    $('.showsp').click(function() {
        var id = $(this).data('id');
        console.log(id);
        $.ajax({
            url: '/admin/xuatsp/'+id,
            dataType: 'json',
            'type': 'get',
            success: function($result) {
               console.log($result);
               var quantys=[];
               $.each($result['sanphammua'],function(key,value){
                   quantys[key] = value['quanty'];
               })

               var html = '';
               var link ='';

               link += '<a href="/admin/donhang/'+id+'">';
               link +='Xuất đơn hàng1';
               link +='</a>';
               $('.addlink').html(link);
               $.each($result['mathang'],function(key,value){
               html +='<tr>';
               html +='<td>';
               html +=key;
               html +='</td>';
               html +='<td>';
               html += value[0]['tensp'];
               html +='</td>';
               html +='<td>';
               html += value[0]['price_ban'];
               html +='</td>';
               html +='<td>';
               html += quantys[key];
               html +='</td>';
               html +='<td>';
               html += '<img src="/PictureSp/'+value[0]['image']+' " style="width:150px; height:150px;">';
               html +='</td>';
               html +='<td>';
               html += value[0]['price_ban']*quantys[key];
               html +='</td>';



               html +='</tr>';
               })

               $('.xuat').html(html);

            }
        })
    });

})
