

let idNumber = 0;

$(document).ready(function () {


    $.ajax({
        url: "display-data.php",
        type: "GET",
        dataType: "json",
        success: function (response) {
            $('#table1').DataTable({
                "data": response,   
                columns: [
                    { data: 'sno' },
                    { data: 'First_Name' },
                    { data: 'Last_Name' },
                    { data: 'Date_of_birth' },
                    { data: 'Employee_Code' },
                    { data: 'Licence_Number' },
                    {
                        // orderable: false,
                        // searchable: false,
                        // render: function(data,type,row,meta) { // render event defines the markup of the cell text 
                        //     var a = '<a><i class="bi bi-pencil-square"></i>  ' + row.id +'</a>'; // row object contains the row data
                        //     return a;
                        // }
                        render: function (data, type, row, meta) {
                            

                            var b = '<button type="button" class="btn btn-success row-button" id="' + row.sno + '" onclick="assighnIdEditValue(this.id)" data-bs-toggle="modal" data-bs-target="#editFormModal"><i class="bi bi-pencil-square"></i></button>';
                            var c = '<button type="button" class="btn btn-danger row-button" id="' + row.sno + '" onclick="assighnIdDeletValue(this.id)"><i class="bi bi-trash3-fill"></i></button>';

                            return  b + c;
                        },
                    }
                ],

            });

        },

    });
    

    $("#addFormsubmitButton").click(function (e) {

        $("#myForm").validate({
            rules: {
                empFname: {
                    required: true,
                    pattern: /^[A-Za-z]+$/
                },
                empLname: {
                    required: true,
                    pattern: /^[A-Za-z]+$/
                },
                empDOB:
                {
                    required: true,
                    date: true,

                },
                empCode: {
                    required: true,
                    pattern: /^[A-Z]{3}[0-9]+$/
                }

            },
            messages: {
                empFname: {
                    required: "Please enter First Name.",
                    pattern: "Enter only alphabates."
                },

                empLname: {
                    required: "Please enter Last Name.",
                    pattern: "Enter only alphabates."
                },
                empDOB: {
                    required: "Enter your date of Birth.",
                    date: "Enter valid date."
                },
                empCode: {
                    required: "Please enter employee Code.",
                    pattern: "Enter in AAA11111.. formate"

                }


            },
            submitHandler: function (myform) {
                var empFname = $('#empFname').val();
                var empLname = $('#empLname').val();
                var empDOB = $('#empDOB').val();
                var empCode = $('#empCode').val();
                var empLicenceNumber = $('#empLicenceNumber').val();


                $.ajax({
                    type: "POST",
                    url: "add-form-backend.php",
                    data: {
                        firstName: empFname,
                        lastName: empLname,
                        dob: empDOB,
                        employeeCode: empCode,
                        employeelicenceNumber: empLicenceNumber,

                    },
                    cache: true,
                    success: function (data1) {
                        $(document).ajaxStop(function () {
                            window.location.reload();
                        });
                        alert("Your form has been Submited");

                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                    }
                });

            }
        });
    });
    $("#editFormsubmitButton").click(function (e) {


        $("#editForm").validate({
            rules: {
                empFname: {
                    required: true,
                    pattern: /^[A-Za-z]+$/
                },
                empLname: {
                    required: true,
                    pattern: /^[A-Za-z]+$/
                },
                empDOB:
                {
                    required: true,
                    date: true,

                },
                empCode: {
                    required: true,
                    pattern: /^[A-Z]{3}[0-9]+$/
                }




            },
            messages: {
                empFname: {
                    required: "Please enter First Name.",
                    pattern: "Enter only alphabates."
                },

                empLname: {
                    required: "Please enter Last Name.",
                    pattern: "Enter only alphabates."
                },
                empDOB: {
                    required: "Enter your date of Birth.",
                    date: "Enter valid date."
                },
                empCode: {
                    required: "Please enter employee Code.",
                    pattern: "Enter in AAA11111.. formate"

                }


            },
            submitHandler: function (myform) {
                var empFname = $('#eempFname').val();
                var empLname = $('#eempLname').val();
                var empDOB = $('#eempDOB').val();
                var empCode = $('#eempCode').val();
                var empLicenceNumber = $('#eempLicenceNumber').val();


                $.ajax({
                    type: "POST",
                    url: "edi-form-backend.php",
                    data: {
                        empId: editRowId,
                        firstName: empFname,
                        lastName: empLname,
                        dob: empDOB,
                        employeeCode: empCode,
                        employeelicenceNumber: empLicenceNumber,

                    },
                    cache: true,
                    success: function (data1) {
                        alert("Your form has been Updated");
                        $(document).ajaxStop(function () {
                            window.location.reload();
                        });


                    },
                    error: function (xhr, status, error) {
                        console.error(xhr);
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
    console.log(empId);

    $.ajax({
        type: "GET",
        url: "display-data.php",
        data: "data",
        dataType: "json",
        success: function (response) {
            // JSON.parse(response);
            for (let i = 0; i < response.length; i++) {
                if (response[i].sno == editRowId) {

                    F1("eempFname", response[i].First_Name);
                    F1("eempLname", response[i].Last_Name);
                    F1("eempDOB", response[i].Date_of_Birth);
                    F1("eempCode", response[i].Employee_Code);
                    F1("eempLicenceNumber", response[i].Licence_Number);

                }
            }
        }
    });



}