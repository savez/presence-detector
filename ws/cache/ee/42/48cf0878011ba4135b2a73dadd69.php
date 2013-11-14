<?php

/* login.html.twig */
class __TwigTemplate_ee4248cf0878011ba4135b2a73dadd69 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'container_content' => array($this, 'block_container_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
<!DOCTYPE html>
<html lang=\"it\">
  <head>
    <meta charset=\"utf-8\">
            <meta name=\"viewport\" content=\"initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,width=device-width,height=device-height,target-densitydpi=device-dpi,user-scalable=yes\" />

    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"\">

    <title>Gestore Presenze ADMIN</title>

    <!-- Bootstrap core CSS -->
    <link href=\"//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css\" rel=\"stylesheet\">
    <script src=\"//ajax.googleapis.com/ajax/libs/angularjs/1.0.7/angular.min.js\"></script>
    <script src=\"http://cdn.jsdelivr.net/jquery/2.0.3/jquery-2.0.3.min.js\"></script>
    <script src=\"http://code.jquery.com/ui/1.10.3/jquery-ui.js\"></script>
  </head>

  <body>
    <div class=\"container theme-showcase\">
         ";
        // line 22
        $this->displayBlock('container_content', $context, $blocks);
        // line 23
        echo "    </div> <!-- /container -->    
    <script src=\"//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js\"></script>
  </body>
</html>";
    }

    // line 22
    public function block_container_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "login.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  52 => 22,  45 => 23,  43 => 22,  20 => 1,  31 => 4,  28 => 3,);
    }
}
