<template>
    <div class="pk-grid-large pk-width-sidebar-large" uk-grid>
        <div class="pk-width-content">
            <div class="uk-margin">
                <label for="form-title" class="uk-form-label">{{ "Title" | trans }}</label>
                <v-input id="form-title" type="text" name="title" placeholder="Enter Title" view="class: uk-width-expand uk-form-large uk-input" rules="required" v-model="widget.title" message="Title cannot be blank." />
            </div>

            <div class="uk-margin">
                <label class="uk-form-label">{{ "Section Main Big Title" | trans }}</label>
                <div class="uk-form-controls">
                    <input type="text" class="uk-input" v-model="widget.data.main_big_title" />
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label">{{ "Section Main Small Title" | trans }}</label>
                <div class="uk-form-controls">
                    <input type="text" class="uk-input" v-model="widget.data.main_small_title" />
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label">{{ 'Main Content' | trans }}</label>
                <div class="uk-form-controls">
                    <v-editor v-model="widget.data.content" :options="{markdown: true, height: 100}" />
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label">{{ 'Handwrite Content' | trans }}</label>
                <div class="uk-form-controls">
                    <v-editor v-model="widget.data.hand_content" :options="{markdown: true, height: 100}" />
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label">{{ "Main Image" | trans }}</label>
                <div class="uk-form-controls">
                    <v-multi-finder v-model="widget.data.main_image" :image.sync="widget.data.main_image" class="pk-image-max-height" />
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label">{{ "1 - Image" | trans }}</label>
                <div class="uk-form-controls">
                    <v-multi-finder v-model="widget.data.image_1" :image.sync="widget.data.image_1" class="pk-image-max-height" />
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label">{{ "2 - Image" | trans }}</label>
                <div class="uk-form-controls">
                    <v-multi-finder v-model="widget.data.image_2" :image.sync="widget.data.image_2" class="pk-image-max-height" />
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label">{{ "3 - Image" | trans }}</label>
                <div class="uk-form-controls">
                    <v-multi-finder v-model="widget.data.image_3" :image.sync="widget.data.image_3" class="pk-image-max-height" />
                </div>
            </div>
        </div>
        <div class="pk-width-sidebar">
            <component :is="'template-settings'" :widget.sync="widget" :config.sync="config" :form="form" />
            <div class="uk-margin">
                <div class="uk-form-controls uk-form-controls-text">
                    <p class="uk-margin-small">
                        <label>
                            <input type="checkbox" class="uk-checkbox" v-model="widget.data.markdown" number />
                            <span class="uk-margin-small-left">
                                {{ "Markdown" | trans }}
                            </span>
                        </label>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
const ImageWidget = {
    section: {
        label: "Settings",
    },

    props: ["widget", "config", "form"],

    inject: ["$components"],

    replace: false,

    created() {
        _.extend(this.$options.components, this.$components);

        if (!this.widget.data["slideshow"]) {
            this.widget.data = _.merge(
                {
                    slideshow: [],
                },
                this.widget.data
            );
        }
    },

    methods: {
        addItem() {
            this.widget.data.slideshow.push({
                title: "",
                image: {
                    src: null,
                    alt: null,
                },
                video: "",
                handwriting: "",
                desc: "",
            });
        },

        deleteItem(id) {
            let slideshow = _.filter(this.widget.data.slideshow, (value, key) => {
                if (key != id) {
                    return value;
                }
            });
            this.widget.data.slideshow = slideshow;
        },
    },
};

export default ImageWidget;

window.Widgets.components["leylada-image.settings"] = ImageWidget;
</script>
