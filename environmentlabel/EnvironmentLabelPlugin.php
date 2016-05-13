<?php

namespace Craft;

class LabelEnvironmentPlugin extends BasePlugin
{

    function init() {

        
        $environmentName = craft()->labelEnvironment_config->getEnvironmentName();
        $pluginSettings = craft()->plugins->getPlugin('labelenvironment')->getSettings();

        // check we have a cp request as we don't want to this js to run anywhere but the cp
        // and while we're at it check for a logged in user as well
        if ( craft()->request->isCpRequest() && craft()->userSession->isLoggedIn() )
        {
            // the includeJs method lets us add js to the bottom of the page
            craft()->templates->includeJs('window.environmentName ="' . $environmentName .'"');
            craft()->templates->includeCss('body:before { content: "' . $pluginSettings->prefix . ' ' . $environmentName . ' ' . $pluginSettings->suffix . '"; }');
            
            if (isset($pluginSettings->colorMappings[$environmentName]))
            {
                craft()->templates->includeCss('body:before { background-color: '. $pluginSettings->colorMappings[$environmentName] . '; }');
            }
            craft()->templates->includeCssResource('labelenvironment/environment.css');

        }

    }

    /**
    * Returns the plugin name.
    *
    * @return string
    */
    public function getName()
    {
        return 'Label Environment';
    }


    /**
     * Returns the plugin version.
     *
     * @return string
     */
    public function getVersion()
    {
        return '0.1.0';
    }


    /**
     * Returns the name of the plugin developer.
     *
     * @return string
     */
    public function getDeveloper()
    {
        return 'Kind';
    }


    /**
     * Returns the preferred URL of the plugin developer.
     *
     * @return string
     */
    public function getDeveloperUrl()
    {
        return 'http://madebykind.com';
    }

    /**
     * Registers the Twig extension.
     *
    * @return LabelEnvironmentTwigExtension
     */
    public function addTwigExtension()
    {
        Craft::import('plugins.labelenvironment.twigextensions.LabelEnvironmentTwigExtension');
        return new LabelEnvironmentTwigExtension();
    }


    public function getSettingsHtml()
    {
        return craft()->templates->render('labelenvironment/settings', array(
            'settings' => $this->getSettings()
        ));
    }

    protected function defineSettings()
    {
        return array(
            'colorMappings' => array(AttributeType::Mixed, 'default' => array('development' => '#00ff00', 'staging' => '#0000ff', 'preview' => '#ff0000', 'production' => '#000000')),
            'prefix' => array(AttributeType::String, 'required' => false, 'default' => ''),
            'suffix' => array(AttributeType::String, 'required' => false, 'default' => ''),
        );
    }
}
