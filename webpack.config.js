const path = require('path');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");
const TerserPlugin = require("terser-webpack-plugin");

const JS_DIR = path.resolve(__dirname, 'public/js/page');

const CSS_DIR = path.resolve(__dirname, 'public/css/page');

const NODE_MODULE = path.resolve(__dirname, 'node_modules');
// const JS_DIR = './public/js/page';
// const BUILD_DIR = '/public/js/page_compile';



const entry = {
    main: [
        JS_DIR + '/custom.js',
        CSS_DIR + '/home.scss',
        CSS_DIR + '/home.amp.scss',
    ]
};

const output = {
    path: path.resolve(__dirname),
    filename: 'public/js/page_compile/[name].min.js'
};

const rules = [
    {
        test: /\.js$/,
        include: NODE_MODULE,
        exclude: /(node_modules)/,
        // Loaders enable us to bundle the static assets.
        // loader: 'babel-loader', // Allows for transpiling JS files using babel & webpack.
        use: [
            {
                loader: 'file-loader',
                options: { outputPath: 'public/js/page_compile' , name: '[name].min.js'}
            },
            "babel-loader", // 1. Turns js into js
        ],
    },
    {
        test: /(?:(?!(-|\.)amp)[\w\.-]{4}|^[\w\.-]{1,3})\.(scss|sass)$/,
        exclude: NODE_MODULE,
        include: path.resolve(__dirname),
        use: [
            {
                loader: 'file-loader',
                options: { outputPath: 'public/css/page_compile' , name: '[name].min.css'}
            },
            "sass-loader", // 1. Turns sass into css
        ],
    },
    {
        test: /^.+\.amp\.(scss|sass)$/,
        exclude: NODE_MODULE,
        include: path.resolve(__dirname),
        use: [
            {
                loader: 'file-loader',
                options: { outputPath: 'public/css/page_compile' , name: '[name].min.css'}
            },
            {
                loader: 'sass-loader',
                options: {
                    sassOptions : {
                        outputStyle: 'compressed'
                    }
                }
            },
            
        ],
    }
];
module.exports = () => ({
    entry: entry,
    output: output,
    devtool: false, // Don't output any .map source files, otherwise 'source-map'.
    module: {
        rules: rules,
    },
    optimization : {
        minimizer: [
            new CssMinimizerPlugin(),
            new TerserPlugin(),
        ],
        minimize: true,
    },
    plugins: [
        new MiniCssExtractPlugin(),
    ],
});