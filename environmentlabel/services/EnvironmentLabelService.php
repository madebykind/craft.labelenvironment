<?php
namespace Craft;

/**
 * EnvironmentLabelService
 *
 * @author    Tom Davies <tom@madebykind.com>, Michael Rog <michael@michaelrog.com>
 * @copyright Copyright (c) 2016, Kind
 * @see       https://github.com/madebykind/craft.labelenvironment
 * @package   craft.plugins.environmentlabel
 * @since     2.0
 */
class EnvironmentLabelService extends BaseApplicationComponent
{
	/**
	 * Returns the show label bool
	 *
	 * @return bool
	 */
	public function getShowLabel()
	{
		$showLabel = craft()->config->get('showLabel', 'environmentlabel');
		return is_bool($showLabel) ? $showLabel : false;
	}

	/**
	 * Returns the environment label
	 *
	 * @return string
	 */
	public function getLabel()
	{
		$environmentLabel = craft()->config->get('label', 'environmentlabel');
		return !empty($environmentLabel) ? $environmentLabel : CRAFT_ENVIRONMENT;
	}

	/**
	 * Returns the label prefix, or null if none is set
	 *
	 * @return string|null
	 */
	public function getPrefix()
	{
		return craft()->config->get('prefix', 'environmentlabel');
	}

	/**
	 * Returns the label suffix, or null if none is set
	 *
	 * @return string|null
	 */
	public function getSuffix()
	{
		return craft()->config->get('suffix', 'environmentlabel');
	}

	/**
	 * Returns the template for the label
	 *
	 * @return string|null
	 */
	public function getTemplate()
	{
		return craft()->config->get('labelTemplate', 'environmentlabel');
	}

	/**
	 * Parses the labelTemplate config setting as either
	 * a file template or template string and renders it
	 *
	 * @return String rendered template
	 */
	public function getRenderedTemplate()
	{
		$templateConfig = $this->getTemplate();

		if (!$templateConfig)
		{
			return false;
		}

		// is this a template path?
		if(craft()->templates->doesTemplateExist($templateConfig))
		{
			return craft()->templates->render($templateConfig);
		}

		// is it a string template
		else
		{
			return craft()->templates->renderString($templateConfig);
		}
	}

	public function getCssResource(){
		return craft()->config->get('cssResource', 'environmentlabel');
	}

	/**
	 * Returns the environment label background color, or null if none is set
	 *
	 * @return string|null
	 */
	public function getLabelColor()
	{
		return craft()->config->get('labelColor', 'environmentlabel');
	}

	/**
	 * Returns the environment label text color, or null if none is set
	 *
	 * @return string|null
	 */
	public function getTextColor()
	{
		return craft()->config->get('textColor', 'environmentlabel');
	}

	/**
	 * Includes the environment data as a visual banner and as a global JS variable
	 */
	public function addEnvironmentLabel()
	{

		$labelContent = $this->getRenderedTemplate();
		$labelColor = $this->getLabelColor();
		$textColor = $this->getTextColor();

		// Include the environment name and label as JS globals
		craft()->templates->includeJs("window.CRAFT_ENVIRONMENT = '" . CRAFT_ENVIRONMENT . "';");

		$showLabel = $this->getShowLabel();
		if ($showLabel && !empty($labelContent))
		{
			// Include the content
			craft()->templates->includeFootHtml($labelContent);
		}
	}
}
