<template>
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
            <th class="w-25">Prodotto</th>
            <th class="w-20">Marca</th>
            <th class="w-20">Categoria</th>
            <th class="w-15">Quantità</th>
            <th class="w-20">Prezzo</th>
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
</template>

<script>
export default {
  name: "OrderList",
  props: {
    groupedOrders: {
      type: Object,
      required: true
    }
  },
  methods: {
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
