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

/* _partials/_navbar.html.twig */
class __TwigTemplate_ff0e6f7afba24f957b9e2aa7d593cd24 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "_partials/_navbar.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "_partials/_navbar.html.twig"));

        // line 1
        yield "<nav class=\"navbar\">
    <button class=\"hamburger\" id=\"menuToggle\">
        <span></span>
        <span></span>
        <span></span>
    </button>

    <div class=\"navbar-brand\">
        <img src=\"";
        // line 9
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("favicon.svg"), "html", null, true);
        yield "\" alt=\"sigle-jo\" class=\"logo\">
    </div>

    <div class=\"navbar-links\" id=\"navbarLinks\">
        <div class=\"main-links\">
            <a class=\"navbar-link\" href=\"";
        // line 14
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_main");
        yield "\"><i class=\"fa-solid fa-house\"></i> Accueil</a>
            <a class=\"navbar-link\" href=\"";
        // line 15
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_offres_catalogue");
        yield "\"><i class=\"fa-solid fa-clipboard-list\"></i> Catalogue offres</a>
        </div>

        <div class=\"connexion\">
            ";
        // line 19
        if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 19, $this->source); })()), "user", [], "any", false, false, false, 19)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 20
            yield "                <a class=\"navbar-link\" href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
            yield "\"><i class=\"fa fa-sign-in\"></i> Se connecter</a>
                <a class=\"navbar-link\" href=\"";
            // line 21
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
            yield "\"><i class=\"fa fa-user-plus\"></i> S'inscrire</a>
            ";
        } else {
            // line 23
            yield "                <a class=\"navbar-link\" href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
            yield "\"><i class=\"fa fa-sign-out\"></i> Déconnexion</a>
            ";
        }
        // line 25
        yield "        </div>
    </div>
</nav>

<div id=\"menuOverlay\" class=\"navbar-overlay\"></div>

";
        // line 31
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

        // line 32
        yield "<link rel=\"stylesheet\" href=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/navbar.css"), "html", null, true);
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
        return "_partials/_navbar.html.twig";
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
        return array (  127 => 32,  104 => 31,  96 => 25,  90 => 23,  85 => 21,  80 => 20,  78 => 19,  71 => 15,  67 => 14,  59 => 9,  49 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<nav class=\"navbar\">
    <button class=\"hamburger\" id=\"menuToggle\">
        <span></span>
        <span></span>
        <span></span>
    </button>

    <div class=\"navbar-brand\">
        <img src=\"{{ asset('favicon.svg') }}\" alt=\"sigle-jo\" class=\"logo\">
    </div>

    <div class=\"navbar-links\" id=\"navbarLinks\">
        <div class=\"main-links\">
            <a class=\"navbar-link\" href=\"{{ path('app_main') }}\"><i class=\"fa-solid fa-house\"></i> Accueil</a>
            <a class=\"navbar-link\" href=\"{{ path('app_offres_catalogue') }}\"><i class=\"fa-solid fa-clipboard-list\"></i> Catalogue offres</a>
        </div>

        <div class=\"connexion\">
            {% if not app.user %}
                <a class=\"navbar-link\" href=\"{{ path('app_login') }}\"><i class=\"fa fa-sign-in\"></i> Se connecter</a>
                <a class=\"navbar-link\" href=\"{{ path('app_register') }}\"><i class=\"fa fa-user-plus\"></i> S'inscrire</a>
            {% else %}
                <a class=\"navbar-link\" href=\"{{ path('app_logout') }}\"><i class=\"fa fa-sign-out\"></i> Déconnexion</a>
            {% endif %}
        </div>
    </div>
</nav>

<div id=\"menuOverlay\" class=\"navbar-overlay\"></div>

{% block stylesheets %}
<link rel=\"stylesheet\" href=\"{{ asset('assets/css/navbar.css') }}\">
{% endblock %}
", "_partials/_navbar.html.twig", "/var/www/symfony/templates/_partials/_navbar.html.twig");
    }
}
