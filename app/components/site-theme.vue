<template>
    <div>
        <div class="uk-margin uk-flex uk-flex-middle uk-flex-between uk-flex-wrap">
            <div>
                <h2 class="uk-h3 uk-margin-remove">
                    {{ 'Leylada Settings' | trans }}
                </h2>
            </div>
            <div class="uk-margin-small">
                <button class="uk-button uk-button-primary" type="submit">
                    {{ 'Save' | trans }}
                </button>
            </div>
        </div>

        <div class="uk-form uk-form-horizontal">
            <div class="uk-margin" v-for="(social, id) in config.socials" :key="id">
                <label class="uk-form-label">{{id | trans }} Url</label>
                <div class="uk-form-controls">
                    <input type="url" class="uk-input" v-model="config.socials[id]" placeholder="https://example.com">
                </div>
            </div>
        </div>
    </div>
</template>

<script>

var SiteTheme = {

    section: {
        label: 'Leylada',
        icon: 'face-id',
        priority: 15,
    },

    data() {
        return _.extend({ config: {} }, window.$theme);
    },

    events: {

        'save:settings': function() {
            this.$http.post('admin/system/settings/config', { name: this.name, config: this.config }).catch(function (res) {
                this.$notify(res.data, 'danger');
            });
        },

    },

};

export default SiteTheme;

window.Site.components['site-theme'] = SiteTheme;
</script>