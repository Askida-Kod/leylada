const VueLoaderPlugin = require("vue-loader/lib/plugin");
const path = require("path");

module.exports = {
    entry: {
        app: "./app/views/app",
        "node-theme": "./app/components/node-theme.vue",
        "widget-theme": "./app/components/widget-theme.vue",
        "site-theme": "./app/components/site-theme.vue",
        "hero-widget": "./app/widgets/hero-widget.vue",
        "grid-widget": "./app/widgets/grid-widget.vue",
        "image-widget": "./app/widgets/image-widget.vue",
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
