<?php
namespace App\Logic\LightModules;

use App\Interfaces\ILightModule;
use App\Interfaces\ILightModuleConfig;

class LightModule implements ILightModule {

    public ILightModuleConfig $config;

    public function __construct(ILightModuleConfig $config) {
        $this->config = $config;
    }
}
