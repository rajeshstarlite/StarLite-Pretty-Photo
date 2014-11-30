<?php
/**
 * @version		$Id: plg_system_slprettyphoto.php 2012-09-24 StarLite $
 * @package		StarLite Pretty Photo
 * @copyright	Copyright (C) 2012 starliteweb.com All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.plugin.plugin' );
 

class  plgSystemSlPrettyPhoto extends JPlugin
{

	function plgSystemSlPrettyPhoto(& $subject, $config)
	{
		parent::__construct($subject, $config);
	}
 
	
	function onAfterDispatch()
	{
		$app = JFactory::getApplication();
		
		if ($app->isAdmin()) return;
		
		$doc	=& JFactory::getDocument();
		
		if(version_compare(JVERSION,'1.6.0','ge')) {
			$pluginLivePath	=JURI::root(true)."/plugins/system/slprettyphoto/slprettyphoto";
		}else{
			$pluginLivePath=JURI::root(true)."/plugins/system/slprettyphoto";
		}
		
		$include_jquery = $this->params->get('include_jquery',1) ;
		if($include_jquery){
			$doc->addScript($pluginLivePath."/js/jquery-1.8.2.min.js");
		}
		
		$doc->addScript($pluginLivePath."/js/jquery.prettyPhoto.js");
		$doc->addStyleSheet($pluginLivePath."/css/prettyPhoto.css");
		
		$noConflict =$this->params->get('jquery_conflict',0) ;
		if($noConflict){
			 $slconfig = "jQuery.noConflict(); jQuery(document).ready(function(){ 
							jQuery(\"body a[rel^='prettyPhoto']\").prettyPhoto({
							theme:'".$this->params->get('theme','pp_default')."',
							show_title:".$this->params->get('show_title',0).",
							animation1_speed:'".$this->params->get('animation_speed','fast')."',
							slideshow:'".$this->params->get('slideshow','5000')."',
							opacity:'".$this->params->get('opacity','0.80')."',
							autoplay_slideshow:".$this->params->get('autoplay_slideshow',1).",
							counter_separator_label:'".$this->params->get('counter_separator_label','/')."',
							autoplay:".$this->params->get('autoplay',1)."";
							if(!$this->params->get('social_tools',1)){
							$slconfig.= ",social_tools:".$this->params->get('social_tools')."";
							}					
							$slconfig.= "});
						});";
		}else{		
			$slconfig = "$(document).ready(function(){ 
								$(\"body a[rel^='prettyPhoto']\").prettyPhoto({
								theme:'".$this->params->get('theme','pp_default')."',
								show_title:".$this->params->get('show_title',0).",
								animation1_speed:'".$this->params->get('animation_speed','fast')."',
								slideshow:'".$this->params->get('slideshow','5000')."',
								opacity:'".$this->params->get('opacity','0.80')."',
								autoplay_slideshow:".$this->params->get('autoplay_slideshow',1).",
								counter_separator_label:'".$this->params->get('counter_separator_label','/')."',
								autoplay:".$this->params->get('autoplay',1)."";
								if(!$this->params->get('social_tools',1)){
								$slconfig.= ",social_tools:".$this->params->get('social_tools')."";
								}					
								$slconfig.= "});
							});";
		}
		
		$doc->addScriptDeclaration($slconfig);

	}
	
}