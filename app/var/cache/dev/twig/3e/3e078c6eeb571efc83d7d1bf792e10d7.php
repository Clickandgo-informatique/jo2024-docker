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
            yield "    <p class=\"cart-empty\">Votre panier est vide.</p>
";
        } else {
            // line 4
            yield "<div class=\"cart-grid\">
    <div class=\"cart-header\">Produit</div>
    <div class=\"cart-header\">Quantité</div>
    <div class=\"cart-header\">Prix total</div>
    <div class=\"cart-header\"></div>

    ";
            // line 10
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 10, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 11
                yield "        <div class=\"cart-product\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "offre", [], "any", false, false, false, 11), "intitule", [], "any", false, false, false, 11), "html", null, true);
                yield "</div>
        <div class=\"cart-quantity\">
            <div class=\"quantity-control\">
                <button class=\"decrease btn btn-primary btn-qty\" data-url=\"";
                // line 14
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("panier_update", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "offre", [], "any", false, false, false, 14), "id", [], "any", false, false, false, 14)]), "html", null, true);
                yield "\" data-method=\"POST\">-</button>
                <input type=\"text\" class=\"quantity-input\" value=\"";
                // line 15
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "quantite", [], "any", false, false, false, 15), "html", null, true);
                yield "\" data-url=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("panier_update", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "offre", [], "any", false, false, false, 15), "id", [], "any", false, false, false, 15)]), "html", null, true);
                yield "\">
                <button class=\"increase btn btn-primary btn-qty\" data-url=\"";
                // line 16
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("panier_update", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "offre", [], "any", false, false, false, 16), "id", [], "any", false, false, false, 16)]), "html", null, true);
                yield "\" data-method=\"POST\">+</button>
            </div>
        </div>
        <div class=\"cart-total\">";
                // line 19
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "total", [], "any", false, false, false, 19), 2, ",", " "), "html", null, true);
                yield " €</div>
        <div class=\"cart-actions\">
            <button class=\"remove-item btn\" data-url=\"";
                // line 21
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("panier_remove", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "offre", [], "any", false, false, false, 21), "id", [], "any", false, false, false, 21)]), "html", null, true);
                yield "\" data-method=\"POST\">Supprimer</button>
        </div>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 24
            yield "</div>

<div class=\"cart-summary\">
    <div class=\"summary-items\">Total articles : ";
            // line 27
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalItems"]) || array_key_exists("totalItems", $context) ? $context["totalItems"] : (function () { throw new RuntimeError('Variable "totalItems" does not exist.', 27, $this->source); })()), "html", null, true);
            yield "</div>
    <div class=\"summary-total\">Total panier : ";
            // line 28
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber((isset($context["total"]) || array_key_exists("total", $context) ? $context["total"] : (function () { throw new RuntimeError('Variable "total" does not exist.', 28, $this->source); })()), 2, ",", " "), "html", null, true);
            yield " €</div>
    <button id=\"clear-cart\" class=\"btn\" data-url=\"";
            // line 29
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("panier_clear");
            yield "\" data-method=\"POST\">Vider le panier</button>
</div>
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
        return array (  116 => 29,  112 => 28,  108 => 27,  103 => 24,  94 => 21,  89 => 19,  83 => 16,  77 => 15,  73 => 14,  66 => 11,  62 => 10,  54 => 4,  50 => 2,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% if data is empty %}
    <p class=\"cart-empty\">Votre panier est vide.</p>
{% else %}
<div class=\"cart-grid\">
    <div class=\"cart-header\">Produit</div>
    <div class=\"cart-header\">Quantité</div>
    <div class=\"cart-header\">Prix total</div>
    <div class=\"cart-header\"></div>

    {% for item in data %}
        <div class=\"cart-product\">{{ item.offre.intitule }}</div>
        <div class=\"cart-quantity\">
            <div class=\"quantity-control\">
                <button class=\"decrease btn btn-primary btn-qty\" data-url=\"{{ path('panier_update', {'id': item.offre.id}) }}\" data-method=\"POST\">-</button>
                <input type=\"text\" class=\"quantity-input\" value=\"{{ item.quantite }}\" data-url=\"{{ path('panier_update', {'id': item.offre.id}) }}\">
                <button class=\"increase btn btn-primary btn-qty\" data-url=\"{{ path('panier_update', {'id': item.offre.id}) }}\" data-method=\"POST\">+</button>
            </div>
        </div>
        <div class=\"cart-total\">{{ item.total|number_format(2, ',', ' ') }} €</div>
        <div class=\"cart-actions\">
            <button class=\"remove-item btn\" data-url=\"{{ path('panier_remove', {'id': item.offre.id}) }}\" data-method=\"POST\">Supprimer</button>
        </div>
    {% endfor %}
</div>

<div class=\"cart-summary\">
    <div class=\"summary-items\">Total articles : {{ totalItems }}</div>
    <div class=\"summary-total\">Total panier : {{ total|number_format(2, ',', ' ') }} €</div>
    <button id=\"clear-cart\" class=\"btn\" data-url=\"{{ path('panier_clear') }}\" data-method=\"POST\">Vider le panier</button>
</div>
{% endif %}
", "_partials/_cart-items.html.twig", "/var/www/symfony/templates/_partials/_cart-items.html.twig");
    }
}
