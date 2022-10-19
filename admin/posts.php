
<?php require_once('code.php'); ?>
<?php
include('includes/header.php'); 
include('includes/navbar.php');
?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Blog Posts 
      <a href="create_posts.php">
            <button type="button" class="btn btn-primary">
              Create Posts 
            </button>
    </h6></a>
    <in
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
        $query= "SELECT * FROM `tbl_post`";
        $resul = mysqli_query($connection,$query);
        ?>
        <thead  style="background-color:#4e73df;  color: #fff;">
          <tr>
            <th> ID </th>
            <th> photo</th>
            <th> Title</th>
            <!-- <th> Content</th> -->
            <th>Date</th>
            <th>Actions </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php while($row = $resul->fetch_assoc()):?>
            <td> <?php echo $row['post_id'];?> </td>
            <td><img style="max-height: 100px; max-width: 300px;"  src="../img/<?php echo $row['photo']; ?>"></td>
            <td style="max-width: 200px;"> <?php echo $row['post_title'];?> </td>
            <!-- <td style="max-width: 300px; max-height: 20px;"> <?php echo $row['post_content'];?> </td> -->
            <td> <?php echo $row['post_date'];?> </td>
            <td>
            <a href="edit_post.php?editP=<?php echo $row['post_id'];?>" class="btn btn-info" >Edit</a>
            <a href="code.php?Delete=<?php echo $row['post_id'];?>" class="btn btn-danger">Delete</a>
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
