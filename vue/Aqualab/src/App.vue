<template>
  <div id="app">
    <Navbar :isLoggedIn="isLoggedIn" :activeForm="currentSection" @navigate="navigateTo" @logout="logout" />

    <!-- Área pública -->
    <div v-if="!isLoggedIn">
      <div v-if="currentSection === 'resetPassword'">
        <ResetPassword :token="resetToken" :email="resetEmail" @navigate="navigateTo" />
      </div>
      <div v-else-if="currentSection === 'login'">
        <Login @login-success="handleLoginSuccess" @navigate="navigateTo" />
      </div>
      <div v-else-if="currentSection === 'register'">
        <Register @register-success="handleRegisterSuccess" @navigate="navigateTo" />
      </div>
      <div v-else-if="currentSection === 'forgotPassword'">
        <ForgotPassword @navigate="navigateTo" />
      </div>
      <div v-else-if="currentSection === 'emailConfirmed'">
        <EmailConfirmed @navigate="navigateTo" />
      </div>
      <div v-else-if="currentSection === 'emailVerificationError'">
        <EmailVerificationError @navigate="navigateTo" />
      </div>
      <div v-else-if="currentSection === 'emailAlreadyVerified'">
        <EmailAlreadyVerified @navigate="navigateTo" />
      </div>
      <div v-else>
        <Login @login-success="handleLoginSuccess" @navigate="navigateTo" />
      </div>
    </div>

    <!-- Área protegida -->
    <div v-else>
      <div v-if="currentSection === 'profile'">
        <Profile @editer="handleEditUser" @logout="logout" />
      </div>
      <div v-else-if="currentSection === 'editUser'">
        <EditUser @update-success="handleUpdateSuccess" @update-cancel="handleUpdateCancel" />
      </div>
      <div v-else-if="currentSection === 'administration'">
        <Administration />
      </div>
      <div v-else-if="currentSection === 'notifications'">
        <Notifications />
      </div>
      <div v-else-if="currentSection === 'dashboardclient'">
        <DashboardClient />
      </div>
    </div>

    <footer class="footer">
      <p style="">&copy; {{ currentYear }} Aqualab. Todos os direitos reservados.</p>
      <div class="footer-links">
        <a href="#">Política de Privacidade</a>
        <a href="#">Termos de Serviço</a>
        <a href="#">Suporte</a>
      </div>
    </footer>
  </div>
</template>

<script>
import Login from './components/user/Login.vue';
import Navbar from './components/NavBar/Navbar.vue';
import Register from './components/user/Register.vue';
import Profile from './components/user/Profile.vue';
import EditUser from './components/user/EditUser.vue';
import Administration from './components/user/Administration.vue';
import Notifications from './components/Notifications.vue';
import DashboardClient from './components/DashboardClient.vue';
import ForgotPassword from './components/password_mail/forgotPassword.vue';
import ResetPassword from './components/password_mail/ResetPassword.vue';
import EmailConfirmed from './components/password_mail/EmailConfirmed.vue';
import EmailVerificationError from './components/password_mail/EmailVerificationError.vue';
import EmailAlreadyVerified from './components/password_mail/EmailAlreadyVerified.vue';
import { toast } from 'vue3-toastify';
import axios from 'axios';

export default {
  components: {
    Login,
    ForgotPassword,
    ResetPassword,
    Navbar,
    Register,
    Profile,
    EditUser,
    Administration,
    Notifications,
    DashboardClient,
    EmailConfirmed,
    EmailVerificationError,
    EmailAlreadyVerified,

  },
  data() {
    return {
      isLoggedIn: false,
      isRegistering: false,
      currentSection: 'login',
      id: null,
      resetToken: null,
      resetEmail: null,
    };
  },
  computed: {
    currentYear() {
      return new Date().getFullYear();
    },
  },
  mounted() {
    const urlParams = new URLSearchParams(window.location.search);
    const token = urlParams.get('token');
    const email = urlParams.get('email');
    console.log(token);
    if (token && email) {
      axios.post('/password/validate-token', {
        token,
        email
      },{headers: { 'Content-Type': 'multipart/form-data' }})
      .then((response) => {
        if (response.data.valid) {
          this.resetToken = token;
          this.resetEmail = email;
          this.currentSection = 'resetPassword';
        } else {
          this.currentSection = 'emailVerificationError';
        }
        window.history.replaceState({}, document.title, '/');
      })
      .catch(() => {
        console.log('error');
        this.currentSection = 'emailVerificationError';
        window.history.replaceState({}, document.title, '/');
      });
    }

    if (urlParams.get('email_verified') === 'true') {
      localStorage.removeItem('AccessToken');
      this.currentSection = 'emailConfirmed';
      window.history.replaceState({}, document.title, '/');
    }

    if (urlParams.get('email_verified') === 'invalid') {
      this.currentSection = 'emailVerificationError';
      window.history.replaceState({}, document.title, '/');
    }

    if (urlParams.get('email_verified') === 'already') {
      this.currentSection = 'emailAlreadyVerified';
      window.history.replaceState({}, document.title, '/');
    }
  },
  methods: {
    handleLoginSuccess() {
      this.isLoggedIn = true;
      this.currentSection = 'profile';
    },
    logout() {
      this.isLoggedIn = false;
    },
    navigateTo(section) {
      this.currentSection = section;
    },
    handleRegisterSuccess() {
      this.isRegistering = false;
      this.currentSection = 'login';
      toast.success("Registo realizado com sucesso! Verifique o seu e-mail.");
    },
    handleEditUser() {
      this.isRegistering = false;
      this.currentSection = 'editUser';
    },
    handleUpdateSuccess() {
      this.currentSection = 'profile';
      toast.success("Dados atualizados com sucesso!");
    },
    handleUpdateCancel() {
      this.currentSection = 'profile';
    },
  },
};
</script>