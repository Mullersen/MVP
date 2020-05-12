<template>
  <div>
    <hr class="hr" />
    <h2 class="subtitle has-text-centered">These are some activities we think would be great on your trip.</h2>
    <p class="content has-text-centered"> You can choose however many you want. Or none, it's up to you!</p>
    <div class="columns is-multiline ">
      <div
        id="cardContainer"
        class="column is-one-quarter"
        v-for="(addon, index) in this.$store.state.addonArray"
        :key="addon.id"
      >
        <div @click="updateAddons(index)" class="card equalHeight" :id="'addon' + index">
        <div class="id" style="display:none">{{addon.id}}</div>
          <div class="card-image">
            <figure class="image is-4by3">
              <img
                :src="addon.image"
                alt="activity for Inside Canada in the Rocky Mountains"
              />
            </figure>
          </div>
          <div class="card-content">
            <p class="title is-4 has-text-dark">{{addon.activity}}</p>
            <p class="subtitle is-6">{{addon.price}} CAD</p>
            <p class="content">{{addon.description}}</p>
          </div>
        </div>
      </div>
    </div>
    <h2 class="subtitle has-text-centered">Click on Cart top right corner to see your choices!</h2>
  </div>
</template>

<script>
export default {
  name: "Addon",
  data: function() {
    return {
      cookieAddonArray: [],
    };
  },
  methods: {
    updateAddons: function(index) {
      //visually select the addon when clicked
      var selectedAddon = document.getElementById("addon" + index);
      if (selectedAddon.classList.contains("activeAddon")) {
        selectedAddon.classList.remove("activeAddon");
      } else {
        selectedAddon.classList.add("activeAddon");
      }

      //select all chosen addons and turn into cookie with ids - if no addons, delete cookie
      var allActiveCards = document.querySelectorAll(".activeAddon");
      if(allActiveCards){
        var allActiveCardsArr = Array.from(allActiveCards);
        var newArr = allActiveCardsArr.map(i => i.firstChild.innerHTML);
        var json_str = JSON.stringify(newArr);
        document.cookie = "addons=" + json_str;
      } else {
          document.cookie = "addons=; expires=Thu 01 Jan 1990 00:00:00 UTC";
      }

      //update cart with chosen transportation
         this.$store.dispatch("getChosenAddons", newArr);
    },
    checkIfActive: function(){
        //check if the addon has already been chosen by the client
        this.$store.state.addonArray.forEach(addonToCheck =>{
            this.cookieAddonArray.forEach(element => {
                //console.log(element + " " + addonToCheck.id);
                if(element == addonToCheck.id){
                    //console.log(element);
                    this.updateAddons(element);
                };
            });
        });
    },
    checkCookie: function(param) {
      //console.log("check cookie has been called with " + param);
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
        }
      }
    }
  },
  mounted(){
      this.checkCookie("addons");
      this.checkIfActive();
  }

};
</script>

<style>
.activeAddon {
  background: grey;
}
.equalHeight{
    display: flex;
    flex-direction: column;
    height: 100%;
}
</style>
