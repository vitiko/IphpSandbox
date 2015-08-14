<?php

use Iphp\CoreBundle\Kernel\AppKernel as IphpKernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends IphpKernel
{


    public function addBundles()
    {
        return array (
            new \Iphpsandbox\PhotoBundle\IphpsandboxPhotoBundle(),
           // new \Sonata\CoreBundle\SonataCoreBundle()
        );
    }


    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__ . '/config/config_' . $this->getEnvironment() . '.yml');
    }

}
