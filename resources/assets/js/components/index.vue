<template>
<div class="col-md-10">
  <div class="row">
    <div class="col-md-3 pl-5" v-for="estate in estates">
      <input type="checkbox"  :value="estate.id" :id='"estate" + estate.id' :name='"estates"+estate.id' @change="handleCheckbox($event)">
      <label :for='"estate" + estate.id'>{{estate.name}}</label>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4 mt-3" v-for="escort in filteredEscorts">
      <div class="card no-border animated fadeInUp">
        <div class="card-body no-padding">
          <a :href="'/escorta/spettacolo/'+escort.id">
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
</template>

<script>
export default {

data() {
    return {
      escorts : [],
      estates : [],
      filteredEscorts:[],
      filteredEstates:[],
    }
  },
  methods : {
    getEscorts(){
      axios.get('/vue/escorts').then(r => {
        this.escorts = r.data.escorts;
        this.filteredEscorts = r.data.escorts;
      }). catch(e => {
        console.log(e);
      });
    },
    getStates(){
      axios.get('/vue/states').then(r => {
        this.estates = r.data.states;
      }).catch(e => {
        console.log(e);
      });
    },
    filterModels() {
      if(this.filteredEstates.length == 0) {
        this.filteredEscorts = this.escorts;
      } else {
        this.filteredEscorts = this.escorts.filter(escort => {
          for (var i = 0; i < this.filteredEstates.length; i++) {
            if(escort.state_id == this.filteredEstates[i]) {
              console.log(escort.state_id, this.filteredEstates[i]);
              return escort;
            }
          }
        });
      }

    },
    handleCheckbox(e) {
      if(e.target.checked) {
        this.filteredEstates.push(e.target.value);
      } else {
        let index = this.filteredEstates.indexOf(e.target.value);
        if(index > -1) {
          this.filteredEstates.splice(index, 1);
        }
      }
      this.filterModels();
    }
  },
  created(){
    this.getEscorts();
    this.getStates();
  }
}
</script>
