const VueLoaderPlugin = require("vue-loader/lib/plugin");
const path = require("path");

module.exports = {
    entry: {
        app: "./app/views/app",
        //fake: "./app/views/fake",
        "node-theme": "./app/components/node-theme.vue",
        "widget-theme":"./app/components/widget-theme.vue",
        "site-theme":"./app/components/site-theme.vue"
    },
    output: {
        path: path.resolve(__dirname, "./app/bundle"),
        filename: "[name].js",
    },
    module: {
        rules: [
            {
                test: /\.vue$/,
                loader: "vue-loader",
            },
            {
                test: /\.js$/,
                loader: "babel-loader",
            },
            {
                test: /\.less$/,
                use: [{ loader: "style-loader" }, { loader: "css-loader" }, { loader: "less-loader" }],
            },
        ],
    },
    plugins: [new VueLoaderPlugin()],
};
