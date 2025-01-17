<template>
    <Card class="p-3" style="min-height: 300px">
        <FullCalendar :options="calendarOptions">
            <template v-slot:eventContent="arg">
                <div class="p-3 custom-card" :class="getEventStyle(arg.event.extendedProps.etat)">
                    <div class="user">
                        <img :src="`http://127.0.0.1:8000/storage/${arg.event.extendedProps.image_user}`" alt="">
                        <strong>{{ arg.event.extendedProps.name_user }}</strong><br />
                    </div>
                    <div class="med">
                        <img :src="`http://127.0.0.1:8000/storage/${arg.event.extendedProps.med_user}`" alt="">
                        <strong>{{ arg.event.extendedProps.name_med }}</strong><br />
                    </div>
                </div>
            </template>
        </FullCalendar>
    </Card>
</template>

<script>
import FullCalendar from '@fullcalendar/vue3';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';

import { ref, onMounted } from "vue";

export default {
    components: {
        FullCalendar
    },
    setup() {
        const visites = ref([]);

        const calendarOptions = ref({
            plugins: [dayGridPlugin, interactionPlugin],
            initialView: 'dayGridMonth',
            events: [],
            editable: false,
            droppable: false,
            hiddenDays: [0],
        });

        const getEventStyle = (etat) => {
            switch (etat) {
                case "0":
                    return "";
                case "1":
                    return "";
                case "2":
                    return "green";
                case "3":
                    return "yellow";
                default:
                    return "";
            }
        };

        onMounted(() => {
            Nova.request()
                .get('/api/visites')
                .then(response => {
                    visites.value = response.data;

                    calendarOptions.value.events = visites.value.map(visite => ({
                        title: visite.id,
                        date: visite.date,
                        extendedProps: {
                            name_user: visite.user?.name,
                            image_user: visite.user?.photo,
                            name_med: visite.medecin?.nom + ' ' + visite.medecin?.prenom,
                            image_med: visite.medecin?.photo,
                            etat: visite.etat,
                        }
                    }));
                })
                .catch(error => {
                    console.error('Error fetching visites:', error);
                });
        });

        return {
            calendarOptions,
            getEventStyle,
        };
    },
};
</script>
