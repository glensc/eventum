'use strict';

var fs = require('fs');
var path = require('path');
var webpack = require('webpack');

var ROOT_PATH = path.resolve(__dirname, '../..');
var VENDOR_PATH = path.join(ROOT_PATH, 'vendor');
var HTDOCS_PATH = path.join(ROOT_PATH, 'htdocs');
var COMPONENTS_PATH = path.join(HTDOCS_PATH, 'components');

var IS_PRODUCTION = process.env.NODE_ENV === 'production';

var config = {
    // context: path.join(ROOT_PATH, 'res/assets/js'),
    context: ROOT_PATH,
    entry: {
        // main: './htdocs/js/webpack.js',
        main: '~/main.js',
        // jquery: './res/assets/js/jquery.js',
        components: '~/components.js',
    },

    output: {
        path: path.join(ROOT_PATH, 'htdocs/assets'),
        publicPath: '/assets/',
        filename: IS_PRODUCTION ? '[name].[chunkhash].bundle.js' : '[name].bundle.js'
    },

    plugins: [
        // fix legacy jQuery plugins which depend on globals
        // https://webpack.js.org/plugins/provide-plugin/#use-jquery
        // new webpack.ProvidePlugin({
        //     $: 'jquery',
        //     jQuery: 'jquery',
        // }),
    ],

    externals: {
        // $: '$',
        // jquery: 'jQuery',
        eventum: 'Eventum',
    },

    resolve: {
        extensions: ['.js'],
        alias: {
            '~': path.join(ROOT_PATH, 'res/assets/js'),
            // 'jquery': path.join(COMPONENTS_PATH, 'jquery/jquery.js'),
            'jquery': '~/jquery.js',
            'components': COMPONENTS_PATH,
            'htdocs': HTDOCS_PATH,
        }
    }
};

module.exports = config;
