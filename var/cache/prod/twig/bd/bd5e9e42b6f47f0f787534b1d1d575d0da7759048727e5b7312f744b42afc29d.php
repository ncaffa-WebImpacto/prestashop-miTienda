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

/* @PrestaShop/Admin/Configure/ShopParameters/OrderPreferences/Blocks/order_preferences_gift_options.html.twig */
class __TwigTemplate_f0abac83617f7ac454bb9ba3fcb6b1a19edc5a6e2b4cf139a5bcdf8b0aa0796c extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'order_preferences_gift_options' => [$this, 'block_order_preferences_gift_options'],
            'order_gift_options_preferences_form_rest' => [$this, 'block_order_gift_options_preferences_form_rest'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 25
        echo "
";
        // line 27
        $context["ps"] = $this->loadTemplate("@PrestaShop/Admin/macros.html.twig", "@PrestaShop/Admin/Configure/ShopParameters/OrderPreferences/Blocks/order_preferences_gift_options.html.twig", 27);
        // line 28
        echo "
";
        // line 29
        $this->displayBlock('order_preferences_gift_options', $context, $blocks);
    }

    public function block_order_preferences_gift_options($context, array $blocks = [])
    {
        // line 30
        echo "<div class=\"col-xl-10\">
    <div class=\"card\">
        <h3 class=\"card-header\">
            <i class=\"material-icons\">cake</i> ";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Gift options", [], "Admin.Shopparameters.Feature"), "html", null, true);
        echo "
        </h3>
        <div class=\"card-block row\">
            <div class=\"card-text\">
                <div class=\"form-group row\">
                    ";
        // line 38
        echo $context["ps"]->getlabel_with_help($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Offer gift wrapping", [], "Admin.Shopparameters.Feature"), $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Suggest gift-wrapping to customers.", [], "Admin.Shopparameters.Help"));
        echo "
                    <div class=\"col-sm\">
                      ";
        // line 40
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["giftOptionsForm"] ?? null), "enable_gift_wrapping", []), 'errors');
        echo "
                      ";
        // line 41
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["giftOptionsForm"] ?? null), "enable_gift_wrapping", []), 'widget');
        echo "
                    </div>
                </div>
                <div class=\"form-group row\">
                    ";
        // line 45
        echo $context["ps"]->getlabel_with_help($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Gift-wrapping price", [], "Admin.Shopparameters.Feature"), $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Set a price for gift wrapping.", [], "Admin.Shopparameters.Help"));
        echo "
                    <div class=\"col-sm\">
                      ";
        // line 47
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["giftOptionsForm"] ?? null), "gift_wrapping_price", []), 'errors');
        echo "
                      ";
        // line 48
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["giftOptionsForm"] ?? null), "gift_wrapping_price", []), 'widget');
        echo "
                    </div>
                </div>

                ";
        // line 52
        if ( !($context["isAtcpShipWrapEnabled"] ?? null)) {
            // line 53
            echo "                    <div class=\"form-group row\">
                        ";
            // line 54
            echo $context["ps"]->getlabel_with_help($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Gift-wrapping tax", [], "Admin.Shopparameters.Feature"), $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Set a tax for gift wrapping.", [], "Admin.Shopparameters.Help"));
            echo "
                        <div class=\"col-sm\">
                          ";
            // line 56
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["giftOptionsForm"] ?? null), "gift_wrapping_tax_rules_group", []), 'errors');
            echo "
                          ";
            // line 57
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["giftOptionsForm"] ?? null), "gift_wrapping_tax_rules_group", []), 'widget');
            echo "
                        </div>
                    </div>
                ";
        }
        // line 61
        echo "
                <div class=\"form-group row\">
                    ";
        // line 63
        echo $context["ps"]->getlabel_with_help($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Offer recycled packaging", [], "Admin.Shopparameters.Feature"), $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Suggest recycled packaging to customer.", [], "Admin.Shopparameters.Help"));
        echo "
                    <div class=\"col-sm\">
                      ";
        // line 65
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["giftOptionsForm"] ?? null), "offer_recyclable_pack", []), 'errors');
        echo "
                      ";
        // line 66
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["giftOptionsForm"] ?? null), "offer_recyclable_pack", []), 'widget');
        echo "
                    </div>
                </div>

                ";
        // line 70
        $this->displayBlock('order_gift_options_preferences_form_rest', $context, $blocks);
        // line 73
        echo "            </div>
        </div>
        <div class=\"card-footer\">
            <div class=\"d-flex justify-content-end\">
                <button class=\"btn btn-primary\">";
        // line 77
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Save", [], "Admin.Actions"), "html", null, true);
        echo "</button>
            </div>
        </div>
    </div>
</div>
";
    }

    // line 70
    public function block_order_gift_options_preferences_form_rest($context, array $blocks = [])
    {
        // line 71
        echo "                  ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["giftOptionsForm"] ?? null), 'rest');
        echo "
                ";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Configure/ShopParameters/OrderPreferences/Blocks/order_preferences_gift_options.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  153 => 71,  150 => 70,  140 => 77,  134 => 73,  132 => 70,  125 => 66,  121 => 65,  116 => 63,  112 => 61,  105 => 57,  101 => 56,  96 => 54,  93 => 53,  91 => 52,  84 => 48,  80 => 47,  75 => 45,  68 => 41,  64 => 40,  59 => 38,  51 => 33,  46 => 30,  40 => 29,  37 => 28,  35 => 27,  32 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Configure/ShopParameters/OrderPreferences/Blocks/order_preferences_gift_options.html.twig", "C:\\xampp\\htdocs\\mitienda\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Configure\\ShopParameters\\OrderPreferences\\Blocks\\order_preferences_gift_options.html.twig");
    }
}
