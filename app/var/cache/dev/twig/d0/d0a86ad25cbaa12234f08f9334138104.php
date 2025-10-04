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
            'javascripts' => [$this, 'block_javascripts'],
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
        yield "<aside
\tid=\"sidebar\" class=\"sidebar\">
\t";
        // line 4
        yield "\t<div class=\"sidebar-item\">
\t\t<div class=\"sidebar-item-title\">
\t\t\t<a href=\"";
        // line 6
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_dashboard");
        yield "\" class=\"sidebar-link\">
\t\t\t\t<i class=\"fa-solid fa-list\"></i>
\t\t\t\tDashboard</a>
\t\t</div>
\t</div>
\t<div class=\"sidebar-item\">
\t\t<div class=\"sidebar-item-title\">
\t\t\t<i class=\"fa-solid fa-users\"></i>
\t\t\tUtilisateurs</div>
\t\t<a href=\"";
        // line 15
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_utilisateurs_index");
        yield "\" class=\"sidebar-link\">
\t\t\t<i class=\"fa-solid fa-list\"></i>
\t\t\tListe</a>
\t</div>
\t<div class=\"sidebar-item\">
\t\t<div class=\"sidebar-item-title\">
\t\t\t<i class=\"fa-solid fa-briefcase\"></i>
\t\t\tOffres</div>
\t\t<a href=\"";
        // line 23
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_offres_index");
        yield "\" class=\"sidebar-link\">
\t\t\t<i class=\"fa-solid fa-list\"></i>
\t\t\tListe</a>
\t\t<a href=\"";
        // line 26
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_categories_offres_index");
        yield "\" class=\"sidebar-link\">
\t\t\t<i class=\"fa-solid fa-tags\"></i>
\t\t\tCatégories offres</a>
\t</div>
\t<div class=\"sidebar-item\">
\t\t<div class=\"sidebar-item-title\">
\t\t\t<i class=\"fa-solid fa-futbol\"></i>
\t\t\tSports</div>
\t\t<a href=\"";
        // line 34
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_sports_index");
        yield "\" class=\"sidebar-link\">
\t\t\t<i class=\"fa-solid fa-list\"></i>
\t\t\tListe</a>
\t</div>
\t<div class=\"sidebar-item\">
\t\t<div class=\"sidebar-item-title\">
\t\t\t<i class=\"fa-solid fa-qrcode\"></i>
\t\t\tQrCodes</div>
\t\t<a href=\"";
        // line 42
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_tickets_scan");
        yield "\" class=\"sidebar-link\">
\t\t\t<i class=\"fa-solid fa-expand\"></i>
\t\t\tScanner</a>
\t</div>
</aside>
<!-- bouton flottant pour toggle -->
<button id=\"sidebar-toggle\" class=\"sidebar-toggle\">
\t▶
</button>

";
        // line 52
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 55
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 52
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

        // line 53
        yield "\t<link rel=\"stylesheet\" href=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/sidebar.css"), "html", null, true);
        yield "\">
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 55
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

        // line 56
        yield "\t<script type=\"module\" src=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/sidebar.js"), "html", null, true);
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
        return array (  175 => 56,  162 => 55,  148 => 53,  135 => 52,  124 => 55,  122 => 52,  109 => 42,  98 => 34,  87 => 26,  81 => 23,  70 => 15,  58 => 6,  54 => 4,  50 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<aside
\tid=\"sidebar\" class=\"sidebar\">
\t{# Dashboard #}
\t<div class=\"sidebar-item\">
\t\t<div class=\"sidebar-item-title\">
\t\t\t<a href=\"{{ path('admin_dashboard') }}\" class=\"sidebar-link\">
\t\t\t\t<i class=\"fa-solid fa-list\"></i>
\t\t\t\tDashboard</a>
\t\t</div>
\t</div>
\t<div class=\"sidebar-item\">
\t\t<div class=\"sidebar-item-title\">
\t\t\t<i class=\"fa-solid fa-users\"></i>
\t\t\tUtilisateurs</div>
\t\t<a href=\"{{ path('app_utilisateurs_index') }}\" class=\"sidebar-link\">
\t\t\t<i class=\"fa-solid fa-list\"></i>
\t\t\tListe</a>
\t</div>
\t<div class=\"sidebar-item\">
\t\t<div class=\"sidebar-item-title\">
\t\t\t<i class=\"fa-solid fa-briefcase\"></i>
\t\t\tOffres</div>
\t\t<a href=\"{{ path('app_offres_index') }}\" class=\"sidebar-link\">
\t\t\t<i class=\"fa-solid fa-list\"></i>
\t\t\tListe</a>
\t\t<a href=\"{{ path('app_categories_offres_index') }}\" class=\"sidebar-link\">
\t\t\t<i class=\"fa-solid fa-tags\"></i>
\t\t\tCatégories offres</a>
\t</div>
\t<div class=\"sidebar-item\">
\t\t<div class=\"sidebar-item-title\">
\t\t\t<i class=\"fa-solid fa-futbol\"></i>
\t\t\tSports</div>
\t\t<a href=\"{{ path('app_sports_index') }}\" class=\"sidebar-link\">
\t\t\t<i class=\"fa-solid fa-list\"></i>
\t\t\tListe</a>
\t</div>
\t<div class=\"sidebar-item\">
\t\t<div class=\"sidebar-item-title\">
\t\t\t<i class=\"fa-solid fa-qrcode\"></i>
\t\t\tQrCodes</div>
\t\t<a href=\"{{ path('admin_tickets_scan') }}\" class=\"sidebar-link\">
\t\t\t<i class=\"fa-solid fa-expand\"></i>
\t\t\tScanner</a>
\t</div>
</aside>
<!-- bouton flottant pour toggle -->
<button id=\"sidebar-toggle\" class=\"sidebar-toggle\">
\t▶
</button>

{% block stylesheets %}
\t<link rel=\"stylesheet\" href=\"{{ asset('assets/css/sidebar.css') }}\">
{% endblock %}
{% block javascripts %}
\t<script type=\"module\" src=\"{{asset('assets/js/sidebar.js')}}\"></script>
{% endblock %}
", "_partials/_sidebar.html.twig", "/var/www/symfony/templates/_partials/_sidebar.html.twig");
    }
}
