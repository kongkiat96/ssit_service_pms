$(document).ready(function () {
    $('#example').DataTable({
        dom: "Bfrtip",
        searching: !1,
        buttons: [{
            extend: 'collection',
            className: 'btn btn-label-primary dropdown-toggle me-2 mb-2',
            text: '<i class="bx bx-download me-sm-2"></i> <span class="d-none d-sm-inline-block">Export</span>',
            buttons: [
                {
                    extend: 'excelHtml5',
                    text: '<i class="bx bx-file me-2" ></i>Excel',
                    autoFilter: !0,
                    className: 'dropdown-item',
                    sheetName: "Exported data",

                }
            ]
        },],
    });
});



jQuery(document).ready(function () {
    jQuery('#responsive-data-table-1').DataTable({
        "aLengthMenu": [
            [20, 30, 50, 75, -1],
            [20, 30, 50, 75, "All"]
        ],
        // "order": [
        //     [3, "desc"]
        // ],
        "pageLength": 20,
        "bLengthChange": true,
        "dom": '<"justify-content-between top-information"lf>rt<"justify-content-between bottom-information"ip><"clear">',
        "language": {
            "lengthMenu": "แสดงข้อมูล  _MENU_  จำนวน",
            "zeroRecords": "ไม่พบข้อมูลในตาราง",
            "info": "แสดงข้อมูลหน้า  _PAGE_ ถึง _PAGES_ (จำนวน _TOTAL_ ข้อมูล)",
            "infoEmpty": "ไม่พบข้อมูลที่ค้นหา",
            "infoFiltered": "(จากการค้นหาของ _MAX_ ข้อมูล ในตารางนี้)",
            "sSearch": "ค้นหาข้อมูล"
        }
    });
    jQuery('#responsive-data-table-2').DataTable({
        "aLengthMenu": [
            [20, 30, 50, 75, -1],
            [20, 30, 50, 75, "All"]
        ],
        "order": [
            [0, "desc"]
        ],
        "pageLength": 20,
        "bLengthChange": true,
        "dom": '<"justify-content-between top-information"lf>rt<"justify-content-between bottom-information"ip><"clear">',
        "language": {
            "lengthMenu": "แสดงข้อมูล  _MENU_  จำนวน",
            "zeroRecords": "ไม่พบข้อมูลในตาราง",
            "info": "แสดงข้อมูลหน้า  _PAGE_ ถึง _PAGES_ (จำนวน _TOTAL_ ข้อมูล)",
            "infoEmpty": "ไม่พบข้อมูลที่ค้นหา",
            "infoFiltered": "(จากการค้นหาของ _MAX_ ข้อมูล ในตารางนี้)",
            "sSearch": "ค้นหาข้อมูล"
        }
    });
    jQuery('#responsive-data-table-it').DataTable({
        "aLengthMenu": [
            [20, 30, 50, 75, -1],
            [20, 30, 50, 75, "All"]
        ],
        "order": [
            [0, "desc"]
        ],
        "pageLength": 20,
        "bLengthChange": true,
        "dom": '<"justify-content-between top-information"lf>rt<"justify-content-between bottom-information"ip><"clear">',
        "language": {
            "lengthMenu": "แสดงข้อมูล  _MENU_  จำนวน",
            "zeroRecords": "ไม่พบข้อมูลในตาราง",
            "info": "แสดงข้อมูลหน้า  _PAGE_ ถึง _PAGES_ (จำนวน _TOTAL_ ข้อมูล)",
            "infoEmpty": "ไม่พบข้อมูลที่ค้นหา",
            "infoFiltered": "(จากการค้นหาของ _MAX_ ข้อมูล ในตารางนี้)",
            "sSearch": "ค้นหาข้อมูล"
        }
    });
    jQuery('#responsive-data-table-building').DataTable({
        "aLengthMenu": [
            [20, 30, 50, 75, -1],
            [20, 30, 50, 75, "All"]
        ],
        "order": [
            [0, "desc"]
        ],
        "pageLength": 20,
        "bLengthChange": true,
        "dom": '<"justify-content-between top-information"lf>rt<"justify-content-between bottom-information"ip><"clear">',
        "language": {
            "lengthMenu": "แสดงข้อมูล  _MENU_  จำนวน",
            "zeroRecords": "ไม่พบข้อมูลในตาราง",
            "info": "แสดงข้อมูลหน้า  _PAGE_ ถึง _PAGES_ (จำนวน _TOTAL_ ข้อมูล)",
            "infoEmpty": "ไม่พบข้อมูลที่ค้นหา",
            "infoFiltered": "(จากการค้นหาของ _MAX_ ข้อมูล ในตารางนี้)",
            "sSearch": "ค้นหาข้อมูล"
        }
    });
    jQuery('#responsive-data-table-employee').DataTable({
        "aLengthMenu": [
            [20, 30, 50, 75, -1],
            [20, 30, 50, 75, "All"]
        ],
        "order": [
            [0, "asc",]
        ],
        "pageLength": 20,
        "bLengthChange": true,
        "dom": '<"justify-content-between top-information"lf>rt<"justify-content-between bottom-information"ip><"clear">',
        "language": {
            "lengthMenu": "แสดงข้อมูล  _MENU_  จำนวน",
            "zeroRecords": "ไม่พบข้อมูลในตาราง",
            "info": "แสดงข้อมูลหน้า  _PAGE_ ถึง _PAGES_ (จำนวน _TOTAL_ ข้อมูล)",
            "infoEmpty": "ไม่พบข้อมูลที่ค้นหา",
            "infoFiltered": "(จากการค้นหาของ _MAX_ ข้อมูล ในตารางนี้)",
            "sSearch": "ค้นหาข้อมูล"
        }
    });
});

