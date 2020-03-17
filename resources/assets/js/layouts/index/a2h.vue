<template>
  <div class="container-fluid" id="a2h">
    <div class="row">
      <div class="ad2hs-prompt bounceInUp">
        <div class="d-flex justify-content-end">
          <i class="fa fa-times-circle" v-on:click="clo"></i>
        </div>
        <div class="col">
          <h1>Add T&amp;P To Your Homescreen!</h1>
        </div>
        <div class="col">
          <button class="btn btn-block py-3 my-3" @click="addToHomeScreen">Add To Your Homescreen</button>
        </div>
      </div>
    </div>
  </div>
</template>
<style scoped>
@keyframes bounceInUp {
  from,
  60%,
  75%,
  90%,
  to {
    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
  }

  from {
    opacity: 0;
    transform: translate3d(0, 3000px, 0);
  }

  60% {
    opacity: 1;
    transform: translate3d(0, -20px, 0);
  }

  75% {
    transform: translate3d(0, 10px, 0);
  }

  90% {
    transform: translate3d(0, -5px, 0);
  }

  to {
    transform: translate3d(0, 0, 0);
  }
}

.bounceInUp {
  animation-name: bounceInUp;
}

.btn {
  border: none;
  border-radius: 25px;
  text-transform: uppercase;
  vertical-align: middle;
  font-size: 20px;
  color: #ffffff;
  outline: 0;
  text-decoration: none;
  text-align: center;
  background: #1952ab;
}

.ad2hs-prompt {
  display: none;
  width: 100vw;
  background-color: #038ed4;
  color: #ffffff;
  text-align: center;
  text-decoration: none;
  padding: 1% 3%;
  position: fixed;
  bottom: 0;
  left: 0;
  animation-duration: 2s;
  animation-fill-mode: both;
  z-index: 9999;
}

.ad2hs-prompt:hover {
  box-shadow: 0 0 0 0 0.25rem;
}

.ad2hs-prompt a:focus {
  text-decoration: underline;
}

.ad2hs-prompt:focus-within {
  box-shadow: 0 0 0 0.25rem;
}

.ad2hs-prompt:focus-within a:focus {
  text-decoration: none;
}

.ad2hs-prompt h1 {
  text-align: center;
  color: #ffffff;
}

.ad2hs-prompt > * + * {
  margin-top: 0.75rem;
}

.fa-times-circle {
  font-size: 30px;
}

.fa-times-circle:hover {
  cursor: pointer;
}
</style>

<script>
var deferredPrompt;
export default {
  data() {
    return {
      deferredPrompt: null
    };
  },
  created() {
    // this.$nextTick(function() {
    this.$nextTick(function() {
      // window.addEventListener('beforeinstallprompt', this.showAddToHomeScreen());
      this.an();
    });
    // })
  },
  methods: {
    clo() {
      $("#a2h").hide();
    },
    an() {
      // console.log('an worked');
      window.addEventListener("beforeinstallprompt", function(e) {
        // Prevent Chrome 67 and earlier from automatically showing the prompt
        e.preventDefault();
        // Stash the event so it can be triggered later.
        deferredPrompt = e;
        // this.demo =1;
        //    this.showAddToHomeScreen();
        // console.log();

        var a2hsBtn = document.querySelector(".ad2hs-prompt");

        a2hsBtn.style.display = "initial";

        //   this.addToHomeScreen(deferredPrompt);
      });
    },

    addToHomeScreen: function() {
      // console.log(deferredPrompt);
      var a2hsBtn = document.querySelector(".ad2hs-prompt");

      // hide our user interface that shows our A2HS button
      a2hsBtn.style.display = "none";

      if (deferredPrompt) {
        // Show the prompt
        deferredPrompt.prompt();

        // Wait for the user to respond to the prompt
        deferredPrompt.userChoice.then(function(choiceResult) {
          if (choiceResult.outcome === "accepted") {
            console.log("User accepted the A2HS prompt");
          } else {
            console.log("User dismissed the A2HS prompt");
          }

          deferredPrompt = null;
        });
      }
    }
  }
};
</script>