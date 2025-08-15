<template>
  <div>
    <Header v-if="!isAdminRoute" />
    <router-view />
    <Contacts v-if="!isAdminRoute" />
  </div>
</template>

<script setup>
import { computed } from 'vue'
import { useRoute } from 'vue-router'
import Header from './Header/Header.vue'
import Contacts from './Contacts/Contacts.vue'
const route = useRoute()
const isAdminRoute = computed(() => route.path.startsWith('/admin'))
</script>