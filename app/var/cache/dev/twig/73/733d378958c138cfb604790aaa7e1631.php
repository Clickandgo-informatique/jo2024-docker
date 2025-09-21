<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* _partials/_cart-items.html.twig */
class __TwigTemplate_de1588cb7a16651024317ac25210ba59 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "_partials/_cart-items.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "_partials/_cart-items.html.twig"));

        // line 2
        yield "<div class=\"cart-total-items text-center\">
\t";
        // line 3
        if (((isset($context["totalItems"]) || array_key_exists("totalItems", $context) ? $context["totalItems"] : (function () { throw new RuntimeError('Variable "totalItems" does not exist.', 3, $this->source); })()) > 0)) {
            // line 4
            yield "\t\t<span class=\"cart-items\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalItems"]) || array_key_exists("totalItems", $context) ? $context["totalItems"] : (function () { throw new RuntimeError('Variable "totalItems" does not exist.', 4, $this->source); })()), "html", null, true);
            yield "</span>
\t\tarticle(s) dans le panier
\t";
        } else {
            // line 7
            yield "\t\t<span class=\"cart-items \">Aucun article dans le panier</span>
\t";
        }
        // line 9
        yield "</div>
";
        // line 11
        yield "<table>
\t<thead>
\t\t<tr>
\t\t\t<th>Offre</th>
\t\t\t<th>Prix</th>
\t\t\t<th></th>
\t\t\t<th>Total</th>
\t\t\t<th></th>
\t\t</tr>
\t</thead>
\t<tbody>
\t\t";
        // line 22
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 22, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["element"]) {
            // line 23
            yield "\t\t\t<tr>
\t\t\t\t<td>";
            // line 24
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["element"], "offre", [], "any", false, false, false, 24), "intitule", [], "any", false, false, false, 24), "html", null, true);
            yield "</td>
\t\t\t\t<td class=\"text-right\">";
            // line 25
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["element"], "offre", [], "any", false, false, false, 25), "prix", [], "any", false, false, false, 25), "html", null, true);
            yield "€</td>

\t\t\t\t<td class=\"wrapper-quantite\">
\t\t\t\t\t<a href=\"";
            // line 28
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_cart_remove", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["element"], "offre", [], "any", false, false, false, 28), "id", [], "any", false, false, false, 28)]), "html", null, true);
            yield "\" class=\"btn btn-warning text-decoration-none btn-remove-from-cart\" data-url=\"/cart/remove/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["element"], "offre", [], "any", false, false, false, 28), "id", [], "any", false, false, false, 28), "html", null, true);
            yield "\">&minus;</a>
\t\t\t\t\t<span class=\"text-right quantite\">";
            // line 29
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["element"], "quantite", [], "any", false, false, false, 29), "html", null, true);
            yield "</span>
\t\t\t\t\t<a href=\"";
            // line 30
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_cart_add", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["element"], "offre", [], "any", false, false, false, 30), "id", [], "any", false, false, false, 30)]), "html", null, true);
            yield "\" class=\"btn btn-success text-decoration-none btn-add-to-cart\" data-url=\"/cart/add/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["element"], "offre", [], "any", false, false, false, 30), "id", [], "any", false, false, false, 30), "html", null, true);
            yield "\">&plus;</a>
\t\t\t\t</td>
\t\t\t\t<td class=\"text-right\">";
            // line 32
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((CoreExtension::getAttribute($this->env, $this->source, $context["element"], "quantite", [], "any", false, false, false, 32) * CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["element"], "offre", [], "any", false, false, false, 32), "prix", [], "any", false, false, false, 32)), "html", null, true);
            yield "€</td>
\t\t\t\t<td>
\t\t\t\t\t<a href=\"";
            // line 34
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_cart_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["element"], "offre", [], "any", false, false, false, 34), "id", [], "any", false, false, false, 34)]), "html", null, true);
            yield "\" class=\"btn btn-danger btn-delete-from-cart\" data-url=\"/cart/delete/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["element"], "offre", [], "any", false, false, false, 34), "id", [], "any", false, false, false, 34), "html", null, true);
            yield "\">
