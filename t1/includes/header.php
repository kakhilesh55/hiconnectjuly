<?php 
$title = ($user_details['type']==1)?$user_details['name']:$company_details['company_name'];
$description = ($user_details['type']==1)?$user_details['about']:$company_details['description'];
?>
<html>
    
<!-- Mirrored from mycrd.in/gasco-tec-engineering by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Jan 2022 07:29:15 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
        <base >
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Shadows+Into%20Light&amp;display=swap" media="all" id="shr-font-shadows-into light">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
        <link href="includes/templates/template3/t3-style.3.css" rel="stylesheet">
        <link href="includes/templates/common/css/star-rating.css" rel="stylesheet">
        <link rel="stylesheet" href="includes/cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css">
        <script async defer crossorigin="anonymous" src="includes/connect.facebook.net/en_US/sdk.js#xfbml=1&version=v5.0"></script>
        <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0 minimal-ui">
        <meta property="og:image" itemprop="image" content=""/>
        <meta property="og:type" content="website" />
        <meta property="og:description" content=" <?php echo $description;?> " />
        <title><?php echo $title;?></title>
        <meta name="title" content="<?php echo $title;?>" />
        <link rel="manifest" id="manifest-placeholder">
        <script>
            var dynamicManifest = {
                "name": "<?php echo $title;?>",
                "short_name": "<?php echo $title;?>",
                "description": "<?php echo $title;?>",
                "start_url": "",
                "background_color": "#000000",
                "theme_color": "#0f4a73",
                "icons": [{
                    "src": "",
                    "sizes": "256x256",
                    "type": "image/png"
                }],
                "display": "standalone"
            }
          const stringManifest = JSON.stringify(dynamicManifest);
          const blob = new Blob([stringManifest], {type: 'application/json'});
          const manifestURL = URL.createObjectURL(blob);
          document.querySelector('#manifest-placeholder').setAttribute('href', manifestURL);
        </script>
        <script>
            document.documentElement.style.setProperty('--theme-color', '#ec3835');
            document.documentElement.style.setProperty('--theme-color-light', '#ec383526');
            window.cardId = 'digital-card';
        </script>
    </head>