<template>
  <div>
    <div class="columns is-multiline">
      <div
        id="cardContainer"
        class="column is-one-quarter"
        v-for="(addon, index) in this.$store.state.addonArray"
        :key="addon.id"
      >
        <div @click="updateAddons(index)" class="card" :id="'addon' + index">
        <div class="id" style="display:none">{{addon.id}}</div>
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
  data: function() {
    return {
      innerHTMLArr: [],
      cookieAddonArray: [],
      newArr: [],
    };
  },
  methods: {
    updateAddons: function(index) {
      var selectedAddon = document.getElementById("addon" + index);
      if (selectedAddon.classList.contains("activeAddon") == true) {
        selectedAddon.classList.remove("activeAddon");
      } else {
        selectedAddon.classList.add("activeAddon");
      }

      //select all chosen addons and turn into cookie
      var allActiveCards = document.querySelectorAll(".activeAddon");
      var allActiveCardsArr = Array.from(allActiveCards);
      var newArr = allActiveCardsArr.map(i => i.firstChild.innerHTML);
      console.log(newArr);
      this.$store.commit("updateAddons", newArr);
      if (newArr.length > 0) {//don't stringify an empty array
        var json_str = JSON.stringify(newArr);
        document.cookie = "addons=" + json_str + "";
      }
    },
    checkIfActive: function(){
        this.$store.state.addonArray.forEach(addonToCheck =>{
            //console.log(addonToCheck.id);
            this.cookieAddonArray.forEach(element => {
                //console.log(element + " " + addonToCheck.id);
                if(element == addonToCheck.id){
                    this.updateAddons(addonToCheck.id);
                };
            });
        });
    },
    checkCookie: function(param) {
      console.log("check cookie has been called with " + param);
      var name = param + "=";
      var decodedCookie = decodeURIComponent(document.cookie);
      var ca = decodedCookie.split(";");
      for (var i = 0; i < ca.length; i++) {
        var cookie = ca[i];
        while (cookie.charAt(0) == " ") {
          cookie = cookie.substring(1);
        }
        if (cookie.indexOf(param) == 0) {
            this.cookieAddonArray = JSON.parse(cookie.substring(param.length + 1, cookie.length));
          return cookie.substring(param.length + 1, cookie.length);
        }
      }
      return "There was no such cookie";
    }
  },
  updated(){
      this.checkCookie("addons");
      this.checkIfActive();
  }

};
</script>

<style>
.activeAddon {
  background: grey;
}
</style>
