<?php
/**
 * @version		$Id: plg_system_slprettyphoto.php 2012-08-25 Rajesh Kaswala $
 * @package		StarLite Pretty Photo
 * @copyright	Copyright (C) 2012 Rajesh Kaswala. All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

if(version_compare(JVERSION,'1.6.0','ge')) {
	jimport('joomla.form.formfield');
	class JFormFieldHeader extends JFormField {

		var	$type = 'header';

		function getInput(){
			//return JElementHeader::fetchElement($this->name, $this->value, $this->element, $this->options['control']);
            $value = $this->value;
            $document = & JFactory::getDocument();
            $document->addStyleDeclaration('
			.SLHeaderClr { clear:both; height:0; line-height:0; border:none; float:none; background:none; padding:0; margin:0; }
			.SLHeaderContainer { clear:both; font-weight:bold; font-size:12px; color:#369; margin:12px 0 4px; padding:0; background:#d5e7fa; border-bottom:2px solid #96b0cb; float:left; width:100%; }
			.SLHeaderContainer15 { clear:both; font-weight:bold; font-size:12px; color:#369; margin:0; padding:0; background:#d5e7fa; border-bottom:2px solid #96b0cb; float:left; width:100%; }
			.SLHeaderContent { padding:6px 8px; }
		');
            if(version_compare(JVERSION,'1.6.0','ge')) {
                return '<div class="SLHeaderContainer"><div class="SLHeaderContent">'.JText::_($value).'</div><div class="SLHeaderClr"></div></div>';
            } else {
                return '<div class="SLHeaderContainer15"><div class="SLHeaderContent">'.JText::_($value).'</div><div class="SLHeaderClr"></div></div>';
            }
		}

		function getLabel(){
			return '';
		}

	}
}

jimport('joomla.html.parameter.element');
if(class_exists('JElement')){
    class JElementHeader extends JElement {

        var	$_name = 'header';

        function fetchElement($name, $value, &$node, $control_name){
            $document = & JFactory::getDocument();
            $document->addStyleDeclaration('
                .SLHeaderClr { clear:both; height:0; line-height:0; border:none; float:none; background:none; padding:0; margin:0; }
                .SLHeaderContainer { clear:both; font-weight:bold; font-size:12px; color:#369; margin:12px 0 4px; padding:0; background:#d5e7fa; border-bottom:2px solid #96b0cb; float:left; width:100%; }
                .SLHeaderContainer15 { clear:both; font-weight:bold; font-size:12px; color:#369; margin:0; padding:0; background:#d5e7fa; border-bottom:2px solid #96b0cb; float:left; width:100%; }
                .SLHeaderContent { padding:6px 8px; }
            ');
            if(version_compare(JVERSION,'1.6.0','ge')) {
                return '<div class="SLHeaderContainer"><div class="SLHeaderContent">'.JText::_($value).'</div><div class="SLHeaderClr"></div></div>';
            } else {
                return '<div class="SLHeaderContainer15"><div class="SLHeaderContent">'.JText::_($value).'</div><div class="SLHeaderClr"></div></div>';
            }
        }

        function fetchTooltip($label, $description, &$node, $control_name, $name){
            return NULL;
        }
    }
}
