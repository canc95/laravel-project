<template lang="html">
  <div class="form-row">
    <div class="col-md-3">
      <div class="form-group">
        <label>Paese</label>
        <select class="form-control" name="country" @change="pickCountry" v-model="currentCountry" required oninvalid="this.setCustomValidity('Seleziona un oggetto')" oninput="this.setCustomValidity('')">
          <option disabled selected>Selezionare...</option>
          <option v-for="country in countries" :value="country.id">{{ country.country_name }}</option>
        </select>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label>Stato / Provincia / Città</label>
        <select class="form-control" name="state_id" required oninvalid="this.setCustomValidity('Seleziona un oggetto')" oninput="this.setCustomValidity('')">
          <option v-for="(state, i) in listStates" :value="listStates[i].id">{{ state.name }}</option>
        </select>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label>Nazionalità</label>
        <input type="text" name="nationality" pattern="[a-zA-Z]+" class="form-control" required oninvalid="this.setCustomValidity('Verifica questo campo')" oninput="this.setCustomValidity('')">
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label>Etnia</label>
        <select class="form-control" name="etnia" required oninvalid="this.setCustomValidity('Seleziona un oggetto')" oninput="this.setCustomValidity('')">
          <option selected disabled>Etnia</option>
          <option value="Caucasico">Caucasico</option>
          <option value="Nero">Nero</option>
          <option value="Asiatico">Asiatico</option>
          <option value="Latino">Latino</option>
          <option value="Indù">Indù</option>
          <option value="Arabo">Arabo</option>
          <option value="Razza_mista">Razza mista</option>
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
