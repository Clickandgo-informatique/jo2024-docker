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
class __TwigTemplate_efabb10962dc3799bd9de2076843f0ae extends Template
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

        // line 1
        yield "<div
\tclass=\"ajax-reloaded-data\">
\t";
        // line 4
        yield "\t<div class=\"cart-total-items text-center\">
\t\t";
        // line 5
        if (((isset($context["totalItems"]) || array_key_exists("totalItems", $context) ? $context["totalItems"] : (function () { throw new RuntimeError('Variable "totalItems" does not exist.', 5, $this->source); })()) > 0)) {
            // line 6
            yield "\t\t\t<span class=\"cart-items\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalItems"]) || array_key_exists("totalItems", $context) ? $context["totalItems"] : (function () { throw new RuntimeError('Variable "totalItems" does not exist.', 6, $this->source); })()), "html", null, true);
            yield "</span>
\t\t\tarticle(s) dans le panier
\t\t";
        } else {
            // line 9
            yield "\t\t\t<span class=\"cart-items\">Aucun article dans le panier</span>
\t\t";
        }
        // line 11
        yield "\t</div>

\t<table class=\"table table-striped\">
\t\t<thead>
\t\t\t<tr>
\t\t\t\t<th>Offre</th>
\t\t\t\t<th>Prix</th>
\t\t\t\t<th>Quantité</th>
\t\t\t\t<th>Total</th>
\t\t\t\t<th>Actions</th>
\t\t\t</tr>
\t\t</thead>
\t\t<tbody>
\t\t\t";
        // line 24
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 24, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["element"]) {
            // line 25
            yield "\t\t\t\t<tr>
\t\t\t\t\t<td>";
            // line 26
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["element"], "offre", [], "any", false, false, false, 26), "intitule", [], "any", false, false, false, 26), "html", null, true);
            yield "</td>
\t\t\t\t\t<td class=\"text-right\">";
            // line 27
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["element"], "offre", [], "any", false, false, false, 27), "prix", [], "any", false, false, false, 27), "html", null, true);
            yield "€</td>
\t\t\t\t\t<td class=\"text-center\">
\t\t\t\t\t\t<div class=\"wrapper-quantite\">
\t\t\t\t\t\t\t<a href=\"";
            // line 30
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_cart_remove", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["element"], "offre", [], "any", false, false, false, 30), "id", [], "any", false, false, false, 30)]), "html", null, true);
            yield "\" class=\"btn btn-warning btn-remove-from-cart\" data-url=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_cart_remove", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["element"], "offre", [], "any", false, false, false, 30), "id", [], "any", false, false, false, 30)]), "html", null, true);
            yield "\" data-method=\"POST\">-</a>

\t\t\t\t\t\t\t<span class=\"quantite\">";
            // line 32
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["element"], "quantite", [], "any", false, false, false, 32), "html", null, true);
            yield "</span>

\t\t\t\t\t\t\t<a href=\"";
            // line 34
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_cart_add", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["element"], "offre", [], "any", false, false, false, 34), "id", [], "any", false, false, false, 34)]), "html", null, true);
            yield "\" class=\"btn btn-success btn-add-to-cart\" data-url=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_cart_add", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["element"], "offre", [], "any", false, false, false, 34), "id", [], "any", false, false, false, 34)]), "html", null, true);
            yield "\" data-method=\"POST\">+</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</td>
\t\t\t\t\t<td class=\"text-right\">";
            // line 37
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((CoreExtension::getAttribute($this->env, $this->source, $context["element"], "quantite", [], "any", false, false, false, 37) * CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["element"], "offre", [], "any", false, false, false, 37), "prix", [], "any", false, false, false, 37)), "html", null, true);
            yield "€</td>
\t\t\t\t\t<td class=\"text-center\">
\t\t\t\t\t\t<a href=\"";
            // line 39
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_cart_remove", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["element"], "offre", [], "any", false, false, false, 39), "id", [], "any", false, false, false, 39)]), "html", null, true);
            yield "\" class=\"btn btn-danger btn-delete-from-cart\" data-url=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_cart_remove", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["element"], "offre", [], "any", false, false, false, 39), "id", [], "any", false, false, false, 39)]), "html", null, true);
            yield "\" data-method=\"POST\">
