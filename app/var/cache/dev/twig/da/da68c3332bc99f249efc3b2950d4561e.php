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

/* base.html.twig */
class __TwigTemplate_4a4ee1aff41c5ff92290c89eb1b41ee9 extends Template
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
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
\t<head>
\t\t<meta charset=\"UTF-8\">
\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">

\t\t<title>
\t\t\t";
        // line 8
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        // line 10
        yield "\t\t</title>

\t\t";
        // line 13
        yield "\t\t<link rel=\"icon\" href=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("favicon.svg"), "html", null, true);
        yield "\" type=\"image/svg+xml\">
\t\t<link rel=\"icon\" type=\"image/png\" sizes=\"32x32\" href=\"";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("favicon-32.png"), "html", null, true);
        yield "\">
\t\t<link rel=\"icon\" type=\"image/png\" sizes=\"16x16\" href=\"";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("favicon-16.png"), "html", null, true);
        yield "\">
\t\t<link
\t\trel=\"apple-touch-icon\" href=\"";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("favicon-32.png"), "html", null, true);
        yield "\">

\t\t";
        // line 20
        yield "\t\t<link rel=\"stylesheet\" href=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/flashbag.css"), "html", null, true);
        yield "\">
\t\t<link rel=\"stylesheet\" href=\"";
        // line 21
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/styles.css"), "html", null, true);
        yield "\">
\t\t<link rel=\"stylesheet\" href=\"";
        // line 22
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/pagination.css"), "html", null, true);
        yield "\">
\t\t<link
\t\trel=\"stylesheet\" href=\"";
        // line 24
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/sidebar.css"), "html", null, true);
        yield "\">

\t\t";
        // line 27
        yield "\t\t<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css\" integrity=\"sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==\" crossorigin=\"anonymous\" referrerpolicy=\"no-referrer\"/> ";
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 28
        yield "\t\t</head>

