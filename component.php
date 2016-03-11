<?php defined( '_JEXEC' ) or die; 

//include_once JPATH_THEMES.'/'.$this->template.'/logic_component.php';

// variables
$app = JFactory::getApplication();
$doc = JFactory::getDocument(); 
$menu = $app->getMenu();
$active = $app->getMenu()->getActive();
$params = $app->getParams();
$pageclass = $params->get('pageclass_sfx');
$tpath = $this->baseurl.'/templates/'.$this->template;
$templateparams	= $app->getTemplate(true)->params;

// remove unwanted scripts
unset($doc->_scripts[JURI::root(true) . '/media/jui/js/jquery.min.js']);
unset($doc->_scripts[JURI::root(true) . '/media/jui/js/jquery-noconflict.js']);
unset($doc->_scripts[JURI::root(true) . '/media/jui/js/jquery-migrate.min.js']);

unset($doc->_scripts[JURI::root(true) . '/media/jui/js/bootstrap.min.js']);
unset($doc->_scripts[JURI::root(true) . '/media/system/js/mootools-core.js']);
unset($doc->_scripts[JURI::root(true) . '/media/system/js/caption.js']);
unset($this->_script['text/javascript']); // removes jCaption from head

?>
<!doctype html>
<html>
    <head>
        <jdoc:include type="head" />
    </head>
    <body>
        <jdoc:include type="component" />
    </body>
</html>
