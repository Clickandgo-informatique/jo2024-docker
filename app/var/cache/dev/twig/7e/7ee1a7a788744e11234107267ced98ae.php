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

/* _partials/_subnav.html.twig */
class __TwigTemplate_db9f24bb36bcebc7cd1bd15461c2dded extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "_partials/_subnav.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "_partials/_subnav.html.twig"));

        // line 1
        yield "<div
\tclass=\"subnav-container\">
\t";
        // line 4
        yield "\t<button class=\"subnav-arrow\" id=\"subnavLeft\">‹</button>

\t";
        // line 7
        yield "\t<div class=\"subnav-wrapper\">
\t\t<div id=\"subnav\" class=\"subnav\">
\t\t\t";
        // line 9
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 9, $this->source); })()), "user", [], "any", false, false, false, 9)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 10
            yield "\t\t\t\t<div class=\"connected\">
\t\t\t\t\t<span class=\"connected-message\">
\t\t\t\t\t\tVous êtes connecté(e) en tant que
\t\t\t\t\t</span>
\t\t\t\t\t<span class=\"nickname\">";
            // line 14
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 14, $this->source); })()), "user", [], "any", false, false, false, 14), "userIdentifier", [], "any", false, false, false, 14), "html", null, true);
            yield "</span>
\t\t\t\t</div>

\t\t\t\t<div class=\"orders\">
\t\t\t\t\t<a href=\"";
            // line 18
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_commandes_liste-commandes-client", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 18, $this->source); })()), "user", [], "any", false, false, false, 18), "id", [], "any", false, false, false, 18)]), "html", null, true);
            yield "\">
\t\t\t\t\t\t<i class=\"fa-solid fa-clipboard-list\"></i>
\t\t\t\t\t\tMes commandes / tickets
\t\t\t\t\t</a>
\t\t\t\t</div>

\t\t\t\t<div class=\"user-options\">
\t\t\t\t\t<div class=\"profile\">
\t\t\t\t\t\t<a class=\"nav-link\" href=\"";
            // line 26
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile_index");
            yield "\">
\t\t\t\t\t\t\t<i class=\"fa-regular fa-address-card\"></i>
\t\t\t\t\t\t\tMon profil
\t\t\t\t\t\t</a>
\t\t\t\t\t</div>
\t\t\t\t\t";
            // line 31
            if ((($tmp = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 32
                yield "\t\t\t\t\t\t<a class=\"nav-link\" href=\"";
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_dashboard");
                yield "\">
\t\t\t\t\t\t\t<i class=\"fa fa-cog\"></i>
\t\t\t\t\t\t\tAdministration
\t\t\t\t\t\t</a>
\t\t\t\t\t";
            }
            // line 37
            yield "\t\t\t\t</div>
\t\t\t";
        } else {
            // line 39
            yield "\t\t\t\t<p class=\"text-center not-connected\">
\t\t\t\t\tBonjour visiteur, vous n'êtes pas encore connecté(e).
\t\t\t\t</p>
\t\t\t";
        }
        // line 43
        yield "
\t\t\t<div class=\"cart\">
\t\t\t\t<a href=\"";
        // line 45
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("panier_index");
        yield "\" class=\"cart-button nav-link\">
\t\t\t\t\t<span class=\"cart-icon-wrapper\">
\t\t\t\t\t\t<i class=\"fa-solid fa-basket-shopping cart-icon\"></i>
\t\t\t\t\t\t<span id=\"cart-count\" class=\"cart-badge\">";
        // line 48
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("totalItems", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["totalItems"]) || array_key_exists("totalItems", $context) ? $context["totalItems"] : (function () { throw new RuntimeError('Variable "totalItems" does not exist.', 48, $this->source); })()), 0)) : (0)), "html", null, true);
        yield "</span>
\t\t\t\t\t</span>
\t\t\t\t\t<span class=\"cart-label\">Mon panier</span>
\t\t\t\t</a>
\t\t\t</div>
\t\t</div>
\t</div>

