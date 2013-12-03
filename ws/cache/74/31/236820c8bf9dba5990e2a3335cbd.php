<?php

/* viewpresenze.html.twig */
class __TwigTemplate_7431236820c8bf9dba5990e2a3335cbd extends Twig_Template
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
        echo "/viewpresenze/";
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "/\"+\$(this).val();
      \$('#viewpresenze_href').attr('href',foo);
  });

  \$('.modifica_presenza').click(function(e){
      e.preventDefault();
      \$('#mod_giorno').html(\$(this).attr('data-giorno'));
      \$('#form-modifica input[name=\"id_orario\"]').val(\$(this).attr('data-idorario'));
      \$('#form-modifica input[name=\"id_utente\"]').val(\$(this).attr('data-idutente'));
      \$('#form-modifica input[name=\"mese\"]').val(\$(this).attr('data-mese'));
      \$('#form-modifica input[name=\"ora\"]').val(\$(this).attr('data-ora'));
      \$('#form-modifica input[name=\"nota\"]').val(\$(this).attr('data-nota'));

      \$('#modalEdit').modal();
  });

  \$('.elimina_presenza').click(function(e){
      e.preventDefault();
      \$('#modalDelete #href_delete_presenza').attr('href','";
        // line 25
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "getBaseURL", array(), "method"), "html", null, true);
        echo "/deletepresenzautente/'+\$(this).attr('data-id')+'/'+\$(this).attr('data-idu')+'/'+\$(this).attr('data-m'));
      \$('#modalDelete').modal();
  });

  \$('#aggiungi_presenza').click(function(e){
    e.preventDefault();
    \$('#modalAdd #utente').html(\$(this).attr('data-nomeutente'));
    \$('#modalAdd #id_utente').val(\$(this).attr('data-idu'));
    \$('#modalAdd').modal();
  });

  \$('#tipologia_orario').change(function(event) {
    if(\$(this).val() == 'entrata'){
      \$('#box_ora_entrata').removeClass('hide');
      \$('#box_ora_uscita').addClass('hide');
    }else if(\$(this).val() == 'uscita'){
      \$('#box_ora_entrata').addClass('hide');
      \$('#box_ora_uscita').removeClass('hide');
    }else{
      \$('#box_ora_entrata').addClass('hide');
      \$('#box_ora_uscita').addClass('hide');
    }
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
        // line 61
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "url_generator"), "generate", array(0 => "opzioni"), "method"), "html", null, true);
        echo "\" class=\"navbar-brand\">Area ammnistrativa</a>
        </div>
        <ul class=\"nav navbar-nav navbar-right\">
            <li class=\"dropdown\">
              <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Benvenuto <strong>";
        // line 65
        echo twig_escape_filter($this->env, $this->getContext($context, "utente_loggato"), "html", null, true);
        echo "</strong> <b class=\"caret\"></b></a>
              <ul class=\"dropdown-menu\">
                <li ><a href=\"";
        // line 67
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "url_generator"), "generate", array(0 => "logout"), "method"), "html", null, true);
        echo "\"><span class=\"glyphicon glyphicon-off\"></span> Esci</a></li>
              </ul>
            </li>
          </ul>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class=\"collapse navbar-collapse navbar-ex5-collapse\">
          <ul class=\"nav navbar-nav\">
            <li class=\"\"><a href=\"http://";
        // line 74
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "host"), "html", null, true);
        echo "\"><span class=\"glyphicon glyphicon-home\"></span> Home</a></li>
            <li class=\"active\"><a href=\"";
        // line 75
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "url_generator"), "generate", array(0 => "opzioni"), "method"), "html", null, true);
        echo "\"><span class=\"glyphicon glyphicon-dashboard\"></span> Amministrazione</a></li>
          </ul>
        </div>
</nav>       
<div class=\"row\">
  <div class=\"col-md-7\">
  <h2 class=\"lead\">Presenze di <strong>";
        // line 81
        echo twig_escape_filter($this->env, $this->getContext($context, "mese"), "html", null, true);
        echo "</strong> utente <strong>";
        echo twig_escape_filter($this->env, $this->getContext($context, "nome_utente"), "html", null, true);
        echo "</strong></h2>
</div>
  
