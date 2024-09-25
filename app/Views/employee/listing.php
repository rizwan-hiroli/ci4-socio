<!doctype html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Codeigniter 4 CRUD Tutorial</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
   </head>
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">CRUD App</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
            <a class="nav-link" href="logout">Logout <span class="sr-only">(current)</span></a>
            </li>
         </ul>
         <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
         </form>
      </div>
      </nav>
   <body>
      <div class="container mt-4">
         <div class="d-flex justify-content-end">
            <a href="<?php echo site_url('/employee/add') ?>" class="btn btn-success mb-2">Add Employee</a>
         </div>
         <?php
            if(isset($_SESSION['msg'])){
               echo $_SESSION['msg'];
             }
            ?>
         <div class="mt-3">
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th>Employee Code</th>
                     <th>First Name</th>
                     <th>Last Name</th>
                     <th>Email</th>
                     <th>Phone</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php if(count($employee)){ ?>
                  <?php foreach($employee as $single_emp){ ?>
                  <tr>
                     <td><?php echo $single_emp['emp_code']; ?></td>
                     <td><?php echo $single_emp['emp_fname']; ?></td>
                     <td><?php echo $single_emp['emp_lname']; ?></td>
                     <td><?php echo $single_emp['emp_email']; ?></td>
                     <td><?php echo $single_emp['emp_phone']; ?></td>
                     <td>
                        <a href="<?php echo base_url('employee/edit/'.$single_emp['id']);?>" class="btn btn-primary btn-sm">Edit</a>
                        <a href="<?php echo base_url('employee/delete/'.$single_emp['id']);?>" class="btn btn-danger btn-sm">Delete</a>
                     </td>
                  </tr>
                  <?php } ?>
                  <?php } ?>
               </tbody>
            </table>
         </div>
      </div>
   </body>
</html>
