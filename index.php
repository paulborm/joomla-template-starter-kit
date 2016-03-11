<?php defined( '_JEXEC' ) or die;
include_once JPATH_THEMES.'/'.$this->template.'/logic.php';
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">  
    <head>
        <jdoc:include type="head" />
        
        <?php // Use of Google Font ?>
        <?php if ($this->params->get('googleFont')) : ?>
            <link href='//fonts.googleapis.com/css?family=<?php echo $this->params->get('googleFontName'); ?>' rel='stylesheet' type='text/css' />
            <style type="text/css">
                html {
                    font-family: '<?php echo str_replace('+', ' ', $this->params->get('googleFontName')); ?>', sans-serif;
                }
            </style>
        <?php endif; ?>
        
    </head>

    <body class="<?php echo (($menu->getActive() == $menu->getDefault()) ? ('front') : ('site')).' '.$active->alias.' '.$pageclass; ?>" role="document">
        
    </body>
</html>