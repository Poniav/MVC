<?php

namespace Core\View;
/**
 * View
 */
class View
{
    /**
     * Render a view file
     *
     * @param string $view  The view file
     * @param type array $args display in view
     *
     * @return void
     */
    public function render(string $view, array $args = [])
    {
        extract($args, EXTR_SKIP);

        $file = "../App/Views/$view";

        if (!is_readable($file)) {
            throw new \Exception("$file not found");
        }

        require $file;
    }
}
