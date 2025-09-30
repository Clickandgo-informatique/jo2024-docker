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
        yield "<nav
\tclass=\"navbar\">
\t";
        // line 4
        yield "\t<div class=\"navbar-header\">
\t\t<button class=\"hamburger\" id=\"menuToggle\">
\t\t\t<span></span>
\t\t\t<span></span>
\t\t\t<span></span>
\t\t</button>
\t\t";
        // line 11
        yield "\t\t<div class=\"navbar-brand\">
\t\t\t<img src=\"";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("favicon.svg"), "html", null, true);
        yield "\" alt=\"sigle-jo\" class=\"logo\">
\t\t</div>
\t</div>
\t";
        // line 16
        yield "\t<div class=\"navbar-links\" id=\"navbarLinks\">
\t\t<div class=\"main-links\">
\t\t\t<a class=\"navbar-link\" href=\"";
        // line 18
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_main");
        yield "\">
\t\t\t\t<i class=\"fa-solid fa-house\"></i>
\t\t\t\tAccueil</a>
\t\t\t<a class=\"navbar-link\" href=\"";
        // line 21
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_offres_catalogue");
        yield "\">
\t\t\t\t<i class=\"fa-solid fa-clipboard-list\"></i>
\t\t\t\tCatalogue offres</a>
\t\t</div>

\t\t<div class=\"connexion\">
\t\t\t";
        // line 27
        if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 27, $this->source); })()), "user", [], "any", false, false, false, 27)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 28
            yield "\t\t\t\t<a class=\"navbar-link\" href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
            yield "\">
\t\t\t\t\t<i class=\"fa fa-sign-in\"></i>
\t\t\t\t\tSe connecter</a>
\t\t\t\t<a class=\"navbar-link\" href=\"";
            // line 31
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
            yield "\">
\t\t\t\t\t<i class=\"fa fa-user-plus\"></i>
\t\t\t\t\tS'inscrire</a>
\t\t\t";
        } else {
            // line 35
            yield "\t\t\t\t<a class=\"navbar-link\" href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
            yield "\">
\t\t\t\t\t<i class=\"fa fa-sign-out\"></i>
\t\t\t\t\tDéconnexion</a>
\t\t\t";
        }
        // line 39
        yield "\t\t</div>
\t</div>
</nav>

<div id=\"menuOverlay\" class=\"navbar-overlay\"></div>

";
        // line 45
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

        // line 46
        yield "\t<link rel=\"stylesheet\" href=\"";
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
        return array (  144 => 46,  121 => 45,  113 => 39,  105 => 35,  98 => 31,  91 => 28,  89 => 27,  80 => 21,  74 => 18,  70 => 16,  64 => 12,  61 => 11,  53 => 4,  49 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<nav
\tclass=\"navbar\">
\t{# Bouton menu #}
\t<div class=\"navbar-header\">
\t\t<button class=\"hamburger\" id=\"menuToggle\">
\t\t\t<span></span>
\t\t\t<span></span>
\t\t\t<span></span>
\t\t</button>
\t\t{# Logo #}
\t\t<div class=\"navbar-brand\">
\t\t\t<img src=\"{{ asset('favicon.svg') }}\" alt=\"sigle-jo\" class=\"logo\">
\t\t</div>
\t</div>
\t{# Links #}
\t<div class=\"navbar-links\" id=\"navbarLinks\">
\t\t<div class=\"main-links\">
\t\t\t<a class=\"navbar-link\" href=\"{{ path('app_main') }}\">
\t\t\t\t<i class=\"fa-solid fa-house\"></i>
\t\t\t\tAccueil</a>
\t\t\t<a class=\"navbar-link\" href=\"{{ path('app_offres_catalogue') }}\">
\t\t\t\t<i class=\"fa-solid fa-clipboard-list\"></i>
\t\t\t\tCatalogue offres</a>
\t\t</div>

\t\t<div class=\"connexion\">
\t\t\t{% if not app.user %}
\t\t\t\t<a class=\"navbar-link\" href=\"{{ path('app_login') }}\">
\t\t\t\t\t<i class=\"fa fa-sign-in\"></i>
\t\t\t\t\tSe connecter</a>
\t\t\t\t<a class=\"navbar-link\" href=\"{{ path('app_register') }}\">
\t\t\t\t\t<i class=\"fa fa-user-plus\"></i>
\t\t\t\t\tS'inscrire</a>
\t\t\t{% else %}
\t\t\t\t<a class=\"navbar-link\" href=\"{{ path('app_logout') }}\">
\t\t\t\t\t<i class=\"fa fa-sign-out\"></i>
\t\t\t\t\tDéconnexion</a>
\t\t\t{% endif %}
\t\t</div>
\t</div>
</nav>

<div id=\"menuOverlay\" class=\"navbar-overlay\"></div>

{% block stylesheets %}
\t<link rel=\"stylesheet\" href=\"{{ asset('assets/css/navbar.css') }}\">
{% endblock %}
", "_partials/_navbar.html.twig", "/var/www/symfony/templates/_partials/_navbar.html.twig");
    }
}
