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

/* _partials/_sidebar.html.twig */
class __TwigTemplate_b1575e4e74a5729cc6f70e75f58ff9cf extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "_partials/_sidebar.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "_partials/_sidebar.html.twig"));

        // line 1
        yield "<aside id=\"sidebar\" class=\"sidebar sidebar-mini\">
\t<ul class=\"sidebar-list\">

\t\t<li class=\"sidebar-item\">
\t\t\t<a href=\"";
        // line 5
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_dashboard");
        yield "\" class=\"sidebar-link\">
\t\t\t\t<i class=\"fa-solid fa-list\"></i>
\t\t\t\t<span class=\"label\">Dashboard</span>
\t\t\t</a>
\t\t</li>

\t\t<li class=\"sidebar-item\">
\t\t\t<div class=\"sidebar-item-title\">
\t\t\t\t<i class=\"fa-solid fa-users\"></i>
\t\t\t\t<span class=\"label\">Utilisateurs</span>
\t\t\t</div>
\t\t\t<ul class=\"sidebar-sublist\">
\t\t\t\t<li>
\t\t\t\t\t<a href=\"";
        // line 18
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_utilisateurs_index");
        yield "\" class=\"sidebar-link\">
\t\t\t\t\t\t<i class=\"fa-solid fa-list\"></i>
\t\t\t\t\t\t<span class=\"label\">Liste</span>
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t</ul>
\t\t</li>
\t</li>
\t<li class=\"sidebar-item\">
\t\t<div class=\"sidebar-item-title\">
\t\t\t<i class=\"fa-solid fa-briefcase\"></i>
\t\t\t<span class=\"label\">Offres</span>
\t\t</div>
\t\t<ul class=\"sidebar-sublist\">
\t\t\t<li>
\t\t\t\t<a href=\"";
        // line 33
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_offres_index");
        yield "\" class=\"sidebar-link\">
\t\t\t\t\t<i class=\"fa-solid fa-list\"></i>
\t\t\t\t\t<span class=\"label\">Liste</span>
\t\t\t\t</a>
\t\t\t</li>
\t\t\t<li>
\t\t\t\t<a href=\"";
        // line 39
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_categories_offres_index");
        yield "\" class=\"sidebar-link\">
\t\t\t\t\t<i class=\"fa-solid fa-tags\"></i>
\t\t\t\t\t<span class=\"label\">Catégories offres</span>
\t\t\t\t</a>
\t\t\t</li>
\t\t</ul>
\t</li>

\t<li class=\"sidebar-item\">
\t\t<div class=\"sidebar-item-title\">
\t\t\t<i class=\"fa-solid fa-futbol\"></i>
\t\t\t<span class=\"label\">Sports</span>
\t\t</div>
\t\t<ul class=\"sidebar-sublist\">
\t\t\t<li>
\t\t\t\t<a href=\"";
        // line 54
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_sports_index");
        yield "\" class=\"sidebar-link\">
\t\t\t\t\t<i class=\"fa-solid fa-list\"></i>
\t\t\t\t\t<span class=\"label\">Liste</span>
\t\t\t\t</a>
\t\t\t</li>
\t\t</ul>
\t</li>

\t<li class=\"sidebar-item\">
\t\t<div class=\"sidebar-item-title\">
\t\t\t<i class=\"fa-solid fa-qrcode\"></i>
\t\t\t<span class=\"label\">QrCodes</span>
\t\t</div>
\t\t<ul class=\"sidebar-sublist\">
\t\t\t<li>
\t\t\t\t<a href=\"";
        // line 69
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_tickets_scan");
        yield "\" class=\"sidebar-link\">
\t\t\t\t\t<i class=\"fa-solid fa-expand\"></i>
\t\t\t\t\t<span class=\"label\">Scanner</span>
\t\t\t\t</a>
\t\t\t</li>
\t\t</ul>
\t</li>

