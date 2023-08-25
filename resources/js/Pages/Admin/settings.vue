<template>
    <AdminLayout>
        <v-container>
            <v-card>
                <v-toolbar theme="dark" density="compact" :title="'Pagos'">
                </v-toolbar>
                <v-card-item>
                    <v-list-item title="asdads asd">
                        <template v-slot:prepend>
                            <v-avatar color="grey-lighten-1"> 12 </v-avatar>
                        </template>

                        <template v-slot:append>
                            <v-btn
                                color="blue"
                                icon="mdi-pencil"
                                density="compact"
                                rounded="lg"
                            ></v-btn>
                        </template>
                    </v-list-item>
                </v-card-item>
            </v-card>
        </v-container>
    </AdminLayout>
</template>
<script setup>
import { ref } from "vue";
import AdminLayout from "../../layouts/AdminLayout.vue";

const tickets = [
    {
          name: "Colegiados Hábiles",
          quantity: 150,
          price: 20.00,
          inOffer: false,
          offerPrice: 15.00,
    },
];
</script>
