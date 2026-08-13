# Ultimate SEO URL (USU) — Legacy Project

> [!IMPORTANT]
> This repository is maintained for existing installations and backward compatibility.
>
> For **NEW** phpBB installations, do not install USU.
>
> Use the new **phpBB SEO Framework** instead:  
> 🔗 [https://github.com/phpbb-seo/seo-framework](https://github.com/phpbb-seo/seo-framework)

* **Legacy / Maintenance Status**: USU remains available as a stable compatibility project for existing websites that depend on its historical URL structure.
* **Existing Installations**: Existing USU users should **NOT** uninstall or attempt automatic migration.
* **New Installations**: New phpBB 3.3.x boards should install **phpBB SEO Framework**, the actively developed next-generation SEO platform.

---

## Successor: phpBB SEO Framework

[**phpBB SEO Framework**](https://github.com/phpbb-seo/seo-framework) is the modern successor to Ultimate SEO URL for new phpBB installations.

Key features of phpBB SEO Framework (Lite Edition):
* **SEO-Friendly Permalinks**: Customizable URL pattern templates for forums, topics, members, and usergroups.
* **Persistent Slug Index**: Framework-owned persistent slug storage providing fast and deterministic URL resolution without modifying phpBB core tables.
* **Canonical URLs & Automatic 301 Redirects**: Seamlessly normalizes legacy native URLs (`viewtopic.php?t=123`) and historical stale slugs.
* **Titles & Meta Engine**: Pattern-driven meta titles and clean plain-text description normalization.
* **Scalable XML Sitemap Suite**: Keyset-based streaming architecture with strict Anonymous ACL protection and **zero deep SQL offset overhead**.
* **Multilingual / Unicode Support**: Native UTF-8 slug generation for Persian, Arabic, Cyrillic, Latin, and CJK alphabets.
* **Modern ACP Interface**: Responsive administration dashboard with live crawl statistics and preview tools.
* **Zero-SQL `append_sid` Hot Path**: Zero database queries during runtime outbound link rewriting.

* **Official Website**: [https://www.phpbbseo.ir/](https://www.phpbbseo.ir/)
* **GitHub Repository**: [https://github.com/phpbb-seo/seo-framework](https://github.com/phpbb-seo/seo-framework)

*(Note: USU and phpBB SEO Framework use different internal architectures and are not drop-in compatible).*

---

## Features (Historical USU)

* Full SEO-friendly URL rewriting preserving original USU URL patterns
* Canonical URL generation
* Automatic duplicate URL detection and 301 redirects
* Forum, Topic, User, and Search URL rewriting
* Advanced, Mixed, and Simple rewrite modes
* High-performance URL caching
* Compatible with phpBB 3.3.x and PHP 8.4

---

## Compatibility

| Component | Version                         |
| --------- | ------------------------------- |
| phpBB     | 3.3.x                           |
| PHP       | 8.4                             |
| License   | GNU General Public License v2.0 |

---

## Existing Installations

> [!NOTE]
> USU is no longer recommended for new phpBB installations. The documentation below is provided solely for administrators maintaining an existing USU-powered board.
>
> For new installations, please install [phpBB SEO Framework](https://github.com/phpbb-seo/seo-framework).

### Upgrading / Maintaining Existing Boards
1. Back up your database and existing extension files.
2. Unpack the extension into:
   ```
   ext/phpbbseo/usu/
   ```
3. In the phpBB Administration Control Panel (ACP), navigate to **Customise** &raquo; **Manage Extensions**.
4. Ensure **Ultimate SEO URL** is enabled.
5. Purge the phpBB cache.
6. Verify that your URL rewriting rules in `.htaccess` remain active.

---

## Development & Maintenance Philosophy

This repository represents the **compatibility and maintenance branch** of the classic Ultimate SEO URL extension.

Its primary objectives are:
* Preserve backward compatibility for historical URL formats
* Maintain stable URL generation on modern PHP versions
* Provide long-term stability for existing communities

Active development of new features (XML Sitemaps, Metadata engines, OpenGraph, Schema.org) is conducted exclusively on the [phpBB SEO Framework](https://github.com/phpbb-seo/seo-framework) platform.

---

## Maintained by phpBB SEO

* **Official Website**: [https://www.phpbbseo.ir/](https://www.phpbbseo.ir/)
* **Modern SEO Framework**: [https://github.com/phpbb-seo/seo-framework](https://github.com/phpbb-seo/seo-framework)

---

## License

This project is licensed under the **GNU General Public License v2.0 (GPL-2.0)**.  
https://opensource.org/licenses/GPL-2.0
