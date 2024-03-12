import { createStore } from "vuex";
import axios from "axios"; 

const apiUrl = "http://127.0.0.1:8000/api"; 

const store = createStore({
  state: {
    students: [],
  },
  getters: {
    students: (state) => state.students,
  },
  mutations: {
    setStudents(state, student) {
      state.students = student;
    },
    addStudent(state, student) {
      state.students.push(student);
    },
    deleteStudent(state, id) {
      state.students = state.students.filter((student) => student.id !== id);
    },
  },
  actions: {
 
    async addStudent({ commit }, newStudent) {
      try {
        const response = await axios.post(apiUrl + "/students", newStudent);
        commit("addStudent", response.data);
      } catch (error) {
        console.error("Error adding student:", error);
      }
    },
    async fetchStudents({ commit }) {
      try {
        const response = await axios.get(apiUrl + "/students");
        commit("setStudents", response.data);
      } catch (error) {
        console.error("Error fetching students:", error);
      }
    },
    async deleteStudent({ commit }, id) {
      try {
        await axios.delete(apiUrl + "/students/" + id);
        commit("deleteStudent", id);
      } catch (error) {
        console.error("Error deleting student:", error);
      }
    },
  },
});

export default store;
