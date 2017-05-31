<?php

namespace ArrowebBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ArrowebBundle extends Bundle
{
	public function getParent()
	{
	    return 'FOSUserBundle';
	}
}
