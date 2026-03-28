# v1.1.0
## 2026-03-28

1. **Bug Fixes**
   * Removed duplicate `<title>` tag — themes handle this
   * Fixed `og:type` to use `website` for the homepage and `article` for all other pages
   * Normalized image URL resolution — all image fallbacks now produce absolute URLs consistently

2. **New Features**
   * Added `<link rel="canonical">` on every routable page
   * Added `og:site_name` and `og:locale` meta tags
   * Added per-page **robots** meta tag control (`noindex`, `nofollow`) via the admin editor
   * Added configurable **title + site name** appending with a custom separator
   * Added **JSON-LD structured data** output (`WebPage` for homepage, `Article` for other pages)

3. **Admin / Config**
   * Changed `default_brand_image` to a filepicker for better UX
   * Added new plugin settings: Append Site Name, Title Separator, JSON-LD toggle
   * Added description field max-length validation (160 characters)
   * Organized plugin settings into logical sections

4. **Translations**
   * Added all new strings for English, French, and German

5. **Documentation**
   * Rewrote README with full feature list, configuration guide, and fallback logic docs

# v1.0.0
## Initial release
