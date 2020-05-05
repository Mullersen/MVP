<template>
  <div>
    <div class="columns is-multiline">
      <div
      id="cardContainer"
        class="column is-one-quarter"
        v-for="(addon, index) in this.$store.state.addonArray"
        :key="index"
      >
        <div @click="updateAddons(index)" class="card" :id="'addon' + index">
          <div class="card-image">
            <figure class="image is-4by3">
              <img
                :src="'images/'+addon.image"
                alt="activity for Inside Canada in the Rocky Mountains"
              />
            </figure>
          </div>
          <div class="card-content">
            <p class="title is-4 has-text-dark">{{addon.activity}}</p>
            <p class="subtitle is-6">{{addon.price}}</p>
            <!-- <p class="content">{{description}}</p> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Addon",
  data: function(){
      return{
          innerHTMLArr: [],
      }
  },
  methods: {
      updateAddons: function(index){
        var selectedAddon = document.getElementById("addon"+ index);
        if(selectedAddon.classList.contains("activeAddon") == true){
            selectedAddon.classList.remove("activeAddon")
        } else{
            selectedAddon.classList.add("activeAddon");
        }

        //select all chosen addons and turn into cookie
        var allCards = document.querySelectorAll(".activeAddon");
        var allCardsArr = Array.from(allCards);
        var newArr = allCardsArr.map(i => i.innerText);
        this.$store.commit('updateAddons', newArr);
        if (newArr.length > 0){ //don't stringify an empty array
            var json_str = JSON.stringify(newArr);
            document.cookie = "addons=" + json_str + "";
        }
      },
  },
};
</script>

<style>
.activeAddon{
    background: grey;
}
</style>