function reloadPage() {
    window.location.reload();
}

// Form Ajax get value --------------------------
function getroomList(val) {
    $.ajax({
        type: "POST",
        url: "getvalue/getroom.php",
        data: 'se_group=' + val,
        success: function (data) {
            $("#se_id").html(data);
        }
    });
}

function getroomList_edit(val) {
    $.ajax({
        type: "POST",
        url: "getvalue/getroom_edit.php",
        data: 'se_group_edit=' + val,
        success: function (data) {
            $("#se_id_edit").html(data);
        }
    });
}

function getroomListcheck(val) {
    $.ajax({
        type: "POST",
        url: "getvalue/getroom_check.php",
        data: 'building=' + val,
        success: function (data) {
            $("#floor").html(data);
        }
    });
}

function getroomListcheckroom(val) {
    $.ajax({
        type: "POST",
        url: "getvalue/getroom_check_room.php",
        data: 'floor=' + val,
        success: function (data) {
            $("#room").html(data);
        }
    });
}

function getroomListcheck_edit(val) {
    $.ajax({
        type: "POST",
        url: "getvalue/getroom_check_edit.php",
        data: 'building=' + val,
        success: function (data) {
            $("#floor").html(data);
        }
    });
}

function getroomListcheckroom_edit(val) {
    $.ajax({
        type: "POST",
        url: "getvalue/getroom_check_room_edit.php",
        data: 'floor=' + val,
        success: function (data) {
            $("#room").html(data);
        }
    });
}

function getPosition(t) {
    $.ajax({
        type: "POST",
        url: "core/getPosition.php",
        data: "em_key=" + t,
        success: function (t) {
            $("#position").html(t);
        },
    });
    $.ajax({
        type: "POST",
        url: "core/getDepartment.php",
        data: "em_key=" + t,
        success: function (t) {
            $("#department").html(t);
        },
    });
}

