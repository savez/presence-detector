<?php

/* index.html.twig */
class __TwigTemplate_5843902b901a14c9dd3e70157d70fc99 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("login.html.twig");

        $this->blocks = array(
            'container_content' => array($this, 'block_container_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "login.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_container_content($context, array $blocks = array())
    {
        // line 4
        echo "<script>
\$(document).ready(function(){
  \$('#loginModal').modal();\t
});

</script>
<div id=\"loginModal\" class=\"modal\">
        <div class=\"modal-dialog\">
          <div class=\"modal-content\">
            <div class=\"modal-header\">
              <h4 class=\"modal-title lead\">Area riservata</h4>
            </div>
            <form role=\"form\" method=\"post\" class=\"form\" action=\"/ws/web/\">
            <div class=\"modal-body\">
                <div class=\"input-group input-group-lg\">
                  <span class=\"input-group-addon\">
                    <span class=\"glyphicon glyphicon-user\"></span>
                  </span>
                  <input name=\"username\" type=\"text\" class=\"form-control input-lg\" placeholder=\"Username\" />
                </div><br/>
                <div class=\"input-group input-group-lg\">
                  <span class=\"input-group-addon\">
                    <span class=\"glyphicon glyphicon-lock\"></span>
                  </span>
                  <input name=\"password\" type=\"password\" class=\"form-control input-lg\" placeholder=\"Password\" />
                </div>
            </div>
            <div class=\"modal-footer\">
              <button class=\"btn btn-primary\" type=\"submit\">LOGIN</button>
              </form>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div>

";
    }

    public function getTemplateName()
    {
        return "index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 4,  28 => 3,);
    }
}