\t";
        // line 57
        yield "\t<button class=\"subnav-arrow\" id=\"subnavRight\">›</button>
</div>
";
        // line 59
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

        // line 60
        yield "\t<link rel=\"stylesheet\" href=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/subnav.css"), "html", null, true);
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
        return "_partials/_subnav.html.twig";
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
        return array (  164 => 60,  141 => 59,  137 => 57,  126 => 48,  120 => 45,  116 => 43,  110 => 39,  106 => 37,  97 => 32,  95 => 31,  87 => 26,  76 => 18,  69 => 14,  63 => 10,  61 => 9,  57 => 7,  53 => 4,  49 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<div
\tclass=\"subnav-container\">
\t{# Flèche gauche #}
\t<button class=\"subnav-arrow\" id=\"subnavLeft\">‹</button>

\t{# Wrapper scrollable #}
\t<div class=\"subnav-wrapper\">
\t\t<div id=\"subnav\" class=\"subnav\">
\t\t\t{% if app.user %}
\t\t\t\t<div class=\"connected\">
\t\t\t\t\t<span class=\"connected-message\">
\t\t\t\t\t\tVous êtes connecté(e) en tant que
\t\t\t\t\t</span>
\t\t\t\t\t<span class=\"nickname\">{{ app.user.userIdentifier }}</span>
\t\t\t\t</div>

\t\t\t\t<div class=\"orders\">
\t\t\t\t\t<a href=\"{{ path('app_commandes_liste-commandes-client', {'id': app.user.id}) }}\">
\t\t\t\t\t\t<i class=\"fa-solid fa-clipboard-list\"></i>
\t\t\t\t\t\tMes commandes / tickets
\t\t\t\t\t</a>
\t\t\t\t</div>

\t\t\t\t<div class=\"user-options\">
\t\t\t\t\t<div class=\"profile\">
\t\t\t\t\t\t<a class=\"nav-link\" href=\"{{ path('app_profile_index') }}\">
\t\t\t\t\t\t\t<i class=\"fa-regular fa-address-card\"></i>
\t\t\t\t\t\t\tMon profil
\t\t\t\t\t\t</a>
\t\t\t\t\t</div>
\t\t\t\t\t{% if is_granted('ROLE_ADMIN') %}
\t\t\t\t\t\t<a class=\"nav-link\" href=\"{{ path('admin_dashboard') }}\">
\t\t\t\t\t\t\t<i class=\"fa fa-cog\"></i>
\t\t\t\t\t\t\tAdministration
\t\t\t\t\t\t</a>
\t\t\t\t\t{% endif %}
\t\t\t\t</div>
\t\t\t{% else %}
\t\t\t\t<p class=\"text-center not-connected\">
\t\t\t\t\tBonjour visiteur, vous n'êtes pas encore connecté(e).
\t\t\t\t</p>
\t\t\t{% endif %}

\t\t\t<div class=\"cart\">
\t\t\t\t<a href=\"{{ path('panier_index') }}\" class=\"cart-button nav-link\">
\t\t\t\t\t<span class=\"cart-icon-wrapper\">
\t\t\t\t\t\t<i class=\"fa-solid fa-basket-shopping cart-icon\"></i>
\t\t\t\t\t\t<span id=\"cart-count\" class=\"cart-badge\">{{ totalItems|default(0) }}</span>
\t\t\t\t\t</span>
\t\t\t\t\t<span class=\"cart-label\">Mon panier</span>
\t\t\t\t</a>
\t\t\t</div>
\t\t</div>
\t</div>

\t{# Flèche droite #}
\t<button class=\"subnav-arrow\" id=\"subnavRight\">›</button>
</div>
{% block stylesheets %}
\t<link rel=\"stylesheet\" href=\"{{ asset('assets/css/subnav.css') }}\">
{% endblock %}
", "_partials/_subnav.html.twig", "/var/www/symfony/templates/_partials/_subnav.html.twig");
    }
}
