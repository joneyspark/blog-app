<template>
  <div style="background-color: #003077;">
    <div id="layoutAuthentication">
      <div id="layoutAuthentication_content">
        <main>
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                  <div class="card-header justify-content-center">
                    <h3 class="font-weight-light my-4">LOGIN</h3>
                  </div>
                  <div class="card-body">
                    <form @submit.prevent="login">
                      <div class="form-group">
                        <label class="small mb-1" for="inputEmailAddress">Email</label>
                        <input
                          class="form-control py-4"
                          id="inputEmailAddress"
                          type="email"
                          placeholder="Enter email address"
                          v-model="data.email"
                        />
                      </div>
                      <div class="form-group">
                        <label class="small mb-1" for="inputPassword">Password</label>
                        <input
                          class="form-control py-4"
                          id="inputPassword"
                          type="password"
                          placeholder="Enter password"
                          v-model="data.password"
                        />
                      </div>
                      <div class="form-group">
                        <div class="custom-control custom-checkbox">
                          <input
                            class="custom-control-input"
                            id="rememberPasswordCheck"
                            type="checkbox"
                          />
                          <label
                            class="custom-control-label"
                            for="rememberPasswordCheck"
                          >Remember password</label>
                        </div>
                      </div>
                      <div
                        class="form-group d-flex align-items-center justify-content-between mt-4 mb-0"
                      >
                        <a class="small" href="password-basic.html">Forgot Password?</a>
                        <button type="submit" class="btn btn-primary">Login</button>
                      </div>
                    </form>
                  </div>
                  <div class="card-footer text-center">
                    <div class="small">
                      <a href="register-basic.html">Need an account? Sign up!</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
      <div id="layoutAuthentication_footer">
        <footer class="footer mt-auto footer-dark">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 small">Copyright &#xA9; Your Website 2020</div>
              <div class="col-md-6 text-md-right small">
                <a href="#!">Privacy Policy</a>
                &#xB7;
                <a href="#!">Terms &amp; Conditions</a>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      data: {
        email: "",
        password: ""
      },
      errors: []
    };
  },
  methods: {
    async login() {
      if (this.data.email.trim() == "") return this.error("Email is Required");
      if (this.data.password.trim() == "")
        return this.error("Password is Required");
      if (this.data.password.length < 6)
        return this.error("Incorrect Login Details");

      const res = await this.callApi("post", "/adminlogin", this.data);
      if (res.status === 200) {
        this.success(res.data.msg);
      } else {
        if (res.status === 401) {
          this.info(res.data.msg);
        } else if (res.status == 422) {
          for (let i in res.data.errors) {
            this.error(res.data.errors[i][0]);
          }
        } else {
          this.someerror();
        }
      }
    }
  }
};
</script>
