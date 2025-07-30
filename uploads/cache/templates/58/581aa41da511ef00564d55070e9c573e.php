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

/* index.twig.html */
class __TwigTemplate_cfaaa4e4c34e5bbb873dca959fb34ab6 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'head' => [$this, 'block_head'],
            'header' => [$this, 'block_header'],
            'beforePage' => [$this, 'block_beforePage'],
            'sidebar' => [$this, 'block_sidebar'],
            'page' => [$this, 'block_page'],
            'afterPage' => [$this, 'block_afterPage'],
            'footer' => [$this, 'block_footer'],
            'privacy' => [$this, 'block_privacy'],
            'foot' => [$this, 'block_foot'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 12
        yield "
<!DOCTYPE html>
<html lang=\"";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["lang"] ?? null), "html", null, true);
        yield "\" dir=\"";
        yield ((($context["rightToLeft"] ?? null)) ? ("rtl") : ("ltr"));
        yield "\" style=\"scroll-behavior: smooth;\">
    <head>
        ";
        // line 16
        yield from $this->unwrap()->yieldBlock('head', $context, $blocks);
        // line 19
        yield "    </head>
    <body x-data=\"{ modalOpen: false, modalType: 'none', globalShowHide: false }\"
        class=\"h-full flex flex-col font-sans ";
        // line 21
        ((($context["bodyBackground"] ?? null)) ? (yield "") : (yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(("body-gradient-" . Twig\Extension\CoreExtension::lower($this->env->getCharset(), ($context["themeColour"] ?? null))), "html", null, true)));
        yield "\" style=\"";
        ((($context["bodyBackground"] ?? null)) ? (yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["bodyBackground"] ?? null), "html", null, true)) : (yield ""));
        yield " ";
        yield ((Twig\Extension\CoreExtension::testEmpty(($context["themeColour"] ?? null))) ? ("background: linear-gradient(to left top, #402568 2%, #935ee1 65%, #a871ec) no-repeat fixed") : (""));
        yield "\">
        <a id=\"top\"></a>
        ";
        // line 23
        $context["sidebarPos"] = ((($context["isLoggedIn"] ?? null)) ? ("left") : ("right"));
        // line 24
        yield "
        <!-- <div class=\"login-modal fixed flex justify-center items-center w-full h-full bg-white  z-10\" style=\"background-color: #F5F7FA;\">
            <div class=\"login-modal-content w-full rounded-md shadow-md bg-white p-4\" style=\"max-width: 530px;\">
                <p>Welcome, please enter your email and password to continue</p>
                ";
        // line 28
        yield Twig\Extension\CoreExtension::include($this->env, $context, "navigation.twig.html");
        yield "                 

            </div>
        </div> -->
        <!-- <div class=\"px-4 sm:px-6 lg:px-12 pb-24\"> -->
        <!-- Main Content div -->
        <div class=\"\">
            ";
        // line 35
        yield from $this->unwrap()->yieldBlock('header', $context, $blocks);
        // line 127
        yield "        </div>
        <!-- <div id=\"wrapOuter\" class=\"flex-1 pt-24 bg-transparent-100\"> -->
        <div id=\"wrapOuter\" class=\"mt-4 flex-1 bg-transparent-100\">
            <!-- <div id=\"wrap\" class=\"px-0 sm:px-6 lg:px-16 -mt-48\"> -->
                <div id=\"wrap\" class=\"px-0\">
                ";
        // line 132
        yield from $this->unwrap()->yieldBlock('beforePage', $context, $blocks);
        // line 134
        yield "
                <div class=\"block lg:hidden mx-4 sm:mx-0 mb-4\">
                ";
        // line 136
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "alerts", [], "any", false, false, false, 136));
        foreach ($context['_seq'] as $context["type"] => $context["alerts"]) {
            // line 137
            yield "                    ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable($context["alerts"]);
            foreach ($context['_seq'] as $context["_key"] => $context["text"]) {
                // line 138
                yield "                        <div class=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["type"], "html", null, true);
                yield "\">";
                yield $context["text"];
                yield "</div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['text'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 140
            yield "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['type'], $context['alerts'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 141
        yield "                </div>

                <div id=\"content-wrap\" class=\"relative w-full min-h-1/2 flex content-start ";
        // line 143
        yield ((($context["sidebar"] ?? null)) ? ("gap-4 lg:gap-6 flex flex-col") : ("flex-col"));
        yield " ";
        yield (((($context["sidebarPos"] ?? null) == "left")) ? ("lg:flex-row") : ("lg:flex-row-reverse"));
        yield " ";
        yield ((( !($context["isHomePage"] ?? null) &&  !($context["isLoggedIn"] ?? null))) ? ("flex-col-reverse") : (""));
        yield " clearfix\">

                    ";
        // line 145
        if ((($context["sidebar"] ?? null) && (($context["sidebarContents"] ?? null) || ($context["menuModule"] ?? null)))) {
            // line 146
            yield "                        <div id=\"sidebar\" class=\"w-full lg:w-sidebar lg:min-w-72 lg:max-w-xs \">
                            ";
            // line 147
            yield from $this->unwrap()->yieldBlock('sidebar', $context, $blocks);
            // line 150
            yield "                        </div>

                    ";
        } else {
            // line 153
            yield "                        ";
            yield Twig\Extension\CoreExtension::include($this->env, $context, "navigation.twig.html");
            yield "
                    ";
        }
        // line 155
        yield "
                    <div id=\"content\" class=\"";
        // line 156
        ((($context["contentClass"] ?? null)) ? (yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["contentClass"] ?? null), "html", null, true)) : (yield "max-w-full"));
        yield " ";
        yield (((($context["isHomePage"] ?? null) && ($context["isLoggedIn"] ?? null))) ? ("bg-gray-100") : ("bg-white pb-6"));
        yield " w-full shadow  sm:rounded lg:flex-1 px-4 sm:px-8\">

                        <div id=\"content-inner\" class=\"h-full\">

                            ";
        // line 160
        yield from $this->unwrap()->yieldBlock('page', $context, $blocks);
        // line 167
        yield "                        </div>
                    </div>

                </div>

                ";
        // line 172
        if (($context["isLoggedIn"] ?? null)) {
            // line 173
            yield "                    <div class=\"text-right mt-2 text-xs pr-1\">
                        <a class='text-";
            // line 174
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["themeColour"] ?? null), "html", null, true);
            yield "-800' href='#top'>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Return to top"), "html", null, true);
            yield "</a>
                    </div>
                ";
        }
        // line 177
        yield "
                ";
        // line 178
        yield from $this->unwrap()->yieldBlock('afterPage', $context, $blocks);
        // line 180
        yield "            </div>

            

            ";
        // line 184
        yield from $this->unwrap()->yieldBlock('footer', $context, $blocks);
        // line 191
        yield "
        </div>

        ";
        // line 194
        yield from $this->unwrap()->yieldBlock('privacy', $context, $blocks);
        // line 197
        yield "
        ";
        // line 198
        yield from $this->unwrap()->yieldBlock('foot', $context, $blocks);
        // line 201
        yield "    </body>
