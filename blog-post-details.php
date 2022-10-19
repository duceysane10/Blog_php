
<?php 
require_once('./admin/code.php');
include('./includes/header.php');

?>
     <section>
          <div class="container">
               <h2><?php echo $row['post_title'];?></h2>

               <p class="lead">
                    <i class="fa fa-user"></i> Eng Duceysane &nbsp;&nbsp;&nbsp;
                    <i class="fa fa-calendar"></i> <?php echo $row['post_date'];?> &nbsp;&nbsp;&nbsp;
                    <i class="fa fa-eye"></i> 114
               </p>
               <img   src="./admin/img/<?php echo $row['photo']; ?>" class="img-responsive">
               <!-- <img src="images/other-image-fullscreen-1-1920x700.jpg" class="img-responsive" alt=""> -->

               <br>
               
               <?php echo $row['post_content'];?> 

               <div class="row">
                    <div class="col-md-4 col-xs-12 pull-right">
                         <h4>Social share</h4>

                         <p>
                              <a href="#" target="_blank"><i class="fa fa-facebook"></i></a> &nbsp;&nbsp;&nbsp;

                              <a href="#" target="_blank"><i class="fa fa-twitter"></i></a> &nbsp;&nbsp;&nbsp;

                              <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                         </p>

                         <br>


                         <h4>Other posts</h4>

                         <ul class="list">
                              <li><a href="blog-post-details.html">Lorem ipsum dolor sit amet, consectetur adipisicing.</a></li>
                              <li><a href="blog-post-details.html">Et animi voluptatem, assumenda enim, consectetur quaerat!</a></li>
                              <li><a href="blog-post-details.html">Ducimus magni eveniet sit doloremque molestiae alias mollitia vitae.</a></li>
                         </ul>
                    </div>

                    <div class="col-md-8 col-xs-12">
                         <h4>Comments</h4>

                         <p>No comments found.</p>

                         <br>
                         
                         <h4>Leave a Comment</h4>

                         <form action="#" class="form">

                              <div class="row">
                                   <div class="col-sm-6 col-xs-6">
                                        <div class="form-group">
                                             <label class="control-label">Name</label>

                                             <input type="text" name="name" class="form-control">
                                        </div>
                                   </div>

                                   <div class="col-sm-6 col-xs-6">
                                        <div class="form-group">
                                             <label class="control-label">Email</label>

                                             <input type="email" name="email" class="form-control">
                                        </div>
                                   </div>
                              </div>

                              <div class="form-group">
                                   <label class="control-label">Message</label>

                                   <textarea name="comment" class="form-control" rows="10" autocomplete="off"></textarea>
                              </div>

                              <button type="submit" class="section-btn btn btn-primary">Submit</button>
                         </form>
                    </div>
               </div>
          </div>
     </section>

     <!-- FOOTER -->
     <footer id="footer">
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-6">
                         <div class="footer-info">
                              <div class="section-title">
                                   <h2>Headquarter</h2>
                              </div>
                              <address>
                                   <p>212 Barrington Court <br>New York, ABC 10001</p>
                              </address>

                              <ul class="social-icon">
                                   <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                                   <li><a href="#" class="fa fa-twitter"></a></li>
                                   <li><a href="#" class="fa fa-instagram"></a></li>
                              </ul>

                              <div class="copyright-text"> 
                                   <p>Copyright &copy; 2020 Company Name</p>
                                   <p>Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a></p>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <div class="footer-info">
                              <div class="section-title">
                                   <h2>Contact Info</h2>
                              </div>
                              <address>
                                   <p>+1 333 4040 5566</p>
                                   <p><a href="mailto:contact@company.com">contact@company.com</a></p>
                              </address>

                              <div class="footer_menu">
                                   <h2>Quick Links</h2>
                                   <ul>
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="about-us.html">About Us</a></li>
                                        <li><a href="terms.html">Terms & Conditions</a></li>
                                        <li><a href="contact.html">Contact Us</a></li>
                                   </ul>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                         <div class="footer-info newsletter-form">
                              <div class="section-title">
                                   <h2>Newsletter Signup</h2>
                              </div>
                              <div>
                                   <div class="form-group">
                                        <form action="#" method="get">
                                             <input type="email" class="form-control" placeholder="Enter your email" name="email" id="email" required>
                                             <input type="submit" class="form-control" name="submit" id="form-submit" value="Send me">
                                        </form>
                                        <span><sup>*</sup> Please note - we do not spam your email.</span>
                                   </div>
                              </div>
                         </div>
                    </div>
                    
               </div>
          </div>
     </footer>

     <!-- SCRIPTS -->
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/custom.js"></script>

</body>
</html>
<?php 
include('./includes/footer.php');
?>