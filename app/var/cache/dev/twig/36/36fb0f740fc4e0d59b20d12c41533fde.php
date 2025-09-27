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

/* admin/utilisateurs/index.html.twig */
class __TwigTemplate_6c90a0c3b023f358dd005460b14a1da5 extends Template
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

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
            'stylesheets' => [$this, 'block_stylesheets'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/utilisateurs/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/utilisateurs/index.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 2
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

        // line 3
        yield "\tListe des utilisateurs
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
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

        // line 6
        yield "
\t<h1 class=\"text-center\">
\t\t<i class=\"fa-solid fa-users\"></i>Liste des utilisateurs</h1>
\t";
        // line 9
        if ((($tmp = (isset($context["utilisateurs"]) || array_key_exists("utilisateurs", $context) ? $context["utilisateurs"] : (function () { throw new RuntimeError('Variable "utilisateurs" does not exist.', 9, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 10
            yield "\t\t<form class=\"search-form\">
\t\t\t<div class=\"search-container\">
\t\t\t\t<input type=\"search\" class=\"search-input\" placeholder=\"Rechercher par pseudo, nom ou prénom\">
\t\t\t\t<button type=\"submit\" class=\"search-button\">
\t\t\t\t\t<i class=\"fa-solid fa-magnifying-glass\"></i>
\t\t\t\t</button>
\t\t\t</div>
\t\t</form>

\t\t<table>
\t\t\t<thead>
\t\t\t\t<tr>
\t\t\t\t\t<th></th>
\t\t\t\t\t<th scope=\"col\">Pseudo</th>
\t\t\t\t\t<th scope=\"col\">Email</th>
\t\t\t\t\t<th scope=\"col\">Vérifié</th>
\t\t\t\t\t<th scope=\"col\">Rôles</th>
\t\t\t\t\t<th scope=\"col\">Crée le</th>
\t\t\t\t\t<th></th>
\t\t\t\t</tr>
\t\t\t</thead>

\t\t\t<tbody>
\t\t\t\t";
            // line 33
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["utilisateurs"]) || array_key_exists("utilisateurs", $context) ? $context["utilisateurs"] : (function () { throw new RuntimeError('Variable "utilisateurs" does not exist.', 33, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["u"]) {
                // line 34
                yield "\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"text-center\">
\t\t\t\t\t\t\t<a class=\"btn-action btn-primary btn-open\" href=\"";
                // line 36
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_utilisateurs_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["u"], "id", [], "any", false, false, false, 36)]), "html", null, true);
                yield "\">
\t\t\t\t\t\t\t\t<i class=\"fa-solid fa-pen-to-square\"></i>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</td>

\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<strong>";
                // line 42
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "nickname", [], "any", false, false, false, 42), "html", null, true);
                yield "</strong>
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>";
                // line 44
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "email", [], "any", false, false, false, 44), "html", null, true);
                yield "</td>
\t\t\t\t\t\t<td class=\"text-center\">";
                // line 45
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["u"], "isVerified", [], "any", false, false, false, 45)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("<span class=\"text-green\"><i class=\"fa-solid fa-check\"></i>Oui</span>") : ("<span class=\"text-red\"><i class=\"fa-regular fa-circle-xmark\"></i>Non</span>"));
                yield "
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t";
                // line 48
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "roles", [], "any", false, false, false, 48));
                foreach ($context['_seq'] as $context["_key"] => $context["r"]) {
                    // line 49
                    yield "\t\t\t\t\t\t\t\t";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::join($context["r"], ", "), "html", null, true);
                    yield "
\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['r'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 51
                yield "\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td class=\"text-muted text-right\">";
                // line 52
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "createdAt", [], "any", false, false, false, 52), "d-m-Y à H:i:s"), "html", null, true);
                yield "</td>
\t\t\t\t\t\t<td class=\"text-center\">
\t\t\t\t\t\t\t<a class=\"btn-action btn-danger btn-delete\" href=\"#\">
\t\t\t\t\t\t\t\t<i class=\"fa-solid fa-trash-can\"></i>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['u'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 60
            yield "\t\t\t</tbody>
\t\t</table>
\t\t<div class=\"pagination\">
\t\t\t";
            // line 63
            yield $this->env->getRuntime('Knp\Bundle\PaginatorBundle\Twig\Extension\PaginationRuntime')->render($this->env, (isset($context["utilisateurs"]) || array_key_exists("utilisateurs", $context) ? $context["utilisateurs"] : (function () { throw new RuntimeError('Variable "utilisateurs" does not exist.', 63, $this->source); })()));
            yield "
