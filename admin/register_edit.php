<?php require_once('code.php'); ?>
<?php
include('includes/header.php'); 
include('includes/navbar.php');

?>
 <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Admin Data</h5>
      </div>
      <form action="code.php" method="POST">
        
        <div class="modal-body">
            <div class="form-group">
                <label> ID </label>
                <input type="text" name="id" class="form-control" value="<?php echo $id ?>"  readonly>
            </div>
            <div class="form-group">
                <label> Username </label>
                <input type="text" name="username" class="form-control" value="<?php echo $username ?>">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control"  value="<?php echo $email ?>">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control"  value="<?php echo $password ?>">
            </div><div class="form-group">
                <label>User Type</label>
                <select name="userType" aria-label="Default select example" class="form-control">
                <option selected ><?php echo $userType ?></option>
                <option value="Admin">Admin</option>
                <option value="user">User</option>
              </select>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" >
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="submit" name="update" class="btn btn-info">update</button>
            <a href="register.php"><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></a>
            
            
        </div>
      </form>
    </div>

<?php
//footer
include('includes/scripts.php');
include('includes/footer.php');
?>