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

/* this is only due to codepen display don't use this outside of codepen */
.container {
  padding-top: 20px;
}
</style>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <form method="post" role="form" action="code.php">
        <div class="form-group">
          <input type="text" class="form-control" name="title" placeholder="Title"/>
        </div>
        <div class="form-group">
          <label> Image </label>
          <div class="input-group">
            
            <span class="input-group-btn">
              <span class="btn btn-primary btn-file">
                Browse <input type="file" name="bimgs" multiple>
              </span>
             </span>
            <input type="text" class="form-control" >
           </div>
        </div>
        <div class="form-group">
          <textarea class="form-control bcontent" name="content"></textarea>
        </div>
        <div class="form-group">
           <input type="submit" name="Submit" value="Publish" class="btn btn-primary form-control" />
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  CKEDITOR.replace( 'content', {
  height: 500,
  filebrowserUploadUrl: "code.php"
 });
</script>