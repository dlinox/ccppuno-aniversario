<template>
    <v-row no-gutters>
        <v-col
            :cols="false"
            md="5"
            class="md-hidden"
            style="
                min-height: 100vh;
                background-image: url('/static/second-img.jpg');
                background-position: center center;
                background-repeat: no-repeat;
                background-size: cover;
            "
        >
        </v-col>
        <v-col cols="12" md="7" style="height: 100%">
            <v-toolbar title="Registro de pagos" />
            <v-stepper
                elevation="0"
                v-model="step"
                class="h-100"
                :items="['Datos Personales', 'Entradas', 'Pago']"
            >
                <template v-slot:item.1>
                    <v-card title="Datos personales" flat class="h-100">
                        <v-row>
                            <v-col cols="12" md="6">
                                <v-text-field
                                    v-model="form.person.documentNumber"
                                    label="DNI"
                                    :error-messages="
                                        form.errors[`person.documentNumber`]
                                    "
                                />
                            </v-col>

                            <v-col cols="12" md="6">
                                <v-text-field
                                    v-model="form.person.name"
                                    label="Nombres"
                                    :error-messages="form.errors[`person.name`]"
                                />
                            </v-col>

                            <v-col cols="12" md="6">
                                <v-text-field
                                    v-model="form.person.paternalSurname"
                                    label="Apellido Paterno "
                                    :error-messages="
                                        form.errors[`person.paternalSurname`]
                                    "
                                />
                            </v-col>

                            <v-col cols="12" md="6">
                                <v-text-field
                                    v-model="form.person.maternalSurname"
                                    label="Apellido Materno"
                                    :error-messages="
                                        form.errors[`person.maternalSurname`]
                                    "
                                ></v-text-field>
                            </v-col>

                            <v-col cols="12" md="6">
                                <v-text-field
                                    v-model="form.person.email"
                                    label="Correo"
                                    :error-messages="
                                        form.errors[`person.email`]
                                    "
                                ></v-text-field>
                            </v-col>

                            <v-col cols="12" md="6">
                                <v-text-field
                                    v-model="form.person.phoneNumber"
                                    label="Celular"
                                    :error-messages="
                                        form.errors[`person.phoneNumber`]
                                    "
                                ></v-text-field>
                            </v-col>
                        </v-row>
                    </v-card>
                </template>

                <template v-slot:item.2>
                    <v-card title="Entradas" flat>
                        <v-list-item subtitle="Precio: S/. 20.00">
                            <v-list-item-title>
                                Entrada: <strong>HABIL</strong>
                            </v-list-item-title>
                            <template v-slot:prepend>
                                <v-avatar color="grey-lighten-1">
                                    <v-icon color="white">
                                        mdi-ticket-confirmation
                                    </v-icon>
                                </v-avatar>
                            </template>

                            <template v-slot:append>
                                <v-text-field
                                    style="max-width: 100px"
                                    v-model="form.tickets.qualityHabil"
                                    label="Cant."
                                    :error-messages="
                                        form.errors[`tickets.qualityHabil`]
                                    "
                                ></v-text-field>
                            </template>
                        </v-list-item>

                        <v-list-item subtitle="Precio: S/. 50.00">
                            <v-list-item-title>
                                Entrada:
                                <strong>Publico en gneral / INHABIL</strong>
                            </v-list-item-title>
                            <template v-slot:prepend>
                                <v-avatar color="grey-lighten-1">
                                    <v-icon color="white"
                                        >mdi-ticket-confirmation</v-icon
                                    >
                                </v-avatar>
                            </template>

                            <template v-slot:append>
                                <v-text-field
                                    style="max-width: 100px"
                                    v-model="form.tickets.qualityInHabil"
                                    label="Cant."
                                    :error-messages="
                                        form.errors[`tickets.qualityInHabil`]
                                    "
                                ></v-text-field>
                            </template>
                        </v-list-item>

                        <v-list-item
                            class="text-end pe-3 bg-blue-grey-lighten-4 py-2"
                        >
                            <v-list-item-title class="pe-5">
                                Total:
                            </v-list-item-title>

                            <template v-slot:append>
                                <v-chip label>
                                    <strong
                                        >S/.
                                        {{
                                            form.tickets.qualityInHabil * 50 +
                                            form.tickets.qualityHabil * 20
                                        }}</strong
                                    >
                                </v-chip>
                            </template>
                        </v-list-item>
                    </v-card>
                </template>

                <template v-slot:item.3>
                    <v-card title="Pago" flat>
                        <v-row>
                            <v-col cols="12" md="6">
                                <v-img src="/static/voucher.webp" />
                            </v-col>
                            <v-col cols="12" md="6">
                                <v-text-field
                                    v-model="form.pay.code"
                                    class="pb-3"
                                    label="Serie"
                                    :error-messages="form.errors[`pay.code`]"
                                />
                                <v-text-field
                                    v-model="form.pay.amount"
                                    class="pb-3"
                                    label="Importe"
                                    :error-messages="form.errors[`pay.amount`]"
                                />
                                <v-text-field
                                    v-model="form.pay.date"
                                    type="date"
                                    class="pb-3"
                                    label="Fecha del pago"
                                    :error-messages="form.errors[`pay.date`]"
                                />

                                <v-card variant="tonal">
                                    <CropCompressImage
                                        :aspect-ratio="4 / 3"
                                        @onCropper="
                                            (preview_img = $event.blob),
                                                (form.pay.image = $event.file)
                                        "
                                    />

                                    <v-img
                                        v-if="preview_img"
                                        class="mx-auto"
                                        :width="300"
                                        aspect-ratio="4/3"
                                        contain
                                        :src="preview_img"
                                    ></v-img>

                                    {{ form.errors[`pay.image`] }}
                                </v-card>
                            </v-col>
                        </v-row>
                    </v-card>
                </template>

                <template #actions>
                    <v-alert
                        v-if="form.hasErrors"
                        color="error"
                        icon="$error"
                        variant="tonal"
                    >
                        <p v-for="error in form.errors">
                            {{ error }}
                        </p>
                    </v-alert>
                    <div class="pa-3 d-flex justify-space-between">
                        <v-btn
                            :disabled="step === 1"
                            @click="step--"
                            variant="tonal"
                        >
                            Anterior
                        </v-btn>

                        <v-btn v-if="step < 3" @click="step++" variant="tonal">
                            Siguiente
                        </v-btn>
                        <v-btn
                            v-else
                            @click="submit"
                            :loading="form.processing"
                        >
                            Guardar
                        </v-btn>
                    </div>
                </template>
            </v-stepper>
        </v-col>
    </v-row>
</template>
<script setup>
import { ref } from "vue";
import { router, useForm } from "@inertiajs/vue3";
import CropCompressImage from "@/components/CropCompressImage.vue";
const step = ref(1);

const preview_img = ref(null);

const form = useForm({
    person: {
        documentNumber: null,
        name: null,
        paternalSurname: null,
        maternalSurname: null,
        email: null,
        phoneNumber: null,
        enrollmentNumber: null,
    },
    tickets: {
        qualityHabil: 0,
        qualityInHabil: 0,
    },
    pay: {
        code: null,
        amount: null,
        date: null,
        image: null,
    },
});

const submit = () => {
    form.post("/sales", option);
};

const option = {
    onSuccess: (page) => {
        console.log("onSuccess");
        router.post("/success", {email: form.person.email} );
    },
    onError: (errors) => {
        console.log("onError");
    },
    onFinish: (visit) => {
        console.log("onFinish");
    },
};
</script>
