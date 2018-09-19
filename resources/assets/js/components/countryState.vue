<template lang="html">
  <div class="form-row">
    <div class="col-md-4">
      <div class="form-group">
        <label>Country</label>
        <select class="form-control" name="country_id" @change="pickCountry" v-model="currentcountry">
          <option v-for="country in listCountries" :value="country.id">{{ country.country_name }}</option>
        </select>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label>State / Province / City</label>
        <select class="form-control" name="name">
          <option v-for="state in listStates" :value="listStates[i]">{{ state }}</option>
        </select>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label>Nationality</label>
        <input type="text" name="nationality" class="form-control">
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      listCountries :[],
      countries : [],
      states : [],
      listStates :[],
      currentcountry : '',
      currentstate: '',
    }
  },
  methods: {
    getCountries(){
      axios.get('/vue/countries').then(r => {
        this.countries = r.data;

      }). catch(e => {
        console.log(e);
      });
    },
    getStates() {
      axios.get('/vue/states').then(r => {
        this.states = r.data;
      }). catch(e => {
        console.log(e);
      });
    },
    pickCountry() {
      this.listCountries = [];
      this.listStates = [];
      for (var i = 0; i < this.countries.length; i++) {
        this.listCountries.push(this.countries[i]);
      }
      console.log(this.listCountries);

    },
    pickState(){
      this.listStates = [];
      for (var i = 0; i < this.states.length; i++) {
        if (this.listCountries[i].id == this.currentcountry ){
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
