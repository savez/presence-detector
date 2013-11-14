<?php

/* opzioni.html.twig */
class __TwigTemplate_ea08d884655b5d5a960425026e0fb3bf extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout.html.twig");

        $this->blocks = array(
            'container_content' => array($this, 'block_container_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.html.twig";
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
  \$('#scelta_mese').change(function(){
      var foo = \"";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "getBaseURL", array(), "method"), "html", null, true);
        echo "/excelorari/\"+\$(this).val();
      \$('#stampa_pdf_orari').attr('href',foo);
  });

  \$('.elimina_utente').click(function(e){
      e.preventDefault();
      \$('#modalDelete #utente').html(\$(this).attr('data-utente'));
      \$('#modalDelete #href_delete_utente').attr('href','";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "getBaseURL", array(), "method"), "html", null, true);
        echo "/deleteutente/'+\$(this).attr('data-id'));
      \$('#modalDelete').modal();
  });
});
</script>
<nav role=\"navigation\" class=\"navbar navbar-default navbar-fixed-top\">
        <!-- Brand and toggle get grouped for better mobile display -->

        <div class=\"navbar-header\">
          <button data-target=\".navbar-ex5-collapse\" data-toggle=\"collapse\" class=\"navbar-toggle\" type=\"button\">
            <span class=\"sr-only\">Toggle navigation</span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
          </button>
          <a href=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "url_generator"), "generate", array(0 => "opzioni"), "method"), "html", null, true);
        echo "\" class=\"navbar-brand\">Area ammnistrativa</a>
        </div>
        <ul class=\"nav navbar-nav navbar-right\">
            <li class=\"dropdown\">
              <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Benvenuto <strong>";
        // line 33
        echo twig_escape_filter($this->env, $this->getContext($context, "utente_loggato"), "html", null, true);
        echo "</strong> <b class=\"caret\"></b></a>
              <ul class=\"dropdown-menu\">
                <li ><a href=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "url_generator"), "generate", array(0 => "logout"), "method"), "html", null, true);
        echo "\"><span class=\"glyphicon glyphicon-off\"></span> Esci</a></li>
              </ul>
            </li>
          </ul>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class=\"collapse navbar-collapse navbar-ex5-collapse\">
          <ul class=\"nav navbar-nav\">
            <li class=\"active\"><a href=\"http://";
        // line 42
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "host"), "html", null, true);
        echo "\"><span class=\"glyphicon glyphicon-home\"></span> Home</a></li>
          </ul>
        </div>
</nav>        

<div class=\"alert alert-info\">
<div class=\"row\">
  <div class=\"col-md-7\">
<span class=\"lead\"> Salva foglio presenze: </span>
</div>
  <div class=\"col-md-3\">
    <select id=\"scelta_mese\" class=\"form-control\" name=\"mese\">
      <option ";
        // line 54
        if (($this->getContext($context, "mese") == 1)) {
            echo " selected=\"selected\" ";
        }
        echo " value=\"1\">Gennaio</option>
      <option ";
        // line 55
        if (($this->getContext($context, "mese") == 2)) {
            echo " selected=\"selected\" ";
        }
        echo " value=\"2\">Febbraio</option>
      <option ";
        // line 56
        if (($this->getContext($context, "mese") == 3)) {
            echo " selected=\"selected\" ";
        }
        echo " value=\"3\">Marzo</option>
      <option ";
        // line 57
        if (($this->getContext($context, "mese") == 4)) {
            echo " selected=\"selected\" ";
        }
        echo " value=\"4\">Aprile</option>
      <option ";
        // line 58
        if (($this->getContext($context, "mese") == 5)) {
            echo " selected=\"selected\" ";
        }
        echo " value=\"5\">Maggio</option>
      <option ";
        // line 59
        if (($this->getContext($context, "mese") == 6)) {
            echo " selected=\"selected\" ";
        }
        echo " value=\"6\">Giugno</option>
      <option ";
        // line 60
        if (($this->getContext($context, "mese") == 7)) {
            echo " selected=\"selected\" ";
        }
        echo " value=\"7\">Luglio</option>
      <option ";
        // line 61
        if (($this->getContext($context, "mese") == 8)) {
            echo " selected=\"selected\" ";
        }
        echo " value=\"8\">Agosto</option>
      <option ";
        // line 62
        if (($this->getContext($context, "mese") == 9)) {
            echo " selected=\"selected\" ";
        }
        echo " value=\"9\">Settembre</option>
      <option ";
        // line 63
        if (($this->getContext($context, "mese") == 10)) {
            echo " selected=\"selected\" ";
        }
        echo " value=\"10\">Ottobre</option>
      <option ";
        // line 64
        if (($this->getContext($context, "mese") == 11)) {
            echo " selected=\"selected\" ";
        }
        echo " value=\"11\">Novembre</option>
      <option ";
        // line 65
        if (($this->getContext($context, "mese") == 12)) {
            echo " selected=\"selected\" ";
        }
        echo " value=\"12\">Dicembre</option>
    </select>
  </div>
  <div class=\"col-md-2\">
    <a id=\"stampa_pdf_orari\" class=\"btn btn-primary\" href=\"";
        // line 69
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "getBaseURL", array(), "method"), "html", null, true);
        echo "/excelorari/";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "m"), "html", null, true);
        echo "\"><span class=\"glyphicon glyphicon-print\"></span> SALVA PDF</a>
  </div>
