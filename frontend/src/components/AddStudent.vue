<!-- src/components/AddStudent.vue -->
<template>
  <div>
    <h2 class="text-2xl font-bold mb-4">Add Student</h2>
    <div class="flex">
      <input
        v-model="username"
        type="text"
        placeholder="Username"
        class="mr-2 px-3 py-1 border border-gray-300 rounded-lg"
      />
      <input
        v-model="email"
        type="email"
        placeholder="Email"
        class="mr-2 px-3 py-1 border border-gray-300 rounded-lg"
      />
      <button
        @click="addStudent"
        class="px-4 py-2 bg-blue-500 text-white rounded"
      >
        Add
      </button>
    </div>
  </div>
</template>

<script>
export default {
  name: "AddStudent",
  data() {
    return {
      username: "",
      email: "",
    };
  },
  methods: {
    addStudent() {
      this.$store.dispatch("addStudent", {
        username: this.username,
        email: this.email,
      });
      this.$router.go();
      this.username = "";
      this.email = "";
    },
  },
};
</script>

<style lang="scss">
.flex {
  flex-direction: column;
  gap: 1rem;
}
</style>
