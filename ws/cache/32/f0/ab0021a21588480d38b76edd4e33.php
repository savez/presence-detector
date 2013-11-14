<?php

/* layout.html.twig */
class __TwigTemplate_32f0ab0021a21588480d38b76edd4e33 extends Twig_Template
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
    <script src=\"js/libs/jquery.ui.timepicker.js\"></script> 

  </head>

  <body style=\"padding-top: 70px;\">
    <div class=\"container theme-showcase\">
         ";
        // line 24
        $this->displayBlock('container_content', $context, $blocks);
        // line 25
        echo "    </div> <!-- /container -->    
    <script src=\"//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js\"></script>
  </body>
</html>";
    }

    // line 24
    public function block_container_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  54 => 24,  47 => 25,  45 => 24,  20 => 1,  250 => 98,  239 => 95,  233 => 94,  229 => 93,  220 => 91,  214 => 90,  206 => 89,  202 => 87,  198 => 86,  176 => 69,  167 => 65,  161 => 64,  155 => 63,  149 => 62,  143 => 61,  137 => 60,  131 => 59,  125 => 58,  119 => 57,  113 => 56,  107 => 55,  101 => 54,  86 => 42,  76 => 35,  71 => 33,  64 => 29,  46 => 14,  36 => 7,  31 => 4,  28 => 3,);
    }
}