\t\t<body class=\"";
        // line 30
        if (($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN") && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 30, $this->source); })()), "request", [], "any", false, false, false, 30), "getSession", [], "method", false, false, false, 30), "get", ["2fa_verified"], "method", false, false, false, 30))) {
            yield "admin";
        }
        yield "\">

\t\t\t";
        // line 32
        yield Twig\Extension\CoreExtension::include($this->env, $context, "_partials/_navbar.html.twig");
        yield "
\t\t\t";
        // line 33
        yield Twig\Extension\CoreExtension::include($this->env, $context, "_partials/_subnav.html.twig");
        yield "

\t\t\t";
        // line 35
        if (($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN") && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 35, $this->source); })()), "request", [], "any", false, false, false, 35), "getSession", [], "method", false, false, false, 35), "get", ["2fa_verified"], "method", false, false, false, 35))) {
            // line 36
            yield "\t\t\t\t";
            yield Twig\Extension\CoreExtension::include($this->env, $context, "_partials/_sidebar.html.twig");
            yield "
\t\t\t\t<button id=\"sidebarToggle\" class=\"sidebar-toggle\">☰</button>
\t\t\t\t<div id=\"menuOverlay\" class=\"menu-overlay\"></div>
\t\t\t";
        }
        // line 40
        yield "
\t\t\t<main id=\"main\" class=\"";
        // line 41
        if (($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN") && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 41, $this->source); })()), "request", [], "any", false, false, false, 41), "getSession", [], "method", false, false, false, 41), "get", ["2fa_verified"], "method", false, false, false, 41))) {
            yield "shifted";
        }
        yield "\"> ";
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 42
        yield "\t\t\t\t</main>

\t\t\t\t<script src=\"";
        // line 44
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/flashbags.js"), "html", null, true);
        yield "\"></script>
\t\t\t\t<script>
\t\t\t\t\tdocument.addEventListener(\"DOMContentLoaded\", function () {
";
        // line 47
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 47, $this->source); })()), "flashes", [], "any", false, false, false, 47));
        foreach ($context['_seq'] as $context["label"] => $context["messages"]) {
            // line 48
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable($context["messages"]);
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 49
                yield "showFlashbag(\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "js"), "html", null, true);
                yield "\", \"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["label"], "html", null, true);
                yield "\", 4000, \"top-right\");";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['label'], $context['messages'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 51
        yield "});
\t\t\t\t</script>

\t\t\t\t<script type=\"module\" src=\"";
        // line 54
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/main.js"), "html", null, true);
        yield "\"></script>
\t\t\t\t<script src=\"";
        // line 55
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/sidebar.js"), "html", null, true);
        yield "\"></script>
\t\t\t\t";
        // line 56
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 57
        yield "
\t\t\t</body>
\t\t</html>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 8
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

        yield "JO 2024
\t\t\t";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 27
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

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 41
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

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 56
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

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "base.html.twig";
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
        return array (  276 => 56,  254 => 41,  232 => 27,  208 => 8,  194 => 57,  192 => 56,  188 => 55,  184 => 54,  179 => 51,  165 => 49,  161 => 48,  157 => 47,  151 => 44,  147 => 42,  141 => 41,  138 => 40,  130 => 36,  128 => 35,  123 => 33,  119 => 32,  112 => 30,  108 => 28,  105 => 27,  100 => 24,  95 => 22,  91 => 21,  86 => 20,  81 => 17,  76 => 15,  72 => 14,  67 => 13,  63 => 10,  61 => 8,  52 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
\t<head>
\t\t<meta charset=\"UTF-8\">
\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">

\t\t<title>
\t\t\t{% block title %}JO 2024
\t\t\t{% endblock %}
\t\t</title>

\t\t{# Favicons #}
\t\t<link rel=\"icon\" href=\"{{ asset('favicon.svg') }}\" type=\"image/svg+xml\">
\t\t<link rel=\"icon\" type=\"image/png\" sizes=\"32x32\" href=\"{{ asset('favicon-32.png') }}\">
\t\t<link rel=\"icon\" type=\"image/png\" sizes=\"16x16\" href=\"{{ asset('favicon-16.png') }}\">
\t\t<link
\t\trel=\"apple-touch-icon\" href=\"{{ asset('favicon-32.png') }}\">

\t\t{# Styles #}
\t\t<link rel=\"stylesheet\" href=\"{{ asset('assets/css/flashbag.css') }}\">
\t\t<link rel=\"stylesheet\" href=\"{{ asset('assets/css/styles.css') }}\">
\t\t<link rel=\"stylesheet\" href=\"{{ asset('assets/css/pagination.css') }}\">
\t\t<link
\t\trel=\"stylesheet\" href=\"{{ asset('assets/css/sidebar.css') }}\">

\t\t{# Font Awesome #}
\t\t<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css\" integrity=\"sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==\" crossorigin=\"anonymous\" referrerpolicy=\"no-referrer\"/> {% block stylesheets %}{% endblock %}
\t\t</head>

\t\t<body class=\"{% if is_granted('ROLE_ADMIN') and app.request.getSession().get('2fa_verified') %}admin{% endif %}\">

\t\t\t{{ include('_partials/_navbar.html.twig') }}
\t\t\t{{ include('_partials/_subnav.html.twig') }}

\t\t\t{% if is_granted('ROLE_ADMIN') and app.request.getSession().get('2fa_verified') %}
\t\t\t\t{{ include('_partials/_sidebar.html.twig') }}
\t\t\t\t<button id=\"sidebarToggle\" class=\"sidebar-toggle\">☰</button>
\t\t\t\t<div id=\"menuOverlay\" class=\"menu-overlay\"></div>
\t\t\t{% endif %}

\t\t\t<main id=\"main\" class=\"{% if is_granted('ROLE_ADMIN') and app.request.getSession().get('2fa_verified') %}shifted{% endif %}\"> {% block body %}{% endblock %}
\t\t\t\t</main>

\t\t\t\t<script src=\"{{ asset('assets/js/flashbags.js') }}\"></script>
\t\t\t\t<script>
\t\t\t\t\tdocument.addEventListener(\"DOMContentLoaded\", function () {
{% for label, messages in app.flashes %}
{% for message in messages %}
showFlashbag(\"{{ message|e('js') }}\", \"{{ label }}\", 4000, \"top-right\");{% endfor %}
{% endfor %}
});
\t\t\t\t</script>

\t\t\t\t<script type=\"module\" src=\"{{ asset('assets/js/main.js') }}\"></script>
\t\t\t\t<script src=\"{{ asset('assets/js/sidebar.js') }}\"></script>
\t\t\t\t{% block javascripts %}{% endblock %}

\t\t\t</body>
\t\t</html>
", "base.html.twig", "/var/www/symfony/templates/base.html.twig");
    }
}
