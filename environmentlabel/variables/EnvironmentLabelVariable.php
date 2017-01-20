<?php
namespace Craft;

class EnvironmentLabelVariable
{
	public function showLabel()
	{
		return craft()->environmentLabel->getShowLabel();
	}
	public function label()
	{
		return craft()->environmentLabel->getLabel();
	}
	public function prefix()
	{
		return craft()->environmentLabel->getPrefix();
	}
	public function suffix()
	{
		return craft()->environmentLabel->getSuffix();
	}
	public function labelColor()
	{
		return craft()->environmentLabel->getLabelColor();
	}
	public function textColor()
	{
		return craft()->environmentLabel->getTextColor();
	}
	public function renderedTemplate()
	{
		return craft()->environmentLabel->getRenderedTemplate();
	}
}
