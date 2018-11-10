<template>
  <div class="container">
    <div class="row">
      <div class="col-md-2">
        <div class="row">
          <div class="col-md-12" v-for="advertising in advertisings">
            <div class="card no-border mt-1">
              <a :href="advertising.link">
                <img :src="'/storage/advertisings/photos/'+advertising.photo" class="img-fluid" alt="">
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-10">
        <div class="row">
          <div class="col-md-3">
            <select class="form-control" @change="sortAge" v-model="escortAge">
              <option selected disabled>Eta</option>
              <option value="-1,1">Discendente</option>
              <option value="1,-1">Su</option>
            </select>
          </div>
          <div class="col-md-3">
            <select class="form-control" @change="sortByGender" v-model="currentGender">
              <option selected disabled>Genere</option>
              <option value="Femmina">Femmina</option>
              <option value="Maschio">Maschio</option>
              <option value="Transessuale">Transessuale</option>
              <option value="Altro">Altro</option>
            </select>
          </div>
          <div class="col-md-3">
            <select class="form-control" @change="sortByEtnia" v-model="currentEtnia">
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
          <div class="col-md-3">
            <select class="form-control" @change="sortByHairColor" v-model="currentHairColor">
              <option selected disabled>Colore dei capelli</option>
              <option value="Nero">Nero</option>
              <option value="Bionda">Bionda</option>
              <option value="Marrone">Marrone</option>
              <option value="Testa Rossa">Testa Rossa</option>
              <option value="Altro">Altro</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 mt-3" v-for="escort in escorts">
            <div class="card no-border">
              <div class="card-body no-padding">
                <a :href="'/escort/show/'+escort.id">
                  <img class="card-img-top img-index" :src="'/storage/escorts/photos/'+escort.photo_1" alt="">
                  <div class="profile-hovered text-center">
                    <h3 class="text-white">{{escort.first_name}}</h3>
                    <h4 class="text-white">{{escort.service}}</h4>
                    <h5 class="text-danger">{{escort.age}}</h5>
                  </div>
                </a>
              </div>
              <div class="card-footer">
                <h3 class="text-center">
                  {{escort.first_name}} {{escort.last_name}}
                </h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {

  data() {
    return {
      advertisings: [],
      escorts : [],
      escortAge: 'Eta',
      currentGender: 'Genere',
      currentEtnia: 'Etnia',
      currentHairColor: 'Colore dei capelli',
      listEscortSortAge:[],
      defaultEscorts: [],
      paginate: ['escorts']
    }
  },
  methods : {
    getEscorts(){
      axios.get('/vue/escorts').then(r => {
        this.escorts = r.data.escorts;
        this.defaultEscorts = r.data.escorts;
      }). catch(e => {
        console.log(e);
      });
    },
    getAdvertisings(){
      axios.get('/vue/pubblicita').then(r => {
        this.advertisings = r.data.advertisings;
        console.log(this.advertisings)
      }).catch(e => {
        console.log(e);
      });
    },
    sortingFunction(fv, sv) {
      function compare(a,b) {
        if (a.age < b.age)
          return fv;
        if (a.age > b.age)
          return sv;
        return 0;
      }
      this.escorts.sort(compare);
    },
    sortByGender(){
      this.escorts = this.defaultEscorts;
      let escortsGender = this.escorts;
      escortsGender = this.escorts.filter(escort => escort.gender == this.currentGender);
      this.escorts = escortsGender;
    },
    sortByEtnia(){
      this.escorts = this.defaultEscorts;
      let escortsEtnia = this.escorts.filter(escort => escort.etnia == this.currentEtnia);
      this.escorts = escortsEtnia;
    },
    sortByHairColor(){
      this.escorts = this.defaultEscorts;
      let escortsHairColor = this.escorts.filter(escort => escort.hair_color == this.currentHairColor);
      this.escorts = escortsHairColor;
    }
  },
  computed:{
    sortAge() {
      this.listEscortSortAge = this.escortAge.split(',');
      var firstValue = this.escortAge[0];
      var secondValue = this.escortAge[1];
      this.sortingFunction(firstValue, secondValue);
    }
  },
  created(){
    this.getEscorts();
    this.getAdvertisings();
  }
}
</script>