<div class=\"alert alert-info col-md-5\">
  <div class=\"row\">   
    <div class=\"col-md-9\">
        <select id=\"scelta_mese\" class=\"form-control\" name=\"mese\">
          <option ";
        // line 88
        if (($this->getContext($context, "mese_n") == 1)) {
            echo " selected=\"selected\" ";
        }
        echo " value=\"1\">Gennaio</option>
          <option ";
        // line 89
        if (($this->getContext($context, "mese_n") == 2)) {
            echo " selected=\"selected\" ";
        }
        echo " value=\"2\">Febbraio</option>
          <option ";
        // line 90
        if (($this->getContext($context, "mese_n") == 3)) {
            echo " selected=\"selected\" ";
        }
        echo " value=\"3\">Marzo</option>
          <option ";
        // line 91
        if (($this->getContext($context, "mese_n") == 4)) {
            echo " selected=\"selected\" ";
        }
        echo " value=\"4\">Aprile</option>
          <option ";
        // line 92
        if (($this->getContext($context, "mese_n") == 5)) {
            echo " selected=\"selected\" ";
        }
        echo " value=\"5\">Maggio</option>
          <option ";
        // line 93
        if (($this->getContext($context, "mese_n") == 6)) {
            echo " selected=\"selected\" ";
        }
        echo " value=\"6\">Giugno</option>
          <option ";
        // line 94
        if (($this->getContext($context, "mese_n") == 7)) {
            echo " selected=\"selected\" ";
        }
        echo " value=\"7\">Luglio</option>
          <option ";
        // line 95
        if (($this->getContext($context, "mese_n") == 8)) {
            echo " selected=\"selected\" ";
        }
        echo " value=\"8\">Agosto</option>
          <option ";
        // line 96
        if (($this->getContext($context, "mese_n") == 9)) {
            echo " selected=\"selected\" ";
        }
        echo " value=\"9\">Settembre</option>
          <option ";
        // line 97
        if (($this->getContext($context, "mese_n") == 10)) {
            echo " selected=\"selected\" ";
        }
        echo " value=\"10\">Ottobre</option>
          <option ";
        // line 98
        if (($this->getContext($context, "mese_n") == 11)) {
            echo " selected=\"selected\" ";
        }
        echo " value=\"11\">Novembre</option>
          <option ";
        // line 99
        if (($this->getContext($context, "mese_n") == 12)) {
            echo " selected=\"selected\" ";
        }
        echo " value=\"12\">Dicembre</option>
        </select>
    </div>
    <div class=\"col-md-3\">
        <a id=\"viewpresenze_href\" class=\"btn btn-primary\" href=\"";
        // line 103
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "getBaseURL", array(), "method"), "html", null, true);
        echo "/viewpresenze/";
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, $this->getContext($context, "mese_n"), "html", null, true);
        echo "\"><span class=\"glyphicon glyphicon-search\"></span></a>
    </div>
  </div>
</div>

</div>
<div class=\"\">
  <p class=\"pull-right\"><a data-idu=\"";
        // line 110
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" data-nomeutente=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "nome_utente"), "html", null, true);
        echo "\" id=\"aggiungi_presenza\" href=\"#\" class=\"btn btn-primary btn-sm\"><span class=\"glyphicon glyphicon-plus\"></span> Aggiungi presenza</a></p>
  <br/><br/>
  <table class=\"table table-striped table-condensed table-bordered\">
    <thead>
      <tr>
        <th></th>
        <th>Giorno</th>
        <th>Ora</th>
        <th>Tipologia</th>
        <th>Nota</th>
      </tr>
    </thead>
    <tbody>
    ";
        // line 123
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "presenze"));
        foreach ($context['_seq'] as $context["_key"] => $context["presenza"]) {
            // line 124
            echo "      <tr>
        <td>
          <a data-m=\"";
            // line 126
            echo twig_escape_filter($this->env, $this->getContext($context, "mese_n"), "html", null, true);
            echo "\" data-idu=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "presenza"), "id_utente"), "html", null, true);
            echo "\" data-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "presenza"), "id_orario"), "html", null, true);
            echo "\" style=\"margin-right:15px;\" href=\"#\" title=\"Elimina utente\" class=\"elimina_presenza btn btn-default btn-sm\"><span class=\"glyphicon glyphicon-trash\"></span> Cancella</a>
          <a data-idorario=\"";
            // line 127
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "presenza"), "id_orario"), "html", null, true);
            echo "\" data-idutente=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "presenza"), "id_utente"), "html", null, true);
            echo "\" data-mese=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "mese_n"), "html", null, true);
            echo "\" data-giorno=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "presenza"), "dataformat"), "html", null, true);
            echo "\" data-toggle=\"modal\" href=\"#\" class=\"btn btn-default btn-sm modifica_presenza\"><span class=\"glyphicon glyphicon-pencil\"></span> Modifica</a></td>
        <td>";
            // line 128
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "presenza"), "dataformat"), "html", null, true);
            echo "</td>
        <td>";
            // line 129
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "presenza"), "orario"), "html", null, true);
            echo "</td>
        <td>";
            // line 130
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "presenza"), "tipologia"), "html", null, true);
            echo "</td>
        <td>";
            // line 131
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "presenza"), "nota"), "html", null, true);
            echo "</td>
      </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['presenza'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 134
        echo "    </tbody>
  </table>
</div>

<!-- Modale modifica presenza -->
  <div class=\"modal\" id=\"modalEdit\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
      <div class=\"modal-content\">
        <div class=\"modal-header\">
          <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
          <h4 class=\"modal-title\">Modifica presenza del <em><span id=\"mod_giorno\"></span></em></h4>
        </div>
        <form id=\"form-modifica\" class=\"form\" action=\"";
        // line 146
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "url_generator"), "generate", array(0 => "modifica"), "method"), "html", null, true);
        echo "\" method=\"post\">
        <div class=\"modal-body\">
          <div class=\"form-group\">
            <label for=\"exampleInputEmail1\">Ora entrata (H:m)</label>
            <input name=\"ora\" type=\"text\" class=\"form-control\" id=\"ora\" placeholder=\"\" value=\"\">
          </div>
          <div class=\"form-group\">
            <label for=\"exampleInputEmail1\">Nota</label>
            <input name=\"nota\" type=\"text\" class=\"form-control\" id=\"nota\" placeholder=\"\">
          </div>
          <input type=\"hidden\" name=\"id_orario\" value=\"\" />
          <input type=\"hidden\" name=\"id_utente\" value=\"\" />
          <input type=\"hidden\" name=\"mese\" value=\"\" />
        </div>
        <div class=\"modal-footer\">
          <button type=\"submit\" class=\"btn btn-primary\">Salva</button>
          <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Annulla</button>
        </div>
      </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
