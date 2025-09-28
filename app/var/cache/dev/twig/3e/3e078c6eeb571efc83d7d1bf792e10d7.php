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

        // line 2
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 2, $this->source); })()))) {
            // line 3
            yield "    <p class=\"cart-empty\">Votre panier est vide.</p>
";
        } else {
            // line 5
            yield "    <table>
        <thead>
            <tr>
                <th class=\"cart-header text-left\">Intitulé</th>
                <th class=\"cart-header text-center\">Quantité</th>
                <th class=\"cart-header text-right\">Prix total</th>
                <th class=\"cart-header\"></th>
            </tr>
        </thead>
        <tbody>
            ";
            // line 15
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 15, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 16
                yield "                <tr>
                    <td class=\"cart-product text-left\">";
                // line 17
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "offre", [], "any", false, false, false, 17), "intitule", [], "any", false, false, false, 17), "html", null, true);
                yield "</td>
                    <td class=\"quantity-control\">
                        <button type=\"button\" class=\"decrease btn btn-primary btn-qty\"
                                data-url=\"";
                // line 20
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("panier_update", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "offre", [], "any", false, false, false, 20), "id", [], "any", false, false, false, 20)]), "html", null, true);
                yield "\" data-method=\"POST\">-</button>
                        <input type=\"text\" class=\"quantity-input\" value=\"";
                // line 21
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "quantite", [], "any", false, false, false, 21), "html", null, true);
                yield "\"
                               data-url=\"";
                // line 22
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("panier_update", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "offre", [], "any", false, false, false, 22), "id", [], "any", false, false, false, 22)]), "html", null, true);
                yield "\">
                        <button type=\"button\" class=\"increase btn btn-primary btn-qty\"
                                data-url=\"";
                // line 24
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("panier_update", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "offre", [], "any", false, false, false, 24), "id", [], "any", false, false, false, 24)]), "html", null, true);
                yield "\" data-method=\"POST\">+</button>
                    </td>
                    <td class=\"cart-total text-right\">";
                // line 26
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "total", [], "any", false, false, false, 26), 2, ",", " "), "html", null, true);
                yield " €</td>
                    <td class=\"cart-actions text-center\">
                        <button type=\"button\" class=\"remove-item btn btn-danger\"
                                data-url=\"";
                // line 29
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("panier_remove", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "offre", [], "any", false, false, false, 29), "id", [], "any", false, false, false, 29)]), "html", null, true);
                yield "\" data-method=\"POST\">
                            <i class=\"fa-solid fa-trash-can\"></i>
                        </button>
                    </td>
                </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 35
            yield "        </tbody>
        <tfoot>
            <tr class=\"cart-summary\">
                <td class=\"summary-items\">Total articles : ";
            // line 38
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalItems"]) || array_key_exists("totalItems", $context) ? $context["totalItems"] : (function () { throw new RuntimeError('Variable "totalItems" does not exist.', 38, $this->source); })()), "html", null, true);
            yield "</td>
                <td class=\"summary-total\">Total panier : ";
            // line 39
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber((isset($context["total"]) || array_key_exists("total", $context) ? $context["total"] : (function () { throw new RuntimeError('Variable "total" does not exist.', 39, $this->source); })()), 2, ",", " "), "html", null, true);
            yield " €</td>
                <td colspan=\"2\">
                    <button type=\"button\" id=\"clear-cart\" class=\"btn btn-warning\"
                            data-url=\"";
            // line 42
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("panier_clear");
            yield "\" data-method=\"POST\">
                        <i class=\"fa-solid fa-shopping-basket\"></i> Vider le panier
                    </button>
                </td>
            </tr>
        </tfoot>
    </table>
";
        }
        // line 50
        yield "
";
        // line 51
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

        // line 52
        yield "    <link rel=\"stylesheet\" href=\"";
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
        return array (  168 => 52,  145 => 51,  142 => 50,  131 => 42,  125 => 39,  121 => 38,  116 => 35,  104 => 29,  98 => 26,  93 => 24,  88 => 22,  84 => 21,  80 => 20,  74 => 17,  71 => 16,  67 => 15,  55 => 5,  51 => 3,  49 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# app/templates/partials/_cart-items.html.twig #}
{% if data is empty %}
    <p class=\"cart-empty\">Votre panier est vide.</p>
{% else %}
    <table>
        <thead>
            <tr>
                <th class=\"cart-header text-left\">Intitulé</th>
                <th class=\"cart-header text-center\">Quantité</th>
                <th class=\"cart-header text-right\">Prix total</th>
                <th class=\"cart-header\"></th>
            </tr>
        </thead>
        <tbody>
            {% for item in data %}
                <tr>
                    <td class=\"cart-product text-left\">{{ item.offre.intitule }}</td>
                    <td class=\"quantity-control\">
                        <button type=\"button\" class=\"decrease btn btn-primary btn-qty\"
                                data-url=\"{{ path('panier_update', {'id': item.offre.id}) }}\" data-method=\"POST\">-</button>
                        <input type=\"text\" class=\"quantity-input\" value=\"{{ item.quantite }}\"
                               data-url=\"{{ path('panier_update', {'id': item.offre.id}) }}\">
                        <button type=\"button\" class=\"increase btn btn-primary btn-qty\"
                                data-url=\"{{ path('panier_update', {'id': item.offre.id}) }}\" data-method=\"POST\">+</button>
                    </td>
                    <td class=\"cart-total text-right\">{{ item.total|number_format(2, ',', ' ') }} €</td>
                    <td class=\"cart-actions text-center\">
                        <button type=\"button\" class=\"remove-item btn btn-danger\"
                                data-url=\"{{ path('panier_remove', {'id': item.offre.id}) }}\" data-method=\"POST\">
                            <i class=\"fa-solid fa-trash-can\"></i>
                        </button>
                    </td>
                </tr>
            {% endfor %}
        </tbody>
        <tfoot>
            <tr class=\"cart-summary\">
                <td class=\"summary-items\">Total articles : {{ totalItems }}</td>
                <td class=\"summary-total\">Total panier : {{ total|number_format(2, ',', ' ') }} €</td>
                <td colspan=\"2\">
                    <button type=\"button\" id=\"clear-cart\" class=\"btn btn-warning\"
                            data-url=\"{{ path('panier_clear') }}\" data-method=\"POST\">
                        <i class=\"fa-solid fa-shopping-basket\"></i> Vider le panier
                    </button>
                </td>
            </tr>
        </tfoot>
    </table>
{% endif %}

{% block stylesheets %}
    <link rel=\"stylesheet\" href=\"{{ asset('assets/css/table.css') }}\">
{% endblock %}
", "_partials/_cart-items.html.twig", "/var/www/symfony/templates/_partials/_cart-items.html.twig");
    }
}
