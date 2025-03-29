<template>
  <nav class="navbar p-0 shadow-md" style="height: 80px;">
    <div style="margin-top: 10px;" class="container mx-auto flex justify-between items-center">
      <h1 class="text-xl font-bold icon-hover">
        <li style=" list-style: none;" v-if="userRole !== 'C'">
            <button @click="$emit('navigate', 'dashboardadmin')" class="icon-hover">
              <img style="width: 200px;" src="@/assets/logo.svg" alt="Aqualab Logo" class="h-14 glow-effect">
            </button>
          </li>
          <li style=" list-style: none;" v-else-if="userRole !== 'A'">
            <button @click="$emit('navigate', 'dashboardclient')" class="icon-hover">
              <img style="width: 200px;" src="@/assets/logo.svg" alt="Aqualab Logo" class="h-14 glow-effect">
            </button>
          </li>
          <li style=" list-style: none;" v-else>
            <button @click="$emit('navigate', 'login')" class="icon-hover">
              <img style="width: 200px;" src="@/assets/logo.svg" alt="Aqualab Logo" class="h-14 glow-effect">>
            </button>
          </li>
      </h1>
      <ul class="flex space-x-4">
        <template v-if="isLoggedIn">
          <li v-if="userRole !== 'C'">
            <button @click="$emit('navigate', 'dashboardclient')" class="icon-hover">
              <i class="bi bi-pie-chart"></i> Dashboard
            </button>
          </li>
          <li v-if="userRole !== 'A'">
            <button @click="$emit('navigate', 'dashboardclient')" class="icon-hover">
              <i class="bi bi-pie-chart"></i> Dashboard
            </button>
          </li>
          <li v-if="userRole !== 'C'">
            <button @click="$emit('navigate', 'administration')" class="icon-hover">
              <i class="bi bi-people"></i> Administração
            </button>
          </li>
        
          
          <li>
            <button @click="$emit('navigate', 'notifications')" class="icon-hover">
              <i class="bi bi-bell"></i> Notificações
            </button>
          </li>
          <li>
            <button @click="$emit('navigate', 'profile')" class="icon-hover">
              <i class="bi bi-person"></i> {{ formattedNickname }}
            </button>
          </li>
          <li>
            <button @click="handleLogout" class="icon-hover">
              <i class="bi bi-box-arrow-right"></i> Sair
            </button>
          </li>
        </template>
        <template v-else>
          <!-- Se estivermos no formulário de login, exibe o botão de Registar -->
          <li v-if="activeForm === 'login'">
            <button @click="$emit('navigate', 'register')" class="icon-hover">
              <i class="bi bi-person-bounding-box"></i> Registar
            </button>
          </li>
          <!-- Se estivermos no formulário de registo, exibe o botão de Login -->
          <li v-else-if="activeForm === 'register'">
            <button @click="$emit('navigate', 'login')" class="icon-hover">
              <i class="bi bi-box-arrow-in-right"></i> Login
            </button>
          </li>
        </template>
      </ul>
    </div>
  </nav>
</template>

<script>
  import { useAuthStore } from "@/stores/auth";
  
  export default {
    name: "Navbar",
    data() {
      return {
        userRole: "",
      };
    },
    props: {
      activeForm: {
        type: String,
        required: true,
      },
      isLoggedIn: {
        type: Boolean,
        required: true
      }
    },
    computed: {
      formattedNickname() {
        const authStore = useAuthStore();
        const nickname = authStore.user?.data?.nickname || "";
        this.userRole = authStore.user?.data?.type;        
        return nickname.charAt(0).toUpperCase() + nickname.slice(1);
      },
    },
    mounted() {
    },
    methods: {
      async handleLogout() {
        const authStore = useAuthStore();
        await authStore.logout();
        this.$emit("logout");
      }
    }
  };
  </script>
<style scoped>
.navbar a {
  text-decoration: none;
  color: inherit;
}
.navbar button {
  background: none;
  border: none;
  cursor: pointer;
  font: inherit;
}

.glow-navbar {
  box-shadow: 0 0 20px rgba(255, 255, 255, 0.8);
}

.icon-hover {
  transition: text-shadow 0.3s ease-in-out;
}

.icon-hover:hover {
  text-shadow: 0 0 10px rgba(255, 255, 255, 1), 0 0 20px rgba(255, 255, 255, 0.8);
  color: #ffffff;
}

.glow-effect {
  transition: filter 0.5s ease-in-out, transform 0.5s ease-in-out;
}

.glow-effect:hover {
  animation: glow-animation 60s;
}



@keyframes glow-animation {
  0% {
    filter: drop-shadow(0 0 10px rgba(255, 255, 255, 0.9)) drop-shadow(0 0 20px rgba(255, 255, 255, 0.6));
    transform: scale(1);
  }
  80% { /* Aqui limitamos a animação a 80% */
    filter: drop-shadow(0 0 10px rgba(255, 255, 255, 0.9)) drop-shadow(0 0 20px rgba(255, 255, 255, 0.6));
    transform: scale(1.04);
  }
  100% {
    filter: drop-shadow(0 0 10px rgba(255, 255, 255, 0.9)) drop-shadow(0 0 20px rgba(255, 255, 255, 0.6));
    transform: scale(1.04);
  }
}
</style>