\t\t\t\t\t\t\t<i class=\"fa-solid fa-trash-can\"></i>
\t\t\t\t\t\t</a>
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t";
            $context['_iterated'] = true;
        }
        // line 44
        if (!$context['_iterated']) {
            // line 45
            yield "\t\t\t\t<tr>
\t\t\t\t\t<td colspan=\"5\" class=\"text-center\">Votre panier est vide</td>
\t\t\t\t</tr>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['element'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        yield "\t\t</tbody>
\t\t<tfoot>
\t\t\t<tr>
\t\t\t\t<td colspan=\"3\">Total</td>
\t\t\t\t<td class=\"text-right\">";
        // line 53
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["total"]) || array_key_exists("total", $context) ? $context["total"] : (function () { throw new RuntimeError('Variable "total" does not exist.', 53, $this->source); })()), "html", null, true);
        yield "€</td>
\t\t\t\t<td>
\t\t\t\t\t";
        // line 63
        yield "\t\t\t\t</td>
\t\t\t</tr>
\t\t</tfoot>
\t</table>
</div>
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
        return array (  160 => 63,  155 => 53,  149 => 49,  140 => 45,  138 => 44,  126 => 39,  121 => 37,  113 => 34,  108 => 32,  101 => 30,  95 => 27,  91 => 26,  88 => 25,  83 => 24,  68 => 11,  64 => 9,  57 => 6,  55 => 5,  52 => 4,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<div
\tclass=\"ajax-reloaded-data\">
\t{# Affichage du nombre d'articles dans le panier #}
\t<div class=\"cart-total-items text-center\">
\t\t{% if totalItems > 0 %}
\t\t\t<span class=\"cart-items\">{{ totalItems }}</span>
\t\t\tarticle(s) dans le panier
\t\t{% else %}
\t\t\t<span class=\"cart-items\">Aucun article dans le panier</span>
\t\t{% endif %}
\t</div>

\t<table class=\"table table-striped\">
\t\t<thead>
\t\t\t<tr>
\t\t\t\t<th>Offre</th>
\t\t\t\t<th>Prix</th>
\t\t\t\t<th>Quantité</th>
\t\t\t\t<th>Total</th>
\t\t\t\t<th>Actions</th>
\t\t\t</tr>
\t\t</thead>
\t\t<tbody>
\t\t\t{% for element in data %}
\t\t\t\t<tr>
\t\t\t\t\t<td>{{ element.offre.intitule }}</td>
\t\t\t\t\t<td class=\"text-right\">{{ element.offre.prix }}€</td>
\t\t\t\t\t<td class=\"text-center\">
\t\t\t\t\t\t<div class=\"wrapper-quantite\">
\t\t\t\t\t\t\t<a href=\"{{ path('app_cart_remove', {'id': element.offre.id}) }}\" class=\"btn btn-warning btn-remove-from-cart\" data-url=\"{{ path('app_cart_remove', {'id': element.offre.id}) }}\" data-method=\"POST\">-</a>

\t\t\t\t\t\t\t<span class=\"quantite\">{{ element.quantite }}</span>

\t\t\t\t\t\t\t<a href=\"{{ path('app_cart_add', {'id': element.offre.id}) }}\" class=\"btn btn-success btn-add-to-cart\" data-url=\"{{ path('app_cart_add', {'id': element.offre.id}) }}\" data-method=\"POST\">+</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</td>
\t\t\t\t\t<td class=\"text-right\">{{ element.quantite * element.offre.prix }}€</td>
\t\t\t\t\t<td class=\"text-center\">
\t\t\t\t\t\t<a href=\"{{ path('app_cart_remove', {'id': element.offre.id}) }}\" class=\"btn btn-danger btn-delete-from-cart\" data-url=\"{{ path('app_cart_remove', {'id': element.offre.id}) }}\" data-method=\"POST\">
\t\t\t\t\t\t\t<i class=\"fa-solid fa-trash-can\"></i>
\t\t\t\t\t\t</a>
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t{% else %}
\t\t\t\t<tr>
\t\t\t\t\t<td colspan=\"5\" class=\"text-center\">Votre panier est vide</td>
\t\t\t\t</tr>
\t\t\t{% endfor %}
\t\t</tbody>
\t\t<tfoot>
\t\t\t<tr>
\t\t\t\t<td colspan=\"3\">Total</td>
\t\t\t\t<td class=\"text-right\">{{ total }}€</td>
\t\t\t\t<td>
\t\t\t\t\t{# {% if total > 0 %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t                        <a href=\"{{ path('app_cart_empty') }}\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t                           class=\"btn btn-danger btn-empty-cart\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t                           data-url=\"{{ path('app_cart_empty') }}\"
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t                           data-method=\"POST\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t                           <i class=\"fa-solid fa-cart-shopping\"></i> Vider le panier
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t                        </a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t                    {% endif %} #}
\t\t\t\t</td>
\t\t\t</tr>
\t\t</tfoot>
\t</table>
</div>
", "_partials/_cart-items.html.twig", "/var/www/symfony/templates/_partials/_cart-items.html.twig");
    }
}
