<?php defined( '_JEXEC' ) or die;

// variables
$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$menu = $app->getMenu();
$active = $app->getMenu()->getActive();
$params = $app->getParams();
$pageclass = $params->get('pageclass_sfx');
$tpath = $this->baseurl.'/templates/'.$this->template;
$templateparams	= $app->getTemplate(true)->params;

// generator tag
$this->setGenerator(null);

// force latest IE & chrome frame
$doc->setMetadata("viewport", "width=device-width, initial-scale=1.0");
$doc->setMetadata('x-ua-compatible','IE=edge,chrome=1');

// css
$doc->addStyleSheet($tpath.'/css/template.min.css');
$doc->addStyleSheet($tpath.'/css/editor.css');

// Font
$doc->addStyleSheet('https://fonts.googleapis.com/css?family=Open+Sans:300,400,700');

// remove unwanted scripts
unset($doc->_scripts[JURI::root(true) . '/media/jui/js/bootstrap.min.js']);
unset($doc->_scripts[JURI::root(true) . '/media/system/js/mootools-core.js']);
unset($doc->_scripts[JURI::root(true) . '/media/system/js/caption.js']);
unset($this->_script['text/javascript']); // removes jCaption from head

// js
JHtml::_('jquery.framework');
$doc->addScript($tpath.'/js/template.min.js');

$doc->addScript($tpath.'/js/plugins/uikit/uikit.min.js');
$doc->addScript($tpath.'/js/plugins/uikit/offcanvas.min.js');

// Template Parameters

// Logo über Template hinzufügen
if ($this->params->get('logoFile'))
{
	$logo = '<img src="' . JUri::root() . $this->params->get('logoFile') . '" class="my-logo" alt="Logo" />';
} else {
    $logo = "";
}