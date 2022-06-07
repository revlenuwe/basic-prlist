const webpack = require("webpack");
const { VueLoaderPlugin } = require("vue-loader");
const path = require("path");

//Simple version

module.exports = {
    entry: {
        main: "./public/assets/main.js",
    },
    output: {
        path: path.resolve(__dirname, "./public/dist"),
        filename: "main.bundle.js",
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: {
                    loader: "babel-loader",
                },
            },
            {
                test: /\.vue$/,
                loader: "vue-loader",
            },
        ],
    },
    plugins: [
        new VueLoaderPlugin(),

        //
        new webpack.DefinePlugin({
            __VUE_OPTIONS_API__: true,
            __VUE_PROD_DEVTOOLS__: false,
        }),
    ],
    resolve: {
        alias: {
            'vue': 'vue/dist/vue.esm-bundler.js'
        },
        extensions: [".js", ".vue", ".ts", ".tsx"],
        modules: [
            'node_modules',
        ],
    }
};