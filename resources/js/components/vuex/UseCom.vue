<template>
  <div>
    <div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
      <div class="container-fluid">
        <div class="page-header-content">
          <h1 class="page-header-title">
            <div class="page-header-icon">
              <i data-feather="activity"></i>
            </div>
            <span>Vuex</span>
          </h1>
          <div class="page-header-subtitle">Vuex Testing.</div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt-n10">
      <div class="card mb-4">
        <div class="card-header">
          <div class="mr-2">
            <h1>I'll Show all Vuex component</h1>
            <h2>Counter: {{ counter }}</h2>
            <ComA></ComA>
            <ComB></ComB>
            <ComC></ComC>
          </div>
          <Button type="info" @click="changeState">Change the state</Button>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import ComA from "./ComA.vue";
import ComB from "./ComB.vue";
import ComC from "./ComC.vue";
import {mapGetters} from 'vuex';
export default {
  data() {
    return {};
  },
  methods: {
    changeState() {
        this.$store.dispatch('changeCounter', 1)
      //this.$store.commit('changeCounter', 1);
    }
  },
  components: {
    ComA,
    ComB,
    ComC
  },
  computed:{
      ...mapGetters({
          'counter':'getCouter'
      })
  }
};
</script>
