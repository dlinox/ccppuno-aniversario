<template>
    <v-app id="inspire">
        <v-navigation-drawer v-model="drawer">
            <v-list v-model="menuCurrent" nav density="compact">
                <v-list-item
                    v-for="(item, i) in menu"
                    :key="i"
                    :value="item.title"
                    :active="router.page.url === item.to"
                    color="primary"
                    @click="goToPage(item)"
                >
                    <template v-slot:prepend>
                        <v-icon :icon="item.icon"></v-icon>
                    </template>

                    <v-list-item-title v-text="item.title"></v-list-item-title>
                </v-list-item>
            </v-list>
        </v-navigation-drawer>
        <v-app-bar>
            <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>

            <v-app-bar-title>Administrador</v-app-bar-title>
        </v-app-bar>
        <v-main>

    

            <slot />
        </v-main>
    </v-app>
</template>
<script setup>
import { ref } from "vue";
import { router } from "@inertiajs/vue3";
const drawer = ref(null);
const menuCurrent = ref(null);

const menu = [
    {
        icon: "mdi-home",
        title: "Dasboard",
        to: "/a",
    },
    {
        icon: "mdi-home",
        title: "Pagos",
        to: "/a/pagos",
    },
    {
        icon: "mdi-home",
        title: "Configuraciones",
        to: "/a/configuraciones",
    },
];

const goToPage = (item) => {
    router.visit(item.to, {
        preserveState: true
    });
};
</script>
