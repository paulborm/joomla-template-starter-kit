<?php defined( '_JEXEC' ) or die;
include_once JPATH_THEMES.'/'.$this->template.'/logic.php';
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">  
    <head>
        <jdoc:include type="head" />
        
        <?php // Use of Google Font ?>
        <?php if ($this->params->get('googleFont')) : ?>
            <link href='https://fonts.googleapis.com/css?family=<?php echo $this->params->get('googleFontName'); ?>' rel='stylesheet' type='text/css'>
            <style type="text/css">
                html {
                    font-family: '<?php echo str_replace('+', ' ', $this->params->get('googleFontName')); ?>', sans-serif;
                }
            </style>
        <?php endif; ?>
        
    </head>

    <body class="<?php echo (($menu->getActive() == $menu->getDefault()) ? ('front') : ('site')).' '.$active->alias.' '.$pageclass; ?>" role="document">
        
        <jdoc:include type="message" />
        <jdoc:include type="component" />
        
        
        
        
        
        
        <?php if ($this->params->get('googleAnalytics')) : ?>
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', '<?php echo $this->params->get('googleAnalyticsTrackingCode'); ?>', 'auto');
            ga('send', 'pageview');
        </script>
        <?php endif; ?>
        
    </body>
</html>