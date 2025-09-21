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
class __TwigTemplate_ba9aecae3e71a63ea10cce4601bffb64 extends Template
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
        yield "
\t\t\t\t\toffre
\t\t\t\t\t";
        // line 38
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["offres"]) || array_key_exists("offres", $context) ? $context["offres"] : (function () { throw new RuntimeError('Variable "offres" does not exist.', 38, $this->source); })()), "getTotalItemCount", [], "any", false, false, false, 38) > 1)) {
            yield "s
\t\t\t\t\t";
        }
        // line 40
        yield "\t\t\t\t</span>
\t\t\t</div>

\t\t\t<div id=\"results\" class=\"ajax-reloaded-data\">
\t\t\t\t";
        // line 44
        yield from $this->load("_partials/_catalogue-offres-ajax-wrapper.html.twig", 44)->unwrap()->yield(CoreExtension::toArray(["offres" => (isset($context["offres"]) || array_key_exists("offres", $context) ? $context["offres"] : (function () { throw new RuntimeError('Variable "offres" does not exist.', 44, $this->source); })())]));
        // line 45
        yield "\t\t\t</div>
\t\t</div>
\t</div>

\t";
        // line 50
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
        // line 60
        yield from $this->load("_partials/_categories-offres.html.twig", 60)->unwrap()->yield(CoreExtension::toArray(["categoriesOffres" => (isset($context["categoriesOffres"]) || array_key_exists("categoriesOffres", $context) ? $context["categoriesOffres"] : (function () { throw new RuntimeError('Variable "categoriesOffres" does not exist.', 60, $this->source); })())]));
        // line 61
        yield "\t\t\t";
        yield from $this->load("_partials/_sports-filter.html.twig", 61)->unwrap()->yield(CoreExtension::toArray(["sports" =>         // line 62
(isset($context["sports"]) || array_key_exists("sports", $context) ? $context["sports"] : (function () { throw new RuntimeError('Variable "sports" does not exist.', 62, $this->source); })()), "selectedSlugs" =>         // line 63
(isset($context["selectedSlugs"]) || array_key_exists("selectedSlugs", $context) ? $context["selectedSlugs"] : (function () { throw new RuntimeError('Variable "selectedSlugs" does not exist.', 63, $this->source); })())]));
        // line 65
        yield "\t\t</div>
\t</div>
\t<div id=\"drawerOverlay\" class=\"drawer-overlay\" style=\"display:none;\"></div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 70
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

        // line 71
        yield "\t";
        yield from $this->yieldParentBlock("stylesheets", $context, $blocks);
        yield "
\t<link rel=\"stylesheet\" href=\"";
        // line 72
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/catalogue-offres.css"), "html", null, true);
        yield "\">
\t<link rel=\"stylesheet\" href=\"";
        // line 73
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/filters.css"), "html", null, true);
        yield "\">
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 75
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

        // line 76
        yield "    ";
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
    <script src=\"";
        // line 77
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
        return array (  268 => 77,  263 => 76,  250 => 75,  237 => 73,  233 => 72,  228 => 71,  215 => 70,  201 => 65,  199 => 63,  198 => 62,  196 => 61,  194 => 60,  182 => 50,  176 => 45,  174 => 44,  168 => 40,  163 => 38,  158 => 36,  153 => 33,  148 => 29,  146 => 27,  145 => 26,  144 => 25,  138 => 21,  128 => 17,  120 => 16,  117 => 15,  113 => 14,  107 => 10,  103 => 7,  90 => 6,  66 => 3,  43 => 1,);
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
\t\t\t\t\t{{ offres.getTotalItemCount }}
\t\t\t\t\toffre
\t\t\t\t\t{% if offres.getTotalItemCount > 1 %}s
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
    {{ parent() }}
    <script src=\"{{ asset('assets/js/filters.js') }}\"></script>
{% endblock %}

", "offres/catalogue-offres-clients.html.twig", "/var/www/symfony/templates/offres/catalogue-offres-clients.html.twig");
    }
}
