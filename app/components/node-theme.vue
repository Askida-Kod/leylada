<template>
    <div class="uk-form-horizontal">
        <div class="uk-margin">
            <div class="uk-margin">
                <label class="uk-form-label">{{ "Section" | trans }}</label>
                <div class="uk-form-controls">
                    <select class="uk-select uk-form-width-large" v-model="node.theme.section">
                        <option value="uk-section uk-section-default">
                            {{ "Default" | trans }}
                        </option>
                        <option value="uk-section uk-section-primary">
                            {{ "Primary" | trans }}
                        </option>
                        <option value="uk-section uk-section-secondary">
                            {{ "Secondary" | trans }}
                        </option>
                        <option value="uk-section uk-section-Muted">
                            {{ "Muted" | trans }}
                        </option>
                    </select>
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label">{{ "Size" | trans }}</label>
                <div class="uk-form-controls">
                    <select class="uk-select uk-form-width-large" v-model="node.theme.sectionSize">
                        <option value="">{{ "Default" | trans }}</option>
                        <option value="uk-section-xsmall">
                            {{ "XSmall" | trans }}
                        </option>
                        <option value="uk-section-small">
                            {{ "Small" | trans }}
                        </option>
                        <option value="uk-section-large">
                            {{ "Large" | trans }}
                        </option>
                        <option value="uk-section-xlarge">
                            {{ "XLarge" | trans }}
                        </option>
                        <option value="uk-padding-remove-vertical">
                            {{ "Remove Vertical" | trans }}
                        </option>
                    </select>
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label">{{ "Background Image" | trans }}</label>
                <div class="uk-form-controls">
                    <input-image input-class="uk-form-width-large" v-model="node.theme.sectionImage" :value="node.theme.sectionImage"></input-image>
                </div>
            </div>
        </div>

        <div class="uk-margin">
            <div class="uk-margin">
                <label class="uk-form-label">{{ "Content Align" | trans }}</label>
                <div class="uk-form-controls">
                    <select class="uk-select uk-form-width-large" v-model="node.theme.contentAlign">
                        <option value="">{{ "Default" | trans }}</option>
                        <option value="uk-text-left">
                            {{ "Left" | trans }}
                        </option>
                        <option value="uk-text-center">
                            {{ "Center" | trans }}
                        </option>
                        <option value="uk-text-right">
                            {{ "Right" | trans }}
                        </option>
                    </select>
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label">{{ "Content Container" | trans }}</label>
                <div class="uk-form-controls">
                    <select class="uk-select uk-form-width-large" v-model="node.theme.container">
                        <option value="uk-container">
                            {{ "Default" | trans }}
                        </option>
                        <option value="uk-container uk-container-expand">
                            {{ "Expand" | trans }}
                        </option>
                        <option value="uk-container uk-container-large">
                            {{ "Large" | trans }}
                        </option>
                        <option value="uk-container uk-container-small">
                            {{ "Small" | trans }}
                        </option>
                        <option value="uk-container uk-container-xsmall">
                            {{ "XSmall" | trans }}
                        </option>
                    </select>
                </div>
            </div>

            <div class="uk-alert-warning" uk-alert>
                {{ "Title Conf: It should only be used for the page plugin." | trans }}
            </div>
            <div>
                <div class="uk-margin">
                    <label class="uk-form-label">{{ "Title Hide" | trans }}</label>
                    <div class="uk-form-controls uk-form-controls-text">
                        <input type="checkbox" class="uk-checkbox" v-model="node.theme.titleHide" />
                    </div>
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label">{{ "Title DOM Element" | trans }}</label>
                    <div class="uk-form-controls">
                        <select class="uk-select uk-form-width-large" v-model="node.theme.titleDomElement">
                            <option value="h1">H1</option>
                            <option value="h2">H2</option>
                            <option value="h3">H3</option>
                            <option value="h4">H4</option>
                            <option value="h5">H5</option>
                            <option value="h6">H6</option>
                        </select>
                    </div>
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label">{{ "Title Color" | trans }}</label>
                    <div class="uk-form-controls">
                        <select class="uk-select uk-form-width-large" v-model="node.theme.titleColor">
                            <option value="">{{ "Default" | trans }}</option>
                            <option value="uk-text-primary">
                                {{ "Primary" | trans }}
                            </option>
                            <option value="uk-text-secondary">
                                {{ "Secondary" | trans }}
                            </option>
                        </select>
                    </div>
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label">{{ "Title Class" | trans }}</label>
                    <div class="uk-form-controls">
                        <input type="text" class="uk-input uk-form-width-large" v-model="node.theme.titleClass" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
const Theme = {
    section: {
        label: "Theme",
        priority: 10,
    },

    props: ["form", "node"],
};

export default Theme;
window.Site.components.theme = Theme;
</script>