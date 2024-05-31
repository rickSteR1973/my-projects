<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Form Table</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
  <script src="../js/first.js"></script>
  <link rel="stylesheet" href="../css/first.css">

</head>

<body>


  <div class="container mt-3 mb-3 os-scroll">
    <ul class="">
      <li class="">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFormModal">
          Add Details
        </button>
      </li>

      <li>
        <a href=""></a>
      </li>

    </ul>
    <!-- <a href="form.php" class="btn btn-primary" id="addFormBtn">Add form</a> -->
    <table id="table1" class="table">
      <!-- <div class="table123"> -->
      <thead>
        <tr>
          <th>Id</th>
          <th>Project Name</th>
          <th>Url</th>
          <th>User-Name</th>
          <th>Password</th>
          <th>Server Name</th>
          <th>Action</th>
        </tr>
      </thead>
      <!-- </div> -->
    </table>

    <div id="error-table"></div>
    <!-- Button trigger modal -->

    <!-- Modal for add-->
    <div class="modal fade" id="addFormModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Details</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="myForm" method="post">

              <div class="mb-3 empFullName" id="firstName">
                <label for="projectName" class="form-label">Project Name*</label><br>
                <input type="text" class="form-control" id="projectName" name="projectName" placeholder="Your Name">
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                </div>
              </div>

              <div class="mb-3 empFullName" id="lastName">
                <label for="url" class="form-label">Url*</label><br>
                <input type="text" class="form-control" id="url" name="url" placeholder="Surname">
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                </div>
              </div>


              <div class="mb-3 empFullName" id="uname">
                <label for="userName" class="form-label">User Name*</label><br>
                <input type="text" class="form-control" id="userName" name="userName" placeholder="Surname">
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                </div>
              </div>

              <div class="mb-3" id="employeeCode">
                <label for="password" class="form-label ">Password*</label>
                <input type="text" class="form-control radioOfGender" id="password" name="password" placeholder="EMP12345">
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                </div>
              </div>

              <div class="licenceNumber" id="licenceNumber">
                <label for="serverName" class="form-label ">Server Name*</label>
                <input type="text" name="serverName" class="form-control radioOfGender " id="serverName" placeholder="XYZ04565CV13" name="empLicenceNumber">
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                </div>
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" id="addFormsubmitButton" class="btn btn-primary">Submit</button>
            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
          </div>
          </form>
        </div>
      </div>

    </div>
    <!-- Modal for edit-->
    <div class="modal fade" id="editFormModal" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel2">Edit Details</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="editForm" action="index.php" method="post">

              <div class="mb-3 empFullName" id="efirstName">
                <label for="eProjectName" class="form-label">Project Name*</label><br>
                <input type="text" class="form-control" id="eProjectName" name="eProjectName" placeholder="Your Name">
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                </div>
              </div>

              <div class="mb-3 empFullName" id="elastName">
                <label for="eUrl" class="form-label">Url*</label><br>
                <input type="text" class="form-control" id="eUrl" name="eUrl" placeholder="Surname">
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                </div>
              </div>

              <div class="mb-3" id="edateOfBirth">
                <label for="eUserName" class="form-label">User Name*</label>
                <input type="text" class="form-control" id="eUserName" name="eUserName">
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                </div>
              </div>

              <div class="mb-3" id="eemployeeCode">
                <label for="ePassword" class="form-label ">Password*</label>
                <input type="text" class="form-control radioOfGender" id="ePassword" name="ePassword" placeholder="EMP12345">
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                </div>
              </div>

              <div class="licenceNumber" id="elicenceNumber">
                <label for="eServerName" class="form-label ">Server Name*</label>
                <input type="text" name="eServerName" class="form-control radioOfGender " id="eServerName" placeholder="XYZ04565CV13" name="empLicenceNumber">
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                </div>
              </div>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" id="editFormsubmitButton" class="btn btn-primary">Apply</button>
            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
          </div>

          </form>
        </div>
      </div>
    </div>




    <!---------------------------------------------------------------------------------------------------------------------------------
        View Modal
       --------------------------------------------------------------------------------------------------------------------------------->



    <div class="modal fade" id="viewFormModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel3">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
              </div>
              <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            
          </div>
        </div>
      </div>
    </div>

  </div>


</body>

</html>