# Statamic Tailwind Dev Mode

> A simple tag for embedding the Tailwind CDN, Tailwind config, and site css when the site is in a dev environment for Statamic 4+

## Features

This addon allows you to use a `{{ tailwind_dev_mode }}` tag in the `<head>` to not only include Tailwind's CDN url but also include the project's `tailwind.config.js` and `site.css` inline in the browser.
This means that you can make any changes you want in browser and still have all your customizations from your Tailwind config and site css.

This tag is automatically turned off when the environment is set to `production` in the `.env` of the project.

## How to Install

Run the following command from your project root:

``` bash
composer require godismyjudge95/statamic-tailwind-dev-mode
```

## How to Use

Simply use the Tailwind dev mode tag in the `<head>`:
```
{{ tailwind_dev_mode }}
```

Outputs:
```
<script src="https://cdn.tailwindcss.com"></script>
<script>
// Your tailwind.config.js here
</script>
<style type="text/tailwindcss">
/** Your resources/css/site.css **/ 
</style>
```

If your css path is different than `resources/css/site.css` you can pass the `css` parameter:
```
{{ tailwind_dev_mode css="resources/css/tailwind.css" }}
```