$(function () {
    $("#timeline_work").on("show.bs.modal", function (t) {
        var e = $(t.relatedTarget).data("whatever"),
            n = $(this),
            o = "key=" + e;
        $.ajax({
            type: "GET",
            url: "layout/user/timeline_work.php",
            data: o,
            cache: !1,
            success: function (t) {
                n.find(".timeline_work").html(t);
            },
            error: function (t) {
                console.log(t);
            },
        });
    });

    $("#viewonly").on("show.bs.modal", function (t) {
        var e = $(t.relatedTarget).data("whatever"),
            n = $(this),
            o = "key=" + e;
        $.ajax({
            type: "GET",
            url: "service/viewonly.php",
            data: o,
            cache: !1,
            success: function (t) {
                n.find(".viewonly").html(t);
            },
            error: function (t) {
                console.log(t);
            },
        });
    });

    $('#edit_service').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var modal = $(this);
        var dataString = 'key=' + recipient;

        $.ajax({
            type: "GET",
            url: "settings/edit/edit_service.php",
            data: dataString,
            cache: false,
            success: function (data) {
                modal.find('.edit_service').html(data);
            },
            error: function (err) {
                console.log(err);
            }
        });
    })

    $('#edit_service_list').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var modal = $(this);
        var dataString = 'key=' + recipient;

        $.ajax({
            type: "GET",
            url: "settings/edit/edit_service_list.php",
            data: dataString,
            cache: false,
            success: function (data) {
                modal.find('.edit_service_list').html(data);
            },
            error: function (err) {
                console.log(err);
            }
        });
    })




    $("#viewonly_user").on("show.bs.modal", function (t) {
        var e = $(t.relatedTarget).data("whatever"),
            n = $(this),
            o = "key=" + e;
        $.ajax({
            type: "GET",
            url: "layout/user/viewonly_user.php",
            data: o,
            cache: !1,
            success: function (t) {
                n.find(".viewonly_user").html(t);
            },
            error: function (t) {
                console.log(t);
            },
        });
    });

    $("#sentrate").on("show.bs.modal", function (t) {
        var e = $(t.relatedTarget).data("whatever"),
            n = $(this),
            o = "key=" + e;
        $.ajax({
            type: "GET",
            url: "layout/user/sentrate.php",
            data: o,
            cache: !1,
            success: function (t) {
                n.find(".sentrate").html(t);
            },
            error: function (t) {
                console.log(t);
            },
        });
    });

    $('#showguest').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var modal = $(this);
        var dataString = 'key=' + recipient;

        $.ajax({
            type: "GET",
            url: "layout/listroom/getviewdata.php",
            data: dataString,
            cache: false,
            success: function (data) {
                modal.find('.showguest').html(data);
            },
            error: function (err) {
                console.log(err);
            }
        });
    })

    $('#showguest_foradmin').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var modal = $(this);
        var dataString = 'key=' + recipient;

        $.ajax({
            type: "GET",
            url: "modal/getviewdata.php",
            data: dataString,
            cache: false,
            success: function (data) {
                modal.find('.showguest_foradmin').html(data);
            },
            error: function (err) {
                console.log(err);
            }
        });
    })

    // Folder guest -------------
    $('#edit_guest').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var modal = $(this);
        var dataString = 'key=' + recipient;
        $.ajax({
            type: "GET",
            url: "guest/edit/edit_guest.php",
            data: dataString,
            cache: false,
            success: function (data) {
                modal.find('.guest').html(data); // Find div form
            },
            error: function (err) {
                console.log(err);
            }
        });
    })

    $('#edit_guest_pic').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var modal = $(this);
        var dataString = 'key=' + recipient;
        $.ajax({
            type: "GET",
            url: "guest/edit/edit_guest_pic.php",
            data: dataString,
            cache: false,
            success: function (data) {
                modal.find('.pic').html(data); // Find div form
            },
            error: function (err) {
                console.log(err);
            }
        });
    })

    $('#edit_guest_room').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var modal = $(this);
        var dataString = 'key=' + recipient;
        $.ajax({
            type: "GET",
            url: "guest/edit/edit_guest_room.php",
            data: dataString,
            cache: false,
            success: function (data) {
                modal.find('.room').html(data); // Find div form
            },
            error: function (err) {
                console.log(err);
            }
        });
    })

    $('#edit_guest_list').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var modal = $(this);
        var dataString = 'key=' + recipient;

        $.ajax({
            type: "GET",
            url: "guest/edit/edit_guest_list.php",
            data: dataString,
            cache: false,
            success: function (data) {
                modal.find('.guest_list').html(data);
            },
            error: function (err) {
                console.log(err);
            }
        });
    });

    $('#edit_guest_list_pic').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var modal = $(this);
        var dataString = 'key=' + recipient;
        $.ajax({
            type: "GET",
            url: "guest/edit/edit_guest_list_pic.php",
            data: dataString,
            cache: false,
            success: function (data) {
                modal.find('.list_pic').html(data); // Find div form
            },
            error: function (err) {
                console.log(err);
            }
        });
    })

    // สำหรับเจ้าหน้าที่
    $("#getwork").on("show.bs.modal", function (t) {
        var e = $(t.relatedTarget).data("whatever"),
            n = $(this),
            o = "key=" + e;
        $.ajax({
            type: "GET",
            url: "service/getwork.php",
            data: o,
            cache: !1,
            success: function (t) {
                n.find(".getwork").html(t);
            },
            error: function (t) {
                console.log(t);
            },
        });
    });

    $("#assignwork").on("show.bs.modal", function (t) {
        var e = $(t.relatedTarget).data("whatever"),
            n = $(this),
            o = "key=" + e;
        $.ajax({
            type: "GET",
            url: "service/assignwork.php",
            data: o,
            cache: !1,
            success: function (t) {
                n.find(".assignwork").html(t);
            },
            error: function (t) {
                console.log(t);
            },
        });
    });

    $("#timeline_work_admin").on("show.bs.modal", function (t) {
        var e = $(t.relatedTarget).data("whatever"),
            n = $(this),
            o = "key=" + e;
        $.ajax({
            type: "GET",
            url: "../layout/user/timeline_work.php",
            data: o,
            cache: !1,
            success: function (t) {
                n.find(".timeline_work_admin").html(t);
            },
            error: function (t) {
                console.log(t);
            },
        });
    });

    // Folder Membres -------------------------------
    $('#edit_employee').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var modal = $(this);
        var dataString = 'key=' + recipient;

        $.ajax({
            type: "GET",
            url: "employee/edit/edit_employee.php",
            data: dataString,
            cache: false,
            success: function (data) {
                modal.find('.employee').html(data);
            },
            error: function (err) {
                console.log(err);
            }
        });
    });

    $("#edit_prefix").on("show.bs.modal", function (t) {
        var e = $(t.relatedTarget).data("whatever"),
            n = $(this),
            o = "key=" + e;
        $.ajax({
            type: "GET",
            url: "settings/edit/edit_prefix.php",
            data: o,
            cache: !1,
            success: function (t) {
                n.find(".edit_prefix").html(t);
            },
            error: function (t) {
                console.log(t);
            },
        });
    });

    $("#edit_department").on("show.bs.modal", function (t) {
        var e = $(t.relatedTarget).data("whatever"),
            n = $(this),
            o = "key=" + e;
        $.ajax({
            type: "GET",
            url: "settings/edit/edit_department.php",
            data: o,
            cache: !1,
            success: function (t) {
                n.find(".edit_department").html(t);
            },
            error: function (t) {
                console.log(t);
            },
        });
    });

    $("#edit_company").on("show.bs.modal", function (t) {
        var e = $(t.relatedTarget).data("whatever"),
            n = $(this),
            o = "key=" + e;
        $.ajax({
            type: "GET",
            url: "settings/edit/edit_company.php",
            data: o,
            cache: !1,
            success: function (t) {
                n.find(".edit_company").html(t);
            },
            error: function (t) {
                console.log(t);
            },
        });
    });

    $("#edit_location").on("show.bs.modal", function (t) {
        var e = $(t.relatedTarget).data("whatever"),
            n = $(this),
            o = "key=" + e;
        $.ajax({
            type: "GET",
            url: "settings/edit/edit_location.php",
            data: o,
            cache: !1,
            success: function (t) {
                n.find(".edit_location").html(t);
            },
            error: function (t) {
                console.log(t);
            },
        });
    });

    $("#edit_user").on("show.bs.modal", function (t) {
        var e = $(t.relatedTarget).data("whatever"),
            n = $(this),
            o = "key=" + e;
        $.ajax({
            type: "GET",
            url: "settings/edit/edit_user.php",
            data: o,
            cache: !1,
            success: function (t) {
                n.find(".edit_user").html(t);
            },
            error: function (t) {
                console.log(t);
            },
        });
    });

    $("#access").on("show.bs.modal", function (t) {
        var e = $(t.relatedTarget).data("whatever"),
            n = $(this),
            o = "key=" + e;
        $.ajax({
            type: "GET",
            url: "settings/edit/access.php",
            data: o,
            cache: !1,
            success: function (t) {
                n.find(".access").html(t);
            },
            error: function (t) {
                console.log(t);
            },
        });
    });

    $("#edit_status").on("show.bs.modal", function (t) {
        var e = $(t.relatedTarget).data("whatever"),
            n = $(this),
            o = "key=" + e;
        $.ajax({
            type: "GET",
            url: "settings/edit/edit_status.php",
            data: o,
            cache: !1,
            success: function (t) {
                n.find(".edit_status").html(t);
            },
            error: function (t) {
                console.log(t);
            },
        });
    });

    $("#showaccess_user").on("show.bs.modal", function (t) {
        var e = $(t.relatedTarget).data("whatever"),
            n = $(this),
            o = "key=" + e;
        $.ajax({
            type: "GET",
            url: "administrator/view/view_access.php",
            data: o,
            cache: !1,
            success: function (t) {
                n.find(".showaccess_user").html(t);
            },
            error: function (t) {
                console.log(t);
            },
        });
    });

    $("#edit_menu").on("show.bs.modal", function (t) {
        var e = $(t.relatedTarget).data("whatever"),
            n = $(this),
            o = "key=" + e;
        $.ajax({
            type: "GET",
            url: "administrator/edit/edit_menu.php",
            data: o,
            cache: !1,
            success: function (t) {
                n.find(".edit_menu").html(t);
            },
            error: function (t) {
                console.log(t);
            },
        });
    });

    $("#edit_page").on("show.bs.modal", function (t) {
        var e = $(t.relatedTarget).data("whatever"),
            n = $(this),
            o = "key=" + e;
        $.ajax({
            type: "GET",
            url: "administrator/edit/edit_page.php",
            data: o,
            cache: !1,
            success: function (t) {
                n.find(".edit_page").html(t);
            },
            error: function (t) {
                console.log(t);
            },
        });
    });

})

