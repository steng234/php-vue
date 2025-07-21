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

    <div v-if="orders.length > 0" class="orders-list">
      <h3>Ordini ricevuti</h3>
      <ul>
        <li v-for="order in orders" :key="order.id">
          {{ order.description }} — {{ formatDate(order.date) }}
        </li>
      </ul>
    </div>

    <p v-if="error" class="error">{{ error }}</p>
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
            error: "",
            };
        },
        computed: {
            emailValid() {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(this.email);
            },
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
                    year: "numeric",
                });
            },
        },
    };
</script>

<style scoped>
.orders-container {
  font-family: "Georgia", serif;
  max-width: 600px;
  margin: 40px auto;
  padding: 20px;
  background: #fff;
  border: 1px solid #eee;
}

.form-group {
  display: flex;
  gap: 10px;
  margin-bottom: 20px;
}

.email-input {
  flex: 1;
  padding: 10px;
  font-size: 1rem;
  border: 1px solid #ccc;
}

button {
  background-color: #004080;
  color: #fff;
  padding: 10px 16px;
  border: none;
  cursor: pointer;
}

button[disabled] {
  opacity: 0.6;
  cursor: not-allowed;
}

.orders-list {
  margin-top: 20px;
}

.error {
  color: red;
}
</style>
