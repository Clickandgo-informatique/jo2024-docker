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

        // line 2
        yield "<body
\tclass=\"";
        // line 3
        if ((($tmp = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "admin";
        }
        yield "\">

\t";
        // line 6
        yield "\t";
        if ((($tmp = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 7
            yield "\t\t<div id=\"sidebar\" class=\"sidebar open\">

\t\t\t<div class=\"sidebar-item\">
\t\t\t\t<div class=\"sidebar-item-title\">
\t\t\t\t\t<i class=\"fa-solid fa-users\"></i>
\t\t\t\t\tUtilisateurs
\t\t\t\t</div>
\t\t\t\t<div class=\"sidebar-item-link\">
\t\t\t\t\t<a href=\"";
            // line 15
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_utilisateurs_index");
            yield "\" class=\"sidebar-link\">
\t\t\t\t\t\t<i class=\"fa-solid fa-list\"></i>
\t\t\t\t\t\tListe
\t\t\t\t\t</a>
\t\t\t\t</div>
\t\t\t</div>

\t\t\t<div class=\"sidebar-item\">
\t\t\t\t<div class=\"sidebar-item-title\">
\t\t\t\t\t<i class=\"fa-solid fa-briefcase\"></i>
\t\t\t\t\tOffres
\t\t\t\t</div>
\t\t\t\t<div class=\"sidebar-item-link\">
\t\t\t\t\t<a href=\"";
            // line 28
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_offres_index");
            yield "\" class=\"sidebar-link\">
\t\t\t\t\t\t<i class=\"fa-solid fa-list\"></i>
\t\t\t\t\t\tListe
\t\t\t\t\t</a>
\t\t\t\t</div>
\t\t\t</div>

\t\t\t<div class=\"sidebar-item\">
\t\t\t\t<div class=\"sidebar-item-title\">
\t\t\t\t\t<i class=\"fa-solid fa-futbol\"></i>
\t\t\t\t\tSports
\t\t\t\t</div>
\t\t\t\t<div class=\"sidebar-item-link\">
\t\t\t\t\t<a href=\"";
            // line 41
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_sports_index");
            yield "\" class=\"sidebar-link\">
\t\t\t\t\t\t<i class=\"fa-solid fa-list\"></i>
\t\t\t\t\t\tListe
\t\t\t\t\t</a>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t";
        }
        // line 49
        yield "

\t";
        // line 52
        yield "\t";
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 55
        yield "
\t";
        // line 57
        yield "\t";
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 81
        yield "
</body>
";
        
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
        yield "\t\t<link rel=\"stylesheet\" href=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/sidebar.css"), "html", null, true);
        yield "\">
\t";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 57
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

        // line 58
        yield "\t\t<script>
\t\t\tdocument.addEventListener('DOMContentLoaded', () => {
const sidebar = document.getElementById('sidebar');
const main = document.getElementById('main');
const closeBtn = document.getElementById('sidebarClose');
const toggleBtn = document.getElementById('sidebarToggle');

if (closeBtn) {
closeBtn.addEventListener('click', () => {
sidebar.classList.remove('open');
main.classList.remove('shifted');
});
}

if (toggleBtn) {
toggleBtn.addEventListener('click', () => {
sidebar.classList.toggle('open');
main.classList.toggle('shifted');
});
}
});
\t\t</script>
\t";
        
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
        return array (  182 => 58,  169 => 57,  155 => 53,  142 => 52,  129 => 81,  126 => 57,  123 => 55,  120 => 52,  116 => 49,  105 => 41,  89 => 28,  73 => 15,  63 => 7,  60 => 6,  53 => 3,  50 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# base.html.twig ou layout admin #}
<body
\tclass=\"{% if is_granted('ROLE_ADMIN') %}admin{% endif %}\">

\t{# Sidebar #}
\t{% if is_granted('ROLE_ADMIN') %}
\t\t<div id=\"sidebar\" class=\"sidebar open\">

\t\t\t<div class=\"sidebar-item\">
\t\t\t\t<div class=\"sidebar-item-title\">
\t\t\t\t\t<i class=\"fa-solid fa-users\"></i>
\t\t\t\t\tUtilisateurs
\t\t\t\t</div>
\t\t\t\t<div class=\"sidebar-item-link\">
\t\t\t\t\t<a href=\"{{ path('app_utilisateurs_index') }}\" class=\"sidebar-link\">
\t\t\t\t\t\t<i class=\"fa-solid fa-list\"></i>
\t\t\t\t\t\tListe
\t\t\t\t\t</a>
\t\t\t\t</div>
\t\t\t</div>

\t\t\t<div class=\"sidebar-item\">
\t\t\t\t<div class=\"sidebar-item-title\">
\t\t\t\t\t<i class=\"fa-solid fa-briefcase\"></i>
\t\t\t\t\tOffres
\t\t\t\t</div>
\t\t\t\t<div class=\"sidebar-item-link\">
\t\t\t\t\t<a href=\"{{ path('app_offres_index') }}\" class=\"sidebar-link\">
\t\t\t\t\t\t<i class=\"fa-solid fa-list\"></i>
\t\t\t\t\t\tListe
\t\t\t\t\t</a>
\t\t\t\t</div>
\t\t\t</div>

\t\t\t<div class=\"sidebar-item\">
\t\t\t\t<div class=\"sidebar-item-title\">
\t\t\t\t\t<i class=\"fa-solid fa-futbol\"></i>
\t\t\t\t\tSports
\t\t\t\t</div>
\t\t\t\t<div class=\"sidebar-item-link\">
\t\t\t\t\t<a href=\"{{ path('app_sports_index') }}\" class=\"sidebar-link\">
\t\t\t\t\t\t<i class=\"fa-solid fa-list\"></i>
\t\t\t\t\t\tListe
\t\t\t\t\t</a>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t{% endif %}


\t{# CSS #}
\t{% block stylesheets %}
\t\t<link rel=\"stylesheet\" href=\"{{ asset('assets/css/sidebar.css') }}\">
\t{% endblock %}

\t{# JS #}
\t{% block javascripts %}
\t\t<script>
\t\t\tdocument.addEventListener('DOMContentLoaded', () => {
const sidebar = document.getElementById('sidebar');
const main = document.getElementById('main');
const closeBtn = document.getElementById('sidebarClose');
const toggleBtn = document.getElementById('sidebarToggle');

if (closeBtn) {
closeBtn.addEventListener('click', () => {
sidebar.classList.remove('open');
main.classList.remove('shifted');
});
}

if (toggleBtn) {
toggleBtn.addEventListener('click', () => {
sidebar.classList.toggle('open');
main.classList.toggle('shifted');
});
}
});
\t\t</script>
\t{% endblock %}

</body>
", "_partials/_sidebar.html.twig", "/var/www/symfony/templates/_partials/_sidebar.html.twig");
    }
}