<!-- ./Modale modifica presenza -->

<!-- Modale alert elimina -->
  <div class=\"modal\" id=\"modalDelete\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
      <div class=\"modal-content\">
        <div class=\"modal-header\">
          <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
          <h4 class=\"modal-title\"><p class=\"text-danger\"><span class=\"glyphicon glyphicon-warning-sign\"></span> ATTENZIONE!</p></h4>
        </div>
        <div class=\"modal-body\">
          <p>Vuoi davvero eliminare questo record?</p>
        </div>
        <div class=\"modal-footer\">
          <a id=\"href_delete_presenza\" href=\"\" class=\"btn btn-danger\"><span class=\"glyphicon glyphicon-trash\"></span> Elimina</a>
          <a href=\"\" class=\"btn btn-default\" data-dismiss=\"modal\" aria-hidden=\"true\">Annula</a>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
<!-- ./Modale alert elimina -->

<!-- Modale aggiungi presenza -->
  <div class=\"modal\" id=\"modalAdd\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
      <div class=\"modal-content\">
        <div class=\"modal-header\">
          <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
          <h4 class=\"modal-title\">Aggiungi presenza ";
        // line 196
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "d/m/Y"), "html", null, true);
        echo " <span id=\"utente\"></span></h4>
        </div>
        <form id=\"form-aggiungi\" class=\"form\" action=\"";
        // line 198
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "url_generator"), "generate", array(0 => "aggiungi"), "method"), "html", null, true);
        echo "\" method=\"post\">
        <div class=\"modal-body\">
          <div class=\"form-group\">
            <label for=\"\">Tipologia</label>
            <select id=\"tipologia_orario\" name=\"tipologia\" class=\"form-control\" required>
              <option></option>
              <option value=\"entrata\">Entrata</option>
              <option value=\"uscita\">Uscita</option>
              <option value=\"vario\" selected=\"selected\">Vario</option>
            </select>
          </div>
          <div class=\"form-group\" id=\"\">
            <label for=\"\">Giorno</label>
            <input name=\"giorno\" type=\"date\" class=\"form-control\" id=\"giorno\" placeholder=\"\" value=\"";
        // line 211
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y-m-d"), "html", null, true);
        echo "\">
          </div>
          <div class=\"form-group hide\" id=\"box_ora_entrata\">
            <label for=\"\">Ora entrata</label>
            <input name=\"ora_entrata\" type=\"time\" class=\"form-control\" id=\"ora_entrata\" placeholder=\"\">
          </div>
          <div class=\"form-group hide\" id=\"box_ora_uscita\">
            <label for=\"\">Ora uscita</label>
            <input name=\"ora_uscita\" type=\"time\" class=\"form-control\" id=\"ora_uscita\" placeholder=\"\">
          </div>
          <div class=\"form-group\">
            <label for=\"\">Nota</label>
            <input required name=\"nota\" type=\"text\" class=\"form-control\" id=\"nota\" placeholder=\"\">
          </div>
        </div>
        <div class=\"modal-footer\">
          <input type=\"hidden\" name=\"id_utente\" id=\"id_utente\" value=\"\" />
          <input type=\"hidden\" name=\"mese\" id=\"mese\" value=\"";
        // line 228
        echo twig_escape_filter($this->env, $this->getContext($context, "mese_n"), "html", null, true);
        echo "\" />
          <button type=\"submit\" class=\"btn btn-primary\">Salva</button>
          <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Annulla</button>
        </div>
      </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
<!-- ./Modale aggiungi presenza -->

";
    }

    public function getTemplateName()
    {
        return "viewpresenze.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  407 => 228,  387 => 211,  371 => 198,  366 => 196,  313 => 146,  299 => 134,  290 => 131,  286 => 130,  282 => 129,  278 => 128,  268 => 127,  260 => 126,  256 => 124,  252 => 123,  234 => 110,  220 => 103,  211 => 99,  205 => 98,  199 => 97,  193 => 96,  187 => 95,  181 => 94,  175 => 93,  169 => 92,  163 => 91,  157 => 90,  151 => 89,  145 => 88,  133 => 81,  124 => 75,  120 => 74,  110 => 67,  105 => 65,  98 => 61,  59 => 25,  36 => 7,  31 => 4,  28 => 3,);
    }
}
