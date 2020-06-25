const Path = require('path');
const webpack = require('webpack')
const {CleanWebpackPlugin} = require('clean-webpack-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');

module.exports = {
    entry: {
        app: Path.resolve(__dirname, '../webrootsrc/app.js')
    },
    output: {
        path: Path.join(__dirname, '../webroot'),
        filename: 'js/[name].js'
    },
    optimization: {
        splitChunks: {
            cacheGroups: {
                /*
                commons: {
                  name: 'commons',
                  chunks: 'initial',
                  minChunks: 2
                },
                */
                // Group vendor par defaut
                vendor: {
                    test: /[\\/]node_modules[\\/]|vendors|[\\/]libs[\\/]/,
                    //test: './src/styles/vendors.scss',
                    // you may add 'vendor.js' here if you want to
                    // test: /bootstrap/,
                    // Nom du fichier en sortie
                    name: 'vendors',
                    chunks: 'all',
                    enforce: true
                    // enforce: true
                }
            }
        }
    },
    plugins: [
        // new CleanWebpackPlugin(),
        new CopyWebpackPlugin([
            {from: Path.resolve(__dirname, '../webrootsrc/public'), to: ''}
        ]),
        new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery',
            'window.jQuery': 'jquery',
            tether: 'tether',
            Tether: 'tether',
            'window.Tether': 'tether',
            Popper: ['popper.js', 'default'],
            Alert: 'exports-loader?Alert!bootstrap/js/dist/alert',
            Button: 'exports-loader?Button!bootstrap/js/dist/button',
            Carousel: 'exports-loader?Carousel!bootstrap/js/dist/carousel',
            Collapse: 'exports-loader?Collapse!bootstrap/js/dist/collapse',
            Dropdown: 'exports-loader?Dropdown!bootstrap/js/dist/dropdown',
            Modal: 'exports-loader?Modal!bootstrap/js/dist/modal',
            Popover: 'exports-loader?Popover!bootstrap/js/dist/popover',
            Scrollspy: 'exports-loader?Scrollspy!bootstrap/js/dist/scrollspy',
            Tab: 'exports-loader?Tab!bootstrap/js/dist/tab',
            Tooltip: 'exports-loader?Tooltip!bootstrap/js/dist/tooltip',
            Util: 'exports-loader?Util!bootstrap/js/dist/util'
        })
    ],
    resolve: {
        alias: {
            '~': Path.resolve(__dirname, '../webrootsrc'),
            node_modules: Path.resolve(__dirname, '../node_modules')
        }
    },
    module: {
        rules: [
            {
                test: /\.mjs$/,
                include: /node_modules/,
                type: 'javascript/auto'
            },
            {
                test: /\.(ico|jpg|jpeg|png|gif|eot|otf|webp|svg|ttf|woff|woff2)(\?.*)?$/,
                use: {
                    loader: 'file-loader',
                    options: {
                        name: '[path][name].[ext]'
                    }
                }
            },
        ]
    }
};
