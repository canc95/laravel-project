<template lang="html">
  <div class="form-row">
    <div class="col-md-3">
      <div class="form-group">
        <label>Country</label>
        <select class="form-control" name="country" @change="pickCountry" v-model="currentCountry">
          <option v-for="country in countries" :value="country.id">{{ country.country_name }}</option>
        </select>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label>State / Province / City</label>
        <select class="form-control" name="state_id">
          <option v-for="(state, i) in listStates" :value="listStates[i].id">{{ state.name }}</option>
        </select>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label>Nationality</label>
        <input type="text" name="nationality" class="form-control">
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label>Etnia</label>
        <select class="form-control" name="etnia">
          <option selected disabled>Etnia</option>
          <option>Caucasian</option>
          <option>Black</option>
          <option>Asian</option>
          <option>Latin</option>
          <option>Hindu</option>
          <option>Arab</option>
          <option>Mixed Race</option>
        </select>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      countries : [],
      states : [],
      listStates :[],
      currentCountry : ''
    }
  },
  methods: {
    getCountries(){
      axios.get('/vue/countries').then(r => {
        this.countries = r.data.countries;
      }). catch(e => {
        console.log(e);
      });
    },
    getStates() {
      axios.get('/vue/states').then(r => {
        this.states = r.data.states;
      }). catch(e => {
        console.log(e);
      });
    },
    pickCountry() {
      this.listStates = [];
      for (var i = 0; i < this.states.length; i++) {
        if (this.states[i].country_id == this.currentCountry) {
          this.listStates.push(this.states[i]);
        }
      }
    }
  },
  created(){
    this.getCountries();
    this.getStates();
  }
}
</script>

<style lang="css">
</style>
