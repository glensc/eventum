const mix = require('laravel-mix');
const collect = require('collect.js');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.setPublicPath('htdocs');

mix.styles([
    'htdocs/css/main.css',
    'htdocs/css/page.css',
], 'htdocs/css/all.css');
mix.styles([
    'htdocs/components/font-awesome/css/font-awesome.css',
    'htdocs/components/jquery-ui/themes/base/all.css',
    'htdocs/components/jquery-chosen/chosen.css',
    'htdocs/components/dropzone/dist/basic.css',
], 'htdocs/css/components.css');

mix.copy('vendor/components/jquery-chosen/*.png', 'htdocs/css');
mix.copy('vendor/fortawesome/font-awesome/fonts', 'htdocs/fonts');

mix.scripts([
    'htdocs/js/main.js',
    'htdocs/js/page.js',
], 'htdocs/js/all.js');

mix.js('res/js/app.js', 'htdocs/js/app.js');

mix.scripts([
    'htdocs/components/jquery/jquery.js',
    'htdocs/components/jquery-blockui/jquery.blockUI.js',
    'htdocs/components/form/src/jquery.form.js',
    'htdocs/components/jquery-cookie/jquery.cookie.js',
    'htdocs/components/jquery-ui/ui/core.js',
    'htdocs/components/jquery-ui/ui/datepicker.js',
    'htdocs/components/jquery-ui/ui/widget.js',
    'htdocs/components/jquery-ui/ui/mouse.js',
    'htdocs/components/jquery-ui/ui/progressbar.js',
    'htdocs/components/jquery-ui/ui/position.js',
    'htdocs/components/jquery-ui/ui/menu.js',
    'htdocs/components/jquery-ui/ui/selectmenu.js',
    'htdocs/components/jquery-ui/ui/sortable.js',
    'htdocs/components/jquery-chosen/chosen.jquery.js',
    'htdocs/components/dropzone/dist/dropzone.js',
    'htdocs/components/autosize/dist/autosize.js',
    'htdocs/components/jquery-timeago/jquery.timeago.js',
    'htdocs/components/filereader.js/filereader.js',
    'htdocs/components/garlicjs/js/garlic.min.js',
    'htdocs/components/cmd-ctrl-enter/src/cmd-ctrl-enter.js',
], 'htdocs/js/components.js');

mix.version([
    'htdocs/css/all.css',
    'htdocs/js/all.js',
]);

if (mix.inProduction()) {
    mix.disableNotifications();
}

/**
 * Update manifest to remove leading slash of key => value pairs
 * @author Elan Ruusamäe <glen@pld-linux.org>
 * @see https://github.com/symfony/symfony/issues/36234
 */
mix.extend('updateManifestPathsRelative', (config) => {
    config.plugins.push(new class {
        apply(compiler) {
            compiler.plugin('done', () => {
                const manifest = {};
                collect(Mix.manifest.get()).each((value, key) => {
                    key = this.normalizePath(key);
                    value = this.normalizePath(value);
                    manifest[key] = value;
                });
                Mix.manifest.manifest = manifest;
                Mix.manifest.refresh();
            });
        }

        /**
         * @param {string} filePath
         */
        normalizePath(filePath) {
            if (filePath.startsWith('/')) {
                filePath = filePath.substring(1);
            }

            return filePath;
        }
    })
});

mix.updateManifestPathsRelative();
