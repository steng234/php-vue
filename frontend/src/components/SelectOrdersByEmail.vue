<template>
  <div class="orders-container">
    <h2>Verifica ordini recenti</h2>

    <div class="form-group">
      <input
        type="email"
        v-model="email"
        placeholder="Inserisci la tua email"
        class="email-input"
      />
      <button @click="fetchOrders" :disabled="loading || !emailValid" class="search-button">
        {{ loading ? "Caricamento..." : "Cerca ordini" }}
      </button>
    </div>

    <p v-if="error" class="error">{{ error }}</p>

    <OrderList :groupedOrders="groupedOrders" />
  </div>
</template>

<script>
import OrderList from "@/components/OrderList.vue";
const backendUrl = import.meta.env.VITE_BACKEND_URL

export default {
  name: "SelectOrdersByEmail",
  components: { OrderList },
  data() {
    return {
      email: "",
      orders: [],
      loading: false,
      error: ""
    };
  },
  computed: {
    emailValid() {
      const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return re.test(this.email);
    },
    groupedOrders() {
      return this.orders.reduce((acc, order) => {
        if (!acc[order.order_id]) {
          acc[order.order_id] = [];
        }
        acc[order.order_id].push(order);
        return acc;
      }, {});
    }
  },
  methods: {
    async fetchOrders() {
      if (!this.emailValid) return;

      this.loading = true;
      this.error = "";
      this.orders = [];

      try {
        const response = await fetch(backendUrl + "/filtered_orders", {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify({ email: this.email }),
          credentials: "include"
        });

        const data = await response.json(); // always try to parse the JSON

        if (!response.ok) {
          throw new Error(data.error || "Errore");
        }

        this.orders = data.orders || [];

      } catch (err) {
        this.error = err.message || "Errore";
      } finally {
        this.loading = false;
      }
    }
  }
};
</script>
