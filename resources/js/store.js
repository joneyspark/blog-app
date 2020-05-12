import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);

export default new Vuex.Store({
    state:{
        counter: 1000
    },
    getters:{
        getCouter(state){
            /* if(state.counter){
                return 'OMG this is big...';
            } */
            return state.counter;
        },
        getCounterHalf(state){
            return state.counter/2;
        }
    },
    mutations: {
        changeCounter (state, data) {
          state.counter += data;
        }
      },
      actions:{
        changeCounter({commit}, data){
            commit('changeCounter', data)
        }
      }
});
