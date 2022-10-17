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
      <form method="post" role="form" action="test2.php">
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
	$(function() {
  $(".bcontent").wysihtml5({
    toolbar: {
      "image": false
    }
  });
  
  $(document).on('change', '.btn-file :file', function() {
    var input = $(this);
    var numFiles = input.get(0).files ? input.get(0).files.length : 1;
    console.log(input.get(0).files);
    var label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  });
  
  $('.btn-file :file').on('fileselect', function(event, numFiles, label){
    var input = $(this).parents('.input-group').find(':text');
    var log = numFiles > 1 ? numFiles + ' files selected' : label;
    
    if( input.length ) {
      input.val(log);
    } else {
      if( log ){ alert(log); }
    }
    
  });
});
</script>