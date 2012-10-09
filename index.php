<?php
date_default_timezone_set("Europe/London");

require 'app.php';

?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />
  <!-- Set the viewport width to device width for mobile -->
  <title>#zottesfeer</title>
  <!-- Included CSS Files (Uncompressed) -->
  <!--
  <link rel="stylesheet" href="stylesheets/foundation.css">
  -->
  <!-- Included CSS Files (Compressed) -->
  <link href="g/c/bootstrap.min.css" rel="stylesheet" />
  <link href="g/c/app.css" rel="stylesheet" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="g/c/bootstrap-responsive.css" rel="stylesheet" />
  <!-- IE Fix for HTML5 Tags -->
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>
<body>
<div class="container-fluid">
  <header role="banner" class="row-fluid">
    <h1 class="span6">#zottesfeer</h1>
    <nav class="span6">
      <div class="btn-group">
        <button class="btn active">Grid</button>
        <button class="btn disabled">Map</button>
      </div>
    </nav>
  </header>
  
  <div role="main" class="row-fluid">
    <ul class="feedthehorse thumbnails">

      <?php

      foreach($data as $timestamp => $item){
        foreach($item as $social => $idata){
          echo '<li class="' . $social . ' span3">';
          echo '<article>';

          switch($social){
            case 'twitter';

              $profile_url = 'http://twitter.com/' . $idata->from_user;

              echo '<header class="meta">';
              echo '<a href="' . $profile_url . '" class="avatar">';
              echo '<img src="' . $idata->profile_image_url . '" class="img-circle" /> ';
              echo '</a>';

              echo '<a href="' . $profile_url . '" class="author">';
              echo $idata->from_user;
              echo '</a>';

              echo '</header>';

              echo '<div class="cnt">';
              echo '<p>' . $idata->text . '</p>';
              echo '<p><small>' . date('d/m/Y H:i', $timestamp) . '</small></p>';
              echo '</div>';

              echo '<footer>';
              echo '<div class="btn-group">';
              echo '<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">';
              echo '<i class="icon-th-list"></i> ';
              echo '<span class="caret"></span>';
              echo '</a>';
              echo '<ul class="dropdown-menu">';
              echo '<li><a  href="' . $profile_url . '/status/' . $idata->id_str . '">View on twitter</a></li>';
              echo '<li><a href="#">View on map</a></li>';
              echo '</ul>';
              echo '</div>';
              echo '</footer>';

            break;

            case 'instagram';

              $profile_url = 'http://twitter.com/' . $idata->from_user;

              echo '<header class="meta">';
              echo '<a href="' . $profile_url . '" class="avatar">';
              echo '<img src="' . $idata->profile_image_url . '" class="img-circle" /> ';
              echo '</a>';

              echo '<a href="' . $profile_url . '" class="author">';
              echo $idata->from_user;
              echo '</a>';

              echo '</header>';

              echo '<div class="cnt">';
              echo '<p><img src="' . $idata->images->low_resolution->url . '" class="img-rounded" /></p>';
              echo '<p><small>' . date('d/m/Y H:i', $timestamp) . '</small></p>';
              echo '</div>';

              echo '<footer>';
              echo '<div class="btn-group">';
              echo '<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">';
              echo '<i class="icon-th-list"></i> ';
              echo '<span class="caret"></span>';
              echo '</a>';
              echo '<ul class="dropdown-menu">';
              echo '<li><a  href="' . $profile_url . '/status/' . $idata->id_str . '">View on twitter</a></li>';
              echo '<li><a href="#">View on map</a></li>';
              echo '</ul>';
              echo '</div>';
              echo '</footer>';

            break;

            default:

              echo date('d/m/Y H:i', $timestamp) . '<br />';
              echo '<pre>';
              print_r($idata);
              echo '</pre>';

          }
          echo '</article>';
          echo '</li>';
        }
      }

      ?>

    </ul>
  </div>
</div>
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script src="g/j/jquery.isotope.js"></script>
  <script src="g/j/bootstrap.min.js"></script>
  <script src="g/j/app.js"></script>
  <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-8684278-9']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
