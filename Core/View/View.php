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
    public function render($view, $args = [])
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

    /**
     * Render template avec Twig
     *
     * @param string $template  file
     * @param array $args  parametres
     */
    public function renderTemplate($template, $args = [])
    {
        static $twig = null;

        if ($twig === null) {
            $loader = new \Twig_Loader_Filesystem('../App/Views');
            $twig = new \Twig_Environment($loader, array('debug' => true));
            // $twig->addExtension(new Twig_Extension_Debug());
        }

        echo $twig->render($template, $args);
    }
}
