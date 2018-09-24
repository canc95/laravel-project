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
            <select class="form-control" name="">
              <option selected disabled  @change="sortByAge">Age</option>
              <option>Descendent</option>
              <option>Ascendent</option>
            </select>
          </div>
          <div class="col-md-3">
            <select class="form-control" name="">
              <option selected disabled>Gender</option>
              <option>Female</option>
              <option>Male</option>
              <option>Transexual</option>
              <option>Other</option>
            </select>
          </div>
          <div class="col-md-3">
            <select class="form-control" name="">
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
          <div class="col-md-3">
            <select class="form-control" name="">
              <option selected disabled>Hair Color</option>
              <option>Black</option>
              <option>Blonde</option>
              <option>Brown</option>
              <option>Redhead</option>
              <option>Others</option>
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
      escortAge: '',
      currentGender: '',
      currentEtnia: '',
      currentHairColor: '',
      listEscortSortAge:[],
      listEscortGender: [],
      listEscortEtnia: [],
      listEscortHairColor: []
    }
  },
  methods : {
    getEscorts(){
      axios.get('/vue/escorts').then(r => {
        this.escorts = r.data.escorts;
      }). catch(e => {
        console.log(e);
      });
    },
    sortByAge(){
      this.escortAge = 0;
      this.listEscortSortAge = [];

    },
    sortByGender(){
      this.listEscortGender = [];
      for (var i = 0; i < this.escorts.length; i++) {
        if (this.escorts[i].gender ==  this.currentGender) {
          this.listEscortGender.push(this.escorts[i]);
        }
      }
    },
    sortByEtnia(){
      this.listEscortEtnia = [];
      for (var i = 0; i < this.escorts.length; i++) {
        if (this.escorts[i].etnia == this.currentEtnia) {
          this.listEscortEtnia.push(this.escorts[i]);
        }
      }
    },
    sortByHairColor(){
      this.listEscortHairColor = [];
      for (var i = 0; i < this.escorts.length; i++) {
        if (this.escorts[i].hair_color == this.currentHairColor) {
          this.listEscortHairColor.push(this.escorts[i]);
        }
      }
    }
  },
  created(){
    this.getEscorts();
  }
}
</script>
