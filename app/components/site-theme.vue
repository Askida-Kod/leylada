<template>
    <div>
        <div class="uk-margin uk-flex uk-flex-middle uk-flex-between uk-flex-wrap">
            <div>
                <h2 class="uk-h3 uk-margin-remove">
                    {{ "Leylada Settings" | trans }}
                </h2>
            </div>
            <div class="uk-margin-small">
                <button class="uk-button uk-button-primary" type="submit">
                    {{ "Save" | trans }}
                </button>
            </div>
        </div>

        <div class="uk-form uk-form-horizontal">
            <div class="uk-margin" v-for="(social, id) in config.socials" :key="id">
                <label class="uk-form-label">{{ id | trans }} Url</label>
                <div class="uk-form-controls">
                    <input type="url" class="uk-input" v-model="config.socials[id]" placeholder="https://example.com" />
                </div>
            </div>
        </div>

        <div class="uk-margin-large-top">
            <div class="uk-display-block">
                <h3>{{ "Modal Page Settings" | trans }}</h3>
            </div>
        </div>

        <div class="uk-margin">
            <label class="uk-form-label">{{ "Modal page title" | trans }}</label>
            <div class="uk-form-controls">
                <input type="text" class="uk-input" v-model="config.modal.title">
            </div>
        </div>

        <div class="uk-margin">
            <label class="uk-form-label">{{ "Modal page description" | trans }}</label>
            <div class="uk-form-controls">
                <textarea class="uk-textarea" v-model="config.modal.desc"></textarea>
            </div>
        </div>

        <div class="uk-clearfix">
            <div class="uk-display-block">
                <ul class="uk-align-right uk-grid uk-grid-small" uk-grid>
                    <li><a @click.prevent="addImage" uk-icon="icon:plus-circle;ratio:1.5" :title="'Add a new image' | trans" uk-tooltip></a></li>
                </ul>
                <h3>{{ "Modal Slide Settings" | trans }}</h3>
            </div>
        </div>

        <div class="uk-display-block">
            <div class="uk-margin">
                <div v-for="(image, id) in config.modal.images" class="uk-margin" :key="id">
                    <div class="uk-grid-small uk-child-width-1-2" uk-grid>
                        <div>
                            <div class="uk-margin">
                                <label class="uk-form-label">{{ "Title" | trans }}</label>
                                <div class="uk-form-controls">
                                    <input type="text" v-model="image.title" class="uk-input" />
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label">{{ "Description" | trans }}</label>
                                <div class="uk-form-controls">
                                    <textarea v-model="image.desc" class="uk-textarea"></textarea>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <button @click.prevent="deleteImage(id)" class="uk-button uk-button-danger uk-button-small" :disabled="config.modal.images.length <= 1">{{ "Delete Item" | trans }}</button>
                            </div>
                        </div>
                        <div>
                            <div class="uk-margin">
                                <label for="form-image" class="uk-form-label">{{ "Image" | trans }}</label>
                                <div class="uk-form-controls">
                                    <v-multi-finder v-model="image.image" :image.sync="image.image" class="pk-image-max-height" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
var SiteTheme = {
    section: {
        label: "Leylada",
        icon: "face-id",
        priority: 15,
    },

    data() {
        return _.extend(
            {
                config: {},
            },
            window.$theme
        );
    },

    methods: {
        addImage() {
            this.config.modal.images.push({
                title: "",
                desc: "",
                image: {
                    src: "",
                    alt: "",
                },
            });
        },

        deleteImage(id) {
            const data = this.config.modal.images;
            this.$delete(data, id)
            this.config.modal.images = data;
        },
    },

    events: {
        "save:settings": function () {
            this.$http.post("admin/system/settings/config", { name: this.name, config: this.config }).catch(function (res) {
                this.$notify(res.data, "danger");
            });
        },
    },
};

export default SiteTheme;

window.Site.components["site-theme"] = SiteTheme;
</script>