</html>
";
        return; yield '';
    }

    // line 16
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 17
        yield "        ";
        yield Twig\Extension\CoreExtension::include($this->env, $context, "head.twig.html");
        yield "
        ";
        return; yield '';
    }

    // line 35
    public function block_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 36
        yield "                <div id=\"header\" class=\"relative flex justify-between items-center\">

                    <a id=\"header-logo\" class=\"block pl-4 pb-2 max-w-xs sm:max-w-full leading-none\" href=\"";
        // line 38
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
        yield "\">
                        <img class=\"p-2 block max-w-full ";
        // line 39
        yield ((($context["isLoggedIn"] ?? null)) ? ("h-12") : ("h-20 mt-4 mb-4"));
        yield "\" alt=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["organisationName"] ?? null), "html", null, true);
        yield " Logo\" src=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
        yield "/";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::trim(((array_key_exists("organisationLogo", $context)) ? (Twig\Extension\CoreExtension::default(($context["organisationLogo"] ?? null), "themes/Default/img/logo.png")) : ("themes/Default/img/logo.png")), "/", "left"), "html", null, true);
        yield "\" style=\"max-height:100px;\" />
                    </a>


                     <!-- <div class=\" notificationTray flex-grow relative\"> -->
                            <!-- <div class=\"flex flex-row-reverse items-center\"> -->


                            <!-- </div>
                    </div> -->

                    <!-- Notifications Avatar and Name-->
                    <div class=\"flex-grow flex items-center justify-end text-right text-sm text-";
        // line 51
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["themeColour"] ?? null), "html", null, true);
        yield "-200\">
                        ";
        // line 52
        if ((($context["isLoggedIn"] ?? null) && ($context["currentUser"] ?? null))) {
            // line 53
            yield "
                            <div id=\"finderTray\" class=\"hidden md:block mr-16 w-auto sm:w-full max-w-sm\">
                                ";
            // line 55
            yield Twig\Extension\CoreExtension::include($this->env, $context, "finder.twig.html");
            yield "
                            </div>

                            <!-- Notifications and Messages -->
                            <div id=\"notifications-container\">
                                ";
            // line 60
            yield Twig\Extension\CoreExtension::include($this->env, $context, "tray.twig.html");
            yield "
                            </div>

                            <!-- Image and Menu -->
                            <div class=\"relative px-4 py-4 ";
            // line 64
            yield ((($context["rightToLeft"] ?? null)) ? ("-ml-3") : ("-mr-3"));
            yield "\" x-data=\"{menuOpen: false}\" @mouseleave=\"menuOpen = false\" @click.outside=\"menuOpen = false\">
                                <a @mouseenter=\"menuOpen = true\" @click=\"menuOpen = !menuOpen\" :class=\"{'ring-opacity-75': menuOpen, 'ring-opacity-25': !menuOpen}\" hx-boost=\"true\" hx-target=\"#content-wrap\" hx-select=\"#content-wrap\" hx-swap=\"outerHTML show:no-scroll swap:0s\" href=\"";
            // line 65
            (((CoreExtension::getAttribute($this->env, $this->source, ($context["currentUser"] ?? null), "url", [], "any", true, true, false, 65) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["currentUser"] ?? null), "url", [], "any", false, false, false, 65)))) ? (yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["currentUser"] ?? null), "url", [], "any", false, false, false, 65), "html", null, true)) : (yield "#"));
            yield "\" class=\"";
            yield ((CoreExtension::getAttribute($this->env, $this->source, ($context["currentUser"] ?? null), "image_240", [], "any", false, false, false, 65)) ? ("flex-none") : ("flex items-center justify-center"));
            yield " block overflow-hidden w-10 h-10 rounded-full bg-gray-200 ring-white ring-2 cursor-pointer\">
                                ";
            // line 66
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["currentUser"] ?? null), "image_240", [], "any", false, false, false, 66)) {
                // line 67
                yield "                                    <img class=\"w-full -mt-1\" src=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
                yield "/";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["currentUser"] ?? null), "image_240", [], "any", false, false, false, 67), "html", null, true);
                yield "\" />
                                ";
            } else {
                // line 69
                yield "                                    <img class=\"w-full\" src=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
                yield "/themes/";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["gibbonThemeName"] ?? null), "html", null, true);
                yield "/img/anonymous_75.jpg\" />
                                ";
            }
            // line 71
            yield "                                </a>

                                <ul x-cloak x-show=\"menuOpen\" x-transition:enter.duration.250ms x-transition:leave.duration.100ms class=\"list-none m-0 bg-black bg-opacity-75 backdrop-blur-lg backdrop-contrast-125 backdrop-saturate-150 absolute rounded-md w-48 mt-1 p-1 sm:p-1.5 z-50 cursor-pointer ";
            // line 73
            yield ((($context["rightToLeft"] ?? null)) ? ("left-0") : ("right-0"));
            yield "\">
                                    ";
            // line 74
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::reverse($this->env->getCharset(), ($context["minorLinks"] ?? null)));
            foreach ($context['_seq'] as $context["_key"] => $context["link"]) {
                // line 75
                yield "                                    <li class=\"hover:bg-";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["themeColour"] ?? null), "html", null, true);
                yield "-700 rounded\">
                                        <a @click=\"menuOpen = false\" href=\"";
                // line 76
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["link"], "url", [], "any", false, false, false, 76), "html", null, true);
                yield "\" class=\"flex justify-between items-center text-sm text-white focus:text-";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["themeColour"] ?? null), "html", null, true);
                yield "-200 no-underline px-1 py-2 md:py-1 leading-normal ";
                yield ((($context["rightToLeft"] ?? null)) ? ("text-right") : ("text-left"));
                yield "\" target=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["link"], "target", [], "any", false, false, false, 76), "html", null, true);
                yield "\" ";
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["link"], "target", [], "any", false, false, false, 76) == "_blank")) ? ("rel=\"noopener noreferrer\"") : (""));
                yield ">";
                // line 77
                yield CoreExtension::getAttribute($this->env, $this->source, $context["link"], "name", [], "any", false, false, false, 77);
                // line 79
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["link"], "target", [], "any", false, false, false, 79) == "_blank")) {
                    // line 80
                    yield "                                                ";
                    yield $this->env->getFunction('icon')->getCallable()("basic", "external-link", "size-4 text-white text-opacity-50 pointer-events-none");
                    yield "
                                            ";
                }
                // line 82
                yield "                                        </a>
                                    </li>
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['link'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 85
            yield "                                </ul>

                            </div>

                            <a href=\"";
            // line 89
            (((CoreExtension::getAttribute($this->env, $this->source, ($context["currentUser"] ?? null), "url", [], "any", true, true, false, 89) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["currentUser"] ?? null), "url", [], "any", false, false, false, 89)))) ? (yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["currentUser"] ?? null), "url", [], "any", false, false, false, 89), "html", null, true)) : (yield "./index.php?q=/preferences.php"));
            yield "\" class=\"hidden sm:block text-";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["themeColour"] ?? null), "html", null, true);
            yield "-200 hover:text-white\">
                                ";
            // line 90
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["currentUser"] ?? null), "name", [], "any", false, false, false, 90), "html", null, true);
            yield "
                            </a>

                        ";
        } else {
            // line 94
            yield "                            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["minorLinks"] ?? null));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["link"]) {
                // line 95
                yield "                                ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["link"], "prepend", [], "any", false, false, false, 95), "html", null, true);
                yield "&nbsp;
                                <a href=\"";
                // line 96
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["link"], "url", [], "any", false, false, false, 96), "html", null, true);
                yield "\" class=\"text-white ";
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "count", [], "any", false, false, false, 96) > 3)) ? ("hidden sm:block") : (""));
                yield "\" target=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["link"], "target", [], "any", false, false, false, 96), "html", null, true);
                yield "\" ";
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["link"], "target", [], "any", false, false, false, 96) == "_blank")) ? ("rel=\"noopener noreferrer\"") : (""));
                yield ">";
                // line 97
                yield CoreExtension::getAttribute($this->env, $this->source, $context["link"], "name", [], "any", false, false, false, 97);
                // line 98
                yield "</a>
                                ";
                // line 99
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["link"], "append", [], "any", false, false, false, 99), "html", null, true);
                yield "
                            ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['link'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 101
            yield "                        ";
        }
        // line 102
        yield "
                        ";
        // line 103
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["currentUser"] ?? null), "houseName", [], "any", false, false, false, 103) && CoreExtension::getAttribute($this->env, $this->source, ($context["currentUser"] ?? null), "houseLogo", [], "any", false, false, false, 103))) {
            // line 104
            yield "                            <img class=\"ml-3 -mt-2 w-12 h-12\" title=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["currentUser"] ?? null), "houseName", [], "any", false, false, false, 104), "html", null, true);
            yield "\" style=\"vertical-align: -75%;\" src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
            yield "/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["currentUser"] ?? null), "houseLogo", [], "any", false, false, false, 104), "html", null, true);
            yield "\"/>
                        ";
        }
        // line 106
        yield "                    </div>


                    
                </div>

                ";
        // line 112
        if (($context["isLoggedIn"] ?? null)) {
            // line 113
            yield "                    <div class=\"menu-mobile block md:hidden p-4 flex justify-center items-center\" style=\"background: #f5f7fa;\">
                        <div id=\"finderTray\" class=\"\"\">
                            ";
            // line 115
            yield Twig\Extension\CoreExtension::include($this->env, $context, "finder.twig.html");
            yield "
                        </div>             
                    </div>
                    


                    <nav id=\"header-menu\" class=\" justify-between\" style=\"background-color: #777777 !important;\">
                        ";
            // line 122
            yield Twig\Extension\CoreExtension::include($this->env, $context, "menu.twig.html");
            yield "
                    </nav>
                ";
        }
        // line 125
        yield "
            ";
        return; yield '';
    }

    // line 132
    public function block_beforePage($context, array $blocks = [])
    {
        $macros = $this->macros;
        yield "                ";
        return; yield '';
    }

    // line 147
    public function block_sidebar($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 148
        yield "                            ";
        yield Twig\Extension\CoreExtension::include($this->env, $context, "navigation.twig.html");
        yield "
                            ";
        return; yield '';
    }

    // line 160
    public function block_page($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 161
        yield "
                                ";
        // line 162
        yield Twig\Extension\CoreExtension::include($this->env, $context, "page.twig.html");
        yield "

                                ";
        // line 164
        yield Twig\Extension\CoreExtension::join(($context["content"] ?? null), "
");
        yield "
                                
                            ";
        return; yield '';
    }

    // line 178
    public function block_afterPage($context, array $blocks = [])
    {
        $macros = $this->macros;
        yield "                ";
        return; yield '';
    }

    // line 184
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 185
        yield "                <div class=\"relative text-sm text-gray-700 px-6 lg:px-12 mt-4 pt-2 pb-6 leading-normal border-t border-gray-300 ";
        yield ((($context["rightToLeft"] ?? null)) ? ("text-right") : ("text-left"));
        yield "\">
                    ";
        // line 186
        yield Twig\Extension\CoreExtension::include($this->env, $context, "footer.twig.html");
        yield "

                    <img class=\"absolute top-0 -mt-1 hidden sm:block w-32 ";
        // line 188
        yield ((($context["rightToLeft"] ?? null)) ? ("left-0 sm:ml-0 md:ml-16") : ("right-0 sm:mr-0 md:mr-16"));
        yield "\" alt=\"Logo text-xs\" src=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
        yield "/themes/";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("gibbonThemeName", $context)) ? (Twig\Extension\CoreExtension::default(($context["gibbonThemeName"] ?? null), "Default")) : ("Default")), "html", null, true);
        yield "/img/gibbon-white.svg\"/>
                </div>
            ";
        return; yield '';
    }

    // line 194
    public function block_privacy($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 195
        yield "        ";
        yield Twig\Extension\CoreExtension::include($this->env, $context, "privacy.twig.html");
        yield "
        ";
        return; yield '';
    }

    // line 198
    public function block_foot($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 199
        yield "        ";
        yield Twig\Extension\CoreExtension::include($this->env, $context, "foot.twig.html");
        yield "
        ";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "index.twig.html";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  590 => 199,  586 => 198,  578 => 195,  574 => 194,  562 => 188,  557 => 186,  552 => 185,  548 => 184,  540 => 178,  531 => 164,  526 => 162,  523 => 161,  519 => 160,  511 => 148,  507 => 147,  499 => 132,  493 => 125,  487 => 122,  477 => 115,  473 => 113,  471 => 112,  463 => 106,  453 => 104,  451 => 103,  448 => 102,  445 => 101,  429 => 99,  426 => 98,  424 => 97,  415 => 96,  410 => 95,  392 => 94,  385 => 90,  379 => 89,  373 => 85,  365 => 82,  359 => 80,  357 => 79,  355 => 77,  344 => 76,  339 => 75,  335 => 74,  331 => 73,  327 => 71,  319 => 69,  311 => 67,  309 => 66,  303 => 65,  299 => 64,  292 => 60,  284 => 55,  280 => 53,  278 => 52,  274 => 51,  253 => 39,  249 => 38,  245 => 36,  241 => 35,  233 => 17,  229 => 16,  222 => 201,  220 => 198,  217 => 197,  215 => 194,  210 => 191,  208 => 184,  202 => 180,  200 => 178,  197 => 177,  189 => 174,  186 => 173,  184 => 172,  177 => 167,  175 => 160,  166 => 156,  163 => 155,  157 => 153,  152 => 150,  150 => 147,  147 => 146,  145 => 145,  136 => 143,  132 => 141,  126 => 140,  115 => 138,  110 => 137,  106 => 136,  102 => 134,  100 => 132,  93 => 127,  91 => 35,  81 => 28,  75 => 24,  73 => 23,  64 => 21,  60 => 19,  58 => 16,  51 => 14,  47 => 12,);
    }

    public function getSourceContext()
    {
        return new Source("{#<!--
Gibbon: the flexible, open school platform
Founded by Ross Parker at ICHK Secondary. Built by Ross Parker, Sandra Kuipers and the Gibbon community (https://gibbonedu.org/about/)
Copyright © 2010, Gibbon Foundation
Gibbon™, Gibbon Education Ltd. (Hong Kong)

This is a Gibbon template file, written in HTML and Twig syntax.
For info about editing, see: https://twig.symfony.com/doc/2.x/

TODO: add template variable details.
-->#}

<!DOCTYPE html>
<html lang=\"{{ lang }}\" dir=\"{{ rightToLeft ? 'rtl' : 'ltr' }}\" style=\"scroll-behavior: smooth;\">
    <head>
        {% block head %}
        {{ include('head.twig.html') }}
        {% endblock head %}
    </head>
    <body x-data=\"{ modalOpen: false, modalType: 'none', globalShowHide: false }\"
        class=\"h-full flex flex-col font-sans {{ bodyBackground  ? '' : 'body-gradient-' ~ themeColour|lower }}\" style=\"{{ bodyBackground  ? bodyBackground : '' }} {{ themeColour is empty ? 'background: linear-gradient(to left top, #402568 2%, #935ee1 65%, #a871ec) no-repeat fixed' : '' }}\">
        <a id=\"top\"></a>
        {% set sidebarPos = isLoggedIn ? 'left' : 'right' %}

        <!-- <div class=\"login-modal fixed flex justify-center items-center w-full h-full bg-white  z-10\" style=\"background-color: #F5F7FA;\">
            <div class=\"login-modal-content w-full rounded-md shadow-md bg-white p-4\" style=\"max-width: 530px;\">
                <p>Welcome, please enter your email and password to continue</p>
                {{ include('navigation.twig.html') }}                 

            </div>
        </div> -->
        <!-- <div class=\"px-4 sm:px-6 lg:px-12 pb-24\"> -->
        <!-- Main Content div -->
        <div class=\"\">
            {% block header %}
                <div id=\"header\" class=\"relative flex justify-between items-center\">

                    <a id=\"header-logo\" class=\"block pl-4 pb-2 max-w-xs sm:max-w-full leading-none\" href=\"{{ absoluteURL }}\">
                        <img class=\"p-2 block max-w-full {{ isLoggedIn ? 'h-12' : 'h-20 mt-4 mb-4' }}\" alt=\"{{ organisationName }} Logo\" src=\"{{ absoluteURL }}/{{ organisationLogo|default(\"themes/Default/img/logo.png\")|trim('/', 'left') }}\" style=\"max-height:100px;\" />
                    </a>


                     <!-- <div class=\" notificationTray flex-grow relative\"> -->
                            <!-- <div class=\"flex flex-row-reverse items-center\"> -->


                            <!-- </div>
                    </div> -->

                    <!-- Notifications Avatar and Name-->
                    <div class=\"flex-grow flex items-center justify-end text-right text-sm text-{{ themeColour }}-200\">
                        {% if isLoggedIn and currentUser %}

                            <div id=\"finderTray\" class=\"hidden md:block mr-16 w-auto sm:w-full max-w-sm\">
                                {{ include('finder.twig.html') }}
                            </div>

                            <!-- Notifications and Messages -->
                            <div id=\"notifications-container\">
                                {{ include('tray.twig.html') }}
                            </div>

                            <!-- Image and Menu -->
                            <div class=\"relative px-4 py-4 {{ rightToLeft ? '-ml-3' : '-mr-3' }}\" x-data=\"{menuOpen: false}\" @mouseleave=\"menuOpen = false\" @click.outside=\"menuOpen = false\">
                                <a @mouseenter=\"menuOpen = true\" @click=\"menuOpen = !menuOpen\" :class=\"{'ring-opacity-75': menuOpen, 'ring-opacity-25': !menuOpen}\" hx-boost=\"true\" hx-target=\"#content-wrap\" hx-select=\"#content-wrap\" hx-swap=\"outerHTML show:no-scroll swap:0s\" href=\"{{ currentUser.url ?? '#' }}\" class=\"{{ currentUser.image_240 ? 'flex-none' : 'flex items-center justify-center' }} block overflow-hidden w-10 h-10 rounded-full bg-gray-200 ring-white ring-2 cursor-pointer\">
                                {% if currentUser.image_240 %}
                                    <img class=\"w-full -mt-1\" src=\"{{ absoluteURL }}/{{ currentUser.image_240 }}\" />
                                {% else %}
                                    <img class=\"w-full\" src=\"{{ absoluteURL }}/themes/{{ gibbonThemeName }}/img/anonymous_75.jpg\" />
                                {% endif %}
                                </a>

                                <ul x-cloak x-show=\"menuOpen\" x-transition:enter.duration.250ms x-transition:leave.duration.100ms class=\"list-none m-0 bg-black bg-opacity-75 backdrop-blur-lg backdrop-contrast-125 backdrop-saturate-150 absolute rounded-md w-48 mt-1 p-1 sm:p-1.5 z-50 cursor-pointer {{ rightToLeft ? 'left-0' : 'right-0' }}\">
                                    {% for link in minorLinks|reverse %}
                                    <li class=\"hover:bg-{{ themeColour }}-700 rounded\">
                                        <a @click=\"menuOpen = false\" href=\"{{ link.url }}\" class=\"flex justify-between items-center text-sm text-white focus:text-{{ themeColour }}-200 no-underline px-1 py-2 md:py-1 leading-normal {{ rightToLeft ? 'text-right' : 'text-left' }}\" target=\"{{ link.target }}\" {{ link.target == '_blank' ? 'rel=\"noopener noreferrer\"' : '' }}>
                                            {{- link.name|raw -}}

                                            {% if link.target == '_blank' %}
                                                {{ icon('basic', 'external-link', 'size-4 text-white text-opacity-50 pointer-events-none') }}
                                            {% endif %}
                                        </a>
                                    </li>
                                    {% endfor %}
                                </ul>

                            </div>

                            <a href=\"{{ currentUser.url ?? './index.php?q=/preferences.php' }}\" class=\"hidden sm:block text-{{ themeColour }}-200 hover:text-white\">
                                {{ currentUser.name }}
                            </a>

                        {% else %}
                            {% for link in minorLinks %}
                                {{ link.prepend }}&nbsp;
                                <a href=\"{{ link.url }}\" class=\"text-white {{ loop.count > 3 ? 'hidden sm:block' }}\" target=\"{{ link.target }}\" {{ link.target == '_blank' ? 'rel=\"noopener noreferrer\"' : '' }}>
                                    {{- link.name|raw -}}
                                </a>
                                {{ link.append }}
                            {% endfor %}
                        {% endif %}

                        {% if currentUser.houseName and currentUser.houseLogo %}
                            <img class=\"ml-3 -mt-2 w-12 h-12\" title=\"{{ currentUser.houseName }}\" style=\"vertical-align: -75%;\" src=\"{{ absoluteURL }}/{{ currentUser.houseLogo }}\"/>
                        {% endif %}
                    </div>


                    
                </div>

                {% if isLoggedIn %}
                    <div class=\"menu-mobile block md:hidden p-4 flex justify-center items-center\" style=\"background: #f5f7fa;\">
                        <div id=\"finderTray\" class=\"\"\">
                            {{ include('finder.twig.html') }}
                        </div>             
                    </div>
                    


                    <nav id=\"header-menu\" class=\" justify-between\" style=\"background-color: #777777 !important;\">
                        {{ include('menu.twig.html') }}
                    </nav>
                {% endif %}

            {% endblock %}
        </div>
        <!-- <div id=\"wrapOuter\" class=\"flex-1 pt-24 bg-transparent-100\"> -->
        <div id=\"wrapOuter\" class=\"mt-4 flex-1 bg-transparent-100\">
            <!-- <div id=\"wrap\" class=\"px-0 sm:px-6 lg:px-16 -mt-48\"> -->
                <div id=\"wrap\" class=\"px-0\">
                {% block beforePage %}
                {% endblock beforePage %}

                <div class=\"block lg:hidden mx-4 sm:mx-0 mb-4\">
                {% for type, alerts in page.alerts %}
                    {% for text in alerts %}
                        <div class=\"{{ type }}\">{{ text|raw }}</div>
                    {% endfor %}
                {% endfor %}
                </div>

                <div id=\"content-wrap\" class=\"relative w-full min-h-1/2 flex content-start {{ sidebar ? 'gap-4 lg:gap-6 flex flex-col' : 'flex-col' }} {{ sidebarPos == 'left' ? 'lg:flex-row' : 'lg:flex-row-reverse' }} {{ not isHomePage and not isLoggedIn ? 'flex-col-reverse'}} clearfix\">

                    {% if sidebar and (sidebarContents or menuModule) %}
                        <div id=\"sidebar\" class=\"w-full lg:w-sidebar lg:min-w-72 lg:max-w-xs \">
                            {% block sidebar %}
                            {{ include('navigation.twig.html') }}
                            {% endblock sidebar %}
                        </div>

                    {% else %}
                        {{ include('navigation.twig.html') }}
                    {% endif %}

                    <div id=\"content\" class=\"{{ contentClass ? contentClass : 'max-w-full' }} {{ isHomePage and isLoggedIn ? 'bg-gray-100' : 'bg-white pb-6'}} w-full shadow  sm:rounded lg:flex-1 px-4 sm:px-8\">

                        <div id=\"content-inner\" class=\"h-full\">

                            {% block page %}

                                {{ include('page.twig.html') }}

                                {{ content|join(\"\\n\")|raw }}
                                
                            {% endblock %}
                        </div>
                    </div>

                </div>

                {% if isLoggedIn %}
                    <div class=\"text-right mt-2 text-xs pr-1\">
                        <a class='text-{{ themeColour }}-800' href='#top'>{{ __('Return to top') }}</a>
                    </div>
                {% endif %}

                {% block afterPage %}
                {% endblock afterPage %}
            </div>

            

            {% block footer %}
                <div class=\"relative text-sm text-gray-700 px-6 lg:px-12 mt-4 pt-2 pb-6 leading-normal border-t border-gray-300 {{ rightToLeft ? 'text-right' : 'text-left' }}\">
                    {{ include('footer.twig.html') }}

                    <img class=\"absolute top-0 -mt-1 hidden sm:block w-32 {{ rightToLeft ? 'left-0 sm:ml-0 md:ml-16' : 'right-0 sm:mr-0 md:mr-16' }}\" alt=\"Logo text-xs\" src=\"{{ absoluteURL }}/themes/{{ gibbonThemeName|default(\"Default\") }}/img/gibbon-white.svg\"/>
                </div>
            {% endblock %}

        </div>

        {% block privacy %}
        {{ include('privacy.twig.html') }}
        {% endblock privacy %}

        {% block foot %}
        {{ include('foot.twig.html') }}
        {% endblock foot %}
    </body>
</html>
", "index.twig.html", "/var/www/GibbonEduCore/resources/templates/index.twig.html");
    }
}
