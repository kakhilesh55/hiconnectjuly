
  <div class="main-content">
        <section class="section">
          <div class="row ">
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                  <div class="card-header">
                    <h4>Themes</h4>
                  </div>
                   <?php 
                  if($this->session->flashdata('item')!='') {
                    $message = $this->session->flashdata('item');
                  ?>
                  <div class="<?php echo $message['class'] ?>">
                    <?php echo $message['message']; ?>
                  </div>
                  <?php } ?>
                  <div class="card-body">
                  <form name="user" method="post" action="" enctype="multipart/form-data">

                    <?php if(isset($show_selected_theme)){ ?>
                      <h6>Active Theme</h6>
                    <div class="form-row"> 

                         <article class="col-lg-3 col-md-4 col-sm-6 col-xs-12 text-center theme_images  portfolio-item apps">
                              <div class="portfolio-thumb in">
                                <a href="#" class="main-link">
                                  <img class="img-responsive img-center" src="<?php if(isset($show_selected_theme)){ echo base_url('uploads/theme_images/'.$show_selected_theme);} ?>" style="max-height:300px;">
                                </a>
                              </div>
                            </article>
                    </div>
                  <?php } ?>

                    <div class="row cover Select">
                       <?php 
                         if(isset($themes) && $themes!=''):
                          foreach($themes as $theme) :
                          ?>

                          <article class="col-lg-3 col-md-4 col-sm-6 col-xs-12 text-center theme_images  portfolio-item apps">
                              <div class="portfolio-thumb in">
                                <a href="#" class="main-link">
                                  <img class="img-responsive img-center" src="<?php echo base_url('uploads/theme_images/'.$theme['theme_image']); ?>" alt="" height="300px">
                                   <input class="project-title" type="submit" name="select_theme" value="Select Theme" onclick="SelectTheme(<?php echo $theme['theme_id'];?>)" />
                                   <span class="overlay-mask"></span>
                                </a>
                              </div>
                            </article>

                        <?php  
                        endforeach; 
                        endif; ?>
                        <input type="hidden" name="select_themeimg" id="select_themeimg" value="">
                    </div>
                    </div>
                </form>
              
            </div>

              </div>
              </div>
            </section>
          </div>
          <script type="text/javascript">
            function SelectTheme(e)
            {
              $('#select_themeimg').val(e);
            }
          </script>
