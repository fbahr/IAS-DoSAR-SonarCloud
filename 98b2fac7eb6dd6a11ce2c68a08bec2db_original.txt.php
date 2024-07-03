<?php

/* MD5: e622d1e99f543321668714e109a5c882 */
/* #1: PHPDeobfuscator eval output */ 
    declare (strict_types=1);
    namespace Template\easyTemplate360;
    
    use JTL\Events\Dispatcher;
    use JTL\IO\IOResponse;
    use JTL\License\Struct\ExsLicense;
    use JTL\Shop;
    use JTL\Template\Bootstrapper;
    use scc\DefaultComponentRegistrator;
    use scc\Renderer;
    use scc\RendererInterface;
    use Smarty;
    use Template\easytemplate360\src\Controllers\TemplateController;
    use Template\easyTemplate360\src\Utils\Logger;
    require_once "/var/www/html/src/autoload.php";
    class Bootstrap extends Bootstrapper
    {
        protected $scc;
        protected $renderer;
        public function boot() : void
        {
            parent::boot();
            try {
                $this->registerNovaPlugins();
                $this->registerPlugins();
                $this->registerAjax();
                $this->computeSessionVariables();
            } catch (\Exception $e) {
                Logger::error('Failed to boot template: ' . $e->getMessage());
            }
        }
        protected function registerNovaPlugins() : void
        {
            $smarty = $this->getSmarty();
            if ($smarty === null) {
                return;
            }
            $plugins = new NovaPlugins($this->getDB(), $this->getCache());
            $smarty->addTemplateDir("/var/www/html/scc", 'scc2');
            $this->renderer = new Renderer($smarty);
            $this->scc = new DefaultComponentRegistrator($this->renderer);
            $this->scc->registerComponents();
            if (isset($_GET['scc-demo']) && Shop::isAdmin()) {
                $smarty->display('demo.tpl');
                die;
            }
            $smarty->registerPlugin(Smarty::PLUGIN_FUNCTION, 'gibPreisStringLocalizedSmarty', [$plugins, 'getLocalizedPrice'])->registerPlugin(Smarty::PLUGIN_FUNCTION, 'getBoxesByPosition', [$plugins, 'getBoxesByPosition'])->registerPlugin(Smarty::PLUGIN_FUNCTION, 'has_boxes', [$plugins, 'hasBoxes'])->registerPlugin(Smarty::PLUGIN_FUNCTION, 'imageTag', [$plugins, 'getImgTag'])->registerPlugin(Smarty::PLUGIN_FUNCTION, 'getCheckBoxForLocation', [$plugins, 'getCheckBoxForLocation'])->registerPlugin(Smarty::PLUGIN_FUNCTION, 'hasCheckBoxForLocation', [$plugins, 'hasCheckBoxForLocation'])->registerPlugin(Smarty::PLUGIN_FUNCTION, 'aaURLEncode', [$plugins, 'aaURLEncode'])->registerPlugin(Smarty::PLUGIN_FUNCTION, 'get_navigation', [$plugins, 'getNavigation'])->registerPlugin(Smarty::PLUGIN_FUNCTION, 'get_category_array', [$plugins, 'getCategoryArray'])->registerPlugin(Smarty::PLUGIN_FUNCTION, 'get_category_parents', [$plugins, 'getCategoryParents'])->registerPlugin(Smarty::PLUGIN_FUNCTION, 'prepare_image_details', [$plugins, 'prepareImageDetails'])->registerPlugin(Smarty::PLUGIN_FUNCTION, 'get_manufacturers', [$plugins, 'getManufacturers'])->registerPlugin(Smarty::PLUGIN_FUNCTION, 'get_cms_content', [$plugins, 'getCMSContent'])->registerPlugin(Smarty::PLUGIN_FUNCTION, 'get_static_route', [$plugins, 'getStaticRoute'])->registerPlugin(Smarty::PLUGIN_FUNCTION, 'hasOnlyListableVariations', [$plugins, 'hasOnlyListableVariations'])->registerPlugin(Smarty::PLUGIN_MODIFIER, 'has_trans', [$plugins, 'hasTranslation'])->registerPlugin(Smarty::PLUGIN_MODIFIER, 'trans', [$plugins, 'getTranslation'])->registerPlugin(Smarty::PLUGIN_FUNCTION, 'get_product_list', [$plugins, 'getProductList'])->registerPlugin(Smarty::PLUGIN_FUNCTION, 'captchaMarkup', [$plugins, 'captchaMarkup'])->registerPlugin(Smarty::PLUGIN_FUNCTION, 'getStates', [$plugins, 'getStates'])->registerPlugin(Smarty::PLUGIN_FUNCTION, 'getDecimalLength', [$plugins, 'getDecimalLength'])->registerPlugin(Smarty::PLUGIN_MODIFIER, 'seofy', [$plugins, 'seofy'])->registerPlugin(Smarty::PLUGIN_FUNCTION, 'getUploaderLang', [$plugins, 'getUploaderLang'])->registerPlugin(Smarty::PLUGIN_FUNCTION, 'getCountry', [$plugins, 'getCountry'])->registerPlugin(Smarty::PLUGIN_FUNCTION, 'sanitizeTitle', [$plugins, 'sanitizeTitle'])->registerPlugin(Smarty::PLUGIN_MODIFIER, 'formatForMicrodata', [$plugins, 'formatForMicrodata']);
        }
        protected function registerPlugins() : void
        {
            $smarty = $this->getSmarty();
            if ($smarty === null) {
                return;
            }
            $plugins = new Plugins($this->getDB(), $this->getCache());
            $plugins->registerAll($smarty);
        }
        public function licenseExpired(ExsLicense $license) : void
        {
        }
        public function installed() : void
        {
            parent::installed();
        }
        public function enabled() : void
        {
            parent::enabled();
        }
        public function disabled() : void
        {
            parent::enabled();
        }
        public function updated($oldVersion, $newVersion) : void
        {
        }
        public function uninstalled(bool $deleteData = true) : void
        {
            parent::uninstalled($deleteData);
        }
        protected function registerCustomWidgetClassFile($absolutePath) : void
        {
            if (empty($absolutePath)) {
                return;
            }
            if (file_exists($absolutePath)) {
                require_once $absolutePath;
            }
        }
        protected function computeSessionVariables()
        {
            if (isset($_REQUEST['ed']) && (int) $_REQUEST['ed'] > 0) {
                $_SESSION['et_userSelectedProductListDisplayType'] = (int) $_REQUEST['ed'];
            }
        }
        protected function registerAjax() : void
        {
            Dispatcher::getInstance()->listen("shop.hook.HOOK_IO_HANDLE_REQUEST", function (array $args) {
                $args['io']->register('et360_render_widget', function ($widgetId, $renderContext) {
                    $response = new IOResponse();
                    $response->assignVar('result', TemplateController::getInstance()->renderWidget($widgetId, $renderContext));
                    return $response;
                });
            });
        }
    }
/* END:#1 */
