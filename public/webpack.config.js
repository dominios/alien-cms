'use strict';

// Modules
var webpack = require('webpack');
// var autoprefixer = require('autoprefixer');
// var HtmlWebpackPlugin = require('html-webpack-plugin');
// var ExtractTextPlugin = require('extract-text-webpack-plugin');
// var CopyWebpackPlugin = require('copy-webpack-plugin');

/**
 * Env
 * Get npm lifecycle event to identify the environment
 */
// var ENV = process.env.npm_lifecycle_event;
// var isTest = ENV === 'test' || ENV === 'test-watch';
// var isProd = ENV === 'build';

module.exports = function createWebpackConfig () {

    /**
     * Config
     * Reference: http://webpack.github.io/docs/configuration.html
     * This is the object where all configuration gets set
     */
    var config = {};

    config.entry = {
        app: './src/js/cms.js'
    };

    config.vendor = [
        'angular'
    ];

    config.output = {
        path: __dirname + '/build',
        filename: 'bundle.js'
    };

    config.module = {
        preLoaders: [],
        loaders: [{
            // JS
            // use babel for transcription from ES6
            test: /\.js$/,
            loader: 'babel',
            exclude: /node_modules/
        }, {
            // ASSETS
            test: /\.(png|jpg|jpeg|gif|svg|woff|woff2|ttf|eot)$/,
            loader: 'file'
        }, {
            // HTML
            // Allows loading html through js
            test: /\.html$/,
            loader: 'raw'
        }]
    };

    config.plugins = [];

    return config;

}();