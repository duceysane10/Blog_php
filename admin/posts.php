
<?php require_once('code.php'); ?>
<?php
include('includes/header.php'); 
include('includes/navbar.php');
?>
<style>
.btn-file {
    position: relative;
    overflow: hidden;
}

.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}

input[readonly] {
  background-color: white !important;
  cursor: text !important;
}

/* this is only due to codepen display don't use this outside of codepen */
.container {
  padding-top: 20px;
}
</style>
<div class="modal fade bd-example-modal-lg" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Creating Blog Post</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="container">
  <div class="row">
    <div class="col-md-12">
      <form method="post" role="form" action="code.php" enctype="multipart/form-data">>
        <div class="form-group">
          <input type="text" class="form-control" name="title" placeholder="Title"/>
        </div>
        <div class="form-group">
          <label> Image </label>
          <div class="input-group">
            <span class="input-group-btn">
              <span class="btn btn-primary btn-file">
                Browse <input type="file" name="img" multiple>
              </span>
             </span>
            <input type="text" class="form-control" readonly>
           </div>
        </div>
        <div class="form-group">
          <textarea  class="form-control bcontent" name="content"></textarea>
        </div>
        <div class="form-group">
           <input type="submit" name="publish" value="Publish" class="btn btn-primary form-control" />
        </div>
      </form>
    </div>
  </div>
</div>

    </div>
  </div>
</div>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Blog Posts 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile" data-target=".bd-example-modal-lg">
              Create Posts 
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
            <td><img style="max-height: 100px; max-width: 300px;"  src="./img/<?php echo $row['photo']; ?>"></td>
            <td style="max-width: 200px;"> <?php echo $row['post_title'];?> </td>
            <!-- <td style="max-width: 300px; max-height: 20px;"> <?php echo $row['post_content'];?> </td> -->
            <td> <?php echo $row['post_date'];?> </td>
            <td>
            <a href="register_edit.php?edit_p=<?php echo $row['post_id'];?>" class="btn btn-info" >Edit</a>
            <a href="code.php?delete_p=<?php echo $row['post_id'];?>" class="btn btn-danger">Delete</a>
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
