<?php
namespace Craft;

class LabelEnvironment_ConfigService extends BaseApplicationComponent
{
    /**
     * Returns the 'environmentName' config variable, if it exists, or null.
     *
     * @return string | null
     */
    public function getEnvironmentName()
    {
        return CRAFT_ENVIRONMENT;
    }
}
