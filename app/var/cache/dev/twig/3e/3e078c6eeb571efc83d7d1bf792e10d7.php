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
            'stylesheets' => [$this, 'block_stylesheets'],
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
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 1, $this->source); })()))) {
            // line 2
            yield "\t<p class=\"cart-empty\">Votre panier est vide.</p>
";
        } else {
            // line 4
            yield "
\t<table>
\t\t<thead>
\t\t\t<tr>
\t\t\t\t<th class=\"cart-header text-left\">Intitulé</th>
\t\t\t\t<th class=\"cart-header text-center\">Quantité</th>
\t\t\t\t<th class=\"cart-header text-right\">Prix total</th>
\t\t\t\t<th class=\"cart-header\"></th>
\t\t\t</tr>
\t\t</thead>
\t\t<tbody>
\t\t\t";
            // line 15
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 15, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 16
                yield "\t\t\t\t<tr>
\t\t\t\t\t<td class=\"cart-product text-left\">";
                // line 17
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "offre", [], "any", false, false, false, 17), "intitule", [], "any", false, false, false, 17), "html", null, true);
                yield "</td>
\t\t\t\t\t<td class=\"quantity-control\">
\t\t\t\t\t\t<button class=\"decrease btn btn-primary btn-qty\" data-url=\"";
                // line 19
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("panier_update", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "offre", [], "any", false, false, false, 19), "id", [], "any", false, false, false, 19)]), "html", null, true);
                yield "\" data-method=\"POST\">-</button>
\t\t\t\t\t\t<input type=\"text\" class=\"quantity-input\" value=\"";
                // line 20
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "quantite", [], "any", false, false, false, 20), "html", null, true);
                yield "\" data-url=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("panier_update", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "offre", [], "any", false, false, false, 20), "id", [], "any", false, false, false, 20)]), "html", null, true);
                yield "\">
\t\t\t\t\t\t<button class=\"increase btn btn-primary btn-qty\" data-url=\"";
                // line 21
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("panier_update", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "offre", [], "any", false, false, false, 21), "id", [], "any", false, false, false, 21)]), "html", null, true);
                yield "\" data-method=\"POST\">+</button>
\t\t\t\t\t</td>
\t\t\t\t\t<td class=\"cart-total text-right\">";
                // line 23
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "total", [], "any", false, false, false, 23), 2, ",", " "), "html", null, true);
                yield "
\t\t\t\t\t\t€</td>
\t\t\t\t\t<td class=\"cart-actions text-center\">
\t\t\t\t\t\t<button class=\"remove-item btn btn-danger\" data-url=\"";
                // line 26
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("panier_remove", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "offre", [], "any", false, false, false, 26), "id", [], "any", false, false, false, 26)]), "html", null, true);
                yield "\" data-method=\"POST\">
\t\t\t\t\t\t\t<i class=\"fa-solid fa-trash-can\"></i>
\t\t\t\t\t\t</button>
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 32
            yield "\t\t</tbody>
\t\t<tfoot>
\t\t\t<tr class=\"cart-summary\">
\t\t\t\t<td class=\"summary-items\">Total articles :
\t\t\t\t\t";
            // line 36
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalItems"]) || array_key_exists("totalItems", $context) ? $context["totalItems"] : (function () { throw new RuntimeError('Variable "totalItems" does not exist.', 36, $this->source); })()), "html", null, true);
            yield "</td>
\t\t\t\t<td class=\"summary-total\">Total panier :
\t\t\t\t\t";
            // line 38
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber((isset($context["total"]) || array_key_exists("total", $context) ? $context["total"] : (function () { throw new RuntimeError('Variable "total" does not exist.', 38, $this->source); })()), 2, ",", " "), "html", null, true);
            yield "
\t\t\t\t\t€</td>
\t\t\t\t<td colspan=\"2\">
\t\t\t\t\t<button id=\"clear-cart\" class=\"btn btn-warning\" data-url=\"";
            // line 41
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("panier_clear");
            yield "\" data-method=\"POST\">