function deleteEmployee(em_key) {
    Swal.fire({
        title: 'ต้องการลบข้อมูลนี้ใช่หรือไม่',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ยืนยันการลบ',
        cancelButtonText: 'ยกเลิก'
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: "Deleted !!!",
                html: "<h4>กำลังลบข้อมูล...</h4>",
                showConfirmButton: false
            })
            window.location = "function.php?type=delete_employee&key=" + em_key;
        }
    })
}

function deletework(t) {
    Swal.fire({ title: "คุณต้องการลบงานใช่หรือไม่", icon: "warning", showCancelButton: !0, confirmButtonColor: "#3085d6", cancelButtonColor: "#d33", confirmButtonText: "ยืนยันการลบ", cancelButtonText: "ยกเลิก" }).then((e) => {
        e.value && (Swal.fire({ title: "Deleted !!!", html: "<h4>กำลังลบข้อมูล...</h4>", showConfirmButton: !1 }), (window.location = "function.php?type=delete_work&key=" + t));
    });
}

function deletemployee(t) {
    Swal.fire({ title: "คุณต้องการลบข้อมูลใช่หรือไม่", icon: "warning", showCancelButton: !0, confirmButtonColor: "#3085d6", cancelButtonColor: "#d33", confirmButtonText: "ยืนยันการลบ", cancelButtonText: "ยกเลิก" }).then((e) => {
        e.value && (Swal.fire({ title: "Deleted !!!", html: "<h4>กำลังลบข้อมูล...</h4>", showConfirmButton: !1 }), (window.location = "function.php?type=delete_employee&key=" + t));
    });
}

