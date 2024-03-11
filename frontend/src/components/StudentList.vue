<template>
  <div>
    <h2 class="text-2xl font-bold mb-4 mt-4 border-b">Student List</h2>
    <div v-if="Allstudents?.length === 0" class="text-gray-500">
      No students found.
    </div>
    <div v-else>
      <div
        v-for="student in Allstudents"
        :key="student.id"
        class="flex items-center text-center justify-between py-2 border-b border-gray-200"
      >
        <div>
          <p class="font-semibold">{{ student.username }}</p>
          <p class="text-gray-500">{{ student.email }}</p>
        </div>
        <button
          @click="deleteStudent(student.id)"
          class="px-2 py-1 bg-red-500 text-white rounded text-sm"
        >
          Delete
        </button>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "StudentList",
  data() {
    return {
      // Remove Allstudents from local data
      Allstudents: [],
    };
  },
  mounted() {
    this.getStudents();
  },
  methods: {
    deleteStudent(id) {
      this.$store.dispatch("deleteStudent", id);
      this.Allstudents = this.Allstudents.filter(
        (student) => student.id !== id
      );
    },
    async getStudents() {
      try {
        await this.$store.dispatch("fetchStudents");
        // Update Allstudents after data is fetched
        this.Allstudents = this.$store.state.students;
        console.log(this.Allstudents);
      } catch (error) {
        console.error("Error fetching students:", error);
      }
    },
  },
};
</script>
