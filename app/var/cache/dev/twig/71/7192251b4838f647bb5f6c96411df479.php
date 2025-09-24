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

/* offres/catalogue-offres-clients.html.twig */
class __TwigTemplate_3b4a65fdc83e358ce1c375fb468a5fbf extends Template
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

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "offres/catalogue-offres-clients.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "offres/catalogue-offres-clients.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Catalogue des offres
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 6
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 7
        yield "\t<div
\t\tclass=\"catalogue-layout\">
\t\t";
        // line 10
        yield "\t\t<aside class=\"filters-column\">
\t\t\t<div class=\"filter-block\">
\t\t\t\t<h5 class=\"filter-title\">Catégories</h5>
\t\t\t\t<ul class=\"categories-list\">
\t\t\t\t\t";
        // line 14
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["categoriesOffres"]) || array_key_exists("categoriesOffres", $context) ? $context["categoriesOffres"] : (function () { throw new RuntimeError('Variable "categoriesOffres" does not exist.', 14, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
            // line 15
            yield "\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"";
            // line 16
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_offres-par-categories", ["slug" => CoreExtension::getAttribute($this->env, $this->source, $context["cat"], "slug", [], "any", false, false, false, 16)]), "html", null, true);
            yield "\" class=\"filter-link ";
            if ((array_key_exists("categorie", $context) && ((isset($context["categorie"]) || array_key_exists("categorie", $context) ? $context["categorie"] : (function () { throw new RuntimeError('Variable "categorie" does not exist.', 16, $this->source); })()) == CoreExtension::getAttribute($this->env, $this->source, $context["cat"], "slug", [], "any", false, false, false, 16)))) {
                yield "active";
            }
            yield "\">
\t\t\t\t\t\t\t\t";
            // line 17
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["cat"], "nom", [], "any", false, false, false, 17), "html", null, true);
            yield "
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['cat'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        yield "\t\t\t\t</ul>
\t\t\t</div>

\t\t\t<div class=\"filter-block\">
\t\t\t\t";
        // line 25
        yield from $this->load("_partials/_sports-filter.html.twig", 25)->unwrap()->yield(CoreExtension::toArray(["sports" =>         // line 26
(isset($context["sports"]) || array_key_exists("sports", $context) ? $context["sports"] : (function () { throw new RuntimeError('Variable "sports" does not exist.', 26, $this->source); })()), "selectedSlugs" =>         // line 27
(isset($context["selectedSlugs"]) || array_key_exists("selectedSlugs", $context) ? $context["selectedSlugs"] : (function () { throw new RuntimeError('Variable "selectedSlugs" does not exist.', 27, $this->source); })())]));
        // line 29
        yield "\t\t\t</div>
\t\t</aside>

\t\t";
        // line 33
        yield "\t\t<div class=\"results-column\">
\t\t\t<div class=\"results-header\">
\t\t\t\t<span id=\"resultsCount\">
\t\t\t\t\t";
        // line 36
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["offres"]) || array_key_exists("offres", $context) ? $context["offres"] : (function () { throw new RuntimeError('Variable "offres" does not exist.', 36, $this->source); })()), "getTotalItemCount", [], "any", false, false, false, 36), "html", null, true);
        yield "&nbsp;
\t\t\t\t\t";
        // line 37
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["offres"]) || array_key_exists("offres", $context) ? $context["offres"] : (function () { throw new RuntimeError('Variable "offres" does not exist.', 37, $this->source); })()), "getTotalItemCount", [], "any", false, false, false, 37) > 1)) {
            // line 38
            yield "\t\t\t\t\t\toffres
\t\t\t\t\t";
        } else {
            // line 40
            yield "\t\t\t\t\t\toffre
\t\t\t\t\t";
        }
        // line 42
        yield "\t\t\t\t</span>
\t\t\t</div>

\t\t\t<div id=\"results\" class=\"ajax-reloaded-data\">
\t\t\t\t";
        // line 46
        yield from $this->load("_partials/_catalogue-offres-ajax-wrapper.html.twig", 46)->unwrap()->yield(CoreExtension::toArray(["offres" => (isset($context["offres"]) || array_key_exists("offres", $context) ? $context["offres"] : (function () { throw new RuntimeError('Variable "offres" does not exist.', 46, $this->source); })())]));
        // line 47
        yield "\t\t\t</div>
\t\t</div>
\t</div>

\t";
        // line 52
        yield "\t<button id=\"filtersFAB\" class=\"btn-filter-mobile\" title=\"Filtrer\">
\t\t<i class=\"fas fa-filter\"></i>
\t</button>

\t<div id=\"filtersDrawer\" class=\"filters-drawer\" aria-hidden=\"true\">
\t\t<div class=\"drawer-header\">
\t\t\t<h4>Filtres</h4>
\t\t\t<button id=\"closeFilters\" class=\"drawer-close\">&times;</button>
\t\t</div>
\t\t<div class=\"drawer-content\">
\t\t\t";
        // line 62
        yield from $this->load("_partials/_categories-offres.html.twig", 62)->unwrap()->yield(CoreExtension::toArray(["categoriesOffres" => (isset($context["categoriesOffres"]) || array_key_exists("categoriesOffres", $context) ? $context["categoriesOffres"] : (function () { throw new RuntimeError('Variable "categoriesOffres" does not exist.', 62, $this->source); })())]));
        // line 63
        yield "\t\t\t";
        yield from $this->load("_partials/_sports-filter.html.twig", 63)->unwrap()->yield(CoreExtension::toArray(["sports" =>         // line 64
(isset($context["sports"]) || array_key_exists("sports", $context) ? $context["sports"] : (function () { throw new RuntimeError('Variable "sports" does not exist.', 64, $this->source); })()), "selectedSlugs" =>         // line 65
(isset($context["selectedSlugs"]) || array_key_exists("selectedSlugs", $context) ? $context["selectedSlugs"] : (function () { throw new RuntimeError('Variable "selectedSlugs" does not exist.', 65, $this->source); })())]));
        // line 67
        yield "\t\t</div>