\t\t</div>
\t";
        } else {
            // line 66
            yield "\t\t<p class=\"text-center\">Il n'existe encore aucun utilisateur enregistré dans la base de données</p>
\t";
        }
        // line 68
        yield "
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 70
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

        // line 71
        yield "\t<link rel=\"stylesheet\" href=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/table.css"), "html", null, true);
        yield "\">
\t<link rel=\"stylesheet\" href=\"";
        // line 72
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/form.css"), "html", null, true);
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
        return "admin/utilisateurs/index.html.twig";
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
        return array (  242 => 72,  237 => 71,  224 => 70,  212 => 68,  208 => 66,  202 => 63,  197 => 60,  183 => 52,  180 => 51,  171 => 49,  167 => 48,  161 => 45,  157 => 44,  152 => 42,  143 => 36,  139 => 34,  135 => 33,  110 => 10,  108 => 9,  103 => 6,  90 => 5,  78 => 3,  65 => 2,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}
{% block title %}
\tListe des utilisateurs
{% endblock %}
{% block body %}

\t<h1 class=\"text-center\">
\t\t<i class=\"fa-solid fa-users\"></i>Liste des utilisateurs</h1>
\t{% if utilisateurs %}
\t\t<form class=\"search-form\">
\t\t\t<div class=\"search-container\">
\t\t\t\t<input type=\"search\" class=\"search-input\" placeholder=\"Rechercher par pseudo, nom ou prénom\">
\t\t\t\t<button type=\"submit\" class=\"search-button\">
\t\t\t\t\t<i class=\"fa-solid fa-magnifying-glass\"></i>
\t\t\t\t</button>
\t\t\t</div>
\t\t</form>

\t\t<table>
\t\t\t<thead>
\t\t\t\t<tr>
\t\t\t\t\t<th></th>
\t\t\t\t\t<th scope=\"col\">Pseudo</th>
\t\t\t\t\t<th scope=\"col\">Email</th>
\t\t\t\t\t<th scope=\"col\">Vérifié</th>
\t\t\t\t\t<th scope=\"col\">Rôles</th>
\t\t\t\t\t<th scope=\"col\">Crée le</th>
\t\t\t\t\t<th></th>
\t\t\t\t</tr>
\t\t\t</thead>

\t\t\t<tbody>
\t\t\t\t{% for u in utilisateurs %}
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"text-center\">
\t\t\t\t\t\t\t<a class=\"btn-action btn-primary btn-open\" href=\"{{path('app_utilisateurs_edit',{id:u.id})}}\">
\t\t\t\t\t\t\t\t<i class=\"fa-solid fa-pen-to-square\"></i>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</td>

\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<strong>{{u.nickname}}</strong>
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>{{u.email}}</td>
\t\t\t\t\t\t<td class=\"text-center\">{{u.isVerified ? '<span class=\"text-green\"><i class=\"fa-solid fa-check\"></i>Oui</span>':'<span class=\"text-red\"><i class=\"fa-regular fa-circle-xmark\"></i>Non</span>'}}
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t{% for r in u.roles %}
\t\t\t\t\t\t\t\t{{r|join(', ')}}
\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td class=\"text-muted text-right\">{{u.createdAt|date('d-m-Y à H:i:s')}}</td>
\t\t\t\t\t\t<td class=\"text-center\">
\t\t\t\t\t\t\t<a class=\"btn-action btn-danger btn-delete\" href=\"#\">
\t\t\t\t\t\t\t\t<i class=\"fa-solid fa-trash-can\"></i>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t{% endfor %}
\t\t\t</tbody>
\t\t</table>
\t\t<div class=\"pagination\">
\t\t\t{{ knp_pagination_render(utilisateurs) }}
\t\t</div>
\t{% else %}
\t\t<p class=\"text-center\">Il n'existe encore aucun utilisateur enregistré dans la base de données</p>
\t{% endif %}

{% endblock %}
{% block stylesheets %}
\t<link rel=\"stylesheet\" href=\"{{asset('assets/css/table.css')}}\">
\t<link rel=\"stylesheet\" href=\"{{asset('assets/css/form.css')}}\">
{% endblock %}
", "admin/utilisateurs/index.html.twig", "/var/www/symfony/templates/admin/utilisateurs/index.html.twig");
    }
}
