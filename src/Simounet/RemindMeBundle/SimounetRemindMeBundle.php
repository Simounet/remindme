<?php

namespace Simounet\RemindMeBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class SimounetRemindMeBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
