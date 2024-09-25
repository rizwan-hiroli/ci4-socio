<!DOCTYPE html>
<html>
   <head>
      <title>Codeigniter 4 : Add New Employee</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
   </head>
   <body>
      <div class="container mt-5">
         <form method="post" id="employee_add" name="employee_add"
            action="<?= site_url('/employee/save') ?>">
            <div class="form-group">
               <label>Employee Code</label>
               <input type="text" name="emp_code" class="form-control">
               <?php
                    if(!empty($error)){
                        if($error->getError('emp_code'))
                        {
                            echo '<div class="alert alert-danger mt-2">'.$error->getError('emp_code').'</div>';
                        }
                    }
                ?>
            </div>
            <div class="form-group">
               <label>First Name</label>
               <input type="text" name="emp_fname" class="form-control">
            </div>
            <div class="form-group">
               <label>Last Name</label>
               <input type="text" name="emp_lname" class="form-control">
            </div>
            <div class="form-group">
               <label>Email</label>
               <input type="email" name="emp_email" class="form-control">
            </div>
            <div class="form-group">
               <label>Phone</label>
               <input type="text" name="emp_phone" class="form-control">
            </div>
            <div class="form-group">
               <label>Password</label>
               <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
               <button type="submit" class="btn btn-primary btn-block">Store</button>
            </div>
         </form>
      </div>
   </body>
</html>
