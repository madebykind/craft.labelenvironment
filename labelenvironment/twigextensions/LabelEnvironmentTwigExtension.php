<?php
namespace Craft;

class LabelEnvironmentTwigExtension extends \Twig_Extension
{
    /**
     * Returns an array of global variables.
     *
     * @return array An array of global variables.
     */
    public function getGlobals()
    {
        $globals['environmentName'] = craft()->labelEnvironment_config->getEnvironmentName();

        return $globals;
    }


    /**
     * Returns the Twig extension name.
     *
     * @return string
     */
    public function getName()
    {
        return 'LabelEnvironment';
    }
}
