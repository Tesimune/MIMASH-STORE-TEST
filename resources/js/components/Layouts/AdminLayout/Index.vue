<template>
    <div class="flex bg-gray-100 min-h-screen">
        <Sidenav className="min-w-[250px]" />
        <div class="flex-grow">
            <Navbar />
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
      components: {Sidenav, Navbar, Link}
  }
</script>
