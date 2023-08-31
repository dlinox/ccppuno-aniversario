<template>
    <v-app class="h-screen">
        <template v-if="token === null">
            <v-card width="350" class="mx-auto my-auto pt-3">
                <v-container>
                    <v-row>
                        <v-col cols="12" class="text-center">
                            <img src="/logo.png" alt="" width="200" />
                        </v-col>

                        <v-col cols="12" class="text-center">
                            <h3 class="text-h6">Boleto no valido</h3>
                        </v-col>

                        <v-col cols="12" class="text-center">
                            <v-btn color="grey" variant="outlined">
                                <a href="/">Registar Pago</a></v-btn
                            >
                        </v-col>
                    </v-row>
                </v-container>
                <v-divider></v-divider>
                <v-card-actions>
                    <small class="px-4 text-center">
                        CCPPUNO v.1.0 © 2023 todos los derechos reservados
                    </small>
                </v-card-actions>
            </v-card>
        </template>

        <template v-else>
            <v-card width="350" class="mx-auto my-auto pt-3" variant="tonal">
                <v-container>
                    <v-row>
                        <v-col cols="12" class="text-center">
                            <img src="/logo.png" alt="" width="200" />
                        </v-col>

                        <v-col cols="12" class="text-center">
                            <v-icon size="50" color="green">
                                mdi-check-decagram
                            </v-icon>
                            <h3 class="text-h6 mb-2">Boleto</h3>

                            <p>
                                Advertencia: No compartas este mensaje con
                                nadie. La información contenida es confidencial
                                y personal.
                            </p>
                        </v-col>
                    </v-row>
                </v-container>
                <v-card-actions>
                    <v-btn block>
                        <a :href="'/download/' + token" target="_blank" download> Descargar</a>
                    </v-btn>
                </v-card-actions>
                <v-divider></v-divider>

                <v-card-actions>
                    <small class="px-4 text-center text-gray">
                        CCPPUNO v.1.0 © 2023 todos los derechos reservados
                    </small>
                </v-card-actions>
            </v-card>
        </template>
    </v-app>
</template>
<script setup>
import { router, useForm } from "@inertiajs/vue3";

const props = defineProps({
    token: String,
});

const downloadTicket = () => {
    console.log("aqui");
    router.post("/download", { token: props.token });
};
</script>
