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
        // line 7
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        // line 9
        yield "\t\t</title>

\t\t<link rel=\"stylesheet\" href=\"";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/styles.css"), "html", null, true);
        yield "\">
\t\t<link rel=\"stylesheet\" href=\"";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/flashbag.css"), "html", null, true);
        yield "\">
\t\t<link rel=\"stylesheet\" href=\"";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/pagination.css"), "html", null, true);
        yield "\">
\t\t<link rel=\"stylesheet\" href=\"";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/layout.css"), "html", null, true);
        yield "\">
\t\t";
        // line 15
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 21
        yield "\t\t<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css\" crossorigin=\"anonymous\" referrerpolicy=\"no-referrer\">
\t</head>

\t";
        // line 24
        $context["sidebarVisible"] = ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN") && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 24, $this->source); })()), "request", [], "any", false, false, false, 24), "getSession", [], "method", false, false, false, 24), "get", ["2fa_passed"], "method", false, false, false, 24));
        // line 25
        yield "
\t<body class=\"sidebar-mini ";
        // line 26
        if ((($tmp = (isset($context["sidebarVisible"]) || array_key_exists("sidebarVisible", $context) ? $context["sidebarVisible"] : (function () { throw new RuntimeError('Variable "sidebarVisible" does not exist.', 26, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "sidebar-present";
        }
        yield "\">

\t\t";
        // line 28
        if ((($tmp = (isset($context["sidebarVisible"]) || array_key_exists("sidebarVisible", $context) ? $context["sidebarVisible"] : (function () { throw new RuntimeError('Variable "sidebarVisible" does not exist.', 28, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 29
            yield "\t\t\t";
            yield Twig\Extension\CoreExtension::include($this->env, $context, "_partials/_sidebar.html.twig");
            yield "
\t\t\t<button id=\"sidebar-toggle\" class=\"sidebar-toggle\">▶</button>
\t\t";
        }
        // line 32
        yield "
\t\t<div class=\"main-wrapper\">
\t\t\t";
        // line 34
        yield Twig\Extension\CoreExtension::include($this->env, $context, "_partials/_navbar.html.twig");
        yield "
\t\t\t";
        // line 35
        yield Twig\Extension\CoreExtension::include($this->env, $context, "_partials/_subnav.html.twig");
        yield "
\t\t\t<main class=\"main-content\"> ";
        // line 36
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 37
        yield "
\t\t\t\t</main>
\t\t\t</div>

\t\t\t<footer class=\"footer\">&copy; 2025 JO 2024</footer>

\t\t\t<!-- Flashbags -->
\t\t\t<script src=\"";
        // line 44
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/flashbags.js"), "html", null, true);
        yield "\"></script>
\t\t\t<script>
\t\t\t\tdocument.addEventListener(\"DOMContentLoaded\", function () {
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
        // line 50
        yield "});
\t\t\t</script>

\t\t\t<!-- Navbar & subnav -->
\t\t\t<script type=\"module\" src=\"";
        // line 54
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/navbar.js"), "html", null, true);
        yield "\"></script>
\t\t\t<script type=\"module\" src=\"";
        // line 55
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/subnav.js"), "html", null, true);
        yield "\"></script>

\t\t\t";
        // line 57
        if ((($tmp = (isset($context["sidebarVisible"]) || array_key_exists("sidebarVisible", $context) ? $context["sidebarVisible"] : (function () { throw new RuntimeError('Variable "sidebarVisible" does not exist.', 57, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 58
            yield "\t\t\t\t<!-- Sidebar.js chargé **après le DOM complet**, pour que toggle fonctionne -->
\t\t\t\t<script type=\"module\" src=\"";
            // line 59
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/sidebar.js"), "html", null, true);
            yield "\"></script>
\t\t\t";
        }
        // line 61
        yield "
\t\t\t";
        // line 62
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 63
        yield "\t\t</body>
\t</html>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 7
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

        yield "Réservations JO 2024
\t\t\t";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 15
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

        // line 16
        yield "\t\t\t<link rel=\"stylesheet\" href=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/sidebar.css"), "html", null, true);
        yield "\">
\t\t\t<link rel=\"stylesheet\" href=\"";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/navbar.css"), "html", null, true);
        yield "\">
\t\t\t<link rel=\"stylesheet\" href=\"";
        // line 18
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/subnav.css"), "html", null, true);
        yield "\">
\t\t\t<link rel=\"stylesheet\" href=\"";
        // line 19
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/cart.css"), "html", null, true);
        yield "\">
\t\t";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 36
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

    // line 62
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
        return array (  289 => 62,  267 => 36,  254 => 19,  250 => 18,  246 => 17,  241 => 16,  228 => 15,  204 => 7,  191 => 63,  189 => 62,  186 => 61,  181 => 59,  178 => 58,  176 => 57,  171 => 55,  167 => 54,  161 => 50,  147 => 49,  143 => 48,  139 => 47,  133 => 44,  124 => 37,  122 => 36,  118 => 35,  114 => 34,  110 => 32,  103 => 29,  101 => 28,  94 => 26,  91 => 25,  89 => 24,  84 => 21,  82 => 15,  78 => 14,  74 => 13,  70 => 12,  66 => 11,  62 => 9,  60 => 7,  52 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
\t<head>
\t\t<meta charset=\"UTF-8\">
\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
\t\t<title>
\t\t\t{% block title %}Réservations JO 2024
\t\t\t{% endblock %}
\t\t</title>

\t\t<link rel=\"stylesheet\" href=\"{{ asset('assets/css/styles.css') }}\">
\t\t<link rel=\"stylesheet\" href=\"{{ asset('assets/css/flashbag.css') }}\">
\t\t<link rel=\"stylesheet\" href=\"{{ asset('assets/css/pagination.css') }}\">
\t\t<link rel=\"stylesheet\" href=\"{{ asset('assets/css/layout.css') }}\">
\t\t{% block stylesheets %}
\t\t\t<link rel=\"stylesheet\" href=\"{{ asset('assets/css/sidebar.css') }}\">
\t\t\t<link rel=\"stylesheet\" href=\"{{ asset('assets/css/navbar.css') }}\">
\t\t\t<link rel=\"stylesheet\" href=\"{{ asset('assets/css/subnav.css') }}\">
\t\t\t<link rel=\"stylesheet\" href=\"{{ asset('assets/css/cart.css') }}\">
\t\t{% endblock %}
\t\t<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css\" crossorigin=\"anonymous\" referrerpolicy=\"no-referrer\">
\t</head>

\t{% set sidebarVisible = is_granted('ROLE_ADMIN') and app.request.getSession().get('2fa_passed') %}

\t<body class=\"sidebar-mini {% if sidebarVisible %}sidebar-present{% endif %}\">

\t\t{% if sidebarVisible %}
\t\t\t{{ include('_partials/_sidebar.html.twig') }}
\t\t\t<button id=\"sidebar-toggle\" class=\"sidebar-toggle\">▶</button>
\t\t{% endif %}

\t\t<div class=\"main-wrapper\">
\t\t\t{{ include('_partials/_navbar.html.twig') }}
\t\t\t{{ include('_partials/_subnav.html.twig') }}
\t\t\t<main class=\"main-content\"> {% block body %}{% endblock %}

\t\t\t\t</main>
\t\t\t</div>

\t\t\t<footer class=\"footer\">&copy; 2025 JO 2024</footer>

\t\t\t<!-- Flashbags -->
\t\t\t<script src=\"{{ asset('assets/js/flashbags.js') }}\"></script>
\t\t\t<script>
\t\t\t\tdocument.addEventListener(\"DOMContentLoaded\", function () {
{% for label, messages in app.flashes %}
{% for message in messages %}
showFlashbag(\"{{ message|e('js') }}\", \"{{ label }}\", 4000, \"top-right\");{% endfor %}{% endfor %}
});
\t\t\t</script>

\t\t\t<!-- Navbar & subnav -->
\t\t\t<script type=\"module\" src=\"{{ asset('assets/js/navbar.js') }}\"></script>
\t\t\t<script type=\"module\" src=\"{{ asset('assets/js/subnav.js') }}\"></script>

\t\t\t{% if sidebarVisible %}
\t\t\t\t<!-- Sidebar.js chargé **après le DOM complet**, pour que toggle fonctionne -->
\t\t\t\t<script type=\"module\" src=\"{{ asset('assets/js/sidebar.js') }}\"></script>
\t\t\t{% endif %}

\t\t\t{% block javascripts %}{% endblock %}
\t\t</body>
\t</html>
", "base.html.twig", "/var/www/symfony/templates/base.html.twig");
    }
}
