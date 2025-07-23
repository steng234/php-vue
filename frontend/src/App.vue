<script setup lang="ts">
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
  <div class="app-layout">
    <header class="app-header">
      <div class="header-content">
        <RouterLink to="/" class="logo"> lorem ipsum</RouterLink>
        <nav class="nav-links">
          <RouterLink to="/">Home</RouterLink>
          <RouterLink to="/product">Prodotti Disponibili</RouterLink>
        </nav>
      </div>
    </header>

    <main class="main-content">
      <RouterView />
    </main>
  </div>
</template>