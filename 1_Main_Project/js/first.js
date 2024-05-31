

let idNumber = 0;

$(document).ready(function () {

    $.ajax({
        url: "display-data.php",
        type: "GET",
        dataType: "json",
        success: function (response) {
            console.log(response);
            $('#table1').DataTable({

                "data": response.data,
                columns: [
                    { data: 'id' },
                    { data: 'project_name' },
                    { data: 'url' },
                    { data: 'user_name' },
                    { data: 'password' },
                    { data: 'server_name' },
                    {
                        // orderable: false,
                        // searchable: false,
                        // render: function(data,type,row,meta) { // render event defines the markup of the cell text 
                        //     var a = '<a><i class="bi bi-pencil-square"></i>  ' + row.id +'</a>'; // row object contains the row data
                        //     return a;
                        // }
                        render: function (data, type, row, meta) {

                            var a = '<button type="button" class="btn btn-outline-primary row-button" id="' + row.id + '" onclick="assighnViewEditValue(this.id)" data-bs-toggle="modal" data-bs-target="#viewFormModal"><i class="bi bi-eye"></i></button>';
                            var b = '<button type="button" class="btn btn-success row-button" id="' + row.id + '" onclick="assighnIdEditValue(this.id)" data-bs-toggle="modal" data-bs-target="#editFormModal"><i class="bi bi-pencil-square"></i></button>';
                            var c = '<button type="button" class="btn btn-danger row-button" id="' + row.id + '" onclick="assighnIdDeletValue(this.id)"><i class="bi bi-trash3-fill"></i></button>';

                            return a + b + c;
                        },
                    }
                ],
            });
            if(response.error)
            {
                console.log(response.error);
            }
        }
        

    });


    $("#addFormsubmitButton").click(function (e) {

        $("#myForm").validate({
            rules: {
                projectName: {
                    required: true,
                    minlength: 3,
                    pattern: /^[A-Za-z][A-Za-z0-9_]+$/
                },
                url: {
                    required: true,
                    url: true,
                },
                userName:
                {
                    required: true,
                    minlength: 3,
                    pattern: /^[A-Za-z][A-Za-z0-9_]+$/
                },
                password: {
                    required: true,
                    minlength: 3,
                    pattern: "^(?=.*[0-9])"
                        + "(?=.*[a-z])(?=.*[A-Z])"
                        + "(?=.*[@#$%^&+=])"
                        + "(?=\\S+$).{8,20}$"
                },
                serverName: {
                    required: true,
                    minlength: 3,
                    pattern: /^[A-Za-z][A-Za-z0-9_]+$/
                }

            },

            submitHandler: function (myform) {
                var projectName = $('#projectName').val();
                var url = $('#url').val();
                var userName = $('#userName').val();
                var password = $('#password').val();
                var serverName = $('#serverName').val();


                $.ajax({
                    type: "POST",
                    url: "add-form-backend.php",
                    data: {
                        projectName: projectName,
                        url: url,
                        userName: userName,
                        password: password,
                        serverName: serverName,

                    },
                    cache: true,
                    success: function (data1) {
                        alert(data1);
                        $(document).ajaxStop(function () {
                            window.location.reload();
                        });

                    },
                    error: function (xhr, status, error) {
                        alert(error);
                    }
                });

            }
        });
    });
    $("#editFormsubmitButton").click(function (e) {


        $("#editForm").validate({
            rules: {
                projectName: {
                    required: true,
                    minlength: 3,
                    pattern: /^[A-Za-z][A-Za-z0-9_]+$/
                },
                url: {
                    required: true,
                    url: true,
                },
                userName:
                {
                    required: true,
                    minlength: 3,
                    pattern: /^[A-Za-z][A-Za-z0-9_]+$/
                },
                password: {
                    required: true,
                    minlength: 3,
                    pattern: "^(?=.*[0-9])"
                        + "(?=.*[a-z])(?=.*[A-Z])"
                        + "(?=.*[@#$%^&+=])"
                        + "(?=\\S+$).{8,20}$"
                },
                serverName: {
                    required: true,
                    minlength: 3,
                    pattern: /^[A-Za-z][A-Za-z0-9_]+$/
                }

            },

            submitHandler: function (myform) {
                var projectName = $('#eProjectName').val();
                var url = $('#eUrl').val();
                var userName = $('#eUserName').val();
                var password = $('#ePassword').val();
                var serverName = $('#eServerName').val();


                $.ajax({
                    type: "POST",
                    url: "edit-form-backend.php",
                    data: {
                        empId: editRowId,
                        projectName: projectName,
                        url: url,
                        userName: userName,
                        password: password,
                        serverName: serverName,

                    },
                    cache: true,
                    success: function (data1) {
                        alert(data1);
                        $(document).ajaxStop(function () {
                            window.location.reload();
                        });

                    },
                    error: function (xhr, status, error) {
                        alert(error);
                    }
                });
            }

        });
    });

});



function assighnIdDeletValue(empId) {
    $.ajax({
        type: "POST",
        url: "delete-form-backend.php",
        data: {

            IdNumber: empId,

        },
        cache: true,
        success: function (data1) {
            alert("Your detail has been deleted");
            $(document).ajaxStop(function () {
                window.location.reload();
            });


        },
        error: function (xhr, status, error) {
            console.error(xhr);
        }
    });
}
let editRowId;
function F1(ele, val) {
    if (document.getElementById(ele))
        document.getElementById(ele).value = val;
}
function assighnIdEditValue(empId) {
    editRowId = empId;
    // console.log(empId);
    // console.log(object);

    $.ajax({
        type: "GET",
        url: "display-data.php",
        data: "data",
        dataType: "json",
        success: function (response) {
            // JSON.parse(response);
            data = response.data
            console.log(data);
            for (let i = 0; i < data.length; i++) {
                if (data[i].id == editRowId) {
                    console.log(data[i]);
                    F1("eProjectName", data[i].project_name);
                    F1("eUrl", data[i].url);
                    F1("eUserName", data[i].user_name);
                    F1("ePassword", data[i].password);
                    F1("eServerName", data[i].server_name);

                }
            }
        }
    });
}
function assighnViewEditValue(empId) {
    editRowId = empId;
}