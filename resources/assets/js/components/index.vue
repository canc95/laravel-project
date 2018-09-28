<template>
  <div class="container">
    <div class="row">
      <div class="col-md-2">
        <div class="row">
          <div class="col-md-12">
            <div class="card no-border mt-1">
              <img src="/image/test6.jpg" class="img-fluid" alt="">
            </div>
          </div>
          <div class="col-md-12">
            <div class="card no-border mt-1">
              <img src="/image/test6.jpg" class="img-fluid" alt="">
            </div>
          </div>
          <div class="col-md-12">
            <div class="card no-border mt-1">
              <img src="/image/test6.jpg" class="img-fluid" alt="">
            </div>
          </div>
          <div class="col-md-12">
            <div class="card no-border mt-1">
              <img src="/image/test6.jpg" class="img-fluid" alt="">
            </div>
          </div>
          <div class="col-md-12">
            <div class="card no-border mt-1">
              <img src="/image/test6.jpg" class="img-fluid" alt="">
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-10">
        <div class="row">
          <div class="col-md-3">
            <select class="form-control" @change="sortAge" v-model="escortAge">
              <option selected disabled>Age</option>
              <option value="-1,1">Descendent</option>
              <option value="1,-1">Ascendent</option>
            </select>
          </div>
          <div class="col-md-3">
            <select class="form-control" @change="sortByGender" v-model="currentGender">
              <option selected disabled>Gender</option>
              <option value="Female">Female</option>
              <option value="Male">Male</option>
              <option value="Transexual">Transexual</option>
              <option value="Other">Other</option>
            </select>
          </div>
          <div class="col-md-3">
            <select class="form-control" @change="sortByEtnia" v-model="currentEtnia">
              <option selected disabled>Etnia</option>
              <option value="Caucasian">Caucasian</option>
              <option value="Black">Black</option>
              <option value="Asian">Asian</option>
              <option value="Latin">Latin</option>
              <option value="Hindu">Hindu</option>
              <option value="Arab">Arab</option>
              <option value="Mixed_Race">Mixed Race</option>
            </select>
          </div>
          <div class="col-md-3">
            <select class="form-control" @change="sortByHairColor" v-model="currentHairColor">
              <option selected disabled>Hair Color</option>
              <option value="Black">Black</option>
              <option value="Blonde">Blonde</option>
              <option value="Brown">Brown</option>
              <option value="Redhead">Redhead</option>
              <option value="Others">Others</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 mt-3" v-for="escort in escorts">
            <div class="card no-border">
              <div class="card-body no-padding">
                <a :href="'/escort/show/'+escort.id">
                  <img class="card-img-top img-fluid" :src="'/storage/escorts/photos/'+escort.photo_1" alt="">
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
      escorts : [],
      escortAge: 'Age',
      currentGender: 'Gender',
      currentEtnia: 'Etnia',
      currentHairColor: 'Hair Color',
      listEscortSortAge:[],
      defaultEscorts: []
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
  }
}
</script>
