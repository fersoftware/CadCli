<?php
namespace BVW\Application\View;


class View 
{
    public function render($pageName, array $content = array())
    {
        require_once(__DIR__."/Pages/Template/header.php");
        if (count($content)) {
            foreach ($content as $varname => $value) {
                ${$varname} = $value;
            }
        }
        require_once(__DIR__."/Pages/{$pageName}");
        require_once(__DIR__."/Pages/Template/footer.php");
    }
}
