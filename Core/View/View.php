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
     * @param array $args  Associative array of data to display in the view (optional)
     *
     * @return void
     */
    public function render(string $view, $args = [])
    {
        extract($args, EXTR_SKIP);

        $file = "../App/Views/$view";

        if (is_readable($file)) {
            ob_start();
            require $file;
            $content = ob_get_contents();
            return $content;
        } else {
            throw new \Exception("$file not found");
        }
    }
}
