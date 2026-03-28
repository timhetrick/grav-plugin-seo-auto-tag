# SEO Auto-Tag Plugin

The **SEO Auto-Tag** plugin for [Grav CMS](https://github.com/getgrav/grav) automatically generates SEO and social media metadata for every page. It uses an intelligent fallback system — from manual overrides → page metadata → auto-generated content — so your site always looks polished when shared on Google, Facebook, Twitter/X, Slack, and more.

## Features

- **Meta description** with smart fallback: manual override → page metadata → auto-generated from content (155 chars)
- **OpenGraph tags** (`og:title`, `og:description`, `og:image`, `og:type`, `og:url`, `og:site_name`, `og:locale`)
- **Twitter Card tags** (`summary_large_image` when an image is available, `summary` otherwise)
- **Canonical URL** (`<link rel="canonical">`) on every routable page
- **Robots meta tag** — per-page `noindex`/`nofollow` control from the admin
- **Title + Site Name** appending with a configurable separator (e.g. `Page Title | My Site`)
- **JSON-LD structured data** — outputs `WebPage` or `Article` schema for better search engine understanding
- **Image fallback chain**: manual override → first page image → default brand image (configurable)
- **Admin integration** — adds an "SEO Auto-Tag" tab to every page editor with fields for title, description, image, and robots overrides
- **Multi-language support** — translations included for English, French, and German

## Installation

### GPM Installation (Preferred)

```bash
bin/gpm install seo-auto-tag
```

### Manual Installation

Download the zip from [GitHub](https://github.com/timhetrick/grav-plugin-seo-auto-tag), extract it to `/your/site/grav/user/plugins/`, and rename the folder to `seo-auto-tag`.

### Admin Plugin

Browse **Plugins → Add** and search for "SEO Auto-Tag".

## Configuration

Copy `user/plugins/seo-auto-tag/seo-auto-tag.yaml` to `user/config/plugins/seo-auto-tag.yaml` and edit that copy:

```yaml
enabled: true
append_site_name: true      # Append site name to SEO title
title_separator: ' | '      # Separator between page title and site name
default_brand_image: ''      # Fallback image path (relative to user://images)
json_ld: true                # Output JSON-LD structured data
```

All settings are also configurable from the Admin Plugin under **Plugins → SEO Auto-Tag**.

## Per-Page Overrides

Each page has an **SEO Auto-Tag** tab in the admin editor with the following fields:

| Field | Description |
|---|---|
| **SEO Title Override** | Custom title for search engines and social media |
| **SEO Description Override** | Custom meta description (max 160 characters) |
| **SEO Image Override** | Custom image for OpenGraph/Twitter cards |
| **Robots** | Control indexing: Default, No Index, No Follow, or both |

## Fallback Logic

### Title
1. `header.seo.title` (manual override)
2. `page.title` (page title)
3. Site name is appended if `append_site_name` is enabled

### Description
1. `header.seo.description` (manual override)
2. `page.metadata.description` (page-level metadata)
3. Auto-generated: first 155 characters of page content (stripped of HTML)

### Image
1. `header.seo.image` (manual override)
2. First image in the page's media folder
3. `default_brand_image` from plugin config

## Output

The plugin injects the following into every routable page's `<head>`:

- `<link rel="canonical">` 
- `<meta name="description">`
- `<meta name="robots">` (if set)
- OpenGraph meta tags
- Twitter Card meta tags
- JSON-LD `<script>` block (if enabled)

> **Note:** The plugin does **not** output a `<title>` tag — your theme handles that. This avoids duplicate title issues.

## License

MIT — see [LICENSE](LICENSE) for details.
