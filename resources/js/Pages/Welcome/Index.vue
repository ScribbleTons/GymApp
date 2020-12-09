<template>
  <div>
    <nav
      class="px-4 py-2 w-full bg-white text-white flex justify-between border-blue-700 border-b-4 z-10 fixed"
    >
      <!-- Logo -->
      <div class="flex-shrink-0 flex items-center">
        <a href="/">
          <jet-application-mark class="block h-9 w-auto text-blue-700" />
        </a>
        <h2 class="text-2xl mx-4 text-blue-700">GymApp</h2>
      </div>
      <div class="mx-10">
        <a href="/login"
          ><jet-button class="shadow-md bg-blue-700">Sign In</jet-button></a
        >
      </div>
    </nav>
    <!-- end of navigation -->

    <main class="p-5 relative">
      <div class="flex" :style="bgPhoto">
        <div
          class="relative w-4/12 p-4 rounded-lg shadow-lg bg-white border-4 border-blue-700 flex flex-col items-center"
          style="top: 199px; left: 45px"
        >
          <img
            class="w-full overflow-auto"
            height="60%"
            src="https://images.pexels.com/photos/38630/bodybuilder-weight-training-stress-38630.jpeg"
            alt="roaring gymmer"
          />
          <p class="text-center font-semibold m-auto font-mono self-center">
            It is time your release your inner strength. Burn down the damn calories!
          </p>
        </div>
        <div class="relative m-5" style="top: 90px; right: 30px">
          <h2 class="font-bold text-5xl text-white text-center">
            Get The Body You Love Today
          </h2>
          <p
            class="text-2xl font-semibold text-yellow-300 p-4 mt-8 text-right float-right bg-black"
          >
            Welcome to GymApp, get your goals achieved!
          </p>
        </div>
        <div
          class="absolute bg-blue-700 text-white p-4 w-7/12"
          style="top: 450px; right: 20px"
        >
          <p class="p-2 m-auto text-2xl text-yellow-300 font-mono">
            Take advantage of our black friday window
          </p>
          <p class="p-2 m-auto text-xl font-mono">
            Get <span class="text-red-600 bg-white px-2">40%</span> discount on our
            monthly fitness resources subscriptions!
          </p>

          <div class="flex justify-between mx-5 p-2">
            <p class="text-left m-2">
              Offer expires on:
              <span
                id="element"
                class="bg-white px-4 p-2 text-xl font-bold text-red-700"
                >{{ salesCountdown }}</span
              >
            </p>
            <button
              type="button"
              class="text-blue-700 bg-white m-2 py-2 px-4 text-centerfont-semibold shadow-outline-yellow rounded-full hover:bg-yellow-300 hover:outline-none"
            >
              Subscribe
            </button>
          </div>
        </div>
      </div>
    </main>
  </div>
</template>

<script>
import "moment-countdown";
import moment from "moment";
import countdown from "countdown";
import JetButton from "./../../Jetstream/Button";
import JetApplicationMark from "./../../Jetstream/ApplicationMark";
export default {
  components: {
    JetButton,
    JetApplicationMark,
  },
  data() {
    return {
      date: moment(60 * 10 * 1000),
    };
  },
  computed: {
    bgPhoto() {
      const bg = {
        background: `url('https://images.pexels.com/photos/841130/pexels-photo-841130.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940') no-repeat fixed center/cover`,
        height: "60vh",
      };
      return bg;
    },
    salesCountdown() {
      return this.date.format("hh:mm:ss");
    },
  },
  mounted() {
    setInterval(() => {
      this.date = moment(this.date.subtract(1, "seconds"), 1000);
    });
  },
};
</script>
