<template>
    <div class="md:flex bg-gray-100 min-h-screen">
        <Sidenav :open="open" @open-sidenav="open = !open"
                 className="fixed w-screen h-screen md:h-auto bg-black/20 md:relative md:w-[250px]" />
        <div class="flex-grow">
            <Navbar @open-sidenav="open = !open" />
            <div class="p-5">
                <slot />
            </div>
        </div>
    </div>
</template>

<script>
import {Link} from "@inertiajs/inertia-vue3";
import Navbar from "./Navbar";
import Sidenav from "./Sidenav";

  export default {
      components: {Sidenav, Navbar, Link},
      data(){
          return {open: window.innerWidth > 500,}
      },
      mounted() {
          window.onresize = () => this.open = window.innerWidth > 500
      }
  }
</script>
