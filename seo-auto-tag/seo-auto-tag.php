<?php
namespace Grav\Plugin;

use Grav\Common\Plugin;
use RocketTheme\Toolbox\Event\Event;

/**
 * Class SeoAutoTagPlugin
 * @package Grav\Plugin
 */
class SeoAutoTagPlugin extends Plugin
{
    /**
     * @return array
     */
    public static function getSubscribedEvents(): array
    {
        return [
            'onPluginsInitialized' => ['onPluginsInitialized', 0]
        ];
    }

    /**
     * Initialize the plugin
     */
    public function onPluginsInitialized(): void
    {
        // Don't proceed if we are in the admin plugin
        if ($this->isAdmin()) {
            $this->enable([
                'onBlueprintCreated' => ['onBlueprintCreated', 0]
            ]);
            return;
        }

        // Enable the main events we are interested in
        $this->enable([
            'onTwigTemplatePaths' => ['onTwigTemplatePaths', 0],
            'onPageInitialized'   => ['onPageInitialized', 0]
        ]);
    }

    /**
     * Add Blueprint logic for Admin
     *
     * @param Event $event
     */
    public function onBlueprintCreated(Event $event): void
    {
        $newtype = $event['type'];

        if (strpos($newtype, 'modular/') === 0) {
            return;
        }

        $blueprint = $event['blueprint'];
        if ($blueprint->get('form/fields/tabs', null, '/')) {
            $current_blueprint = new \Grav\Common\Data\Blueprint('plugin://seo-auto-tag/blueprints/page.yaml');
            $current_blueprint->init();
            $blueprint->extend($current_blueprint, true);
        }
    }

    /**
     * Add our templates folder to the Twig template paths
     */
    public function onTwigTemplatePaths(): void
    {
        $this->grav['twig']->twig_paths[] = __DIR__ . '/templates';
    }

    /**
     * Generate SEO tags
     *
     * @param Event $event
     */
    public function onPageInitialized(Event $event): void
    {
        $page = $this->grav['page'];
        if (!$page || !$page->routable()) {
            return;
        }

        $twig = $this->grav['twig'];

        // Process the logic template and inject it into the page head using addInlineHtml as per requirement
        $html = $twig->processTemplate('partials/seo-auto-tag.html.twig', ['page' => $page]);
        $this->grav['assets']->addInlineHtml($html);
    }
}
