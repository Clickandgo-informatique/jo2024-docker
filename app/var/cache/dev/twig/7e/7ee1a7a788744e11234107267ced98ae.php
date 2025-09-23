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
        yield "<!-- Subnav avec flèches -->
<div class=\"subnav-container\">
\t<button class=\"subnav-arrow\" id=\"subnavLeft\">‹</button>

\t<div id=\"subnav\" class=\"subnav\">
\t\t";
        // line 6
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 6, $this->source); })()), "user", [], "any", false, false, false, 6)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 7
            yield "\t\t\t<div class=\"connected\">
\t\t\t\tVous êtes connecté(e) en tant que &nbsp;
\t\t\t\t<span class=\"nickname\">";
            // line 9
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 9, $this->source); })()), "user", [], "any", false, false, false, 9), "userIdentifier", [], "any", false, false, false, 9), "html", null, true);
            yield "</span>
\t\t\t</div>

\t\t\t<div class=\"user-options\">
\t\t\t\t<div class=\"profile\">
\t\t\t\t\t<a class=\"nav-link\" href=\"";
            // line 14
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile_index");
            yield "\">
\t\t\t\t\t\t<i class=\"fa-regular fa-address-card\" aria-hidden=\"true\"></i>
\t\t\t\t\t\tMon profil
\t\t\t\t\t</a>
\t\t\t\t</div>
\t\t\t\t<div class=\"cart\">
\t\t\t\t\t<a href=\"";
            // line 20
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_cart_index");
            yield "\">
\t\t\t\t\t\t<i class=\"fa-solid fa-basket-shopping\"></i>
\t\t\t\t\t\tMon panier
\t\t\t\t\t</a>
\t\t\t\t</div>
\t\t\t</div>

\t\t\t";
            // line 27
            if ((($tmp = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 28
                yield "\t\t\t\t<a class=\"nav-link\" href=\"";
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_index");
                yield "\">
\t\t\t\t\t<i class=\"fa fa-cog\" aria-hidden=\"true\"></i>
\t\t\t\t\tAdministration
\t\t\t\t</a>
\t\t\t";
            }
            // line 33
            yield "\t\t";
        } else {
            // line 34
            yield "\t\t\t<p class=\"text-center not-connected\">
\t\t\t\tBonjour visiteur, vous n'êtes pas encore connecté(e).
\t\t\t</p>
\t\t";
        }
        // line 38
        yield "\t</div>

\t<button class=\"subnav-arrow\" id=\"subnavRight\">›</button>
</div>

";
        // line 43
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

        // line 44
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
        return array (  139 => 44,  116 => 43,  109 => 38,  103 => 34,  100 => 33,  91 => 28,  89 => 27,  79 => 20,  70 => 14,  62 => 9,  58 => 7,  56 => 6,  49 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!-- Subnav avec flèches -->
<div class=\"subnav-container\">
\t<button class=\"subnav-arrow\" id=\"subnavLeft\">‹</button>

\t<div id=\"subnav\" class=\"subnav\">
\t\t{% if app.user %}
\t\t\t<div class=\"connected\">
\t\t\t\tVous êtes connecté(e) en tant que &nbsp;
\t\t\t\t<span class=\"nickname\">{{ app.user.userIdentifier }}</span>
\t\t\t</div>

\t\t\t<div class=\"user-options\">
\t\t\t\t<div class=\"profile\">
\t\t\t\t\t<a class=\"nav-link\" href=\"{{ path('app_profile_index') }}\">
\t\t\t\t\t\t<i class=\"fa-regular fa-address-card\" aria-hidden=\"true\"></i>
\t\t\t\t\t\tMon profil
\t\t\t\t\t</a>
\t\t\t\t</div>
\t\t\t\t<div class=\"cart\">
\t\t\t\t\t<a href=\"{{ path('app_cart_index') }}\">
\t\t\t\t\t\t<i class=\"fa-solid fa-basket-shopping\"></i>
\t\t\t\t\t\tMon panier
\t\t\t\t\t</a>
\t\t\t\t</div>
\t\t\t</div>

\t\t\t{% if is_granted('ROLE_ADMIN') %}
\t\t\t\t<a class=\"nav-link\" href=\"{{ path('app_admin_index') }}\">
\t\t\t\t\t<i class=\"fa fa-cog\" aria-hidden=\"true\"></i>
\t\t\t\t\tAdministration
\t\t\t\t</a>
\t\t\t{% endif %}
\t\t{% else %}
\t\t\t<p class=\"text-center not-connected\">
\t\t\t\tBonjour visiteur, vous n'êtes pas encore connecté(e).
\t\t\t</p>
\t\t{% endif %}
\t</div>

\t<button class=\"subnav-arrow\" id=\"subnavRight\">›</button>
</div>

{% block stylesheets %}
\t<link rel=\"stylesheet\" href=\"{{ asset('assets/css/subnav.css') }}\">
{% endblock %}
", "_partials/_subnav.html.twig", "/var/www/symfony/templates/_partials/_subnav.html.twig");
    }
}