</ul></aside>";
        // line 77
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

        // line 78
        yield "<link rel=\"stylesheet\" href=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/sidebar.css"), "html", null, true);
        yield "\">";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "_partials/_sidebar.html.twig";
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
        return array (  168 => 78,  145 => 77,  134 => 69,  116 => 54,  98 => 39,  89 => 33,  71 => 18,  55 => 5,  49 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<aside id=\"sidebar\" class=\"sidebar sidebar-mini\">
\t<ul class=\"sidebar-list\">

\t\t<li class=\"sidebar-item\">
\t\t\t<a href=\"{{ path('admin_dashboard') }}\" class=\"sidebar-link\">
\t\t\t\t<i class=\"fa-solid fa-list\"></i>
\t\t\t\t<span class=\"label\">Dashboard</span>
\t\t\t</a>
\t\t</li>

\t\t<li class=\"sidebar-item\">
\t\t\t<div class=\"sidebar-item-title\">
\t\t\t\t<i class=\"fa-solid fa-users\"></i>
\t\t\t\t<span class=\"label\">Utilisateurs</span>
\t\t\t</div>
\t\t\t<ul class=\"sidebar-sublist\">
\t\t\t\t<li>
\t\t\t\t\t<a href=\"{{ path('app_utilisateurs_index') }}\" class=\"sidebar-link\">
\t\t\t\t\t\t<i class=\"fa-solid fa-list\"></i>
\t\t\t\t\t\t<span class=\"label\">Liste</span>
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t</ul>
\t\t</li>
\t</li>
\t<li class=\"sidebar-item\">
\t\t<div class=\"sidebar-item-title\">
\t\t\t<i class=\"fa-solid fa-briefcase\"></i>
\t\t\t<span class=\"label\">Offres</span>
\t\t</div>
\t\t<ul class=\"sidebar-sublist\">
\t\t\t<li>
\t\t\t\t<a href=\"{{ path('app_offres_index') }}\" class=\"sidebar-link\">
\t\t\t\t\t<i class=\"fa-solid fa-list\"></i>
\t\t\t\t\t<span class=\"label\">Liste</span>
\t\t\t\t</a>
\t\t\t</li>
\t\t\t<li>
\t\t\t\t<a href=\"{{ path('app_categories_offres_index') }}\" class=\"sidebar-link\">
\t\t\t\t\t<i class=\"fa-solid fa-tags\"></i>
\t\t\t\t\t<span class=\"label\">Catégories offres</span>
\t\t\t\t</a>
\t\t\t</li>
\t\t</ul>
\t</li>

\t<li class=\"sidebar-item\">
\t\t<div class=\"sidebar-item-title\">
\t\t\t<i class=\"fa-solid fa-futbol\"></i>
\t\t\t<span class=\"label\">Sports</span>
\t\t</div>
\t\t<ul class=\"sidebar-sublist\">
\t\t\t<li>
\t\t\t\t<a href=\"{{ path('app_sports_index') }}\" class=\"sidebar-link\">
\t\t\t\t\t<i class=\"fa-solid fa-list\"></i>
\t\t\t\t\t<span class=\"label\">Liste</span>
\t\t\t\t</a>
\t\t\t</li>
\t\t</ul>
\t</li>

\t<li class=\"sidebar-item\">
\t\t<div class=\"sidebar-item-title\">
\t\t\t<i class=\"fa-solid fa-qrcode\"></i>
\t\t\t<span class=\"label\">QrCodes</span>
\t\t</div>
\t\t<ul class=\"sidebar-sublist\">
\t\t\t<li>
\t\t\t\t<a href=\"{{ path('admin_tickets_scan') }}\" class=\"sidebar-link\">
\t\t\t\t\t<i class=\"fa-solid fa-expand\"></i>
\t\t\t\t\t<span class=\"label\">Scanner</span>
\t\t\t\t</a>
\t\t\t</li>
\t\t</ul>
\t</li>

</ul></aside>{% block stylesheets %}
<link rel=\"stylesheet\" href=\"{{asset('assets/css/sidebar.css')}}\">{% endblock %}
", "_partials/_sidebar.html.twig", "/var/www/symfony/templates/_partials/_sidebar.html.twig");
    }
}