</div>
</div>

<div class=\"\">
  <span class=\"lead\">Elenco Dipendenti</span>
  <table class=\"table table-striped table-bordered table-condensed\">
    <thead>
      <tr>
        <th>Operazioni</th>
        <th>Codice</th>
        <th>Nome</th>
        <th>Ultimo accesso</th>
      </tr>
    </thead>
    <tbody>
      ";
        // line 86
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "users"));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 87
            echo "      <tr>
        <td>
          <a data-utente=\"";
            // line 89
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "cognome"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "nome"), "html", null, true);
            echo "\" data-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "codice"), "html", null, true);
            echo "\" style=\"margin-right:15px;\" href=\"#\" title=\"Elimina utente\" class=\"elimina_utente btn btn-default btn-sm\"><span class=\"glyphicon glyphicon-trash\"></span> Utente</a>
          <a style=\"margin-right:15px;\" href=\"";
            // line 90
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "getBaseURL", array(), "method"), "html", null, true);
            echo "/singlepdf/";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "codice"), "html", null, true);
            echo "\" title=\"salva singolo PDF\" class=\"btn btn-default btn-sm\"><span class=\"glyphicon glyphicon-print\"></span> Mese corrente</a>
          <a href=\"";
            // line 91
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "getBaseURL", array(), "method"), "html", null, true);
            echo "/viewpresenze/";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "codice"), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "m"), "html", null, true);
            echo "\" title=\"visiona presenze\" class=\"btn btn-default btn-sm\"><span class=\"glyphicon glyphicon-eye-open\"></span> Presenze</a>
        </td>
        <td>";
            // line 93
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "codice"), "html", null, true);
            echo "</td>
        <td>";
            // line 94
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "cognome"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "nome"), "html", null, true);
            echo "</td>
        <td><span style=\"margin-right:15px;\">";
            // line 95
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "dataformat"), "html", null, true);
            echo "</span> ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "user"), "orario"), "html", null, true);
            echo "</td>
      </tr>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 98
        echo "    </tbody>
  </table>
</div>

<!-- Modale alert elimina -->
  <div class=\"modal\" id=\"modalDelete\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
      <div class=\"modal-content\">
        <div class=\"modal-header\">
          <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
          <h4 class=\"modal-title\"><p class=\"text-danger\"><span class=\"glyphicon glyphicon-warning-sign\"></span> ATTENZIONE!</p></h4>
        </div>
        <div class=\"modal-body\">
          <p>Vuoi davvero eliminare l'utente <strong><span id=\"utente\" class=\"lead\"></span></strong> ?</p>
        </div>
        <div class=\"modal-footer\">
          <a id=\"href_delete_utente\" href=\"\" class=\"btn btn-danger\"><span class=\"glyphicon glyphicon-trash\"></span> Elimina</a>
          <a href=\"\" class=\"btn btn-default\" data-dismiss=\"modal\" aria-hidden=\"true\">Annula</a>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
<!-- ./Modale alert elimina -->

";
    }

    public function getTemplateName()
    {
        return "opzioni.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  250 => 98,  239 => 95,  233 => 94,  229 => 93,  220 => 91,  214 => 90,  206 => 89,  202 => 87,  198 => 86,  176 => 69,  167 => 65,  161 => 64,  155 => 63,  149 => 62,  143 => 61,  137 => 60,  131 => 59,  125 => 58,  119 => 57,  113 => 56,  107 => 55,  101 => 54,  86 => 42,  76 => 35,  71 => 33,  64 => 29,  46 => 14,  36 => 7,  31 => 4,  28 => 3,);
    }
}
