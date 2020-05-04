import Vue from 'vue';
import Vuetify, {
    VApp,
    VAppBar,
    VNavigationDrawer,
    VToolbar,
    VContainer,
    VContent,
    VFooter,
    VCol,
    VTooltip,
    VList,
    VListItem,
    VListItemAction,
    VIcon,
    VListItemContent,
    VListItemTitle,
    VAppBarNavIcon,
    VToolbarTitle,
    VRow,
    VBtn,
    VCarousel,
    VCarouselItem,
    VSheet,
    VCard,
    VDialog,
    VCardTitle,
    VCardText,
    VTextField,
    VSelect,
    VAutocomplete,
    VCardActions,
    VSpacer
} from "vuetify/lib";

Vue.use(Vuetify, {
    components: {VApp,
        VAppBar,
        VNavigationDrawer, VToolbar, VContainer, VContent, VFooter, VCol, VTooltip, VList, VListItem, VListItemAction,
        VIcon,
        VListItemContent,
        VListItemTitle,
        VAppBarNavIcon,
        VToolbarTitle,
        VRow,
        VBtn,
        VDialog,
        VCardTitle,
        VCardText,
        VTextField,
        VSelect,
        VAutocomplete,
        VCardActions,
        VSpacer
    }
});

const opts = {};

export default new Vuetify(opts);
