<?php

/**
 * EnvironmentLabel config.php
 *
 * @author    Tom Davies <tom@madebykind.com>, Michael Rog <michael@michaelrog.com>
 * @copyright Copyright (c) 2017, Kind
 * @see       https://github.com/madebykind/craft.labelenvironment
 * @package   craft.plugins.environmentlabel
 * @since     2.0
 */


return array(

	'showLabel' => true, // you probably want to set this to false in production
	'label' => null, // text of the label itself
	'prefix' => null, // output before the label
	'suffix' => null, // output after the label
	'labelColor' => '#cc5643', // bg color of the label
	'textColor' => '#ffffff', // text color of the label
	'labelTemplate' => 'environmentlabel/default', // can be a path to a plugin template or a template string (e.g. use a HEREDOC)
);
