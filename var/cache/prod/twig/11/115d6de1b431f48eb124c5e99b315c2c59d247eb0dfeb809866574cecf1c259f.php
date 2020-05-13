<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* @PrestaShop/Admin/Configure/ShopParameters/Contact/Contacts/Blocks/form.html.twig */
class __TwigTemplate_e87ca67309ed8d65672edd48a3c633d7f5e0ffe35837bc68fc8c75119e26f066 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'contact_form' => [$this, 'block_contact_form'],
            'contact_form_rest' => [$this, 'block_contact_form_rest'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 25
        echo "
";
        // line 26
        $context["ps"] = $this->loadTemplate("@PrestaShop/Admin/macros.html.twig", "@PrestaShop/Admin/Configure/ShopParameters/Contact/Contacts/Blocks/form.html.twig", 26);
        // line 27
        echo "
";
        // line 28
        $this->displayBlock('contact_form', $context, $blocks);
    }

    public function block_contact_form($context, array $blocks = [])
    {
        // line 29
        echo "  ";
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["contactForm"] ?? null), 'form_start');
        echo "
    <div class=\"card\">
      <h3 class=\"card-header\">
        <i class=\"material-icons\">mail_outline</i>
        ";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Contacts", [], "Admin.Shopparameters.Feature"), "html", null, true);
        echo "
      </h3>
      <div class=\"card-block row\">
        <div class=\"card-text\">
          ";
        // line 37
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["contactForm"] ?? null), 'errors');
        echo "

          ";
        // line 39
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["contactForm"] ?? null), "title", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Title", [], "Admin.Global"), "help" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Contact name (e.g. Customer Support).", [], "Admin.Shopparameters.Help")]);
        // line 42
        echo "

          ";
        // line 44
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["contactForm"] ?? null), "email", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Email address", [], "Admin.Global"), "help" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Emails will be sent to this address.", [], "Admin.Shopparameters.Help")]);
        // line 47
        echo "

          ";
        // line 49
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["contactForm"] ?? null), "is_messages_saving_enabled", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Save messages?", [], "Admin.Shopparameters.Feature"), "help" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("If enabled, all messages will be saved in the \"Customer Service\" page under the \"Customer\" menu.", [], "Admin.Shopparameters.Help")]);
        // line 52
        echo "

          ";
        // line 54
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["contactForm"] ?? null), "description", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Description", [], "Admin.Global")]);
        // line 56
        echo "

          ";
        // line 58
        if ($this->getAttribute(($context["contactForm"] ?? null), "shop_association", [], "any", true, true)) {
            // line 59
            echo "            ";
            echo $context["ps"]->getform_group_row($this->getAttribute(($context["contactForm"] ?? null), "shop_association", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Shop association", [], "Admin.Global")]);
            // line 61
            echo "
          ";
        }
        // line 63
        echo "
          ";
        // line 64
        $this->displayBlock('contact_form_rest', $context, $blocks);
        // line 67
        echo "        </div>
      </div>
      <div class=\"card-footer\">
        <a href=\"";
        // line 70
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_contacts_index");
        echo "\" class=\"btn btn-outline-secondary\">
          ";
        // line 71
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Cancel", [], "Admin.Actions"), "html", null, true);
        echo "
        </a>
        <button class=\"btn btn-primary float-right\">
          ";
        // line 74
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Save", [], "Admin.Actions"), "html", null, true);
        echo "
        </button>
      </div>
    </div>
  ";
        // line 78
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["contactForm"] ?? null), 'form_end');
        echo "
";
    }

    // line 64
    public function block_contact_form_rest($context, array $blocks = [])
    {
        // line 65
        echo "            ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["contactForm"] ?? null), 'rest');
        echo "
          ";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Configure/ShopParameters/Contact/Contacts/Blocks/form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  135 => 65,  132 => 64,  126 => 78,  119 => 74,  113 => 71,  109 => 70,  104 => 67,  102 => 64,  99 => 63,  95 => 61,  92 => 59,  90 => 58,  86 => 56,  84 => 54,  80 => 52,  78 => 49,  74 => 47,  72 => 44,  68 => 42,  66 => 39,  61 => 37,  54 => 33,  46 => 29,  40 => 28,  37 => 27,  35 => 26,  32 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Configure/ShopParameters/Contact/Contacts/Blocks/form.html.twig", "C:\\xampp\\htdocs\\mitienda\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Configure\\ShopParameters\\Contact\\Contacts\\Blocks\\form.html.twig");
    }
}
