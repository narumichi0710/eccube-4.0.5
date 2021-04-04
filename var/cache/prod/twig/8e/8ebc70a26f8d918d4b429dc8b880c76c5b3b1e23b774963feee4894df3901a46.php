<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* __string_template__df232a0117d1cd035642546f6369af5d091d9a17ea092878e86374c515984d94 */
class __TwigTemplate_b7a6b581c7c6f929ad2efba54b266c6fb8eeaee06691265cc71de61eb46e65ec extends \Eccube\Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<meta property=\"og:type\" content=\"og:product\" /><meta property=\"og:title\" content=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Product"] ?? null), "name", [], "any", false, false, false, 1), "html", null, true);
        echo "\" />
<meta property=\"og:image\" content=\"";
        // line 2
        echo $this->extensions['Eccube\Twig\Extension\IgnoreRoutingNotFoundExtension']->getUrl("homepage");
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl($this->extensions['Eccube\Twig\Extension\EccubeExtension']->getNoImageProduct(twig_get_attribute($this->env, $this->source, ($context["Product"] ?? null), "main_list_image", [], "any", false, false, false, 2)), "save_image"), "html", null, true);
        echo "\" />
<meta property=\"og:description\" content=\"";
        // line 3
        echo twig_escape_filter($this->env, strip_tags(twig_get_attribute($this->env, $this->source, ($context["Product"] ?? null), "description_list", [], "any", false, false, false, 3)), "html", null, true);
        echo "\" />
<meta property=\"og:url\" content=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->extensions['Eccube\Twig\Extension\IgnoreRoutingNotFoundExtension']->getUrl("product_detail", ["id" => twig_get_attribute($this->env, $this->source, ($context["Product"] ?? null), "id", [], "any", false, false, false, 4)]), "html", null, true);
        echo "\" />
<meta property=\"product:price:amount\" content=\"";
        // line 5
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Product"] ?? null), "getPrice02IncTaxMin", [], "any", false, false, false, 5), "html", null, true);
        echo "\"/>
<meta property=\"product:price:currency\" content=\"";
        // line 6
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["eccube_config"] ?? null), "currency", [], "any", false, false, false, 6), "html", null, true);
        echo "\"/>
<meta property=\"product:product_link\" content=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->extensions['Eccube\Twig\Extension\IgnoreRoutingNotFoundExtension']->getUrl("product_detail", ["id" => twig_get_attribute($this->env, $this->source, ($context["Product"] ?? null), "id", [], "any", false, false, false, 7)]), "html", null, true);
        echo "\"/>
<meta property=\"product:retailer_title\" content=\"";
        // line 8
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["BaseInfo"] ?? null), "shop_name", [], "any", false, false, false, 8), "html", null, true);
        echo "\"/>";
    }

    public function getTemplateName()
    {
        return "__string_template__df232a0117d1cd035642546f6369af5d091d9a17ea092878e86374c515984d94";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 8,  63 => 7,  59 => 6,  55 => 5,  51 => 4,  47 => 3,  42 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "__string_template__df232a0117d1cd035642546f6369af5d091d9a17ea092878e86374c515984d94", "");
    }
}
