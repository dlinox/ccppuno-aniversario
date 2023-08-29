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
                            <tr v-for="item in sales" :key="item.id">
                                <td>
                                    {{
                                        `${item.client.documentNumber}  | ${item.client.name} ${item.client.paternalSurname} ${item.client.maternalSurname}`
                                    }}
                                </td>

                                <td>{{ item.vouchers[0].code }}</td>

                                <td>HABIL</td>

                                <td>S/. {{ item.vouchers[0].amount }}</td>

                                <td>
                                    <v-btn variant="tonal">
                                        {{ item.status }}
                                    </v-btn>
                                    <v-btn
                                        icon
                                        density="comfortable"
                                        @click="showDetails(item)"
                                    >
                                        <v-icon>mdi-eye</v-icon>
                                    </v-btn>
                                </td>
                            </tr>
                        </tbody>
                    </v-table>
                </v-card-item>
            </v-card>
        </v-container>
        <v-dialog v-model="dialogDetails" width="auto">
            <v-card>
                <v-toolbar title="Cliente" density="compact" />
                <v-row>
                    <v-col cols="12">
                        <v-list-item subtitle="Nombre y apellidos">
                            <v-list-item-title>
                                {{
                                    `${details.client.documentNumber}  | ${details.client.name} ${details.client.paternalSurname} ${details.client.maternalSurname}`
                                }}
                            </v-list-item-title>
                        </v-list-item>
                    </v-col>
                    <v-col cols="12" md="6">
                        <v-list-item subtitle="Celular">
                            <v-list-item-title>
                                {{ `${details.client.phoneNumber}` }}
                            </v-list-item-title>
                        </v-list-item>
                    </v-col>
                    <v-col cols="12" md="6">
                        <v-list-item subtitle="Correo">
                            <v-list-item-title>
                                {{ `${details.client.email}` }}
                            </v-list-item-title>
                        </v-list-item>
                    </v-col>
                </v-row>

                <v-toolbar title="Boletos" density="compact" />
                <v-row>
                    <v-col cols="12" v-for="deta in details.sale_details">
                        <v-list-item
                            :title="
                                deta.ticketId === 1
                                    ? 'HABILES'
                                    : 'INHABILES / PUBLICO EN GENERAL'
                            "
                            :subtitle="`Cant.:${deta.quantity} | Importe.:${deta.amount} `"
                        />
                    </v-col>
                </v-row>

                <v-toolbar title="Voucher" density="compact" />
                <v-row>
                    <v-col cols="12" md="6">
                        <v-list-item subtitle="Serie">
                            <v-list-item-title>
                                {{ `${details.vouchers[0].code}` }}
                            </v-list-item-title>
                        </v-list-item>
                    </v-col>
                    <v-col cols="12" md="6">
                        <v-list-item subtitle="Importe">
                            <v-list-item-title>
                                {{ `${details.vouchers[0].amount}` }}
                            </v-list-item-title>
                        </v-list-item>
                    </v-col>

                    <v-col cols="12">
                        <v-list-item subtitle="Fecha de pago">
                            <v-list-item-title>
                                {{ `${details.vouchers[0].date}` }}
                            </v-list-item-title>
                        </v-list-item>
                    </v-col>
                </v-row>

                <v-card-actions class="px-5">
                    <v-btn color="red" @click="dialog = false">
                        cancelar
                    </v-btn>
                    <v-spacer></v-spacer>
                    <v-btn
                        color="green"
                        variant="flat"
                        @click="validatePaument(details, 'ACEPTADO')"
                    >
                        validar pago
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </AdminLayout>
</template>
<script setup>
import { ref } from "vue";
import AdminLayout from "../../layouts/AdminLayout.vue";
import { router } from "@inertiajs/vue3";

const props = defineProps({
    sales: {
        default: [],
        type: Array,
    },
});

const dialogDetails = ref(false);
const details = ref(null);

const showDetails = (item) => {
    details.value = null;
    details.value = item;
    dialogDetails.value = true;
};
const validatePaument = (item, status) => {
    let data = {
        saleId: item.id,
        newStatus: status,
    };
    router.post("/a/pagos/validar", data);

    dialogDetails.value = false;
};
</script>
