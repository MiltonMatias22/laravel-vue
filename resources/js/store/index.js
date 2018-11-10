
window.Vue = require('vue');

import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        item: {},
    },
    mutations: {
        SET_ITEM: function (state, obj) {
            state.item = obj;
        }
    },
});