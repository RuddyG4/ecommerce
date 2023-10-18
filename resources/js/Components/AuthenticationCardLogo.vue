<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <Link :href="'/'">
        <div class="offcanvas__logo bg-white px-10 py-4 rounded">
            <a href="/store"><img src="assets/img/logo.png" alt=""></a>
        </div>
    </Link>
</template>