\t\t\t\t\t\t<i class=\"fa-solid fa-shopping-basket\"></i>Vider le panier</button>
\t\t\t\t</td>
\t\t\t</tr>
\t\t</tfoot>
\t</table>

";
        }
        // line 49
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 50
        yield "\t<link rel=\"stylesheet\" href=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/table.css"), "html", null, true);
        yield "\">
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

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
        return array (  164 => 50,  141 => 49,  130 => 41,  124 => 38,  119 => 36,  113 => 32,  101 => 26,  95 => 23,  90 => 21,  84 => 20,  80 => 19,  75 => 17,  72 => 16,  68 => 15,  55 => 4,  51 => 2,  49 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% if data is empty %}
\t<p class=\"cart-empty\">Votre panier est vide.</p>
{% else %}

\t<table>
\t\t<thead>
\t\t\t<tr>
\t\t\t\t<th class=\"cart-header text-left\">Intitulé</th>
\t\t\t\t<th class=\"cart-header text-center\">Quantité</th>
\t\t\t\t<th class=\"cart-header text-right\">Prix total</th>
\t\t\t\t<th class=\"cart-header\"></th>
\t\t\t</tr>
\t\t</thead>
\t\t<tbody>
\t\t\t{% for item in data %}
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"cart-product text-left\">{{ item.offre.intitule }}</td>
\t\t\t\t\t<td class=\"quantity-control\">
\t\t\t\t\t\t<button class=\"decrease btn btn-primary btn-qty\" data-url=\"{{ path('panier_update', {'id': item.offre.id}) }}\" data-method=\"POST\">-</button>
\t\t\t\t\t\t<input type=\"text\" class=\"quantity-input\" value=\"{{ item.quantite }}\" data-url=\"{{ path('panier_update', {'id': item.offre.id}) }}\">
\t\t\t\t\t\t<button class=\"increase btn btn-primary btn-qty\" data-url=\"{{ path('panier_update', {'id': item.offre.id}) }}\" data-method=\"POST\">+</button>
\t\t\t\t\t</td>
\t\t\t\t\t<td class=\"cart-total text-right\">{{ item.total|number_format(2, ',', ' ') }}
\t\t\t\t\t\t€</td>
\t\t\t\t\t<td class=\"cart-actions text-center\">
\t\t\t\t\t\t<button class=\"remove-item btn btn-danger\" data-url=\"{{ path('panier_remove', {'id': item.offre.id}) }}\" data-method=\"POST\">
\t\t\t\t\t\t\t<i class=\"fa-solid fa-trash-can\"></i>
\t\t\t\t\t\t</button>
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t{% endfor %}
\t\t</tbody>
\t\t<tfoot>
\t\t\t<tr class=\"cart-summary\">
\t\t\t\t<td class=\"summary-items\">Total articles :
\t\t\t\t\t{{ totalItems }}</td>
\t\t\t\t<td class=\"summary-total\">Total panier :
\t\t\t\t\t{{ total|number_format(2, ',', ' ') }}
\t\t\t\t\t€</td>
\t\t\t\t<td colspan=\"2\">
\t\t\t\t\t<button id=\"clear-cart\" class=\"btn btn-warning\" data-url=\"{{ path('panier_clear') }}\" data-method=\"POST\">
\t\t\t\t\t\t<i class=\"fa-solid fa-shopping-basket\"></i>Vider le panier</button>
\t\t\t\t</td>
\t\t\t</tr>
\t\t</tfoot>
\t</table>

{% endif %}
{% block stylesheets %}
\t<link rel=\"stylesheet\" href=\"{{asset('assets/css/table.css')}}\">
{% endblock %}
", "_partials/_cart-items.html.twig", "/var/www/symfony/templates/_partials/_cart-items.html.twig");
    }
}
