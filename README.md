# Ultimate SEO URL Extension for phpBB

A modernized and fully compatible version of the classic **Ultimate SEO URL (USU)** extension for **phpBB 3.3.x**.

This project preserves the original URL generation behavior while modernizing the codebase for current PHP versions and improving long-term maintainability.

---

## Features

* Full SEO-friendly URL rewriting
* Preserves the original USU URL structure
* Canonical URL generation
* Automatic duplicate URL detection and 301 redirects
* Forum, Topic, User and Search URL rewriting
* Advanced, Mixed and Simple rewrite modes
* High-performance URL caching
* Backward-compatible URL generation
* Fully compatible with **phpBB 3.3.x**
* Fully compatible with **PHP 8.4**

---

## Project Goals

This project is focused on preserving the proven behavior of the original USU extension while bringing the implementation up to modern development standards.

The modernization includes:

* PHP 8.4 compatibility
* phpBB 3.3 compatibility
* Strict typing
* Improved code quality
* Better maintainability
* Security improvements
* Performance optimizations
* Long-term maintainability

The external behavior, URL format, and rewrite logic remain fully compatible with the original implementation.

---

## Compatibility

| Component | Version                         |
| --------- | ------------------------------- |
| phpBB     | 3.3.x                           |
| PHP       | 8.4                             |
| License   | GNU General Public License v2.0 |

---

## Installation

1. Download the latest release.
2. Extract the package into:

```
ext/phpbbseo/usu/
```

3. Navigate to:

```
Administration Control Panel
→ Customise
→ Manage Extensions
```

4. Enable **Ultimate SEO URL**.

5. Purge the phpBB cache.

---

## Upgrading

If you are upgrading from an earlier version of USU:

* Back up your database.
* Back up your existing extension files.
* Replace the extension with the new version.
* Purge the phpBB cache.
* Verify that your URL rewriting rules are still active.

Existing SEO-friendly URLs remain compatible.

---

## Bug Reports

If you discover a bug or regression, please open an issue on the project's GitHub repository with detailed reproduction steps.

Please include:

* phpBB version
* PHP version
* Web server (Apache / Nginx)
* Rewrite configuration
* Steps to reproduce the issue

---

## Development Philosophy

This repository represents the **compatibility and maintenance branch** of the Ultimate SEO URL extension.

Its primary objectives are:

* Preserve backward compatibility
* Maintain stable URL generation
* Support modern PHP versions
* Improve internal architecture without changing public behavior

Future SEO capabilities such as XML Sitemaps, Schema.org, Open Graph, Robots management, SEO Health, and other advanced features are planned for a separate modular project built on a dedicated SEO Framework.

---

## License

This project is distributed under the **GNU General Public License v2.0**.

https://opensource.org/licenses/GPL-2.0
