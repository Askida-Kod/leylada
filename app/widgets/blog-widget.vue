<template>
    <div class="pk-grid-large pk-width-sidebar-large" uk-grid>
        <div class="pk-width-content">
            <div class="uk-margin">
                <label for="form-title" class="uk-form-label">{{ "Title" | trans }}</label>
                <v-input id="form-title" type="text" name="title" placeholder="Enter Title" view="class: uk-width-expand uk-form-large uk-input" rules="required" v-model="widget.title" message="Title cannot be blank." />
            </div>

            <div class="uk-margin">
                <label class="uk-form-label">{{ "Page Title" | trans }}</label>
                <div class="uk-form-controls">
                    <input type="text" class="uk-input" v-model="widget.data.pageTitle" />
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label">{{ "Sub Title" | trans }}</label>
                <div class="uk-form-controls">
                    <input type="text" class="uk-input" v-model="widget.data.subTitle" />
                </div>
            </div>

            <div class="uk-margin" v-if="categories">
                <label class="uk-form-label">{{ "Select Categories" | trans }}</label>
                <div class="uk-form-controls uk-margin">
                    <p v-for="(category, id) in categories" :key="id" class="uk-margin-small">
                        <label>
                            <input type="checkbox" class="uk-checkbox uk-margin-right" :value="category.id" v-model="widget.data.selectedCategories" />
                            {{ category.title }}
                        </label>
                    </p>
                </div>
            </div>

            <div v-else>
                <p class="uk-text-lead uk-text-danger">
                    {{ "Not Found Blog Module" | trans }}
                </p>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label">{{ "Limit" | trans }}</label>
                <div class="uk-form-controls">
                    <input type="number" class="uk-input uk-form-width-large" min="1" max="10" v-model="widget.data.limit" required />
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label">{{ "Type" | trans }}</label>
                <div class="uk-form-controls">
                    <select class="uk-select uk-form-width-large" v-model="widget.data.type">
                        <option value="grid">{{ "Grid" | trans }}</option>
                        <option value="slider">{{ "Slider" | trans }}</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="pk-width-sidebar">
            <component :is="'template-settings'" :widget.sync="widget" :config.sync="config" :form="form" />
            <div class="uk-margin">
                <div class="uk-form-controls uk-form-controls-text">
                    <p class="uk-margin-small">
                        <label
                            ><input type="checkbox" class="uk-checkbox" v-model="widget.data.markdown" number /><span class="uk-margin-small-left">{{ "Markdown" | trans }}</span></label
                        >
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
const WidgetsBlogs = {
    section: {
        label: "Settings",
    },

    props: ["widget", "config", "form"],

    data() {
        return {
            categories: false,
        }
    },

    inject: ["$components"],

    replace: false,

    created() {
        if (!this.widget.data["selectedCategories"]) {
            this.widget.data = _.merge(
                {
                    selectedCategories: [],
                    limit: 5,
                    type: "grid",
                },
                this.widget.data
            )
        }

        _.extend(this.$options.components, this.$components)

        this.getCategories()
    },

    methods: {
        getCategories() {
            this.$http
                .get("api/leylada/getblogscategories")
                .then((res) => {
                    const { categories } = res.data
                    this.categories = categories
                })
                .catch((err) => {
                    this.$notify(err.body, "danger")
                })
        },
    },
}

export default WidgetsBlogs

window.Widgets.components["leylada-blogs.settings"] = WidgetsBlogs
</script>
