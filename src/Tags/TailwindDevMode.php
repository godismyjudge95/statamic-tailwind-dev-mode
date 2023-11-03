<?php

namespace Godismyjudge95\StatamicTailwindDevMode\Tags;

use Statamic\Tags\Tags;

class TailwindDevMode extends Tags
{
    public function index()
    {
        if (config('app.env') === 'production' || request()->has('no_tailwind')) {
            return '';
        }

        try {
            $tailwind_config = file_get_contents(base_path('tailwind.config.js'));
            $tailwind_config = preg_replace('/^const\s+defaultTheme\s*=\s*require\([\'"]tailwindcss\/defaultTheme[\'"]\);?$/m', '', $tailwind_config);
            $tailwind_config = preg_replace('/^module\.exports\s*=\s*{/m', "tailwind.config = {", $tailwind_config);
            $tailwind_config = preg_replace('/defaultTheme\./', 'tailwind.defaultTheme.', $tailwind_config);
            $tailwind_config = preg_replace('/\n\s+plugins: \[.*?\],/ms', '', $tailwind_config);
            $tailwind_config = preg_replace('/\n\s+content: \[.*?\],/ms', '', $tailwind_config);
        } catch (\Exception $e) {
            $tailwind_config = '';
        }

        try {
            $site_css_path = $this->params->get('css', 'resources/css/site.css');
            $site_css = file_get_contents(base_path($site_css_path));
            $site_css = preg_replace('/@import \'tailwindcss\/.*?;\n/ms', '', $site_css);
        } catch (\Exception $e) {
            $site_css = '';
        }

        return <<<HTML
            <script src="https://cdn.tailwindcss.com"></script>
            <script>
                {$tailwind_config};
            </script>
           <style type="text/tailwindcss">
                {$site_css}
           </style>
        HTML;
    }
}