function deletePrefix(t) {
    Swal.fire({ title: "คุณต้องการลบคำนำหน้านามนี้ใช่หรือไม่", icon: "warning", showCancelButton: !0, confirmButtonColor: "#3085d6", cancelButtonColor: "#d33", confirmButtonText: "ยืนยันการลบ", cancelButtonText: "ยกเลิก" }).then((e) => {
        e.value && (Swal.fire({ title: "Deleted !!!", html: "<h4>กำลังลบข้อมูล...</h4>", showConfirmButton: !1 }), (window.location = "function.php?type=delete_prefix&key=" + t));
    });
}

function deleteDepartment(t) {
    Swal.fire({ title: "คุณต้องการลบสำนักนี้ใช่หรือไม่", icon: "warning", showCancelButton: !0, confirmButtonColor: "#3085d6", cancelButtonColor: "#d33", confirmButtonText: "ยืนยันการลบ", cancelButtonText: "ยกเลิก" }).then((e) => {
        e.value && (Swal.fire({ title: "Deleted !!!", html: "<h4>กำลังลบข้อมูล...</h4>", showConfirmButton: !1 }), (window.location = "function.php?type=delete_department&key=" + t));
    });
}

function deleteCompany(t) {
    Swal.fire({ title: "คุณต้องการลบฝ่ายนี้ใช่หรือไม่", icon: "warning", showCancelButton: !0, confirmButtonColor: "#3085d6", cancelButtonColor: "#d33", confirmButtonText: "ยืนยันการลบ", cancelButtonText: "ยกเลิก" }).then((e) => {
        e.value && (Swal.fire({ title: "Deleted !!!", html: "<h4>กำลังลบข้อมูล...</h4>", showConfirmButton: !1 }), (window.location = "function.php?type=delete_company&key=" + t));
    });
}

