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
      <button @click="fetchOrders" :disabled="loading || !emailValid">
        {{ loading ? "Caricamento..." : "Cerca ordini" }}
      </button>
    </div>

    <p v-if="error" class="error">{{ error }}</p>

    <div v-if="Object.keys(groupedOrders).length > 0" class="orders-list">
      <h3>Ordini ricevuti</h3>
      <div
        v-for="(items, orderId) in groupedOrders"
        :key="orderId"
        class="order-card"
      >
        <p><strong>ID ordine:</strong> {{ orderId }}</p>
        <p><strong>Data:</strong> {{ formatDate(items[0].created_at) }}</p>
        <p><strong>Note:</strong> {{ items[0].note || '—' }}</p>

        <table>
          <thead>
            <tr>
              <th>Prodotto</th>
              <th>Marca</th>
              <th>Categoria</th>
              <th>Quantità</th>
              <th>Prezzo</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="item in items" :key="item.item_title + item.brand_name">
              <td>{{ item.item_title }}</td>
              <td>{{ item.brand_name }}</td>
              <td>{{ item.category_name }}</td>
              <td>{{ item.quantity }}</td>
              <td>{{ formatPrice(item.price) }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "SelectOrdersByEmail",
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
      // Group orders by order_id
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
        const response = await fetch("http://localhost:8002/api/filtered_orders", {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify({ email: this.email }),
          credentials: "include"
        });

        if (!response.ok) throw new Error("Errore nel recupero degli ordini");

        const data = await response.json();
        this.orders = data.orders || [];
      } catch (err) {
        this.error = err.message || "Errore";
      } finally {
        this.loading = false;
      }
    },
    formatDate(dateStr) {
      const date = new Date(dateStr);
      return date.toLocaleDateString("it-IT", {
        day: "2-digit",
        month: "long",
        year: "numeric"
      });
    },
    formatPrice(price) {
      return `€ ${Number(price).toFixed(2)}`;
    }
  }
};
</script>
