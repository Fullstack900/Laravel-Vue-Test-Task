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
  data() {
    return {
      username: "",
      email: "",
    };
  },
  methods: {
    addStudent() {
      const newStudent = {
        username: this.username,
        email: this.email,
      };
      this.$store
        .dispatch("addStudent", newStudent)
        .then(() => {
          this.$store.dispatch("fetchStudents");
          this.username = "";
          this.email = "";
        })
        .catch((error) => {
          console.error("Error adding student:", error);
        });
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
