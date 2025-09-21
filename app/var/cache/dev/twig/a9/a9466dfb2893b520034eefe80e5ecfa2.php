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
class __TwigTemplate_59abddca919b2a5177b8a0fabf64989a extends Template
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
<head>
    <meta charset=\"UTF-8\">

    <title>
        ";
        // line 7
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        // line 8
        yield "    </title>

    ";
        // line 11
        yield "    <link rel=\"icon\" href=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("favicon.svg"), "html", null, true);
        yield "\" type=\"image/svg+xml\">

    ";
        // line 14
        yield "    <link rel=\"icon\" type=\"image/png\" sizes=\"32x32\" href=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("favicon-32.png"), "html", null, true);
        yield "\">
    <link rel=\"icon\" type=\"image/png\" sizes=\"16x16\" href=\"";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("favicon-16.png"), "html", null, true);
        yield "\">

    ";
        // line 18
        yield "    <link rel=\"stylesheet\" href=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/flashbag.css"), "html", null, true);
        yield "\">

    ";
        // line 21
        yield "    <link rel=\"apple-touch-icon\" href=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("favicon-32.png"), "html", null, true);
        yield "\">

    ";
        // line 23
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 24
        yield "
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css\"
          integrity=\"sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==\"
          crossorigin=\"anonymous\" referrerpolicy=\"no-referrer\"/>

    <link rel=\"stylesheet\" href=\"";
        // line 29
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/styles.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 30
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/pagination.css"), "html", null, true);
        yield "\">
</head>
<body>
    ";
        // line 33
        yield Twig\Extension\CoreExtension::include($this->env, $context, "_partials/_navbar.html.twig");
        yield "
    ";
        // line 34
        yield Twig\Extension\CoreExtension::include($this->env, $context, "_partials/_subnav.html.twig");
        yield "

    ";
        // line 36
        if ((($tmp = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 37
            yield "        ";
            yield Twig\Extension\CoreExtension::include($this->env, $context, "_partials/_sidebar.html.twig");
            yield "
    ";
        }
        // line 39
        yield "
    ";
        // line 41
        yield "    <script src=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/flashbags.js"), "html", null, true);
        yield "\"></script>
    <script>
        document.addEventListener(\"DOMContentLoaded\", function () {
            ";
        // line 44
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 44, $this->source); })()), "flashes", [], "any", false, false, false, 44));
        foreach ($context['_seq'] as $context["label"] => $context["messages"]) {
            // line 45
            yield "                ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable($context["messages"]);
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 46
                yield "                    showFlashbag(\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "js"), "html", null, true);
                yield "\", \"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["label"], "html", null, true);
                yield "\", 4000, \"top-right\");
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 48
            yield "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['label'], $context['messages'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        yield "        });
    </script>

    <main id=\"main\">
        ";
        // line 53
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 54
        yield "    </main>

    ";
        // line 57
        yield "    <script type=\"module\" src=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/main.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 58
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/sidebar.js"), "html", null, true);
        yield "\"></script>
</body>
</html>
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

        yield "JO 2024";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 23
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

    // line 53
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
        return array (  242 => 53,  220 => 23,  197 => 7,  182 => 58,  177 => 57,  173 => 54,  171 => 53,  165 => 49,  159 => 48,  148 => 46,  143 => 45,  139 => 44,  132 => 41,  129 => 39,  123 => 37,  121 => 36,  116 => 34,  112 => 33,  106 => 30,  102 => 29,  95 => 24,  93 => 23,  87 => 21,  81 => 18,  76 => 15,  71 => 14,  65 => 11,  61 => 8,  59 => 7,  51 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">

    <title>
        {% block title %}JO 2024{% endblock %}
    </title>

    {# Favicon SVG pour navigateurs modernes #}
    <link rel=\"icon\" href=\"{{ asset('favicon.svg') }}\" type=\"image/svg+xml\">

    {# Fallback PNGs pour compatibilité #}
    <link rel=\"icon\" type=\"image/png\" sizes=\"32x32\" href=\"{{ asset('favicon-32.png') }}\">
    <link rel=\"icon\" type=\"image/png\" sizes=\"16x16\" href=\"{{ asset('favicon-16.png') }}\">

    {# CSS Flashbags #}
    <link rel=\"stylesheet\" href=\"{{ asset('assets/css/flashbag.css') }}\">

    {# iOS #}
    <link rel=\"apple-touch-icon\" href=\"{{ asset('favicon-32.png') }}\">

    {% block stylesheets %}{% endblock %}

    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css\"
          integrity=\"sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==\"
          crossorigin=\"anonymous\" referrerpolicy=\"no-referrer\"/>

    <link rel=\"stylesheet\" href=\"{{ asset('assets/css/styles.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('assets/css/pagination.css') }}\">
</head>
<body>
    {{ include('_partials/_navbar.html.twig') }}
    {{ include('_partials/_subnav.html.twig') }}

    {% if is_granted('ROLE_ADMIN') %}
        {{ include('_partials/_sidebar.html.twig') }}
    {% endif %}

    {# Flashbags #}
    <script src=\"{{ asset('assets/js/flashbags.js') }}\"></script>
    <script>
        document.addEventListener(\"DOMContentLoaded\", function () {
            {% for label, messages in app.flashes %}
                {% for message in messages %}
                    showFlashbag(\"{{ message|e('js') }}\", \"{{ label }}\", 4000, \"top-right\");
                {% endfor %}
            {% endfor %}
        });
    </script>

    <main id=\"main\">
        {% block body %}{% endblock %}
    </main>

    {# Scripts #}
    <script type=\"module\" src=\"{{ asset('assets/js/main.js') }}\"></script>
    <script src=\"{{ asset('assets/js/sidebar.js') }}\"></script>
</body>
</html>
", "base.html.twig", "/var/www/symfony/templates/base.html.twig");
    }
}
