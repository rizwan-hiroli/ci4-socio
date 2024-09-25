<!DOCTYPE html>
<html>
   <head>
      <title>Codeigniter 4 : Update Employee</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
   </head>
   <body>
      <div class="container mt-5">
         <form method="post" id="employee_update" name="employee_update"
            action="<?= site_url('/employee/update') ?>">
            <input type="hidden" name="id" value="<?php echo $employee['id']; ?>" class="form-control">
            <div class="form-group">
               <label>Employee Code</label>
               <input type="text" name="emp_code" value="<?php echo $employee['emp_code']; ?>" class="form-control">
               <!-- Error -->
               <?php 
                    if(!empty($error)){
                        if($error->getError('emp_code'))
                            {
                                echo "
                                <div class='alert alert-danger mt-2'>
                                ".$error->getError('emp_code')."
                                </div>
                                ";
                            }
                    }
                ?>
            </div>
            <div class="form-group">
               <label>First Name</label>
               <input type="text" name="emp_fname" value="<?php echo $employee['emp_fname']; ?>" class="form-control">
            </div>
            <div class="form-group">
               <label>Last Name</label>
               <input type="text" name="emp_lname" value="<?php echo $employee['emp_lname']; ?>" class="form-control">
            </div>
            <div class="form-group">
               <label>Email</label>
               <input type="email" name="emp_email" value="<?php echo $employee['emp_email']; ?>" class="form-control">
            </div>
            <div class="form-group">
               <label>Phone</label>
               <input type="text" name="emp_phone" value="<?php echo $employee['emp_phone']; ?>" class="form-control">
            </div>
            <div class="form-group">
               <label>Password</label>
               <input type="password" name="password" value="<?php echo $employee['emp_phone']; ?>" class="form-control">
            </div>
            <div class="form-group">
               <button type="submit" class="btn btn-primary btn-block">Update</button>
            </div>
         </form>
      </div>
   </body>
</html>