\t</div>
\t<div id=\"drawerOverlay\" class=\"drawer-overlay\" style=\"display:none;\"></div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 72
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

        // line 73
        yield "\t";
        yield from $this->yieldParentBlock("stylesheets", $context, $blocks);
        yield "
\t<link rel=\"stylesheet\" href=\"";
        // line 74
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/catalogue-offres.css"), "html", null, true);
        yield "\">
\t<link rel=\"stylesheet\" href=\"";
        // line 75
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/filters.css"), "html", null, true);
        yield "\">
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 77
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 78
        yield "\t";
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
\t<script src=\"";
        // line 79
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/filters.js"), "html", null, true);
        yield "\"></script>
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
        return "offres/catalogue-offres-clients.html.twig";
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
        return array (  272 => 79,  267 => 78,  254 => 77,  241 => 75,  237 => 74,  232 => 73,  219 => 72,  205 => 67,  203 => 65,  202 => 64,  200 => 63,  198 => 62,  186 => 52,  180 => 47,  178 => 46,  172 => 42,  168 => 40,  164 => 38,  162 => 37,  158 => 36,  153 => 33,  148 => 29,  146 => 27,  145 => 26,  144 => 25,  138 => 21,  128 => 17,  120 => 16,  117 => 15,  113 => 14,  107 => 10,  103 => 7,  90 => 6,  66 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Catalogue des offres
{% endblock %}

{% block body %}
\t<div
\t\tclass=\"catalogue-layout\">
\t\t{# Colonne filtres (desktop) #}
\t\t<aside class=\"filters-column\">
\t\t\t<div class=\"filter-block\">
\t\t\t\t<h5 class=\"filter-title\">Catégories</h5>
\t\t\t\t<ul class=\"categories-list\">
\t\t\t\t\t{% for cat in categoriesOffres %}
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"{{ path('app_offres-par-categories', { slug: cat.slug }) }}\" class=\"filter-link {% if categorie is defined and categorie == cat.slug %}active{% endif %}\">
\t\t\t\t\t\t\t\t{{ cat.nom }}
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t{% endfor %}
\t\t\t\t</ul>
\t\t\t</div>

\t\t\t<div class=\"filter-block\">
\t\t\t\t{% include '_partials/_sports-filter.html.twig' with {
                sports: sports,
                selectedSlugs: selectedSlugs
            } only %}
\t\t\t</div>
\t\t</aside>

\t\t{# Colonne résultats (cards) #}
\t\t<div class=\"results-column\">
\t\t\t<div class=\"results-header\">
\t\t\t\t<span id=\"resultsCount\">
\t\t\t\t\t{{ offres.getTotalItemCount }}&nbsp;
\t\t\t\t\t{% if offres.getTotalItemCount > 1 %}
\t\t\t\t\t\toffres
\t\t\t\t\t{% else %}
\t\t\t\t\t\toffre
\t\t\t\t\t{% endif %}
\t\t\t\t</span>
\t\t\t</div>

\t\t\t<div id=\"results\" class=\"ajax-reloaded-data\">
\t\t\t\t{% include '_partials/_catalogue-offres-ajax-wrapper.html.twig' with { 'offres': offres } only %}
\t\t\t</div>
\t\t</div>
\t</div>

\t{# Drawer mobile #}
\t<button id=\"filtersFAB\" class=\"btn-filter-mobile\" title=\"Filtrer\">
\t\t<i class=\"fas fa-filter\"></i>
\t</button>

\t<div id=\"filtersDrawer\" class=\"filters-drawer\" aria-hidden=\"true\">
\t\t<div class=\"drawer-header\">
\t\t\t<h4>Filtres</h4>
\t\t\t<button id=\"closeFilters\" class=\"drawer-close\">&times;</button>
\t\t</div>
\t\t<div class=\"drawer-content\">
\t\t\t{% include '_partials/_categories-offres.html.twig' with { 'categoriesOffres': categoriesOffres } only %}
\t\t\t{% include '_partials/_sports-filter.html.twig' with {
            sports: sports,
            selectedSlugs: selectedSlugs
        } only %}
\t\t</div>
\t</div>
\t<div id=\"drawerOverlay\" class=\"drawer-overlay\" style=\"display:none;\"></div>
{% endblock %}

{% block stylesheets %}
\t{{ parent() }}
\t<link rel=\"stylesheet\" href=\"{{ asset('assets/css/catalogue-offres.css') }}\">
\t<link rel=\"stylesheet\" href=\"{{ asset('assets/css/filters.css') }}\">
{% endblock %}
{% block javascripts %}
\t{{ parent() }}
\t<script src=\"{{ asset('assets/js/filters.js') }}\"></script>
{% endblock %}
", "offres/catalogue-offres-clients.html.twig", "/var/www/symfony/templates/offres/catalogue-offres-clients.html.twig");
    }
}
