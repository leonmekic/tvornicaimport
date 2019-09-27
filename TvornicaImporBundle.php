<?php

namespace Tvornica\ImporBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class TvornicaImporBundle extends AbstractPimcoreBundle
{
    public function getJsPaths()
    {
        return [
            '/bundles/tvornicaimpor/js/pimcore/startup.js'
        ];
    }
}