\t\t\t\t\t\t<i class=\"fa-solid fa-trash-can\"></i>
\t\t\t\t\t</a>
\t\t\t\t</td>
\t\t\t</tr>
\t\t</td>
\t</tbody>
";
            $context['_iterated'] = true;
        }
        // line 41
        if (!$context['_iterated']) {
            // line 42
            yield "\t<tr>
\t\t<td colspan=\"5\">Votre panier est vide</td>
\t</tr>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['element'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 46
        yield "<tfoot>
\t<tr>
\t\t<td colspan=\"3\">Total</td>
\t\t<td class=\"text-right\">";
        // line 49
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["total"]) || array_key_exists("total", $context) ? $context["total"] : (function () { throw new RuntimeError('Variable "total" does not exist.', 49, $this->source); })()), "html", null, true);
        yield "€</td>";
        if (((isset($context["total"]) || array_key_exists("total", $context) ? $context["total"] : (function () { throw new RuntimeError('Variable "total" does not exist.', 49, $this->source); })()) > 0)) {
            // line 50
            yield "\t\t\t<td>
\t\t\t\t<a href=\"";
            // line 51
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_cart_empty_cart");
            yield "\" class=\"btn btn-danger btn-empty-cart\" data-url=\"/cart/cart-empty-cart\">
\t\t\t\t\t<i class=\"fa-solid fa-cart-shopping\"></i>Vider le panier</a>
\t\t\t</td>
\t\t";
        }
        // line 55
        yield "\t</tr>
</tfoot></table>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "_partials/_cart-items.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  164 => 55,  157 => 51,  154 => 50,  150 => 49,  145 => 46,  136 => 42,  134 => 41,  120 => 34,  115 => 32,  108 => 30,  104 => 29,  98 => 28,  92 => 25,  88 => 24,  85 => 23,  80 => 22,  67 => 11,  64 => 9,  60 => 7,  53 => 4,  51 => 3,  48 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# Affichage du nombre d'articles dans le panier (Ajax) #}
<div class=\"cart-total-items text-center\">
\t{% if totalItems >0 %}
\t\t<span class=\"cart-items\">{{totalItems}}</span>
\t\tarticle(s) dans le panier
\t{% else %}
\t\t<span class=\"cart-items \">Aucun article dans le panier</span>
\t{% endif %}
</div>
{# Fin affichage du nombre d'articles dans le panier (Ajax) #}
<table>
\t<thead>
\t\t<tr>
\t\t\t<th>Offre</th>
\t\t\t<th>Prix</th>
\t\t\t<th></th>
\t\t\t<th>Total</th>
\t\t\t<th></th>
\t\t</tr>
\t</thead>
\t<tbody>
\t\t{% for element in data %}
\t\t\t<tr>
\t\t\t\t<td>{{element.offre.intitule}}</td>
\t\t\t\t<td class=\"text-right\">{{element.offre.prix}}€</td>

\t\t\t\t<td class=\"wrapper-quantite\">
\t\t\t\t\t<a href=\"{{path('app_cart_remove',{id:element.offre.id})}}\" class=\"btn btn-warning text-decoration-none btn-remove-from-cart\" data-url=\"/cart/remove/{{element.offre.id}}\">&minus;</a>
\t\t\t\t\t<span class=\"text-right quantite\">{{element.quantite}}</span>
\t\t\t\t\t<a href=\"{{path('app_cart_add',{id:element.offre.id})}}\" class=\"btn btn-success text-decoration-none btn-add-to-cart\" data-url=\"/cart/add/{{element.offre.id}}\">&plus;</a>
\t\t\t\t</td>
\t\t\t\t<td class=\"text-right\">{{element.quantite * element.offre.prix}}€</td>
\t\t\t\t<td>
\t\t\t\t\t<a href=\"{{path('app_cart_delete',{id:element.offre.id})}}\" class=\"btn btn-danger btn-delete-from-cart\" data-url=\"/cart/delete/{{element.offre.id}}\">
\t\t\t\t\t\t<i class=\"fa-solid fa-trash-can\"></i>
\t\t\t\t\t</a>
\t\t\t\t</td>
\t\t\t</tr>
\t\t</td>
\t</tbody>
{% else %}
\t<tr>
\t\t<td colspan=\"5\">Votre panier est vide</td>
\t</tr>
{% endfor %}
<tfoot>
\t<tr>
\t\t<td colspan=\"3\">Total</td>
\t\t<td class=\"text-right\">{{total}}€</td>{# Affichage du bouton de vidage de panier seulement si le total est > 0 #}{% if total>0 %}
\t\t\t<td>
\t\t\t\t<a href=\"{{path('app_cart_empty_cart')}}\" class=\"btn btn-danger btn-empty-cart\" data-url=\"/cart/cart-empty-cart\">
\t\t\t\t\t<i class=\"fa-solid fa-cart-shopping\"></i>Vider le panier</a>
\t\t\t</td>
\t\t{% endif %}
\t</tr>
</tfoot></table>
", "_partials/_cart-items.html.twig", "/var/www/symfony/templates/_partials/_cart-items.html.twig");
    }
}
