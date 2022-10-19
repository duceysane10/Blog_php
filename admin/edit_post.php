<?php require_once('code.php'); ?>
<?php
include('includes/header.php'); 
include('includes/navbar.php');

?>
<!-- CKEDITOR CDN LINK -->
<script src="http://cdn.ckeditor.com/4.6.2/full-all/ckeditor.js"></script>
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

</style>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create new Posts</h5>
      </div>

      <form method="post" role="form" action="code.php" enctype="multipart/form-data">
        <div class="form-group">
          <input type="hiden" name="p_id" value="<?php echo $p_id;?>">
          <input type="text" class="form-control" name="p_title" value="<?php echo $p_title;?>" placeholder="Title"/>
        </div>
        <div class="form-group">
          <label> Image </label>
          <div class="input-group">
            <span class="input-group-btn">
              <span class="btn btn-primary btn-file">
                Browse <input type="file" name="p_img" multiple value="<?php echo $file;?>">
              </span>
             </span>
            <input type="text" class="form-control" readonly>
           </div>
        </div>
        <div class="form-group">
          <textarea name="conetnt2" value="<?php echo $content2;?>"></textarea>
        </div>
        <div class="form-group">
           <input type="submit" name="update_p" value="Publish" class="btn btn-info form-control" />
        </div>
      </form>
    </div>
  </div>
</div>

<?php
//footer
include('includes/scripts.php');
include('includes/footer.php');
?>
<script>
  CKEDITOR.replace( 'conetnt2',{
  height: 500,
  filebrowserUploadUrl: "code.php"
 });
</script>