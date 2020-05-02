<template>
  <div>
    <div class="columns is-multiline">
      <div
      id="cardContainer"
        class="column is-one-quarter"
        v-for="(addon, index) in this.$store.state.addonArray"
        :key="index"
        :class="{active: addon}"
      >
        <div @click="updateAddons(index)" class="card" :id="'addon' + index">
          <div class="card-image">
            <figure class="image is-4by3">
              <img
                src="images/DSC00046.JPG"
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
  methods: {
      updateAddons: function(index){
        var selectedAddon = document.getElementById("addon"+ index);
        if(selectedAddon.classList.contains("activeAddon") == true){
            selectedAddon.classList.remove("activeAddon")
            //delete cookie with addon in it
        } else{
            selectedAddon.classList.add("activeAddon");
            //add cookie with addon
        }

        var allCards = document.querySelectorAll(".activeAddon .title");
        for (var i=0; i<=allCards.length; i++){
            var titleData = allCards.innerHTML[i];
        }
        console.log(titleData);
        var json_str = JSON.stringify(allCards);
        document.cookie = "addons=" + json_str + "";
      },
  }
};
</script>

<style>
.activeAddon{
    background: grey;
}
</style>
