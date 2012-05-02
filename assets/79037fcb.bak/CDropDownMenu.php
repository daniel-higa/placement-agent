<?php
/**
 * CDropDownMenu class file.
 *
 * @author Herbert Maschke <thyseus@gmail.com>
 * @link http://www.yiiframework.com/
 */

/**
 * CDropDownMenu is an extension to CMenu that supports Drop-Down Menus using the
 * superfish jquery-plugin.
 *
 * Please be sure to also read the CMenu API Documentation to understand how this 
 * menu works.
 *
 */

Yii::import('zii.widgets.CMenu');

class CDropDownMenu extends CMenu
{
	/**
	 * Initializes the menu widget.
	 */
	public function init()
	{
		parent::init();
	}

	/**
	 * Calls {@link renderMenu} to render the menu.
	 */
	public function run()
	{
		$this->renderDropDownMenu($this->items);
	}

	protected function renderDropDownMenu($items)
	{
		$this->htmlOptions = array_merge($this->htmlOptions, array('class' => 'sf-menu'));
		$this->renderMenu($items);

		$this->registerClientScript();
		}

	protected function registerClientScript() {
		$basePath=Yii::getPathOfAlias('application.extensions.vendors');
		$baseUrl = Yii::app()->getAssetManager()->publish($basePath);

		Yii::app()->clientScript->registerCoreScript('jquery');
		Yii::app()->clientScript->registerCssFile($baseUrl . '/' . 'superfish.css'); 
		Yii::app()->clientScript->registerScriptFile($baseUrl . '/' . 'superfish.js',CClientScript::POS_HEAD);
		Yii::app()->clientScript->registerScriptFile($baseUrl . '/' . 'hoverIntent.js',CClientScript::POS_HEAD);
		Yii::app()->clientScript->registerScriptFile($baseUrl . '/' . 'CDropDownMenu.js',CClientScript::POS_HEAD);
	}

}
