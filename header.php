<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="minimum-scale=1.0, target-densitydpi=device-dpi, width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="HandheldFriendly" content="true">
  <meta name="MobileOptimized" content="320">

  <title><?php wp_title(); ?></title>

  <link rel="icon" type="image/png" sizes="256x256" href="<?php echo get_template_directory_uri();?>/img/favicons/icon256.png">
  <link rel="icon" type="image/png" sizes="128x128" href="<?php echo get_template_directory_uri();?>/img/favicons/icon128.png">
  <link rel="icon" type="image/png" sizes="64x64" href="<?php echo get_template_directory_uri();?>/img/favicons/icon64.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri();?>/img/favicons/icon32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri();?>/img/favicons/icon16.png">
  <link rel="icon" type="image/svg+xml" sizes="any" href="<?php echo get_template_directory_uri();?>/images/icons/iconSVG.svg"> 

  <?php wp_head();?> 

  <script src="https://securepayments.sberbank.ru/payment/docsite/assets/js/ipay.js"></script>
   <script>
     var ipay = new IPAY({api_token: 'o7bp9mkcij0o04qsmh2pknfm6h'});
   </script>

  <script>
    let kabinet_page = "<?echo get_the_permalink(412); ?>";
    let toThencsPageUrl = "<?echo get_the_permalink(410); ?>";
    let osagoThencsPageUrl = "<?echo get_the_permalink(343); ?>";
    let agentThencsPageUrl = "<?echo get_the_permalink(345); ?>";
    let comPredlPage = "<?echo get_the_permalink(373); ?>";
    let oplataPredl = "<?echo get_the_permalink(376); ?>";
  </script>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-195439311-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-195439311-1');
</script>


  <!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(47031072, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true,
        ecommerce:"dataLayer"
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/47031072" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

</head>

<body>

  <? include "modal-win.php";?>
  <div class="great-shadow"></div>

  <div id="wrapper" class="wrapper">

