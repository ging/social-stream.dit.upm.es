<!doctype html>  

<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
  
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    
    <title>
      <?php if ( !is_front_page() ) { echo wp_title( ' ', true, 'left' ); echo ' | '; }
      echo bloginfo( 'name' ); echo ' - '; bloginfo( 'description', 'display' );  ?> 
    </title>
        
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- icons & favicons -->
    <!-- For iPhone 4 -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/h/apple-touch-icon.png">
    <!-- For iPad 1-->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/m/apple-touch-icon.png">
    <!-- For iPhone 3G, iPod Touch and Android -->
    <link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/l/apple-touch-icon-precomposed.png">
    <!-- For Nokia -->
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/l/apple-touch-icon.png">
    <!-- For everything else -->
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">  
 
    <!-- media-queries.js (fallback) -->
    <!--[if lt IE 9]>
      <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>     
    <![endif]-->
   
    <!-- html5.js -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
      <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

     
    <!-- wordpress head functions -->
    <?php wp_head(); ?>
    <!-- end of wordpress head -->

    <!-- theme options from options panel -->
    <?php get_wpbs_theme_options(); ?>

    <?php 

      // check wp user level
      get_currentuserinfo(); 
      // store to use later
      global $user_level; 

      // get list of post names to use in 'typeahead' plugin for search bar
      if(of_get_option('search_bar', '1')) { // only do this if we're showing the search bar in the nav

        global $post;
        $tmp_post = $post;
        $get_num_posts = 40; // go back and get this many post titles
        $args = array( 'numberposts' => $get_num_posts );
        $myposts = get_posts( $args );
        $post_num = 0;

        global $typeahead_data;
        $typeahead_data = "[";

        foreach( $myposts as $post ) :  setup_postdata($post);
          $typeahead_data .= '"' . get_the_title() . '",';
        endforeach;

        $typeahead_data = substr($typeahead_data, 0, strlen($typeahead_data) - 1);

        $typeahead_data .= "]";

        $post = $tmp_post;

      } // end if search bar is used

    ?>
       <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap-rewrite.css"> 
       <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/social-rewrite.css"> 
       <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/library/js/bootstrap.min.js"></script>
       <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/library/js/modernizr.full.min.js"></script>
       <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/library/js/jmpress.js"></script>
       <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/library/js/jquery.jmslideshow.js"></script>
  <noscript>
    <style>
    .step {
      width: 100%;
      position: relative;
    }
    .step:not(.active) {
      opacity: 1;
      filter: alpha(opacity=99);
      -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=99)";
    }
    .step:not(.active) a.jms-link{
      opacity: 1;
      margin-top: 40px;
    }
    </style>
  </noscript>
  
  </head>
  
  <body <?php body_class(); ?>>
        
    <header id="inner-header" class="clearfix">
      <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container-fluid nav-container">
            <nav role="navigation">
              <a class="brand" id="logo" href="http://social-stream.dit.upm.es/">
                <div class="logo">
                </div>
              </a>
              <a href="#main" class="go-top"><i class="icon-chevron-up"></i></a>
              <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </a>
              
              <div class="nav-collapse">
                <ul class="nav">
                  <li class="<?php if (is_page('home')){ echo "active";}?>">
                    <a href="/">Home</a>
                  </li>
                  <li class="<?php if (is_home()){ echo "active";}?>">
                    <a href="/blog/">Blog</a>
                  </li>
                  <li class="">
                    <a href="http://demo-social-stream.dit.upm.es" target="_blank">Demo</a>
                  </li>
                  <li class="<?php if (is_page('community')){ echo "active";}?>">
                    <a href="/community/">Community</a>
                  </li>
                  <li class="<?php if (is_page('started')){ echo "active";}?>">
                    <a href="/started/">Get started</a>
                  </li>
                </ul>
              </div>      
            </nav>              
          </div>
        </div>
      </div>
    </header> <!-- end #inner-header -->
    
    <div class="wrapper container-fluid">
      <div class="content_wrapper">
        <div class="content_inner_wrapper">