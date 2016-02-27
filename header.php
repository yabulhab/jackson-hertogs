<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head <?php do_action( 'add_head_attributes' ); ?>>
    <title>Jackson Hertogs</title>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <!-- Font -->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:300,700,400|Source+Sans+Pro:300,400' rel='stylesheet' type='text/css'>
    <!-- // <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="wp-content/themes/mytheme/js/jackson.js"></script>
    <script type="text/javascript" src="../wp-content/themes/mytheme/js/jackson.js"></script>
    <?php wp_head(); ?>
	</head>

  <body <?php body_class(isset($class) ? $class : ''); ?>>

    <!-- Modal -->
      <!-- Modal -->
  <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
       <form action="https://ww6.welcomeclient.com/4DCGI/Web_SLogin" method="POST" name="FormName" target="_top">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">CLIENT LOGIN</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" id="username" name="web_Login_str" placeholder="username">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" id="password" name="web_Password_str" placeholder="password">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" value="Login" class="btn btn-default modal-btn" >LOG IN</button>
        </div>
       </form>
      </div>
    </div>
  </div>

    <!-- End modal -->

    <nav class="navbar navbar-fixed-top" role="navigation">
      <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo home_url(); ?>">
            <img id="brand-large" src="/wp-content/themes/mytheme/images/jhLogoColor.png" alt="Jackson Hertogs">
           <img id="brand-small" src="/wp-content/themes/mytheme/images/jhLogoSmallColor.png" alt="Jackson Hertogs">
         </a>

         <a class="navbar-brand navbar-right" id="search-now">
              <form id="searchform" action="search-page/" method="get">
              <div id="input" class="newsletter-signup"><input type="text" name="search-terms" id="search-terms" placeholder="Enter search terms..."></div>
              <div id="label"><label for="search-terms" id="search-label">search</label></div>
            </form>
         </a>

        </div>

      <!-- Collect the nav links, forms, and other content for toggling -->

        <div class="collapse navbar-collapse">

          <ul class="nav navbar-nav navbar-right" id="menu-header-menu">
        <!-- Searchy form -->

            <li id="menu-item-10" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-10">
              <a href="http://www.jackson-hertogs.com/#our-history">
                ABOUT
              </a>
            </li>
            <li id="menu-item-11" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-11">
              <a href="/wordpress/services/">
                SERVICES
              </a>
            </li>
            <li id="menu-item-12" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-12">
              <a href="/wordpress/news/">
                NEWS
              </a>
            </li>
            <li id="menu-item-21" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-21">
              <a href="#footer">
                CONTACT
              </a>
            </li>
            <li id="menu-item-33" data-toggle="modal" data-target="#myModal" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-33"><a href="#">
                LOGIN
              </a>
            </li>
          </ul>

        </div><!-- /.navbar-collapse -->


      </div>

    </nav>

