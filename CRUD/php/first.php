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
  <script src="../js/index.js"></script>
  <link rel="stylesheet" href="../css/index.css">

</head>

<body>

 
  <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">CRUD (Create Read Update Delete)</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>
  <div class="container mt-3 mb-3">
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
    <table id="table1" class="table" width=" 100%">
      <thead>
        <tr>
          <th>Id</th>
          <th>First name</th>
          <th>Last Name</th>
          <th>Date of Birth</th>
          <th>Employee Code</th>
          <th>Licence Nubmer</th>
          <th>Action</th>
        </tr>
      </thead>
    </table>
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
            <form id="myForm" action="index.php" method="post">

              <div class="mb-3 empFullName" id="firstName">
                <label for="empFname" class="form-label">First Name*</label><br>
                <input type="text" class="form-control" id="empFname" name="empFname" placeholder="Your Name">
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                </div>
              </div>



              <div class="mb-3 empFullName" id="lastName">
                <label for="empLname" class="form-label">Last Name*</label><br>
                <input type="text" class="form-control" id="empLname" name="empLname" placeholder="Surname">
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                </div>
              </div>

              <div class="mb-3" id="dateOfBirth">
                <label for="empDOB" class="form-label">Date of Birth*</label>
                <input type="date" class="form-control" id="empDOB" name="empDOB">
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                </div>
              </div>



              <div class="mb-3" id="employeeCode">
                <label for="empCode" class="form-label ">Employee Code*</label>
                <input type="text" class="form-control radioOfGender" id="empCode" name="empCode" placeholder="EMP12345">
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                </div>
              </div>

              <div class="licenceNumber" id="licenceNumber">
                <label for="empLicenceNumber" class="form-label ">Licence Number*</label>
                <input type="text" name="empLicenceNumber" class="form-control radioOfGender " id="empLicenceNumber" placeholder="XYZ04565CV13" name="empLicenceNumber">
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
                <label for="eempFname" class="form-label">First Name*</label><br>
                <input type="text" class="form-control" id="eempFname" name="empFname" placeholder="Your Name">
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                </div>
              </div>



              <div class="mb-3 empFullName" id="elastName">
                <label for="eempLname" class="form-label">Last Name*</label><br>
                <input type="text" class="form-control" id="eempLname" name="empLname" placeholder="Surname">
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                </div>
              </div>

              <div class="mb-3" id="edateOfBirth">
                <label for="eempDOB" class="form-label">Date of Birth*</label>
                <input type="date" class="form-control" id="eempDOB" name="empDOB">
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                </div>
              </div>



              <div class="mb-3" id="eemployeeCode">
                <label for="eempCode" class="form-label ">Employee Code*</label>
                <input type="text" class="form-control radioOfGender" id="eempCode" name="empCode" placeholder="EMP12345">
                <div class="valid-feedback">
                </div>
                <div class="invalid-feedback">
                </div>
              </div>

              <div class="licenceNumber" id="elicenceNumber">
                <label for="eempLicenceNumber" class="form-label ">Licence Number*</label>
                <input type="text" name="empLicenceNumber" class="form-control radioOfGender " id="eempLicenceNumber" placeholder="XYZ04565CV13" name="empLicenceNumber">
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

  </div>


</body>

</html>