function deletelocation(t) {
    Swal.fire({ title: "คุณต้องการลบสถานที่นี้ใช่หรือไม่", icon: "warning", showCancelButton: !0, confirmButtonColor: "#3085d6", cancelButtonColor: "#d33", confirmButtonText: "ยืนยันการลบ", cancelButtonText: "ยกเลิก" }).then((e) => {
        e.value && (Swal.fire({ title: "Deleted !!!", html: "<h4>กำลังลบข้อมูล...</h4>", showConfirmButton: !1 }), (window.location = "function.php?type=delete_location&key=" + t));
    });
}

function deleteStatus(t) {
    Swal.fire({ title: "ต้องการลบข้อมูลนี้ใช่หรือไม่", icon: "warning", showCancelButton: !0, confirmButtonColor: "#3085d6", cancelButtonColor: "#d33", confirmButtonText: "ยืนยันการลบ", cancelButtonText: "ยกเลิก" }).then((e) => {
        e.value && (Swal.fire({ title: "Deleted !!!", html: "<h4>กำลังลบข้อมูล...</h4>", showConfirmButton: !1 }), (window.location = "function.php?type=delete_status&key=" + t));
    });
}

function delect_link(t) {
    Swal.fire({ title: "ต้องการลบข้อมูลนี้ใช่หรือไม่", icon: "warning", showCancelButton: !0, confirmButtonColor: "#3085d6", cancelButtonColor: "#d33", confirmButtonText: "ยืนยันการลบ", cancelButtonText: "ยกเลิก" }).then((e) => {
        e.value && (Swal.fire({ title: "Deleted !!!", html: "<h4>กำลังลบข้อมูล...</h4>", showConfirmButton: !1 }), (window.location = "function.php?type=delete_page&key=" + t));
    });
}

function restore(t) {
    Swal.fire({ title: "ต้องการกู้ข้อมูลนี้ใช่หรือไม่", icon: "warning", showCancelButton: !0, confirmButtonColor: "#3085d6", cancelButtonColor: "#d33", confirmButtonText: "ยืนยันการกู้ข้อมูล", cancelButtonText: "ยกเลิก" }).then((e) => {
        e.value && (Swal.fire({ title: "Deleted !!!", html: "<h4>กำลังกู้ข้อมูล...</h4>", showConfirmButton: !1 }), (window.location = "function.php?type=restore&key=" + t));
    });
}

