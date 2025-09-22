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
\t\t<title>
\t\t\t";
        // line 6
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        // line 8
        yield "\t\t</title>

\t\t";
        // line 11
        yield "\t\t<link rel=\"icon\" href=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("favicon.svg"), "html", null, true);
        yield "\" type=\"image/svg+xml\">
\t\t<link rel=\"icon\" type=\"image/png\" sizes=\"32x32\" href=\"";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("favicon-32.png"), "html", null, true);
        yield "\">
\t\t<link rel=\"icon\" type=\"image/png\" sizes=\"16x16\" href=\"";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("favicon-16.png"), "html", null, true);
        yield "\">
\t\t<link
\t\trel=\"apple-touch-icon\" href=\"";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("favicon-32.png"), "html", null, true);
        yield "\">

\t\t";
        // line 18
        yield "\t\t<link rel=\"stylesheet\" href=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/flashbag.css"), "html", null, true);
        yield "\">
\t\t<link rel=\"stylesheet\" href=\"";
        // line 19
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/styles.css"), "html", null, true);
        yield "\">
\t\t<link
\t\trel=\"stylesheet\" href=\"";
        // line 21
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/pagination.css"), "html", null, true);
        yield "\">

\t\t";
        // line 24
        yield "\t\t<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css\" integrity=\"sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==\" crossorigin=\"anonymous\" referrerpolicy=\"no-referrer\"/> ";
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 25
        yield "\t\t</head>

\t\t<body>
\t\t\t";
        // line 28
        yield Twig\Extension\CoreExtension::include($this->env, $context, "_partials/_navbar.html.twig");
        yield "
\t\t\t";
        // line 29
        yield Twig\Extension\CoreExtension::include($this->env, $context, "_partials/_subnav.html.twig");
        yield "

\t\t\t";
        // line 31
        if ((($tmp = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 32
            yield "\t\t\t\t";
            yield Twig\Extension\CoreExtension::include($this->env, $context, "_partials/_sidebar.html.twig");
            yield "
\t\t\t";
        }
        // line 34
        yield "
\t\t\t";
        // line 36
        yield "\t\t\t<script src=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/flashbags.js"), "html", null, true);
        yield "\"></script>
\t\t\t<script>
\t\t\t\tdocument.addEventListener(\"DOMContentLoaded\", function () {
";
        // line 39
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 39, $this->source); })()), "flashes", [], "any", false, false, false, 39));
        foreach ($context['_seq'] as $context["label"] => $context["messages"]) {
            // line 40
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable($context["messages"]);
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 41
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
        // line 43
        yield "});
\t\t\t</script>

\t\t\t<main id=\"main\"> ";
        // line 46
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 47
        yield "\t\t\t\t</main>

\t\t\t\t";
        // line 50
        yield "\t\t\t\t<script type=\"module\" src=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/main.js"), "html", null, true);
        yield "\"></script>
\t\t\t\t<script src=\"";
        // line 51
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/sidebar.js"), "html", null, true);
        yield "\"></script>
\t\t\t</body>
\t\t</html>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 6
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

    // line 24
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

    // line 46
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
        return array (  232 => 46,  210 => 24,  186 => 6,  171 => 51,  166 => 50,  162 => 47,  160 => 46,  155 => 43,  141 => 41,  137 => 40,  133 => 39,  126 => 36,  123 => 34,  117 => 32,  115 => 31,  110 => 29,  106 => 28,  101 => 25,  98 => 24,  93 => 21,  88 => 19,  83 => 18,  78 => 15,  73 => 13,  69 => 12,  64 => 11,  60 => 8,  58 => 6,  51 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
\t<head>
\t\t<meta charset=\"UTF-8\">
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

\t\t{# Styles de base #}
\t\t<link rel=\"stylesheet\" href=\"{{ asset('assets/css/flashbag.css') }}\">
\t\t<link rel=\"stylesheet\" href=\"{{ asset('assets/css/styles.css') }}\">
\t\t<link
\t\trel=\"stylesheet\" href=\"{{ asset('assets/css/pagination.css') }}\">

\t\t{# Font Awesome CDN #}
\t\t<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css\" integrity=\"sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==\" crossorigin=\"anonymous\" referrerpolicy=\"no-referrer\"/> {% block stylesheets %}{% endblock %}
\t\t</head>

\t\t<body>
\t\t\t{{ include('_partials/_navbar.html.twig') }}
\t\t\t{{ include('_partials/_subnav.html.twig') }}

\t\t\t{% if is_granted('ROLE_ADMIN') %}
\t\t\t\t{{ include('_partials/_sidebar.html.twig') }}
\t\t\t{% endif %}

\t\t\t{# Flashbags #}
\t\t\t<script src=\"{{ asset('assets/js/flashbags.js') }}\"></script>
\t\t\t<script>
\t\t\t\tdocument.addEventListener(\"DOMContentLoaded\", function () {
{% for label, messages in app.flashes %}
{% for message in messages %}
showFlashbag(\"{{ message|e('js') }}\", \"{{ label }}\", 4000, \"top-right\");{% endfor %}
{% endfor %}
});
\t\t\t</script>

\t\t\t<main id=\"main\"> {% block body %}{% endblock %}
\t\t\t\t</main>

\t\t\t\t{# Scripts #}
\t\t\t\t<script type=\"module\" src=\"{{ asset('assets/js/main.js') }}\"></script>
\t\t\t\t<script src=\"{{ asset('assets/js/sidebar.js') }}\"></script>
\t\t\t</body>
\t\t</html>
", "base.html.twig", "/home/clavi/jo2024-docker/app/templates/base.html.twig");
    }
}
