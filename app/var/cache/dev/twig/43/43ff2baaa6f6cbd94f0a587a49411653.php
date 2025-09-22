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

/* emails/password_reset.html.twig */
class __TwigTemplate_d4319296b5b41be9e615778ae7eed910 extends Template
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
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "emails/password_reset.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "emails/password_reset.html.twig"));

        // line 1
        yield "<p>Bonjour ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 1, $this->source); })()), "nickname", [], "any", false, false, false, 1), "html", null, true);
        yield ",</p>

<p>Pour réinitialiser votre mot de passe, veuillez cliquer sur le lien ci-dessous :</p>

<p><a href=\"";
        // line 5
        yield (isset($context["url"]) || array_key_exists("url", $context) ? $context["url"] : (function () { throw new RuntimeError('Variable "url" does not exist.', 5, $this->source); })());
        yield "\">";
        yield (isset($context["url"]) || array_key_exists("url", $context) ? $context["url"] : (function () { throw new RuntimeError('Variable "url" does not exist.', 5, $this->source); })());
        yield "</a></p>

<p>Si vous n'avez pas demandé cette réinitialisation, vous pouvez ignorer cet email.</p>

<p>Cordialement,</p>

<p>L'équipe de gestion des réservations JO2024</p>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "emails/password_reset.html.twig";
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
        return array (  56 => 5,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<p>Bonjour {{ user.nickname }},</p>

<p>Pour réinitialiser votre mot de passe, veuillez cliquer sur le lien ci-dessous :</p>

<p><a href=\"{{ url|raw }}\">{{ url|raw }}</a></p>

<p>Si vous n'avez pas demandé cette réinitialisation, vous pouvez ignorer cet email.</p>

<p>Cordialement,</p>

<p>L'équipe de gestion des réservations JO2024</p>", "emails/password_reset.html.twig", "/var/www/symfony/templates/emails/password_reset.html.twig");
    }
}