function restoreemployee(t) {
    Swal.fire({ title: "ต้องการกู้ข้อมูลนี้ใช่หรือไม่", icon: "warning", showCancelButton: !0, confirmButtonColor: "#3085d6", cancelButtonColor: "#d33", confirmButtonText: "ยืนยันการกู้ข้อมูล", cancelButtonText: "ยกเลิก" }).then((e) => {
        e.value && (Swal.fire({ title: "Deleted !!!", html: "<h4>กำลังกู้ข้อมูล...</h4>", showConfirmButton: !1 }), (window.location = "function.php?type=restoreemployee&key=" + t));
    });
}

function Menulock(t) {
    window.XMLHttpRequest ? (xmlhttp = new XMLHttpRequest()) : (xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"));
    var e = document.getElementById("btn-" + t);
    if ("btn btn-success btn-sm" == e.className) var n = 1;
    else n = 0;
    (xmlhttp.onreadystatechange = function () {
        4 == xmlhttp.readyState &&
            200 == xmlhttp.status &&
            ("btn btn-success btn-sm" == e.className ?
                ((document.getElementById("btn-" + t).className = "btn btn-danger btn-sm"), (document.getElementById("icon-" + t).className = "fa fa-lock"), (document.getElementById("text-" + t).innerHTML = "")) :
                ((document.getElementById("btn-" + t).className = "btn btn-success btn-sm"), (document.getElementById("icon-" + t).className = "fa fa-unlock"), (document.getElementById("text-" + t).innerHTML = "")));
    }),
        xmlhttp.open("GET", "function.php?type=change_menu_status&key=" + t + "&sts=" + n, !0),
        xmlhttp.send();
}

function deletelist(list_key) {
    Swal.fire({
        title: 'ต้องการลบข้อมูลนี้ใช่หรือไม่',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ยืนยันการลบ',
        cancelButtonText: 'ยกเลิก'
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: "Deleted !!!",
                html: "<h4>กำลังลบข้อมูล...</h4>",
                showConfirmButton: false
            })
            window.location = "function.php?type=delete_list&key=" + list_key;
        }
    })
}

function UseService(se_id) {
    if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else { // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    var es = document.getElementById('btn-' + se_id);
    if (es.className == 'btn btn-success btn-sm') {
        var sts = 1;
    } else {
        var sts = 0;
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            if (es.className == 'btn btn-success btn-sm') {
                document.getElementById('btn-' + se_id).className = 'btn btn-danger btn-sm';
                document.getElementById('icon-' + se_id).className = 'fa fa-eye-slash';
                document.getElementById('text-' + se_id).innerHTML = ''; //ปิด
            } else {
                document.getElementById('btn-' + se_id).className = 'btn btn-success btn-sm';
                document.getElementById('icon-' + se_id).className = 'fa fa-eye';
                document.getElementById('text-' + se_id).innerHTML = ''; //เปิด
            }
        }
    }

    xmlhttp.open("GET", "function.php?type=using_service&key=" + se_id + "&sts=" + sts, true);
    xmlhttp.send();
}

function delete_guest(key_guest) {
    Swal.fire({
        title: 'ต้องการลบข้อมูลนี้ใช่หรือไม่',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ยืนยันการลบ',
        cancelButtonText: 'ยกเลิก'
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: "Deleted !!!",
                html: "<h4>กำลังลบข้อมูล...</h4>",
                showConfirmButton: false
            })
            window.location = "function.php?type=delete_guest&key=" + key_guest;
        }
    })
}

function nousing_service_li(se_li_id) {
    Swal.fire({
        title: 'ต้องการลบข้อมูลนี้ใช่หรือไม่',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ยืนยันการลบ',
        cancelButtonText: 'ยกเลิก'
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: "Deleted !!!",
                html: "<h4>กำลังลบข้อมูล...</h4>",
                showConfirmButton: false
            })
            window.location = "function.php?type=delete_service_li&key=" + se_li_id;
        }
    })
}