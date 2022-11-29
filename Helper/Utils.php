<?php
/**
 * @author WebTechnologyCodes Team
 * @copyright Copyright (c) 2017 WebTechnologyCodes (https://www.WebTechnologyCodes.com)
 * @package WebTechnologyCodes_Base
 */


namespace WebTechnologyCodes\Base\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Utils extends AbstractHelper
{
    public function _exit($code = 0)
    {
        $exit = create_function('$a', 'exit($a);');
        $exit($code);
    }

    public function _echo($a)
    {
        $echo = create_function('$a', 'echo $a;');
        $echo($a);
    }
}
