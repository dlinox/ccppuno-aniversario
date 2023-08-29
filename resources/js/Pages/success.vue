<template>
    <v-app class="h-screen">
        <template v-if="email === null">
            <v-card width="350" class="mx-auto my-auto pt-3">
                <v-container>
                    <v-row>
                        <v-col cols="12" class="text-center">
                            <img src="/logo.png" alt="" width="200" />
                        </v-col>

                        <v-col cols="12" class="text-center">
                            <h3 class="text-h6">Confirmación de Pago</h3>
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

                          <v-icon size="50" color="green"> mdi-check-decagram </v-icon>
                            <h3 class="text-h6 mb-2">Confirmación de Pago</h3>

                            <p>Su pago ha sido registrado exitosamente.</p>
                            <p>
                                Sin embargo, aún está pendiente de validación.
                                Una vez validado, le enviaremos la confirmación
                                al correo electrónico que nos proporcionó.
                            </p>

                           <i> {{ email }} </i> 
                        </v-col>
                    </v-row>
                </v-container>
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
defineProps({
    email: String,
});
</script>
