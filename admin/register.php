
<?php require_once('code.php'); ?>
<?php
include('includes/header.php'); 
include('includes/navbar.php');
?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST" enctype="multipart/form-data">
        
        <div class="modal-body">
            <div class="form-group">
            <input type="hidden" name="id" class="form-control" >
                <label> Username </label>
                <input type="text" name="username" class="form-control" >
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" >
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" >
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" >
            </div>
            <div class="form-group">
                <label>User Type</label>
                <select name="userType" aria-label="Default select example" class="form-control">
                <option selected>Open this select menu</option>
                <option value="Admin">Admin</option>
                <option value="user">User</option>
              </select>
            </div>
            <div class="form-group">
                <label> upload picture </label>
                <input type="file" name="img" class="form-control" >
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Admin Profile 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add Admin Profile 
            </button>
    </h6>
  </div>

  <div class="card-body">
  <!-- erroror out put -->
      <?php if (isset($_SESSION['message'])):?>
      <div class ="alert alert-<?=$_SESSION['msg_type']; ?>">
      <?php echo $_SESSION['message'];
      unset($_SESSION['message']);
      ?>
      </div>
    <?php endif;?>
    <div class="table-responsive">

      <table class="table table-bordered table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
        <?php 
        $query= "SELECT * FROM `users`";
        $resul = mysqli_query($connection,$query);
        ?>
        <thead  style="background-color:#4e73df;  color: #fff;">
          <tr>
            <th> ID </th>
            <th> profile </th>
            <th> Username </th>
            <th>Email </th>
            <th>Password</th>
            <th>User Type</th>
            <th>Actions </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php while($row = $resul->fetch_assoc()):?>
            <td> <?php echo $row['id'];?> </td>
            <td><img style="max-height: 50px; max-width: 50px;" class="img-profile rounded-circle" src="../img/<?php echo $row['img']; ?>"></td>
            <td> <?php echo $row['name'];?> </td>
            <td> <?php echo $row['email'];?> </td>
            <td> <?php echo $row['password'];?> </td>
            <td> <?php echo $row['userType'];?> </td>
            <td>
            <a href="register_edit.php?edit=<?php echo $row['id'];?>" class="btn btn-info" >Edit</a>
            <a href="code.php?delete=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>
            </td>
            
          </tr>
          <?php endwhile;?>
        
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
