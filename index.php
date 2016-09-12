<?php defined( '_JEXEC' ) or die; ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">  
    <head>
        <jdoc:include type="head" />

        <?php include_once JPATH_THEMES.'/'.$this->template.'/logic.php'; ?>
        
    </head>

    <body class="<?php echo (($menu->getActive() == $menu->getDefault()) ? ('front') : ('site')).' '.$active->alias.' '.$pageclass; ?>" role="document">

        <?php if ( $this->countModules("main-menu") ) : ?>
		<nav class="navbar uk-navbar mainnav">
			<div class="navbar__inner uk-container uk-container-center">
                <?php if ( $logo ) : ?>
				<a class="navbar__logo" href="<?php echo $this->baseurl; ?>">
					<?php echo $logo; ?>
				</a>
                <?php endif; ?>				

                <div class="navbar__items uk-hidden-small uk-hidden-medium">
                    <jdoc:include type="modules" name="main-menu" style="none" />
                </div>

                <a href="#offcanvas" class="hamburger uk-hidden-large uk-hidden-xlarge" data-uk-offcanvas>
                    ☰
                </a>
			</div>
		</nav>
		<?php endif; ?> 


        <?php if( $this->countModules('offcanvas') ) : ?>
		<div id="offcanvas" class="uk-offcanvas offcanvas">
			<div class="uk-offcanvas-bar uk-offcanvas-bar-flip offcanvas__inner">
				<jdoc:include type="modules" name="offcanvas" style="none" />
			</div>
		</div>
		<?php endif; ?>


        <div class="page-content uk-container uk-container-center">
            <main id="test" role="main" class="content content--main <?php echo $contentWidth; ?>">
                <jdoc:include type="message" />
                <jdoc:include type="component" />
            </main>
        </div>
        
        
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