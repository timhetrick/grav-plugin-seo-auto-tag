SEO Auto-Tag for Grav CMS
A lightweight, libre, and automated metadata engine for Grav CMS.

🌿 The Philosophy
SEO Auto-Tag was born out of a desire for a high-performance, open-source alternative to premium SEO suites. While tools like SEO Magic offer powerful features, many developers simply need an automated way to handle Meta, OpenGraph, and Twitter tags without the $75 price tag or external service dependencies.

This plugin follows the Unix Philosophy: do one thing, and do it well. It automates the "tedious" parts of SEO—summarizing content and picking social images—while staying entirely out of your way.

✨ Key Features
Automatic Summarization: Automatically generates <meta name="description"> by stripping HTML/Markdown and truncating your content to 155 characters.

Smart Social Images: Automatically identifies the first image in your page folder to use as an og:image. No more broken thumbnails on Discord, Slack, or Facebook.

Zero-Config, Total Control: Works out of the box with "Magic" fallbacks, but provides a dedicated SEO Tab in the Grav Admin for manual overrides.

Performance Focused: Unlike crawlers that run in the background, this plugin uses Grav's native lifecycle events to inject metadata instantly with zero database overhead.

Libre & Lightweight: No external API calls, no "Pro" upsells, and no bloated dashboard. Just clean, valid HTML tags.

🚀 How the "Magic" Works
The plugin uses a hierarchical fallback system to ensure your pages never have empty metadata:

Manual Override: Checks for custom values in the Admin "SEO Auto-Tag" tab.

Page Metadata: If empty, checks the standard Grav Page Metadata.

The Auto-Tag: If still empty, it scrapes the first 155 characters of the page content.

The Image Search: It looks for the first image in the page folder; if none exists, it falls back to your theme's default brand image.

🛠 Installation
GPM Installation (Coming Soon)
Bash
bin/gpm install seo-auto-tag
Manual Installation
Download the zip version of this repository and unzip it.

Rename the folder to seo-auto-tag.

Move the folder to user/plugins/seo-auto-tag.

Run composer update inside the plugin folder to initialize the autoloader.
