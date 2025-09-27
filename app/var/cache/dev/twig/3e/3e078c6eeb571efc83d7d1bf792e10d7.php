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
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 1, $this->source); })()))) {
            // line 2
            yield "\t<p class=\"cart-empty\">Votre panier est vide.</p>
";
        } else {
            // line 4
            yield "\t<div class=\"cart-grid\">
\t\t<div class=\"cart-header text-left\">Produit</div>
\t\t<div class=\"cart-header text-center\">Quantité</div>
\t\t<div class=\"cart-header text-right\">Prix total</div>
\t\t<div class=\"cart-header\"></div>

\t\t";
            // line 10
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 10, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 11
                yield "\t\t\t<div class=\"cart-product text-left\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "offre", [], "any", false, false, false, 11), "intitule", [], "any", false, false, false, 11), "html", null, true);
                yield "</div>
\t\t\t<div class=\"cart-quantity text-center\">
\t\t\t\t<div class=\"quantity-control\">
\t\t\t\t\t<button class=\"decrease btn btn-primary btn-qty\" data-url=\"";
                // line 14
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("panier_update", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "offre", [], "any", false, false, false, 14), "id", [], "any", false, false, false, 14)]), "html", null, true);
                yield "\" data-method=\"POST\">-</button>
\t\t\t\t\t<input type=\"text\" class=\"quantity-input\" value=\"";
                // line 15
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "quantite", [], "any", false, false, false, 15), "html", null, true);
                yield "\" data-url=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("panier_update", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "offre", [], "any", false, false, false, 15), "id", [], "any", false, false, false, 15)]), "html", null, true);
                yield "\">
\t\t\t\t\t<button class=\"increase btn btn-primary btn-qty\" data-url=\"";
                // line 16
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("panier_update", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "offre", [], "any", false, false, false, 16), "id", [], "any", false, false, false, 16)]), "html", null, true);
                yield "\" data-method=\"POST\">+</button>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"cart-total text-right\">";
                // line 19
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "total", [], "any", false, false, false, 19), 2, ",", " "), "html", null, true);
                yield "
\t\t\t\t€</div>
\t\t\t<div class=\"cart-actions text-center\">
\t\t\t\t<button class=\"remove-item btn btn-danger\" data-url=\"";
                // line 22
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("panier_remove", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "offre", [], "any", false, false, false, 22), "id", [], "any", false, false, false, 22)]), "html", null, true);
                yield "\" data-method=\"POST\"><i class=\"fa-solid fa-trash-can\"></i></button>
\t\t\t</div>
\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 25
            yield "\t</div>

\t<div class=\"cart-summary\">
\t\t<div class=\"summary-items\">Total articles :
\t\t\t";
            // line 29
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalItems"]) || array_key_exists("totalItems", $context) ? $context["totalItems"] : (function () { throw new RuntimeError('Variable "totalItems" does not exist.', 29, $this->source); })()), "html", null, true);
            yield "</div>
\t\t<div class=\"summary-total\">Total panier :
\t\t\t";
            // line 31
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber((isset($context["total"]) || array_key_exists("total", $context) ? $context["total"] : (function () { throw new RuntimeError('Variable "total" does not exist.', 31, $this->source); })()), 2, ",", " "), "html", null, true);
            yield "
\t\t\t€</div>
\t\t<button id=\"clear-cart\" class=\"btn btn-warning\" data-url=\"";
            // line 33
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("panier_clear");
            yield "\" data-method=\"POST\"><i class=\"fa-solid fa-shopping-basket\"></i>Vider le panier</button>
\t</div>
";
        }
        
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
        return array (  120 => 33,  115 => 31,  110 => 29,  104 => 25,  95 => 22,  89 => 19,  83 => 16,  77 => 15,  73 => 14,  66 => 11,  62 => 10,  54 => 4,  50 => 2,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% if data is empty %}
\t<p class=\"cart-empty\">Votre panier est vide.</p>
{% else %}
\t<div class=\"cart-grid\">
\t\t<div class=\"cart-header text-left\">Produit</div>
\t\t<div class=\"cart-header text-center\">Quantité</div>
\t\t<div class=\"cart-header text-right\">Prix total</div>
\t\t<div class=\"cart-header\"></div>

\t\t{% for item in data %}
\t\t\t<div class=\"cart-product text-left\">{{ item.offre.intitule }}</div>
\t\t\t<div class=\"cart-quantity text-center\">
\t\t\t\t<div class=\"quantity-control\">
\t\t\t\t\t<button class=\"decrease btn btn-primary btn-qty\" data-url=\"{{ path('panier_update', {'id': item.offre.id}) }}\" data-method=\"POST\">-</button>
\t\t\t\t\t<input type=\"text\" class=\"quantity-input\" value=\"{{ item.quantite }}\" data-url=\"{{ path('panier_update', {'id': item.offre.id}) }}\">
\t\t\t\t\t<button class=\"increase btn btn-primary btn-qty\" data-url=\"{{ path('panier_update', {'id': item.offre.id}) }}\" data-method=\"POST\">+</button>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"cart-total text-right\">{{ item.total|number_format(2, ',', ' ') }}
\t\t\t\t€</div>
\t\t\t<div class=\"cart-actions text-center\">
\t\t\t\t<button class=\"remove-item btn btn-danger\" data-url=\"{{ path('panier_remove', {'id': item.offre.id}) }}\" data-method=\"POST\"><i class=\"fa-solid fa-trash-can\"></i></button>
\t\t\t</div>
\t\t{% endfor %}
\t</div>

\t<div class=\"cart-summary\">
\t\t<div class=\"summary-items\">Total articles :
\t\t\t{{ totalItems }}</div>
\t\t<div class=\"summary-total\">Total panier :
\t\t\t{{ total|number_format(2, ',', ' ') }}
\t\t\t€</div>
\t\t<button id=\"clear-cart\" class=\"btn btn-warning\" data-url=\"{{ path('panier_clear') }}\" data-method=\"POST\"><i class=\"fa-solid fa-shopping-basket\"></i>Vider le panier</button>
\t</div>
{% endif %}
", "_partials/_cart-items.html.twig", "/var/www/symfony/templates/_partials/_cart-items.html.twig");
    }
}
