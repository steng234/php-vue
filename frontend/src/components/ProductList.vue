<template>
  <div class="products-container">
    <h2>Prodotti disponibili</h2>

    <p v-if="error" class="error">{{ error }}</p>

    <div class="product-table" v-if="products.length > 0">
      <table>
        <thead>
          <tr>
            <th class="w-25">Prodotto</th>
            <th class="w-25">Marca</th>
            <th class="w-25">Categoria</th>
            <th class="w-25">Prezzo</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="product in products" :key="product.id">
            <td>{{ product.title }}</td>
            <td>{{ product.brand }}</td>
            <td>{{ product.category }}</td>
            <td>{{ formatPrice(product.price) }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
const backendUrl = import.meta.env.VITE_BACKEND_URL

export default {
  name: "ProductList",
  data() {
    return {
      products: [],
      loading: false,
      error: ""
    };
  },
  methods: {
    async fetchProducts() {
      this.loading = true;
      this.error = "";
      this.products = [];

      try {
        const response = await fetch(backendUrl + "/products", {
          method: "GET",
          headers: { "Content-Type": "application/json" },
          credentials: "include"
        });

        if (!response.ok) throw new Error("Errore nel recupero dei prodotti");

        const data = await response.json();
        this.products = data.products || [];

      } catch (err) {
        this.error = err.message || "Errore sconosciuto";
      } finally {
        this.loading = false;
      }
    },
    formatPrice(price) {
      return `€ ${Number(price).toFixed(2)}`;
    }
  },
  mounted() {
    this.fetchProducts();
  }
};
</script>
