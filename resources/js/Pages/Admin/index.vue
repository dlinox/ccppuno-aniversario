<template>
    <AdminLayout>
        <v-container>
            <v-card>
                <v-toolbar
                    theme="dark"
                    density="compact"
                    title="Boletos vendidos"
                />
                <v-card-item class="py-5">
                    <v-row>
                        <v-col cols="12" md="4">
                            <v-list-item>
                                <v-list-item-title class="text-h6">
                                    TOTAL
                                </v-list-item-title>
                                <v-list-item-title
                                    class="text-grey"
                                    v-text="'Vendios'"
                                />
                                <template v-slot:prepend>
                                    <v-avatar
                                        class="text-h4"
                                        rounded="lg"
                                        color="blue-lighten-1"
                                        size="90"
                                    >
                                        1/15
                                    </v-avatar>
                                </template>
                            </v-list-item>
                        </v-col>
                        <v-col cols="12" md="4">
                            <v-list-item>
                                <v-list-item-title class="text-h6">
                                    HABILES
                                </v-list-item-title>
                                <v-list-item-title
                                    class="text-grey"
                                    v-text="'Vendios'"
                                />
                                <template v-slot:prepend>
                                    <v-avatar
                                        class="text-h4"
                                        rounded="lg"
                                        color="grey-lighten-1"
                                        size="90"
                                    >
                                        1/15
                                    </v-avatar>
                                </template>
                            </v-list-item>
                        </v-col>
                        <v-col cols="12" md="4">
                            <v-list-item>
                                <v-list-item-title class="text-h6">
                                    INHABILES Y PUBLICO EN GENERAL
                                </v-list-item-title>
                                <v-list-item-title
                                    class="text-grey"
                                    v-text="'Vendios'"
                                />
                                <template v-slot:prepend>
                                    <v-avatar
                                        class="text-h4"
                                        rounded="lg"
                                        color="grey-lighten-1"
                                        size="90"
                                    >
                                        1/15
                                    </v-avatar>
                                </template>
                            </v-list-item>
                        </v-col>
                    </v-row>
                </v-card-item>
            </v-card>

            <v-card class="mt-5">
                <v-toolbar
                    theme="dark"
                    density="compact"
                    title="Pagos pendientes de aprobacion"
                />
                <v-card-item class="">
                    <v-table>
                        <thead>
                            <tr>
                                <th class="text-left">Nombre</th>
                                <th class="text-left">Serie</th>
                                <th class="text-left">Tipo</th>
                                <th class="text-left">Importe</th>
                                <th class="text-left">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in desserts" :key="item.name">
                                <td>{{ item.name }}</td>
                                <td>{{ item.serie }}</td>

                                <td>{{ item.type }}</td>

                                <td>S/. {{ item.amount }}</td>

                                <td>
                                    <v-btn variant="tonal">{{
                                        item.status
                                    }}</v-btn>
                                    <v-btn icon density="comfortable">
                                        <v-icon>mdi-dots-vertical</v-icon>
                                        <v-menu activator="parent">
                                            <v-list>
                                                <v-list-item
                                                    v-for="(
                                                        item, index
                                                    ) in items"
                                                    :key="index"
                                                    :value="index"
                                                >
                                                    <v-list-item-title>{{
                                                        item.title
                                                    }}</v-list-item-title>
                                                </v-list-item>
                                            </v-list>
                                        </v-menu>
                                    </v-btn>
                                </td>
                            </tr>
                        </tbody>
                    </v-table>
                </v-card-item>
            </v-card>
        </v-container>
    </AdminLayout>
</template>
<script setup>
import { ref } from "vue";
import AdminLayout from "../../layouts/AdminLayout.vue";


const desserts = [
  {
    name: "124578 - JUAN PERES",
    serie: "12456464",
    status: "Pendiente",
    type: "HABIL",
    amount: 20,
  },

  {
    name: "789654 - MABEL PAREDES",
    serie: "12456464",
    status: "Pendiente",
    type: "HABIL",
    amount: 20,
  },

  {
    name: "326514 - DANIELA JUAREZ",
    serie: "12456464",
    status: "Pendiente",
    type: "INHABIL OTROS",
    amount: 50,
  },
];

const items=  [
        { title: 'Aprobar' },
        { title: 'Rechazar' },
      ];
</script>
