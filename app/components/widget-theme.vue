<template>
    <div class="uk-form-horizontal">
        <div v-if="isPositionDefault" class="uk-margin">
            <div class="uk-margin">
                <label class="uk-form-label">{{
                    "Height View Port" | trans
                }}</label>
                <div class="uk-form-controls uk-form-controls-text">
                    <input
                        type="checkbox"
                        class="uk-checkbox"
                        v-model="widget.theme.onHeightViewport"
                    />
                </div>
            </div>
            <div v-if="widget.theme.onHeightViewport">
                <div class="uk-margin">
                    <label class="uk-form-label">{{
                        "Offset Bottom" | trans
                    }}</label>
                    <div class="uk-form-controls">
                        <input
                            type="number"
                            class="uk-input uk-form-width-large"
                            v-model="widget.theme.heights['offset-bottom']"
                        />
                    </div>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label">{{
                        "Offset Top" | trans
                    }}</label>
                    <div class="uk-form-controls">
                        <input
                            type="number"
                            class="uk-input uk-form-width-large"
                            v-model="widget.theme.heights['offset-top']"
                        />
                    </div>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label">{{ "Section" | trans }}</label>
                <div class="uk-form-controls">
                    <select
                        class="uk-select uk-form-width-large"
                        v-model="widget.theme.section"
                    >
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
                    <select
                        class="uk-select uk-form-width-large"
                        v-model="widget.theme.sectionSize"
                    >
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
                <label class="uk-form-label">{{
                    "Background Image" | trans
                }}</label>
                <div class="uk-form-controls">
                    <input-image
                        input-class="uk-form-width-large"
                        v-model="widget.theme.sectionImage"
                        :value="widget.theme.sectionImage"
                    ></input-image>
                </div>
            </div>
        </div>
        <div v-else class="uk-margin">
            <div class="uk-alert-warning" uk-alert>
                <p>
                    {{
                        "You cannot configure several configurations for Navbar and Sidebar positions."
                            | trans
                    }}
                </p>
            </div>
        </div>
        <div class="uk-margin">
            <div v-if="widget.position != 'navbar'" class="uk-margin">
                <label class="uk-form-label">{{
                    "Content Align" | trans
                }}</label>
                <div class="uk-form-controls">
                    <select
                        class="uk-select uk-form-width-large"
                        v-model="widget.theme.contentAlign"
                    >
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
            <div v-if="widget.position != 'navbar'">
                <div class="uk-margin">
                    <label class="uk-form-label">{{
                        "Title Hide" | trans
                    }}</label>
                    <div class="uk-form-controls uk-form-controls-text">
                        <input
                            type="checkbox"
                            class="uk-checkbox"
                            v-model="widget.theme.titleHide"
                        />
                    </div>
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label">{{
                        "Title DOM Element" | trans
                    }}</label>
                    <div class="uk-form-controls">
                        <select
                            class="uk-select uk-form-width-large"
                            v-model="widget.theme.titleDomElement"
                        >
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
                    <label class="uk-form-label">{{
                        "Title Color" | trans
                    }}</label>
                    <div class="uk-form-controls">
                        <select
                            class="uk-select uk-form-width-large"
                            v-model="widget.theme.titleColor"
                        >
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
                    <label class="uk-form-label">{{
                        "Title Class" | trans
                    }}</label>
                    <div class="uk-form-controls">
                        <input
                            type="text"
                            class="uk-input uk-form-width-large"
                            v-model="widget.theme.titleClass"
                        />
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

    props: ["widget", "config"],

    computed: {
        isPositionDefault() {
            if (
                this.widget.position == "navbar" ||
                this.widget.position == "sidebar"
            ) {
                return false;
            }
            return true;
        },
    },
};

export default Theme;
window.Widgets.components.theme = Theme;
</script>