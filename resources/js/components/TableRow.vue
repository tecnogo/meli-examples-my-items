import axios from "axios";

<template>
    <tr>
        <td>{{ id }}</td>

        <td colspan="3" v-if="!record.loaded">Cargando...</td>

        <td v-if="record.loaded">
            <img :src="record.thumbnail" width="90" height="90" v-if="record.thumbnail"/>
        </td>

        <td v-if="record.loaded">
            <a :href="record.permalink" target="_blank">
                {{ record.title }}
            </a>
        </td>

        <td class="text-right" v-if="record.loaded">
            {{ record.sold_quantity || 0 }}
        </td>

    </tr>
</template>

<script>
    export default {
        props: ['id'],
        data() {
            return {
                record: {
                    loaded: false
                }
            }
        },
        async mounted() {
            const result = await axios.get('item/' + this.id);
            const data = result.data;

            this.record = {...this.record, ...data, ...{loaded: true}};
        }
    }
</script>

