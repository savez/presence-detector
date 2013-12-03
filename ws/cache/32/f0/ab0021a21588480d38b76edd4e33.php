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
<html lang=\"it\" ng-app>
  <head>
    <meta charset=\"utf-8\">
            <meta name=\"viewport\" content=\"initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,width=device-width,height=device-height,target-densitydpi=device-dpi,user-scalable=yes\" />

    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"\">

    <title>Gestore Presenze ADMIN</title>

    <!-- Bootstrap core CSS -->
    <link href=\"//netdna.bootstrapcdn.com/bootswatch/3.0.1/cerulean/bootstrap.min.css\" rel=\"stylesheet\">
    <script src=\"http://code.angularjs.org/1.2.1/angular.min.js\"></script>
    <script src=\"http://cdn.jsdelivr.net/jquery/2.0.3/jquery-2.0.3.min.js\"></script>
    <script src=\"http://code.jquery.com/ui/1.10.3/jquery-ui.js\"></script>
    <script src=\"/js/libs/jquery.ui.timepicker.js\"></script> 
    <script src=\"/ws/web/js/app.js\"></script>

  </head>

  <body style=\"padding-top: 70px;\">
    <div class=\"container theme-showcase\">
         ";
        // line 25
        $this->displayBlock('container_content', $context, $blocks);
        // line 26
        echo "    </div> <!-- /container -->    
    <script src=\"//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js\"></script>
  </body>
</html>";
    }

    // line 25
    public function block_container_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  55 => 25,  48 => 26,  46 => 25,  20 => 1,);
    }
}
