<template>
    <div class="pk-grid-large pk-width-sidebar-large" uk-grid>
        <div class="pk-width-content">
            <div class="uk-margin">
                <label for="form-title" class="uk-form-label">{{ "Title" | trans }}</label>
                <v-input id="form-title" type="text" name="title" placeholder="Enter Title" view="class: uk-width-expand uk-form-large uk-input" rules="required" v-model="widget.title" message="Title cannot be blank." />
            </div>

            <div class="uk-margin">
                <label class="uk-form-label">{{ "Section Title" | trans }}</label>
                <div class="uk-form-controls">
                    <input type="text" class="uk-input" v-model="widget.data.title" />
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label">{{ "Section Description" | trans }}*</label>
                <div class="uk-form-controls">
                    <textarea v-model="widget.data.desc" class="uk-textarea"></textarea>
                </div>
            </div>

            <div class="uk-margin">
                <button @click.prevent="addItem" class="uk-button uk-button-primary">{{ "Add Item" | trans }}</button>
            </div>

            <div class="uk-margin">
                <ul uk-accordion="multiple:true">
                    <li v-for="(slide, id) in widget.data.slideshow" :key="id">
                        <a class="uk-card uk-card-secondary uk-padding-small uk-accordion-title uk-width-expand" href="#">
                            <div class="uk-flex uk-flex-middle uk-flex-between">
                                <span v-if="!slide.title">{{ id + 1 }}. Item</span>
                                <span v-else>{{ slide.title }}</span>
                                <span>
                                    <button @click.prevent="deleteItem(id)" class="uk-button uk-button-danger uk-button-small">{{ "Delete" | trans }}</button>
                                </span>
                            </div>
                        </a>
                        <div class="uk-accordion-content">
                            <div class="uk-margin">
                                <label class="uk-form-label">{{ "Title" | trans }}*</label>
                                <div class="uk-form-controls">
                                    <input type="text" class="uk-input" v-model="slide.title" required />
                                </div>
                            </div>

                            <div class="uk-margin">
                                <label class="uk-form-label">{{ "Description" | trans }}</label>
                                <div class="uk-form-controls">
                                    <textarea class="uk-textarea" v-model="slide.desc"></textarea>
                                </div>
                            </div>

                            <div class="uk-margin">
                                <label class="uk-form-label">{{ "Image" | trans }}</label>
                                <div class="uk-form-controls">
                                    <v-multi-finder v-model="slide.image" :image.sync="slide.image" class="pk-image-max-height" />
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
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
const GridWidget = {
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

export default GridWidget;

window.Widgets.components["leylada-grid.settings"] = GridWidget;
</script>
